<?php

$portfolio_details_meta = new WPAlchemy_MetaBox(array
(
    'id' => 'portfolio_details_meta',
    'title' => esc_html__( 'Project Details', 'enar'),
    'template' => get_stylesheet_directory() . '/theme-admin/metaboxes/idealtheme/inc/details-meta.php',
	'types' => array('portfolio'),
));

/* eof */
