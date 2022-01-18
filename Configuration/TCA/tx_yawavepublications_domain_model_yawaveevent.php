<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent',
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
		'searchFields' => 'title,description,image,video_url,embed_post,use_video,overlay_color,opacity,location_type,show_conversions,conversion_label,event_start_displayed,event_start,event_end_displayed,event_end,initial_header_type,content_alignment,appearance,publication_id, location_street, location_number, location_zip_code, location_city, location_country',
		'iconfile' => 'EXT:yawave_publications/Resources/Public/Icons/tx_yawavepublications_domain_model_yawaveevent.gif'
	],
	
	'types' => [
		'1' => ['showitem' => 'title,description,image,video_url,embed_post,use_video,overlay_color,opacity,location_type,show_conversions,conversion_label,event_start_displayed,event_start,event_end_displayed,event_end,initial_header_type,content_alignment,appearance,publication_id, location_street, location_number, location_zip_code, location_city, location_country, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, '],
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
				'foreign_table' => 'tx_yawavepublications_domain_model_yawaveevent',
				'foreign_table_where' => 'AND {#tx_yawavepublications_domain_model_yawaveevent}.{#pid}=###CURRENT_PID### AND {#tx_yawavepublications_domain_model_yawaveevent}.{#sys_language_uid} IN (-1,0)',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],

		'title' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.title',
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
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.description',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'image' => [
			'exclude' => false,
			'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.image',
			'config'  => [
				'type'          => 'select',
				'renderType'    => 'selectSingle',
				'foreign_table' => 'tx_yawavepublications_domain_model_contentpart',
				'default'       => 0,
				'minitems'      => 0,
				'maxitems'      => 1,
			],
		],
		'video_url' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.video_url',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'embed_post'                 => [
			'exclude' => false,
			'label'   => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.embed_post',
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
		'use_video' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.use_video',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'overlay_color' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.overlay_color',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'opacity' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.opacity',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'location_type' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.location_type',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'show_conversions' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.show_conversions',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'conversion_label' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.conversion_label',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'event_start_displayed' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.event_start_displayed',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'event_start' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.event_start',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'event_end_displayed' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.event_end_displayed',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'event_end' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.event_end',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'initial_header_type' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.initial_header_type',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'content_alignment' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.content_alignment',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'appearance' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.appearance',
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
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.publication_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'location_street' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.location_street',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'default' => ''
			],
		],
		'location_number' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.location_number',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'default' => ''
			],
		],
		'location_zip_code' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.location_zip_code',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'default' => ''
			],
		],
		'location_city' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.location_city',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'default' => ''
			],
		],
		'location_country' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_yawaveevent.location_country',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'default' => ''
			],
		],
	],
];
