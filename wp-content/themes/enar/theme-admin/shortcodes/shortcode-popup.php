<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

require_once( $path_to_wp . '/wp-load.php' );

$shortcode = 'idealtheme';
$yes_and_no = array( 
				array("name" => esc_html__("No", 'enar'),
					  "value" => "no"),			 	
				array("name" => esc_html__("Yes", 'enar'),
					  "value" => "yes")
);

//=====> Animation
$animata = array( 
            array("name" => esc_html__( 'No Animation ...','enar'),"value" => "no"),
			array("name" => "bounce","value" => "bounce"),
			array("name" => "flash","value" => "flash"),
			array("name" => "pulse","value" => "pulse"),
			array("name" => "rubberBand","value" => "rubberBand"),
			array("name" => "shake","value" => "shake"),
			array("name" => "swing","value" => "swing"),
			array("name" => "tada","value" => "tada"),
			array("name" => "wobble","value" => "wobble"),
			array("name" => "jello","value" => "jello"),
			array("name" => "bounceIn","value" => "bounceIn"),
			array("name" => "bounceInDown","value" => "bounceInDown"),
			array("name" => "bounceInLeft","value" => "bounceInLeft"),
			array("name" => "bounceInRight","value" => "bounceInRight"),
			array("name" => "bounceInUp","value" => "bounceInUp"),
			array("name" => "bounceOut","value" => "bounceOut"),
			array("name" => "bounceOutDown","value" => "bounceOutDown"),
			array("name" => "bounceOutLeft","value" => "bounceOutLeft"),
			array("name" => "bounceOutRight","value" => "bounceOutRight"),
			array("name" => "bounceOutUp","value" => "bounceOutUp"),		
			array("name" => "fadeIn","value" => "fadeIn"),
			array("name" => "fadeInDown","value" => "fadeInDown"),
			array("name" => "fadeInDownBig","value" => "fadeInDownBig"),
			array("name" => "fadeInLeft","value" => "fadeInLeft"),
			array("name" => "fadeInLeftBig","value" => "fadeInLeftBig"),
			array("name" => "fadeInRight","value" => "fadeInRight"),
			array("name" => "fadeInRightBig","value" => "fadeInRightBig"),
			array("name" => "fadeInUp","value" => "fadeInUp"),
			array("name" => "fadeInUpBig","value" => "fadeInUpBig"),
			array("name" => "fadeOut","value" => "fadeOut"),
			array("name" => "fadeOutDown","value" => "fadeOutDown"),
			array("name" => "fadeOutDownBig","value" => "fadeOutDownBig"),
			array("name" => "fadeOutLeft","value" => "fadeOutLeft"),
			array("name" => "fadeOutLeftBig","value" => "fadeOutLeftBig"),
			array("name" => "fadeOutRight","value" => "fadeOutRight"),
			array("name" => "fadeOutRightBig","value" => "fadeOutRightBig"),
			array("name" => "fadeOutUp","value" => "fadeOutUp"),
			array("name" => "fadeOutUpBig","value" => "fadeOutUpBig"),
			array("name" => "flip","value" => "flip"),
			array("name" => "flipInX","value" => "flipInX"),
			array("name" => "flipInY","value" => "flipInY"),
			array("name" => "flipOutX","value" => "flipOutX"),
			array("name" => "flipOutY","value" => "flipOutY"),
			array("name" => "lightSpeedIn","value" => "lightSpeedIn"),
			array("name" => "lightSpeedOut","value" => "lightSpeedOut"),
			array("name" => "rotateIn","value" => "rotateIn"),
			array("name" => "rotateInDownLeft","value" => "rotateInDownLeft"),
			array("name" => "rotateInDownRight","value" => "rotateInDownRight"),
			array("name" => "rotateInUpLeft","value" => "rotateInUpLeft"),
			array("name" => "rotateInUpRight","value" => "rotateInUpRight"),
			array("name" => "rotateOut","value" => "rotateOut"),
			array("name" => "rotateOutDownLeft","value" => "rotateOutDownLeft"),
			array("name" => "rotateOutDownRight","value" => "rotateOutDownRight"),
			array("name" => "rotateOutUpLeft","value" => "rotateOutUpLeft"),
			array("name" => "rotateOutUpRight","value" => "rotateOutUpRight"),
			array("name" => "slideInUp","value" => "slideInUp"),
			array("name" => "slideInDown","value" => "slideInDown"),
			array("name" => "slideInLeft","value" => "slideInLeft"),
			array("name" => "slideInRight","value" => "slideInRight"),
			array("name" => "slideOutUp","value" => "slideOutUp"),
			array("name" => "slideOutDown","value" => "slideOutDown"),
			array("name" => "slideOutLeft","value" => "slideOutLeft"),
			array("name" => "slideOutRight","value" => "slideOutRight"),  
			array("name" => "zoomIn","value" => "zoomIn"),
			array("name" => "zoomInDown","value" => "zoomInDown"),
			array("name" => "zoomInLeft","value" => "zoomInLeft"),
			array("name" => "zoomInRight","value" => "zoomInRight"),
			array("name" => "zoomInUp","value" => "zoomInUp"),
			array("name" => "zoomOut","value" => "zoomOut"),
			array("name" => "zoomOutDown","value" => "zoomOutDown"),
			array("name" => "zoomOutLeft","value" => "zoomOutLeft"),
			array("name" => "zoomOutRight","value" => "zoomOutRight"),
			array("name" => "zoomOutUp","value" => "zoomOutUp"),
			array("name" => "hinge","value" => "hinge"),
			array("name" => "rollIn","value" => "rollIn"),
			array("name" => "rollOut","value" => "rollOut"),
			);
