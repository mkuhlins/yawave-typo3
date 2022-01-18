CREATE TABLE tx_yawavepublications_domain_model_publication (
	ext_id varchar(255) NOT NULL DEFAULT '',
	slug varchar(255) NOT NULL DEFAULT '',
	type varchar(255) NOT NULL DEFAULT '',
	styles varchar(255) DEFAULT NULL,
	header_content text,
	badge varchar(255) DEFAULT NULL,
	title varchar(255) NOT NULL DEFAULT '',
	content text,
	content_check_sum varchar(255) NOT NULL DEFAULT '',
	feature_image_check_sum varchar(255) NOT NULL DEFAULT '',
	kpi_metrics varchar(255) DEFAULT NULL,
	categories int(11) unsigned NOT NULL DEFAULT '0',
	cover int(11) unsigned DEFAULT '0',
	header int(11) unsigned DEFAULT '0',
	tags int(11) unsigned NOT NULL DEFAULT '0',
	portals int(11) unsigned NOT NULL DEFAULT '0',
	begin_date datetime,
	actiontools int(11) unsigned NOT NULL DEFAULT '0',
	headervideourl text,
	linkurl varchar(255) NOT NULL DEFAULT '',
	coverlanding varchar(255) NOT NULL DEFAULT '',
	yawave_event int(11) unsigned NOT NULL DEFAULT '0',
	content_url text,
	linkurl_file int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_yawavepublications_domain_model_contentpart (
	title varchar(255) NOT NULL DEFAULT '',
	description varchar(255) DEFAULT NULL,
	image int(11) unsigned NOT NULL DEFAULT '0',
	focus_x int(11) NOT NULL DEFAULT '0',
	focus_y int(11) NOT NULL DEFAULT '0',
	checksum varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_yawavepublications_domain_model_category (
	ext_id varchar(255) NOT NULL DEFAULT '',
	name varchar(255) NOT NULL DEFAULT '',
	slug varchar(255) NOT NULL DEFAULT '',
	used_as_interest varchar(255) DEFAULT NULL,
	parent int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_yawavepublications_domain_model_tag (
	ext_id varchar(255) NOT NULL DEFAULT '',
	name varchar(255) NOT NULL DEFAULT '',
	slug varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_yawavepublications_domain_model_portal (
	ext_id varchar(255) NOT NULL DEFAULT '',
	title varchar(255) NOT NULL DEFAULT '',
	description varchar(255) NOT NULL DEFAULT '',
	header_image int(11) unsigned NOT NULL DEFAULT '0',
	publication_sort text
);

CREATE TABLE tx_yawavepublications_domain_model_yawaveconnection (
	ref_id varchar(255) NOT NULL DEFAULT '',
	api_key varchar(255) NOT NULL DEFAULT '',
	api_secret varchar(255) NOT NULL DEFAULT '',
	application_id varchar(255) NOT NULL DEFAULT '',
	api_url varchar(255) NOT NULL DEFAULT '',
	publication_details_page_uid int(11) NOT NULL DEFAULT '0',
	yawave_storage_pid int(11) NOT NULL DEFAULT '0',
	api_sso_key varchar(100) NOT NULL DEFAULT 'yawave'
);

CREATE TABLE tx_yawavepublications_publication_category_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_yawavepublications_publication_tag_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_yawavepublications_publication_portal_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_yawavepublications_domain_model_actiontools (
	ext_id varchar(255) NOT NULL DEFAULT '',
	type varchar(255) NOT NULL DEFAULT '',
	label varchar(255) NOT NULL DEFAULT '',
	icon_source varchar(255) NOT NULL DEFAULT '',
	icon_name varchar(255) NOT NULL DEFAULT '',
	icon_type varchar(255) NOT NULL DEFAULT '',
	reference varchar(255) NOT NULL DEFAULT '',
	htmlcode varchar(255) NOT NULL DEFAULT '',
	active_begin varchar(255) NOT NULL DEFAULT '',
	active_end varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_yawavepublications_publication_actiontools_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_yawavepublications_domain_model_liveblogs (
	ext_id varchar(255) NOT NULL DEFAULT '',
	createtime varchar(255) NOT NULL DEFAULT '',
	sportradar_id varchar(255) NOT NULL DEFAULT '',
	title varchar(255) NOT NULL DEFAULT '',
	description varchar(255) NOT NULL DEFAULT '',
	cover int(11) unsigned NOT NULL DEFAULT '0',
	type varchar(255) NOT NULL DEFAULT '',
	status varchar(255) NOT NULL DEFAULT '',
	location varchar(255) NOT NULL DEFAULT '',
	start_date varchar(255) NOT NULL DEFAULT '',
	home_competitor varchar(255) NOT NULL DEFAULT '',
	away_competitor varchar(255) NOT NULL DEFAULT '',
	yawave_sources varchar(255) NOT NULL DEFAULT '',
	entrys int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_yawavepublications_domain_model_liveblogentrys (
	ext_id varchar(255) NOT NULL DEFAULT '',
	source varchar(255) NOT NULL DEFAULT '',
	period varchar(255) NOT NULL DEFAULT '',
	time_minute varchar(255) NOT NULL DEFAULT '',
	title varchar(255) NOT NULL DEFAULT '',
	post_content text,
	url varchar(255) NOT NULL DEFAULT '',
	publication_id varchar(255) NOT NULL DEFAULT '',
	pinned varchar(255) NOT NULL DEFAULT '',
	createdate varchar(255) NOT NULL DEFAULT '',
	embed_code text,
	timeline_timestamp varchar(255) NOT NULL DEFAULT '',
	action_id varchar(255) NOT NULL DEFAULT '',
	person_id varchar(255) NOT NULL DEFAULT '',
	person_infos varchar(255) NOT NULL DEFAULT '',
	action_infos varchar(255) NOT NULL DEFAULT '',
	external_id varchar(255) NOT NULL DEFAULT '',
	type varchar(255) NOT NULL DEFAULT '',
	stoppage_time varchar(255) NOT NULL DEFAULT '',
	match_clock varchar(255) NOT NULL DEFAULT '',
	competitor text,
	players text,
	home_score varchar(255) NOT NULL DEFAULT '',
	away_score varchar(255) NOT NULL DEFAULT '',
	injury_time varchar(255) NOT NULL DEFAULT '',
	publication int(11) unsigned NOT NULL DEFAULT '0',
	url_type varchar(255) NOT NULL DEFAULT '',
	url_file int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_yawavepublications_domain_model_liveblogentrys_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_yawavepublications_domain_model_liveblogentrys_publication_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_yawavepublications_domain_model_yawaveevent (
	title varchar(80) NOT NULL DEFAULT '',
	description varchar(160) NOT NULL DEFAULT '',
	image int(11) unsigned DEFAULT '0',
	video_url varchar(255) NOT NULL DEFAULT '',
	embed_post text,
	use_video char(1) NOT NULL DEFAULT 0,
	overlay_color varchar(10) NOT NULL DEFAULT '',
	opacity varchar(10) NOT NULL DEFAULT '',
	location_type varchar(10) NOT NULL DEFAULT '',
	show_conversions char(1) NOT NULL DEFAULT 0,
	conversion_label varchar(100) NOT NULL DEFAULT '',
	event_start_displayed char(1) NOT NULL DEFAULT 0,
	event_start varchar(100) NOT NULL DEFAULT '',
	event_end_displayed char(1) NOT NULL DEFAULT 0,
	event_end varchar(100) NOT NULL DEFAULT '',
	initial_header_type varchar(10) NOT NULL DEFAULT '',
	content_alignment varchar(10) NOT NULL DEFAULT '',
	appearance varchar(10) NOT NULL DEFAULT '',
	publication_id varchar(255) NOT NULL DEFAULT '',
	location_street varchar(200) NOT NULL DEFAULT '',
	location_number varchar(5) NOT NULL DEFAULT '',
	location_zip_code varchar(10) NOT NULL DEFAULT '',
	location_city varchar(200) NOT NULL DEFAULT '',
	location_country varchar(5) NOT NULL DEFAULT ''
);

CREATE TABLE tx_yawavepublications_publication_yawaveevent_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);