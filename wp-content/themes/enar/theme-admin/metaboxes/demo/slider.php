<?php
add_filter( 'rwmb_meta_boxes', 'PREFIX_register_meta_box_slider' );
function PREFIX_register_meta_box_slider( $meta_boxes )
{
	$meta_boxes[] = array(
		'title' => esc_html__( 'Slider Demo', 'textdomain' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Slider', 'rwmb' ),
				'id'   => "slider",
				'type' => 'slider',

				// Text labels displayed before and after value
				'prefix' => esc_html__( '$', 'rwmb' ),
				'suffix' => esc_html__( ' USD', 'rwmb' ),

				// jQuery UI slider options. See here http://api.jqueryui.com/slider/
				'js_options' => array(
					'min'   => 10,
					'max'   => 255,
					'step'  => 5,
				),

				'clone' => true,
			),
		),
	);
	return $meta_boxes;
}