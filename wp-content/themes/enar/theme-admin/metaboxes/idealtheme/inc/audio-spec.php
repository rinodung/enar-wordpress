<?php

$enar_custom_posts_audio = new WPAlchemy_MetaBox(array
(
    'id' => 'audio_format_meta',
    'title' => esc_html__( 'Audio Meta', 'enar'),  
    'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/inc/audio-meta.php',
	'types' => array('post'),
));

/* eof */
