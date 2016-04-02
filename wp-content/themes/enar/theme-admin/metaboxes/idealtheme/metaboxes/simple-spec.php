<?php

$custom_metabox = $simple_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta',
	'title' => 'My Custom Meta',
	'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/metaboxes/simple-meta.php',
	'types' => array('members'),
));

/* eof */