<?php
namespace Interspark\YawavePublications\Service;

use Interspark\YawavePublications\Domain\Repository\PublicationRepository;
use Interspark\YawavePublications\Domain\Repository\TagRepository;
use Interspark\YawavePublications\Domain\Repository\CategoryRepository;
use Interspark\YawavePublications\Domain\Repository\ContentPartRepository;
use Interspark\YawavePublications\Domain\Repository\PortalRepository;
use Interspark\YawavePublications\Domain\Repository\ActionToolsRepository;
use Interspark\YawavePublications\Domain\Repository\YawaveConnectionRepository;
use Interspark\YawavePublications\Domain\Repository\YawaveEventRepository;
use Interspark\YawavePublications\Domain\Model\YawaveConnection;
use Interspark\YawavePublications\Domain\Model\YawaveEvent;
use Interspark\YawavePublications\Service\YawaveService;
use Interspark\YawavePublications\Domain\Model\Publication;
use Interspark\YawavePublications\Domain\Model\Tag;
use Interspark\YawavePublications\Domain\Model\Category;
use Interspark\YawavePublications\Domain\Model\ContentPart;
use Interspark\YawavePublications\Domain\Model\ActionTools;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Core\Resource\DuplicationBehavior;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Annotation\Inject;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Resource\OnlineMedia\Helpers\OnlineMediaHelperRegistry;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Database\ConnectionPool;

class PublicationService {
	
	private $publicationRepository;
	private $tagRepository;
	private $categoryRepository;
	private $yawaveService;
	private $persistenceManager;
	private $portalService;
	private $yawaveConnectionRepository;
	private $yawaveEventRepository;
	
	protected $objectManager;

	public function __construct(PublicationRepository $publicationRepository, 
								YawaveService $yawaveService, 
								TagRepository $tagRepository, 
								CategoryRepository $categoryRepository,
								PersistenceManager $persistenceManager,
								ContentPartRepository $contentPartRepository,
								PortalRepository $portalRepository,
								YawaveConnectionRepository $yawaveConnectionRepository,
								YawaveEventRepository $yawaveEventRepository,
								ActionToolsRepository $actionToolsRepository)
	{
		//controller using autowire so no configuration is needed
		$this->publicationRepository = $publicationRepository;
		$this->yawaveService = $yawaveService;
		$this->tagRepository = $tagRepository;
		$this->categoryRepository = $categoryRepository;
		$this->persistenceManager = $persistenceManager;
		$this->contentPartRepository = $contentPartRepository;
		$this->portalRepository = $portalRepository;
		$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\Extbase\\Object\\ObjectManager');
		$this->uriBuilder = $this->objectManager->get(\TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder::class);
		$this->yawaveConnectionRepository = $yawaveConnectionRepository;
		$this->yawaveEventRepository = $yawaveEventRepository;
		$this->actionToolsRepository = $actionToolsRepository;
		
	}
	
	public function injectObjectManager(\TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager)
	{
		$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\Extbase\\Object\\ObjectManager');
	}
	
	public function update_single_publication($uuid, $status = 0) 
	{
		
		$url = 'https://api.yawave.com/public/multilang/applications/YAWAVE_APP_ID/publications/'.$uuid;
		$yawave_publication = $this->yawaveService->get_api_endpoint_data($url);
		
		if($status == 'PUBLISHED') {
					
			$this->save_yawave_publication($yawave_publication, $status);
			
		}else{
			
			$this->delete_yawave_publication($yawave_publication->id);
			
		}
		
		return true;
		
	}

