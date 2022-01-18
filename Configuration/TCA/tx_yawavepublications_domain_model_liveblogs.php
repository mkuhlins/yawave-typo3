<?php
return [
	'ctrl' => [
		'title' => 'Liveblogs',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'enablecolumns' => [
		],
		'searchFields' => 'ext_id,createtime,sportradar_id,title,description,cover,type,status,location,start_date,home_competitor,away_competitor,yawave_sources,entrys',
		'iconfile' => 'EXT:yawave_publications/Resources/Public/Icons/tx_yawavepublications_domain_model_liveblogs.gif'
	],
	
	'types' => [
		'1' => ['showitem' => 'ext_id,createtime,sportradar_id,title,description,cover,type,status,location,start_date,home_competitor,away_competitor,yawave_sources,entrys, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, '],
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
				'foreign_table' => 'tx_yawavepublications_domain_model_liveblogs',
				'foreign_table_where' => 'AND {#tx_yawavepublications_domain_model_liveblogs}.{#pid}=###CURRENT_PID### AND {#tx_yawavepublications_domain_model_liveblogs}.{#sys_language_uid} IN (-1,0)',
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
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.ext_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'createtime' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.createtime',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'sportradar_id' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.sportradar_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'title' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.title',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'description' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.description',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'cover' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.cover',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_yawavepublications_domain_model_contentpart',
				'default' => 0,
				'minitems' => 0,
				'maxitems' => 1,
			],
		],

		'type' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.type',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'status' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.status',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'location' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.location',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'start_date' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.start_date',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'home_competitor' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.home_competitor',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'away_competitor' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.away_competitor',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'yawave_sources' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.yawave_sources',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		
		'entrys' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.entrys',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_yawavepublications_domain_model_liveblogentrys',
				'foreign_default_sortby' => 'timeline_timestamp DESC, createdate DESC',
				'MM' => 'tx_yawavepublications_domain_model_liveblogentrys_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'fieldControl' => [
					'editPopup' => [
						'disabled' => false,
					],
					'addRecord' => [
						'disabled' => false,
					],
					'listModule' => [
						'disabled' => true,
					],
				],
			],
			
		],
	
	],
];
