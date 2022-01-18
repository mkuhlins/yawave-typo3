<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'YawavePublications',
        'Webhook',
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'push'
        ],
        // non-cacheable actions
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'push'
        ]
    );
    
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'YawavePublications',
        'PublicationDetail',
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'detail',
        ],
        // non-cacheable actions
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'detail',
        ]
    );
    
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'YawavePublications',
        'PublicationsList',
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'list',
        ],
        // non-cacheable actions
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'list',
        ]
    );
    
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'YawavePublications',
        'PublicationsFilter',
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'filter',
        ],
        // non-cacheable actions
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'filter',
        ]
    );
    
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'YawavePublications',
        'LiveblogDetail',
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'liveblogdetail',
        ],
        // non-cacheable actions
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'liveblogdetail',
        ]
    );
    
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'YawavePublications',
        'EventsList',
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'eventslist',
        ],
        // non-cacheable actions
        [
            \Interspark\YawavePublications\Controller\PublicationController::class => 'eventslist',
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    webhook {
                        iconIdentifier = yawave_publications-plugin-webhook
                        title = LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawave_publications_webhook.name
                        description = LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawave_publications_webhook.description
                        tt_content_defValues {
                            CType = list
                            list_type = yawavepublications_webhook
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'yawave_publications-plugin-webhook',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:yawave_publications/Resources/Public/Icons/yawave-logo.png']
    );
    
    
    
})();
