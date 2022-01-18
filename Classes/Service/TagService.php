<?php
namespace Interspark\YawavePublications\Service;

use Interspark\YawavePublications\Domain\Repository\TagRepository;
use Interspark\YawavePublications\Domain\Repository\PublicationRepository;
use Interspark\YawavePublications\Service\YawaveService;
use Interspark\YawavePublications\Domain\Model\Tag;
use Interspark\YawavePublications\Domain\Model\Publication;

class TagService {
	
	private $tagRepository;
	private $yawaveService;

	public function __construct(TagRepository $tagRepository, YawaveService $yawaveService, PublicationRepository $publicationRepository)
	{
		//controller using autowire so no configuration is needed
		$this->tagRepository = $tagRepository;
		$this->publicationRepository = $publicationRepository;
		$this->yawaveService = $yawaveService;
		
	}
	
	public function update_tags($page=0)
	{
		
		$yawave_tags = $this->yawaveService->get_api_endpoint_data('https://api.yawave.com/public/applications/YAWAVE_APP_ID/tags?page=' . $page);
		
		if ($yawave_tags && isset($yawave_tags->content) && is_array($yawave_tags->content) && sizeof($yawave_tags->content) > 0) {
			foreach ($yawave_tags->content as $tag) {
				$this->save_tag($tag);
			}
		}
		
		return true;
	}
	
	public function save_tag($yawave_tag)
	{
		
		$query = $this->tagRepository->createQuery();
		$query->matching($query->equals('ext_id', $yawave_tag->id));
		$result = $query->execute(true);
		
		if(count($result) == 0) {
			$tag = new Tag();
			$method = 'insert';
		}else{            
			$tag = $this->tagRepository->findByUid($result[0]['uid']);
			$method = 'update';
		}     
		
		$tag->setName($yawave_tag->name);
		$tag->setExtId($yawave_tag->id);
		
		if(!empty($yawave_tag->slug)) {
			$tag->setSlug($yawave_tag->slug);
		}
		
		
		if($method == 'insert') {
		   $this->tagRepository->add($tag);
		}elseif($method == 'update') {
		   $this->tagRepository->update($tag);
		}
		
	}
	
	public function clear_tags($publication)
	{
		
		$tags_Storage = $publication->getTags();
		$publication->getTags()->removeAll($tags_Storage);
		return true;
		
	}
	
}
