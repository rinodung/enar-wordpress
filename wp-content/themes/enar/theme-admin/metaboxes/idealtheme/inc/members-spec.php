<?php

$members_mb = new WPAlchemy_MetaBox(array
(
	'id' => 'members_details_meta',
	'title' => esc_html__( 'Member options', 'enar'),
	'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/inc/members-meta.php',
	'types' => array('members'),
));

/* eof */