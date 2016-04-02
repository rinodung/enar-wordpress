<?php

$enar_custom_posts_gallery = new WPAlchemy_MetaBox(array
(
    'id' => 'gallery_custom_meta',
    'title' => esc_html__( 'Gallery Slides', 'enar'), 
    'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/inc/gallery-meta.php',
	'types' => array('post'),
	'mode' => WPALCHEMY_MODE_ARRAY, //WPALCHEMY_MODE_EXTRACT
));

/* eof */