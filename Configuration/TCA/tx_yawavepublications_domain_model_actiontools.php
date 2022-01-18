<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools',
		'label' => 'ext_id',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'enablecolumns' => [
		],
		'searchFields' => 'ext_id,type,label,icon_source,icon_name,icon_type,reference,htmlcode,active_begin,active_end',
		'iconfile' => 'EXT:yawave_publications/Resources/Public/Icons/tx_yawavepublications_domain_model_actiontools.gif'
	],
	'types' => [
		'1' => ['showitem' => 'ext_id,type,label,icon_source,icon_name,icon_type,reference,htmlcode,active_begin,active_end, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, '],
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
				'foreign_table' => 'tx_yawavepublications_domain_model_actiontools',
				'foreign_table_where' => 'AND {#tx_yawavepublications_domain_model_actiontools}.{#pid}=###CURRENT_PID### AND {#tx_yawavepublications_domain_model_actiontools}.{#sys_language_uid} IN (-1,0)',
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
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.ext_id',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'type' => [
			'exclude' => false,
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.type',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'label' => [
			'exclude' => false,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.label',
			'config' => [
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'icon_source' => [
			'exclude' => false,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.icon_source',
			'config' => [
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'icon_name' => [
			'exclude' => false,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.icon_name',
			'config' => [
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'icon_type' => [
			'exclude' => false,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.icon_type',
			'config' => [
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'reference' => [
			'exclude' => false,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.reference',
			'config' => [
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'htmlcode' => [
			'exclude' => false,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.htmlcode',
			'config' => [
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'active_begin' => [
			'exclude' => false,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.active_begin',
			'config' => [
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
		'active_end' => [
			'exclude' => false,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:yawave_publications/Resources/Private/Language/locallang_db.xlf:tx_yawavepublications_domain_model_actiontools.active_end',
			'config' => [
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim,required',
				'default' => ''
			],
		],
	
	],
];
