<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection',
        'label' => 'ref_id',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'ref_id,api_key,api_secret,application_id,api_url,publication_details_page_uid',
        'iconfile' => 'EXT:yawave_publications/Resources/Public/Icons/tx_yawavepublications_domain_model_yawaveconnection.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'ref_id, api_key, api_secret, application_id, api_url, publication_details_page_uid, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_yawavepublications_domain_model_yawaveconnection',
                'foreign_table_where' => 'AND {#tx_yawavepublications_domain_model_yawaveconnection}.{#pid}=###CURRENT_PID### AND {#tx_yawavepublications_domain_model_yawaveconnection}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'ref_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection.ref_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => '0'
            ],
        ],
        'api_key' => [
            'exclude' => true,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection.api_key',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'api_secret' => [
            'exclude' => true,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection.api_secret',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'application_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection.application_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'api_url' => [
            'exclude' => true,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection.api_url',
            'config' => [
                'type' => 'input',
                'size' => 250,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'publication_details_page_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection.publication_details_page_uid',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim,required',
                'default' => '0'
            ],
        ],
        'yawave_storage_pid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection.yawave_storage_pid',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim,required',
                'default' => '0'
            ],
        ],
        'api_sso_key' => [
            'exclude' => true,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveconnection.api_sso_key',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim,required',
                'default' => 'yawave'
            ],
        ],
    
    ],
];