$idealtheme_shortcodes = array(
	
	//=============================================================================================> Columns
	
	array( "name" => esc_html__("Columns", 'enar'),
			"id" => "columns",
			"type" => "shortcodefather"
		),
		
		//========= Group Start 
		array( "name" => "shortcodeblock",
			   "id" => $shortcode."_column_group",
			   "type" => "shortcodeblock"
			),

			array( "name" => esc_html__("Column Width", 'enar'),
				"desc" => esc_html__("Select your column width", 'enar'),
				"id" => $shortcode."_column_type",
				"type" => "selectbox",
				"option" => array(
					array("name" => esc_html__("One Third ( 1/3 )", 'enar'),
						  "value" => "4"),
					array("name" => esc_html__("Two Thirds ( 2/3 )", 'enar'),
						  "value" => "8"),
					array("name" => esc_html__("One Fourth ( 1/4 )", 'enar'),
						  "value" => "3"),
					array("name" => esc_html__("Three Fourth ( 3/4 )", 'enar'),
						  "value" => "9"),
					array("name" => esc_html__("Two Fifth", 'enar'),
						  "value" => "5"),
					array("name" => esc_html__("Three Fifth", 'enar'), 
						  "value" => "7"),
					array("name" => esc_html__("Four Fifth", 'enar'), 
						  "value" => "11"),	  
					array("name" => esc_html__("One Sixth", 'enar'), 
						  "value" => "2"),
					array("name" => esc_html__("Five Sixth", 'enar'), 
						  "value" => "10"),
					array("name" => esc_html__("Half Sixth", 'enar'), 
						  "value" => "1"),
					array("name" => esc_html__("One Half ( 1/2 )", 'enar'), 
						  "value" => "6"),
					array("name" => esc_html__("One Column ( Full Width )", 'enar'),
						  "value" => "12"),
						  
				)
			),
			
			array( "name" => esc_html__("Background Color", 'enar'),
				   "desc" => esc_html__("Choose background color for this column", 'enar'),
				   "id" => $shortcode."_column_bg_color",
				   "type" => "color"
			), 
			
			array( "name" => esc_html__("Text Color", 'enar'),
				   "desc" => esc_html__("Choose text color for this column", 'enar'),
				   "id" => $shortcode."_column_text_color",
				   "type" => "color"
			),
			
			array( "name" => esc_html__("Text Align", 'enar'),
				"desc" => esc_html__("Choose the alignment of your column text", 'enar'),
				"id" => $shortcode."_column_text_align",
				"type" => "selectbox",
				"option" => array(
					array("name" => esc_html__("Default", 'enar'), 
						  "value" => "default"),			 	
					array("name" => esc_html__("Align Left", 'enar'), 
						  "value" => "left"),
				    array("name" => esc_html__("Align Right", 'enar'),
						  "value" => "right"),
					array("name" => esc_html__("Align Center", 'enar'),
						  "value" => "center"),	  
				)
			),
			
			array( "name" => esc_html__("Background Image", 'enar'),
				   "desc" => esc_html__("Upload an image to display in the background", 'enar'),
				   "id" => $shortcode."_column_bg_img",
				   "type" => "media"
			),
			
			array( "name" => esc_html__("Background Repeat", 'enar'),
				"desc" => esc_html__("Choose how the background image repeats", 'enar'),
				"id" => $shortcode."_column_bg_repeat",
				"type" => "selectbox",
				"option" => array(
					array("name" => esc_html__("No Repeat", 'enar'),
						  "value" => "no"),			 	
					array("name" => esc_html__("Repeat X and Y", 'enar'),
						  "value" => "x-y"),
				    array("name" => esc_html__("Repeat X", 'enar'),
						  "value" => "x"),
					array("name" => esc_html__("Repeat Y", 'enar'),
						  "value" => "y"),	  
				)
			),
			
			array( "name" => esc_html__("Background Attachment", 'enar'),
				"desc" => esc_html__("Choose background attachment type", 'enar'),
				"id" => $shortcode."_column_bg_attachment",
				"type" => "selectbox",
				"option" => array(
					array("name" => esc_html__("Scroll", 'enar'),
						  "value" => "scroll"),			 	
					array("name" => esc_html__("Fixed", 'enar'),
						  "value" => "fixed"),	  
				)
			),
			
			array( "name" => esc_html__("Background Size", 'enar'),
				"desc" => esc_html__("Choose background size ( Cover - Normal - Contain )", 'enar'),
				"id" => $shortcode."_column_bg_size",
				"type" => "selectbox",
				"option" => array(
					array("name" => esc_html__("Cover", 'enar'),
						  "value" => "cover"),			 	
					array("name" => esc_html__("Normal", 'enar'),
						  "value" => "inherit"),	 
					array("name" => esc_html__("Contain", 'enar'),
						  "value" => "contain"),	   
				)
			),
			array( "name" => esc_html__("Enable Content Padding Right-Left", 'enar'),
					   "desc" => esc_html__("This right and left padding for column content.", 'enar'),
					   "id" => $shortcode."_columns_padding_r_l",
					   "type" => "selectbox",
					   "option" => array(
					        array("name" => esc_html__("Disable Right-Left Padding", 'enar'),
								  "value" => "disable"),	
					   		array("name" => esc_html__("Enable Right-Left Padding", 'enar'), 
								  "value" => "enable"),   	
						)
			),
			array( "name" => esc_html__("Column Padding Top", 'enar'),
					   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
					   "id" => $shortcode."_columns_padding_top",
					   "type" => "text"
			),
			/*array( "name" => esc_html__("Column Padding Right", 'enar'),
					   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
					   "id" => $shortcode."_columns_padding_right",
					   "type" => "text"
			),*/
			array( "name" => esc_html__("Column Padding Bottom", 'enar'),
					   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
					   "id" => $shortcode."_columns_padding_bottom",
					   "type" => "text"
			),
			/*array( "name" => esc_html__("Column Padding Left", 'enar'),
					   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
					   "id" => $shortcode."_columns_padding_left",
					   "type" => "text"
			),*/
			array( "name" => esc_html__("Animation Delay", 'enar'),
					   "desc" => esc_html__("1000 equal one second", 'enar'),
					   "id" => $shortcode."_column_animation_delay",
					   "type" => "text"
			),
				
			array( "name" => esc_html__("Animation Type", 'enar'),
				   "desc" => esc_html__("Select the type of animation", 'enar'),
				   "id" => $shortcode."_column_animation_type",
				   "type" => "selectbox",
				   "option" => $animata
			),
			
			array( "name" => esc_html__("Column Content", 'enar'),
				   "desc" => esc_html__("Insert conlumn content here", 'enar'),
				   "id" => $shortcode."_column_content", // 1
				   "type" => "textarea"
			),
			
		array( "name" => "shortcodeblockclose",
			   "id" => $shortcode."_column_group",
			   "type" => "shortcodeblockclose"
		),
		
		array( "name" => esc_html__("Add Column", 'enar'),
			   "id" => $shortcode."_column_duplicater",
			   "group" => $shortcode."_column_group",
			   "type" => "repeatercopier"
		),
		//========== Group End
		
	array( "name" => esc_html__("Columns", 'enar'),
		   	"id" => "columns",
		    "type" => "shortcodefatherclose"),
			
	//=============================================================================================> Section
	
	array( "name" => esc_html__("Section", 'enar'),
		   "id" => "section_container",
		   "type" => "shortcodefather"
	),
	    array( "name" => esc_html__("Section Layout", 'enar'),
		   "desc" => esc_html__("Choose section content width layout ( Full - Boxed )", 'enar'),
		   "id" => $shortcode."_section_container_layout",
		   "type" => "radioimage",
		   "option" => array( 
				array("name" => esc_html__("Full", 'enar'), 
					  "value" => "full",
					  "img" => "full.png"),
				array("name" => esc_html__("Boxed", 'enar'),
					  "value"=> "boxed",
					  "img" => "boxed.png"),
				)
		),
	    
		array( "name" => esc_html__("Section Color Mode", 'enar'),
			"desc" => esc_html__("Choose the color text mode, white or black?", 'enar'),
			"id" => $shortcode."_section_container_color_mode",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Dark Text Color", 'enar'),
					  "value" => "dark"),			 	
				array("name" => esc_html__("Light Text Color", 'enar'),
					  "value" => "light"),	  
			)
		),
		
		array( "name" => esc_html__("Background Image", 'enar'),
			   "desc" => esc_html__("Upload an image to display in the background", 'enar'),
			   "id" => $shortcode."_section_container_bg_img",
			   "type" => "media"
		),
		
		array( "name" => esc_html__("Background Repeat", 'enar'),
			"desc" => esc_html__("Choose how the background image repeats", 'enar'),
			"id" => $shortcode."_section_container_bg_repeat",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("No Repeat", 'enar'), 
					  "value" => "no"),			 	
				array("name" => esc_html__("Repeat X and Y", 'enar'), 
					  "value" => "x-y"),
				array("name" => esc_html__("Repeat X", 'enar'), 
					  "value" => "x"),
				array("name" => esc_html__("Repeat Y", 'enar'), 
					  "value" => "y"),	  
			)
		),

		array( "name" => esc_html__("Background Attachment", 'enar'),
			"desc" => esc_html__("Choose background attachment type", 'enar'),
			"id" => $shortcode."_section_container_bg_attachment",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Scroll", 'enar'), 
					  "value" => "scroll"),			 	
				array("name" => esc_html__("Fixed", 'enar'), 
					  "value" => "fixed"),	  
			)
		),
		
		array( "name" => esc_html__("Background Size", 'enar'),
			"desc" => esc_html__("Choose background size ( Cover - Normal - Contain )", 'enar'),
			"id" => $shortcode."_section_container_bg_size",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Cover", 'enar'), 
					  "value" => "cover"),			 	
				array("name" => esc_html__("Normal", 'enar'), 
					  "value" => "inherit"),	 
				array("name" => esc_html__("Contain", 'enar'), 
					  "value" => "contain"),	   
			)
		), 
		
		array( "name" => esc_html__("Background Color", 'enar'),
			   "desc" => esc_html__("Choose background color for this section", 'enar'),
			   "id" => $shortcode."_section_container_bg_color",
			   "type" => "color"
		),
		
		array( "name" => esc_html__("Enable Background Overlay", 'enar'),
			   "desc" => esc_html__("Background overlay is the black color that showing to can read white text", 'enar'),
			   "id" => $shortcode."_section_container_overlay",
			   "type" => "selectbox",
			   "option" => $yes_and_no
		),
		
		//____________________________________________________________border
	    
		array( "name" => esc_html__("Border Color", 'enar'),
			   "desc" => esc_html__("Choose border color for this section", 'enar'),
			   "id" => $shortcode."_section_container_border_color",
			   "type" => "color"
		),
		
		array( "name" => esc_html__("Border Style", 'enar'),
			"desc" => esc_html__("Choose border style", 'enar'),
			"id" => $shortcode."_section_container_border_type",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("None", 'enar'), 
					  "value" => "none"),			 	
				array("name" => esc_html__("Solid", 'enar'), 
					  "value" => "solid"),	 
				array("name" => esc_html__("Dotted", 'enar'), 
					  "value" => "dotted"),	
			    array("name" => esc_html__("Dashed", 'enar'), 
					  "value" => "dashed"),   
			)
		),
		
		array( "name" => esc_html__("Border Top Width", 'enar'),
				   "desc" => esc_html__("Top border width ( Number ), for example : 1", 'enar'),
				   "id" => $shortcode."_section_container_border_t_w",
				   "type" => "text"
		),
		
		array( "name" => esc_html__("Border Right Width", 'enar'),
				   "desc" => esc_html__("Right border width ( Number ), for example : 1", 'enar'),
				   "id" => $shortcode."_section_container_border_r_w",
				   "type" => "text"
		),
		
		array( "name" => esc_html__("Border Bottom Width", 'enar'),
				   "desc" => esc_html__("Bottom border width ( Number ), for example : 1", 'enar'),
				   "id" => $shortcode."_section_container_border_b_w",
				   "type" => "text"
		),
		
		array( "name" => esc_html__("Border Left Width", 'enar'),
				   "desc" => esc_html__("Left border width ( Number ), for example : 1", 'enar'),
				   "id" => $shortcode."_section_container_border_l_w",
				   "type" => "text"
		),
		
		//____________________________________________________________Other
		
		array( "name" => esc_html__("Section Padding Top", 'enar'),
			   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
			   "id" => $shortcode."_section_padding_top",
			   "type" => "text"
		),
		
		array( "name" => esc_html__("Section Padding Bottom", 'enar'),
			   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
			   "id" => $shortcode."_section_padding_bottom",
			   "type" => "text"
		),
		
		array( "name" => esc_html__("Text Color", 'enar'),
			   "desc" => esc_html__("Choose text color for this section", 'enar'),
			   "id" => $shortcode."_section_container_text_color",
			   "type" => "color"
		),
		
		array( "name" => esc_html__("Text Align", 'enar'),
			"desc" => esc_html__("Choose the alignment of your section text", 'enar'),
			"id" => $shortcode."_section_container_text_align",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Default", 'enar'), 
					  "value" => "default"),			 	
				array("name" => esc_html__("Align Left", 'enar'), 
					  "value" => "left"),
				array("name" => esc_html__("Align Right", 'enar'), 
					  "value" => "right"),
				array("name" => esc_html__("Align Center", 'enar'), 
					  "value" => "center"),	  
			)
		),
				
		array( "name" => esc_html__("Choose Icon", 'enar'),
		   "desc" => esc_html__("Choose the icon for this section", 'enar'),
		   "id" => $shortcode."_section_container_icon",
		   "type" => "icon"
		),
		
		/*array( "name" => esc_html__("ID Title", 'enar'),
				   "desc" => esc_html__("This is ID attribute, To contact between your section and one page menu.", 'enar'),
				   "id" => $shortcode."_section_id",
				   "type" => "text"
		),*/
			  
	array ( "name" => esc_html__("Section", 'enar'),
		   	"id" => "section_container",
		    "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Video Section
	
	array( "name" => esc_html__("Video", 'enar'),
		   "id" => "video_section",
		   "type" => "shortcodefather"
	),
		array( "name" => esc_html__("Text Color Mode", 'enar'),
			"desc" => esc_html__("Choose the color text mode, white or black?", 'enar'),
			"id" => $shortcode."_video_container_color_mode",
			"type" => "selectbox",
			"option" => array(		 	
				array("name" => esc_html__("Light Text Color", 'enar'),
					  "value" => "light"),	
				array("name" => esc_html__("Dark Text Color", 'enar'), 
					  "value" => "dark"),		    
			)
		),
		array( "name" => esc_html__("Poster Image", 'enar'),
			   "desc" => esc_html__("Upload an image to display as background ( Video Poster )", 'enar'),
			   "id" => $shortcode."_video_section_bg_img",
			   "type" => "media"
		),
		
		array( "name" => esc_html__("Poster Image Repeat", 'enar'),
			"desc" => esc_html__("Choose how the background image repeats", 'enar'),
			"id" => $shortcode."_video_section_bg_repeat",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("No Repeat", 'enar'), 
					  "value" => "no"),			 	
				array("name" => esc_html__("Repeat X and Y", 'enar'), 
					  "value" => "x-y"),
				array("name" => esc_html__("Repeat X", 'enar'), 
					  "value" => "x"),
				array("name" => esc_html__("Repeat Y", 'enar'), 
					  "value" => "y"),	  
			)
		),
		
		array( "name" => esc_html__("Poster Image Attachment", 'enar'),
			"desc" => esc_html__("Choose background attachment type", 'enar'),
			"id" => $shortcode."_video_section_bg_attachment",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Scroll", 'enar'), 
					  "value" => "scroll"),			 	
				array("name" => esc_html__("Fixed", 'enar'), 
					  "value" => "fixed"),	  
			)
		),
		
		array( "name" => esc_html__("Poster Image Size", 'enar'),
			"desc" => esc_html__("Choose background size ( Cover - Normal - Contain )", 'enar'),
			"id" => $shortcode."_video_section_bg_size",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Cover", 'enar'), 
					  "value" => "cover"),			 	
				array("name" => esc_html__("Normal", 'enar'), 
					  "value" => "inherit"),	 
				array("name" => esc_html__("Contain", 'enar'), 
					  "value" => "contain"),	   
			)
		), 
		
		array( "name" => esc_html__("Background Color", 'enar'),
			   "desc" => esc_html__("Choose background color for this video section", 'enar'),
			   "id" => $shortcode."_video_section_bg_color",
			   "type" => "color"
		),
		
		array( "name" => esc_html__("Enable Background Overlay", 'enar'),
			   "desc" => esc_html__("Background overlay is the black color that showing to can read white text", 'enar'),
			   "id" => $shortcode."_video_section_overlay",
			   "type" => "selectbox",
			   "option" => $yes_and_no
		),
		
		//____________________________________________________________border
	    
		array( "name" => esc_html__("Border Color", 'enar'),
			   "desc" => esc_html__("Choose border color for this video section", 'enar'),
			   "id" => $shortcode."_video_section_border_color",
			   "type" => "color"
		),
		
		array( "name" => esc_html__("Border Style", 'enar'),
			"desc" => esc_html__("Choose border style", 'enar'),
			"id" => $shortcode."_video_section_border_type",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("None", 'enar'), 
					  "value" => "none"),			 	
				array("name" => esc_html__("Solid", 'enar'), 
					  "value" => "solid"),	 
				array("name" => esc_html__("Dotted", 'enar'), 
					  "value" => "dotted"),	
			    array("name" => esc_html__("Dashed", 'enar'), 
					  "value" => "dashed"),   
			)
		),
		
		array( "name" => esc_html__("Border Top Width", 'enar'),
				   "desc" => esc_html__("Top border width ( Number ), for example : 1", 'enar'),
				   "id" => $shortcode."_video_section_border_t_w",
				   "type" => "text"
		),
		
		array( "name" => esc_html__("Border Right Width", 'enar'),
				   "desc" => esc_html__("Right border width ( Number ), for example : 1", 'enar'),
				   "id" => $shortcode."_video_section_border_r_w",
				   "type" => "text"
		),
		
		array( "name" => esc_html__("Border Bottom Width", 'enar'),
				   "desc" => esc_html__("Bottom border width ( Number ), for example : 1", 'enar'),
				   "id" => $shortcode."_video_section_border_b_w",
				   "type" => "text"
		),
		
		array( "name" => esc_html__("Border Left Width", 'enar'),
				   "desc" => esc_html__("Left border width ( Number ), for example : 1", 'enar'),
				   "id" => $shortcode."_video_section_border_l_w",
				   "type" => "text"
		),
		
		//____________________________________________________________Other
		
		array( "name" => esc_html__("Section Layout", 'enar'),
		   "desc" => esc_html__("Choose video section layout width ( Full - Boxed )", 'enar'),
		   "id" => $shortcode."_video_section_layout",
		   "type" => "radioimage",
		   "option" => array( 
				array("name" => esc_html__("full", 'enar'), 
					  "value" => "full",
					  "img" => "full.png"),
				array("name" => esc_html__("boxed", 'enar'), 
					  "value"=> "boxed",
					  "img" => "boxed.png"),
				)
		),
	    array( "name" => esc_html__("Padding Top", 'enar'),
			   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
			   "id" => $shortcode."_video_padding_top",
			   "type" => "text"
		),
		
		array( "name" => esc_html__("Padding Bottom", 'enar'),
			   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
			   "id" => $shortcode."_video_padding_bottom",
			   "type" => "text"
		),
		/*array( "name" => esc_html__("Section Spacer", 'enar'),
			"desc" => esc_html__("The padding space that showing on the top and bottom", 'enar'),
			"id" => $shortcode."_video_section_spacer",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Default", 'enar'), 
					  "value" => "row-large"),			 	
				array("name" => esc_html__("Medium Space", 'enar'), 
					  "value" => "row-small"),	 
				array("name" => esc_html__("Large Spacer On Top",  'enar'),
					  "value" => "row-large-top"),	
			    array("name" => esc_html__("Large Spacer On Bottom",  'enar'),
					  "value" => "row-large-bot"),  
				array("name" => esc_html__("Content Spacer",  'enar'),
					  "value" => "content"), 	
			    array("name" => esc_html__("Icons Spacer",  'enar'),
					  "value" => "icons"),    
			)
		),*/
		
		array( "name" => esc_html__("Text Color", 'enar'),
			   "desc" => esc_html__("Choose text color for this video section", 'enar'),
			   "id" => $shortcode."_video_section_text_color",
			   "type" => "color"
		),
		
		array( "name" => esc_html__("Text Align", 'enar'),
			"desc" => esc_html__("Choose the text alignment for this video section", 'enar'),
			"id" => $shortcode."_video_section_text_align",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Default", 'enar'), 
					  "value" => "default"),			 	
				array("name" => esc_html__("Align Left", 'enar'), 
					  "value" => "left"),
				array("name" => esc_html__("Align Right", 'enar'), 
					  "value" => "right"),
				array("name" => esc_html__("Align Center", 'enar'), 
					  "value" => "center"),	  
			)
		),
				
		array( "name" => esc_html__("Choose Icon", 'enar'),
		   "desc" => esc_html__("Choose the icon for this video section", 'enar'),
		   "id" => $shortcode."_video_section_icon",
		   "type" => "icon"
		),
		
		array( "name" => esc_html__("Video Frame", 'enar'),
			"desc" => esc_html__("To show the video frame graphic border", 'enar'),
			"id" => $shortcode."_video_section_youtube_frame",
			"type" => "selectbox",
			"option" => array(		 	
				array("name" => esc_html__("Yes", 'enar'), 
					  "value" => "yes"),
				array("name" => esc_html__("No", 'enar'), 
					  "value" => "no"),
			)
		),
			
		//=====> video
		array( "name" => "specialblock",
			   "id" => $shortcode."_video_section_video_type_youtube",
			   "type" => "specialblock"
		),
		
			array( "name" => esc_html__("Video Type", 'enar'),
				"desc" => esc_html__("Choose your video type", 'enar'),
				"id" => $shortcode."_video_section_video_type",
				"type" => "selectbox",
				"option" => array(
					array("name" => esc_html__("Youtube Video", 'enar'), 
						  "value" => "youtube"),			 	
					array("name" => esc_html__("Self Hosted Video", 'enar'), 
						  "value" => "hosted"),  
				)
			),
			
			array( "type" => "hidden",
				   "class" => "youtube",
			),
				
				array( "name" => esc_html__("Video ID", 'enar'),
					   "desc" => esc_html__("Youtube video ID", 'enar'),
					   "id" => $shortcode."_video_section_youtube_id",
					   "type" => "text"
				),
				
				array( "name" => esc_html__("Video Height", 'enar'),
					   "desc" => esc_html__("In pixels, Example: 600", 'enar'),
					   "id" => $shortcode."_video_section_youtube_height",
					   "type" => "text"
				),
				
				array( "name" => esc_html__("Video Controls", 'enar'),
					"desc" => esc_html__("To show or hide the video controls", 'enar'),
					"id" => $shortcode."_video_section_youtube_controls",
					"type" => "selectbox",
					"option" => array(	
					    array("name" => esc_html__("Hide Video Controls", 'enar'), 
							  "value" => "false"),	 	
						array("name" => esc_html__("Show Video Controls", 'enar'), 
							  "value" => "true"),
					    
					)
				),
				
				array( "name" => esc_html__("Video Autoplay", 'enar'),
					"desc" => esc_html__("Autoplay start playing video", 'enar'),
					"id" => $shortcode."_video_section_youtube_autoplay",
					"type" => "selectbox",
					"option" => array(	 	
						array("name" => esc_html__("Autoplay Video", 'enar'), 
							  "value" => "true"),
					    array("name" => esc_html__("Stop Playing Video", 'enar'), 
							  "value" => "false"),
					)
				),
				
				array( "name" => esc_html__("Video Mute", 'enar'),
					"desc" => esc_html__("Mute or playing the video sound", 'enar'),
					"id" => $shortcode."_video_section_youtube_mute",
					"type" => "selectbox",
					"option" => array(	 	
						array("name" => esc_html__("Mute Video Sound", 'enar'), 
							  "value" => "true"),
					    array("name" => esc_html__("Play Video Sound", 'enar'),
							  "value" => "false"),
					)
				),
				
				array( "name" => esc_html__("Video Loop", 'enar'),
					"desc" => esc_html__("Loop video to re-play again", 'enar'),
					"id" => $shortcode."_video_section_youtube_loop",
					"type" => "selectbox",
					"option" => array(	
					    array("name" => esc_html__("Play Video Once", 'enar'), 
							  "value" => "false"),	 	
						array("name" => esc_html__("Loop Video", 'enar'), 
							  "value" => "true"),
					    
					)
				),
				
			array( "type" => "hiddenclose"),
			
			array( "type" => "hidden",
				   "class" => "hosted",
			),
				array( "name" => esc_html__("MP4 Video", 'enar'),
					   "desc" => esc_html__("Upload MP4 video", 'enar'),
					   "id" => $shortcode."_video_section_hosted_mp",
			   		   "show_text" => true,
					   "type" => "media"
				),
				array( "name" => esc_html__("OGG Video", 'enar'),
					   "desc" => esc_html__("Upload OGG video", 'enar'),
					   "id" => $shortcode."_video_section_hosted_ogg",
			   		   "show_text" => true,
					   "type" => "media"
				),
				array( "name" => esc_html__("WEBM Video", 'enar'),
					   "desc" => esc_html__("Upload WEBM video", 'enar'),
					   "id" => $shortcode."_video_section_hosted_webm",
			   		   "show_text" => true,
					   "type" => "media"
				),
				array( "name" => esc_html__("Video Height", 'enar'),
					   "desc" => esc_html__("In pixels, Example: 20", 'enar'),
					   "id" => $shortcode."_video_section_hosted_height",
					   "type" => "text"
				),
			array( "type" => "hiddenclose"),
			
		array( "name" => "specialblockclose",
			   "id" => $shortcode."_video_section_video_type_youtube",
			   "type" => "specialblockclose"
		),
		//=====> video
		  
	array ( "name" => esc_html__("Video", 'enar'),
		   	"id" => "video_section",
		    "type" => "shortcodefatherclose"),
					
	//=============================================================================================> Titles
	
	array( "name" => esc_html__("Title", 'enar'),
		   "id" => "main_title",
		   "type" => "shortcodefather"
	),
	    //=====> Title
		array( "name" => "specialblock",
			   "id" => $shortcode."_title_type_options",
			   "type" => "specialblock"
		),
			array( "name" => esc_html__("Title Type", 'enar'),
				"desc" => esc_html__("Choose your title type", 'enar'),
				"id" => $shortcode."_title_type",
				"type" => "selectbox",
				"option" => array(	
					array("name" => esc_html__("Normal Title", 'enar'),
						  "value" => "normal_title"),	 	
					array("name" => esc_html__("Main Title", 'enar'), 
						  "value" => "main_title"),
					array("name" => esc_html__("Small Title", 'enar'), 
						  "value" => "small_title"),
				    array("name" => esc_html__("Full Background Title", 'enar'), 
						  "value" => "bg_title"),
				)
			),
			array( "type" => "hidden","class" => "small_title normal_title",),
			    array( "name" => esc_html__("Icon Color", 'enar'),
					   "desc" => esc_html__("Choose title icon color", 'enar'),
					   "id" => $shortcode."_title_small_icon_color",
					   "type" => "color"
				),
				array( "name" => esc_html__("Title Icon", 'enar'),
				   "desc" => esc_html__("Choose title icon", 'enar'),
				   "id" => $shortcode."_title_small_icon",
				   "type" => "icon"
				),
			array( "type" => "hiddenclose"),
			
			array( "type" => "hidden","class" => "bg_title",),

				array( "name" => esc_html__("Background Color", 'enar'),
					   "desc" => esc_html__("Choose title background color.", 'enar'),
					   "id" => $shortcode."_title_full_bg_color",
					   "type" => "color"
				),	

			array( "type" => "hiddenclose"),
			
			array( "type" => "hidden", "class" => "main_title", ),
			    //=====> has_bg title
			    array( "name" => "specialblock",
					   "id" => $shortcode."_title_type_has_bg",
					   "type" => "specialblock"
				),
					array( "name" => esc_html__("Title Footer", 'enar'),
						"desc" => esc_html__("Choose the title footer type", 'enar'),
						"id" => $shortcode."_title_footer",
						"type" => "selectbox",
						"option" => array(	
							array("name" => esc_html__("Line", 'enar'), 
								  "value" => "line"),	 	
							array("name" => esc_html__("Line With Small Circle", 'enar'), 
								  "value" => "line_dot"),
							array("name" => esc_html__("Line With Icon", 'enar'), 
								  "value" => "line_icon"),	 	
							array("name" => esc_html__("Short Line", 'enar'), 
								  "value" => "short_line"),
							array("name" => esc_html__("Side Line", 'enar'), 
								  "value" => "side_line"),	 	
							array("name" => esc_html__("None", 'enar'), 
								  "value" => "blank"),
							array("name" => esc_html__("Background Title", 'enar'), 
								  "value" => "has_bg"),	 	
						)
					),
					
					array( "type" => "hidden","class" => "has_bg",),
						array( "name" => esc_html__("Title Background Color", 'enar'),
							   "desc" => esc_html__("Choose title background color", 'enar'),
							   "id" => $shortcode."_title_has_bg_color",
							   "type" => "color"
						),
					array( "type" => "hiddenclose"),
					
					array( "type" => "hidden","class" => "line line_dot line_icon",),
						array( "name" => esc_html__("Line Color & Icon Color", 'enar'),
							   "desc" => esc_html__("Choose title icon color", 'enar'),
							   "id" => $shortcode."_title_icon_color",
							   "type" => "color"
						),	
					array( "type" => "hiddenclose"),
					
					array( "type" => "hidden","class" => "line_icon",),		
						array( "name" => esc_html__("Title Icon", 'enar'),
						   "desc" => esc_html__("Choose title icon", 'enar'),
						   "id" => $shortcode."_title_icon",
						   "type" => "icon"
						),
					array( "type" => "hiddenclose"),
					
			    array( "name" => "specialblockclose",
					   "id" => $shortcode."_title_type_has_bg",
					   "type" => "specialblockclose"
				),
		        //=====> has_bg title
				
				array( "name" => esc_html__("Title Size", 'enar'),
					"desc" => esc_html__("Choose your title size", 'enar'),
					"id" => $shortcode."_title_size",
					"type" => "selectbox",
					"option" => array(	
						array("name" => esc_html__("Standard", 'enar'), 
							  "value" => "default"),	 	
						array("name" => esc_html__("Medium", 'enar'), 
							  "value" => "small"),
					)
				),
				
			array( "type" => "hiddenclose"
			
			),
			
		array( "name" => "specialblockclose",
			   "id" => $shortcode."_title_type_options",
			   "type" => "specialblockclose"
		),
		//=====> Title
		
		array( "name" => esc_html__("Title Text", 'enar'),
			   "desc" => esc_html__("Here is your title text", 'enar'),
			   "id" => $shortcode."_title_content",
			   "type" => "textarea"
		),
			
		array( "name" => esc_html__("Title Transform", 'enar'),
			"desc" => esc_html__("To controls the title capitalization", 'enar'),
			"id" => $shortcode."_title_transform",
			"type" => "selectbox",
			"option" => array(	
				array("name" => esc_html__("Uppercase", 'enar'), 
					  "value" => "uppercase"),	 	
				array("name" => esc_html__("Capitalize", 'enar'), 
					  "value" => "capitalize"),
				array("name" => esc_html__("Lowercase", 'enar'), 
					  "value" => "lowercase"),
			    array("name" => esc_html__("None", 'enar'),
					  "value" => "none"),
				
			)
		),
		
		array( "name" => esc_html__("Text Align", 'enar'),
			"desc" => esc_html__("Choose text alignment", 'enar'),
			"id" => $shortcode."_title_text_align",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Default", 'enar'), 
					  "value" => ""),			 	
				array("name" => esc_html__("Align Left", 'enar'), 
					  "value" => "left"),
				array("name" => esc_html__("Align Right", 'enar'), 
					  "value" => "right"),
				array("name" => esc_html__("Align Center", 'enar'), 
					  "value" => "center"),	  
			)
		),
		
		array( "name" => esc_html__("Title Color", 'enar'),
			   "desc" => esc_html__("Choose title color", 'enar'),
			   "id" => $shortcode."_title_text_color",
			   "type" => "color"
		),
			  
	array ( "name" => esc_html__("Title", 'enar'),
		   	"id" => "main_title",
		    "type" => "shortcodefatherclose"),
			
	//=============================================================================================> Description
	
	array( "name" => esc_html__("Description", 'enar'),
		   "id" => "description_block",
		   "type" => "shortcodefather"
	),
	    array( "name" => esc_html__("Description Type", 'enar'),
			"desc" => esc_html__("Choose your description type", 'enar'),
			"id" => $shortcode."_description_block_type",
			"type" => "selectbox",
			"option" => array(	
				array("name" => esc_html__("Description 1", 'enar'),
					  "value" => "1"),	 	
				array("name" => esc_html__("Description 2", 'enar'), 
					  "value" => "2"),
				array("name" => esc_html__("Description 3", 'enar'), 
					  "value" => "3"),
			    array("name" => esc_html__("Description 4", 'enar'), 
					  "value" => "4"),
				array("name" => esc_html__("Description 5", 'enar'), 
					  "value" => "5"),
			)
		),
		
		array( "name" => esc_html__("Text Transform", 'enar'),
			"desc" => esc_html__("To controls text capitalization", 'enar'),
			"id" => $shortcode."_description_block_transform",
			"type" => "selectbox",
			"option" => array(
			    array("name" => esc_html__("None", 'enar'), 
					  "value" => "none"),	
				array("name" => esc_html__("Uppercase", 'enar'), 
					  "value" => "uppercase"),	 	
				array("name" => esc_html__("Capitalize", 'enar'), 
					  "value" => "capitalize"),
				array("name" => esc_html__("Lowercase", 'enar'), 
					  "value" => "lowercase"),
			)
		),
		
		array( "name" => esc_html__("Text Align", 'enar'),
			"desc" => esc_html__("Choose text alignment", 'enar'),
			"id" => $shortcode."_description_block_text_align",
			"type" => "selectbox",
			"option" => array(
				array("name" => esc_html__("Default", 'enar'), 
					  "value" => "center"),			 	
				array("name" => esc_html__("Align Left", 'enar'), 
					  "value" => "left"),
				array("name" => esc_html__("Align Right", 'enar'), 
					  "value" => "right"),
				array("name" => esc_html__("Align Center", 'enar'), 
					  "value" => "center"),	  
			)
		),
		
		array( "name" => esc_html__("Description Content", 'enar'),
			   "desc" => esc_html__("Here is your description text content", 'enar'),
			   "id" => $shortcode."_description_block_content",
			   "type" => "textarea"
		),
			  
	array ( "name" => esc_html__("Description", 'enar'),
		   	"id" => "description_block",
		    "type" => "shortcodefatherclose"),
			
	//=============================================================================================> Light Box

	array( "name" => esc_html__("Light Box", 'enar'),
		   "id" => "light_box",
		   "type" => "shortcodefather"
	),
		  
		array( "name" => "specialblock",
			   "id" => $shortcode."_light_box_type_options",
			   "type" => "specialblock"
		),
				array( "name" => esc_html__("Light Box Type", 'enar'),
					"desc" => esc_html__("Choose light box type", 'enar'),
					"id" => $shortcode."_light_box_type",
					"type" => "selectbox",
					"option" => array(	
						array("name" => esc_html__("Dialog", 'enar'), 
							  "value" => "dialog"),	 	
						array("name" => esc_html__("Image", 'enar'), 
							  "value" => "image"),
						array("name" => esc_html__("Gallery", 'enar'), 
							  "value" => "gallery"),
					    array("name" => esc_html__("Iframe", 'enar'), 
							  "value" => "iframe"),
						array("name" => esc_html__("Ajax", 'enar'), 
							  "value" => "ajax"),
					)
				),
				
				array( "type" => "hidden","class" => "dialog",),
			        array( "name" => esc_html__("Button Title", 'enar'),
							"desc" => esc_html__("The button title content", 'enar'),
							"id" => $shortcode."_light_box_type_dialog_btntext",
							"type" => "text"
					),
					array( "name" => esc_html__("Button Color", 'enar'),
						   "desc" => esc_html__("Choose button background color", 'enar'),
						   "id" => $shortcode."_light_box_type_dialog_btncolor",
						   "type" => "color"
					),	
			        array( "name" => esc_html__("Light Box Type", 'enar'),
						"desc" => esc_html__("Choose light box type", 'enar'),
						"id" => $shortcode."_light_box_type_dialog_effect",
						"type" => "selectbox",
						"option" => array(	
							array("name" => esc_html__("Zoom Effect", 'enar'), 
								  "value" => "zoom"),	 	
							array("name" => esc_html__("Cube Effect", 'enar'), 
								  "value" => "move"),
						)
					),
					array( "name" => esc_html__("Dialog Content", 'enar'),
						   "desc" => esc_html__("Here is your dialog text content", 'enar'),
						   "id" => $shortcode."_light_box_type_dialog_con",
						   "type" => "textarea"
					),
				array( "type" => "hiddenclose"),
				
				array( "type" => "hidden","class" => "gallery image",),
				    //========= Group Start 
					array( "name" => "shortcodeblock",
						   "id" => $shortcode."_light_box_type_gall_group",
						   "type" => "shortcodeblock"
						),
						array( "name" => esc_html__("Column Width", 'enar'),
							"desc" => esc_html__("Select your column width", 'enar'),
							"id" => $shortcode."_light_box_type_gall_col",
							"type" => "selectbox",
							"option" => array(
								array("name" => esc_html__("One Third ( 1/3 )", 'enar'), 
									  "value" => "4"),
								array("name" => esc_html__("Two Thirds ( 2/3 )", 'enar'), 
									  "value" => "8"),
								array("name" => esc_html__("One Fourth ( 1/4 )", 'enar'), 
									  "value" => "3"),
								array("name" => esc_html__("Three Fourth ( 3/4 )", 'enar'), 
									  "value" => "9"),
								array("name" => esc_html__("Two Fifth", 'enar'), 
									  "value" => "5"),
								array("name" => esc_html__("Three Fifth", 'enar'), 
									  "value" => "7"),
								array("name" => esc_html__("Four Fifth", 'enar'), 
									  "value" => "11"),	  
								array("name" => esc_html__("One Sixth", 'enar'), 
									  "value" => "2"),
								array("name" => esc_html__("Five Sixth", 'enar'), 
									  "value" => "10"),
								array("name" => esc_html__("Half Sixth", 'enar'), 
									  "value" => "1"),
								array("name" => esc_html__("One Half ( 1/2 )", 'enar'), 
									  "value" => "6"),
								array("name" => esc_html__("One Column ( Full Width )", 'enar'), 
									  "value" => "12"),
									  
							)
						),	
						
						array( "name" => esc_html__("Image", 'enar'),
							   "desc" => esc_html__("Upload an image to display as LightBox", 'enar'),
							   "id" => $shortcode."_light_box_type_gall_img",
							   "type" => "media"
						),
		        	array( "name" => "shortcodeblockclose",
						   "id" => $shortcode."_light_box_type_gall_group",
						   "type" => "shortcodeblockclose"
					),
					
					array( "name" => esc_html__("Add Image", 'enar'),
						   "id" => $shortcode."_light_box_type_gall_duplicater",
						   "group" => $shortcode."_light_box_type_gall_group",
						   "type" => "repeatercopier"
					),//========== Group End
					
				array( "type" => "hiddenclose"),
				array( "type" => "hidden","class" => "iframe",),
					
					array( "name" => esc_html__("Iframe Type", 'enar'),
						"desc" => esc_html__("We have three types to embed", 'enar'),
						"id" => $shortcode."_light_box_iframe_type",
						"type" => "selectbox",
						"option" => array(		 	
							array("name" => esc_html__("Youtube", 'enar'),
								  "value" => "youtube"),
							array("name" => esc_html__("Vimeo", 'enar'),
								  "value" => "vimeo"),
						    array("name" => esc_html__("Google Map", 'enar'),
								  "value" => "map"),
						)
					),
						
					array( "name" => esc_html__("Iframe Title", 'enar'),
						   "desc" => esc_html__("Your iframe custom title here", 'enar'),
						   "id" => $shortcode."_light_box_iframe_title",
						   "type" => "text"
					),
					array( "name" => esc_html__("Iframe URL", 'enar'),
						   "desc" => esc_html__("The is your google map, youtube, vimeo iframe url", 'enar'),
						   "id" => $shortcode."_light_box_iframe_url",
						   "type" => "text"
					),
					
					//_____________________________________________________________________|
					
					array( "name" => "specialblock", 
						   "id" => $shortcode."_light_box_iframe_url_options",
						   "type" => "specialblock"
					),
						array( "name" => esc_html__("Iframe Container", 'enar'),
							"desc" => esc_html__("How would you like to see this iframe ?", 'enar'),
							"id" => $shortcode."_light_box_iframe_con",
							"type" => "selectbox",
							"option" => array(		 	
								array("name" => esc_html__("Using Image", 'enar'), 
									  "value" => "image"),
								array("name" => esc_html__("Using Button", 'enar'), 
									  "value" => "as_button"),
							)
						),
						
						array( "type" => "hidden","class" => "image",),
							array( "name" => esc_html__("Upload Image", 'enar'),
								   "desc" => esc_html__("Upload an image to display as background for the LightBox block", 'enar'),
								   "id" => $shortcode."_light_box_iframe_con_img",
								   "type" => "media"
							),
						array( "type" => "hiddenclose"),
						
						array( "type" => "hidden","class" => "button",),
							array( "name" => esc_html__("Button Title", 'enar'),
								   "desc" => esc_html__("Your button custom title here", 'enar'),
								   "id" => $shortcode."_light_box_iframe_con_title",
								   "type" => "text"
							),
						array( "type" => "hiddenclose"),
							
					array( "name" => "specialblockclose",
					   "id" => $shortcode."_light_box_iframe_url_options",
					   "type" => "specialblockclose"
					   
					), //_____________________________________________________________________|
					
				array( "type" => "hiddenclose"),
				
		array( "name" => "specialblockclose",
		   "id" => $shortcode."_light_box_type_options",
		   "type" => "specialblockclose"
		),	
		  
	array( "name" => esc_html__("Light Box", 'enar'),
		   	"id" => "light_box",
		    "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Accordion
	
	array( "name" => esc_html__("Accordion", 'enar'),
		   "id" => "accordion",
		   "type" => "shortcodefather"
		  ),
		    array( "name" => esc_html__("Accordion Type", 'enar'),
				   "desc" => esc_html__("Choose accordion type", 'enar'),
				   "id" => $shortcode."_accordion_type",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Accordion", 'enar'), 
							  "value" => "accordion"),			 	
						array("name" => esc_html__("Toggle", 'enar'),
							  "value" => "toggle")
						)
			),
			array( "name" => esc_html__("Accordion Arrow", 'enar'),
				   "desc" => esc_html__("Choose accordion arrow type", 'enar'),
				   "id" => $shortcode."_accordion_arrow",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Plus & Minus", 'enar'), 
							  "value" => "plus_minus"),			 	
						array("name" => esc_html__("Arrow Style", 'enar'), 
							  "value" => "arrow_style")
						)
			),
			//==>
			array( "name" => "shortcodeblock",
				   "id" => $shortcode."_accordion_group",
				   "type" => "shortcodeblock"
			),
			    array( "name" => esc_html__("Make It Expanded ?", 'enar'),
					   "desc" => esc_html__("if you want the accordion item content is opened or closed", 'enar'),
					   "id" => $shortcode."_accordion_expanded",
					   "type" => "selectbox",
					   "option" => array( 
							array("name" => esc_html__("Not Expanded", 'enar'), 
								  "value" => "no"),			 	
							array("name" => esc_html__("Expanded", 'enar'), 
								  "value" => "yes")
							)
				),
				array( "name" => esc_html__("Title", 'enar'),
				   	   "desc" => esc_html__("The title for this tab accordion item", 'enar'),
					   "id" => $shortcode."_accordion_title",
					   "type" => "text"
				),
				
				array( "name" => esc_html__("The Content Text", 'enar'),
					   "desc" => esc_html__("The content of this accordion tab item", 'enar'),
					   "id" => $shortcode."_accordion_content",
					   "type" => "textarea"
				),
				
				array( "name" => esc_html__("Choose Icon", 'enar'),
				   "desc" => esc_html__("The icon for this tab accordion item ( optional )", 'enar'),
				   "id" => $shortcode."_accordion_icon",
				   "type" => "icon"
				),	
				
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_accordion_group",
				   "type" => "shortcodeblockclose"
			),
			
			array( "name" => esc_html__("Add Accordion", 'enar'),
				   "id" => $shortcode."_accordion_duplicater",
				   "group" => $shortcode."_accordion_group",
				   "type" => "repeatercopier"
			),

	array ( "name" => esc_html__("Accordion", 'enar'),
		   	"id" => "accordion",
		    "type" => "shortcodefatherclose"),	
		   	   
	//=============================================================================================> Tabs
	
	array( "name" => esc_html__("Tabs", 'enar'),
		   "id" => "tabs",
		   "type" => "shortcodefather"
		  ),	
		    array( "name" => esc_html__("Tabs Type", 'enar'),
				   "desc" => esc_html__("Choose tabs type", 'enar'),
				   "id" => $shortcode."_tabs_type",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Style 1", 'enar'), 
							  "value" => "style1"),			 	
						
						array("name" => esc_html__("Style 2", 'enar'), 
							  "value" => "fill1"),
							  
						array("name" => esc_html__("Style 3", 'enar'), 
							  "value" => "fill_arrow1"),			 	
						
					    array("name" => esc_html__("Style 4", 'enar'), 
							  "value" => "2"),	
							  		 	
						array("name" => esc_html__("Style 5", 'enar'), 
							  "value" => "fill2"),
							  
						array("name" => esc_html__("Style 6", 'enar'), 
							  "value" => "fill2_circle"),
						
						array("name" => esc_html__("Simple", 'enar'), 
							  "value" => "simple"),
							  	  
						array("name" => esc_html__("Vertical Style 1", 'enar'), 
							  "value" => "ver1"),
							  
						array("name" => esc_html__("Vertical Style 2", 'enar'), 
							  "value" => "ver_gradient1"),	  
						)
			),
					
			array( "name" => "shortcodeblock",
				   "id" => $shortcode."_tabs_group",
				   "type" => "shortcodeblock"
				  ),
		
				array( "name" => esc_html__("Title", 'enar'),
				   	   "desc" => esc_html__("The title for this tab accordion item", 'enar'),
					   "id" => $shortcode."_tabs_title",
					   "type" => "text"
				),
				
				array( "name" => esc_html__("Content Text", 'enar'),
					   "desc" => esc_html__("The content text of this tab item", 'enar'),
					   "id" => $shortcode."_tabs_content",
					   "type" => "textarea"
				),
				array( "name" => esc_html__("Tab Image", 'enar'),
					   "desc" => esc_html__("Upload an image to display inside this tab item.", 'enar'),
					   "id" => $shortcode."_tabs_content_img",
					   "type" => "media"
				),
				array( "name" => esc_html__("Choose Icon", 'enar'),
				   "desc" => esc_html__("The icon for this tab item ( optional )", 'enar'),
				   "id" => $shortcode."_tabs_icon",
				   "type" => "icon"
				),
			
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_tabs_group",
				   "type" => "shortcodeblockclose"
				  ),
			
			array( "name" => esc_html__("Add New Tab", 'enar'),
				   "id" => $shortcode."_tabs_group_duplicater",
				   "group" => $shortcode."_tabs_group",
				   "type" => "repeatercopier"
				  ),

	array ( "name" => esc_html__("Tabs", 'enar'),
		   	"id" => "tabs",
		    "type" => "shortcodefatherclose"),
		
	//=============================================================================================> Banner Text
	
	array( "name" => esc_html__("Banner Text", 'enar'),
		   "id" => "banner_text",
		   "type" => "shortcodefather"
		  ),
		  
		//_____________________________________________________________________|
		  
		array( "name" => "specialblock",
		   "id" => $shortcode."_banner_text_type_block",
		   "type" => "specialblock"
		),	
			array( "name" => esc_html__("Banner Type", 'enar'),
				   "desc" => esc_html__("Choose the banner type", 'enar'),
				   "id" => $shortcode."_banner_text_type",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Full Colored", 'enar'), 
							  "value" => "full_colored"),			 	
						
						array("name" => esc_html__("Boxed Colored", 'enar'), 
							  "value" => "boxed_colored"),	
							  
						array("name" => esc_html__("Full White", 'enar'), 
							  "value" => "full_white"),
							  
						array("name" => esc_html__("Boxed White", 'enar'), 
							  "value" => "boxed_white"),	
										
						array("name" => esc_html__("Full Colored 2", 'enar'), 
							  "value" => "full_colored2"),
							  
						array("name" => esc_html__("Boxed Colored 2", 'enar'),
							  "value" => "boxed_colored2"),
								  
						array("name" => esc_html__("Classic White", 'enar'), 
							  "value" => "classic_white"),
						
						array("name" => esc_html__("Full Gray", 'enar'), 
							  "value" => "full_gray"),
					    
						array("name" => esc_html__("Boxed Gray", 'enar'),
							  "value" => "boxed_gray"),	  
						),
						
			),
			array( "type" => "hidden","class" => "full_colored boxed_colored full_colored2 boxed_colored2 full_gray boxed_gray",),
			
					array( "name" => esc_html__("Banner Background Color", 'enar'),
						   "desc" => esc_html__("Choose banner background color", 'enar'),
						   "id" => $shortcode."_banner_text_bg_color",
						   "type" => "color"
					),
					
			array( "type" => "hiddenclose"),
			
			array( "type" => "hidden","class" => "full_colored2 boxed_colored2 classic_white",),
			
					array( "name" => esc_html__("Banner Icon", 'enar'),
					   "desc" => esc_html__("The icon for this banner ( optional )", 'enar'),
					   "id" => $shortcode."_banner_text_icon",
					   "type" => "icon"
					),
					
			array( "type" => "hiddenclose"),
			
        array( "name" => "specialblockclose",
		   "id" => $shortcode."_banner_text_type_block",
		   "type" => "specialblockclose"
		),//_____________________________________________________________________|
		
		array( "name" => esc_html__("Banner Title", 'enar'),
			   "desc" => esc_html__("The title text for this banner", 'enar'),
			   "id" => $shortcode."_banner_text_title",
			   "type" => "text"
		),
		
		array( "name" => esc_html__("Banner Content", 'enar'),
			   "desc" => esc_html__("The content text for this banner", 'enar'),
			   "id" => $shortcode."_banner_text_content",
			   "type" => "textarea"
		),
		
		array( "name" => esc_html__("Banner Text Align", 'enar'),
			"desc" => esc_html__("Choose text alignment for this banner", 'enar'),
			"id" => $shortcode."_banner_text_align",
			"type" => "selectbox",
			"option" => array(			 	
				array("name" => esc_html__("Align Left", 'enar'), 
					  "value" => "left"),
				array("name" => esc_html__("Align Right", 'enar'), 
					  "value" => "right"),
				array("name" => esc_html__("Align Center", 'enar'), 
					  "value" => "center"),	  
			)
		),
		
		array( "name" => esc_html__("Button Text", 'enar'),
			   "desc" => esc_html__("Add the text that will display in the button", 'enar'),
			   "id" => $shortcode."_banner_text_btn_text",
			   "type" => "text"
		),
		
		array( "name" => esc_html__("Button URL", 'enar'),
			   "desc" => esc_html__("Add the button url ex: http://example.com", 'enar'),
			   "id" => $shortcode."_banner_text_btn_url",
			   "type" => "text"
		),
		array( "name" => esc_html__("Button Target", 'enar'),
			   "desc" => esc_html__("Open banner button link in new window or in same window", 'enar'),
			   "id" => $shortcode."_banner_text_btn_terget",
			   "type" => "selectbox",
			   "option" => array( 
					array("name" => esc_html__("Same Window", 'enar'), 
						  "value" => "_self"),			 	
					array("name" => esc_html__("New Window", 'enar'), 
						  "value" => "_blank"), 
				)
		),
		array( "name" => esc_html__("Button Icon", 'enar'),
		   "desc" => esc_html__("The icon for this banner ( optional )", 'enar'),
		   "id" => $shortcode."_banner_text_btn_icon",
		   "type" => "icon"
		),
		
	array ( "name" => esc_html__("Banner Text", 'enar'),
		   	"id" => "banner_text",
		    "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Banner Slide
	
	array( "name" => esc_html__("Banner Text Slider", 'enar'),
		   "id" => "banner_text_slide",
		   "type" => "shortcodefather"
		  ),
		array( "name" => "shortcodeblock",
			   "id" => $shortcode."_banner_text_slide_group",
			   "type" => "shortcodeblock"
		),
			array( "name" => esc_html__("Banner Title", 'enar'),
				   "desc" => esc_html__("The title text for this banner", 'enar'),
				   "id" => $shortcode."_banner_text_slide_title",
				   "type" => "text"
			),
			
			array( "name" => esc_html__("Banner Icon", 'enar'),
			   "desc" => esc_html__("The icon for this banner ( optional )", 'enar'),
			   "id" => $shortcode."_banner_text_slide_icon",
			   "type" => "icon"
			),
			
			array( "name" => esc_html__("Banner Content", 'enar'),
				   "desc" => esc_html__("The content text for this banner", 'enar'),
				   "id" => $shortcode."_banner_text_slide_content",
				   "type" => "textarea"
			),
			
			array( "name" => esc_html__("Banner Text Align", 'enar'),
				"desc" => esc_html__("Choose text alignment for this banner", 'enar'),
				"id" => $shortcode."_banner_text_slide_align",
				"type" => "selectbox",
				"option" => array(	
					array("name" => esc_html__("Align Center", 'enar'), 
						  "value" => "center"),	 	
					array("name" => esc_html__("Align Left", 'enar'), 
						  "value" => "left"),
					array("name" => esc_html__("Align Right", 'enar'), 
						  "value" => "right"), 
				)
			),
			
			array( "name" => esc_html__("Button Text", 'enar'),
				   "desc" => esc_html__("Add the text that will display in the button", 'enar'),
				   "id" => $shortcode."_banner_text_slide_btn_text",
				   "type" => "text"
			),
			
			array( "name" => esc_html__("Button URL", 'enar'),
				   "desc" => esc_html__("Add the button url ex: http://example.com", 'enar'),
				   "id" => $shortcode."_banner_text_slide_btn_url",
				   "type" => "text"
			),
			array( "name" => esc_html__("Button Target", 'enar'),
				   "desc" => esc_html__("Open banner button link in new window or in same window", 'enar'),
				   "id" => $shortcode."_banner_text_slide_btn_terget",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Same Window", 'enar'), 
							  "value" => "_self"),			 	
						array("name" => esc_html__("New Window", 'enar'), 
							  "value" => "_blank"), )
			),
			array( "name" => esc_html__("Button Icon", 'enar'),
			   "desc" => esc_html__("The icon for this banner ( optional )", 'enar'),
			   "id" => $shortcode."_banner_text_slide_btn_icon",
			   "type" => "icon"
			),
		array( "name" => "shortcodeblockclose",
			   "id" => $shortcode."_banner_text_slide_group",
			   "type" => "shortcodeblockclose"
			  ),
		
		array( "name" => esc_html__("Add New Text Slide", 'enar'),
			   "id" => $shortcode."_banner_text_slide_group_duplicater",
			   "group" => $shortcode."_banner_text_slide_group",
			   "type" => "repeatercopier"
			  ),
	array ( "name" => esc_html__("Banner Text Slider", 'enar'),
		   	"id" => "banner_text_slide",
		    "type" => "shortcodefatherclose"),
						
	//=============================================================================================> Spacer
	
	array( "name" => esc_html__("Spacer", 'enar'),
		   "id" => "spacer_space",
		   "type" => "shortcodefather"
		  ),
		  array( "name" => esc_html__("Spacer Height", 'enar'),
				 "desc" => esc_html__("If You Want Space Between Content Parts (type Number) for example : 20", 'enar'),
				 "id" => $shortcode."spacer_height",
				 "type" => "text"
		 ),
	array ( "name" => esc_html__("Spacer", 'enar'),
		   	"id" => "spacer_space",
		    "type" => "shortcodefatherclose"),	
			  
	//=============================================================================================> Skills
	
	array( "name" => esc_html__("Skills", 'enar'),
		   "id" => "skills",
		   "type" => "shortcodefather"
		  ),
		array( "name" => "specialblock",
		   "id" => $shortcode."_skills_type_block",
		   "type" => "specialblock"
		),	
			array( "name" => esc_html__("Skills Type", 'enar'),
				   "desc" => esc_html__("Choose skills blocks type", 'enar'),
				   "id" => $shortcode."_skills_type",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Simple Bar", 'enar'), 
							  "value" => "bar_simple"),			 	
						array("name" => esc_html__("3D Bar", 'enar'),
							  "value" => "bar_3d"),	
						array("name" => esc_html__("Circle", 'enar'), 
							  "value" => "circle"),    
						),		
			),
			array( "type" => "hidden","class" => "circle",),
			
					array( "name" => esc_html__("Circle Column Type", 'enar'),
						"desc" => esc_html__("Select your circle column width", 'enar'),
						"id" => $shortcode."_skills_circle_column",
						"type" => "selectbox",
						"option" => array(
							array("name" => esc_html__("One Third ( 1/3 )", 'enar'), 
								  "value" => "4"),
							array("name" => esc_html__("Two Thirds ( 2/3 )", 'enar'), 
								  "value" => "8"),
							array("name" => esc_html__("One Fourth ( 1/4 )", 'enar'), 
								  "value" => "3"),
							array("name" => esc_html__("Three Fourth ( 3/4 )", 'enar'), 
								  "value" => "9"),
							array("name" => esc_html__("Two Fifth", 'enar'), 
								  "value" => "5"),
							array("name" => esc_html__("Three Fifth", 'enar'), 
								  "value" => "7"),
							array("name" => esc_html__("Four Fifth", 'enar'), 
								  "value" => "11"),	  
							array("name" => esc_html__("One Sixth", 'enar'), 
								  "value" => "2"),
							array("name" => esc_html__("Five Sixth", 'enar'), 
								  "value" => "10"),
							array("name" => esc_html__("Half Sixth", 'enar'), 
								  "value" => "1"),
							array("name" => esc_html__("One Half ( 1/2 )", 'enar'), 
								  "value" => "6"),
							array("name" => esc_html__("One Column ( Full Width )", 'enar'), 
								  "value" => "12"),
								  
						)
					),
					array( "name" => esc_html__("Circle Path Type", 'enar'),
						"desc" => esc_html__("Select circle path type", 'enar'),
						"id" => $shortcode."_skills_circle_path",
						"type" => "selectbox",
						"option" => array(
							array("name" => esc_html__("Circle", 'enar'), 
								  "value" => "circle"),			 	
							array("name" => esc_html__("Square", 'enar'), 
								  "value" => "square"),	  
						)
					),
					
			array( "type" => "hiddenclose"),
			
		array( "name" => "specialblockclose",
		   "id" => $shortcode."_skills_type_block",
		   "type" => "specialblockclose"
		),//_____________________________________________________________________|
		
		array( "name" => "shortcodeblock",
				   "id" => $shortcode."_skills_group",
				   "type" => "shortcodeblock"
			),
			array( "name" => esc_html__("Title", 'enar'),
				   "desc" => esc_html__("Add the skill title here.", 'enar'),
				   "id" => $shortcode."_skills_title",
				   "type" => "text"
			),
			array( "name" => esc_html__("Value", 'enar'),
				   "desc" => esc_html__("Add skill value in percent %, Example: 50", 'enar'),
				   "id" => $shortcode."_skills_value",
				   "type" => "text"
			),
			array( "name" => esc_html__("Descripion ( Only For Circle Type )", 'enar'),
				   "desc" => esc_html__("The descripion text for this circle path.", 'enar'),
				   "id" => $shortcode."_skills_desc",
				   "type" => "textarea"
			),
			array( "name" => esc_html__("Path Color", 'enar'),
				   "desc" => esc_html__("Choose the background color for skill path.", 'enar'),
				   "id" => $shortcode."_skills_bg_color",
				   "type" => "color"
			),
		array( "name" => "shortcodeblockclose",
			   "id" => $shortcode."_skills_group",
			   "type" => "shortcodeblockclose"
		),
		
		array( "name" => esc_html__("Add Skill", 'enar'),
			   "id" => $shortcode."_skills_group_duplicater",
			   "group" => $shortcode."_skills_group",
			   "type" => "repeatercopier"
		),	
		
	array ( "name" => esc_html__("Skills", 'enar'),
		   	"id" => "skills",
		    "type" => "shortcodefatherclose"),
				
	//=============================================================================================> Team Members
	array( "name" => esc_html__("Team Members", 'enar'),
		   "id" => "team_members",
		   "type" => "shortcodefather"
		  ),
		array( "name" => "specialblock",
		   "id" => $shortcode."_team_members_type_block",
		   "type" => "specialblock"
		),	
			array( "name" => esc_html__("Blocks Style", 'enar'),
				   "desc" => esc_html__("Choose members blocks style type", 'enar'),
				   "id" => $shortcode."_team_members_type",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Flip Cart", 'enar'), 
							  "value" => "flip_cart"),			 	
						array("name" => esc_html__("Slider", 'enar'), 
							  "value" => "slider"),	
						array("name" => esc_html__("Blocks", 'enar'), 
							  "value" => "blocks"),    
						),		
			),
			array( "type" => "hidden","class" => "flip_cart",),
			
					array( "name" => esc_html__("Flip Column Type", 'enar'),
						"desc" => esc_html__("Select column width", 'enar'),
						"id" => $shortcode."_team_members_flip_column",
						"type" => "selectbox",
						"option" => array(
							array("name" => esc_html__("One Third ( 1/3 )", 'enar'), 
								  "value" => "4"),
							array("name" => esc_html__("Two Thirds ( 2/3 )", 'enar'), 
								  "value" => "8"),
							array("name" => esc_html__("One Fourth ( 1/4 )", 'enar'), 
								  "value" => "3"),
							array("name" => esc_html__("Three Fourth ( 3/4 )", 'enar'), 
								  "value" => "9"),
							array("name" => esc_html__("Two Fifth", 'enar'), 
								  "value" => "5"),
							array("name" => esc_html__("Three Fifth", 'enar'), 
								  "value" => "7"),
							array("name" => esc_html__("Four Fifth", 'enar'), 
								  "value" => "11"),	  
							array("name" => esc_html__("One Sixth", 'enar'), 
								  "value" => "2"),
							array("name" => esc_html__("Five Sixth", 'enar'), 
								  "value" => "10"),
							array("name" => esc_html__("Half Sixth", 'enar'), 
								  "value" => "1"),		 	
							array("name" => esc_html__("One Half ( 1/2 )", 'enar'), 
								  "value" => "6"),
							array("name" => esc_html__("One Column ( Full Width )", 'enar'), 
								  "value" => "12"),
								  
						)
					),
					
			array( "type" => "hiddenclose"),
			
		array( "name" => "specialblockclose",
		   "id" => $shortcode."_team_members_type_block",
		   "type" => "specialblockclose"
		),//_____________________________________________________________________|
		
		array( "name" => "shortcodeblock",
				   "id" => $shortcode."_team_members_group",
				   "type" => "shortcodeblock"
			),
			array( "name" => esc_html__("Name", 'enar'),
				   "desc" => esc_html__("Insert the name of the person", 'enar'),
				   "id" => $shortcode."_team_members_name",
				   "type" => "text"
			),
			array( "name" => esc_html__("Job", 'enar'),
				   "desc" => esc_html__("Insert the job title of the person", 'enar'),
				   "id" => $shortcode."_team_members_job",
				   "type" => "text"
			),
			array( "name" => esc_html__("Profile Description", 'enar'),
				   "desc" => esc_html__("Enter the content to be displayed", 'enar'),
				   "id" => $shortcode."_team_members_content",
				   "type" => "textarea"
			),
			array( "name" => esc_html__("Picture", 'enar'),
				   "desc" => esc_html__("Upload an image to display", 'enar'),
				   "id" => $shortcode."_team_members_picture",
				   "type" => "media"
			),
			array( "name" => esc_html__("URL", 'enar'),
				   "desc" => esc_html__("Add the url ex: http://example.com ( Optional )", 'enar'),
				   "id" => $shortcode."_team_members_url",
				   "type" => "text"
			),
			array( "name" => esc_html__("Link Target", 'enar'),
				   "desc" => esc_html__("Open member link in new window or in same window", 'enar'),
				   "id" => $shortcode."_team_members_terget",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Same Window", 'enar'), 
							  "value" => "_self"),			 	
						array("name" => esc_html__("New Window", 'enar'), 
							  "value" => "_blank"), )
			),
			array( "name" => esc_html__("Background Color", 'enar'),
				   "desc" => esc_html__("Choose member block background color", 'enar'),
				   "id" => $shortcode."_team_members_bg_color",
				   "type" => "color"
			),
			array( "name" => esc_html__("Social Links", 'enar'),
				   "desc" => esc_html__("Add social media links here", 'enar'),
				   "id" => $shortcode."_team_members_socials",
				   "type" => "social"
			),
			
		array( "name" => "shortcodeblockclose",
			   "id" => $shortcode."_team_members_group",
			   "type" => "shortcodeblockclose"
		),
		
		array( "name" => esc_html__("Add Skill", 'enar'),
			   "id" => $shortcode."_team_members_group_duplicater",
			   "group" => $shortcode."_team_members_group",
			   "type" => "repeatercopier"
		),	
		
	array( "name" => esc_html__("Team Members", 'enar'),
		   "id" => "team_members",
		   "type" => "shortcodefatherclose"),	
		   	  
	//=============================================================================================> Testimonials
	
	array( "name" => esc_html__("Testimonials", 'enar'),
		   "id" => "testimonials",
		   "type" => "shortcodefather"
		  ),
	    array( "name" => esc_html__("Testimonials Style", 'enar'),
			   "desc" => esc_html__("Choose a design style for the testimonials", 'enar'),
			   "id" => $shortcode."_testimonials_type",
			   "type" => "selectbox",
			   "option" => array( 
					array("name" => esc_html__("Stle 1", 'enar'), 
						  "value" => "1"),			 	
					array("name" => esc_html__("Stle 2", 'enar'), 
						  "value" => "2"),	   
					),		
		),
		array( "name" => "shortcodeblock",
				   "id" => $shortcode."_testimonials_type_group",
				   "type" => "shortcodeblock"
			),
			array( "name" => esc_html__("Name", 'enar'),
				   "desc" => esc_html__("Insert the name of the person", 'enar'),
				   "id" => $shortcode."_testimonials_name",
				   "type" => "text"
			),
			array( "name" => esc_html__("Job or Company", 'enar'),
				   "desc" => esc_html__("Insert the job title or company name of the person", 'enar'),
				   "id" => $shortcode."_testimonials_job",
				   "type" => "text"
			),
			array( "name" => esc_html__("Testimonial Content", 'enar'),
				   "desc" => esc_html__("Enter the content to be displayed", 'enar'),
				   "id" => $shortcode."_testimonials_content",
				   "type" => "textarea"
			),
			array( "name" => esc_html__("Picture", 'enar'),
				   "desc" => esc_html__("Upload an image to display", 'enar'),
				   "id" => $shortcode."_testimonials_picture",
				   "type" => "media"
			),
			array( "name" => esc_html__("URL", 'enar'),
				   "desc" => esc_html__("Add the url ex: http://example.com ( Optional )", 'enar'),
				   "id" => $shortcode."_testimonials_url",
				   "type" => "text"
			),
			array( "name" => esc_html__("Link Target", 'enar'),
				   "desc" => esc_html__("Open link in new window or in same window", 'enar'),
				   "id" => $shortcode."_testimonials_terget",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Same Window", 'enar'), 
							  "value" => "_self"),			 	
						array("name" => esc_html__("New Window", 'enar'), 
							  "value" => "_blank"), )
			),
			
		array( "name" => "shortcodeblockclose",
			   "id" => $shortcode."_testimonials_type_group",
			   "type" => "shortcodeblockclose"
		),
		
		array( "name" => esc_html__("Add Testimonial", 'enar'),
			   "id" => $shortcode."_testimonials_type_group_duplicater",
			   "group" => $shortcode."_testimonials_type_group",
			   "type" => "repeatercopier"
		),	
		
	array( "name" => esc_html__("Testimonials", 'enar'),
		   "id" => "testimonials",
		   "type" => "shortcodefatherclose"),	
	
	//=============================================================================================>  Our Clients
	
	array( "name" => esc_html__("Our Clients", 'enar'),
		   "id" => "our_clients",
		   "type" => "shortcodefather"
		  ),
		   //=========>
		    array( "name" => esc_html__("Style", 'enar'),
				   "desc" => esc_html__("Choose the background style.", 'enar'),
				   "id" => $shortcode."_our_clients_style",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Light Style", 'enar'), 
							  "value" => "light"),			 	
						array("name" => esc_html__("Dark Style", 'enar'), 
							  "value" => "dark"), )
		    ),
			/*array( "name" => esc_html__("Padding Top & Bottom", 'enar'),
				   "desc" => esc_html__("This is the container padding by pixel, for example : 30",
				   "id" => $shortcode."_our_clients_padding",
				   "type" => "text"
			),
			array( "name" => esc_html__("Background Color", 'enar'),
				   "desc" => esc_html__("Choose the background color for clients section.",
				   "id" => $shortcode."_our_clients_bg_color",
				   "type" => "color"
			),*/
			
			array( "name" => "shortcodeblock",
				   "id" => $shortcode."_our_clients_group",
				   "type" => "shortcodeblock"
			),
				array( "name" => esc_html__("Logo", 'enar'),
					   "desc" => esc_html__("Choose logo image for this client.", 'enar'),
					   "id" => $shortcode."_our_clients_logo",
					   "type" => "media"
				),
				array( "name" => esc_html__("Name", 'enar'),
				   	   "desc" => esc_html__("Add the client name to show when rollover the logo.", 'enar'),
					   "id" => $shortcode."_our_clients_name",
					   "type" => "text"
				),						
				array( "name" => esc_html__("URL", 'enar'),
				   	   "desc" => esc_html__("Add the url ex: http://example.com ( Optional )", 'enar'),
					   "id" => $shortcode."_our_clients_url",
					   "type" => "text"
				),
				array( "name" => esc_html__("Link Target", 'enar'),
					   "desc" => esc_html__("Open link in new window or in same window", 'enar'),
					   "id" => $shortcode."_testimonials_terget",
					   "type" => "selectbox",
					   "option" => array( 
							array("name" => esc_html__("Same Window", 'enar'), 
								  "value" => "_self"),			 	
							array("name" => esc_html__("New Window", 'enar'), 
								  "value" => "_blank"), )
				),
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_our_clients_group",
				   "type" => "shortcodeblockclose"
			),
			
			array( "name" => esc_html__("Add Client", 'enar'),
				   "id" => $shortcode."_our_clients_duplicater",
				   "group" => $shortcode."_our_clients_group",
				   "type" => "repeatercopier"
			),
			
	array( "name" => esc_html__("Our Clients", 'enar'),
		   "id" => "our_clients",
		   "type" => "shortcodefatherclose"),
		   	   
	//=============================================================================================> Counters
    
	array( "name" => esc_html__("Counter Boxes", 'enar'),
		   "id" => "counters",
		   "type" => "shortcodefather"
		  ),
			array( "name" => esc_html__("Style", 'enar'),
				   "desc" => esc_html__("Choose the style of all counter boxes", 'enar'),
				   "id" => $shortcode."_counters_type",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Style 1", 'enar'), 
							  "value" => "1"),			 	
						array("name" => esc_html__("Style 2", 'enar'), 
							  "value" => "2"), )
		    ),
			array( "name" => esc_html__("Number of Columns", 'enar'),
				"desc" => esc_html__("Set the number of counter boxes.", 'enar'),
				"id" => $shortcode."_counters_columns",
				"type" => "selectbox",
				"option" => array(
					array("name" => esc_html__("1 Box", 'enar'), 
						  "value" => "12"),
					array("name" => esc_html__("2 Boxes", 'enar'), 
						  "value" => "6"),
					array("name" => esc_html__("3 Boxes", 'enar'), 
						  "value" => "4"),
					array("name" => esc_html__("4 Boxes", 'enar'), 
						  "value" => "3",
						  "select" => "yes"),
					array("name" => esc_html__("6 Boxes", 'enar'), 
						  "value" => "2"),	  
				)
			),
			array( "name" => esc_html__("Animation Delay", 'enar'),
				   "desc" => esc_html__("1000 equal one second", 'enar'),
				   "id" => $shortcode."_counters_animation_delay",
				   "type" => "text"
			),
				
			array( "name" => esc_html__("Animation Type", 'enar'),
				   "desc" => esc_html__("Select the type of animation", 'enar'),
				   "id" => $shortcode."_counters_animation_type",
				   "type" => "selectbox",
				   "option" => $animata
			),
			array( "name" => "shortcodeblock",
				   "id" => $shortcode."_counters_group",
				   "type" => "shortcodeblock"
			),
				array( "name" => esc_html__("Title", 'enar'),
				   	   "desc" => esc_html__("Counter title text content.", 'enar'),
					   "id" => $shortcode."_counters_title",
					   "type" => "text"
				),						
				array( "name" => esc_html__("Value", 'enar'),
				   	   "desc" => esc_html__("The number to which the counter will animate.", 'enar'),
					   "id" => $shortcode."_counters_numbers",
					   "type" => "text"
				),
				array( "name" => esc_html__("Icon", 'enar'),
				   "desc" => esc_html__("Choose counter box icon.", 'enar'),
				   "id" => $shortcode."_counters_icon",
				   "type" => "icon"
				),
				
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_counters_group",
				   "type" => "shortcodeblockclose"
			),
			
			array( "name" => esc_html__("Add Counter", 'enar'),
				   "id" => $shortcode."_counters_group_duplicater",
				   "group" => $shortcode."_counters_group",
				   "type" => "repeatercopier"
			),
				
	array( "name" => esc_html__("Counter Boxes", 'enar'),
		   "id" => "counters",
		   "type" => "shortcodefatherclose"),
		   
	//=============================================================================================> Icon Box
    
	array( "name" => esc_html__("Icon Box", 'enar'),
		   "id" => "font_icon_box",
		   "type" => "shortcodefather"
		  ),
			array( "name" => "specialblock",
			   "id" => $shortcode."_font_icon_box_type_block",
			   "type" => "specialblock"
			),
				array( "name" => esc_html__("Boxes Style", 'enar'),
					   "desc" => esc_html__("Choose the style of all icon boxes", 'enar'),
					   "id" => $shortcode."_font_icon_box_type",
					   "type" => "selectbox",
					   "option" => array( 
							array("name" => esc_html__("Style 1", 'enar'), 
								  "value" => "style1"),			 	
							array("name" => esc_html__("Style 2", 'enar'), 
								  "value" => "style2"), 
							array("name" => esc_html__("Style 3", 'enar'), 
								  "value" => "style3"),
							array("name" => esc_html__("Style 4", 'enar'), 
								  "value" => "style4"),
							array("name" => esc_html__("Style 5", 'enar'), 
								  "value" => "style5"),
							array("name" => esc_html__("Style 6", 'enar'), 
								  "value" => "style6"),			 	
							array("name" => esc_html__("Style 7", 'enar'), 
								  "value" => "style7"), 
							array("name" => esc_html__("Icons Side By Side", 'enar'), 
								  "value" => "style8"),
							array("name" => esc_html__("List Icons Style", 'enar'), 
								  "value" => "style9"),
							array("name" => esc_html__("Tree Icons", 'enar'), 
								  "value" => "style10"),
							array("name" => esc_html__("Image Icons", 'enar'), 
								  "value" => "style11"),	  
							array("name" => esc_html__("Simple Icons", 'enar'), 
								  "value" => "style12"),	  
							)
				),
			    
				array( "name" => esc_html__("Column Type", 'enar'),
					"desc" => esc_html__("Select your column width", 'enar'),
					"id" => $shortcode."_font_icon_box_column",
					"type" => "selectbox",
					"option" => array(
						array("name" => esc_html__("One Third ( 1/3 )", 'enar'), 
							  "value" => "4"),
						array("name" => esc_html__("Two Thirds ( 2/3 )", 'enar'), 
							  "value" => "8"),
						array("name" => esc_html__("One Fourth ( 1/4 )", 'enar'), 
							  "value" => "3"),
						array("name" => esc_html__("Three Fourth ( 3/4 )", 'enar'), 
							  "value" => "9"),
						array("name" => esc_html__("Two Fifth", 'enar'), 
							  "value" => "5"),
						array("name" => esc_html__("Three Fifth", 'enar'), 
							  "value" => "7"),
						array("name" => esc_html__("Four Fifth", 'enar'), 
							  "value" => "11"),	  
						array("name" => esc_html__("One Sixth", 'enar'), 
							  "value" => "2"),
						array("name" => esc_html__("Five Sixth", 'enar'), 
							  "value" => "10"),
						array("name" => esc_html__("Half Sixth", 'enar'), 
							  "value" => "1"),
						array("name" => esc_html__("One Half ( 1/2 )", 'enar'), 
							  "value" => "6"),
						array("name" => esc_html__("One Column ( Full Width )", 'enar'), 
							  "value" => "12"),
							  
					)
				),
				
				array( "type" => "hidden","class" => "style10",),
	                array( "name" => esc_html__("Picture", 'enar'),
						   "desc" => esc_html__("Upload an icon image to display as main photo.", 'enar'),
						   "id" => $shortcode."_font_icon_box_tree_main_image",
						   "type" => "media"
					),
				array( "type" => "hiddenclose"),
				
				array( "name" => esc_html__("Animation Delay", 'enar'),
					   "desc" => esc_html__("1000 equal one second", 'enar'),
					   "id" => $shortcode."_font_icon_box_animation_delay",
					   "type" => "text"
				),
					
				array( "name" => esc_html__("Animation Type", 'enar'),
					   "desc" => esc_html__("Select the type of animation", 'enar'),
					   "id" => $shortcode."_font_icon_box_animation_type",
					   "type" => "selectbox",
					   "option" => $animata
				),
				
			array( "name" => "specialblockclose",
			   "id" => $shortcode."_font_icon_box_type_block",
			   "type" => "specialblockclose"
			),
			//_____________________________________________________________________|	

			array( "name" => "shortcodeblock",
				   "id" => $shortcode."_font_icon_box_group",
				   "type" => "shortcodeblock"
			),
			
				array( "name" => esc_html__("Title", 'enar'),
				   	   "desc" => esc_html__("Counter box text title.", 'enar'),
					   "id" => $shortcode."_font_icon_box_title",
					   "type" => "text"
				),	
				array( "name" => esc_html__("URL", 'enar'),
				   	   "desc" => esc_html__("Add the url ex: http://example.com ( Optional )", 'enar'),
					   "id" => $shortcode."_font_icon_box_url",
					   "type" => "text"
				),
				array( "name" => esc_html__("Link Target", 'enar'),
					   "desc" => esc_html__("Open link in new window or in same window", 'enar'),
					   "id" => $shortcode."_font_icon_box_terget",
					   "type" => "selectbox",
					   "option" => array( 
							array("name" => esc_html__("Same Window", 'enar'), 
								  "value" => "_self"),			 	
							array("name" => esc_html__("New Window", 'enar'), 
								  "value" => "_blank"), )
				),
				
				array( "name" => esc_html__("Icon Color", 'enar'),
					   "desc" => esc_html__("Choose icon color.", 'enar'),
					   "id" => $shortcode."_font_icon_box_icon_color",
					   "type" => "color"
				),
									
				array( "name" => esc_html__("Icon", 'enar'),
				   "desc" => esc_html__("Choose icon.", 'enar'),
				   "id" => $shortcode."_font_icon_box_icon",
				   "type" => "icon"
				),
				
				array( "name" => esc_html__("Icon Image", 'enar'),
					   "desc" => esc_html__("Upload an icon image to display.", 'enar'),
					   "id" => $shortcode."_font_icon_box_type_image",
					   "type" => "media"
				),
				array( "name" => esc_html__("Background Color", 'enar'),
					   "desc" => esc_html__("Choose the box background color.", 'enar'),
					   "id" => $shortcode."_font_icon_box_tree_bg_color",
					   "type" => "color"
				),
				array( "name" => esc_html__("Content Text", 'enar'),
					   "desc" => esc_html__("The content of this icon item.", 'enar'),
					   "id" => $shortcode."_font_icon_box_content",
					   "type" => "textarea"
				),
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_font_icon_box_group",
				   "type" => "shortcodeblockclose"
			),
			
			array( "name" => esc_html__("Add Icon Box", 'enar'),
				   "id" => $shortcode."_font_icon_box_group_duplicater",
				   "group" => $shortcode."_font_icon_box_group",
				   "type" => "repeatercopier"
			),
				
	array( "name" => esc_html__("Icon Box", 'enar'),
		   "id" => "font_icon_box",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Buttons
    
	array( "name" => esc_html__("Button", 'enar'),
		   "id" => "hm_button",
		   "type" => "shortcodefather"
		  ),
			array( "name" => esc_html__("Button Style", 'enar'),
				   "desc" => esc_html__("Choose button style", 'enar'),
				   "id" => $shortcode."_hm_button_type",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Sample", 'enar'), 
							  "value" => "simple"),			 	
						array("name" => esc_html__("Animated 1", 'enar'), 
							  "value" => "animated1"), 
					    array("name" => esc_html__("Animated 2", 'enar'), 
							  "value" => "animated2"),
						array("name" => esc_html__("Animated 3", 'enar'), 
							  "value" => "animated3"),
					)
		    ),
			array( "name" => esc_html__("Button Size", 'enar'),
				   "desc" => esc_html__("Choose button size", 'enar'),
				   "id" => $shortcode."_hm_button_size",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Medium", 'enar'), 
							  "value" => "medium"),			 	
						array("name" => esc_html__("Small", 'enar'), 
							  "value" => "small"), 
					    array("name" => esc_html__("Large", 'enar'), 
							  "value" => "large"),
					)
		    ),
			array( "name" => esc_html__("Button Title", 'enar'),
				   "desc" => esc_html__("Add the text that will display in the button.", 'enar'),
				   "id" => $shortcode."_hm_button_title",
				   "type" => "text"
			),	
			array( "name" => esc_html__("Button URL", 'enar'),
				   "desc" => esc_html__("Add the url ex: http://example.com", 'enar'),
				   "id" => $shortcode."_hm_button_url",
				   "type" => "text"
			),
			array( "name" => esc_html__("Link Target", 'enar'),
				   "desc" => esc_html__("Open link in new window or in same window", 'enar'),
				   "id" => $shortcode."_hm_button_terget",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Same Window", 'enar'), 
							  "value" => "_self"),			 	
						array("name" => esc_html__("New Window", 'enar'), 
							  "value" => "_blank"), )
			),
			array( "name" => esc_html__("Background Color", 'enar'),
				   "desc" => esc_html__("Choose background color for this button.", 'enar'),
				   "id" => $shortcode."_hm_button_bg_color",
				   "type" => "color"
			),	
			array( "name" => esc_html__("Hover Background Color", 'enar'),
				   "desc" => esc_html__("Choose background color when you rollover on this button.", 'enar'),
				   "id" => $shortcode."_hm_button_hover_bg_color",
				   "type" => "color"
			),
			array( "name" => esc_html__("Button Padding Top", 'enar'),
					   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
					   "id" => $shortcode."_hm_button_padding_top",
					   "type" => "text"
			),
			
			array( "name" => esc_html__("Button Padding Bottom", 'enar'),
					   "desc" => esc_html__("In pixels (px), Example: 20", 'enar'),
					   "id" => $shortcode."_hm_button_padding_bottom",
					   "type" => "text"
			),
			array( "name" => esc_html__("Button Icon", 'enar'),
				   "desc" => esc_html__("Choose button icon.", 'enar'),
				   "id" => $shortcode."_hm_button_icon",
				   "type" => "icon"
			),
			
	array( "name" => esc_html__("Button", 'enar'),
		   "id" => "hm_button",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Google Map
    
	array( "name" => esc_html__("Google Map", 'enar'),
		   "id" => "google_maps",
		   "type" => "shortcodefather"
		  ),
			array( "name" => esc_html__("Latitude", 'enar'),
				   "desc" => esc_html__("The latitude number.", 'enar'),
				   "id" => $shortcode."_google_maps_latitude",
				   "type" => "text"
			),
			array( "name" => esc_html__("Longitude", 'enar'),
				   "desc" => esc_html__("The longitude number.", 'enar'),
				   "id" => $shortcode."_google_maps_longitude",
				   "type" => "text"
			),	
			array( "name" => esc_html__("Description Text", 'enar'),
				   "desc" => esc_html__("The description text for this location.", 'enar'),
				   "id" => $shortcode."_google_maps_desc",
				   "type" => "textarea"
			),
			array( "name" => esc_html__("Enable Box Border", 'enar'),
				   "desc" => esc_html__("Enable or disable the box border.", 'enar'),
				   "id" => $shortcode."_google_maps_border_box",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Enable", 'enar'), 
							  "value" => "yes"),			 	
						array("name" => esc_html__("Disable", 'enar'), 
							  "value" => "no"), 
					)
		    ),
	array( "name" => esc_html__("Google Map", 'enar'),
		   "id" => "google_maps",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Tooltip
    
	array( "name" => esc_html__("Tooltip", 'enar'),
		   "id" => "hm_tooltip",
		   "type" => "shortcodefather"
		  ),
			array( "name" => esc_html__("Title", 'enar'),
				   "desc" => esc_html__("Add the title text for this tooltip.", 'enar'),
				   "id" => $shortcode."_hm_tooltip_title",
				   "type" => "text"
			),
			array( "name" => esc_html__("Content Text", 'enar'),
				   "desc" => esc_html__("The text that display inside the tooltip box.", 'enar'),
				   "id" => $shortcode."_hm_tooltip_content",
				   "type" => "textarea"
			),
			array( "name" => "specialblock",
			   "id" => $shortcode."_hm_tooltip_type_con",
			   "type" => "specialblock"
			),
				array( "name" => esc_html__("Style", 'enar'),
					   "desc" => esc_html__("Choose the style for this tooltip box.", 'enar'),
					   "id" => $shortcode."_hm_tooltip_type",
					   "type" => "selectbox",
					   "option" => array( 
							array("name" => esc_html__("Style 1", 'enar'), 
								  "value" => "1"),			 	
							array("name" => esc_html__("Style 2", 'enar'), 
								  "value" => "2"), 
							array("name" => esc_html__("Style 3", 'enar'), 
								  "value" => "3"),	  
							)
				),
			
				array( "type" => "hidden","class" => "1",),
				    array( "name" => esc_html__("Animation Effect", 'enar'),
						   "desc" => esc_html__("Choose your animation effect.", 'enar'),
						   "id" => $shortcode."_hm_tooltip_type_effect",
						   "type" => "selectbox",
						   "option" => array( 
								array("name" => esc_html__("Style 1", 'enar'), 
									  "value" => "1"),			 	
								array("name" => esc_html__("Style 2", 'enar'), 
									  "value" => "2"), 
								array("name" => esc_html__("Style 3", 'enar'), 
									  "value" => "3"),	
								array("name" => esc_html__("Style 4", 'enar'), 
									  "value" => "4"), 
								array("name" => esc_html__("Style 5", 'enar'), 
									  "value" => "5"),  
								)
					),
	                array( "name" => esc_html__("Picture", 'enar'),
						   "desc" => esc_html__("Upload an image to display inside the tooltip box.", 'enar'),
						   "id" => $shortcode."_hm_tooltip_image",
						   "type" => "media"
					),
				array( "type" => "hiddenclose"),
				
			array( "name" => "specialblockclose",
			   "id" => $shortcode."_hm_tooltip_type_con",
			   "type" => "specialblockclose"
			),

			//_____________________________________________________________________|
			
	array( "name" => esc_html__("Tooltip", 'enar'),
		   "id" => "hm_tooltip",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Blockquote
    
	array( "name" => esc_html__("Blockquote", 'enar'),
		   "id" => "hm_blockquote",
		   "type" => "shortcodefather"
		  ),
		    array( "name" => esc_html__("Style", 'enar'),
				   "desc" => esc_html__("Choose the blockquote style.", 'enar'),
				   "id" => $shortcode."_hm_blockquote_style",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Style 1", 'enar'), 
							  "value" => "1"),			 	
						array("name" => esc_html__("Style 2", 'enar'), 
							  "value" => "2"), 	  
						)
			),
			array( "name" => esc_html__("Footer", 'enar'),
				   "desc" => esc_html__("The footer title text for this blockquote.", 'enar'),
				   "id" => $shortcode."_hm_blockquote_footer",
				   "type" => "text"
			),
			array( "name" => esc_html__("Content Text", 'enar'),
				   "desc" => esc_html__("The text that display inside the blockquote box.", 'enar'),
				   "id" => $shortcode."_hm_blockquote_content",
				   "type" => "textarea"
			),
			
			
	array( "name" => esc_html__("Blockquote", 'enar'),
		   "id" => "hm_blockquote",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Pricing Tables
    
	array( "name" => esc_html__("Pricing Tables", 'enar'),
		   "id" => "hm_pricing_tables",
		   "type" => "shortcodefather"
		  ),
		    array( "name" => esc_html__("Table Style", 'enar'),
				   "desc" => esc_html__("Choose the pricing tables style.", 'enar'),
				   "id" => $shortcode."_hm_pricing_tables_style",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Style 1", 'enar'), 
							  "value" => "1"),			 	
						array("name" => esc_html__("Style 2", 'enar'), 
							  "value" => "2"), 
						array("name" => esc_html__("Style 3", 'enar'), 
							  "value" => "3"), 
						array("name" => esc_html__("Style 4", 'enar'), 
							  "value" => "4"), 	  
						)
			),
			
			array( "name" => "shortcodeblock", //------------------------------------------------------------->
				   "id" => $shortcode."_hm_pricing_tables_group",
				   "type" => "shortcodeblock"
			),
				array( "name" => esc_html__("Plan Column Width", 'enar'),
					"desc" => esc_html__("Select plan column width", 'enar'),
					"id" => $shortcode."_hm_pricing_tables_col_type",
					"type" => "selectbox",
					"option" => array(
						array("name" => esc_html__("One Third ( 1/3 )", 'enar'), 
							  "value" => "4"),
						array("name" => esc_html__("Two Thirds ( 2/3 )", 'enar'), 
							  "value" => "8"),
						array("name" => esc_html__("One Fourth ( 1/4 )", 'enar'), 
							  "value" => "3"),
						array("name" => esc_html__("Three Fourth ( 3/4 )", 'enar'), 
							  "value" => "9"),
						array("name" => esc_html__("Two Fifth", 'enar'), 
							  "value" => "5"),
						array("name" => esc_html__("Three Fifth", 'enar'), 
							  "value" => "7"),
						array("name" => esc_html__("Four Fifth", 'enar'), 
							  "value" => "11"),	  
						array("name" => esc_html__("One Sixth", 'enar'), 
							  "value" => "2"),
						array("name" => esc_html__("Five Sixth", 'enar'), 
							  "value" => "10"),
						array("name" => esc_html__("Half Sixth", 'enar'), 
							  "value" => "1"),
						array("name" => esc_html__("One Half ( 1/2 )", 'enar'), 
							  "value" => "6"),
						array("name" => esc_html__("One Column ( Full Width )", 'enar'), 
							  "value" => "12"),
							  
					)
				),
				array( "name" => esc_html__("Column Style", 'enar'),
					"desc" => esc_html__("Select plan column style width", 'enar'),
					"id" => $shortcode."_hm_pricing_tables_col_style",
					"type" => "selectbox",
					"option" => array(
						array("name" => esc_html__("Default", 'enar'), 
							  "value" => "no"),
						array("name" => esc_html__("Selected", 'enar'), 
							  "value" => "yes"),
							  
					)
				),
				array( "name" => esc_html__("Plan Name", 'enar'),
					   "desc" => esc_html__("Add the title text for this pricing plan.", 'enar'),
					   "id" => $shortcode."_hm_pricing_tables_plan_name",
					   "type" => "text"
				),
				array( "name" => esc_html__("Plan Price", 'enar'),
					   "desc" => esc_html__("Add plan price, for example: 200", 'enar'),
					   "id" => $shortcode."_hm_pricing_tables_plan_price",
					   "type" => "text"
				),
				array( "name" => esc_html__("Plan Currency", 'enar'),
					   "desc" => esc_html__("Add plan currency, for example: $", 'enar'),
					   "id" => $shortcode."_hm_pricing_tables_plan_currency",
					   "type" => "text"
				),
				array( "name" => esc_html__("Period Label", 'enar'),
					   "desc" => esc_html__("The period label time for this plan, for example: Monthly", 'enar'),
					   "id" => $shortcode."_hm_pricing_tables_plan_time",
					   "type" => "text"
				),
				array( "name" => esc_html__("Plan Button Text", 'enar'),
					   "desc" => esc_html__("Plan button text, for example: Order Now", 'enar'),
					   "id" => $shortcode."_hm_pricing_tables_plan_btn_text",
					   "type" => "text"
				),
				array( "name" => esc_html__("Plan Button URL", 'enar'),
					   "desc" => esc_html__("Add the url ex: http://example.com", 'enar'),
					   "id" => $shortcode."_hm_pricing_tables_plan_btn_url",
					   "type" => "text"
				),
				array( "name" => esc_html__("Link Target", 'enar'),
					   "desc" => esc_html__("Open link in new window or in same window", 'enar'),
					   "id" => $shortcode."_hm_pricing_tables_plan_btn_target",
					   "type" => "selectbox",
					   "option" => array( 
							array("name" => esc_html__("Same Window", 'enar'), 
								  "value" => "_self"),			 	
							array("name" => esc_html__("New Window", 'enar'), 
								  "value" => "_blank"), )
				),
				
				array( "name" => "shortcodeblock", //------------------------------------------------------------->
					   "id" => $shortcode."_hm_pricing_tables_plan_group",
					   "type" => "shortcodeblock"
				),
				    array( "name" => esc_html__("Title", 'enar'),
						   "desc" => esc_html__("Add title text for this plan feature row.", 'enar'),
						   "id" => $shortcode."_hm_pricing_tables_plan_feature",
						   "type" => "text"
				    ),
					array( "name" => esc_html__("Icon Type", 'enar'),
						   "desc" => esc_html__("Select the icon type.", 'enar'),
						   "id" => $shortcode."_hm_pricing_tables_plan_icon",
						   "type" => "selectbox",
						   "option" => array( 		 	
								array("name" => esc_html__("True Icon", 'enar'), 
									  "value" => "true"), 
								array("name" => esc_html__("Wrong Icon", 'enar'), 
									  "value" => "false"),
							    array("name" => esc_html__("No Icon", 'enar'), 
									  "value" => "no_icon"),
							)
					),
					
				array( "name" => "shortcodeblockclose",
					   "id" => $shortcode."_hm_pricing_tables_plan_group",
					   "type" => "shortcodeblockclose"
				),
				
				array( "name" => esc_html__("Add Pricing Plan Feature", 'enar'),
					   "id" => $shortcode."_hm_pricing_tables_plan_group_duplicater",
					   "group" => $shortcode."_hm_pricing_tables_plan_group",
					   "type" => "repeatercopier"
					   
				), //------------------------------------------------------------------------------------>
				
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_hm_pricing_tables_group",
				   "type" => "shortcodeblockclose"
			),
			
			array( "name" => esc_html__("Add Pricing Plan Column", 'enar'),
				   "id" => $shortcode."_hm_pricing_tables_group_duplicater",
				   "group" => $shortcode."_hm_pricing_tables_group",
				   "type" => "repeatercopier"
				   
			), //------------------------------------------------------------------------------------>
			
	array( "name" => esc_html__("Pricing Tables", 'enar'),
		   "id" => "hm_pricing_tables",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Blog Posts
	
	array( "name" => esc_html__("Blog Posts", 'enar'),
		   "id" => "from_the_blog",
		   "type" => "shortcodefather"
		  ),	
		    
			array( "name" => esc_html__("Posts Style", 'enar'),
				   "desc" => esc_html__("Choose posts design style.", 'enar'),
				   "id" => $shortcode."_from_the_blog_style",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Timeline Style", 'enar'),
							  "value" => "timeline"),		 	
						array("name" => esc_html__("Masonry Grid Style", 'enar'),
							  "value" => "grid"),
						array("name" => esc_html__("Masonry Colred Style", 'enar'),
							  "value" => "masonry"),
				   )
			),

	array ( "name" => esc_html__("Blog Posts", 'enar'),
		   	"id" => "from_the_blog",
		    "type" => "shortcodefatherclose"),
			
	//=============================================================================================> Blog Carousel
	
	array( "name" => esc_html__("Blog Carousel", 'enar'),
			"id" => "blog_carousel",
			"type" => "shortcodefather"
		),
		array( "name" => esc_html__("Carousel Style", 'enar'),
			   "desc" => esc_html__("Select the blog carousel style.", 'enar'),
			   "id" => $shortcode."_blog_carousel_style",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Flip Effect Full Width", 'enar'), 
						  "value" => "flip_effect_full"), 
					array("name" => esc_html__("Flip Effect Boxed", 'enar'), 
						  "value" => "flip_effect_boxed"),
					array("name" => esc_html__("Shadow Effect Full Width", 'enar'), 
						  "value" => "shadow_effect_full"), 
					array("name" => esc_html__("Shadow Effect Boxed", 'enar'), 
						  "value" => "shadow_effect_boxed"),
				    array("name" => esc_html__("Zoom-In Effect", 'enar'), 
						  "value" => "zoom_effect"),
					array("name" => esc_html__("Hover-Direction Effect", 'enar'), 
						  "value" => "hoverdir"),	  
				)
		),
		array( "name" => esc_html__("Show Posts Title", 'enar'),
			   "desc" => esc_html__("This option to show or hide the post title in this blog carousel.", 'enar'),
			   "id" => $shortcode."_blog_carousel_show_title",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Show Posts Date", 'enar'),
			   "desc" => esc_html__("This option to show or hide the post date in this blog carousel.", 'enar'),
			   "id" => $shortcode."_blog_carousel_show_date",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Show Posts Categories", 'enar'),
			   "desc" => esc_html__("This option to show or hide the posts categories.", 'enar'),
			   "id" => $shortcode."_blog_carousel_show_cats",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Show Post Format Icon", 'enar'),
			   "desc" => esc_html__("This option to show or hide the post format icon in this blog carousel.", 'enar'),
			   "id" => $shortcode."_blog_carousel_format_icon",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Posts Number", 'enar'),
			   "desc" => esc_html__("The posts number showing in this carousel, ex: 10", 'enar'),
			   "id" => $shortcode."_blog_carousel_posts_num",
			   "type" => "text",
			   "value" => "10"
		),
		array( "name" => esc_html__("Zoom Button Text", 'enar'),
			   "desc" => esc_html__("The text content for zoom button.", 'enar'),
			   "id" => $shortcode."_blog_carousel_zoom_btn_text",
			   "type" => "text",
			   "value" => "Zoom"
		),
		array( "name" => esc_html__("Details Button Text", 'enar'),
			   "desc" => esc_html__("The text content for details button.", 'enar'),
			   "id" => $shortcode."_blog_carousel_more_btn_text",
			   "type" => "text",
			   "value" => "Explore"
		),
		array( "name" => esc_html__("Order Posts By", 'enar'),
			   "desc" => esc_html__("Sort carousel posts by.", 'enar'),
			   "id" => $shortcode."_blog_carousel_posts_order_by",
			   "type" => "selectbox",
			   "option" => array(
					array("name" => esc_html__("Order By Data", 'enar'),
						  "value" => "date"),		 	
					array("name" => esc_html__("Order By ID", 'enar'),
						  "value" => "ID"),
					array("name" => esc_html__("Order By Author", 'enar'),
						  "value" => "author"),
						  
				    array("name" => esc_html__("Order By Title", 'enar'),
						  "value" => "title"),		 	
					array("name" => esc_html__("Order Random", 'enar'),
						  "value" => "rand"),
					array("name" => esc_html__("Order by number of comments", 'enar'),
						  "value" => "comment_count"),
			   )
		),	
		array( "name" => esc_html__("Order By", 'enar'),
			   "desc" => esc_html__("Sort carousel posts by ascending or descending order.", 'enar'),
			   "id" => $shortcode."_blog_carousel_posts_order",
			   "type" => "selectbox",
			   "option" => array(
					array("name" => esc_html__("Descending Order", 'enar'),
						  "value" => "DESC"),		 	
					array("name" => esc_html__("Ascending Order", 'enar'),
						  "value" => "ASC"),
			   )
		),
		
		//--------------------------->
		
		array( "name" => "specialblock",
		   "id" => $shortcode."_blog_carousel_posts_from_con",
		   "type" => "specialblock"
		),
			array( "name" => esc_html__("Get Posts From", 'enar'),
				   "desc" => esc_html__("Choose where you get the carousel posts.", 'enar'),
				   "id" => $shortcode."_blog_carousel_posts_from",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("From All Posts", 'enar'),
							  "value" => "from_all"),		 	
						array("name" => esc_html__("Choose From Categories", 'enar'),
							  "value" => "from_cats"),
						array("name" => esc_html__("Select From Posts", 'enar'),
							  "value" => "from_posts"),
				   )
			),
		
			array( "type" => "hidden","class" => "from_cats"),
				array( "name" => esc_html__("Select From Categories", 'enar'),
					   "desc" => esc_html__("Choose the categories to include in the carousel.", 'enar'),
					   "id" => $shortcode."_blog_carousel_posts_from_cats",
					   "type" => "multiple_select",
					   "option" => idealtheme_get_posts_cats('post', 'category', 'get_cats'),
				),
			array( "type" => "hiddenclose"),
			array( "type" => "hidden","class" => "from_posts"),
				array( "name" => esc_html__("Select From The Posts", 'enar'),
					   "desc" => esc_html__("Choose the posts to include in the carousel.", 'enar'),
					   "id" => $shortcode."_blog_carousel_posts_from_posts",
					   "type" => "multiple_select",
					   "option" => idealtheme_get_posts_cats('post', 'category', 'get_posts'),
				),
			array( "type" => "hiddenclose"),
			
		array( "name" => "specialblockclose",
		   "id" => $shortcode."_blog_carousel_posts_from_con",
		   "type" => "specialblockclose"
		),
		
		//--------------------------->
		
	array( "name" => esc_html__("Blog Carousel", 'enar'),
		   "id" => "blog_carousel",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Portfolio Carousel
	
	array( "name" => esc_html__("Portfolio Carousel", 'enar'),
			"id" => "projects_carousel",
			"type" => "shortcodefather"
		),
		array( "name" => esc_html__("Carousel Style", 'enar'),
			   "desc" => esc_html__("Select projects carousel style.", 'enar'),
			   "id" => $shortcode."_projects_carousel_style",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Flip Effect Full Width", 'enar'), 
						  "value" => "flip_effect_full"), 
					array("name" => esc_html__("Flip Effect Boxed", 'enar'), 
						  "value" => "flip_effect_boxed"),
					array("name" => esc_html__("Shadow Effect Full Width", 'enar'), 
						  "value" => "shadow_effect_full"), 
					array("name" => esc_html__("Shadow Effect Boxed", 'enar'), 
						  "value" => "shadow_effect_boxed"),
				    array("name" => esc_html__("Zoom-In Effect", 'enar'), 
						  "value" => "zoom_effect"),
					array("name" => esc_html__("Hover-Direction Effect", 'enar'), 
						  "value" => "hoverdir"),	  
				)
		),
		array( "name" => esc_html__("Show Projects Title", 'enar'),
			   "desc" => esc_html__("This option to show or hide the projects title.", 'enar'),
			   "id" => $shortcode."_projects_carousel_show_title",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"),
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Show Projects Date", 'enar'),
			   "desc" => esc_html__("This option to show or hide the projects date.", 'enar'),
			   "id" => $shortcode."_projects_carousel_show_date",
			   "type" => "selectbox",
			   "option" => array( 		
			        array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"), 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
				)
		),
		array( "name" => esc_html__("Show Projects Categories", 'enar'),
			   "desc" => esc_html__("This option to show or hide the projects categories.", 'enar'),
			   "id" => $shortcode."_projects_carousel_show_cats",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Number Of Projects", 'enar'),
			   "desc" => esc_html__("The projects posts number showing in this carousel, ex: 10", 'enar'),
			   "id" => $shortcode."_projects_carousel_posts_num",
			   "type" => "text",
			   "value" => "10"
		),
		array( "name" => esc_html__("Zoom Image Button Text", 'enar'),
			   "desc" => esc_html__("The project zoom button text content.", 'enar'),
			   "id" => $shortcode."_projects_carousel_zoom_btn_text",
			   "type" => "text",
			   "value" => "Zoom"
		),
		array( "name" => esc_html__("Details Button Text", 'enar'),
			   "desc" => esc_html__("The project details button text content.", 'enar'),
			   "id" => $shortcode."_projects_carousel_more_btn_text",
			   "type" => "text",
			   "value" => "Explore"
		),
		array( "name" => esc_html__("Order Projects By", 'enar'),
			   "desc" => esc_html__("Sort projects carousel by.", 'enar'),
			   "id" => $shortcode."_projects_carousel_posts_order_by",
			   "type" => "selectbox",
			   "option" => array(
					array("name" => esc_html__("Order By Data", 'enar'),
						  "value" => "date"),		 	
					array("name" => esc_html__("Order By ID", 'enar'),
						  "value" => "ID"),
					array("name" => esc_html__("Order By Author", 'enar'),
						  "value" => "author"),
						  
				    array("name" => esc_html__("Order By Title", 'enar'),
						  "value" => "title"),		 	
					array("name" => esc_html__("Order Random", 'enar'),
						  "value" => "rand"),
					array("name" => esc_html__("Order by number of comments", 'enar'),
						  "value" => "comment_count"),
			   )
		),	
		array( "name" => esc_html__("Order By", 'enar'),
			   "desc" => esc_html__("Sort carousel projects by ascending or descending order.", 'enar'),
			   "id" => $shortcode."_projects_carousel_posts_order",
			   "type" => "selectbox",
			   "option" => array(
					array("name" => esc_html__("Descending Order", 'enar'),
						  "value" => "DESC"),		 	
					array("name" => esc_html__("Ascending Order", 'enar'),
						  "value" => "ASC"),
			   )
		),
		
		//--------------------------->
		array( "name" => "specialblock",
		   "id" => $shortcode."_projects_carousel_posts_from_con",
		   "type" => "specialblock"
		),
			array( "name" => esc_html__("Get Projects From", 'enar'),
				   "desc" => esc_html__("Choose where you get the carousel projects.", 'enar'),
				   "id" => $shortcode."_projects_carousel_posts_from",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("From All Projects", 'enar'),
							  "value" => "from_all"),		 	
						array("name" => esc_html__("Choose From The Categories", 'enar'),
							  "value" => "from_cats"),
						array("name" => esc_html__("Select From The Projects", 'enar'),
							  "value" => "from_posts"),
				   )
			),
		
			array( "type" => "hidden","class" => "from_cats"),
				array( "name" => esc_html__("Select From Categories", 'enar'),
					   "desc" => esc_html__("Choose the categories to include in the carousel.", 'enar'),
					   "id" => $shortcode."_projects_carousel_posts_from_cats",
					   "type" => "multiple_select",
					   "option" => idealtheme_get_posts_cats('portfolio', 'portfolio_category', 'get_cats'),
				),
			array( "type" => "hiddenclose"),
			array( "type" => "hidden","class" => "from_posts"),
				array( "name" => esc_html__("Select From The Projects", 'enar'),
					   "desc" => esc_html__("Choose the custom projects to include in the carousel.", 'enar'),
					   "id" => $shortcode."_projects_carousel_posts_from_posts",
					   "type" => "multiple_select",
					   "option" => idealtheme_get_posts_cats('portfolio', 'portfolio_category', 'get_posts'),
				),
			array( "type" => "hiddenclose"),
			
		array( "name" => "specialblockclose",
		   "id" => $shortcode."_projects_carousel_posts_from_con",
		   "type" => "specialblockclose"
		),
		//--------------------------->
		
	array( "name" => esc_html__("Projects Carousel", 'enar'),
		   "id" => "projects_carousel",
		   "type" => "shortcodefatherclose"),
		   
	//=============================================================================================> Portfolio Filter
	
	array( "name" => esc_html__("Portfolio Filter", 'enar'),
		   "id" => "portfolio_filters",
		   "type" => "shortcodefather"
		  ),
		    
		    array( "name" => esc_html__("Filter Style", 'enar'),
				   "desc" => esc_html__("Choose the portfolio filter style.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_style",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Simple Style", 'enar'),
							  "value" => "simple"),		 	
						array("name" => esc_html__("Bootom-Animate Effect", 'enar'),
							  "value" => "bootmanim"),
						array("name" => esc_html__("Hover-Dir Effect", 'enar'),
							  "value" => "hoverdir"),
				   )
			),
			array( "name" => esc_html__("Filter Layout", 'enar'),
				   "desc" => esc_html__("Choose the layout style for portfolio filter items.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_layout",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Grid Boxes", 'enar'),
							  "value" => "grid_porto"),		 	
						array("name" => esc_html__("Masonry Layout", 'enar'),
							  "value" => "masonry_porto"),
				   )
			),
			array( "name" => esc_html__("Filter Width", 'enar'),
				   "desc" => esc_html__("Choose the layout width for the portfolio filter.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_layout_width",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Boxed Layout", 'enar'),
							  "value" => "boxed_portos"),		 	
						array("name" => esc_html__("FullWidth Layout", 'enar'),
							  "value" => "full_portos"),
				   )
			),
			array( "name" => esc_html__("Filter Columns", 'enar'),
				   "desc" => esc_html__("Choose how many projects boxes you want to show in one row.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_columns",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("2 Columns", 'enar'),
							  "value" => "two_blocks"),		 	
						array("name" => esc_html__("3 Columns", 'enar'),
							  "value" => "three_blocks"),
					    array("name" => esc_html__("4 Columns", 'enar'),
							  "value" => "four_blocks"),
						array("name" => esc_html__("5 Columns", 'enar'),
							  "value" => "five_portos"),
				   )
			),
			array( "name" => esc_html__("Blocks Spaces", 'enar'),
				   "desc" => esc_html__("The blank space between projects boxes.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_spaces",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Has Spaces", 'enar'),
							  "value" => "has_sapce_portos"),		 	
						array("name" => esc_html__("No Spaces", 'enar'),
							  "value" => "no_sapce_portos"),
				   )
			),
			array( "name" => esc_html__("Filter Menu Counter", 'enar'),
				   "desc" => esc_html__("The counter box shows the number of projects within each category.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_counter",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Show Counter", 'enar'),
							  "value" => "nav_with_nums"),		 	
						array("name" => esc_html__("Hide Counter", 'enar'),
							  "value" => "nav_no_nums"),
				   )
			),
			array( "name" => esc_html__("Buttons Style", 'enar'),
				   "desc" => esc_html__("Choose the portfolio filter buttons style.", 'enar'),
				   "id" => $shortcode."_portfolio_button_style",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Text Buttons", 'enar'),
							  "value" => "text_but"),		 	
						array("name" => esc_html__("Icon Buttons", 'enar'),
							  "value" => "icon_but"),
				   )
			),
			array( "name" => esc_html__("All-Projects Button Text", 'enar'),
				   "desc" => esc_html__("The all-projects button text content.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_all_btn_text",
				   "type" => "text",
				   "value" => esc_html__("All", 'enar')
			),
			array( "name" => esc_html__("Zoom Image Button Text", 'enar'),
				   "desc" => esc_html__("The project zoom button text content.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_button_zoom",
				   "type" => "text",
				   "value" => esc_html__("Zoom", 'enar'), // View Larger - Zoom
			),
			
			array( "name" => esc_html__("Details Button Text", 'enar'),
				   "desc" => esc_html__("The project details button text content.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_button_details",
				   "type" => "text",
				   "value" => esc_html__("Explore", 'enar') // Explore - More Details - More - Details
			),
			
			/*array( "name" => esc_html__("Ajax Expand Button Text", 'enar'),
				   "desc" => esc_html__("The project ajax expand button text content.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_button_expand",
				   "type" => "text",
				   "value" => esc_html__("Expand", 'enar') // Expand
			),*/
			
			//--------------------------->
			array( "name" => esc_html__("Sorting Menu ( Sort-By )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Sort-By Option Text ).", 'enar'),
				   "id" => $shortcode."_portfolio_filters_sort_menu_by",
				   "type" => "text",
				   "value" => esc_html__("Sort By", 'enar')
			),
			array( "name" => esc_html__("Sorting Menu ( Names )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Names Option Text ).", 'enar'),
				   "id" => $shortcode."_portfolio_filters_sort_menu_names",
				   "type" => "text",
				   "value" => esc_html__("Names", 'enar')
			),
			array( "name" => esc_html__("Sorting Menu ( Dates )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Dates Option Text ).", 'enar'),
				   "id" => $shortcode."_portfolio_filters_sort_menu_dates",
				   "type" => "text",
				   "value" => esc_html__("Dates", 'enar')
			),
			/*array( "name" => esc_html__("Sorting Menu ( Likes )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Likes Option Text ).", 'enar'),
				   "id" => $shortcode."_portfolio_filters_sort_menu_likes",
				   "type" => "text",
				   "value" => esc_html__("Likes", 'enar')
			),*/
			array( "name" => esc_html__("Sorting Menu ( Comments )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Comments Option Text ).", 'enar'),
				   "id" => $shortcode."_portfolio_filters_sort_menu_comm",
				   "type" => "text",
				   "value" => esc_html__("Comments", 'enar')
			),
			
			//--------------------------->
			
			array( "name" => esc_html__("Number of Posts", 'enar'),
				   "desc" => esc_html__("Select number of projects display in this filter, ex: 20", 'enar'),
				   "id" => $shortcode."_portfolio_filters_num_posts",
				   "type" => "text",
				   "value" => "8"
			),
			//--------------------------->
			
			array( "name" => esc_html__("Select Category", 'enar'),
				   "desc" => esc_html__("", 'enar'),
				   "id" => $shortcode."_portfolio_filters_category",
				   "type" => "portfoliocategory"
			),
			array( "name" => esc_html__("Order Projects By", 'enar'),
				   "desc" => esc_html__("Sort the projects by...", 'enar'),
				   "id" => $shortcode."_portfolio_filters_orderby",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Order By Data", 'enar'),
							  "value" => "date"),		 	
						array("name" => esc_html__("Order By ID", 'enar'),
							  "value" => "ID"),
						array("name" => esc_html__("Order By Author", 'enar'),
							  "value" => "author"),
							  
						array("name" => esc_html__("Order By Title", 'enar'),
							  "value" => "title"),		 	
						array("name" => esc_html__("Order Random", 'enar'),
							  "value" => "rand"),
						array("name" => esc_html__("Order by number of comments", 'enar'),
							  "value" => "comment_count"),
				   )
			),
			array( "name" => esc_html__("Sort Projects By", 'enar'),
				   "desc" => esc_html__("Sort the projects by ascending or descending order.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_projects_order",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Descending Order", 'enar'),
							  "value" => "DESC"),		 	
						array("name" => esc_html__("Ascending Order", 'enar'),
							  "value" => "ASC"),
				   )
			),
			array( "name" => esc_html__("Order Categories By", 'enar'),
				   "desc" => esc_html__("Sort the projects categories by...", 'enar'),
				   "id" => $shortcode."_portfolio_filters_cat_order",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Count", 'enar'), 
							  "value" => "count"),			 	
						array("name" => esc_html__("Name", 'enar'), 
							  "value" => "name"),
						array("name" => esc_html__("ID", 'enar'), 
							  "value" => "ID"),	  
						array("name" => esc_html__("Slug", 'enar'), 
							  "value" => "slug"),	  
						array("name" => esc_html__("Term Group", 'enar'), 
							  "value" => "term_group"),	  
						)
			),
			array( "name" => esc_html__("Sort Categories By", 'enar'),
				   "desc" => esc_html__("Sort the categories by ascending or descending order.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_categories_order",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Descending Order", 'enar'),
							  "value" => "DESC"),		 	
						array("name" => esc_html__("Ascending Order", 'enar'),
							  "value" => "ASC"),
				   )
			),
			array( "name" => esc_html__("Show Empty", 'enar'),
				   "desc" => esc_html__("Show or hide empty categories that not contains any projects.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_show_empty",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "1"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "0"),			 	 
						)
			),
			array( "name" => esc_html__("Show All-Projects Button", 'enar'),
				   "desc" => esc_html__("This first button that will contains all the projects.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_hide_all_btn",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
								 	 
						)
			),
			/*array( "name" => esc_html__("Show Ajax Expand Button", 'enar'),
				   "desc" => esc_html__("Show or hide ajax content expand button.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_show_ajax_expand",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 
							  "value" => "hide"),			 	 
						)
			),*/
			array( "name" => esc_html__("Show Filters Buttons", 'enar'),
				   "desc" => esc_html__("Show or hide the categories menu filters that contains the list of categories as a horizontal menu.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_show_buttons",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),			 	
						)
			),	
			array( "name" => esc_html__("Show Sort-By Options", 'enar'),
				   "desc" => esc_html__("Show or hide sort-by options.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_show_sortby",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),			 	
						)
			),			
			array( "name" => esc_html__("Show Project Date", 'enar'),
				   "desc" => esc_html__("This option to show or hide the project date.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_show_date",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Show Project Categories", 'enar'),
				   "desc" => esc_html__("This option to show or hide the project categories.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_show_cats",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Show Comments Counter", 'enar'),
				   "desc" => esc_html__("This option to show or hide the project comments counter.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_show_comment_counter",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			/*array( "name" => esc_html__("Show Project Like Icon", 'enar'),
				   "desc" => esc_html__("This option to show or hide the project like button.", 'enar'),
				   "id" => $shortcode."_portfolio_filters_show_like_counter",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 
							  "value" => "hide"),
					)
			),*/
	array( "name" => esc_html__("Portfolio Filter", 'enar'),
		   "id" => "portfolio_filters",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Blog Filter
	
	array( "name" => esc_html__("Blog Filter", 'enar'),
		   "id" => "blog_filters",
		   "type" => "shortcodefather"
		  ),
		    
		    array( "name" => esc_html__("Filter Style", 'enar'),
				   "desc" => esc_html__("Choose the blog filter style.", 'enar'),
				   "id" => $shortcode."_blog_filters_style",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Simple Style", 'enar'),
							  "value" => "simple"),		 	
						array("name" => esc_html__("Bootom-Animate Effect", 'enar'),
							  "value" => "bootmanim"),
						array("name" => esc_html__("Hover-Dir Effect", 'enar'),
							  "value" => "hoverdir"),
				   )
			),
			array( "name" => esc_html__("Filter Layout", 'enar'),
				   "desc" => esc_html__("Choose the layout style for blog filter items.", 'enar'),
				   "id" => $shortcode."_blog_filters_layout",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Grid Boxes", 'enar'),
							  "value" => "grid_porto"),		 	
						array("name" => esc_html__("Masonry Layout", 'enar'),
							  "value" => "masonry_porto"),
				   )
			),
			array( "name" => esc_html__("Filter Width", 'enar'),
				   "desc" => esc_html__("Choose the layout width for the blog filter.", 'enar'),
				   "id" => $shortcode."_blog_filters_layout_width",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Boxed Layout", 'enar'),
							  "value" => "boxed_portos"),		 	
						array("name" => esc_html__("FullWidth Layout", 'enar'),
							  "value" => "full_portos"),
				   )
			),
			array( "name" => esc_html__("Filter Columns", 'enar'),
				   "desc" => esc_html__("Choose how many posts boxes you want to show in one row.", 'enar'),
				   "id" => $shortcode."_blog_filters_columns",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("2 Columns", 'enar'),
							  "value" => "two_blocks"),		 	
						array("name" => esc_html__("3 Columns", 'enar'),
							  "value" => "three_blocks"),
					    array("name" => esc_html__("4 Columns", 'enar'),
							  "value" => "four_blocks"),
						array("name" => esc_html__("5 Columns", 'enar'),
							  "value" => "five_portos"),
				   )
			),
			array( "name" => esc_html__("Blocks Spaces", 'enar'),
				   "desc" => esc_html__("The blank space between posts boxes.", 'enar'),
				   "id" => $shortcode."_blog_filters_spaces",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Has Spaces", 'enar'),
							  "value" => "has_sapce_portos"),		 	
						array("name" => esc_html__("No Spaces", 'enar'),
							  "value" => "no_sapce_portos"),
				   )
			),
			array( "name" => esc_html__("Filter Menu Counter", 'enar'),
				   "desc" => esc_html__("The counter box shows the number of posts within each category.", 'enar'),
				   "id" => $shortcode."_blog_filters_counter",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Show Counter", 'enar'),
							  "value" => "nav_with_nums"),		 	
						array("name" => esc_html__("Hide Counter", 'enar'),
							  "value" => "nav_no_nums"),
				   )
			),
			array( "name" => esc_html__("Buttons Style", 'enar'),
				   "desc" => esc_html__("Choose the blog filter buttons style.", 'enar'),
				   "id" => $shortcode."_blog_button_style",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Text Buttons", 'enar'),
							  "value" => "text_but"),		 	
						array("name" => esc_html__("Icon Buttons", 'enar'),
							  "value" => "icon_but"),
				   )
			),
			array( "name" => esc_html__("All-Posts Button Text", 'enar'),
				   "desc" => esc_html__("The all-posts button text content.", 'enar'),
				   "id" => $shortcode."_blog_filters_all_btn_text",
				   "type" => "text",
				   "value" => esc_html__("All", 'enar')
			),
			array( "name" => esc_html__("Zoom Button Text", 'enar'),
				   "desc" => esc_html__("The post image zoom button text content.", 'enar'),
				   "id" => $shortcode."_blog_filters_button_zoom",
				   "type" => "text",
				   "value" => esc_html__("Zoom", 'enar'), // View Larger - Zoom
			),
			
			array( "name" => esc_html__("Details Button Text", 'enar'),
				   "desc" => esc_html__("Post details button text content.", 'enar'),
				   "id" => $shortcode."_blog_filters_button_details",
				   "type" => "text",
				   "value" => esc_html__("Explore", 'enar') // Explore - More Details - More - Details
			),
			
			/*array( "name" => esc_html__("Ajax Expand Button Text", 'enar'),
				   "desc" => esc_html__("Post ajax expand button text content.", 'enar'),
				   "id" => $shortcode."_blog_filters_button_expand",
				   "type" => "text",
				   "value" => esc_html__("Expand", 'enar') // Expand
			),*/
			
			//--------------------------->
			array( "name" => esc_html__("Sorting Menu ( Sort-By )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Sort-By Option Text ).", 'enar'),
				   "id" => $shortcode."_blog_filters_sort_menu_by",
				   "type" => "text",
				   "value" => esc_html__("Sort By", 'enar')
			),
			array( "name" => esc_html__("Sorting Menu ( Names )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Names Option Text ).", 'enar'),
				   "id" => $shortcode."_blog_filters_sort_menu_names",
				   "type" => "text",
				   "value" => esc_html__("Names", 'enar')
			),
			array( "name" => esc_html__("Sorting Menu ( Dates )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Dates Option Text ).", 'enar'),
				   "id" => $shortcode."_blog_filters_sort_menu_dates",
				   "type" => "text",
				   "value" => esc_html__("Dates", 'enar')
			),
			/*array( "name" => esc_html__("Sorting Menu ( Likes )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Likes Option Text ).", 'enar'),
				   "id" => $shortcode."_blog_filters_sort_menu_likes",
				   "type" => "text",
				   "value" => esc_html__("Likes", 'enar')
			),*/
			array( "name" => esc_html__("Sorting Menu ( Comments )", 'enar'),
				   "desc" => esc_html__("The text content for sort-by menu ( Comments Option Text ).", 'enar'),
				   "id" => $shortcode."_blog_filters_sort_menu_comm",
				   "type" => "text",
				   "value" => esc_html__("Comments", 'enar')
			),
			
			//--------------------------->
			
			array( "name" => esc_html__("Number of Posts", 'enar'),
				   "desc" => esc_html__("Select number of posts display in this filter, ex: 20", 'enar'),
				   "id" => $shortcode."_blog_filters_num_posts",
				   "type" => "text",
				   "value" => "8"
			),
			//--------------------------->
			
			array( "name" => esc_html__("Select Category", 'enar'),
				   "desc" => esc_html__("", 'enar'),
				   "id" => $shortcode."_blog_filters_category",
				   "type" => "postcategory"
			),
			array( "name" => esc_html__("Order Posts By", 'enar'),
				   "desc" => esc_html__("Sort posts by...", 'enar'),
				   "id" => $shortcode."_blog_filters_orderby",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Order By Data", 'enar'),
							  "value" => "date"),		 	
						array("name" => esc_html__("Order By ID", 'enar'),
							  "value" => "ID"),
						array("name" => esc_html__("Order By Author", 'enar'),
							  "value" => "author"),
							  
						array("name" => esc_html__("Order By Title", 'enar'),
							  "value" => "title"),		 	
						array("name" => esc_html__("Order Random", 'enar'),
							  "value" => "rand"),
						array("name" => esc_html__("Order by number of comments", 'enar'),
							  "value" => "comment_count"),
				   )
			),
			array( "name" => esc_html__("Sort Posts By", 'enar'),
				   "desc" => esc_html__("Sort posts by ascending or descending order.", 'enar'),
				   "id" => $shortcode."_blog_filters_projects_order",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Descending Order", 'enar'),
							  "value" => "DESC"),		 	
						array("name" => esc_html__("Ascending Order", 'enar'),
							  "value" => "ASC"),
				   )
			),
			array( "name" => esc_html__("Order Categories By", 'enar'),
				   "desc" => esc_html__("Sort posts categories by...", 'enar'),
				   "id" => $shortcode."_blog_filters_cat_order",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Count", 'enar'), 
							  "value" => "count"),			 	
						array("name" => esc_html__("Name", 'enar'), 
							  "value" => "name"),
						array("name" => esc_html__("ID", 'enar'), 
							  "value" => "ID"),	  
						array("name" => esc_html__("Slug", 'enar'), 
							  "value" => "slug"),	  
						array("name" => esc_html__("Term Group", 'enar'), 
							  "value" => "term_group"),	  
						)
			),
			array( "name" => esc_html__("Sort Categories By", 'enar'),
				   "desc" => esc_html__("Sort the categories by ascending or descending order.", 'enar'),
				   "id" => $shortcode."_blog_filters_categories_order",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Descending Order", 'enar'),
							  "value" => "DESC"),		 	
						array("name" => esc_html__("Ascending Order", 'enar'),
							  "value" => "ASC"),
				   )
			),
			array( "name" => esc_html__("Show Empty", 'enar'),
				   "desc" => esc_html__("Show or hide empty categories that not contains any posts.", 'enar'),
				   "id" => $shortcode."_blog_filters_show_empty",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "1"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "0"),			 	 
						)
			),
			array( "name" => esc_html__("Show All-Posts Button", 'enar'),
				   "desc" => esc_html__("This first button that will show all posts.", 'enar'),
				   "id" => $shortcode."_blog_filters_hide_all_btn",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
								 	 
						)
			),
			/*array( "name" => esc_html__("Show Ajax Expand Button", 'enar'),
				   "desc" => esc_html__("Show or hide ajax content expand button.", 'enar'),
				   "id" => $shortcode."_blog_filters_show_ajax_expand",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 
							  "value" => "hide"),			 	 
						)
			),*/
			array( "name" => esc_html__("Show Filters Buttons", 'enar'),
				   "desc" => esc_html__("Show or hide the categories menu filters that contains the list of categories as a horizontal menu.", 'enar'),
				   "id" => $shortcode."_blog_filters_show_buttons",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),			 	
						)
			),	
			array( "name" => esc_html__("Show Sort-By Options", 'enar'),
				   "desc" => esc_html__("Show or hide sort-by options.", 'enar'),
				   "id" => $shortcode."_blog_filters_show_sortby",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),			 	
						)
			),			
			array( "name" => esc_html__("Show Posts Dates", 'enar'),
				   "desc" => esc_html__("This option to show or hide the post date.", 'enar'),
				   "id" => $shortcode."_blog_filters_show_date",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Show Posts Categories", 'enar'),
				   "desc" => esc_html__("This option to show or hide the post categories.", 'enar'),
				   "id" => $shortcode."_blog_filters_show_cats",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Show Comments Counter", 'enar'),
				   "desc" => esc_html__("This option to show or hide the post comments counter.", 'enar'),
				   "id" => $shortcode."_blog_filters_show_comment_counter",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			/*array( "name" => esc_html__("Show Post Like Icon", 'enar'),
				   "desc" => esc_html__("This option to show or hide the post like button.", 'enar'),
				   "id" => $shortcode."_blog_filters_show_like_counter",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 
							  "value" => "hide"),
					)
			),*/
	array( "name" => esc_html__("Blog Filter", 'enar'),
		   "id" => "blog_filters",
		   "type" => "shortcodefatherclose"),
		   
	//=============================================================================================> Social Media Sharing
    
	array( "name" => esc_html__("Social Media Sharing", 'enar'),
		   "id" => "hm_social_share",
		   "type" => "shortcodefather"
		  ),
			array( "name" => esc_html__("Title", 'enar'),
				   "desc" => esc_html__("The title text for this share buttons.", 'enar'),
				   "id" => $shortcode."_social_share_title",
				   "value" => "Share:",
				   "type" => "text"
			),
			array( "name" => esc_html__("Facebook", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on facebook.", 'enar'),
				   "id" => $shortcode."_social_share_facebook",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Twitter", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on twitter.", 'enar'),
				   "id" => $shortcode."_social_share_twitter",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Google+", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on googleplus.", 'enar'),
				   "id" => $shortcode."_social_share_googleplus",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Pinterest", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on pinterest.", 'enar'),
				   "id" => $shortcode."_social_share_pinterest",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Linkedin", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on linkedin.", 'enar'),
				   "id" => $shortcode."_social_share_linkedin",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Email", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on email.", 'enar'),
				   "id" => $shortcode."_social_share_email",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Stumbleupon", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on stumbleupon.", 'enar'),
				   "id" => $shortcode."_social_share_stumbleupon",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Digg", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on digg.", 'enar'),
				   "id" => $shortcode."_social_share_digg",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Reddit", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on reddit.", 'enar'),
				   "id" => $shortcode."_social_share_reddit",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Delicious", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on delicious.", 'enar'),
				   "id" => $shortcode."_social_share_delicious",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			array( "name" => esc_html__("Tumblr", 'enar'),
				   "desc" => esc_html__("Show or hide the sharing button on tumblr.", 'enar'),
				   "id" => $shortcode."_social_share_tumblr",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"), 
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),
					)
			),
			
	array( "name" => esc_html__("Social Media Sharing", 'enar'),
		   "id" => "hm_social_share",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Social Media Links
    
	array( "name" => esc_html__("Social Media Links", 'enar'),
		   "id" => "hm_social_links",
		   "type" => "shortcodefather"
		  ),
		    array( "name" => esc_html__("Social Links Style", 'enar'),
				   "desc" => esc_html__("Choose social links style.", 'enar'),
				   "id" => $shortcode."_social_media_style",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Square Style", 'enar'), 
							  "value" => "default_socials"), 
						array("name" => esc_html__("Circle Style", 'enar'), 
							  "value" => "circle_socials"),
					)
			),
			array( "name" => esc_html__("Social Links Color Mode", 'enar'),
				   "desc" => esc_html__("Choose social links color mode.", 'enar'),
				   "id" => $shortcode."_social_media_color",
				   "type" => "selectbox",
				   "option" => array( 		 	
						array("name" => esc_html__("Simple Style", 'enar'), 
							  "value" => "simple_socials"), 
						array("name" => esc_html__("Colored Style", 'enar'), 
							  "value" => "colored_socials"),
					)
			),
			array( "name" => esc_html__("Social Links Title", 'enar'),
				   "desc" => esc_html__("Social links title text content, ex: Follow Us", 'enar'),
				   "id" => $shortcode."_social_media_title",
				   "type" => "text",
				   "value" => "Follow Us: "
			),
			array( "name" => esc_html__("Social Media Links", 'enar'),
				   "desc" => esc_html__("Add social media links here", 'enar'),
				   "id" => $shortcode."_social_media_con",
				   "type" => "social"
			),
			
	array( "name" => esc_html__("Social Media Links", 'enar'),
		   "id" => "hm_social_links",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> List Icon
    
	array( "name" => esc_html__("List Icon", 'enar'),
		   "id" => "hm_features_lists",
		   "type" => "shortcodefather"
		  ),
		    array( "name" => esc_html__("List Style", 'enar'),
				   "desc" => esc_html__("Choose the arrows style for this list items.", 'enar'),
				   "id" => $shortcode."_hm_features_lists_style",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Check Arrows", 'enar'), 
							  "value" => "check_arrows"),			 	
						array("name" => esc_html__("Red Rounded Arrows", 'enar'), 
							  "value" => "red_rounded_arrows"),	
						array("name" => esc_html__("Gray Rounded Arrows", 'enar'), 
							  "value" => "gray_rounded_arrows"),	
						array("name" => esc_html__("Blue Square Arrows", 'enar'), 
							  "value" => "blue_square_arrows"),
						array("name" => esc_html__("No Arrows", 'enar'), 
							  "value" => "no_arrow"),
						)
			),
			//==>
			array( "name" => "shortcodeblock",
				   "id" => $shortcode."_hm_features_lists_group",
				   "type" => "shortcodeblock"
			),
				array( "name" => esc_html__("List Item Title", 'enar'),
				   	   "desc" => esc_html__("The title for this list item.", 'enar'),
					   "id" => $shortcode."_hm_features_lists_title",
					   "type" => "text"
				),
				
				array( "name" => esc_html__("List Item Content Text", 'enar'),
					   "desc" => esc_html__("The content text of this list item.", 'enar'),
					   "id" => $shortcode."_hm_features_lists_con",
					   "type" => "textarea"
				),
				array( "name" => esc_html__("List Item URL", 'enar'),
				   	   "desc" => esc_html__("Go to this link when clicking on this list item.", 'enar'),
					   "id" => $shortcode."_hm_features_lists_url",
					   "type" => "text"
				),	
				
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_hm_features_lists_group",
				   "type" => "shortcodeblockclose"
			),
			
			array( "name" => esc_html__("Add List Item", 'enar'),
				   "id" => $shortcode."_hm_features_lists_duplicater",
				   "group" => $shortcode."_hm_features_lists_group",
				   "type" => "repeatercopier"
			),
			
	array( "name" => esc_html__("Features Lists", 'enar'),
		   "id" => "hm_features_lists",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Text Box
    
	array( "name" => esc_html__("Text Box", 'enar'),
		   "id" => "hm_text_box",
		   "type" => "shortcodefather"
		  ),
		    array( "name" => esc_html__("Content Text", 'enar'),
				   "desc" => esc_html__("The content text here.", 'enar'),
				   "id" => $shortcode."_hm_text_box_content",
				   "type" => "textarea"
			),
			
	array( "name" => esc_html__("Text Box", 'enar'),
		   "id" => "hm_text_box",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Features Slider
    
	array( "name" => esc_html__("Features Icons Slider", 'enar'),
		   "id" => "hm_features_slider",
		   "type" => "shortcodefather"
		  ),
		    array( "name" => esc_html__("Feature Image", 'enar'),
				   "desc" => esc_html__("Display the image as a main image.", 'enar'),
				   "id" => $shortcode."_features_slider_img",
				   "type" => "media"
			),
			
			//================>
			array( "name" => "shortcodeblock",
				   "id" => $shortcode."_features_slider_group",
				   "type" => "shortcodeblock"
			),
				array( "name" => esc_html__("Feature Item Title", 'enar'),
				   	   "desc" => esc_html__("The feature item title text.", 'enar'),
					   "id" => $shortcode."_features_slider_title",
					   "type" => "text"
				),
				
				array( "name" => esc_html__("Feature Item Text", 'enar'),
					   "desc" => esc_html__("The feature item content text.", 'enar'),
					   "id" => $shortcode."_features_slider_text",
					   "type" => "textarea"
				),
				
				array( "name" => esc_html__("Feature Item Icon", 'enar'),
				   "desc" => esc_html__("Choose the icon for this section", 'enar'),
				   "id" => $shortcode."_section_container_icon",
				   "type" => "icon"
				),
				
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_features_slider_group",
				   "type" => "shortcodeblockclose"
			),
			
			array( "name" => esc_html__("New Feature Item", 'enar'),
				   "id" => $shortcode."_features_slider_group_duplicater",
				   "group" => $shortcode."_features_slider_group",
				   "type" => "repeatercopier"
			),
			//================>
			
	array( "name" => esc_html__("Features Slider", 'enar'),
		   "id" => "hm_features_slider",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> News Bar
	
	array( "name" => esc_html__("News Bar", 'enar'),
			"id" => "news_bar",
			"type" => "shortcodefather"
		),
		array( "name" => esc_html__("Title", 'enar'),
			   "desc" => esc_html__("The news bar title text.", 'enar'),
			   "id" => $shortcode."_news_bar_title",
			   "type" => "text"
		),
		array( "name" => esc_html__("Show Title", 'enar'),
			   "desc" => esc_html__("This option to show or hide the news bar title.", 'enar'),
			   "id" => $shortcode."_news_bar_show_title",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Show Title Icon", 'enar'),
			   "desc" => esc_html__("This option to show or hide the news bar title icon.", 'enar'),
			   "id" => $shortcode."_news_bar_show_icon",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Posts Number", 'enar'),
			   "desc" => esc_html__("The posts number showing in this news bar, ex: 10", 'enar'),
			   "id" => $shortcode."_news_bar_posts_num",
			   "type" => "text",
			   "value" => "10"
		),
		array( "name" => esc_html__("Order Posts By", 'enar'),
			   "desc" => esc_html__("Sort news bar posts by.", 'enar'),
			   "id" => $shortcode."_news_bar_posts_order_by",
			   "type" => "selectbox",
			   "option" => array(
					array("name" => esc_html__("Order By Data", 'enar'),
						  "value" => "date"),		 	
					array("name" => esc_html__("Order By ID", 'enar'),
						  "value" => "ID"),
					array("name" => esc_html__("Order By Author", 'enar'),
						  "value" => "author"),
						  
				    array("name" => esc_html__("Order By Title", 'enar'),
						  "value" => "title"),		 	
					array("name" => esc_html__("Order Random", 'enar'),
						  "value" => "rand"),
					array("name" => esc_html__("Order by number of comments", 'enar'),
						  "value" => "comment_count"),
			   )
		),	
		array( "name" => esc_html__("Order By", 'enar'),
			   "desc" => esc_html__("Sort news bar posts by ascending or descending order.", 'enar'),
			   "id" => $shortcode."_news_bar_posts_order",
			   "type" => "selectbox",
			   "option" => array(
					array("name" => esc_html__("Descending Order", 'enar'),
						  "value" => "DESC"),		 	
					array("name" => esc_html__("Ascending Order", 'enar'),
						  "value" => "ASC"),
			   )
		),
		
		//--------------------------->
		
		array( "name" => "specialblock",
		   "id" => $shortcode."_blog_carousel_posts_from_con",
		   "type" => "specialblock"
		),
			array( "name" => esc_html__("Get Posts From", 'enar'),
				   "desc" => esc_html__("Choose where you get the news bar posts.", 'enar'),
				   "id" => $shortcode."_news_bar_posts_from",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("From All Posts", 'enar'),
							  "value" => "from_all"),		 	
						array("name" => esc_html__("Choose From The Categories", 'enar'),
							  "value" => "from_cats"),
						array("name" => esc_html__("Select From The Posts", 'enar'),
							  "value" => "from_posts"),
				   )
			),
		
			array( "type" => "hidden","class" => "from_cats"),
				array( "name" => esc_html__("Select From Categories", 'enar'),
					   "desc" => esc_html__("Choose the categories to include in the news bar.", 'enar'),
					   "id" => $shortcode."_news_bar_posts_from_cats",
					   "type" => "multiple_select",
					   "option" => idealtheme_get_posts_cats('post', 'category', 'get_cats'),
				),
			array( "type" => "hiddenclose"),
			array( "type" => "hidden","class" => "from_posts"),
				array( "name" => esc_html__("Select From Posts", 'enar'),
					   "desc" => esc_html__("Choose the posts to include in the news bar.", 'enar'),
					   "id" => $shortcode."_news_bar_posts_from_posts",
					   "type" => "multiple_select",
					   "option" => idealtheme_get_posts_cats('post', 'category', 'get_posts'),
				),
			array( "type" => "hiddenclose"),
			
		array( "name" => "specialblockclose",
		   "id" => $shortcode."_news_bar_posts_from_con",
		   "type" => "specialblockclose"
		),
		
		//--------------------------->
		
	array( "name" => esc_html__("News Bar", 'enar'),
		   "id" => "news_bar",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Contact Details
	
	array( "name" => esc_html__("Contact Details", 'enar'),
		   "id" => "contact_details",
		   "type" => "shortcodefather"
		  ),	
		    
			array( "name" => esc_html__("Main Title", 'enar'),
				   "desc" => esc_html__("The main title content text.", 'enar'),
				   "id" => $shortcode."_contact_details_title",
				   "type" => "text"
			),
			array( "name" => esc_html__("Icon BG-Color", 'enar'),
				   "desc" => esc_html__("Choose icon background color", 'enar'),
				   "id" => $shortcode."_contact_details_icon_color",
				   "type" => "color"
			), 
			array( "name" => esc_html__("Icon", 'enar'),
				   "desc" => esc_html__("Choose the main icon.", 'enar'),
				   "id" => $shortcode."_contact_details_icon",
				   "type" => "icon"
			),
					
			array( "name" => "shortcodeblock",
				   "id" => $shortcode."_contact_details_group",
				   "type" => "shortcodeblock"
				  ),
		
				array( "name" => esc_html__("Title", 'enar'),
				   	   "desc" => esc_html__("The title for this details row.", 'enar'),
					   "id" => $shortcode."_contact_details_row_title",
					   "type" => "text"
				),
				
				array( "name" => esc_html__("Content Text", 'enar'),
					   "desc" => esc_html__("The content text of this tab item.", 'enar'),
					   "id" => $shortcode."_contact_details_content",
					   "type" => "textarea"
				),
			
			array( "name" => "shortcodeblockclose",
				   "id" => $shortcode."_contact_details_group",
				   "type" => "shortcodeblockclose"
				  ),
			
			array( "name" => esc_html__("Add New Row", 'enar'),
				   "id" => $shortcode."_contact_details_group_duplicater",
				   "group" => $shortcode."_contact_details_group",
				   "type" => "repeatercopier"
				  ),

	array ( "name" => esc_html__("Contact Details", 'enar'),
		   	"id" => "contact_details",
		    "type" => "shortcodefatherclose"),
	
	//=============================================================================================> FAQs Filter
	array( "name" => esc_html__("FAQs Filter", 'enar'),
		   "id" => "faqs_filters",
		   "type" => "shortcodefather"
		  ),
		    
			array( "name" => esc_html__("Select Categories", 'enar'),
				   "desc" => esc_html__("", 'enar'),
				   "id" => $shortcode."_faqs_filters_category",
				   "type" => "faqscategory"
			),
			array( "name" => esc_html__("Order By", 'enar'),
				   "desc" => esc_html__("Sort FAQs by...", 'enar'),
				   "id" => $shortcode."_faqs_filters_posts_orderby",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Order By Data", 'enar'),
							  "value" => "date"),		 	
						array("name" => esc_html__("Order By ID", 'enar'),
							  "value" => "ID"),
						array("name" => esc_html__("Order By Author", 'enar'),
							  "value" => "author"),
							  
						array("name" => esc_html__("Order By Title", 'enar'),
							  "value" => "title"),		 	
						array("name" => esc_html__("Order Random", 'enar'),
							  "value" => "rand"),
						array("name" => esc_html__("Order by number of comments", 'enar'),
							  "value" => "comment_count"),
				   )
			),
			array( "name" => esc_html__("Sort FAQs By", 'enar'),
				   "desc" => esc_html__("Sort FAQs by ascending or descending order.", 'enar'),
				   "id" => $shortcode."_faqs_filters_posts_order",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Descending Order", 'enar'),
							  "value" => "DESC"),		 	
						array("name" => esc_html__("Ascending Order", 'enar'),
							  "value" => "ASC"),
				   )
			),
			array( "name" => esc_html__("Order Categories By", 'enar'),
				   "desc" => esc_html__("Sort FAQs categories by...", 'enar'),
				   "id" => $shortcode."_faqs_filters_cat_orderby",
				   "type" => "selectbox",
				   "option" => array( 
						array("name" => esc_html__("Count", 'enar'), 
							  "value" => "count"),			 	
						array("name" => esc_html__("Name", 'enar'), 
							  "value" => "name"),
						array("name" => esc_html__("ID", 'enar'), 
							  "value" => "ID"),	  
						array("name" => esc_html__("Slug", 'enar'), 
							  "value" => "slug"),	  
						array("name" => esc_html__("Term Group", 'enar'), 
							  "value" => "term_group"),	  
						)
			),
			array( "name" => esc_html__("Sort Categories By", 'enar'),
				   "desc" => esc_html__("Sort FAQs categories by ascending or descending order.", 'enar'),
				   "id" => $shortcode."_faqs_filters_cat_order",
				   "type" => "selectbox",
				   "option" => array(
						array("name" => esc_html__("Descending Order", 'enar'),
							  "value" => "DESC"),		 	
						array("name" => esc_html__("Ascending Order", 'enar'),
							  "value" => "ASC"),
				   )
			),
			array( "name" => esc_html__("Show Empty", 'enar'),
				   "desc" => esc_html__("Show or hide empty categories that not contains any projects.", 'enar'),
				   "id" => $shortcode."_faqs_filters_show_empty",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "1"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "0"),			 	 
						)
			),
			array( "name" => esc_html__("Show Filters Buttons", 'enar'),
				   "desc" => esc_html__("Show or hide FAQs categories menu, that contains the list of categories as a horizontal menu.", 'enar'),
				   "id" => $shortcode."_faqs_filters_show_buttons",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"),			 	
						)
			),
			array( "name" => esc_html__("Show All-FAQs Button", 'enar'),
				   "desc" => esc_html__("This first button that will contains all FAQs posts.", 'enar'),
				   "id" => $shortcode."_faqs_filters_hide_all_btn",
				   "type" => "selectbox",
				   "option" => array( 
				        array("name" => esc_html__("Show", 'enar'), 
							  "value" => "show"),
						array("name" => esc_html__("Hide", 'enar'), 
							  "value" => "hide"), 	 
						)
			),
			array( "name" => esc_html__("All-FAQs Button Text", 'enar'),
				   "desc" => esc_html__("The all-FAQs button text content.", 'enar'),
				   "id" => $shortcode."_faqs_filters_all_btn_text",
				   "type" => "text",
				   "value" => esc_html__("All-FAQs", 'enar')
			),	
	array( "name" => esc_html__("FAQs Filter", 'enar'),
		   "id" => "faqs_filters",
		   "type" => "shortcodefatherclose"),
	
	//=============================================================================================> Coming Soon
	
	array( "name" => esc_html__("Coming Soon", 'enar'),
		   "id" => "coming_soon",
		   "type" => "shortcodefather"
		  ),	
		    
			array( "name" => esc_html__("Event Date", 'enar'),
				   "desc" => esc_html__("The event date, for example: 12/20/2020", 'enar'),
				   "id" => $shortcode."_coming_soon_day",
				   "type" => "text"
			),
			array( "name" => esc_html__("Day Path Color", 'enar'),
				   "desc" => esc_html__("Choose the background color for day path.", 'enar'),
				   "id" => $shortcode."_coming_soon_day_color",
				   "type" => "color"
			), 
			array( "name" => esc_html__("Day Path Title", 'enar'),
				   "desc" => esc_html__("This text will display as a title for ( days ) circle path.", 'enar'),
				   "id" => $shortcode."_coming_soon_day_title",
				   "type" => "text",
				   "value" => "Day"
			),
			//===>
			array( "name" => esc_html__("Event Hour", 'enar'),
				   "desc" => esc_html__("The event hour, from ( 1 to 24 ) 15 means 3PM hour.", 'enar'),
				   "id" => $shortcode."_coming_soon_hour",
				   "type" => "text",
				   "value" => "15"
			),
			array( "name" => esc_html__("Hour Path Color", 'enar'),
				   "desc" => esc_html__("Choose the background color for hour circle path.", 'enar'),
				   "id" => $shortcode."_coming_soon_hour_color",
				   "type" => "color"
			), 
			array( "name" => esc_html__("Hour Path Title", 'enar'),
				   "desc" => esc_html__("This text will display as a title for ( hours ) circle path.", 'enar'),
				   "id" => $shortcode."_coming_soon_hour_title",
				   "type" => "text",
				   "value" => "Hour"
			),		
			//===>
			array( "name" => esc_html__("Minutes Path Color", 'enar'),
				   "desc" => esc_html__("Choose the background color for minutes circle path.", 'enar'),
				   "id" => $shortcode."_coming_soon_minutes_color",
				   "type" => "color"
			), 
			array( "name" => esc_html__("Minutes Path Title", 'enar'),
				   "desc" => esc_html__("This text will display as a title for ( minutes ) circle path.", 'enar'),
				   "id" => $shortcode."_coming_soon_minutes_title",
				   "type" => "text",
				   "value" => "Minute"
			),
			//===>
			array( "name" => esc_html__("Seconds Path Color", 'enar'),
				   "desc" => esc_html__("Choose the background color for seconds circle path.", 'enar'),
				   "id" => $shortcode."_coming_soon_seconds_color",
				   "type" => "color"
			), 
			array( "name" => esc_html__("Seconds Path Title", 'enar'),
				   "desc" => esc_html__("This text will display as a title for ( seconds ) circle path.", 'enar'),
				   "id" => $shortcode."_coming_soon_seconds_title",
				   "type" => "text",
				   "value" => "Second"
			),
	array ( "name" => esc_html__("Coming Soon", 'enar'),
		   	"id" => "coming_soon",
		    "type" => "shortcodefatherclose"), 
	
	//=============================================================================================> WooCommerce Related
	
	array( "name" => esc_html__("WooCommerce Related", 'enar'),
			"id" => "woocommerce_related",
			"type" => "shortcodefather"
		),
		array( "name" => esc_html__("Select Products", 'enar'),
			   "desc" => esc_html__("Choose the products to include in the carousel.", 'enar'),
			   "id" => $shortcode."_woocommerce_related_posts",
			   "type" => "multiple_select",
			   "option" => idealtheme_get_posts_cats('product', 'product_cat', 'get_posts'),
		),
		array( "name" => esc_html__("Posts Number", 'enar'),
			   "desc" => esc_html__("Number of posts showing in this carousel, ex: 10", 'enar'),
			   "id" => $shortcode."_woocommerce_related_posts_num",
			   "type" => "text",
			   "value" => "10"
		),
		array( "name" => esc_html__("Show Products Categories", 'enar'),
			   "desc" => esc_html__("This option to show or hide the products categories.", 'enar'),
			   "id" => $shortcode."_woocommerce_related_show_cats",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Show Products Price", 'enar'),
			   "desc" => esc_html__("This option to show or hide the products price.", 'enar'),
			   "id" => $shortcode."_woocommerce_related_show_price",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Show Products Review", 'enar'),
			   "desc" => esc_html__("This option to show or hide the products reviews rating.", 'enar'),
			   "id" => $shortcode."_woocommerce_related_show_review",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Show Products Cart Button", 'enar'),
			   "desc" => esc_html__("This option to show or hide the products cart button.", 'enar'),
			   "id" => $shortcode."_woocommerce_related_show_add_btn",
			   "type" => "selectbox",
			   "option" => array( 		 	
					array("name" => esc_html__("Show", 'enar'), 
						  "value" => "show"), 
					array("name" => esc_html__("Hide", 'enar'), 
						  "value" => "hide"),
				)
		),
		array( "name" => esc_html__("Order Posts By", 'enar'),
			   "desc" => esc_html__("Sort products posts by.", 'enar'),
			   "id" => $shortcode."_woocommerce_related_posts_order_by",
			   "type" => "selectbox",
			   "option" => array(
					array("name" => esc_html__("Order By Data", 'enar'),
						  "value" => "date"),		 	
					array("name" => esc_html__("Order By ID", 'enar'),
						  "value" => "ID"),
					array("name" => esc_html__("Order By Author", 'enar'),
						  "value" => "author"),
						  
				    array("name" => esc_html__("Order By Title", 'enar'),
						  "value" => "title"),		 	
					array("name" => esc_html__("Order Random", 'enar'),
						  "value" => "rand"),
					array("name" => esc_html__("Order by number of comments", 'enar'),
						  "value" => "comment_count"),
			   )
		),	
		array( "name" => esc_html__("Order By", 'enar'),
			   "desc" => esc_html__("Sort products posts by ascending or descending order.", 'enar'),
			   "id" => $shortcode."_woocommerce_related_posts_order",
			   "type" => "selectbox",
			   "option" => array(
					array("name" => esc_html__("Descending Order", 'enar'),
						  "value" => "DESC"),		 	
					array("name" => esc_html__("Ascending Order", 'enar'),
						  "value" => "ASC"),
			   )
		),
	array( "name" => esc_html__("WooCommerce Related", 'enar'),
		   "id" => "woocommerce_related",
		   "type" => "shortcodefatherclose"),
		   		  	   
); ?>
<!DOCTYPE html><html><head><title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()) . '/theme-admin/'; ?>shortcodes/css/shortcodes-popup-style.css" />
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()) . '/css/'; ?>icon-fonts.css" />
<script src="<?php echo esc_url(get_template_directory_uri()) . '/theme-admin/'; ?>shortcodes/js/shortcode-functions.js"></script>
</head><body>
	
