<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function ($extKey) {
        if (TYPO3_MODE === 'BE') {
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Interspark.YawavePublications',
                'site', // Make module a submodule of 'tools'
                'tx_YawaveConnection', // Submodule key
                '', // Position
                [
                    'YawaveConnection' => 'setupData, saveSettings, resetDatabase, resetPublications'
                ],
                [
                    'access' => 'user,group',
                    'icon' => 'EXT:yawave_publications/Resources/Public/Icons/yawave-logo.png',
                    'labels' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf',
                ]
            );
        }
        
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_publication', 'EXT:yawave_publications/Resources/Private/Language/locallang_csh_tx_yawavepublications_domain_model_publication.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_publication');
    
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_contentpart', 'EXT:yawave_publications/Resources/Private/Language/locallang_csh_tx_yawavepublications_domain_model_contentpart.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_contentpart');
    
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_category', 'EXT:yawave_publications/Resources/Private/Language/locallang_csh_tx_yawavepublications_domain_model_category.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_category');
    
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_tag', 'EXT:yawave_publications/Resources/Private/Language/locallang_csh_tx_yawavepublications_domain_model_tag.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_tag');
    
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_portal', 'EXT:yawave_publications/Resources/Private/Language/locallang_csh_tx_yawavepublications_domain_model_portal.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_portal');
    
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_yawaveconnection', 'EXT:yawave_publications/Resources/Private/Language/locallang_csh_tx_yawavepublications_domain_model_yawaveconnection.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_yawaveconnection');
    
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_actiontools', 'EXT:yawave_publications/Resources/Private/Language/locallang_csh_tx_yawavepublications_domain_model_actiontools.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_actiontools');
    
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_liveblogs', 'EXT:yawave_publications/Resources/Private/Language/locallang_csh_tx_yawavepublications_domain_model_liveblogs.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_liveblogs');
    
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_liveblogentrys', 'EXT:yawave_publications/Resources/Private/Language/tx_yawavepublications_domain_model_liveblogentrys.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_liveblogentrys');
            
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_yawavepublications_domain_model_yawaveevent', 'EXT:yawave_publications/Resources/Private/Language/tx_yawavepublications_domain_model_yawaveevent.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_yawavepublications_domain_model_yawaveevent');
        
    },
    $_EXTKEY
);