<?php
namespace Interspark\YawavePublications\Controller;

use Interspark\YawavePublications\Domain\Repository\YawaveConnectionRepository;
use Interspark\YawavePublications\Domain\Repository\PublicationRepository;
use Interspark\YawavePublications\Domain\Repository\PortalRepository;
use Interspark\YawavePublications\Domain\Repository\TagRepository;
use Interspark\YawavePublications\Domain\Repository\ContentPartRepository;
use Interspark\YawavePublications\Domain\Repository\CategoryRepository;
use Interspark\YawavePublications\Domain\Repository\LiveblogsRepository;
use Interspark\YawavePublications\Domain\Repository\LiveblogEntrysRepository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\TypoScript\TypoScriptService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Annotation\Inject;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class YawaveConnectionController extends ActionController {
	
	private $yawaveConnectionRepository;
	private $publicationRepository;
	private $portalRepository;
	private $tagRepository;
	private $categoryRepository;
	
	public function __construct(YawaveConnectionRepository $yawaveConnectionRepository,
								PublicationRepository $publicationRepository,
								PortalRepository $portalRepository,
								TagRepository $tagRepository,
								CategoryRepository $categoryRepository,
								LiveblogsRepository $liveblogsRepository,
								LiveblogEntrysRepository $liveblogEntrysRepository,
								ContentPartRepository $contentPartRepository) {
		
		$this->yawaveConnectionRepository = $yawaveConnectionRepository;
		$this->publicationRepository = $publicationRepository;
		$this->portalRepository = $portalRepository;
		$this->tagRepository = $tagRepository;
		$this->categoryRepository = $categoryRepository;
		$this->liveblogsRepository = $liveblogsRepository;
		$this->liveblogEntrysRepository = $liveblogEntrysRepository;
		$this->contentPartRepository = $contentPartRepository;
		
		$this->publicationRepository->setDefaultQuerySettings($this->publicationRepository->createQuery()->getQuerySettings()->setRespectStoragePage(false));
		$this->portalRepository->setDefaultQuerySettings($this->portalRepository->createQuery()->getQuerySettings()->setRespectStoragePage(false));
		$this->tagRepository->setDefaultQuerySettings($this->tagRepository->createQuery()->getQuerySettings()->setRespectStoragePage(false));
		$this->categoryRepository->setDefaultQuerySettings($this->categoryRepository->createQuery()->getQuerySettings()->setRespectStoragePage(false));
		$this->liveblogsRepository->setDefaultQuerySettings($this->liveblogsRepository->createQuery()->getQuerySettings()->setRespectStoragePage(false));
		$this->liveblogEntrysRepository->setDefaultQuerySettings($this->liveblogEntrysRepository->createQuery()->getQuerySettings()->setRespectStoragePage(false));
		$this->contentPartRepository->setDefaultQuerySettings($this->contentPartRepository->createQuery()->getQuerySettings()->setRespectStoragePage(false));
		
		###
		
		$creds = $this->yawaveConnectionRepository->findByUid(1);
		
		if($creds) {
			$this->storgae_pid = $creds->getYawaveStoragePid();
		}
		
		$this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
		$this->configurationManager = $this->objectManager->get(
			ConfigurationManagerInterface::class
		);
		$curentPageid = (int)GeneralUtility::_GET('id');

		if(!is_null($this->storgae_pid)) {
			$this->configurationManager->setConfiguration(
				[
					'persistence' => [
						'storagePid' => $this->storgae_pid
					],
				]
			);
		}else{
			$this->configurationManager->setConfiguration(
				[
					'persistence' => [
						'storagePid' => $curentPageid
					],
				]
			);
		}
		
	}
	
	public function setupDataAction() {
		
		$args = $this->request->getArguments();
		
		// Get Setting from database
		if(!is_null($this->yawaveConnectionRepository->findAll())) {
			$settings = $this->yawaveConnectionRepository->findAll();
		}
		
		$sitesConfigurations = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Site\SiteFinder::class)->getAllSites();
				
		foreach($sitesConfigurations as $siteConfiguration){
			$languages = $siteConfiguration->getLanguages();
		}
		
		$i = $settings->count();
		
		//$this->addFlashMessage('Hello', 'World.', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
		
		switch ($i) {
			case 0:
				break;
			case 1:
				$this->view->assign('settings', $settings->getFirst());
				break;
		}
		
		$this->view->assign('publications', $this->publicationRepository->findAll());
		$this->view->assign('portals', $this->portalRepository->findAll());
		$this->view->assign('categorys', $this->categoryRepository->findAll());
		$this->view->assign('tags', $this->tagRepository->findAll());
		$this->view->assign('liveblogs', $this->liveblogsRepository->findAll());
		
	}
	
	public function saveSettingsAction(\Interspark\YawavePublications\Domain\Model\YawaveConnection $settings){
		
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		$persistenceManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');

		$this->initializeAction();
		
		$this->yawaveConnectionRepository->add($settings);
		$persistenceManager->persistAll();
		
		$this->redirect('setupData');

	}
	
	public function resetDatabaseAction(){
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_actiontools')
			->truncate('tx_yawavepublications_domain_model_actiontools');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_category')
			->truncate('tx_yawavepublications_domain_model_category');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_contentpart')
			->truncate('tx_yawavepublications_domain_model_contentpart');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_portal')
			->truncate('tx_yawavepublications_domain_model_portal');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_publication')
			->truncate('tx_yawavepublications_domain_model_publication');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_tag')
			->truncate('tx_yawavepublications_domain_model_tag');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_publication_actiontools_mm')
			->truncate('tx_yawavepublications_publication_actiontools_mm');
			
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_publication_category_mm')
			->truncate('tx_yawavepublications_publication_category_mm');
			
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_publication_portal_mm')
			->truncate('tx_yawavepublications_publication_portal_mm');
			
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_publication_tag_mm')
			->truncate('tx_yawavepublications_publication_tag_mm');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_liveblogs')
			->truncate('tx_yawavepublications_domain_model_liveblogs');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_liveblogentrys')
			->truncate('tx_yawavepublications_domain_model_liveblogentrys');
			
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_liveblogentrys_mm')
			->truncate('tx_yawavepublications_domain_model_liveblogentrys_mm');
			
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_yawaveevent')
			->truncate('tx_yawavepublications_domain_model_yawaveevent');
			
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_publication_yawaveevent_mm')
			->truncate('tx_yawavepublications_publication_yawaveevent_mm');
		
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_liveblogentrys_publication_mm')
			->truncate('tx_yawavepublications_domain_model_liveblogentrys_publication_mm');
		
		$resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();
		$storage = $resourceFactory->getDefaultStorage();
		$folder = $storage->getFolder('/yawave_images/');
		$files = $storage->getFilesInFolder($folder);
		
		foreach($files AS $file) {
			$file->delete();
		}
		
		$this->redirect('setupData');

	}
	
	public function resetPublicationsAction(){
		
		$publications = $this->publicationRepository->findAll();
		
		foreach($publications AS $publication) {
					
			$cover = $publication->getCover();
			
			if($cover) {
			
				$cover_image = $cover->getImage();
				
				if($cover_image) {
					
					
					$cover_image_file = $cover_image->getOriginalResource()->getOriginalFile();
					if($cover_image_file) {
						$cover_image_file->delete();
					}
					
					$this->contentPartRepository->remove($cover);
					
					//DebuggerUtility::var_dump($cover_image->getOriginalResource()->getOriginalFile());
					
				}
				
			}
			
			$header = $publication->getHeader();
			
			if($header) {
			
				$header_image = $header->getImage();
				
				if($header_image) {
					
					$header_image_file = $header_image->getOriginalResource()->getOriginalFile();
					if($header_image_file) {
						$header_image_file->delete();
					}	
					$this->contentPartRepository->remove($header);	
					//DebuggerUtility::var_dump($header_image->getOriginalResource()->getOriginalFile());
					
				}
				
			}
			
		}
			
		GeneralUtility::makeInstance(ConnectionPool::class)
			->getConnectionForTable('tx_yawavepublications_domain_model_publication')
			->truncate('tx_yawavepublications_domain_model_publication');
			
		$this->redirect('setupData');

	}

}
