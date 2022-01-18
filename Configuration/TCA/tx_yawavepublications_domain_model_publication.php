<?php
return [
    'ctrl'    => [
        'title'                    => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication',
        'label'                    => 'title',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'versioningWS'             => true,
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'enablecolumns'            => [
        ],
        'searchFields'             => 'ext_id,slug,type,styles,header_content,badge,title,content,content_check_sum,feature_image_check_sum,kpi_metrics,begin_date,actiontools,headervideourl,linkurl,coverlanding,yawave_event,content_url,linkurl_file',
        'iconfile'                 => 'EXT:yawave_publications/Resources/Public/Icons/tx_yawavepublications_domain_model_publication.gif'
    ],
    'types'   => [
        '1' => ['showitem' => 'ext_id, slug, type, styles, header_content, badge, title, content, content_check_sum, feature_image_check_sum, kpi_metrics, begin_date, categories, cover, header, tags, portals, actiontools, headervideourl, linkurl, coverlanding, yawave_event, content_url, linkurl_file, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, '],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'special'    => 'languages',
                'items'      => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default'    => 0,
            ],
        ],
        'l10n_parent'      => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label'       => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config'      => [
                'type'                => 'select',
                'renderType'          => 'selectSingle',
                'default'             => 0,
                'items'               => [
                    ['', 0],
                ],
                'foreign_table'       => 'tx_yawavepublications_domain_model_publication',
                'foreign_table_where' => 'AND {#tx_yawavepublications_domain_model_publication}.{#pid}=###CURRENT_PID### AND {#tx_yawavepublications_domain_model_publication}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource'  => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],

        'ext_id'                  => [
            'exclude'   => true,
            'l10n_mode' => 'exclude',
            'label'     => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.ext_id',
            'config'    => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim,required',
                'default' => ''
            ],
        ],
        'slug'                    => [
            'exclude'   => false,
            'l10n_mode' => 'exclude',
            'label'     => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.slug',
            'config'    => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim,required',
                'default' => ''
            ],
        ],
        'type'                    => [
            'exclude'   => false,
            'l10n_mode' => 'exclude',
            'label'     => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.type',
            'config'    => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim,required',
                'default' => ''
            ],
        ],
        'styles'                  => [
            'exclude'   => false,
            'l10n_mode' => 'exclude',
            'label'     => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.styles',
            'config'    => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim,null',
                'default' => null
            ],
        ],
        'header_content'          => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.header_content',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols'                  => 40,
                'rows'                  => 15,
                'eval'                  => 'trim',
            ],

        ],
        'badge'                   => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.badge',
            'config'  => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim,null',
                'default' => null
            ],
        ],
        'title'                   => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.title',
            'config'  => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim,required',
                'default' => ''
            ],
        ],
        'content'                 => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.content',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols'                  => 40,
                'rows'                  => 15,
                'eval'                  => 'trim,required',
            ],

        ],
        'content_check_sum'       => [
            'exclude'   => true,
            'l10n_mode' => 'exclude',
            'label'     => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.content_check_sum',
            'config'    => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim,required',
                'default' => ''
            ],
        ],
        'feature_image_check_sum' => [
            'exclude'   => true,
            'l10n_mode' => 'exclude',
            'label'     => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.feature_image_check_sum',
            'config'    => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim',
                'default' => ''
            ],
        ],
        'kpi_metrics'             => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.kpi_metrics',
            'config'  => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim,null',
                'default' => null
            ],
        ],
        'categories'              => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.categories',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_yawavepublications_domain_model_category',
                'MM'            => 'tx_yawavepublications_publication_category_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'fieldControl'  => [
                    'editPopup'  => [
                        'disabled' => false,
                    ],
                    'addRecord'  => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'cover'                   => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.cover',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectSingle',
                'foreign_table' => 'tx_yawavepublications_domain_model_contentpart',
                'default'       => 0,
                'minitems'      => 0,
                'maxitems'      => 1,
            ],

        ],
        'header'                  => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.header',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectSingle',
                'foreign_table' => 'tx_yawavepublications_domain_model_contentpart',
                'default'       => 0,
                'minitems'      => 0,
                'maxitems'      => 1,
            ],

        ],
        'tags'                    => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.tags',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_yawavepublications_domain_model_tag',
                'MM'            => 'tx_yawavepublications_publication_tag_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'fieldControl'  => [
                    'editPopup'  => [
                        'disabled' => false,
                    ],
                    'addRecord'  => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'portals'                 => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.portals',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_yawavepublications_domain_model_portal',
                'MM'            => 'tx_yawavepublications_publication_portal_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'fieldControl'  => [
                    'editPopup'  => [
                        'disabled' => false,
                    ],
                    'addRecord'  => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'begin_date'              => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.begin_date',
            'config'  => [
                'type'    => 'input',
                'size'    => 100,
                'eval'    => 'trim,null',
                'default' => null
            ],
        ],
        'actiontools'             => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.actiontools',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_yawavepublications_domain_model_actiontools',
                'MM'            => 'tx_yawavepublications_publication_actiontools_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'fieldControl'  => [
                    'editPopup'  => [
                        'disabled' => false,
                    ],
                    'addRecord'  => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'headervideourl'          => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.headervideourl',
            'config'  => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim',
                'default' => ''
            ],
        ],
        'linkurl'          => [            
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.linkurltitle',
            'config'  => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim',
                'default' => ''
            ],
        ],
        'coverlanding'          => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.coverlanding',
            'config'  => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim',
                'default' => ''
            ],
        ],
        'yawave_event'              => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.yawave_event',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_yawavepublications_domain_model_yawaveevent',
                'MM'            => 'tx_yawavepublications_publication_yawaveevent_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'fieldControl'  => [
                    'editPopup'  => [
                        'disabled' => false,
                    ],
                    'addRecord'  => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        
        ],
        'content_url'          => [
            'exclude' => false,
            'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_publication.content_url',
            'config'  => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'trim',
                'default' => ''
            ],
        ],
        
        'linkurl_file' => [
            'exclude' => false,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_contentpart.linkurl_file',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'linkurl_file',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'linkurl_file',
                        'tablenames' => 'tx_yawavepublications_domain_model_publication',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                'youtube,vimeo'
            ),
            
        ],
        

    ],
];
