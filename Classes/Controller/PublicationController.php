<?php

namespace Interspark\YawavePublications\Controller;

use Interspark\YawavePublications\Domain\Model\Publication;
use Interspark\YawavePublications\Domain\Repository\PublicationRepository;
use Interspark\YawavePublications\Service\YawaveService;
use Interspark\YawavePublications\Service\PublicationService;
use Interspark\YawavePublications\Service\TagService;
use Interspark\YawavePublications\Service\CategoryService;
use Interspark\YawavePublications\Domain\Repository\CategoryRepository;
use Interspark\YawavePublications\Domain\Repository\PortalRepository;
use Interspark\YawavePublications\Domain\Repository\LiveblogsRepository;
use Interspark\YawavePublications\Domain\Repository\LiveblogEntrysRepository;
use Interspark\YawavePublications\Domain\Repository\YawaveEventRepository;
use Interspark\YawavePublications\Service\PortalService;
use Interspark\YawavePublications\Service\ErrorMessage;
use Interspark\YawavePublications\Service\LiveblogsService;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\TypoScript\TypoScriptService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Annotation\Inject;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class PublicationController extends ActionController
{

    private   $publicationRepository;
    private   $yawaveService;
    private   $publicationService;
    private   $tagService;
    private   $categoryService;
    private   $portalService;
    private   $persistenceManager;
    private   $categoryRepository;
    private   $portalRepository;
    private   $liveblogsService;
    private   $liveblogsRepository;
    private   $liveblogEntrysRepository;
    private   $yawaveEventRepository;
    protected $objectManager;

    public function __construct(
        PublicationRepository $publicationRepository,
        YawaveService $yawaveService,
        PublicationService $publicationService,
        TagService $tagService,
        CategoryService $categoryService,
        PortalService $portalService,
        PersistenceManager $persistenceManager,
        CategoryRepository $categoryRepository,
        PortalRepository $portalRepository,
        LiveblogsService $liveblogsService,
        LiveblogsRepository $liveblogsRepository,
        LiveblogEntrysRepository $liveblogEntrysRepository,
        YawaveEventRepository $yawaveEventRepository
    ) {
        //controller using autowire so no configuration is needed
        $this->publicationRepository    = $publicationRepository;
        $this->yawaveService            = $yawaveService;
        $this->publicationService       = $publicationService;
        $this->tagService               = $tagService;
        $this->categoryService          = $categoryService;
        $this->portalService            = $portalService;
        $this->persistenceManager       = $persistenceManager;
        $this->categoryRepository       = $categoryRepository;
        $this->portalRepository         = $portalRepository;
        $this->liveblogsRepository      = $liveblogsRepository;
        $this->liveblogEntrysRepository = $liveblogEntrysRepository;
        $this->liveblogsService         = $liveblogsService;
        $this->yawaveEventRepository    = $yawaveEventRepository;
        $this->objectManager            = GeneralUtility::makeInstance(ObjectManager::class);

    }


    public function pushAction(): string
    {

        $action = (!empty($_GET['action'])) ? $_GET['action'] : '';

        $body      = file_get_contents("php://input");
        $post_vars = json_decode($body);

        $this->yawaveService->set_api_token_and_app_id();
        
        //file_put_contents('push.log', date('Y-m-d H:i:s').' - '.print_r($post_vars, true), FILE_APPEND);
                
        if ($action == 'publication') {

            $publication_uuid   = $post_vars->publication_uuid;
            $publication_status = $post_vars->status; // states from yawave: PUBLISHED | UPDATED | DELETED

            if (!empty($publication_uuid) && !empty($publication_status)) {

                $this->categoryService->update_categories();
                $this->tagService->update_tags();
                $this->portalService->update_portals();

                $this->publicationService->update_single_publication($publication_uuid, $publication_status);

                $this->categoryService->update_categories();

                return 'publication done';

            } else {

                return false;

            }

        } elseif ($action == 'liveticker') {

            $this->liveblogsService->update_liveblog_magic($post_vars);
            return 'liveticker done';

        } else {

            return false;

        }


    }

    /**
     * action detail
     *
     * @param Publication $publication
     * @return void
     */
    public function detailAction(?Publication $publication = null): void
    {
        $this->view->assignMultiple([
            'publication' => $publication,
            'data'        => $this->configurationManager->getContentObject()->data,
        ]);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        if (!empty($this->settings['filter_by_portal_uid']) || !empty($this->settings['filter_by_categorie'])) {
            $query = $this->publicationRepository->createQuery();
            
            if((int)$this->settings['limit'] > 0) {
                $query->setLimit((int)$this->settings['limit']);
            }
            
            if ($this->settings['output_sorting'] == 'old_first') {
                $query->setOrderings(['begin_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
            } else {
                $query->setOrderings(['begin_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING]);
            }

            ###

            $filter_by_categorie = explode(',', $this->settings['filter_by_categorie']);

            if (is_array($filter_by_categorie) && !empty($filter_by_categorie[0])) {

                foreach ($filter_by_categorie as $key => $value) {
                    $category_for_filter     = $this->categoryRepository->findByUid($value);
                    $categorie_constraints[] = $query->contains('categories', $category_for_filter);
                }

            }

            ###

            $filter_by_portal_uid = explode(',', $this->settings['filter_by_portal_uid']);

            if (is_array($filter_by_portal_uid) && !empty($filter_by_portal_uid[0])) {

                foreach ($filter_by_portal_uid as $key => $value) {
                    $portal_for_filter    = $this->portalRepository->findByUid($value);
                    $portal_constraints[] = $query->contains('portals', $portal_for_filter);
                }

            }

            ###
            
            if (is_array($categorie_constraints) && is_array($portal_constraints)) {
                $publications = $query->matching(
                    $query->logicalAnd(
                        $query->logicalOr($categorie_constraints),
                        $query->logicalOr($portal_constraints)
                    )
                )->execute();
            } elseif (is_array($categorie_constraints)) {
                $publications = $query->matching(
                    $query->logicalAnd(
                        $query->logicalOr($categorie_constraints)
                    )
                )->execute();
            } elseif (is_array($portal_constraints)) {
                $publications = $query->matching(
                    $query->logicalAnd(
                        $query->logicalOr($portal_constraints)
                    )
                )->execute();
            }
        } else {
            $filter_request = $this->request->getArguments();
            if ($filter_request['filter_category'] > 0) {
                $category_for_filter = $this->categoryRepository->findByUid($filter_request['filter_category']);
                $publications        = $this->publicationService->get_publications_by_categorie($category_for_filter);
            } else {
                if ($this->settings['output_sorting'] == 'old_first') {
                    $this->publicationRepository->setDefaultOrderings(array('begin_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
                } else {
                    $this->publicationRepository->setDefaultOrderings(array('begin_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
                }
                $publications = $this->publicationRepository->findAll((int)$this->settings['limit']);
            }
        }   
            
        
        $this->view->assignMultiple([
            'categories'                 => $this->categoryService->getAllCategories(),
            'publications'               => $publications,
            'publication_detail_page_id' => $this->yawaveService->get_publication_details_page_id(),
            'selected_filter'            => ($filter_request['filter_category'] > 0) ? $filter_request['filter_category'] : 0,
            'show_categorie_filter'      => ($this->settings['show_category_filter'] == true && empty($this->settings['filter_by_categorie'])) ? 1 : 0,
            'data'                       => $this->configurationManager->getContentObject()->data,
        ]);
    }
    
    /**
     * action filter
     *
     * @return void
     */
    public function filterAction()
    {
        
        $filter_request = $this->request->getArguments();
        
        $filter_by_categorie_or = $filter_request['filter_category_or'];
        
        if(!empty($filter_request['filter_category'])) {
            
            $filter_by_categorie = $filter_request['filter_category'];
            
        }elseif (!empty($this->settings['filter_by_categorie'])) {
            
            $filter_categories_var = $this->settings['filter_by_categorie'];
            $filter_by_categorie = explode(',', $filter_categories_var);
            
        }
        
        ### set filter art
        
        if(empty($this->settings['publicationFilterArt'])) {
            $publication_filter_art = 'or';
        }else{
            $publication_filter_art = $this->settings['publicationFilterArt'];
        }
        
        ###
        
        $query = $this->publicationRepository->createQuery();
        
        ### all categories from plugin settings
        
        $plugin_settings_categories = explode(',', $this->settings['filter_by_categorie']);
        
        foreach ($plugin_settings_categories as $key => $value) {
            
            $category_info = $this->categoryRepository->findByUid($value);
            
            $category_info_parent = $category_info->getParent();
            
            if(!$category_info_parent) {
                $category_array[$value][] = $category_info;
            }else{
                $category_info_parent_uid = $category_info_parent->getUid();
                $category_array[$category_info_parent_uid][$value] = $category_info;
                //$category_array[$category_info_parent_uid][$value] = $this->categoryRepository->findByUid($category_info_parent_uid);
            }
            
            
        }
        
        ###
        
        if (is_array($filter_by_categorie) && !empty($filter_by_categorie[0])) {

            foreach ($filter_by_categorie as $key => $value) {
                $category_for_filter     = $this->categoryRepository->findByUid($value);
                $categorie_constraints[] = $query->contains('categories', $category_for_filter);
            }

        }
        
        if (is_array($filter_by_categorie_or) && !empty($filter_by_categorie_or[0])) {
        
            foreach ($filter_by_categorie_or as $key => $value) {
                $category_for_filter_or     = $this->categoryRepository->findByUid($value);
                $categorie_constraints_or[] = $query->contains('categories', $category_for_filter_or);
            }

        }

        ###

        if (is_array($categorie_constraints)) {
            
            if($publication_filter_art == 'or') {
                
                $publications = $query->matching(
                    $query->logicalAnd(
                        $query->logicalOr($categorie_constraints)
                    )
                )->execute();
                
            }elseif($publication_filter_art == 'and') {
                
                $publications = $query->matching(
                    $query->logicalAnd(
                        $query->logicalAnd($categorie_constraints)
                    )
                )->execute();
                
            }elseif($publication_filter_art == 'and_or') {
                
                //DebuggerUtility::var_dump($categorie_constraints_or);
                
                if($categorie_constraints && $categorie_constraints_or) {
                            
                    $publications = $query->matching(
                        $query->logicalAnd(
                            $query->logicalAnd($categorie_constraints),
                            $query->logicalOr($categorie_constraints_or)
                        )
                    )->execute();
                
                }elseif($categorie_constraints) {
                    
                    $publications = $query->matching(
                        $query->logicalAnd(
                            $query->logicalAnd($categorie_constraints)
                        )
                    )->execute();
                    
                }
                
            }
            
        }
        
        $this->view->assignMultiple([
            'categories'                 => $category_array,
            'publications'               => $publications,
            'portals'                    => $this->portalRepository->findAll(),
            'publication_detail_page_id' => $this->yawaveService->get_publication_details_page_id(),
            'selected_filter'            => ($filter_request['filter_category'] > 0) ? $filter_request['filter_category'] : 0,
            'publication_filter_art'     => $publication_filter_art,
            'data'                       => $this->configurationManager->getContentObject()->data,
        ]);
    }
    
    /**
     * action liveblogdetail
     *
     * @return void
     */
    public function liveblogdetailAction()
    {
       
       $liveblog_id = $this->settings['liveblog'];
       
       $entrys_uid = array();;
       
       if($liveblog_id) {
       
           $entrys_object = $this->liveblogsRepository->findByUid($liveblog_id)->getEntrys();
           
           foreach($entrys_object AS $entry) {           
               $entrys_uid[] = $entry->getUid();           
           }
           
           if(count($entrys_uid) > 0) {
           
               $query = $this->liveblogEntrysRepository->createQuery();
               
               $query->setOrderings([
                   'timeline_timestamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
                   'createdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING]);   
                       
               $entrys = $query->matching($query->in('uid', $entrys_uid))->execute();
               
           }else{
                $entrys = 0;
           }
           
           $this->view->assignMultiple([
               'liveblog'                   => $this->liveblogsRepository->findByUid($liveblog_id),
               'entrys'                     => $entrys,
               'data'                       => $this->configurationManager->getContentObject()->data,
           ]);
       
       }else{
           return false;
       }
       
    }
    
    /**
     * action eventslist
     *
     * @return void
     */
    public function eventslistAction()
    {
       
       if (!empty($this->settings['filter_by_portal_uid']) || !empty($this->settings['filter_by_categorie'])) {
           $query = $this->publicationRepository->createQuery();
           
           if((int)$this->settings['limit'] > 0) {
               $query->setLimit((int)$this->settings['limit']);
           }
           
           if ($this->settings['output_sorting'] == 'old_first') {
               $query->setOrderings(['begin_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
           } else {
               $query->setOrderings(['begin_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING]);
           }
       
           ###
       
           $filter_by_categorie = explode(',', $this->settings['filter_by_categorie']);
       
           if (is_array($filter_by_categorie) && !empty($filter_by_categorie[0])) {
       
               foreach ($filter_by_categorie as $key => $value) {
                   $category_for_filter     = $this->categoryRepository->findByUid($value);
                   $categorie_constraints[] = $query->contains('categories', $category_for_filter);
               }
       
           }
       
           ###
       
           $filter_by_portal_uid = explode(',', $this->settings['filter_by_portal_uid']);
       
           if (is_array($filter_by_portal_uid) && !empty($filter_by_portal_uid[0])) {
       
               foreach ($filter_by_portal_uid as $key => $value) {
                   $portal_for_filter    = $this->portalRepository->findByUid($value);
                   $portal_constraints[] = $query->contains('portals', $portal_for_filter);
               }
       
           }
       
           ###
           
           if (is_array($categorie_constraints) && is_array($portal_constraints)) {
               $publications = $query->matching(
                   $query->logicalAnd(
                       $query->logicalOr($categorie_constraints),
                       $query->logicalOr($portal_constraints)
                   )
               )->execute();
           } elseif (is_array($categorie_constraints)) {
               $publications = $query->matching(
                   $query->logicalAnd(
                       $query->logicalOr($categorie_constraints)
                   )
               )->execute();
           } elseif (is_array($portal_constraints)) {
               $publications = $query->matching(
                   $query->logicalAnd(
                       $query->logicalOr($portal_constraints)
                   )
               )->execute();
           }
       }
       
       
       $query_events = $this->yawaveEventRepository->createQuery();
       
       foreach($publications AS $publication) {
           
           $event_constraints[] = $publication->getExtId();
           
       }
       
       $query_events->setOrderings(['event_start' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
       
       $events = $query_events->matching(
              $query_events->logicalAnd(
                  $query_events->logicalOr($query_events->in('publication_id', $event_constraints))
              )
          )->execute();
        
        
        foreach($events AS $event) {
            
            if($this->settings['groupBy'] == 'group_by_month') {
                
                $event_start = $event->getEventStart();
                $event_start_ts = strtotime($event_start);
                $event_start_month = (int)date('n', $event_start_ts);
                $publications_output[$event_start_month][] = $this->publicationRepository->findOneByExtId($event->getPublicationId());
                
            }else{
                
                $publications_output[] = $this->publicationRepository->findOneByExtId($event->getPublicationId());
                
            }
            
        }
        
        $this->view->assignMultiple([
            'events'                   => $publications_output,
            'data'                     => $this->configurationManager->getContentObject()->data,
        ]);  
      
    }
    
}
