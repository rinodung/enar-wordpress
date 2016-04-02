<?php
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );

function YOUR_PREFIX_register_meta_boxes()
{
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	$prefix = 'YOUR_PREFIX_';
	$meta_box = array(
		'title' => esc_html__( 'Date Time Picker With JS Options', 'rwmb' ),

		'fields' => array(
			array(
				'name' => esc_html__( 'Date', 'rwmb' ),
				'id'   => $prefix . 'date',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => esc_html__( '(yyyy-mm-dd)', 'rwmb' ),
					'autoSize'        => true,
					'buttonText'      => esc_html__( 'Select Date', 'rwmb' ),
					'dateFormat'      => esc_html__( 'yy-mm-dd', 'rwmb' ),
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			array(
				'name' => esc_html__( 'Datetime', 'rwmb' ),
				'id'   => $prefix . 'datetime',
				'type' => 'datetime',

				// jQuery datetime picker options. See here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			array(
				'name' => esc_html__( 'Time', 'rwmb' ),
				'id'   => $prefix . 'time',
				'type' => 'time',

				// jQuery datetime picker options. See here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),
		),
	);

	new RW_Meta_Box( $meta_box );
}