	public function save_yawave_publication($publication, $status = 0, $language = 'de') {
				
		$linkurl = '';
		$coverlanding = '';
		$focus_points_cover = '';
		$focus_points_header = '';

		if ($publication->type == "ARTICLE" || $publication->type == "NEWSLETTER" || $publication->type == "LANDING_PAGE" || $publication->type == "EVENT") {
			$post_content = $publication->content->html_tailored->$language;
		}

		if ($publication->type == "PDF") {
			$post_content = '<embed src="'.$publication->content->url.'" type="application/pdf" width="100%" height="600">';
		}

		if ($publication->type == "EMBED_CODE") {
			$post_content = $publication->content->embed_code->$language;
		}
		
		if ($publication->type == "LINK") {
			$post_content = $publication->content->description->$language;
			$linkurl = $publication->content->url->$language;
			$coverlanding = $publication->content->cover_landing;			
			
			if(strpos($linkurl, 'youtu') || strpos($linkurl, 'vimeo')) {

				$video_file_reference = $this->createVideoReference($linkurl);
			
			}
			
		}

		if ($publication->type == "VIDEO") {

			if(!empty($publication->content->embed_code->$language)) {

				$post_content = $publication->content->embed_code->$language;

			}elseif(strpos($publication->content->url->$language, 'youtu')) {

				$post_content = $this->yawaveService->yawave_convertYoutube($publication->content->url->$language);
			
			}

			$post_content = $post_content . '<div id="yawave-video-description">' . $publication->content->description->$language . '</div>';
			
			if(strpos($publication->content->url->$language, 'youtu') || strpos($publication->content->url->$language, 'vimeo')) {
			
				$video_file_reference = $this->createVideoReference($publication->content->url->$language);
			
			}

		}

		$category_id = $publication->main_category_id;
		
		### get beginn date if set, use this for post_date

		if(!empty($publication->begin_date)) {
			$post_date = $publication->begin_date;
		}else{
			$post_date = $publication->creation_date;
		}
		
		$publication_category_ids = $publication->category_ids;
		
		if(is_array($publication_category_ids)){
		
			if(!in_array($publication->main_category_id, $publication_category_ids)) {
				$publication_category_ids[] = $publication->main_category_id;
			}
			
		}else{
			
			if(!empty($publication->main_category_id)) {
				
				$publication_category_ids[] = $publication->main_category_id;
				
			}else{
				
				$publication_category_ids = 0;
				
			}
			
		}
		
		### handle pubication images
		
		if (!empty($publication->cover->image->$language->path)) {
					
			$cover_image_checksum = $this->contrul_sum('COVER_'.$publication->cover->image->$language->path);
			$cover_fileReference = $this->uploadImageInFile($publication->cover->image->$language->path);				
						
			$contentPart_cover_query = $this->contentPartRepository->findOneByChecksum($cover_image_checksum);
			
			//DebuggerUtility::var_dump($publication->cover->image->$language->path);
			
			if($cover_fileReference) {
				
				if(!$contentPart_cover_query) {
					$contentPart_cover = new ContentPart();		
				}else{
					$contentPart_cover = $contentPart_cover_query;	
				}
						
				$contentPart_cover->setImage($cover_fileReference);
				$contentPart_cover->setFocusX($publication->cover->image->$language->focus->x);
				$contentPart_cover->setFocusY($publication->cover->image->$language->focus->y);
				$contentPart_cover->setTitle($publication->cover->title->$language);
				$contentPart_cover->setDescription($publication->cover->description->$language);
				$contentPart_cover->setChecksum($cover_image_checksum);		
			}
			
		}
		
		if (!empty($publication->header->image->$language->path)) {
			
			$header_fileReference = $this->uploadImageInFile($publication->header->image->$language->path);
			$header_image_checksum = $this->contrul_sum('HEADER_'.$publication->header->image->$language->path);
			
			$contentPart_header_query = $this->contentPartRepository->findOneByChecksum($header_image_checksum);
			
			if($header_fileReference) {
				if(!$contentPart_header_query) {
					$contentPart_header = new ContentPart();
				}else{
					$contentPart_header = $contentPart_header_query;
				}
				
				$contentPart_header->setImage($header_fileReference);
				$contentPart_header->setFocusX($publication->header->image->$language->focus->x);
				$contentPart_header->setFocusY($publication->header->image->$language->focus->y);
				$contentPart_header->setTitle($publication->header->title->$language);
				$contentPart_header->setDescription(($publication->header->description->$language) ? $publication->header->description->$language : 0);
				$contentPart_header->setChecksum($header_image_checksum);
			}
			
		}
		
		
		
		### header video url
				
		if ($publication->header->use_video) {
			
			if(!empty($publication->header->video_url->$language)) {
				
				$video_header = $publication->header->video_url->$language;
				
			}elseif(!empty($publication->header->embed_post->$language)) {
				
				$video_header = $publication->header->embed_post->$language;
				
			}else{
				
				$video_header = 0;
				
			}
			
			
		}else{
			
			$video_header = 0;
			
		}
		
		### set event 
			
		if($publication->type == "EVENT") {
			
			$query_event = $this->yawaveEventRepository->createQuery();
			$query_event->matching($query_event->equals('publication_id', $publication->id));
			$result_event = $query_event->execute(true);
			
			if(count($result_event) == 0) {
				$event = new YawaveEvent();
			}else{            
				$event = $this->yawaveEventRepository->findOneByPublicationId($publication->id);
			}
			
			$event->setTitle($publication->header->title->$language);
			$event->setDescription(($publication->header->description->$language) ? $publication->header->description->$language : 0);
			if($contentPart_header) {
				$event->setImage($contentPart_header);
			}
			$event->setUseVideo((($publication->header->use_video) ? $publication->header->use_video : 0));
			$event->setVideoUrl((($publication->header->video_url->$language) ? $publication->header->video_url->$language : 0));
			$event->setEmbedPost((($publication->header->embed_post->$language) ? $publication->header->embed_post->$language : 0));
			$event->setOverlayColor((($publication->header->overlay_color) ? $publication->header->overlay_color : 0));
			$event->setOpacity((($publication->header->opacity) ? $publication->header->opacity : 0));
			$event->setLocationType((($publication->header->location_type) ? $publication->header->location_type : 0));
			$event->setShowConversions((($publication->header->show_conversions) ? $publication->header->show_conversions : 0));
			$event->setConversionLabel((($publication->header->conversion_label->$language) ? $publication->header->conversion_label->$language : 0));
			$event->setEventStartDisplayed($publication->header->event_start_displayed);
			$event->setEventStart((($publication->header->event_start) ? $publication->header->event_start : 0));
			$event->setEventEndDisplayed($publication->header->event_end_displayed);
			$event->setEventEnd((($publication->header->event_end) ? $publication->header->event_end : 0));
			$event->setInitialHeaderType($publication->header->initial_header_type);
			$event->setContentAlignment($publication->header->content_alignment);
			$event->setAppearance($publication->header->appearance);
			$event->setPublicationId($publication->id);
			
			$event->setLocationStreet((($publication->header->location->street) ? $publication->header->location->street : 0));
			$event->setLocationNumber((($publication->header->location->number) ? $publication->header->location->number : 0));
			$event->setLocationZipCode((($publication->header->location->zip_code) ? $publication->header->location->zip_code : 0));
			$event->setLocationCity((($publication->header->location->city) ? $publication->header->location->city : 0));
			$event->setLocationCountry((($publication->header->location->country) ? $publication->header->location->country : 0));
			
			//$this->yawaveEventRepository->add($event);
			
		}else{
			
			$event = 0;
			
		}
		
		
	
		###
		
		$args = array(
			'title' 			=> $publication->cover->title->$language,
			'alias' 			=> $this->yawaveService->slugify($publication->cover->title->$language),
			'fulltext'	 		=> $post_content,
			'state' 			=> $joomla_post_status,
			'cat_ids' 			=> (($publication_category_ids) ? $publication_category_ids : 0),
			'created' 			=> date("Y-m-d H:i:s", strtotime($post_date)),
			'uuid' 				=> $publication->id,
			'language' 			=> $language,
			'type' 				=> $publication->type,
			'tag_ids'			=> $publication->tag_ids,
			'cover' 			=> (($contentPart_cover) ? $contentPart_cover : 0),
			'header'			=> (($contentPart_header) ? $contentPart_header : 0),
			'actiontools' 		=> $publication->tools,
			'styles' 			=> 0,
			'video_header' 		=> $video_header,
			'linkurl'			=> $linkurl,
			'coverlanding' 		=> $coverlanding,
			'event'				=> $event,
			'content_url'		=> (($publication->content->url->$language) ? $publication->content->url->$language : 0),
			'video_file_ref'	=> (($video_file_reference) ? $video_file_reference : 0)
		);
		
		
		
		$query = $this->publicationRepository->createQuery();
		$query->matching($query->equals('ext_id', $args['uuid']));
		$result = $query->execute(true);
		
		if(count($result) == 0) {
			$method = 'insert';
		}else{            
			$args['typo3_uid'] = $result[0]['uid'];
			$method = 'update';
		}
		
		$this->publication_handler($method, $args, $language);

	}

