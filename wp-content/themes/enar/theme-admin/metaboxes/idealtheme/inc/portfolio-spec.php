<?php

$enar_custom_portfolio_metabox = new WPAlchemy_MetaBox(array
(
    'id' => 'custom_portfolio_metabox',
    'title' => esc_html__( 'Project Type', 'enar'),
    'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/inc/portfolio-meta.php',
	'types' => array('portfolio'),
	'mode' => WPALCHEMY_MODE_ARRAY, //WPALCHEMY_MODE_EXTRACT
));

/* eof */
