<?php
namespace Interspark\YawavePublications\Service;

use Interspark\YawavePublications\Domain\Repository\PortalRepository;
use Interspark\YawavePublications\Domain\Repository\PublicationRepository;
use Interspark\YawavePublications\Service\YawaveService;
use Interspark\YawavePublications\Domain\Model\Portal;
use Interspark\YawavePublications\Domain\Model\Publication;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class PortalService {
	
	private $portalRepository;
	private $publicationRepository;
	private $yawaveService;
	private $persistenceManager;

	public function __construct(PortalRepository $portalRepository, 
								PublicationRepository $publicationRepository, 
								YawaveService $yawaveService,
								PersistenceManager $persistenceManager)
	{
		//controller using autowire so no configuration is needed
		$this->portalRepository = $portalRepository;
		$this->publicationRepository = $publicationRepository;
		$this->yawaveService = $yawaveService;
		$this->persistenceManager = $persistenceManager;
		
	}
	
	public function update_portals($page=0)
	{
		
		$yawave_portale_pages = $this->yawaveService->get_api_endpoint_data('https://api.yawave.com/public/applications/YAWAVE_APP_ID/portals?lang=de&page=' . $page);
				
		for($portal_page=0;$portal_page<=$yawave_portale_pages->number_of_all_pages;$portal_page++) {
			
			$yawave_portale = $this->yawaveService->get_api_endpoint_data('https://api.yawave.com/public/applications/YAWAVE_APP_ID/portals?lang=de&page=' . $portal_page);
			
			if ($yawave_portale && isset($yawave_portale->content) && is_array($yawave_portale->content) && sizeof($yawave_portale->content) > 0) {
				foreach ($yawave_portale->content as $portal) {				
					$this->save_portal($portal);
				}
			} 
			
		}
		
		return true;
		
	}
	
	public function save_portal($yawave_portal)
	{
		
		$query = $this->portalRepository->createQuery();
		$query->matching($query->equals('ext_id', $yawave_portal->id));
		$result = $query->execute(true);
		
		if(count($result) == 0) {
			$portal = new Portal();
			$method = 'insert';
		}else{            
			$portal = $this->portalRepository->findByUid($result[0]['uid']);
			$method = 'update';
		}     
		
		$portal->setTitle($yawave_portal->title);
		$portal->setDescription($yawave_portal->description);
		//$portal->setHeaderImage($yawave_portal->background_image->path);
		$portal->setExtId($yawave_portal->id);
		
		$this->portalRepository->add($portal);
		
		return true;
		
	}
	
	public function assign_portal_with_publications($page = 0) {
				
		$yawave_portale = $this->yawaveService->get_api_endpoint_data('https://api.yawave.com/public/applications/YAWAVE_APP_ID/portals?lang=de&page=' . $page);
				
		if ($yawave_portale && isset($yawave_portale->content) && is_array($yawave_portale->content) && sizeof($yawave_portale->content) > 0) {
			foreach ($yawave_portale->content as $portal) {
				
				//$this->persistenceManager->persistAll();
				//$this->persistenceManager->clearState();
				
				$portal_id = $portal->id;
				$portal_publication_ids = $portal->publication_ids;
				
				$portal_query = $this->portalRepository->createQuery();
				$portal_query->matching($portal_query->equals('ext_id', $portal_id));
				$portal_result = $portal_query->execute(true);
				
				
				if(is_array($portal_publication_ids) && count($portal_publication_ids) > 0) {
					
					foreach($portal_publication_ids AS $portal_publication_id) {
						
						### publication data 
						
						$publication_query = $this->publicationRepository->createQuery();
						$publication_query->matching($publication_query->equals('ext_id', $portal_publication_id));
						$publication_result = $publication_query->execute(true);
						
						###
						
						
						if(!empty($portal_result[0]['uid']) && !empty($publication_result[0]['uid'])) {
							
							$portal_object = $this->portalRepository->findByUid($portal_result[0]['uid']);							
							$publication = $this->publicationRepository->findByUid($publication_result[0]['uid']);	
							
							$publication->addPortal($portal_object);
							
						}
						
					}			
					
				}
				
			}
		}
		
		return true;
		
	}
	
}