	public function publication_handler($method = 'insert', $args, $language = '') {
		
		//DebuggerUtility::var_dump($args);
				
		$this->persistenceManager->persistAll();
		$this->persistenceManager->clearState();
		
		if($method == 'insert') {
			$publication = new Publication();
		}elseif($method == 'update') {
			$publication = $this->publicationRepository->findByUid($args['typo3_uid']);
		}
		
		$publication->setTitle($args['title']);
		$publication->setContent($args['fulltext']);
		$publication->setExtId($args['uuid']);
		$publication->setSlug($args['alias']);
		$publication->setType($args['type']);
		if($args['cover'] != 0){
			$publication->setCover($args['cover']);
		}
		if($args['header'] != 0){
			$publication->setHeader($args['header']);
		}
		
		if(!empty($args['video_header'])){
			$publication->setHeaderVideoUrl($args['video_header']);
		}
		
		$publication->setContentCheckSum($this->contrul_sum($args['fulltext']));
		$publication->setStyles($args['styles']);
		$publication->setBeginDate($args['created']);
		
		$publication->setLinkurl($args['linkurl']);
		$publication->setCoverlanding($args['coverlanding']);		
		
		if($args['type'] == 'EVENT'){			
			$this->clear_yawaveevents($publication);
			$publication->addYawaveEvent($args['event']);
		}
		
		if(!empty($args['content_url'])){
			$publication->setContentUrl($args['content_url']);
		}
		
		if($args['video_file_ref'] != 0) $publication->setLinkurlFile($args['video_file_ref']);
		
		$this->clear_actiontools($publication);
		
		if($args['actiontools']) {
			
			foreach($args['actiontools'] AS $tools) {
							
				$actionToolsObject = new ActionTools();
				
				if(!empty($tools->id)) {
					$actionToolsObject->setExtId($tools->id);
				}	
				
				$actionToolsObject->setLabel($tools->label->$language);
				
				if(!empty($tools->icon->source)) {
					$actionToolsObject->setIconSource($tools->icon->source);
				}
				
				if(!empty($tools->icon->name)) {
					$actionToolsObject->setIconName($tools->icon->name);
				}
				
				if(!empty($tools->icon->type)) {
					$actionToolsObject->setIconType($tools->icon->type);
				}
				
				if($tools->type == 'LINK') {
					$actionToolsObject->setReference($tools->reference->link_url->$language);
				}
				
				if(!empty($tools->active_begin)) {
					$actionToolsObject->setActiveBeginn($tools->active_begin);
				}
				
				if(!empty($tools->active_end)) {
					$actionToolsObject->setActiveEnd($tools->active_end);
				}
				
				$actionToolsObject->setType($tools->type);
				
				$actionToolsObject->setHtmlCode(0);
				
				$publication->addActionTools($actionToolsObject);
				
			}
			
			
		}
		
		
		### handle some things
		
		$this->handle_tags($args['tag_ids'], $publication);
		$this->handle_categories($args['cat_ids'], $publication);
		
		$this->assign_portal_with_publication(0, $args['uuid'], $publication);
		
		$this->publicationRepository->add($publication);
		
		### save link to alternativeLocationUrl
		
		$this->save_yawave_alternativeLocationUrl($args);
		
		###
		
		return true;

	}

