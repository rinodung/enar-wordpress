<?php

$enar_post_type_gallery_sc = new WPAlchemy_MetaBox(array
(
    'id' => 'post_type_gallery_sc',
    'title' => esc_html__( 'Gallery Slides', 'enar'),  
    'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/inc/gallery_sc-meta.php',
	'types' => array('sliders'),
	'mode' => WPALCHEMY_MODE_ARRAY, //WPALCHEMY_MODE_EXTRACT
));

/* eof */