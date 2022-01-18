<?php
namespace Interspark\YawavePublications\Service;

use Interspark\YawavePublications\Domain\Repository\LiveblogsRepository;
use Interspark\YawavePublications\Domain\Repository\LiveblogEntrysRepository;
use Interspark\YawavePublications\Domain\Repository\ContentPartRepository;
use Interspark\YawavePublications\Domain\Repository\PublicationRepository;
use Interspark\YawavePublications\Domain\Model\Liveblogs;
use Interspark\YawavePublications\Domain\Model\LiveblogEntrys;
use Interspark\YawavePublications\Domain\Model\ContentPart;
use Interspark\YawavePublications\Service\YawaveService;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Resource\DuplicationBehavior;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class LiveblogsService {
	
	private $liveblogsRepository;
	private $yawaveService;
	private $persistenceManager;
	
	public function __construct(LiveblogsRepository $liveblogsRepository,
								YawaveService $yawaveService,
								ContentPartRepository $contentPartRepository,
								LiveblogEntrysRepository $liveblogEntrysRepository,
								PublicationRepository $publicationRepository,
								PersistenceManager $persistenceManager)
	{
		$this->liveblogsRepository = $liveblogsRepository;
		$this->yawaveService = $yawaveService;
		$this->contentPartRepository = $contentPartRepository;
		$this->liveblogEntrysRepository = $liveblogEntrysRepository;
		$this->publicationRepository = $publicationRepository;
		$this->persistenceManager = $persistenceManager;
		
	}
	
	public function update_liveblog_magic($post_vars) {
		
		###
		
		$event_type = $post_vars->event_type;
		
		###
		
		$url = 'https://api.yawave.com/public/applications/'.$post_vars->application_uuid.'/liveblogs/'.$post_vars->liveblog_uuid;
		$return_post_infos = $this->yawaveService->get_api_endpoint_data($url);
		
		if($event_type == "LIVE_BLOG_CREATED") {
		
			$liveblog = new Liveblogs();
			$liveblog->setExtId($post_vars->liveblog_uuid);
			$liveblog->setCreateTime(date('Y-m-d H:i:s'));
		
		}elseif($event_type == "LIVE_BLOG_UPDATED") {
		
			$liveblog = $this->liveblogsRepository->findOneByExtId($post_vars->liveblog_uuid);
			
			if(!$liveblog) {
				
				$liveblog = new Liveblogs();
				$liveblog->setExtId($post_vars->liveblog_uuid);
				$liveblog->setCreateTime(date('Y-m-d H:i:s'));
				
			}
			
		}
		
		if($event_type == "LIVE_BLOG_CREATED" || $event_type == "LIVE_BLOG_UPDATED") {
			
			### handle cover upload
			
			if (!empty($return_post_infos->image->path)) {
				
				$image_checksum = $this->contrul_sum($return_post_infos->image->path);
				$fileReference = $this->uploadImageInFile($return_post_infos->image->path);				
							
				$contentPart_query = $this->contentPartRepository->findByChecksum($image_checksum);
				
				if(count($contentPart_query) == 0) {
					
					if($fileReference) {
						$liveblog_cover = new ContentPart();				
						$liveblog_cover->setImage($fileReference);
						$liveblog_cover->setFocusX(0);
						$liveblog_cover->setFocusY(0);
						$liveblog_cover->setTitle($return_post_infos->title);
						$liveblog_cover->setDescription(((!empty($return_post_infos->description)) ? $return_post_infos->description : 0));
						$liveblog_cover->setChecksum($image_checksum);	
						
						$liveblog->setCover($liveblog_cover); 
							
					}
							
				}
				
			}
			
			###
			
			$liveblog->setSportradarId(((!empty($return_post_infos->sources[0]->sport_event_id)) ? $return_post_infos->sources[0]->sport_event_id : 0));
			$liveblog->setTitle($return_post_infos->title);
			$liveblog->setDescription(((!empty($return_post_infos->description)) ? $return_post_infos->description : 0));
			 
			$liveblog->setType(((!empty($return_post_infos->type)) ? $return_post_infos->type : 0));
			$liveblog->setLocation(((!empty($return_post_infos->location)) ? $return_post_infos->location : 0));
			$liveblog->setStartDate(((!empty($return_post_infos->start_date)) ? $return_post_infos->start_date : 0));
			$liveblog->setHomeCompetitor(((!empty($return_post_infos->home_competitor->name)) ? $return_post_infos->home_competitor->name : 0));
			$liveblog->setAwayCompetitor(((!empty($return_post_infos->away_competitor->name)) ? $return_post_infos->away_competitor->name : 0));
			$liveblog->setYawaveSources(((!empty($return_post_infos->yawave_sources[0]->type)) ? $return_post_infos->yawave_sources[0]->type : 0));
			
			$this->liveblogsRepository->add($liveblog);
			
		}elseif($event_type == "LIVE_BLOG_DELETED") {
			
			$liveblog = $this->liveblogsRepository->findOneByExtId($post_vars->liveblog_uuid);
			$this->liveblogsRepository->remove($liveblog);
		
		}
		
		$entrys = $this->handle_posts($post_vars);
		
		
	}
	
	public function contrul_sum($value) {
		
		return md5(serialize($value));
		
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
	
	public function handle_posts($post_vars) {
				
		$liveblog = $this->liveblogsRepository->findOneByExtId($post_vars->liveblog_uuid);
		
		$url = 'https://api.yawave.com/public/applications/'.$post_vars->application_uuid.'/liveblogs/'.$post_vars->liveblog_uuid.'/posts/'.$post_vars->liveblog_post_uuid.'/';
		$return_post_infos = $this->yawaveService->get_api_endpoint_data($url);
		
		if($post_vars->event_type == 'LIVE_BLOG_POST_CREATED') {
		
			$liveblogEntry = new LiveBlogEntrys();
		   
		}elseif($post_vars->event_type == 'LIVE_BLOG_POST_UPDATED') {
		
			$liveblogEntry = $this->liveblogEntrysRepository->findOneByExtId($post_vars->liveblog_post_uuid);
			
			if(!$liveblogEntry) {
				$liveblogEntry = new LiveBlogEntrys();
			}
			   
		}elseif($post_vars->event_type == 'LIVE_BLOG_POST_DELETED') {
		
			$liveblogEntry = $this->liveblogEntrysRepository->findOneByExtId($post_vars->liveblog_post_uuid);
			$liveblog->removeEntrys($liveblogEntry); 
			$this->liveblogEntrysRepository->remove($liveblogEntry);
			$this->liveblogsRepository->add($liveblog); 
		   
		}
		
		if($post_vars->event_type == 'LIVE_BLOG_POST_CREATED' || $post_vars->event_type == 'LIVE_BLOG_POST_UPDATED') {
			
			### save person infos in array
			
			if(!empty($return_post_infos->person_id)) {
			   
			   $url_categorie = 'https://api.yawave.com/public/applications/'.$post_vars->application_uuid.'/categories/'.$return_post_infos->person_id.'?lang=de';
			   $return_categorie_infos = $this->yawaveService->get_api_endpoint_data($url_categorie);
			   
			   if($return_categorie_infos->icon->source == 'CUSTOM') {
				   $person_icon = $return_categorie_infos->icon->path;
			   }else{
				   $person_icon = '';
			   }
			   
			   $person_infos = array(
				   'name' => $return_categorie_infos->name,
				   'icon' => $person_icon,
			   );
			   
		   }else{
			   
			   $person_infos = 0;
			   
		   }
		   
		  ### save action infos in array
		  
		  if(!empty($return_post_infos->action_id)) {
			  
			  $url_categorie = 'https://api.yawave.com/public/applications/'.$post_vars->application_uuid.'/categories/'.$return_post_infos->action_id.'?lang=de';
			  $return_categorie_infos = $this->yawaveService->get_api_endpoint_data($url_categorie);
			  
			  if($return_categorie_infos->icon->source == 'CUSTOM') {
				 $action_icon = $return_categorie_infos->icon->path;
				 }else{
				 $action_icon = '';
				 }
			  
			  $action_infos = array(
				  'name' => $return_categorie_infos->name,
				  'icon' => $action_icon,
			  );
			  
		  }else{
			  
			  $action_infos = 0;
			  
		  }
		   
		   
		   $liveblogEntry->setExtId($post_vars->liveblog_post_uuid);
			$liveblogEntry->setSource(((!empty($return_post_infos->source)) ? $return_post_infos->source : 0));
			$liveblogEntry->setPeriod(((!empty($return_post_infos->period)) ? $return_post_infos->period : 0));
			$liveblogEntry->setTimeMinute(((!empty($return_post_infos->minute)) ? $return_post_infos->minute : 0));
			$liveblogEntry->setTitle(((!empty($return_post_infos->title)) ? $return_post_infos->title : 0));
			$liveblogEntry->setPostContent(((!empty($return_post_infos->text)) ? $return_post_infos->text : 0));
			$liveblogEntry->setUrl(((!empty($return_post_infos->url)) ? $return_post_infos->url : 0));
			
			
			if(!empty($return_post_infos->url)) {
				
				if(strpos($return_post_infos->url, 'youtu') > 0) {
					$liveblogEntry->setUrlType('youtube');
					$liveblogEntry->setUrlFile($this->createVideoReference($return_post_infos->url));
				}elseif(strpos($return_post_infos->url, 'vimeo') > 0) {
					$liveblogEntry->setUrlType('vimeo');
					$liveblogEntry->setUrlFile($this->createVideoReference($return_post_infos->url));
				}elseif(strpos($return_post_infos->url, '.mp4') > 0 || strpos($return_post_infos->url, '.mov') > 0) {
					$liveblogEntry->setUrlType('video');
					$liveblogEntry->setUrlFile(0);
				}elseif(strpos($return_post_infos->url, '.png') > 0 || strpos($return_post_infos->url, '.jpg') > 0) {
					$liveblogEntry->setUrlType('image');
					$liveblogEntry->setUrlFile(0);
				}else{
					$liveblogEntry->setUrlType('other');
					$liveblogEntry->setUrlFile(0);
				}
				
			}
				
			$liveblogEntry->setPublicationId(((!empty($return_post_infos->publication_id)) ? $return_post_infos->publication_id : 0));
			
			### set the publication object 
					   
			   if(!empty($return_post_infos->publication_id)) {
				   
				$publication_object = $this->publicationRepository->findOneByExtId($return_post_infos->publication_id);
				
				$liveblogEntry->addPublication($publication_object);
				   
			   }
			   
			   ###
			
			$liveblogEntry->setPinned(((!empty($return_post_infos->pinned)) ? $return_post_infos->pinned : 0));
			$liveblogEntry->setCreateDate(date('Y-m-d H:i:s'));
			$liveblogEntry->setEmbedCode(((!empty($return_post_infos->embed_code)) ? $return_post_infos->embed_code : 0));
			$liveblogEntry->setTimelineTimestamp(((!empty($return_post_infos->timeline_timestamp)) ? $return_post_infos->timeline_timestamp : 0));
			$liveblogEntry->setActionId(((!empty($return_post_infos->action_id)) ? $return_post_infos->action_id : 0));
			$liveblogEntry->setPersonId(((!empty($return_post_infos->person_id)) ? $return_post_infos->person_id : 0));
				
			$liveblogEntry->setPersonInfos((($person_infos != 0) ? json_encode($person_infos) : 0));
			$liveblogEntry->setActionInfos((($action_infos != 0) ? json_encode($action_infos) : 0));
			
			$liveblogEntry->setExternalId(((!empty($return_post_infos->external_id)) ? $return_post_infos->external_id : 0));
			$liveblogEntry->setType(((!empty($return_post_infos->type)) ? $return_post_infos->type : 0));
			$liveblogEntry->setStoppageTime(((!empty($return_post_infos->stoppage_time)) ? $return_post_infos->stoppage_time : 0));
			
			if(!empty($return_post_infos->match_clock)) {				
				$liveblogEntry->setMatchClock($return_post_infos->match_clock);				
			}else{				
				if(!empty($return_post_infos->minute) && !empty($return_post_infos->second)) {					
					
					$second = (strlen($return_post_infos->second)==1) ? '0'.$return_post_infos->second : $return_post_infos->second;
					$minute = (strlen($return_post_infos->minute)==1) ? '0'.$return_post_infos->minute : $return_post_infos->minute;
						
					$liveblogEntry->setMatchClock($minute.':'.$second);					
					
					
					$liveblogEntry->setMatchClock($return_post_infos->minute.':'.$return_post_infos->second);					
				}else{					
					$liveblogEntry->setMatchClock(0);					
				}				
			}
				
			$liveblogEntry->setCompetitor(((!empty($return_post_infos->competitor)) ? json_encode($return_post_infos->competitor) : 0));			
			$liveblogEntry->setPlayers(((!empty($return_post_infos->players[0]->external_id)) ? json_encode($return_post_infos->players) : 0));
				
			$liveblogEntry->setHomeScore(((!empty($return_post_infos->home_score)) ? $return_post_infos->home_score : 0));
			$liveblogEntry->setAwayScore(((!empty($return_post_infos->away_score)) ? $return_post_infos->away_score : 0));
			$liveblogEntry->setInjuryTime(((!empty($return_post_infos->injury_time)) ? $return_post_infos->injury_time : 0));	
			
			$this->liveblogEntrysRepository->add($liveblogEntry);
			
			$liveblog->addEntrys($liveblogEntry); 
			
			$this->liveblogsRepository->add($liveblog); 
			
		}
		
	}
		
}
