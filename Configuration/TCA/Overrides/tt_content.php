<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'YawavePublications',
    'Webhook',
    'Webhook'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
     'YawavePublications',
     'PublicationDetail',
     'Yawave Publication Details'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
     'YawavePublications',
     'PublicationsList',
     'Yawave Publication Liste'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
     'YawavePublications',
     'PublicationsFilter',
     'Yawave Publication Filter'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
     'YawavePublications',
     'LiveblogDetail',
     'Yawave Liveblog Details'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
     'YawavePublications',
     'EventsList',
     'Yawave Event List'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['yawavepublications_publicationslist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'yawavepublications_publicationslist',
    'FILE:EXT:yawave_publications/Configuration/FlexForms/PublicationsList.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['yawavepublications_publicationsfilter'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'yawavepublications_publicationsfilter',
    'FILE:EXT:yawave_publications/Configuration/FlexForms/PublicationsFilter.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['yawavepublications_liveblogdetail'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'yawavepublications_liveblogdetail',
    'FILE:EXT:yawave_publications/Configuration/FlexForms/LiveblogDetail.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['yawavepublications_eventslist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'yawavepublications_eventslist',
    'FILE:EXT:yawave_publications/Configuration/FlexForms/EventsList.xml'
);