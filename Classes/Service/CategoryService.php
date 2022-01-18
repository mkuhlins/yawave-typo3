<?php
namespace Interspark\YawavePublications\Service;

use Interspark\YawavePublications\Domain\Repository\CategoryRepository;
use Interspark\YawavePublications\Service\YawaveService;
use Interspark\YawavePublications\Domain\Model\Category;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CategoryService {
	
	private $categoryRepository;
	private $yawaveService;

	public function __construct(CategoryRepository $categoryRepository, YawaveService $yawaveService)
	{
		//controller using autowire so no configuration is needed
		$this->categoryRepository = $categoryRepository;
		$this->yawaveService = $yawaveService;
		
	}
	
	public function update_categories($page=0) 
	{
		
		$yawave_categories_pages = $this->yawaveService->get_api_endpoint_data('https://api.yawave.com/public/applications/YAWAVE_APP_ID/categories?page=0&lang=de');
		
		for($page=0;$page<=$yawave_categories_pages->number_of_all_pages;$page++) {
					
			$yawave_categories = $this->yawaveService->get_api_endpoint_data('https://api.yawave.com/public/applications/YAWAVE_APP_ID/categories?page=' . $page.'&lang=de');
					
			if ($yawave_categories && isset($yawave_categories->content) && is_array($yawave_categories->content) && sizeof($yawave_categories->content) > 0) {
				foreach ($yawave_categories->content as $category) {
					$this->save_category($category);
				}
			} 
			
		}
	
		return true;
		
	}
	
	public function save_category($yawave_category) 
	{
		
		$query = $this->categoryRepository->createQuery();
		$query->matching($query->equals('ext_id', $yawave_category->id));
		$result = $query->execute(true);
		
		if(count($result) == 0) {
			$category = new Category();
			$method = 'insert';
		}else{            
			$category = $this->categoryRepository->findByUid($result[0]['uid']);
			$method = 'update';
		}     
		
		$category->setName($yawave_category->name);
		$category->setExtId($yawave_category->id);
		$category->setSlug($yawave_category->slug);
		
		if(!empty($yawave_category->parent_id)) {
			
			$query_parent = $this->categoryRepository->createQuery();
			$query_parent->matching($query_parent->equals('ext_id', $yawave_category->parent_id));
			$result_parent = $query_parent->execute(true);
			
			if($result_parent[0]['uid'] > 0) {
				$category_parent = $this->categoryRepository->findByUid($result_parent[0]['uid']);
				$category->setParent($category_parent);
			}
			
		}
		
		$this->categoryRepository->add($category);
		
		return true;
	}
	
	public function getAllCategories()
	{
		
		$query_maincategories = $this->categoryRepository->createQuery();
		$query_maincategories->matching($query_maincategories->equals('parent', 0));
		$maincategories = $query_maincategories->execute(true);
		
		
		
		foreach($maincategories AS $main_category) {
			
			
			$parent_categories = array();
			$query_parent = $this->categoryRepository->createQuery();
			$query_parent->matching($query_parent->equals('parent', $main_category['uid']));
			$parentcategories = $query_parent->execute(true);
			
			if(count($parentcategories) > 0) {
				
				foreach($parentcategories AS $parentcategorie) {
					$parent_categories[] = array(
						'uid' => $parentcategorie['uid'],
						'title' => $parentcategorie['name']
					);
				}
				
			}
			
			$categories[] = array(
				'uid' => $main_category['uid'],
				'title' => $main_category['name'],
				'parents' => $parent_categories,
			);
			
		}
		
		return $categories;
		
	}
	
}