	public function delete_yawave_publication($publication_uuid) {
		
		$query = $this->publicationRepository->createQuery();
		$query->matching($query->equals('ext_id', $publication_uuid));
		$result = $query->execute(true);
	
		$publication = $this->publicationRepository->findByUid($result[0]['uid']);        
		
		if(count($result) > 0) {
			$this->clear_actiontools($publication);
			$this->clear_yawaveevents($publication);
			$this->clear_tags($publication);
			$this->clear_categories($publication);
			$this->clear_portals($publication);		
			$this->clear_contentparts($publication);
			$this->publicationRepository->remove($publication);			
		}
	
		return true;

	}
	
	public function handle_tags($tag_ids, $publication) {
		
		$this->clear_tags($publication);
		
		if(is_array($tag_ids) && count($tag_ids) > 0) {
			
			foreach($tag_ids AS $tag_id) {
				
				$query = $this->tagRepository->createQuery();
				$query->matching($query->equals('ext_id', $tag_id));
				$result = $query->execute(true);
				
				if(!empty($result[0]['uid'])) {
				
					$tag = $this->tagRepository->findByUid($result[0]['uid']);
					
					$publication->addTag($tag);
					
					
				}
				
			}			
			
		}
		
		return true;
		
	}
	
	public function clear_tags($publication) {
		
		$tags_Storage = $publication->getTags();
		$publication->getTags()->removeAll($tags_Storage);
		return true;
		
	}
	
