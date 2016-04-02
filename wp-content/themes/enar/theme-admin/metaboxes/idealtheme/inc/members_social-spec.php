<?php

$members_social_mb = new WPAlchemy_MetaBox(array
(
	'id' => 'members_social_meta',
	'title' => esc_html__( 'Member Social Media', 'enar'),
	'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/inc/members_social-meta.php',
	'types' => array('members'),
));

/* eof */