<div id="idealtheme_fun_popup_con" class="all_shortcodes_con">	
    <div class="shortcodes_options_container">
    	<?php 
        
        foreach ($idealtheme_shortcodes as $shortcode) {
            switch ( $shortcode['type'] ) {
		
			//========> shortcodefather
			
			case "shortcodefather":
			    $shortcode_desc = ( isset ($shortcode['desc'])) ? '<span class="desc_of_title">'.$shortcode['desc'].'</span>' : '';
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_options_block">
					<!-- <h2 class="main_title_for_shortcodes_row"><strong class="boldy_t">'.$shortcode['name'].'</strong>
						'.$shortcode_desc.'
				    </h2> -->
					<div class="form_con">
						<form class="shortcode_form_con" id="form_'.$shortcode['id'].'">';
			break;
			
			//========> shortcodefatherclose
			case "shortcodefatherclose":
				echo '<a href="#" id="insert_'.$shortcode['id'].'" class="submit button button-primary button-large">'.esc_html__("Insert", 'enar').' '.$shortcode['name'].' '.esc_html__("Shortcode", 'enar').'</a> 
					</form></div></div>';
			break;
			
			//========> Shortcode container
			case "shortcodeblock":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcode_group_block group"><span class="handle_group"><i class="ico-sort"></i></span><span class="remove_group"><i class="ico-close2"></i></span>';
			break;
			
			case "shortcodeblockclose":
				echo '</div>';
			break;
			
			//========> Special Block
			case "specialblock":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="specialblock shortcode_group_block">';
			break;
			
			case "specialblockclose":
				echo '</div>';
			break;
			
			//========> Special Block
			case "hidden":
				echo '<div class="hiddenblock '.$shortcode['class'].'">';
			break;
			
			case "hiddenclose":
				echo '</div>';
			break;
			
			//========> repeater
			case "repeatercopier";
				echo '<div class="repeater_con"><a href="'.esc_attr($shortcode['group']).'" id="'.esc_attr($shortcode['id']).'" class="repeater button button-primary button-large">&raquo; '.$shortcode['name'].'</a></div>';
			break;
			
			//========> Input Text
			case "text":
			    $text_value = ( isset ($shortcode['value']) && $shortcode['value'] !== '' ) ? $shortcode['value'] : '';
			    $desc_value = ( isset ($shortcode['desc'])) ? '<span class="title_desc">'.$shortcode['desc'].'</span>' : '';
				
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								'.$desc_value.'
						  </div>';
					echo '<div class="shortcodes_block">
							 <div class="input_con">
								<input type="text" name="'.esc_attr($shortcode['id']).'" id="'.esc_attr($shortcode['id']).'" value="'.esc_attr($text_value).'" size="30" />
							 </div>
						  </div>';
				echo '</div>';
			break;
			
			//========> options  
			case 'selectbox':  
			    
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '<div class="shortcodes_title">
							  <span class="title_for_row">'.$shortcode['name'].'</span>
							  <span class="title_desc">'.$shortcode['desc'].'</span>
						  </div>';
					echo '<div class="shortcodes_block">
					          <div class="select_con">
								<select name="'.esc_attr($shortcode['id']).'" id="'.esc_attr($shortcode['id']).'">';
								
								foreach ($shortcode['option'] as $shortcode_key) {
									$selected = '';
									if( isset ($shortcode_key['select']) ) {
										$selected .= ( $shortcode_key['select'] == "yes") ? 'selected="selected"' : '';
									}
									echo '<option value="'.esc_attr($shortcode_key['value']).'" '.esc_attr($selected).'> '.$shortcode_key['name'].'</option>';	
								}			  
					echo '</select></div></div></div>';
			break;
			
			//========> Multi Select  
			case 'multiple_select':  
			    
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '<div class="shortcodes_title">
							  <span class="title_for_row">'.$shortcode['name'].'</span>
							  <span class="title_desc">'.$shortcode['desc'].'</span>
						  </div>';
					echo '<div class="shortcodes_block">
					          <div class="select_con hm_multiple_select">
								<select name="'.esc_attr($shortcode['id']).'" id="'.esc_attr($shortcode['id']).'" multiple="multiple">';
								
								foreach ($shortcode['option'] as $shortcode_key) {
									$selected = '';
									if( isset ($shortcode_key['select']) ) {
										$selected .= ( $shortcode_key['select'] == "yes") ? 'selected="selected"' : '';
									}
									echo '<option value="'.esc_attr($shortcode_key['name']).'" '.esc_attr($selected).'> '.$shortcode_key['value'].'</option>';	
								}			  
					echo '</select></div></div></div>';
			break;
			
			//========> checkbox  
			case 'chickbox':  
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								<span class="title_desc">'.$shortcode['desc'].'</span>
						  </div>';
					echo '<div class="shortcodes_block">
							<div class="chickbox_'.$shortcode['id'].'" id="chickbox_'.$shortcode['id'].'">';
							foreach ($shortcode['option'] as $shortcode_key) {
								echo '<div class="chickyy"><input type="checkbox" value="'.esc_attr($shortcode_key['value']).'"><span>'.$shortcode_key['name'].'</span></div>';
							}			  
					echo '<div class="clear"></div></div></div></div>';
			break;
			
			//========> textarea
			case "textarea":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '	<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								<span class="title_desc">'.$shortcode['desc'].'</span>
							</div>';
					echo '	<div class="shortcodes_block">
								<div class="text_area_con">
									<textarea name="'.esc_attr($shortcode['id']).'" id="'.esc_attr($shortcode['id']).'"></textarea>
								</div>
							</div>';
				echo '</div>';
			break;
			
			//========> Color
			case "color":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">
					      <div class="shortcodes_title">
							 <span class="title_for_row">'.$shortcode['name'].'</span>
							 <span class="title_desc">'.$shortcode['desc'].'</span>
						  </div>
					      <div class="shortcodes_block">
							 <input type="text" name="'.esc_attr($shortcode['id']).'" id="'.esc_attr($shortcode['id']).'" value="" class="idealtheme_color_picker" />
						  </div>
				      </div>';
			break;
			
			//========> Social
			case "social":
			    
				echo '<div id="'.esc_attr($shortcode['id']).'" class="social_media_con clear">
					      <div class="shortcodes_title">
							 <span class="title_for_row">'.$shortcode['name'].'</span>
							 <span class="title_desc">'.$shortcode['desc'].'</span>
						  </div>
					      <div class="shortcodes_block">
							   		<div class="social_media_row">
									    <div>
									    	<label for="'.esc_attr($shortcode['id']).'_social_facebook"><i class="ico-facebook4"></i></label>
											<input type="text" placeholder="Facebook" id="'.esc_attr($shortcode['id']).'_social_facebook" name="'.esc_attr($shortcode['id']).'_social_facebook">
										</div>
									</div>
									<div class="social_media_row">
										<div>
									    	<label for="'.esc_attr($shortcode['id']).'_social_twitter"><i class="ico-twitter4"></i></label>
											<input type="text" placeholder="Twitter" id="'.esc_attr($shortcode['id']).'_social_twitter" name="'.esc_attr($shortcode['id']).'_social_twitter">
										</div>
									</div>
									<div class="social_media_row">
										<div>
									    	<label for="'.esc_attr($shortcode['id']).'_social_googleplus"><i class="ico-google-plus"></i></label>
											<input type="text" placeholder="Google+" id="'.esc_attr($shortcode['id']).'_social_googleplus" name="'.esc_attr($shortcode['id']).'_social_googleplus">
										</div>
									</div>
									<div class="social_media_row">
									    <div>
											<label for="'.esc_attr($shortcode['id']).'_social_linkedin"><i class="ico-linkedin3"></i></label>
											<input type="text" placeholder="Linkedin" id="'.esc_attr($shortcode['id']).'_social_linkedin" name="'.esc_attr($shortcode['id']).'_social_linkedin">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_vimeo"><i class="ico-vimeo"></i></label>
											<input type="text" placeholder="Vimeo" id="'.esc_attr($shortcode['id']).'_social_vimeo" name="'.esc_attr($shortcode['id']).'_social_vimeo">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_skype"><i class="ico-skype2"></i></label>
											<input type="text" placeholder="Skype" id="'.esc_attr($shortcode['id']).'_social_skype" name="'.esc_attr($shortcode['id']).'_social_skype">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_rss"><i class="ico-rss"></i></label>
											<input type="text" placeholder="rss" id="'.esc_attr($shortcode['id']).'_social_rss" name="'.esc_attr($shortcode['id']).'_social_rss">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_flickr"><i class="ico-flickr2"></i></label>
											<input type="text" placeholder="Flickr" id="'.esc_attr($shortcode['id']).'_social_flickr" name="'.esc_attr($shortcode['id']).'_social_flickr">
										</div>
									</div>
									<div class="social_media_row">
										<div>	
											<label for="'.esc_attr($shortcode['id']).'_social_picassa"><i class="ico-picassa"></i></label>
											<input type="text" placeholder="Picassa" id="'.esc_attr($shortcode['id']).'_social_picassa" name="'.esc_attr($shortcode['id']).'_social_picassa">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_tumblr"><i class="ico-tumblr"></i></label>
											<input type="text" placeholder="Tumblr" id="'.esc_attr($shortcode['id']).'_social_tumblr" name="'.esc_attr($shortcode['id']).'_social_tumblr">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_dribbble"><i class="ico-dribbble"></i></label>
											<input type="text" placeholder="Dribbble" id="'.esc_attr($shortcode['id']).'_social_dribbble" name="'.esc_attr($shortcode['id']).'_social_dribbble">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_soundcloud"><i class="ico-soundcloud"></i></label>
											<input type="text" placeholder="Soundcloud" id="'.esc_attr($shortcode['id']).'_social_soundcloud" name="'.esc_attr($shortcode['id']).'_social_soundcloud">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_instagram"><i class="ico-instagram3"></i></label>
											<input type="text" placeholder="Instagram" id="'.esc_attr($shortcode['id']).'_social_instagram" name="'.esc_attr($shortcode['id']).'_social_instagram">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_pinterest"><i class="ico-pinterest-p"></i></label>
											<input type="text" placeholder="Pinterest" id="'.esc_attr($shortcode['id']).'_social_pinterest" name="'.esc_attr($shortcode['id']).'_social_pinterest">
										</div>
									</div>
									<div class="social_media_row">
										<div>
											<label for="'.esc_attr($shortcode['id']).'_social_youtube"><i class="ico-youtube3"></i></label>
											<input type="text" placeholder="YouTube" id="'.esc_attr($shortcode['id']).'_social_youtube" name="'.esc_attr($shortcode['id']).'_social_youtube">
										</div>
									</div>
									<div class="clear"></div>
						  </div>
				      </div>';
			break;
			//========> radioimage
			case "radioimage":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear radioimage">';
					echo '<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								<span class="title_desc">'.$shortcode['desc'].'</span>
							</div>';
					echo '<div class="shortcodes_block">';
					
					$i = 0;
					foreach ($shortcode['option'] as $shortcode_key) {
						echo '<label class="radio_img_con"><input class="radio_img" type="radio" name="'.esc_attr($shortcode['id']).'" id="'.esc_attr($shortcode_key['value']).'" value="'.esc_attr($shortcode_key['value']).'" />
						<img alt="'.esc_attr($shortcode_key['value']).'" class="idealtheme_radio_img" src="'.get_template_directory_uri().'/theme-admin/shortcodes/images/'.$shortcode_key['img'].'" /></label>';
					$i++;	
					}
	
					echo '	</div>';		
				echo '</div>';
			break;
			
			//========> Insert Media
			case "media":
				$beside_input = '';
				$show_input = "display:none;";
				
				if( isset ($shortcode['show_text']) ) {
					$show_input = ( $shortcode['show_text'] ) ? '' : 'display:none;';
					$beside_input = ( $shortcode['show_text'] ) ? ' beside_input' : '';
				}
				
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '  <div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</label>
								<span class="title_desc">'.$shortcode['desc'].'</span>
							</div>';
					echo '  <div class="shortcodes_block'.esc_attr($beside_input).'">
								<span class="show_selected_media">
									<img src="" alt="" />
								</span>
								<span class="media_con">
									<input type="text" name="'.esc_attr($shortcode['id']).'" id="'.esc_attr($shortcode['id']).'" value="" style="'.esc_attr($show_input).'" />
									<a class="insert_single_img_to_shortcode" href="#">'. esc_html__( 'Insert Media', 'enar') .'</a>
									<a class="remove_single_img_from_shortcode" href="#" style="display: none;">' . esc_html__( 'Remove Media', 'enar') .'</a>
								</span>
							</div>';
				echo '</div>';
			break;
			
			//========> scrolltopage  
			case 'scrolltopage':  
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '	<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								<span class="title_desc">'.$shortcode['desc'].'</span>
							</div>';
					echo '	<div class="shortcodes_block">
								<select name="'.esc_attr($shortcode['id']).'" id="'.esc_attr($shortcode['id']).'">';
								$pages = get_pages();
								  foreach ( $pages as $p ) {
									if ($p->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
									echo '<option value="'.esc_attr($p->post_name) . '" '.$active.'>'.$p->post_title.'</option>';
								  }			  
					echo '		</select> 
							</div>';
				echo '</div>';
			break;
			
			
			//========> timelinecategory
			case "timelinecategory":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '	<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								<span class="title_desc">'.$shortcode['desc'].'</span>
							</div>';
					echo '	<div class="shortcodes_block">
								<div class="chickbox_'.$shortcode['id'].'" id="chickbox_'.$shortcode['id'].'">';
								$categories = get_terms( 'timeline_category');
								foreach ($categories as $cat) {
									echo '<div class="chickyy"><input type="checkbox" value="'.esc_attr($cat->slug).'"><span>'.$cat->name.'</span></div>';
								}
					echo '</div> 
							</div>';
				echo '</div>';
			break;
			
			//========> portfoliocategory
			case "portfoliocategory":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '	<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								<span class="title_desc">'.$shortcode['desc'].'</span>
							</div>';
					echo '	<div class="shortcodes_block">
								<div class="chickbox_'.$shortcode['id'].'" id="chickbox_'.$shortcode['id'].'">';
								$cats_args = array(
									'hide_empty'        => false, 
								);
								$categories = get_terms( 'portfolio_category', $cats_args);
								
								foreach ($categories as $cat) {
									echo '<div class="chickyy"><input type="checkbox" value="'.esc_attr($cat->slug).'"><span>'.$cat->name.'</span></div>';
								}
								if ( empty($categories)){
									esc_html_e( 'There are no portfolio categories found!', 'enar');
								}
					echo '</div> 
							</div>';
				echo '</div>';
			break;
			
			//========> postcategory
			case "postcategory":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '	<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								<span class="title_desc">'.$shortcode['desc'].'</span>
							</div>';
					echo '	<div class="shortcodes_block">
								<div class="chickbox_'.$shortcode['id'].'" id="chickbox_'.$shortcode['id'].'">';
								$cats_args = array(
									'hide_empty'        => false, 
								);
								$categories = get_terms( 'category', $cats_args);
								
								foreach ($categories as $cat) {
									echo '<div class="chickyy"><input type="checkbox" value="'.esc_attr($cat->slug).'"><span>'.$cat->name.'</span></div>';
								}
								if ( empty($categories)){
									esc_html_e( 'There are no portfolio categories found!', 'enar');
								}
					echo '</div> 
							</div>';
				echo '</div>';
			break;
			//========> faq_category
			case "faqscategory":
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear">';
					echo '	<div class="shortcodes_title">
								<span class="title_for_row">'.$shortcode['name'].'</span>
								<span class="title_desc">'.$shortcode['desc'].'</span>
							</div>';
					echo '	<div class="shortcodes_block">
								<div class="chickbox_'.$shortcode['id'].'" id="chickbox_'.$shortcode['id'].'">';
								$cats_args = array(
									'hide_empty'  => false, 
								);
								$categories = get_terms( 'faq_category', $cats_args);
								
								foreach ($categories as $cat) {
									echo '<div class="chickyy"><input type="checkbox" value="'.esc_attr($cat->slug).'"><span>'.$cat->name.'</span></div>';
								}
								if ( empty($categories)){
									esc_html_e( 'There are no FAQs categories found!', 'enar');
								}
					echo '</div> 
							</div>';
				echo '</div>';
			break;
			
			//========> Font icons
			case "icon":
			
				$icons = array('ico-ipod','ico-microphone4','ico-cog5','ico-picture2','ico-pictures2','ico-pictures3','ico-chart2','ico-chart3','ico-location6','ico-layout2','ico-layout3','ico-layout4','ico-layout5','ico-layout6','ico-layout7','ico-layout8','ico-layout9','ico-layout10','ico-layout11','ico-layout12','ico-layout13','ico-layout14','ico-layout15','ico-info3','ico-bike2','ico-bike3','ico-paperplane2','ico-rocket2','ico-microphone5','ico-shipping','ico-compass','ico-anchor5','ico-lockedheart','ico-navigation','ico-mobile4','ico-laptop3','ico-desktop2','ico-tablet3','ico-phone3','ico-document','ico-documents','ico-search6','ico-clipboard4','ico-newspaper2','ico-notebook','ico-book-open','ico-browser2','ico-calendar3','ico-presentation','ico-picture','ico-pictures','ico-video2','ico-camera5','ico-printer4','ico-toolbox','ico-briefcase4','ico-wallet','ico-gift4','ico-bargraph','ico-grid2','ico-expand3','ico-focus','ico-edit2','ico-adjustments','ico-ribbon2','ico-hourglass','ico-lock4','ico-megaphone','ico-shield3','ico-trophy4','ico-flag5','ico-map4','ico-puzzle','ico-basket','ico-envelope3','ico-streetsign','ico-telescope','ico-gears2','ico-key4','ico-paperclip2','ico-attachment2','ico-pricetags','ico-lightbulb','ico-layers2','ico-pencil5','ico-tools','ico-tools-2','ico-scissors3','ico-paintbrush','ico-magnifying-glass','ico-circle-compass','ico-linegraph','ico-mic2','ico-strategy','ico-beaker','ico-caution','ico-recycle2','ico-anchor3','ico-profile-male','ico-profile-female','ico-bike','ico-wine','ico-hotairballoon','ico-globe3','ico-genius','ico-map-pin','ico-dial','ico-chat','ico-heart5','ico-cloud8','ico-upload7','ico-download7','ico-target4','ico-hazardous','ico-piechart','ico-speedometer','ico-global','ico-compass4','ico-lifesaver','ico-clock5','ico-aperture','ico-quote','ico-scope','ico-alarmclock','ico-refresh3','ico-happy3','ico-sad3','ico-facebook5','ico-twitter5','ico-googleplus','ico-rss2','ico-tumblr4','ico-linkedin4','ico-dribbble5','ico-heart6','ico-cloud9','ico-star3','ico-sound2','ico-video3','ico-trash4','ico-user5','ico-key5','ico-search7','ico-settings','ico-camera6','ico-tag4','ico-lock5','ico-bulb','ico-pen2','ico-diamond2','ico-display2','ico-location5','ico-eye5','ico-bubble4','ico-stack3','ico-cup','ico-phone4','ico-news','ico-mail6','ico-like','ico-photo2','ico-note','ico-clock6','ico-paperplane','ico-params','ico-banknote','ico-data','ico-music3','ico-megaphone2','ico-study','ico-lab2','ico-food','ico-t-shirt','ico-fire3','ico-clip','ico-shop','ico-calendar4','ico-wallet2','ico-vynil','ico-truck3','ico-world','ico-add-shopping-cart','ico-done','ico-https','ico-perm-identity','ico-shopping-basket','ico-shopping-cart2','ico-wallet-giftcard','ico-wallet-travel','ico-call','ico-clear','ico-devices','ico-gps-fixed','ico-insert-link','ico-folder-open3','ico-desktop-mac','ico-desktop-windows','ico-keyboard-arrow-down','ico-keyboard-arrow-left','ico-keyboard-arrow-right','ico-keyboard-arrow-up','ico-keyboard-backspace','ico-laptop4','ico-laptop-chromebook','ico-laptop-mac','ico-laptop-windows','ico-filter-vintage','ico-directions-ferry','ico-local-grocery-store','ico-local-print-shop','ico-arrow-back','ico-arrow-forward','ico-check4','ico-close2','ico-refresh4','ico-notifications-none','ico-school','ico-star4','ico-star-outline','ico-chat4','ico-tick','ico-chevron-right2','ico-chevron-left2','ico-arrow-right-thick','ico-arrow-left-thick','ico-lock-open','ico-home-outline','ico-globe-outline','ico-eye3','ico-paper-clip','ico-mail5','ico-toggle','ico-layout','ico-link4','ico-bell3','ico-lock3','ico-unlock2','ico-ribbon','ico-image3','ico-clock3','ico-watch','ico-air-play','ico-camera3','ico-video','ico-printer2','ico-monitor','ico-server2','ico-cog3','ico-heart3','ico-paragraph2','ico-align-justify2','ico-align-left2','ico-align-center2','ico-align-right2','ico-book4','ico-layers','ico-stack2','ico-stack-2','ico-paper','ico-paper-stack','ico-search4','ico-zoom-in2','ico-zoom-out2','ico-reply3','ico-circle-plus','ico-circle-minus','ico-circle-check','ico-circle-cross','ico-square-plus','ico-square-minus','ico-square-check','ico-square-cross','ico-microphone2','ico-skip-back','ico-rewind','ico-play5','ico-pause4','ico-stop4','ico-fast-forward2','ico-skip-forward','ico-shuffle2','ico-repeat2','ico-folder3','ico-umbrella2','ico-moon3','ico-thermometer','ico-drop','ico-sun4','ico-cloud6','ico-cloud-upload3','ico-cloud-download3','ico-upload5','ico-download5','ico-location3','ico-location-2','ico-map3','ico-battery','ico-head','ico-briefcase3','ico-speech-bubble','ico-anchor2','ico-globe2','ico-box','ico-reload','ico-share4','ico-tag2','ico-power2','ico-esc','ico-bar-graph','ico-bar-graph-2','ico-pie-graph','ico-star2','ico-arrow-left4','ico-arrow-right4','ico-arrow-up4','ico-arrow-down4','ico-volume','ico-mute','ico-grid','ico-grid-2','ico-columns2','ico-loader','ico-bag','ico-ban2','ico-flag3','ico-trash2','ico-expand2','ico-contract','ico-maximize','ico-minimize','ico-plus3','ico-minus3','ico-check3','ico-cross2','ico-move','ico-delete','ico-menu5','ico-archive2','ico-inbox2','ico-outbox','ico-file2','ico-file-add','ico-file-subtract','ico-help','ico-open','ico-sound-mute','ico-sound4','ico-aircraft','ico-attachment4','ico-camera8','ico-email','ico-shopping-bag','ico-thumbs-down2','ico-thumbs-up2','ico-cart3','ico-pencil6','ico-key2','ico-phone5','ico-home6','ico-anchor4','ico-feather','ico-expand4','ico-maximize2','ico-search8','ico-book6','ico-sound3','ico-sound-alt','ico-soundoff','ico-task','ico-inbox3','ico-envelope4','ico-newspaper3','ico-newspaper-alt','ico-hyperlink','ico-trash','ico-grid3','ico-grid-alt','ico-menu2','ico-list','ico-gallery','ico-browser3','ico-clock7','ico-attachment3','ico-settings2','ico-portfolio','ico-user6','ico-heart7','ico-chat2','ico-comments2','ico-screen','ico-forkandspoon','ico-instagram3','ico-pin','ico-camera7','ico-brightness','ico-moon','ico-cloud10','ico-circle-half','ico-globe4','ico-comment2','ico-chat3','ico-speaker','ico-cart','ico-book','ico-check','ico-flame','ico-gear','ico-gift','ico-git-branch','ico-mention','ico-pencil','ico-playback-play','ico-rocket','ico-sunrise','ico-sun','ico-cloudy','ico-cloud','ico-weather','ico-weather2','ico-lines','ico-cloud2','ico-lightning','ico-lightning2','ico-rainy','ico-rainy2','ico-windy','ico-windy2','ico-snowy','ico-snowy2','ico-snowy3','ico-weather3','ico-cloudy2','ico-cloud3','ico-lightning3','ico-sun2','ico-moon2','ico-home','ico-home2','ico-home3','ico-office','ico-newspaper','ico-pencil2','ico-pencil22','ico-quill','ico-pen','ico-droplet','ico-paint-format','ico-image','ico-images','ico-camera','ico-headphones','ico-music','ico-film','ico-video-camera','ico-bullhorn','ico-connection','ico-feed','ico-mic','ico-book2','ico-books','ico-library','ico-file-text','ico-profile','ico-file-empty','ico-files-empty','ico-file-text2','ico-file-picture','ico-file-music','ico-file-play','ico-file-video','ico-file-zip','ico-copy','ico-paste','ico-stack','ico-folder','ico-folder-open','ico-folder-plus','ico-folder-minus','ico-folder-download','ico-folder-upload','ico-coin-dollar','ico-coin-euro','ico-coin-pound','ico-coin-yen','ico-lifebuoy','ico-phone','ico-phone-hang-up','ico-address-book','ico-pushpin','ico-location','ico-location2','ico-compass2','ico-compass22','ico-map','ico-map2','ico-history','ico-clock','ico-clock2','ico-alarm','ico-bell','ico-stopwatch','ico-printer','ico-laptop','ico-mobile','ico-mobile2','ico-tablet','ico-tv','ico-drawer','ico-drawer2','ico-bubble','ico-bubbles','ico-bubbles2','ico-bubble2','ico-bubbles3','ico-bubbles4','ico-user','ico-users','ico-user-check','ico-user-tie','ico-quotes-left','ico-quotes-right','ico-spinner','ico-spinner8','ico-spinner9','ico-spinner11','ico-binoculars','ico-search','ico-zoom-in','ico-zoom-out','ico-enlarge','ico-shrink','ico-key','ico-unlocked','ico-wrench','ico-equalizer','ico-equalizer2','ico-cog','ico-hammer','ico-magic-wand','ico-aid-kit','ico-bug','ico-pie-chart','ico-stats-dots','ico-stats-bars','ico-trophy','ico-glass','ico-glass2','ico-mug','ico-spoon-knife','ico-leaf','ico-meter','ico-hammer2','ico-fire','ico-lab','ico-magnet','ico-bin','ico-briefcase','ico-airplane','ico-accessibility','ico-shield','ico-power','ico-switch','ico-power-cord','ico-clipboard','ico-tree','ico-menu','ico-cloud4','ico-cloud-download','ico-cloud-upload','ico-cloud-check','ico-sphere','ico-earth','ico-link','ico-flag','ico-attachment','ico-eye','ico-bookmark','ico-bookmarks','ico-contrast','ico-brightness-contrast','ico-star-empty','ico-star-full','ico-heart','ico-heart-broken','ico-man','ico-woman','ico-man-woman','ico-happy','ico-smile','ico-tongue','ico-sad','ico-wink','ico-grin','ico-cool','ico-angry','ico-evil','ico-shocked','ico-baffled','ico-confused','ico-neutral','ico-hipster','ico-wondering','ico-sleepy','ico-frustrated','ico-crying','ico-point-up','ico-warning','ico-notification','ico-question','ico-plus','ico-minus','ico-info','ico-cancel-circle','ico-blocked','ico-cross','ico-checkmark','ico-checkmark2','ico-spell-check','ico-enter','ico-exit','ico-play2','ico-pause','ico-stop','ico-previous','ico-next','ico-backward','ico-forward2','ico-play3','ico-pause2','ico-stop2','ico-backward2','ico-forward3','ico-first','ico-last','ico-previous2','ico-next2','ico-eject','ico-volume-high','ico-volume-medium','ico-volume-low','ico-volume-mute','ico-volume-mute2','ico-loop2','ico-arrow-up-left2','ico-arrow-up2','ico-arrow-up-right2','ico-arrow-right2','ico-arrow-down-right2','ico-arrow-down2','ico-arrow-down-left2','ico-arrow-left2','ico-crop','ico-scissors','ico-table','ico-table2','ico-share','ico-new-tab','ico-embed2','ico-share2','ico-google','ico-google-plus','ico-google-drive','ico-facebook','ico-facebook2','ico-instagram','ico-twitter','ico-twitter3','ico-feed2','ico-youtube2','ico-youtube3','ico-vimeo','ico-flickr2','ico-picassa','ico-dribbble','ico-forrst','ico-deviantart','ico-steam','ico-dropbox','ico-onedrive','ico-github2','ico-wordpress','ico-blogger','ico-tumblr','ico-yahoo','ico-tux','ico-apple','ico-finder','ico-android','ico-windows','ico-soundcloud','ico-skype','ico-reddit','ico-linkedin2','ico-lastfm','ico-delicious','ico-stumbleupon','ico-stackoverflow','ico-pinterest','ico-paypal','ico-file-pdf','ico-file-openoffice','ico-libreoffice','ico-html52','ico-css3','ico-chrome','ico-firefox','ico-IE','ico-opera','ico-user2','ico-earth2','ico-link2','ico-search2','ico-pencil3','ico-glass3','ico-music2','ico-search3','ico-envelope-o','ico-heart2','ico-star','ico-star-o','ico-user3','ico-film2','ico-th-large','ico-th','ico-th-list','ico-check2','ico-close','ico-remove','ico-times','ico-power-off','ico-signal','ico-cog2','ico-gear2','ico-home4','ico-file-o','ico-clock-o','ico-download4','ico-arrow-circle-o-down','ico-arrow-circle-o-up','ico-inbox','ico-play-circle-o','ico-repeat','ico-rotate-right','ico-refresh','ico-lock2','ico-flag2','ico-headphones2','ico-volume-off','ico-volume-down','ico-volume-up','ico-tag','ico-tags','ico-book3','ico-bookmark2','ico-print','ico-camera2','ico-video-camera2','ico-image2','ico-photo','ico-picture-o','ico-pencil4','ico-map-marker','ico-adjust','ico-edit','ico-pencil-square-o','ico-check-square-o','ico-arrows','ico-step-backward','ico-fast-backward','ico-backward3','ico-play4','ico-pause3','ico-stop3','ico-forward4','ico-fast-forward','ico-step-forward','ico-eject2','ico-chevron-left','ico-chevron-right','ico-plus-circle','ico-minus-circle','ico-times-circle','ico-check-circle','ico-question-circle','ico-info-circle','ico-crosshairs','ico-times-circle-o','ico-check-circle-o','ico-ban','ico-arrow-left3','ico-arrow-right3','ico-arrow-up3','ico-arrow-down3','ico-mail-forward','ico-share3','ico-expand','ico-compress','ico-plus2','ico-minus2','ico-asterisk','ico-exclamation-circle','ico-gift3','ico-leaf2','ico-fire2','ico-eye2','ico-eye-slash','ico-plane','ico-random','ico-comment','ico-chevron-up','ico-chevron-down','ico-retweet','ico-shopping-cart','ico-folder2','ico-folder-open2','ico-bar-chart','ico-bar-chart-o','ico-twitter-square','ico-facebook-square','ico-camera-retro','ico-key3','ico-cogs2','ico-gears','ico-comments','ico-thumbs-o-up','ico-thumbs-o-down','ico-heart-o','ico-sign-out','ico-thumb-tack','ico-external-link','ico-sign-in','ico-trophy2','ico-phone2','ico-bookmark-o','ico-phone-square','ico-twitter4','ico-facebook4','ico-facebook-f','ico-github6','ico-unlock','ico-credit-card2','ico-rss','ico-bullhorn2','ico-bell-o','ico-hand-o-right','ico-hand-o-left','ico-hand-o-up','ico-hand-o-down','ico-arrow-circle-left','ico-arrow-circle-right','ico-arrow-circle-up','ico-arrow-circle-down','ico-globe','ico-wrench2','ico-tasks','ico-briefcase2','ico-arrows-alt','ico-group','ico-users2','ico-chain','ico-link3','ico-cloud5','ico-flask','ico-cut','ico-scissors2','ico-copy2','ico-files-o','ico-paperclip','ico-floppy-o','ico-save','ico-bars','ico-navicon','ico-reorder','ico-table3','ico-magic','ico-truck2','ico-caret-down','ico-caret-up','ico-caret-left','ico-caret-right','ico-columns','ico-sort','ico-unsorted','ico-sort-desc','ico-sort-down','ico-sort-asc','ico-sort-up','ico-envelope','ico-linkedin3','ico-rotate-left','ico-undo3','ico-gavel','ico-legal','ico-dashboard','ico-tachometer','ico-comment-o','ico-comments-o','ico-sitemap','ico-umbrella','ico-clipboard2','ico-paste2','ico-lightbulb-o','ico-user-md','ico-suitcase','ico-coffee','ico-cutlery','ico-file-text-o','ico-building-o','ico-hospital-o','ico-ambulance','ico-medkit','ico-fighter-jet','ico-beer','ico-h-square','ico-plus-square','ico-angle-double-left','ico-angle-double-right','ico-angle-double-up','ico-angle-double-down','ico-angle-left','ico-angle-right','ico-angle-up','ico-angle-down','ico-desktop','ico-laptop2','ico-tablet2','ico-mobile3','ico-mobile-phone','ico-circle-o','ico-quote-left','ico-quote-right','ico-spinner12','ico-circle','ico-mail-reply','ico-reply2','ico-github-alt','ico-folder-o','ico-folder-open-o','ico-smile-o','ico-frown-o','ico-meh-o','ico-keyboard-o','ico-flag-o','ico-terminal2','ico-code2','ico-mail-reply-all','ico-reply-all','ico-location-arrow','ico-crop2','ico-code-fork','ico-chain-broken','ico-unlink','ico-question2','ico-info2','ico-exclamation','ico-eraser','ico-puzzle-piece','ico-microphone','ico-microphone-slash','ico-shield2','ico-calendar-o','ico-fire-extinguisher','ico-rocket3','ico-maxcdn','ico-chevron-circle-left','ico-chevron-circle-right','ico-chevron-circle-up','ico-chevron-circle-down','ico-anchor','ico-unlock-alt','ico-play-circle','ico-ticket2','ico-minus-square','ico-minus-square-o','ico-level-up','ico-level-down','ico-check-square','ico-pencil-square','ico-external-link-square','ico-share-square','ico-compass3','ico-caret-square-o-down','ico-toggle-down','ico-caret-square-o-up','ico-toggle-up','ico-caret-square-o-right','ico-toggle-right','ico-eur','ico-euro','ico-gbp','ico-dollar','ico-usd','ico-file','ico-file-text3','ico-thumbs-up','ico-thumbs-down','ico-youtube5','ico-xing3','ico-xing-square','ico-youtube-play','ico-dropbox2','ico-stack-overflow','ico-instagram2','ico-flickr5','ico-adn','ico-bitbucket','ico-bitbucket-square','ico-tumblr3','ico-tumblr-square','ico-long-arrow-down','ico-long-arrow-up','ico-long-arrow-left','ico-long-arrow-right','ico-apple2','ico-windows2','ico-android2','ico-linux','ico-dribbble4','ico-skype2','ico-foursquare2','ico-female','ico-male','ico-sun-o','ico-moon-o','ico-archive','ico-bug2','ico-pagelines','ico-arrow-circle-o-right','ico-arrow-circle-o-left','ico-caret-square-o-left','ico-toggle-left','ico-dot-circle-o','ico-wheelchair','ico-slack','ico-bank','ico-institution','ico-university','ico-graduation-cap','ico-mortar-board','ico-yahoo2','ico-reddit2','ico-stumbleupon3','ico-digg','ico-paw','ico-cubes','ico-behance','ico-steam3','ico-recycle','ico-automobile','ico-car','ico-soundcloud3','ico-database2','ico-file-pdf-o','ico-file-word-o','ico-file-excel-o','ico-file-powerpoint-o','ico-file-image-o','ico-file-photo-o','ico-file-picture-o','ico-file-archive-o','ico-file-zip-o','ico-file-audio-o','ico-file-sound-o','ico-file-movie-o','ico-file-video-o','ico-file-code-o','ico-codepen2','ico-jsfiddle','ico-life-bouy','ico-life-buoy','ico-life-ring','ico-life-saver','ico-support','ico-hacker-news','ico-paper-plane','ico-send','ico-paper-plane-o','ico-send-o','ico-history2','ico-circle-thin','ico-genderless','ico-sliders','ico-share-alt','ico-bomb','ico-futbol-o','ico-soccer-ball-o','ico-wifi','ico-calculator2','ico-paypal4','ico-cc-visa','ico-bell-slash-o','ico-at','ico-eyedropper2','ico-paint-brush','ico-line-chart','ico-lastfm3','ico-toggle-off','ico-bicycle','ico-cart-plus','ico-diamond','ico-motorcycle','ico-heartbeat','ico-pinterest-p','ico-whatsapp','ico-user-plus2','ico-user-times','ico-box2','ico-write','ico-clock4','ico-reply4','ico-reply-all2','ico-forward5','ico-flag4','ico-search5','ico-trash3','ico-envelope2','ico-bubble3','ico-user4','ico-users3','ico-cloud7','ico-download6','ico-upload6','ico-rain','ico-sun5','ico-moon4','ico-bell4','ico-folder4','ico-pin2','ico-sound','ico-microphone3','ico-camera4','ico-image4','ico-cog4','ico-book5','ico-map-marker2','ico-store','ico-tag3','ico-heart4','ico-video-camera3','ico-trophy3','ico-cart2','ico-eye4','ico-cancel','ico-chart','ico-target3','ico-printer3','ico-location4','ico-bookmark3','ico-monitor2','ico-cross3','ico-plus4','ico-left','ico-up','ico-browser','ico-windows3','ico-switch2','ico-dashboard2','ico-play6','ico-fast-forward3','ico-next3','ico-refresh2','ico-film3','ico-home5');
			
				echo '<div id="'.esc_attr($shortcode['id']).'" class="shortcodes_panel_row clear icons_block">';
				    echo '<div class="shortcodes_title">
							  <span class="title_for_row">'.$shortcode['name'].'</span>
							  <span class="title_desc">'.$shortcode['desc'].'</span>
						  </div>';
					echo '<ul class="iconfonts">';		
					foreach ($icons as $ic) {
						echo '<li><input type="radio" name="'.esc_attr($shortcode['id']).'" value="'.esc_attr($ic).'"><i class="my_icon_select '.$ic.'"></i></li>';
					}
					echo '</ul>';
				echo '</div>';
				
				
			break;
			
			}
			
        }
        
        ?>
    </div>
    <div class="shortcodes_options_container_panel">
        <ul id="my_sc_tabs" class="shortcodes_list">
            <?php 
                foreach ($idealtheme_shortcodes as $opt) {
                    if ($opt['type'] == 'shortcodefather') {
                        echo '<li class="'.esc_attr($opt['id']).'"><a href="'.esc_attr($opt['id']).'"><b>'.$opt['name'].'</b></a></li>';	 
                    }
                }
            ?>
        </ul>
    </div>
</div>
</body></html>