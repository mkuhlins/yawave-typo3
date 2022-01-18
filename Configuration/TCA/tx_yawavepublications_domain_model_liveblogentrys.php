<?php
return [
	'ctrl' => [
		'title' => 'Liveblog Items',
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
		'searchFields' => 'ext_id,source,period,time_minute,title,post_content,url,publication_id,pinned,createdate,embed_code,timeline_timestamp,action_id,person_id,person_infos,action_infos,external_id,type,stoppage_time,match_clock,competitor,players,home_score,away_score,injury_time,publication_id,publications,url_type,url_file',
		'iconfile' => 'EXT:yawave_publications/Resources/Public/Icons/tx_yawavepublications_domain_model_liveblogentrys.gif',
		'default_sortby' => 'timeline_timestamp DESC, createdate DESC'
	],
	
	'types' => [
		'1' => ['showitem' => 'ext_id,source,period,time_minute,title,post_content,url,publication_id,pinned,createdate,embed_code,timeline_timestamp,action_id,person_id,person_infos,action_infos,external_id,type,stoppage_time,match_clock,competitor,players,home_score,away_score,injury_time,publication_id,publications,url_type,url_file, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, '],
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
				'foreign_table' => 'tx_yawavepublications_domain_model_liveblogentrys',
				'foreign_table_where' => 'AND {#tx_yawavepublications_domain_model_liveblogentrys}.{#pid}=###CURRENT_PID### AND {#tx_yawavepublications_domain_model_liveblogentrys}.{#sys_language_uid} IN (-1,0)',
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
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.ext_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'source' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.source',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'period' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.period',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'time_minute' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.time_minute',
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
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.title',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'post_content' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.post_content',
			'config' => [
				'type' => 'text',
				'enableRichtext' => true,
				'richtextConfiguration' => 'default',
				'fieldControl' => [
					'fullScreenRichtext' => [
						'disabled' => false,
					],
				],
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
			],			
		],

		'url' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.url',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'publication_id' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.publication_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'pinned' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.pinned',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'createdate' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.createdate',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'embed_code' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.embed_code',
			'config' => [
				'type' => 'text',
				'enableRichtext' => true,
				'richtextConfiguration' => 'default',
				'fieldControl' => [
					'fullScreenRichtext' => [
						'disabled' => false,
					],
				],
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
			],			
		],

		'timeline_timestamp' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.timeline_timestamp',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'action_id' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.action_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'person_id' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.person_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'person_infos' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.person_infos',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],

		'action_infos' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.action_infos',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		
		'external_id' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.external_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
				
		'type' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.type',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
						
		'stoppage_time' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.stoppage_time',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
								
		'match_clock' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.match_clock',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		
		'competitor' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.competitor',
			'config' => [
				'type' => 'text',
				'enableRichtext' => true,
				'richtextConfiguration' => 'default',
				'fieldControl' => [
					'fullScreenRichtext' => [
						'disabled' => false,
					],
				],
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
			],	
		],
				
		'players' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.players',
			'config' => [
				'type' => 'text',
				'enableRichtext' => true,
				'richtextConfiguration' => 'default',
				'fieldControl' => [
					'fullScreenRichtext' => [
						'disabled' => false,
					],
				],
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
			],	
		],
						
		'home_score' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.home_score',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		
		'away_score' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.away_score',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
				
		'injury_time' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.injury_time',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		
		'publication' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogs.publication',
			'config' => [
				'type' 			=> 'select',
				'renderType' 	=> 'selectMultipleSideBySide',
				'foreign_table' => 'tx_yawavepublications_domain_model_publication',
				'MM' 			=> 'tx_yawavepublications_domain_model_liveblogentrys_publication_mm',
				'size' 			=> 10,
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
		
		'url_type' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_liveblogentrys.url_type',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		
		'url_file' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_contentpart.url_file',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'url_file',
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
						'fieldname' => 'url_file',
						'tablenames' => 'tx_yawavepublications_domain_model_liveblogentrys',
						'table_local' => 'sys_file',
					],
					'maxitems' => 1
				],
				'youtube,vimeo'
			),
			
		],
	
	],
];