	public function handle_categories($categorie_ids, $publication) {
		
		$this->clear_categories($publication);
		
		if(is_array($categorie_ids) && count($categorie_ids) > 0) {
			
			foreach($categorie_ids AS $categorie_id) {
				
				$query = $this->categoryRepository->createQuery();
				$query->matching($query->equals('ext_id', $categorie_id));
				$result = $query->execute(true);
				
				if(!empty($result[0]['uid'])) {
				
					$tag = $this->categoryRepository->findByUid($result[0]['uid']);
					$publication->addCategory($tag);
					
				}
				
			}			
			
		}
		
		return true;
		
	}
	
	public function clear_categories($publication) {
		
		$tags_Storage = $publication->getCategories();
		$publication->getCategories()->removeAll($tags_Storage);
		return true;
		
	}
	
	public function uploadImageInFile($imageUrl)
	{
		
		$mediaFolder = 'yawave_images';
		
		$resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();
		$storage = $resourceFactory->getDefaultStorage();
	
		if($storage->hasFolder($mediaFolder)){
			$targetFolder = $storage->getFolder($mediaFolder);
		}else{
			$targetFolder = $storage->createFolder($mediaFolder);
		}
		
		$imageInfo = pathinfo($imageUrl);
		$imageName = $imageInfo['basename'];
		
		$externalFile = GeneralUtility::getUrl($imageUrl);
		
		if($imageInfo['extension'] !== NULL){
			
			$tempFileName = tempnam(sys_get_temp_dir(), $imageInfo['extension']);
			
			$handle       = fopen($tempFileName, "w");
			fwrite($handle, $externalFile);
			fclose($handle);
			
			if(!$targetFolder->hasFile($imageName)){
				
				$imageFile = $targetFolder->addFile($tempFileName, $imageName, DuplicationBehavior::RENAME);
			
			}else{
				
				$imageFile = $targetFolder->getStorage()->getFileInFolder($imageName, $targetFolder);
				
			}
								
			$fileResourceReference = new \TYPO3\CMS\Core\Resource\FileReference(array('uid_local' => $imageFile->getUid()));
			$fileSysReference = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Domain\Model\FileReference::class);
			$fileSysReference->setOriginalResource($fileResourceReference);
				
			return $fileSysReference;
			
		}else{
			
			return false;
		
		}
		
	}
	
	public function createVideoReference(string $url) {
		
		$mediaFolder = 'yawave_images';
		
		$resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();
		$storage = $resourceFactory->getDefaultStorage();
		
		if($storage->hasFolder($mediaFolder)){
			$targetFolder = $storage->getFolder($mediaFolder);
		}else{
			$targetFolder = $storage->createFolder($mediaFolder);
		}
		
		 $file = \TYPO3\CMS\Core\Resource\OnlineMedia\Helpers\OnlineMediaHelperRegistry::getInstance()->transformUrlToFile(
			$url, 
			$targetFolder
		);
		
		$fileResourceReference = new \TYPO3\CMS\Core\Resource\FileReference(array('uid_local' => $file->getUid()));
		
		$fileSysReference = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Domain\Model\FileReference::class);
		$fileSysReference->setOriginalResource($fileResourceReference);
		
		return $fileSysReference;
		
	}
	
	public function contrul_sum($value) {
		
		return md5(serialize($value));
		
	}
	
	public function assign_portal_with_publication($page = 0, $publication_uuid, $publication) {
		
		$yawave_portale_pages = $this->yawaveService->get_api_endpoint_data('https://api.yawave.com/public/applications/YAWAVE_APP_ID/portals?lang=de&page=' . $page);
						
		for($portal_page=0;$portal_page<=$yawave_portale_pages->number_of_all_pages;$portal_page++) {
			
			$yawave_portale = $this->yawaveService->get_api_endpoint_data('https://api.yawave.com/public/applications/YAWAVE_APP_ID/portals?lang=de&page=' . $portal_page);
					
			if ($yawave_portale && isset($yawave_portale->content) && is_array($yawave_portale->content) && sizeof($yawave_portale->content) > 0) {
				foreach ($yawave_portale->content as $portal) {				
					$portal_id = $portal->id;
					$portal_publication_ids = $portal->publication_ids;				
					if(in_array($publication_uuid, $portal_publication_ids)) {					
						$portal_result = $this->portalRepository->findByExt_id($portal_id);
						$portal_object = $this->portalRepository->findByUid($portal_result[0]->getUid());
						$publication->addPortal($portal_object);					
					}				
				}
			}
		}
		
	
		return true;
		
	}
	
	
	
	public function clear_actiontools($publication) {
		
		$storage = $publication->getActionTools();
		if($storage) {
			foreach($storage AS $actiontool) {			
				$this->actionToolsRepository->remove($actiontool);			
			}		
		}
		return true;
		
	}
	
	public function clear_yawaveevents($publication) {
			
		$storage = $publication->getYawaveEvent();		
		if($storage) {
			foreach($storage AS $event) {			
				$this->yawaveEventRepository->remove($event);			
			}	
		}
		return true;
		
	}
	
	public function clear_contentparts($publication) {
				
		$storage_cover = $publication->getCover();	
		if($storage_cover) $this->contentPartRepository->remove($storage_cover);
		
		$storage_header = $publication->getHeader();		
		if($storage_header) $this->contentPartRepository->remove($storage_header);	
		
		return true;
		
	}
	
	public function clear_portals($publication) {
			
		$tags_Storage = $publication->getPortals();
		if($tags_Storage) $publication->getPortals()->removeAll($tags_Storage);
		return true;
		
	}
	
	public function get_publications_by_categorie($categories) {
		
		$query = $this->publicationRepository->createQuery();
		$query->matching($query->contains('categories', $categories));
		return $query->execute();
		
	}
	
	public function get_publications_by_portal($portal) {
		
		$query = $this->publicationRepository->createQuery();
		$query->matching($query->contains('portals', $portal));
		return $query->execute();
		
	}
	
	public function save_yawave_alternativeLocationUrl($args) {
		
		$creds = $this->yawaveConnectionRepository->findByUid(1);
				
		if(!empty($creds->getPublicationDetailsPageUid())) {
		
			$uri = $this->uriBuilder->reset()->setTargetPageUid($creds->getPublicationDetailsPageUid())->setCreateAbsoluteUri(TRUE)->build();	
			$public_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$uri.'/'.$args['alias'];
			
			$yawave_url = 'https://api.yawave.com/public/applications/'.$creds->getApplicationId().'/publications/'.$args['uuid'].'/alternativeLocationUrl?lang=de';
			
			$data = array(
				'url' => $public_url,
			);
			
			$alternativeLocationUrl = $this->yawaveService->get_api_endpoint_data($yawave_url, json_encode($data), 'PUT');
			
		}
		
		return true;
		
	}
	
	public function handle_event() {
		
		$event = new Event();
		$event->setTitle($publication->header->title->$language);
		$event->setDescription($publication->header->description->$language);
		if(count($contentPart_header_query) == 0) {
			$event->setImage($contentPart_header);
		}
		$event->setUseVideo((($publication->header->use_video) ? $publication->header->use_video : 0));
		$event->setVideoUrl((($publication->header->video_url->$language) ? $publication->header->video_url->$language : 0));
		$event->setEmbedPost((($publication->header->embed_post->$language) ? $publication->header->embed_post->$language : 0));
		$event->setOverlayColor((($publication->header->overlay_color) ? $publication->header->overlay_color : 0));
		$event->setOpacity((($publication->header->opacity) ? $publication->header->opacity : 0));
		$event->setLocationType((($publication->header->location_type) ? $publication->header->location_type : 0));
		$event->setShowConversions((($publication->header->show_conversions) ? $publication->header->show_conversions : 0));
		$event->setConversionLabel((($publication->header->conversion_label->$language) ? $publication->header->conversion_label->$language : 0));
		$event->setEventStartDisplayed($publication->header->event_start_displayed);
		$event->setEventStart((($publication->header->event_start) ? $publication->header->event_start : 0));
		$event->setEventEndDisplayed($publication->header->event_end_displayed);
		$event->setEventEnd((($publication->header->event_end) ? $publication->header->event_end : 0));
		$event->setInitialHeaderType($publication->header->initial_header_type);
		$event->setContentAlignment($publication->header->content_alignment);
		$event->setAppearance($publication->header->appearance);
		
		$this->yawaveEventRepository->add($event);
		
	}
	
}
