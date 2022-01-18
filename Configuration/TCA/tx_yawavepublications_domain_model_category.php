<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_category',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'enablecolumns' => [
        ],
        'searchFields' => 'ext_id,name,slug,used_as_interest',
        'iconfile' => 'EXT:yawave_publications/Resources/Public/Icons/tx_yawavepublications_domain_model_category.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'ext_id, name, slug, used_as_interest, parent, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, '],
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
                'foreign_table' => 'tx_yawavepublications_domain_model_category',
                'foreign_table_where' => 'AND {#tx_yawavepublications_domain_model_category}.{#pid}=###CURRENT_PID### AND {#tx_yawavepublications_domain_model_category}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],

        'ext_id' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_category.ext_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_category.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'slug' => [
            'exclude' => false,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_category.slug',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'used_as_interest' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_category.used_as_interest',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,null',
                'default' => null
            ],
        ],
        'parent' => [
            'exclude' => false,
            'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_category.parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_yawavepublications_domain_model_category',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],
            
        ],
    
    ],
];
