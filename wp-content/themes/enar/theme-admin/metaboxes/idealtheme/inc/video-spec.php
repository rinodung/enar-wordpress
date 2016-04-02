<?php

$enar_custom_posts_video = new WPAlchemy_MetaBox(array
(
    'id' => 'video_format_meta',
    'title' => esc_html__( 'Video Meta', 'enar'),  
    'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/inc/video-meta.php',
	'types' => array('post'),
));

/* eof */
