<?php

//============> Enar Post Types

function idealtheme_add_gallery_post_type(){
	
	register_post_type('sliders', array(
		'labels' => array(
			'name' => __('sliders','enar_textdomain' ),
			'singular_name' => __('slider', 'enar_textdomain' ),
			'add_new' => __('Add New','enar_textdomain' ),
			'add_new_item' => __('Add New Slide', 'enar_textdomain' ),
			'edit_item' => __('Edit Slider', 'enar_textdomain' ),
			'new_item' => __('New Slider', 'enar_textdomain' ),
			'view_item' => __('View Slider', 'enar_textdomain' ),
			'search_items' => __('Search Slider', 'enar_textdomain' ),
			'not_found' =>  __('No Sliders items found', 'enar_textdomain' ),
			'not_found_in_trash' => __('No Sliders items found in Trash', 'enar_textdomain' ), 
			'parent_item_colon' => '',
			'menu_name' => __('Sliders', 'enar_textdomain' ),
		),
		'singular_label' => __('slider', 'enar_textdomain' ),
		'public' => false,
		'menu_icon' => 'dashicons-format-image',
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor'),
		'has_archive' => false,
		'rewrite' => array( 'slug' => 'site_sliders', 'with_front' => true, 'pages' => true, 'feeds'=>true, 'hierarchical' => true, ),
		'query_var' => true,
		'can_export' => true,
		'show_in_nav_menus' => false,
	));	
}
add_action('init','idealtheme_add_gallery_post_type');

function idealtheme_add_faq_post_type(){ //===========> FAQ
	
	register_post_type('faq', array(
		'labels' => array(
			'name' => __('FAQs','enar_textdomain' ),
			'singular_name' => __('FAQs', 'enar_textdomain' ),
			'menu_name' => __('FAQs', 'enar_textdomain' ),
		),
		'singular_label' => __('faq', 'enar_textdomain' ),
		'public' => false,
		'menu_icon' => 'dashicons-admin-post',
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor'),
		'has_archive' => false,
		//'rewrite' => array( 'slug' => 'faq', 'with_front' => true, 'pages' => true, 'feeds'=>true, 'hierarchical' => true, ),
		'query_var' => true,
		'can_export' => true,
		'show_in_nav_menus' => false,
	));	
	
	//===========> portfolio taxonomy
	register_taxonomy('faq_category','faq',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'FAQ Categories', 'enar_textdomain' ),
			'singular_name' => __( 'FAQ Category', 'enar_textdomain' ),
			'menu_name' => __( 'FAQ Categories', 'enar_textdomain' ),
		),
		'public' => false,
		'show_in_nav_menus' => false,
		'show_admin_column' => true,
		'show_ui' => true,
		'show_tagcloud' => false,
		'query_var' => true,
		//'rewrite' => array( 'slug' => 'faqs', 'with_front' => true, 'pages' => true, 'feeds'=>true, 'hierarchical' => true ),
	));
}
add_action('init','idealtheme_add_faq_post_type');

function idealtheme_add_portfolio_post_type(){  //===========> portfolio
	
	$portfolio_single_slug = idealtheme_option('portfolio_post_slug');
	if (empty($portfolio_single_slug)) {
		$portfolio_single_slug = 'portfolio-item';
	}
	$portfolio_cats_slug = idealtheme_option('portfolio_cats_slug');
	if (empty($portfolio_cats_slug)) {
		$portfolio_cats_slug = 'portfolio_category';
	}
	
	register_post_type('portfolio', array(
		'labels' => array(
			'name' => __('Portfolio','enar_textdomain' ),
			'singular_name' => __('Portfolio', 'enar_textdomain' ),
			'add_new' => __('Add New','enar_textdomain' ),
			'add_new_item' => __('Add New Portfolio Item', 'enar_textdomain' ),
			'edit_item' => __('Edit Portfolio Item', 'enar_textdomain' ),
			'new_item' => __('New Portfolio Item', 'enar_textdomain' ),
			'view_item' => __('View Portfolio Item', 'enar_textdomain' ),
			'search_items' => __('Search Portfolio Items', 'enar_textdomain' ),
			'not_found' =>  __('No Portfolio item found', 'enar_textdomain' ),
			'not_found_in_trash' => __('No Portfolio items found in Trash', 'enar_textdomain' ), 
			'parent_item_colon' => '',
			'menu_name' => __('Portfolio', 'enar_textdomain' ),
		),
		'singular_label' => __('portfolio', 'enar_textdomain' ),
		'public' => true,
		'menu_icon' => 'dashicons-portfolio',
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'comments'),
		'has_archive' => false,
		'rewrite' => array( 'slug' => $portfolio_single_slug, 'with_front' => true, 'pages' => true, 'feeds'=>true, 'hierarchical' => true ),
		'query_var' => true,
		'can_export' => true,
		'show_in_nav_menus' => true,
	));

	//===========> portfolio taxonomy
	register_taxonomy('portfolio_category','portfolio',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Portfolio Categories', 'enar_textdomain' ),
			'singular_name' => __( 'Portfolio Category', 'enar_textdomain' ),
			'search_items' =>  __( 'Search Categories', 'enar_textdomain' ),
			'popular_items' => __( 'Popular Categories', 'enar_textdomain' ),
			'all_items' => __( 'All Categories', 'enar_textdomain' ),
			'parent_item' => null,			
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Portfolio Category', 'enar_textdomain' ), 
			'update_item' => __( 'Update Portfolio Category', 'enar_textdomain' ),
			'add_new_item' => __( 'Add New Portfolio Category', 'enar_textdomain' ),
			'new_item_name' => __( 'New Portfolio Category Name', 'enar_textdomain' ),
			'separate_items_with_commas' => __( 'Separate Portfolio category with commas', 'enar_textdomain' ),
			'add_or_remove_items' => __( 'Add or remove Portfolio category', 'enar_textdomain' ),
			'choose_from_most_used' => __( 'Choose from the most used Portfolio category', 'enar_textdomain' ),
			'menu_name' => __( 'Categories', 'enar_textdomain' ),
		),
		'public' => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'show_ui' => true,
		'show_tagcloud' => false,
		'query_var' => true,
		'rewrite' => array( 'slug' => $portfolio_cats_slug, 'with_front' => true, 'pages' => true, 'feeds'=>true, 'hierarchical' => true ),
		
	));
}
add_action('init','idealtheme_add_portfolio_post_type');

//=====================================================================================> Enar Shortcodes ( Columns )

function idealtheme_fun_col_full_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
	    "col" => "12",        // 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 10 - 11 - 12
		"delay" => 0, 
		"animation" => "no",
		"padding_top" => '', 
		"padding_r_l" => 'disable',  // enable - disable
		"padding_bot" => '',
		"align" => "default",    // default - center - right - left
		"bg_color" => "",
		"bg_image" => "",
		"bg_repeat" => "no",     // no - x-y - x - y
		"bg_attach" => "scroll", // scroll - fixed
		"bg_size" => "cover",    // cover - inherit - contain
		"color" => ""
	), $atts));
	
	$padding_top = intval($padding_top);
	$padding_bot = intval($padding_bot);
	
	$bg_image = idealtheme_fun_get_image_url($bg_image, 'enar-blog-single-image');
	
    $output = '';
	$col_col = ($col !== "") ? 'col-md-'.$col : 'col-md-rand';
	
	$column_align = '';
	if( $align == "center"){
		$column_align = ' centered';
		
	}else if( $align == "right"){
		$column_align = ' align_right';
		
	}else if( $align == "left"){
		$column_align = ' align_left';
	}
	
	$column_style = '';
	if($padding_top > 0){
		$column_style .= 'padding-top:'.esc_attr($padding_top).'px;';
	}
	
	if($padding_bot > 0){
		$column_style .= 'padding-bottom:'.esc_attr($padding_bot).'px;';
	}
	
	if($bg_image !== ''){
		$column_style .= 'background-image:url("'.esc_attr($bg_image).'");';
		
		if( $bg_repeat == "x-y" ){
			$bg_repeat = "repeat";
			
		}else if( $bg_repeat == "no" ){
			$bg_repeat = "no-repeat";
			
		}else if( $bg_repeat == "x" ){
			$bg_repeat = "repeat-x";
			
		}else if( $bg_repeat == "y" ){
			$bg_repeat = "repeat-y";
			
		}
		$column_style .= 'background-repeat: '.esc_attr($bg_repeat).';';
		$column_style .= 'background-attachment: '.esc_attr($bg_attach).';';
		$column_style .= 'background-size: '.esc_attr($bg_size).';';
	}
	
	if($bg_color !== ''){
		$column_style .= 'background-color:'.esc_attr($bg_color).';';
	}
	
	if($color !== ''){
		$column_style .= 'color:'.esc_attr($color).';';
	}
	
	
	$output .= ($animation !== 'no') ? '<div class="'.esc_attr($col_col).esc_attr($column_align).' animated" data-animation="'.esc_attr($animation).'" data-animation-delay="'.esc_attr(intval($delay)).'" style="'.esc_attr($column_style).'">' : '<div class="'.esc_attr($col_col).esc_attr($column_align).'" style="'.esc_attr($column_style).'">';
	
	$output .= ( $padding_r_l == 'enable' ) ? '<div class="hm_colum_content">' : '';
	
	$output .= do_shortcode($content);  
	
	$output .= ( $padding_r_l == 'enable' ) ? '</div>' : '';
	
	$output .= '</div>';
	return $output;
}
add_shortcode("hm_column", "idealtheme_fun_col_full_shortcode");


function idealtheme_row_sc( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'light_box_gall' => 'no',   // yes - no // before [hm_lightbox type="gallery"]
		), $atts ) 
	); 
	$padding_style = '';
	$light_box_gall = ($light_box_gall == "yes") ? "magnific-gallery" : "";
	
   	return '<div class="rows_container clearfix '.esc_attr($light_box_gall).'">'.do_shortcode($content).'</div>';
}
add_shortcode('hm_row', 'idealtheme_row_sc');

//=====================================================================================> Section      

function idealtheme_section_sc($atts, $content = null) {
		
	extract(shortcode_atts(array(
	   'mode' => 'dark',     // dark - light
	   'bg_image' => '',
	   'bg_repeat' => 'no',     // no - x-y - x - y
	   'bg_attach' => 'scroll', // scroll - fixed
	   'bg_size' => 'cover',    // cover - inherit - contain
	   'bg_color' => '',
	   
	   'border_color' => '',
	   'border_style' => 'none',    // none - solid - dotted - dashed
	   'border_top_width' => '',
	   'border_right_width' => '',
	   'border_bottom_width' => '',
	   'border_left_width' => '',
	   
	   'layout' => 'boxed',        // full - boxed
	   'icon' => '',
	   'bg_overlay' => '',        // yes - no
	   'color' => '',           
	   //'spacer' => '',            // icons - row-large - row-small - row-large-top - row-large-bot - content
	   'padding_top' => '', 
	   'padding_bot' => '',
	   
	   'align' => '',             // center - left - right
	   //'id' => '',	
	), $atts));
	
	$padding_top = intval($padding_top);
	$padding_bot = intval($padding_bot);
	
	$bg_image = idealtheme_fun_get_image_url($bg_image, 'full');
	
	$output        = '';
	$section_style = '';
	$mode          = ( $mode == 'light' ) ? ' white_section' : '';
	
	$section_padding = '';
	if($padding_top > 0){
		$section_padding .= 'padding-top:'.esc_attr(intval($padding_top)).'px;';
	}
	
	if($padding_bot > 0){
		$section_padding .= 'padding-bottom:'.esc_attr(intval($padding_bot)).'px;';
	}
	
	if($bg_image !== ""){
		$section_style .= 'background-image: url('.esc_attr($bg_image).');';
		$section_style .= 'background-repeat: '.esc_attr($bg_repeat).';';
		$section_style .= 'background-attachment: '.esc_attr($bg_attach).';';
		$section_style .= 'background-size: '.esc_attr($bg_size).';';
	}
	if($bg_color !== ""){
		$section_style .= 'background-color: '.esc_attr($bg_color).';';
	}
	if($color !== ""){
		$section_style .= 'color: '.esc_attr($color).';';
	}
	if($border_color !== ""){
		$section_style .= 'border-color:'.esc_attr($border_color).';';
		$section_style .= 'border-style: '.esc_attr($border_style).';';
		$section_style .= 'border-top-width: '.esc_attr($border_top_width).'px;';
		$section_style .= 'border-right-width: '.esc_attr($border_right_width).'px;';
		$section_style .= 'border-bottom-width: '.esc_attr($border_bottom_width).'px;';
		$section_style .= 'border-left-width: '.esc_attr($border_left_width).'px;';
	}
	
	$text_align = '';
	if($align == "center"){
		$text_align .= ' centered';
		
	}else if($align == "right"){
		$text_align .= ' align_right';
		
	}else if($align == "left"){
		$text_align .= ' align_left';
	}
	
	$output .= '<div class="content_section'.esc_attr($mode).'" style="'.esc_attr($section_style).'">';
	$output .= ($icon !== '') ? '<span class="section_icon"><i class="'.esc_attr($icon).'"></i></span>' : '';
	
	$output .= ($bg_overlay == 'yes') ? '<div class="bg_overlay" style="'.esc_attr($section_padding).'">' : '<div class="hm_no_overlay" style="'.esc_attr($section_padding).'">';
	
	$output .= ($layout == "boxed") ? '<div class="container'.esc_attr($text_align).'">' : '<div class="'.esc_attr($text_align).'">';
	
	$output .= do_shortcode($content); 
	
	$output .= '</div></div></div>';
	
	return $output;

}
add_shortcode("hm_section", "idealtheme_section_sc");

//=====================================================================================> Video Section      

function idealtheme_video_sc($atts, $content = null) {
		
	extract(shortcode_atts(array(
	   'mode' => 'light',     // dark - light
	   'bg_image' => '',
	   'bg_repeat' => 'no',     // no - x-y - x - y
	   'bg_attach' => 'scroll', // scroll - fixed
	   'bg_size' => 'cover',    // cover - inherit - contain
	   'bg_color' => '',
	   
	   'border_color' => '',
	   'border_style' => '',    // none - solid - dotted - dashed
	   'border_top_width' => 0,
	   'border_right_width' => 0,
	   'border_bottom_width' => 0,
	   'border_left_width' => 0,
	   
	   'layout' => 'boxed',        // full - boxed
	   'icon' => '',
	   'bg_overlay' => '',        // yes - no
	   'color' => '',           
	   //'spacer' => '',            // icons - row-large - row-small - row-large-top - row-large-bot - content
	   'padding_top' => '', 
	   'padding_bot' => '',
	   
	   'align' => '',             // center - left - right
	        'video_type' => 'youtube',     // youtube - hosted
			
			    'hosted_mp' => '',
				'hosted_ogg' => '',
				'hosted_webm' => '',
				'hosted_height' => '',     // 500
				
				'video_frame' => '',       // yes - no ( video background shortcode )
				'video_height' => '',      // 500
				'video_id' => '',
				'video_controls' => 'false',
				'video_target' => 'self',
				'video_autoplay'=> 'true',
				'video_mute'  => 'true',
				'video_opacity' => '1',
				'video_start' => '0',
				'video_loop' => 'false',
				'video_quality' => 'small',
			
	), $atts));
	
	$padding_top = intval($padding_top);
	$padding_bot = intval($padding_bot);
	
	$bg_image = idealtheme_fun_get_image_url($bg_image, 'full');
	
	$output        = '';
	$section_style = '';
	$mode          = ( $mode == 'light' ) ? ' white_section' : '';
	
	$section_padding = '';
	if($padding_top >= 0){
		$section_padding .= 'padding-top:'.esc_attr(intval($padding_top)).'px;';
	}
	
	if($padding_bot >= 0){
		$section_padding .= 'padding-bottom:'.esc_attr(intval($padding_bot)).'px;';
	}
	
	if($bg_image !== ""){
		$section_style .= 'background-image: url('.esc_attr($bg_image).');';
		$section_style .= 'background-repeat: '.esc_attr($bg_repeat).';';
		$section_style .= 'background-attachment: '.esc_attr($bg_attach).';';
		$section_style .= 'background-size: '.esc_attr($bg_size).';';
	}
	if($bg_color !== ""){
		$section_style .= 'background-color: '.esc_attr($bg_color).';';
	}
	if($color !== ""){
		$section_style .= 'color: '.esc_attr($color).';';
	}
	if($border_color !== ""){
		$section_style .= 'border-color:'.esc_attr($border_color).';';
		$section_style .= 'border-style: '.esc_attr($border_style).';';
		$section_style .= 'border-top-width: '.esc_attr($border_top_width).'px;';
		$section_style .= 'border-right-width: '.esc_attr($border_right_width).'px;';
		$section_style .= 'border-bottom-width: '.esc_attr($border_bottom_width).'px;';
		$section_style .= 'border-left-width: '.esc_attr($border_left_width).'px;';
	}
	
	$video_frame_block_a = '';
	$video_frame_block_b = '';
	
	if($video_frame == "yes"){
		$video_frame_block_a = '<div class="video_frame">
					<div class="video_frame_tl">
						<div class="video_frame_br">
							<div class="video_frame_bl row_spacer2">';
		$video_frame_block_b = '</div>
						</div>
					</div>
				</div>';
	}
	
	$text_align = '';
	
	if($align == "center"){
		$text_align .= ' centered';
		
	}else if($align == "right"){
		$text_align .= ' align_right';
		
	}else if($align == "left"){
		$text_align .= ' align_left';
	}
	
	$output .= '<div class="content_section'.esc_attr($mode).'" style="'.esc_attr($section_style).'">';
	$output .= ($icon !== '') ? '<span class="section_icon"><i class="'.esc_attr($icon).'"></i></span>' : '';
	
	$what_video_type = '';
	if($video_type == "hosted"){
		$what_video_type .= ' html_video_background_con';
	}
	
	//====> Youtube Video Section
	if( $video_id !== "" && $video_type == "youtube" ){
		wp_enqueue_script( 'enar_idealtheme_yt_player_js');
		
	$output .= sprintf('<div class="youtube_bg_video has_overlay now_pausing" data-property="{videoURL:\'%s\',containment:\'%s\',startAt:%s,mute:%s,autoPlay:%s,loop:%s,opacity:%s,showYTLogo:false, realfullscreen:false, quality:\'%s\'}"></div>', esc_attr($video_id), $video_target, $video_start, $video_mute, $video_autoplay, $video_loop, $video_opacity, $video_quality);
	
	}
	
	$output .= ($bg_overlay == 'yes') ? '<div class="bg_overlay'.esc_attr($what_video_type).'" style="'.esc_attr($section_padding).'">' : '<div class="hm_no_overlay" style="'.esc_attr($section_padding).'">';
	
	//====> Self Hosted Video Section
	if( $video_type == "hosted" ){
		wp_enqueue_script( 'enar_idealtheme_videobackground_js');
		$output .= '<div class="html_video_background" data-mp="'.esc_attr($hosted_mp).'" data-webm="'.esc_attr($hosted_webm).'" data-ogg="'.esc_attr($hosted_ogg).'"></div>';
	}
	
	$video_h = '';
	if($video_type !== ''){
		if($video_type == 'hosted' && $hosted_height !== ''){
			$video_h = 'height:'.esc_attr($hosted_height).'px';
		}
		if($video_type == 'youtube' && $video_height !== ''){
			$video_h = 'height:'.esc_attr($video_height).'px';
		}
	}
	$output .= ($layout == "boxed") ? '<div class="content'.esc_attr($text_align).'" style="'.esc_attr($video_h).'">' : '<div class="'.esc_attr($text_align).'" style="'.esc_attr($video_h).'">';
	
	$output .= $video_frame_block_a;
	
	$output .= do_shortcode($content); 
	
	if( $video_id !== "" && $video_type == "youtube"){
		$output .= '<a href="#" class="play_video_btn pause_video">
						<span><i class="ico-pause2"></i></span>
					</a>';
	}
	
	$output .= $video_frame_block_b;
	$output .= '</div></div></div>';
	
	return $output;

}
add_shortcode("hm_video", "idealtheme_video_sc");

//=====================================================================================> Titles      
			
function idealtheme_titles_sc($atts, $content = null) {
		
	extract(shortcode_atts(array(
	   	'type' => 'normal_title',     // normal_title - small_title - main_title - bg_title
		'full_bg' => '',
	   	'transform' => 'capitalize',   // uppercase - none - lowercase - capitalize 
	   	'align' => 'left',          // center - right - left
	   	'color' => '',
	   	'icon' => '',
		    //===========================> 'type' => 'main_title'  
	   		'footer' => '',                // line - line_dot - line_icon - short_line - side_line - blank - has_bg
			'bg_color' => '',       // with ===> has_bg
			'icon_color' => '',     
			'title_size' => 'default',     // default - small
	                        	 
	), $atts));
	
	$output = '';
	$text_align = '';
	$uppercase = '';
	$icon_container = '';
	$rand_num = rand(1,100);
	
	 if($align == "right"){
		$text_align .= ' align_right';
		
	}else if($align == "left"){
		$text_align .= ' align_left';
		
	}else if($align == "center"){
		$text_align .= ' centered';
		
	}else{
		$text_align .= '';
		
	}
	
	$css_color = '';
	$css_icon_color = '';
	$css_transform = 'text-transform: '.esc_attr($transform).';';
	$css_full_bg = ( $full_bg !== '' ) ? 'background-color: '.esc_attr($full_bg).';' : '';
	
	if($color !== ""){
		$css_color .= 'color: '.esc_attr($color).';';
	}
	if($icon_color !== ""){
		$css_icon_color .= 'color: '.esc_attr($icon_color).';';
	}
	
	if($type == "normal_title"){
		$icon_container .= ( !empty($icon) ) ? '<i class="'.esc_attr($icon).'" style="'.esc_attr($css_icon_color).'"></i>' : '';
		$output .= '<h2 class="title1'.esc_attr($text_align).esc_attr($uppercase).'" style="'.esc_attr($css_transform.$css_color).'">'.$icon_container.do_shortcode($content).'</h2>';
		
	}else if($type == "small_title"){
		if($icon !== ""){
			$icon_container .= '<span class="s_icon"><i class="'.esc_attr($icon).'" style="'.esc_attr($css_icon_color).'"></i></span>';
		}
		$output .= '<div class="small_title'.esc_attr($text_align).'">
				<span class="small_title_con">
					'.$icon_container.'
					<span class="s_text" style="'.esc_attr($css_transform.$css_color).'">'.do_shortcode($content).'</span>
				</span>
			</div>';
			
	}else if($type == "bg_title"){
		$output .= '<div class="title_banner'.esc_attr($text_align).'" style="'.esc_attr($css_transform.$css_full_bg).'">
						<div class="content">
							<h2>'.do_shortcode($content).'</h2>
						</div>
					</div>';
			
	}else if($type == "main_title"){
		if($footer == "line_dot"){
			
			$icon_container .= ( !empty($icon_color) ) ? '<span class="line"><span class="dot" style="border-color:'.esc_attr($icon_color).';"></span></span>' : '<span class="line"><span class="dot"></span></span>';
			
		}else if($footer == "line_icon"){
			$icon_container .= '<span class="line"><i class="'.esc_attr($icon).'" style="'.esc_attr($css_icon_color).'"></i></span>';
			
		}else if($footer == "blank"){
			$icon_container .= '';
		}else{
			$icon_container .= '<span class="line"></span>';
		}
		
		$short_line = '';
		if($footer == "short_line"){
			$short_line .= ' short_line';
			
		}else if($footer == "has_bg"){
			$short_line .= ' has_bg';
			
		}else if($footer == "side_line"){
			$short_line .= ' side_line';
			
		}
		$without_line = ( $footer == "blank" ) ? ' no_line ' : '';
		
		$title_size = ( $title_size == "default" ) ? "" : " small";
		$output .= '<div class="main_title'.esc_attr($without_line).esc_attr($short_line).esc_attr($text_align).esc_attr($uppercase).esc_attr($title_size).' main_title'.esc_attr($rand_num).'">
				<h2 style="'.esc_attr($css_transform.$css_color).'">'.$icon_container.do_shortcode($content).'</h2>
			</div>';
		
		//$output .= '<style>';
		if( $footer == "line_dot" || $footer == "line_icon" || $footer == "line" ){
			
			$output .= ( !empty($icon_color) ) ? '<style>.main_title'.esc_attr($rand_num).':not(.has_bg) .line:before {
							background: '.esc_attr($icon_color).';
						}</style>' : '';
		}
		
		$output .= ( !empty($bg_color) ) ? '<style>.main_title'.esc_attr($rand_num).'.has_bg .line:before {
						border-color: '.esc_attr($bg_color).' transparent transparent;
					}
					.main_title'.esc_attr($rand_num).'.has_bg > h2 {
						background: '.esc_attr($bg_color).';
					}</style>' : '';
					
		//$output .= '</style>';
	}
	
	return $output;
}
add_shortcode("hm_title", "idealtheme_titles_sc");

//=====================================================================================> Description      

function idealtheme_desc_sc($atts, $content = null) {
		
	extract(shortcode_atts(array(
	   'type' => '1',           // description1 - description2 - description3 - description4 - description5
	   'transform' => 'none',   // uppercase - none - lowercase - capitalize 
	   'align' => 'center',     // centered - left - right
	), $atts));
	
	$output = '';
	$text_align = '';
	
	if($align == "center"){
		$text_align .= ' centered';
	}
	if($align == "right"){
		$text_align .= ' align_right';
	}
	
	$desc_type = '';
	
	if($type == "1"){
		$desc_type .= ' description1';
		
	}else if($type == "2"){
		$desc_type .= ' description2';
		
	}else if($type == "3"){
		$desc_type .= ' description3';
		
	}else if($type == "4"){
		$desc_type .= ' description4';
		
	}else if($type == "5"){
		$desc_type .= ' main_desc';
		
	}
	
	$output = '<span class="'.esc_attr($desc_type).esc_attr($text_align).'" style="text-transform: '.esc_attr($transform).';">'.esc_html(do_shortcode($content)).'</span>';
	
	return $output;

}
add_shortcode("hm_desc", "idealtheme_desc_sc");     

//=====================================================================================> Light Box      

function idealtheme_lightbox_sc($atts, $content = null) {
		
	extract(shortcode_atts(array(
	   'type' => 'dialog',                    // dialog - image - gallery - iframe - ajax
	        // 'type' => 'dialog'
		    'btn_title' => 'Empty Title',
		    'effect' => 'zoom',               // zoom - move
	        'btn_color' =>  '',         
		   
		    // 'type' => 'image','gallery'
		    'col' => '',                 	   // 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 10 - 11 - 12
			'img' => '',        
			
				// 'type' => 'iframe' 
				'iframe_type' => '',          // vimeo - youtube - map
				'iframe_title' => '',       
				'iframe_url' => '',
				'iframe_con' => 'as_button',     // image - button
				
				// 'iframe_con' => 'image' 
				'iframe_poster' => '',
				
				// 'iframe_con' => 'button' 
				'iframe_btn_text' => '',
			
			   
	), $atts));
	
	$output    = '';
	$anim_type = ($effect == "zoom") ? 'popup-with-zoom-anim' : 'popup-with-move-anim';
	$col_col   = ($col !== "") ? 'col-md-'.$col : 'col-md-rand';
	
	$img_thumb = idealtheme_fun_get_image_url($img, 'enar-blog-carousel');
	$img_large = idealtheme_fun_get_image_url($img, 'enar-blog-single-image');
	
	$iframe_poster = idealtheme_fun_get_image_url($iframe_poster, 'enar-blog-carousel');
	
	$rand_num = rand(1,100);
	
	if($type == "dialog" ){ //=================> if dialog type = dialog 
	    
		$btn_style = ( $btn_color !== '' ) ? 'style="border-color: '.esc_attr($btn_color).'; color: #fff; background-color: '.esc_attr($btn_color).';"' : '';
		
		
		$output .= '<a href="#popup-dialog-box'.$rand_num.'"  class="main_button medium_btn '.esc_attr($anim_type).'" '.$btn_style.'>
					'.esc_html($btn_title).'
				</a>';
				
		$output .= '<div id="popup-dialog-box'.$rand_num.'" class="zoom-anim-dialog mfp-hide small-dialog">
					'.do_shortcode($content).'
				</div>';		
					
	}else if($type == "image" || $type == "gallery" ){ //=============> if dialog type = image || gallery 
		$gall_con = ($type == "image") ? "magnific-popup " : "";
		$output .= '<div class="'.esc_attr($col_col).'">
							<a class="'.esc_attr($gall_con).'img_popup feature_inner_ling" href="'.esc_url($img_large).'">
								<img src="'.esc_url($img_thumb).'">
								<span>
									<i class="ico-maximize"></i>
								</span>
							</a>
					</div>';
								
	}else if( $type == "iframe" ){ //==================================> if dialog type = video 
		$iframe_icon = "";
		
		if($iframe_type == "vimeo"){
			$iframe_icon = "ico-vimeo";
			
		}else if($iframe_type == "youtube"){
			$iframe_icon = "ico-youtube3";
			
		}else if($iframe_type == "map"){
			$iframe_icon = "ico-pin";
		}
		
		if($iframe_con == "image" ) {
			$output .= ( $col !== "" ) ? '<div class="'.esc_attr($col_col).'">' : '';
			$output .= ( $iframe_title !== "" ) ? '<h2 class="title1 lato_font">'.esc_html($iframe_title).'</h2>' : '';
			
			$output .= '<a class="popup-vimeo vid_con" href="'.esc_attr($iframe_url).'">
							<span class="vid_type_icon"><i class="'.esc_attr($iframe_icon ).'"></i></span>
							<span class="vid_icon"><i class="ico-playback-play"></i></span>
							<img alt="'.esc_attr($iframe_title).'" src="'.esc_url($iframe_poster).'">
						</a>';
		    $output .= ( $col !== "" ) ? '</div>' : '';	
			
		}else{
			$btn_icon = ($iframe_type == "map" ) ? "ico-pin" : "ico-play5";
			$output .= ( $col !== "" ) ? '<div class="'.esc_attr($col_col).'">' : '';
			$output .= ( $iframe_title !== "" ) ? '<h2 class="title1 lato_font">'.esc_html($iframe_title).'</h2>' : '';
			
			$output .= '<a href="'.esc_attr($iframe_url).'" class="btn_a medium_btn popup-gmaps upper">
							<span>
								<i class="in_left '.esc_attr($btn_icon).'"></i>
								<span>'.esc_html($iframe_btn_text).'</span>
								<i class="in_right '.esc_attr($btn_icon).'"></i>
							</span>
						</a>';
		    $output .= ( $col !== "" ) ? '</div>' : '';	
		}
	}
	
	return $output;

}
add_shortcode("hm_lightbox", "idealtheme_lightbox_sc"); 

//=====================================================================================> Shortcodes for Accordion
function idealtheme_accordion_item_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'title' => '',
	  'icon' => '',
	  'expanded' => 'no',  // yes - no
    ), $atts ) );
	
	$output = '';
	$icon_con = ( $icon !== '' ) ? '<i class="'.esc_attr($icon).'"></i>' : '';
	$expanded = ( $expanded == 'no' ) ? 'false' : 'true';
	
	$output .= '<div class="enar_occ_container" data-expanded="'.esc_attr($expanded).'">
						<span class="enar_occ_title">'.$icon_con.esc_html($title).'</span>
						<div class="enar_occ_content">
							<div class="acc_content">'.do_shortcode($content).'</div>
						</div>
					</div>';
	return $output;
}
add_shortcode('hm_accordion_tab', 'idealtheme_accordion_item_sc');

function idealtheme_accordion_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'type'  => 'accordion',  // accordion - toggle
	  'arrow' => 'plus_minus', // plus_minus - arrow_style
    ), $atts ) );
	
	$output = '';
	$output .= '<div class="enar_accordion '.esc_attr($arrow).'" data-type="'.esc_attr($type).'">'.do_shortcode($content).'</div>';

	return $output;	
}
add_shortcode('hm_accordion', 'idealtheme_accordion_sc');

//=====================================================================================> Shortcodes Tabs

function idealtheme_tab_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'title' => 'Empty Title!',
		'icon' => '',
		'img' => '',
    ), $atts ) );
	
	global $enar_tabs_divs;
	global $enar_hm_tab_id;
	global $enar_hm_is_new_tab;
	
	$output = '';
	$selected = '';
	if ( $enar_hm_is_new_tab == 1 ){
		$selected = ' selected';
	}
	//$id = 'hm_tab'.rand(1,1000);
	
	$thumb_img = idealtheme_fun_get_image_url($img, 'enar-blog-masonry');
	$large_img = idealtheme_fun_get_image_url($img, 'enar-blog-single-image');
	
	if($icon !== ''){
		$icon = '<i class="'.esc_attr($icon).'"></i>';
	}
	$output .= '<li><a data-content="'.esc_attr($enar_hm_tab_id).'" class="'.esc_attr($selected).'" href="#"><span>'.$icon.'</span>'.esc_html($title).'</a></li>';
	
	$tab_img_con = (!empty($large_img)) ? '<div class="tab_img">
						<a href="'.esc_url($large_img).'" class="magnific-popup img_popup">
						<span><i class="ico-maximize"></i></span>
						<img alt="'.esc_attr($title).'" src="'.esc_url($thumb_img).'" class="popup_img">
						</a>
					</div>' : '';
	$enar_tabs_divs .= '<li data-content="'.esc_attr($enar_hm_tab_id).'" class="clearfix'.esc_attr($selected).'">'.$tab_img_con.do_shortcode($content).'</li>';
	$enar_hm_tab_id += 1;
	$enar_hm_is_new_tab += 1;
	return $output;
}
add_shortcode('hm_tab', 'idealtheme_tab_sc');

$enar_tabs_divs = '';
$enar_hm_tab_id = 1;
$enar_hm_is_new_tab = 1;

function idealtheme_tabs_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		'type'  => 'style1', // style1 - simple - fill1 - fill_arrow1 - ver1 - ver_gradient1 - 2 - fill2 - fill2_circle
    ), $atts ) );
	
	global $enar_tabs_divs;
	global $enar_hm_tab_id;
	global $enar_hm_is_new_tab;
	
	$output = '';
	$tab_type = '';
	
	if($type == "simple" ){
		$tab_type = 'simple_tabs';
		
	}else if($type == "fill1" ){
		$tab_type = 'tabs1 fill_active';
		
	}else if($type == "fill_arrow1" ){
		$tab_type = 'tabs1 fill_active with_arrow_t';
		
	}else if($type == "ver1" ){
		$tab_type = 'tabs1 ver_tabs';
		
	}else if($type == "ver_gradient1" ){
		$tab_type = 'tabs1 ver_tabs gradient_active';
		
	}else if($type == "2" ){
		$tab_type = 'tabs2';
		
	}else if($type == "fill2" ){
		$tab_type = 'tabs2 fill_active';
		
	}else if($type == "fill2_circle" ){
		$tab_type = 'tabs2 fill_active circle';
		
	}else{
		$tab_type = 'tabs1';
	}
	
	$output .= '<div class="hm-tabs '.esc_attr($tab_type).'">
					<nav>
						<ul class="tabs-navi">'.do_shortcode($content).'</ul>
					</nav>
					<ul class="tabs-body">'.$enar_tabs_divs.'</ul>
				</div>';
	$enar_tabs_divs = '';
	$enar_hm_is_new_tab = 1;
	return $output;	
}
add_shortcode('hm_tabs', 'idealtheme_tabs_sc');

//=====================================================================================> Banner Text Shortcode

function idealtheme_banner_text_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	    // full_colored - full_white - boxed_colored - boxed_white - classic_white - full_colored2 - full_gray - boxed_colored2 - boxed_gray
	    'type' => '',     
			'bg_color' => '', //'type' => full_colored - boxed_colored - full_colored2 - full_gray
		'align' => '',        // center - right - left
		'title' => '',
		    //'type' => full_colored2
			'icon' => '',
			
		'btn_title' => '',
		'btn_url' => '',
		'btn_target' => 'self', // self - blank
		'btn_icon' => '',
    ), $atts ) );

	$output = '';
	$banner_type = '';
	$custom_bg_color = '';
	if( $type == "full_colored" || $type == "boxed_colored" || $type == "full_colored2" || $type == "full_gray" || $type == "boxed_colored2" || $type == "boxed_gray" || $type == "" ){
		$bg_color = ( $bg_color !== "" ) ? 'background-color:'.esc_attr($bg_color).'' : '';
	}
	
	$btn_target = ( $btn_target == "self" ) ? "_self" : "_blank" ;
	
	if($type == "full_colored" ){
		$banner_type = 'full_colored';
		
	}else if($type == "full_white" ){
		$banner_type = 'full_white';
		
	}else if($type == "boxed_colored" ){
		$banner_type = 'boxed_colored container';
		
	}else if($type == "boxed_white" ){
		$banner_type = 'boxed_white container';
		
	}else if($type == "full_colored2" ){
		$banner_type = 'full_banner_colored';
		
	}else if($type == "full_gray" ){
		$banner_type = 'full_gray';
		
	}else if($type == "boxed_colored2" ){
		$banner_type = 'full_banner_colored new_boxed_banner';
		
	}else if($type == "boxed_gray" ){
		$banner_type = 'full_gray new_boxed_banner';
		
	}else if($type == "classic_white" ){
		$banner_type = 'classic_white';
	}
	
	
	if($align == "center"){
		$align = ' centered';
		
	}else if($align == "right"){
		$align = ' align_right';
		
	}else if($align == "left"){
		$align = ' align_left';
		
	}
	
	$button_con = '';
	$button_con2 = '';
	$button_position = '';
	$icon_classic = '';
	
	if( ( $type == "full_colored2" || $type == "boxed_colored2" ) && $icon !== "" ){
		$icon = '<span class="rotate_icon"><i class="'.esc_attr($icon).'"></i></span>';
		
	}else if( ($type == "classic_white" || $type == "slide" ) && $icon !== "" ){
		$icon_classic .= '<span><i class="larg '.esc_attr($icon).'"></i></span>';
		$icon = '';
		
	}else{
		$icon = '';
	}
	
	
	if($btn_title !== "" && $btn_icon !== ""){
		
		if($type == "full_colored2" || $type == "boxed_colored2" || $type == "classic_white" || $type == "slide"){
			$button_position = 'btn_space';
		}else{
			$button_position = 'f_right';
		}
		
		$button_con = '<a href="'.esc_attr($btn_url).'" target="'.esc_attr($btn_target).'" class="btn_a '.esc_attr($button_position).'">
							<span>
								<i class="in_left '.esc_attr($btn_icon).'"></i>
								<span>'.esc_html($btn_title).'</span>
								<i class="in_right '.esc_attr($btn_icon).'"></i>
							</span>
						</a>';
						
		if($type == "full_colored2" || $type == "boxed_colored2" || $type == "classic_white" || $type == "slide" ){
			
			$button_con2 = $button_con;
			$button_con = '';
			
		}
							
	}else if($btn_title !== ""){
		$button_con = '<a href="'.esc_attr($btn_url).'" target="'.esc_attr($btn_target).'" class="main_button f_right">'.esc_html($btn_title).'</a>';
		
	}
	
	if ( $type == "slide" ){
		$intro_text = ( do_shortcode($content) !== '' ) ? '<span class="intro_text">'.do_shortcode($content).'</span>' : '';
		$output .= '<div class="welcome_banner_slide '.esc_attr($align).'">
						<h3>'.$icon_classic.esc_html($title).'</h3>
						'.$button_con.$intro_text.$button_con2.$icon.'
					</div>';
	}else{
		if( ( $type == "boxed_gray" || $type == "full_gray" ) && $align == " centered" ){
			$button_con2 = $button_con;
			$button_con = '';
		}
		
		$intro_text = ( do_shortcode($content) !== '' ) ? '<span class="intro_text">'.do_shortcode($content).'</span>' : '';
		$output .= '<div class="welcome_banner '.esc_attr($banner_type).esc_attr($align).'" style="'.esc_attr($bg_color).'">
					<div class="content clearfix">
						<h3>'.$icon_classic.esc_html($title).'</h3>
						'.$button_con.$intro_text.$button_con2.$icon.'
					</div>
				</div>';
	}
	
	return $output;
}
add_shortcode('hm_banner', 'idealtheme_banner_text_sc');

function idealtheme_banner_slider_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'type' => '',
    ), $atts ));
	$output = '';
	$output .= '<div class="welcome_banner classic_white"><div class="welcome_banner_slider">';
	$output .= do_shortcode($content);  
	$output .= '</div></div>';
	return $output;
}
add_shortcode('hm_banner_slider', 'idealtheme_banner_slider_sc');

//=====================================================================================> Spacer Shortcode
function idealtheme_spacer_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'height' => '',
    ), $atts ));
	$output = '';
	$output .= '<div style="height:'.esc_attr($height).'px;"></div>';
	return $output;
}
add_shortcode('hm_spacer', 'idealtheme_spacer_sc');

//=====================================================================================> Skills Shortcode

$enar_data_progress_delay = 200;

function idealtheme_skill_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'type' => 'bar_simple',  // bar_simple - bar_3d - circle
		    //'type' => 'circle'
			'col' => '3',              // 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 10 - 11 - 12
			'path_type' => 'circle',   // circle - square
		'value' => 100,
		'title' => 'Empty Title',
		//'desc' => '',
		'bg_color' => ''
    ), $atts ));
	
	global $enar_data_progress_delay;
	$output = '';
	$col_col = ($col !== "") ? 'col-md-'.$col : 'col-md-rand';
	$desc = do_shortcode($content);
	
	if( $type == "bar_simple" ){
		$output .= '<div class="progress_bar" data-progress-val="'.esc_attr($value).'" data-progress-animation="easeOutQuad" data-progress-delay="'.esc_attr($enar_data_progress_delay).'" data-progress-color="'.esc_attr($bg_color).'">
						<div class="fill_con">
							<div class="fill">
								<span class="title">'.esc_html($title).'</span>
								<span class="value"><span class="num"></span><span>%</span></span>
							</div>
						</div>
					</div>';	
					
	}else if( $type == "bar_3d" ){
		
		$output .= '<div class="prog_bar2_con">
						<span class="title"><i class="ico-angle-right"></i><span class="prog_bar2_title">'.esc_html($title).'</span></span>
						<div class="progress_bar prog_bar2" data-progress-val="'.esc_attr($value).'" data-progress-animation="easeOutQuad" data-progress-delay="'.esc_attr($enar_data_progress_delay).'" data-progress-color="'.esc_attr($bg_color).'">
							<div class="fill_con2">
								<div class="fill">
									<span class="value"><span class="num"></span><span>%</span></span>
								</div>
							</div>
							<div class="fill_con">
								<div class="fill"></div>
							</div>
						</div>
					</div>';	
					
	}else if( $type == "circle" ){
		
		wp_enqueue_script( 'enar_idealtheme_progressbar');
		
		$desc_con  = ( !empty($desc) ) ? '<div class="hm_circle_desc">'.esc_html($desc).'</div>' : '';
		$title_con = ( !empty($title) ) ? '<span class="hm_circle_title">'.esc_html($title).'</span>' : '';
		
		$output .= '<div class="'.esc_attr($col_col).'">
					<div class="hm_circle_progressbar_con">
						<div class="hm_circle_progressbar style1 '.esc_attr($path_type).'" data-percentag="'.esc_attr($value).'" data-start-color="'.esc_attr($bg_color).'" data-end-color="'.esc_attr($bg_color).'" data-delay="'.esc_attr($enar_data_progress_delay).'" data-animation="easeInOut"></div>
						'.$title_con.$desc_con.'
					</div>
				</div>';	
	}
	
	$enar_data_progress_delay = $enar_data_progress_delay + 200;
	
    return $output;
}
add_shortcode('hm_skill', 'idealtheme_skill_sc');

function idealtheme_skills_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(), $atts ) );
	global $enar_data_progress_delay;
	$output = '';
	$output .= '<div class="rows_container clearfix">';
	$output .= do_shortcode($content);  
	$output .= '</div><div class="clear"></div>';
	$enar_data_progress_delay = 200;	
	return $output;
}
add_shortcode('hm_skills', 'idealtheme_skills_sc');

//=====================================================================================> Shortcodes Team

function idealtheme_member_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		//'type'  => 'flip_cart', // flip_cart - slider - blocks

		//'type' => 'blocks'
		'bg_color'  => '',
		
		'name' => '',
		'job' => '',
		'image' => '',
		'url' => '',
		'target' => 'self', // self - blank
		
		'facebook' => '',
		'twitter' => '',
		'google' => '',
		'linkedin' => '',
		'vimeo' => '',
		'skype' => '',
		'rss' => '',
		'flickr' => '',
		'picassa' => '',
		'tumblr' => '',
		'dribbble' => '',
		'soundcloud' => '',
		'instagram' => '',
		'pinterest' => '',
		'youtube' => '',
		
    ), $atts ) );
	
	$output = '';
	global $enar_hm_team_type;
	global $enar_hm_team_cols;
	$type = $enar_hm_team_type;
	$col = $enar_hm_team_cols;
	
	$col_col = ($col !== "") ? 'col-md-'.$col : 'col-md-rand';
	$member_target = ( $target == "self" ) ? "_self" : "_blank" ;
	$social_media_con = '';
	
	$image_large = idealtheme_fun_get_image_url($image, 'large');
	$image = idealtheme_fun_get_image_url($image, 'medium');
	
	if( $facebook !== '' ){
		$social_media_con .= '<a href="'.esc_attr($facebook).'" target="_blank" class="twitter"><i class="ico-twitter4"></i></a>';
	}
	if( $twitter !== '' ){
		$social_media_con .= '<a href="'.esc_attr($twitter).'" target="_blank" class="facebook"><i class="ico-facebook4"></i></a>';
	}
	if( $google !== '' ){
		$social_media_con .= '<a href="'.esc_attr($google).'" target="_blank" class="googleplus"><i class="ico-google-plus"></i></a>';
	}
	if( $linkedin !== '' ){
		$social_media_con .= '<a href="'.esc_attr($linkedin).'" target="_blank" class="linkedin"><i class="ico-linkedin3"></i></a>';
	}
	if( $vimeo !== '' ){
		$social_media_con .= '<a href="'.esc_attr($vimeo).'" target="_blank" class="vimeo"><i class="ico-vimeo"></i></a>';
	}
	if( $skype !== '' ){
		$social_media_con .= '<a href="'.esc_attr($skype).'" target="_blank" class="skype"><i class="ico-skype2"></i></a>';
	}
	if( $rss !== '' ){
		$social_media_con .= '<a href="'.esc_attr($rss).'" target="_blank" class="rss"><i class="ico-rss"></i></a>';
	}
	if( $flickr !== '' ){
		$social_media_con .= '<a href="'.esc_attr($flickr).'" target="_blank" class="flickr"><i class="ico-flickr2"></i></a>';
	}
	if( $picassa !== '' ){
		$social_media_con .= '<a href="'.esc_attr($picassa).'" target="_blank" class="picasa"><i class="ico-picassa"></i></a>';
	}
	if( $tumblr !== '' ){
		$social_media_con .= '<a href="'.esc_attr($tumblr).'" target="_blank" class="tumblr"><i class="ico-tumblr"></i></a>';
	}
	if( $dribbble !== '' ){
		$social_media_con .= '<a href="'.esc_attr($dribbble).'" target="_blank" class="dribble"><i class="ico-dribbble"></i></a>';
	}
	if( $soundcloud !== '' ){
		$social_media_con .= '<a href="'.esc_attr($soundcloud).'" target="_blank" class="soundcloud"><i class="ico-soundcloud"></i></a>';
	}
	if( $instagram !== '' ){
		$social_media_con .= '<a href="'.esc_attr($instagram).'" target="_blank" class="instagram"><i class="ico-instagram3"></i></a>';
	}
	if( $pinterest !== '' ){
		$social_media_con .= '<a href="'.esc_attr($pinterest).'" target="_blank" class="pinterest"><i class="ico-pinterest-p"></i></a>';
	}
	if( $youtube !== '' ){
		$social_media_con .= '<a href="'.esc_attr($youtube).'" target="_blank" class="youtube"><i class="ico-youtube3"></i></a>';
	}
	
	if( $type == "flip_cart" ){
		$img_block = ( $image !== '' ) ? '<span class="team_img">
									<img alt="'.esc_attr($name).'" src="'.esc_attr($image).'">
								</span>' : '';
								
		$output .= '<div class="'.esc_attr($col_col).'">
					<div class="team_block flipp_effect">
						<div class="f1_card">
							<div class="front face">
								'.$img_block.'
								<span class="person_name">'.esc_html($name).'</span>
								<span class="person_jop">'.esc_html($job).'</span>
							</div>
							<div class="back face">
								<span class="person_name">'.esc_html($name).'</span>
								<span class="person_jop">'.esc_html($job).'</span>
								<span class="person_desc">'.do_shortcode($content).'</span>
								<div class="social_media clearfix">
									'.$social_media_con.'
								</div>
								<a class="arrow_btn" href="'.esc_attr($url).'" target="'.esc_attr($member_target).'"><i class="ico-arrow-right4"></i>'.esc_html(esc_html__( 'Full Profile','enar')).'</a>
							</div>
						</div>
					</div>
				</div>';
		
	}else if( $type == "slider" ){
		$output .= '<div class="col-md-12">
						<div class="team_block2 clearfix">
							<a class="member_img" href="'.esc_attr($image_large).'" data-rel="magnific-popup">
								<img alt="'.esc_attr($name).'" src="'.esc_attr($image).'">
							</a>
							<div class="team_detail">
								<a href="'.esc_attr($url).'" target="'.esc_attr($member_target).'"><span class="person_name">'.esc_html($name).'</span></a>
								<span class="person_jop">'.esc_html($job).'</span>
								<span class="person_desc">'.do_shortcode($content).'</span>
								<div class="social_media clearfix">
									'.$social_media_con.'
								</div>
							</div>
						</div>
					</div>';
		
	}else if( $type == "blocks" ){
		$output .= '<div class="team-col no_padding clearfix" data-color="'.esc_attr($bg_color).'">
						<div class="team-col-1">
							<a class="member_img2" href="'.esc_attr($image_large).'" data-rel="magnific-popup">
								<span>
									<img alt="'.esc_attr($name).'" src="'.esc_attr($image).'">
								</span>
							</a>
						</div>
						<div class="team-col-2">
							<div class="team-col-2-con">
								<a href="'.esc_attr($url).'" target="'.esc_attr($member_target).'"><span class="person_name">'.esc_html($name).'</span></a>
								<span class="person_jop">'.esc_html($job).'</span>
								<span class="person_desc">'.do_shortcode($content).'</span>
								<div class="social_media clearfix">
									'.$social_media_con.'
								</div>
							</div>
							<span class="arrow"></span>
						</div>
					</div>';
		
	}
	
	$output .= '';
	return $output;	
}
add_shortcode('hm_member', 'idealtheme_member_sc');

$enar_hm_team_type = '';
$enar_hm_team_cols = '';
function idealtheme_team_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'type'  => 'flip_cart', // flip_cart - slider - blocks
		'col' => '3',           //'type' => 'flip_cart' ===> 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 10 - 11 - 12
    ), $atts ) );
	
	$output = '';
	global $enar_hm_team_type;
	global $enar_hm_team_cols;
	$enar_hm_team_type = $type;
	$enar_hm_team_cols = $col;
	
	if( $type == "flip_cart" ){
		$output .= '<div class="rows_container clearfix">';
		
	}else if( $type == "slider" ){
		$output .= '<div class="content_slider our_team_section rows_container clearfix">';
		
	}else if( $type == "blocks" ){
		$output .= '<div class="team_block3 rows_container clearfix">';
		
	}
	
	$output .= do_shortcode($content); 
	$output .= '</div>';
	return $output;
}
add_shortcode('hm_team', 'idealtheme_team_sc');

//=====================================================================================> Shortcodes Testimonials

function idealtheme_monial_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		//'type'  => '2', // 1 - 2
		'name' => '',
		'job' => '',
		'image' => '',
		'url' => '',
		'target' => 'self', // self - blank
		
    ), $atts ) );
	
	$output = '';
	global $enar_hm_monial_type;
	$type = $enar_hm_monial_type;
	$monial_target = ( $target == "self" ) ? "_self" : "_blank" ;
	
	if( $type == "1" ){
		$image = idealtheme_fun_get_image_url($image, 'enar-blog-avatar-thumb');
	}else{
		$image = idealtheme_fun_get_image_url($image, 'thumbnail');
	}
	
	$img_linked = ( $url !== '' ) ? '<a href="'.esc_attr($url).'" target="'.esc_attr($monial_target).'"><img src="'.esc_url($image).'" alt="'.esc_attr($name).'"></a>' : '<img src="'.esc_url($image).'" alt="'.esc_attr($name).'">' ;
	
	if( $type == "1" ){
		
		$job = ( $job !== "" ) ? ' /<span>'.esc_html($job).'</span>' : '';
		$output .= '<div class="col-md-6">
						<div class="what_say_block">
							<span class="say_img">'.$img_linked.'</span>
							<div class="say_datils">
								<h5>'.esc_html($name).$job.'</h5>
								<span class="text">'.do_shortcode($content).'</span>
							</div>
						</div>
					</div>';
		
	}else if( $type == "2" ){
		
		$job = ( $job !== "" ) ? ' - <span class="url">'.esc_html($job).'</span>' : '';
		$output .= '<div class="c_say">
						<div class="centered">
							<span class="client_img">
								<span>
									'.$img_linked.'
								</span>
							</span>
						</div>
						<span class="client_details">
							<span class="name">'.esc_html($name).'</span>'.$job.'
						</span>
						<span class="desc">'.do_shortcode($content).'</span>
					</div>';
		
	}
	return $output;	
}
add_shortcode('hm_monial', 'idealtheme_monial_sc');

$enar_hm_monial_type = '';

function idealtheme_monials_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'type'  => '2', // 1 - 2
    ), $atts ) );
	
	$output = '';
	global $enar_hm_monial_type;
	$enar_hm_monial_type = $type;
	
	if( $type == "1" ){
		$output .= '<div class="content_slider testimonials_slider">';
		
	}else if( $type == "2" ){
		$output .= '<div class="normal_text_slider client_say_slider" data-animation="" data-speed="900" data-duration="3000" data-hover_stop="true" data-height="true" data-navigation="true" data-pagination="false">';
		
	}
	$output .= do_shortcode($content); 
	$output .= '</div>';
	return $output;
}
add_shortcode('hm_monials', 'idealtheme_monials_sc');

//=====================================================================================> Shortcodes Clients

function idealtheme_client_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
	    'name' => '',
		'logo' => '',
		'url' => '',
		'target' => '_self', // _self - _blank
    ), $atts ) );
	
	$output = '';
	$client = '';
	
	$logo = idealtheme_fun_get_image_url($logo, 'medium');
	
	if( $url !== '' ) {
		$client= '<a target="'.esc_attr($target).'" href="'.esc_attr($url).'"><img src="'.esc_url($logo).'" alt="'.esc_attr($name).'" title="'.esc_attr($name).'"></a>';
		
	}else{
		$client= '<img src="'.esc_url($logo).'" alt="'.esc_attr($name).'" title="'.esc_attr($name).'">';
		
	}
	
	$output .= '<div class="c_logo">'.$client.'</div>';
	
	return $output;	
}
add_shortcode('hm_client', 'idealtheme_client_sc');

function idealtheme_clients_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	    'style' => '',       // light - dark 
    ), $atts ) );
	
	$output = '';
	$style = ( $style == 'light' ) ? 'white_section clients_white' : '';
	
	$output .= '<div class="content clearfix '.esc_attr($style).'">';
	
	$output .= '<div class="our_client_slider">';
	$output .= do_shortcode($content); 
	$output .= '</div></div>';

	return $output;
}
add_shortcode('hm_clients', 'idealtheme_clients_sc');

//=====================================================================================> Shortcodes Counters
$enar_counter_delay = 0;
$enar_hm_counter_col = 0;
$enar_counter_animation = '';

function idealtheme_count_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
	    'title' => '',
		'number' => '',
		'icon' => '',
		//'col' => '3',    // 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 10 - 11 - 12
		
    ), $atts ) );
	
	global $enar_counter_delay;
	global $enar_counter_animation;
	global $enar_hm_counter_col;
	$col = $enar_hm_counter_col;
	$animation = $enar_counter_animation;
	
	$output = '';
	$col = ($col !== "") ? 'col-md-'.$col : 'col-md-rand';
	
	$output .= '<div class="'.esc_attr($col).'">';
		$output .= ($animation !== 'no') ? '<div class="counter animated" data-animation="'.esc_attr($animation).'" data-animation-delay="'.esc_attr($enar_counter_delay).'">' : '<div class="counter">';
			 $output .= ($icon !== '') ? '<span class="icon"><i class="'.esc_attr($icon).'"></i></span>' : '';
			 $output .= '<span class="value" data-speed="4000" data-from="0" data-to="'.esc_attr($number).'">'.esc_attr($number).'</span>
						<span class="title">'.esc_html($title).'</span>
					</div>
				</div>';
    $enar_counter_delay += 100;

	return $output;	
}
add_shortcode('hm_count', 'idealtheme_count_sc');

function idealtheme_counter_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'type' => '1', // 1 - 2
		'col' => '3',    // 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 10 - 11 - 12
		'delay' => 300,
		'animation' => 'no',
    ), $atts ) );
	
	global $enar_hm_counter_col;
	global $enar_counter_delay;
	$enar_counter_delay = intval($delay);
	$enar_hm_counter_col = $col;
	
	global $enar_counter_animation;
	$enar_counter_animation = $animation;
	
	$output = '';
	$output .= ( $type == '1' ) ? '<div class="counter_a clearfix">' : '<div class="counter_b clearfix">';
	$output .= do_shortcode($content); 
	$output .= '</div>';
	$enar_counter_delay = 0;
	$enar_hm_counter_col = '';
	return $output;
}
add_shortcode('hm_counter', 'idealtheme_counter_sc');

//=====================================================================================> Shortcodes Icon Box

$enar_hm_icon_num = 1;

function idealtheme_icon_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		//'type' => '',  // style1 - style2 - style3 - style4 - style5 - style6 - style7 - style8 - style9 - style10
		//'icon_type' => 'icon',   // icon - image - tree_icon
		
		'icon' => '',
		'icon_color' => '',        // style1 - // style2
		
		'img_icon' => '',
		
		'leaf_color' => (idealtheme_option('site_main_color') !== '' ) ? idealtheme_option('site_main_color') : '#1CCDCA', // style10
			
	    'title' => '',
		'url' => '',
		'target' => '_self', // _self - _blank
		
		'btn_text' => esc_html__( 'Read More','enar'),
    ), $atts ) );
	
	$output = '';
	global $enar_hm_icon_box_delay;
	global $enar_hm_box_icon_type;
	global $enar_hm_icon_box_animation;
	global $enar_hm_box_icon_col;
	global $enar_hm_icon_num;
	
	$img_icon = idealtheme_fun_get_image_url($img_icon, 'thumbnail');
	
	$col = $enar_hm_box_icon_col;
	$animation = $enar_hm_icon_box_animation;
	$icon_bg_color = '';
	
	//==========>
	$style_con = '';
		if( !empty($icon_color) ) {
			
			if ( $enar_hm_box_icon_type == 'style1' || $enar_hm_box_icon_type == 'style2' ){
				$style_con .= '<style>
		 		.icon_boxes_con.just_style1 .hm_icon_num'.esc_attr($enar_hm_icon_num).' i, .icon_boxes_con.just_style2 .hm_icon_num'.esc_attr($enar_hm_icon_num).' i{
					background:'.esc_attr($icon_color).' !important;
				}
		 		</style>';
			}
			if ( $enar_hm_box_icon_type == 'style3' ){
				$style_con .= '<style>
		 		.icon_boxes_con.just_style3.style1.circle.just_icon_border:not(.solid_icon) .hm_icon_num'.esc_attr($enar_hm_icon_num).' i:after{
					background:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.just_style3.style1.circle.just_icon_border:not(.solid_icon) .service_box:hover .hm_icon_num'.esc_attr($enar_hm_icon_num).' i{
					color:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.just_style3.style1.circle.just_icon_border:not(.solid_icon) .service_box:hover .hm_icon_num'.esc_attr($enar_hm_icon_num).':after{
					border-color:'.esc_attr($icon_color).' !important;
				}
		 		</style>';
			}
			if ( $enar_hm_box_icon_type == 'style4' ){
				$style_con .= '<style>
				.icon_boxes_con.just_style4.style1.circle.just_icon_border.solid_icon:not(.radius5) .service_box > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).':before{
					background:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.just_style4.style1.circle.just_icon_border.solid_icon:not(.radius5) .service_box > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).':after{
					border-color:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.just_style4.style1.circle.just_icon_border.solid_icon:not(.radius5) .service_box > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).' i{
					color:'.esc_attr($icon_color).';
				}
				.icon_boxes_con.just_style4.style1.circle.just_icon_border.solid_icon:not(.radius5) .service_box:hover > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).' i{
					color: #fff;
					background: none !important;
				}
		 		</style>';
			}
			if ( $enar_hm_box_icon_type == 'style5' ){
				$style_con .= '<style>
				.icon_boxes_con.just_style5.style1.circle.just_icon_border.solid_icon.radius5 .service_box > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).':before, .icon_boxes_con.just_style5.style1.circle.just_icon_border.solid_icon.radius5 .service_box:hover > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).':after{
					background:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.just_style5.style1.circle.just_icon_border.solid_icon.radius5 .service_box > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).':after{
					border-color:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.just_style5.style1.circle.just_icon_border.solid_icon.radius5 .service_box > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).' i{
					color:'.esc_attr($icon_color).';
				}
				.icon_boxes_con.just_style5.style1.circle.just_icon_border.solid_icon.radius5 .service_box:hover > .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).' i{
					color: #fff;
					background: none !important;
				}
		 		</style>';
			}
			if ( $enar_hm_box_icon_type == 'style6' ){
				$style_con .= '<style>
				.icon_boxes_con.style2.just_style6 .service_box .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).'{
					background:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.style2.just_style6 .service_box:hover .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).'{
					color:'.esc_attr($icon_color).' !important;
					background: #ffffff !important;
				}
		 		</style>';
			}
			if ( $enar_hm_box_icon_type == 'style7' ){
				$style_con .= '<style>
				.icon_boxes_con.style2.solid_icon.just_style7 .service_box .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).' i{
					color:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.style2.solid_icon.just_style7 .service_box:hover .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).' i{
					color: #fff !important;
				}
				
				.icon_boxes_con.style2.solid_icon.just_style7 .service_box .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).':after{
					border-color:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.style2.solid_icon.just_style7 .service_box .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).':before{
					background: '.esc_attr($icon_color).' !important;
				}
		 		</style>';
			}
			if ( $enar_hm_box_icon_type == 'style8' ){
				$style_con .= '<style>
				.icon_boxes_con.style2.just_style8 .service_box .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).'{
					background:'.esc_attr($icon_color).' !important;
				}
				.icon_boxes_con.style2.just_style8 .service_box:hover .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).'{
					color:'.esc_attr($icon_color).' !important;
					background: #ffffff !important;
				}
		 		</style>';
			}
			if ( $enar_hm_box_icon_type == 'style9' ){
				$style_con .= '<style>
				.icon_boxes_con.just_style9 .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).'{
					background:'.esc_attr($icon_color).' !important;
				}
		 		</style>';
			}
			if ( $enar_hm_box_icon_type == 'style12' ){
				$style_con .= '<style>
				.icon_boxes_con.just_style12.simple .icon.hm_icon_num'.esc_attr($enar_hm_icon_num).'{
					color:'.esc_attr($icon_color).' !important;
				}
		 		</style>';
			}
		}
	//==========>
	
	if( $enar_hm_box_icon_type == 'style1' || $enar_hm_box_icon_type == 'style2' ){
		$icon_bg_color = ( $icon_color !== '' ) ? ' style="background: '.esc_attr($icon_color).'"' : '';
		
	}
	$centered = ( $enar_hm_box_icon_type == 'style6' || $enar_hm_box_icon_type == 'style7' || $enar_hm_box_icon_type == 'style8' || $enar_hm_box_icon_type == 'style9' || $enar_hm_box_icon_type == 'style12' ) ? '' : ' centered';
	$is_circle = ( $enar_hm_box_icon_type == 'style6' || $enar_hm_box_icon_type == 'style7' || $enar_hm_box_icon_type == 'style8' || $enar_hm_box_icon_type == 'style9' ) ? ' circle' : '';
	
	if( $enar_hm_box_icon_type == 'style11' ){
		
		$col = ($col !== "") ? 'col-md-'.$col : 'col-md-rand';
		$url = ($url !== "") ? '<a href="'.esc_attr($url).'" target="'.esc_attr($target).'" class="ser-box-link"><span></span>'.esc_html($btn_text).'</a>' : '';
		
		$output .= ($animation !== 'no') ? '<div class="'.esc_attr($col).' animated" data-animation="'.esc_attr($animation).'" data-animation-delay="'.esc_attr($enar_hm_icon_box_delay).'">' : '<div class="'.esc_attr($col).'">';
			$output .= '<div class="service_box">
							<span class="hm_img_icon"><img alt="'.esc_attr($title).'" src="'.esc_url($img_icon).'"/></span>
							<div class="service_box_con'.$centered.'">
								<h3>'.esc_html($title).'</h3>
								<span class="desc">'.do_shortcode($content).'</span>
								'.$url.'
							</div>
						</div>
					</div>';
		
	} else if( $enar_hm_box_icon_type == 'style10' ){
		
		$output .= ($animation !== 'no') ? '<li data-bgcolor="'.esc_attr($leaf_color).'" class="animated" data-animation="'.esc_attr($animation).'" data-animation-delay="'.esc_attr($enar_hm_icon_box_delay).'">' : '<li data-bgcolor="'.esc_attr($leaf_color).'">';
		$output .= '<span class="leaf_icon"><i class="'.esc_attr($icon).'"></i></span>
					<div class="leaf_con">';
		    $output .= ( $url !== '' ) ? '<a href="'.esc_attr($url).'" target="'.esc_attr($target).'" class="tree_features_t">'.esc_html($title).'</a>' : '<span class="tree_features_t">'.esc_html($title).'</span>';
		    $output .= '<span class="tree_features_d">'.do_shortcode($content).'</span>
					</div>
					<span class="tree_curv"></span>
				</li>';
		
	} else {
		
		$col = ($col !== "") ? 'col-md-'.$col : 'col-md-rand';
		$url = ($url !== "") ? '<a href="'.esc_attr($url).'" target="'.esc_attr($target).'" class="ser-box-link"><span></span>'.esc_html($btn_text).'</a>' : '';
		$output .= ($animation !== 'no') ? '<div class="'.esc_attr($col).' animated" data-animation="'.esc_attr($animation).'" data-animation-delay="'.esc_attr($enar_hm_icon_box_delay).'">' : '<div class="'.esc_attr($col).'">';
			$output .= '<div class="service_box">
							<span class="icon'.esc_attr($is_circle).' hm_icon_num'.esc_attr($enar_hm_icon_num).'"><i class="'.esc_attr($icon).'"></i></span>
							<div class="service_box_con'.$centered.'">
								<h3>'.esc_html($title).'</h3>
								<span class="desc">'.do_shortcode($content).'</span>
								'.$url.'
							</div>
						</div>
						'.$style_con.'
					</div>';
	}
    $enar_hm_icon_box_delay += 100;
	$enar_hm_icon_num       += 1;

	return $output;	
}
add_shortcode('hm_icon', 'idealtheme_icon_sc');

$enar_hm_icon_box_delay = 0;
$enar_hm_box_icon_type = '';
$enar_hm_box_icon_col = '3';
$enar_hm_icon_box_animation = 'no';

function idealtheme_icons_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'type' => '',           // style1 - style2 - style3 - style4 - style5 - style6 - style7 - style8 - style9 - style10
			'tree_image' => '', // style10
		'col' => '4',           // 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 10 - 11 - 12	
		'delay' => 0,
		'animation' => 'no',
    ), $atts ) );
	
	$tree_image = idealtheme_fun_get_image_url($tree_image, 'thumbnail');
	
	global $enar_hm_icon_box_animation;
	$enar_hm_icon_box_animation = $animation;
	
	global $enar_hm_box_icon_col;
	$enar_hm_box_icon_col = $col;
	
	global $enar_hm_icon_box_delay;
	$enar_hm_icon_box_delay = intval($delay);
	
	global $enar_hm_box_icon_type;
	$enar_hm_box_icon_type = $type;
	
	$output = '';
	
	if($type == 'style1'){
		$output .= '<div class="icon_boxes_con style1 clearfix just_style1">';
		
	}else if($type == 'style2'){
		$output .= '<div class="icon_boxes_con style1 circle clearfix just_style2">';
		
	}else if($type == 'style3'){
		$output .= '<div class="icon_boxes_con style1 circle just_icon_border clearfix just_style3">';
		
	}else if($type == 'style4'){
		$output .= '<div class="icon_boxes_con style1 circle just_icon_border solid_icon clearfix just_style4">';
		
	}else if($type == 'style5'){
		$output .= '<div class="icon_boxes_con style1 circle just_icon_border solid_icon radius5 clearfix just_style5">';
		
	}else if($type == 'style6'){
		$output .= '<div class="icon_boxes_con style2 reflection clearfix just_style6">';
		
	}else if($type == 'style7'){
		$output .= '<div class="icon_boxes_con style2 solid_icon clearfix just_style7">';
		
	}else if($type == 'style8'){
		$output .= '<div class="icon_boxes_con style2 icon_left_right clearfix just_style8">';
		
	}else if($type == 'style9'){
		$output .= '<div class="icon_boxes_con style2 icon_box_no_border clearfix just_style9">';
		
	}else if($type == 'style12'){
		$output .= '<div class="icon_boxes_con style2 icon_box_no_border clearfix just_style12 simple">';
		
	}else if($type == 'style10'){
		$output .= '<ul class="tree_features clearfix just_style10">';
		
	}else if($type == 'style11'){
		$output .= '<div class="icon_boxes_con style1 circle just_icon_border solid_icon clearfix just_style11">';
		
	}else{
		$output .= '<div class="icon_boxes_con style2 reflection clearfix just_style11">';
	}
	
	$output .= ($type == 'style10') ? '' : do_shortcode($content); 
	
	$tree_parent = '';
	if ( $tree_image !== '' && $type == 'style10' ){
		
		$tree_parent .= ($animation !== 'no') ? '<div class="centered animated" data-animation="'.esc_attr($animation).'" data-animation-delay="'.esc_attr($enar_hm_icon_box_delay).'">' : '<div class="centered">';
		
		$tree_parent .= '<img class="tree_features_parent" src="'.esc_attr($tree_image).'" alt="">';
		
		$tree_parent .= '</div>';
	}
	
	$output .= ($type == 'style10') ? do_shortcode($content).'</ul>'.$tree_parent : '</div>'; 
	
	$enar_hm_icon_box_delay = 0;
	return $output;
}
add_shortcode('hm_icons', 'idealtheme_icons_sc');

//=====================================================================================> Shortcodes Buttons

$enar_hm_button_num = 1;

function idealtheme_button_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		'type' => 'simple',    // simple - animated1 - animated2 - animated3
		'size' => 'medium',    // large - medium - small
		
	    'title' => '',
		'url' => '',
		'target' => '_self',   // _self - _blank
		
		'bg_color' => '',
		'bg_hover' => '',
		'icon' => '',
		
		'margin_top' => 0,
		'margin_bottom' => 0,
    ), $atts ) );
	
	$output = '';
	$margin_top = intval($margin_top);
	$margin_bottom = intval($margin_bottom);
	$button_size = '';
	global $enar_hm_button_num;
	
	$ligh_button  = ( $bg_color !== '' ) ? ' color1' : '';
	$get_bg_color = ( $bg_color !== '' ) ? 'background-color:'.esc_attr($bg_color).';' : '';
	
	if( $size == 'large' ) {
		$button_size .= 'large_btn';
		
	}else if( $size == 'small' ) {
		$button_size .= 'small_btn';
		
	}else {
		$button_size .= 'medium_btn';
	}

	if( $type == 'simple' ){
		
		$output .= ($icon == '' ) ? '<a class="main_button '.esc_attr($button_size).esc_attr($ligh_button).' ideal_button'.esc_attr($enar_hm_button_num).'" target="'.esc_attr($target).'" href="'.esc_attr($url).'" style="margin-top:'.esc_attr($margin_top).'px;margin-bottom:'.esc_attr($margin_bottom).'px;">'.esc_html($title).'</a>' : '<a class="main_button '.esc_attr($button_size).esc_attr($ligh_button).' ideal_button'.esc_attr($enar_hm_button_num).'" target="'.esc_attr($target).'" href="'.esc_attr($url).'" style="margin-top:'.esc_attr($margin_top).'px;margin-bottom:'.esc_attr($margin_bottom).'px;"><i class="in_left '.esc_attr($icon).'"></i>'.esc_html($title).'</a>';
		
	}else if( $type == 'animated1' ){
		
		$icon = ( $icon !== '' ) ? $icon : 'ico-angle-right';
		
		$output .= '<a class="btn_a '.esc_attr($button_size).esc_attr($ligh_button).' ideal_button'.esc_attr($enar_hm_button_num).'" target="'.esc_attr($target).'" href="'.esc_attr($url).'" style="margin-top:'.esc_attr($margin_top).'px;margin-bottom:'.esc_attr($margin_bottom).'px;">
						<span style="'.esc_attr($get_bg_color).'">
							<i class="in_left '.esc_attr($icon).'"></i>
							<span>'.esc_html($title).'</span>
							<i class="in_right '.esc_attr($icon).'"></i>
						</span>
					</a>';
		
	}else if( $type == 'animated2' ){
		
		$output .= '<a class="btn_b '.esc_attr($button_size).esc_attr($ligh_button).' ideal_button'.esc_attr($enar_hm_button_num).'" href="'.esc_attr($url).'" style="margin-top:'.esc_attr($margin_top).'px;margin-bottom:'.esc_attr($margin_bottom).'px;">
						<span class="hidden_element" data-text="'.esc_attr($title).'">'.esc_html($title).'</span>
					</a>';
		
	}else if( $type == 'animated3' ){
		$icon = ( $icon !== '' ) ? $icon : 'ico-refresh4';
		
		$output .= '<a class="btn_c '.esc_attr($button_size).esc_attr($ligh_button).' ideal_button'.esc_attr($enar_hm_button_num).'" href="'.esc_attr($url).'" style="margin-top:'.esc_attr($margin_top).'px;margin-bottom:'.esc_attr($margin_bottom).'px;">
						<span class="btn_c_ic_a"><i class="'.esc_attr($icon).'"></i></span>
						<span class="btn_c_t">'.esc_html($title).'</span>
						<span class="btn_c_ic_b"><i class="'.esc_attr($icon).'"></i></span>
					</a>';
		
	}
	
	
	if( $bg_color !== '' ) {
		$output .= '<style>';
		$output .= '.ideal_button'.esc_attr($enar_hm_button_num).'{background-color:'.esc_attr($bg_color).' !important;border-color:'.esc_attr($bg_color).' !important;color:#fff;}';
		$output .= ( $bg_hover !== '' ) ? '.ideal_button'.esc_attr($enar_hm_button_num).':hover{background-color:'.esc_attr($bg_hover).' !important;border-color:'.esc_attr($bg_hover).' !important;color:#fff;}' : '';
		
		$output .= ( $type == 'animated3' ) ? '.ideal_button'.esc_attr($enar_hm_button_num).' span.btn_c_ic_a, .ideal_button'.esc_attr($enar_hm_button_num).' span.btn_c_ic_b{border:none}.ideal_button'.esc_attr($enar_hm_button_num).'{box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1) inset;
	-webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1) inset;}' : '';
		
		$output .= '</style>';
		
	}
		
	$enar_hm_button_num += 1;		
	return $output;	
}
add_shortcode('hm_button', 'idealtheme_button_sc');

//=====================================================================================> Shortcodes Google Map

function idealtheme_google_map_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		'latitude' => '0',
		'longitude' => '0',
		'description' => '',
		'bordered' => 'yes', // yes - no
    ), $atts ) );
	
	$output = '';
	$bordered = ( $bordered == 'yes' ) ? ' bordered' : '' ;
	
	$output .= '<div class="bordered_content'.esc_attr($bordered).'">
					<div class="google_map" data-lat="'.esc_attr($latitude).'" data-long="'.esc_attr($longitude).'" data-main="yes" data-text="'.esc_attr($description).'" data-icon="'.get_template_directory_uri() . '/img/map2.png'.'"></div>
				</div>';
	
	wp_enqueue_script( 'enar_idealtheme_maps');
	wp_enqueue_script( 'enar_idealtheme_mapmarker');
			
	return $output;	
}
add_shortcode('hm_google_map', 'idealtheme_google_map_sc');

//=====================================================================================> Shortcodes Tooltip

function idealtheme_tooltip_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		'title' => '',
		'style' => '1',    // 1 - 2 - 3
		
		'effect' => '1',   // 'style' => '1' =====> 1 - 2 - 3 - 4 - 5
		'tol_image' => '', // 'style' => '1'
    ), $atts ) );
	
	$output = '';
	
	$tol_image = idealtheme_fun_get_image_url($tol_image, 'thumbnail');
	
	if ( $style == '1') {
		$output .= '<span class="hm_tooltip'.esc_attr($style).' tooltip-effect1-'.esc_attr($effect).'">
					<span class="hm_tooltip-item1">'.esc_html($title).'</span>
					<span class="hm_tooltip-content1 clearfix">';
			$output .= ( $tol_image !== '' ) ? '<img src="'.esc_url($tol_image).'" alt="'.esc_attr($title).'" />' : '';
			$output .= '<span class="hm_tooltip-text1">'.do_shortcode($content).'</span>
					</span>
				</span>';
				
	}else if ( $style == '2') {
		$output .= '<span class="hm_tooltip'.esc_attr($style).' tooltip-turnright">
					<span class="tooltip-item2">'.esc_html($title).'</span>
					<span class="tooltip-content2">'.do_shortcode($content).'</span>
				</span>';
				
	}else if ( $style == '3') {
		$output .= '<span class="hm_tooltip3">
						<span class="hm_tooltip-item1">'.esc_html($title).'</span>
						<span class="tooltip-content3">'.do_shortcode($content).'</span>
					</span>';
	}
		
	return $output;	
}
add_shortcode('hm_tooltip', 'idealtheme_tooltip_sc');

//=====================================================================================> Shortcodes Blockquote 

function idealtheme_quote_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		'style' => '', // 1 - 2
		'footer' => '',
    ), $atts ) );
	
	$output = '';
	
	if( $style == '1' ) {
		$output .= '<blockquote>
						<span class="quote_text">'.do_shortcode($content).'</span>';
		$output .= ($footer !== '' ) ? '<footer>'.esc_html($footer).'</footer>' : '';
		$output .= '</blockquote>';	
		
	}else if( $style == '2' ) {
		$output .= '<blockquote class="hm_quote2">
						<p>'.do_shortcode($content).'</p>';
			$output .= ($footer !== '' ) ? '<footer>'.esc_html($footer).'</footer>' : '';
		$output .= '</blockquote>';
	}
			
	return $output;	
}
add_shortcode('hm_quote', 'idealtheme_quote_sc');

//=====================================================================================> Shortcodes Pricing Tables 

function idealtheme_plan_row_sc( $atts, $content = null ){
	extract( shortcode_atts( array(   
	    "icon" => "true", // true - false - no_icon
    ), $atts ) );
	
	$output = '';
	global $enar_hm_pricing_type;
	$icon = ( $icon == "true" ) ? 'check_icon ico-check3' : 'wrong_icon ico-cross2';
	
	$output .= '<li>';	
	$output .= ( $icon !== 'no_icon' ) ? '<i class="'.esc_attr($icon).'"></i>' : '';
	$output .= '<span>'.do_shortcode($content).'</span></li>';
	return $output;	
}
add_shortcode('hm_pricing_plan_row', 'idealtheme_plan_row_sc');

function idealtheme_pricing_plan_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		"col" => "3",        // 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 10 - 11 - 12
		"title" => "",
		"price" => "",
		"currency" => "$",
		"time" => "",
		"active" => "no",   // yes - no
		"button_text" => esc_html__( 'Order Now','enar'),
		"button_url" => '',
		"button_target" => '_self', // _self - _blank
    ), $atts ) );
	global $enar_hm_pricing_type;
	
	$output = '';
	$col_col = ($col !== "") ? 'col-md-'.$col : 'col-md-rand';
	
	if( $enar_hm_pricing_type == "1" ) {
	    $active   = ($active == "yes") ? ' active_plan' : '';
		$time_con = ($time !== "") ? '<span class="plan_per">'.esc_html($time).'</span>' : '';
		
		$output .= '<div class="'.esc_attr($col_col).'"><div class="plan_col plan_column1'.esc_attr($active).'">';	
		$output .= '<h6>
						<span class="plan_price_block">
							<span class="plan_price_in">
								<span class="price"><span class="currence">'.esc_html($currency).'</span>'.esc_html($price).'</span>
							</span>
						</span>
						<span class="polygon_con">
							<svg viewBox="0 0 70 70" xml:space="preserve" enable-background="" height="100px" width="100px" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
	<use y="0px" x="5px" xlink:href="#hex" class="polygon_fill" stroke-width="3"/>
	</svg>
						</span>
						<span class="plan_price_name">'.esc_html($title).'</span>
						'.$time_con.'
					</h6>
					<ul>';
		$output .= do_shortcode($content);
		
		$output .= '</ul><a class="plan_price_btn" target="'.esc_attr($button_target).'" href="'.esc_attr($button_url).'"><i class="ico-cart"></i>'.esc_html($button_text).'</a>';
		
		$output .= '</div></div>';
	
	}else if( $enar_hm_pricing_type == "2" || $enar_hm_pricing_type == "3" || $enar_hm_pricing_type == "4" ) {
		
		$active = ($active == "yes") ? 'hm-popular' : '';
		
		$output .= '<li class="'.esc_attr($active).'">
						<header class="hm-pricing-header">
							<h2>'.esc_html($title).'</h2>
		
							<div class="hm-price">
								<span class="hm-currency">'.esc_html($currency).'</span>
								<span class="hm-value">'.esc_html($price).'</span>
								<span class="hm-duration">'.esc_html($time).'</span>
							</div>
						</header>
		
						<div class="hm-pricing-body">
							<ul class="hm-pricing-features">';
		$output .= do_shortcode($content);
		$output .= '</ul></div>
						<footer class="hm-pricing-footer">
							<a class="hm-select" target="'.esc_attr($button_target).'" href="'.esc_attr($button_url).'">'.esc_html($button_text).'</a>
						</footer>
					</li>';
	}
	
	return $output;	
}
add_shortcode('hm_pricing_plan', 'idealtheme_pricing_plan_sc');

$enar_hm_pricing_type = '';
function idealtheme_pricing_table_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		"style" => "1", // 1 - 2 - 3 - 4
    ), $atts ) );
	global $enar_hm_pricing_type;
	$enar_hm_pricing_type = $style;
	
	$output = '';
	
	if( $enar_hm_pricing_type == "1" ) {
		$output .= '<svg id="polygon_svg" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="0px" height="0px" viewBox="0 0 60 69.474" enable-background="new 0 0 60 69.474" xml:space="preserve">
					<defs>
						<g id="hex">
							<path d="M60.083,47.104c0,2.75-1.948,6.125-4.33,7.5L34.33,66.974c-2.382,1.375-6.279,1.375-8.66,0L4.247,54.604
											  c-2.382-1.375-4.33-4.75-4.33-7.5V22.369c0-2.75,1.948-6.125,4.33-7.5L25.67,2.5c2.381-1.375,6.278-1.375,8.659,0l21.422,12.369
											  c2.382,1.375,4.33,4.75,4.33,7.5L60.083,47.104z"></path>
						</g>
					</defs>
				</svg><div class="rows_container clearfix">';	
		$output .= do_shortcode($content);	
		$output .= '</div>';
		
	}else if( $enar_hm_pricing_type == "2" || $enar_hm_pricing_type == "3" || $enar_hm_pricing_type == "4") {
		$pricing_style3 = ( $enar_hm_pricing_type == "3" ) ? ' hm-full-width hm-secondary-theme' : '';
		$pricing_style4 = ( $enar_hm_pricing_type == "4" ) ? ' hm-has-margins' : '';
		
		$output .= '<div class="hm-pricing-container'.esc_attr($pricing_style3).esc_attr($pricing_style4).'">
						<ul class="hm-pricing-list">';
		$output .= do_shortcode($content);	
		$output .= '</ul></div>';
	}
	
	return $output;	
}
add_shortcode('hm_pricing_table', 'idealtheme_pricing_table_sc');

//=====================================================================================> Blog Carousel      

function idealtheme_blog_carousel_sc($atts, $content = null) {
	global $post;
	global $enar_custom_posts_gallery;
	
	extract(shortcode_atts(array(
	   // flip_effect_full - flip_effect_boxed - shadow_effect_full - shadow_effect_boxed - zoom_effect - hoverdir
	   'style' => 'flip_effect_full', 
	   'show_title' => 'show',    // show - hide
	   'show_date' => 'show',     // show - hide
	   'show_cats' => 'show',   // show - hide
	   'show_format' => 'show',   // show - hide
	   
	   'posts_num' => 10,
	   'order_by' => 'date',   // date - ID - author - title - rand - comment_count
	   'order' => 'DESC',      // DESC - ASC
	   
	   'posts_from' => 'from_all',      // from_all - from_cats - from_posts
	   'categories' => '', 
	   'posts' => '',
	    
	   'zoom_btn_text'   => 'Zoom',
	   'more_btn_text'   => 'Explore',
	   
	), $atts));
	
	$blog_carousel_html = $blog_carousel_item_html = $blog_carousel_wrap = $cats_con = $format = $url = $title = $date = '';
	$display_none = '';
	$posts = (is_array($posts)) ? $posts : explode(',', $posts);
	$categories = (is_array($categories)) ? $categories : explode(',', $categories);
	
	if ($posts_from == 'from_posts'){
		query_posts(array(
		  'post_type'      => 'post',
		  'post_status' => 'publish',
		  'posts_per_page' => $posts_num,
		  'orderby'        => $order_by,
		  'order' 	      => $order,
		  'post__in'       => $posts,
		  'post__not_in' => array($post->ID),
		));
		
	}else if($posts_from == 'from_cats'){
		query_posts(array(
		  'post_type'      => 'post',
		  'post_status' => 'publish',
		  'posts_per_page' => $posts_num,
		  'orderby'        => $order_by,
		  'order' 	      => $order,
		  'category__in'   => $categories,
		  'post__not_in' => array($post->ID),
		));
	}else{
		query_posts(array(
		  'post_type'      => 'post',
		  'post_status' => 'publish',
		  'posts_per_page' => $posts_num,
		  'orderby'        => $order_by,
		  'order' 	      => $order,
		  'post__not_in' => array($post->ID),
		));
	}

	if ( $style == "flip_effect_full" || $style == "shadow_effect_full" || $style == "flip_effect_boxed" || $style == "shadow_effect_boxed" ){
		
		$is_it_full = ( $style == "flip_effect_boxed" || $style == "shadow_effect_boxed" ) ? '' : ' full_carousel';
		
		$blog_carousel_wrap = '<div class="featured_slider'.esc_attr($is_it_full).'">%s</div>';
		
		if ( $style == "flip_effect_full" || $style == "flip_effect_boxed" ){
			
			$blog_carousel_item_html  = '
				<div class="featured_slide_block">
					<a href="%1$s" class="featured_slide_img" data-rel="magnific-popup">
						<span class="img_cart_con_h">
							<span class="f_s_i_zoom">
								<i class="ico-circle-plus"></i>
							</span>
							<img src="%2$s" alt="%3$s">
						</span>
						<span class="img_cart_con flip_left">
							<img src="%4$s" alt="%5$s">
						</span>
						<span class="img_cart_con flip_right">
							%6$s
							<img src="%7$s" alt="%8$s">
						</span>
					</a>
					<div class="featured_slide_details%9$s">
						%10$s%11$s%12$s
					</div>
				</div>';
			
		} else {
			
			$blog_carousel_item_html  = '
				<div class="featured_slide_block">
					<a href="%1$s" class="featured_slide_img" data-rel="magnific-popup">
						%2$s
						<span class="img_cart_con_normal">
							<img src="%3$s" alt="%4$s">
						</span>
					</a>
					<div class="featured_slide_details">
						%5$s
						%6$s
						%7$s
						%8$s
					</div>
				</div>';	
		}
		
	}else if ( $style == "zoom_effect" ){
		
		$blog_carousel_wrap = '<div class="related_posts"><div class="related_posts_con">%s</div></div>';
		
		$blog_carousel_item_html  = '
			<div class="related_posts_slide">
				<div class="related_img_con">
					<a href="%1$s" class="related_img">
						<img alt="%2$s" src="%3$s">
						%4$s
					</a>
				</div>
				%5$s%6$s
			</div>'; 
	}else if ( $style == "hoverdir" ){
		
		wp_enqueue_script( 'enar_idealtheme_hoverdir_js');
		wp_enqueue_script( 'enar_idealtheme_modernizr_js');
		
		$blog_carousel_wrap = '<div class="featured_slider full_carousel has_hoverdir">%s</div>';
		
		$blog_carousel_item_html  = '
			<div class="featured_slide_block">
				<a href="%1$s" class="featured_slide_img" data-rel="magnific-popup">
					<span class="img_cart_con_normal">
						<img src="%2$s" alt="%3$s">
					</span>
				</a>
				<div class="hoverdir_con">
					<div class="hoverdir_meta clearfix">
						%4$s
						%5$s
						%6$s
						<a class="expand_img" href="#">'.esc_html($zoom_btn_text).'</a>
						<a class="detail_link" href="%7$s">'.esc_html($more_btn_text).'</a>
					</div>
				</div>
			</div>'; 	
	}
	
	if ( have_posts() ) { while ( have_posts() ) { the_post();
	    
		$all_slides        = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
		$gallery           = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
		$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
		$store_first_id    = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
		
		$thumb_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-carousel');											
		$thumb_first_img_url = $thumb_first_img_url[0];
		
		$large_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-single-image');											
		$large_first_img_url = $large_first_img_url[0];
		
		$carousel_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-carousel');											
		$carousel_first_img_url = $carousel_first_img_url[0];
		
		$thumb_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-carousel');
		$thumb_img 	= $thumb_img['0'];
		
		$larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
		$larg_img 	= $larg_img['0'];
		
		$carousel_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-carousel');
		$carousel_img 	= $carousel_img['0'];
		
		$format_icon = esc_attr(idealtheme_get_format_icon($post->ID));
		$url    = get_permalink($post->ID);
		$title  = (isset($post->post_title))? apply_filters('the_title', $post->post_title):'';
		
		$h_month = get_the_date('M', $post->ID);
		$day     = get_the_date('d', $post->ID);
		$date    = get_the_date('m/d/Y', $post->ID);
		
		$title_con = '';
		$date_con = '';
		$format_con = '';
		
		if ( has_post_thumbnail() || ( $gallery !== '' && $format == 'gallery') ) {
            $last_large = '';
			$last_thumb = '';
			
			if( has_post_thumbnail() ){
				$last_large = $larg_img;
				$last_thumb = $thumb_img;	
			}else{
				$last_large = $large_first_img_url;
				$last_thumb = $thumb_first_img_url;
				$carousel_img = $carousel_first_img_url;
			}
			
			if ( $style == "flip_effect_full" || $style == "flip_effect_boxed" ){
				
				$title_con  = ( $show_title == 'show' ) ? '<a href="'.esc_url($url).'" class="f_s_d_link">'.esc_html($title).'</a>' : '';
				$format_con = ( $show_format == 'show' ) ? '<span class="f_s_i_format"><i class="'.esc_attr($format_icon).'"></i></span>' : '';
				$date_con   = ( $show_date == 'show' ) ? '<span class="f_s_i_date">
							<span class="day">'.esc_html($day).'</span>
							<span class="mounth">'.esc_html($h_month).'</span>
						</span>' : '';
				
				$display_none        = ( $title_con == '' && $date_con == '' ) ? ' hm_disable_elm' : '';
				$cats_con   = ( $show_cats == 'show' ) ? '<span class="hm_flip_cats">'.idealtheme_get_cats_html( 'category', false ).'</span>' : '';
				
				$blog_carousel_html .= sprintf($blog_carousel_item_html, $last_large, $last_thumb, $title, $last_thumb, $title, $format_con, $last_thumb, $title, $display_none, $title_con, $date_con, $cats_con);
				
			}else if ( $style == "shadow_effect_full" || $style == "shadow_effect_boxed" ){
				
				$title_con  = ( $show_title == 'show' ) ? '<a href="'.esc_url($url).'" class="f_s_d_link">'.esc_html($title).'</a>' : '';
				$format_con = ( $show_format == 'show' ) ? '<span class="f_s_i_format"><i class="'.esc_attr($format_icon).'"></i></span>' : '';
				$date_con   = ( $show_date == 'show' ) ? '<span class="f_s_i_date">
							<span class="day">'.esc_html($day).'</span>
							<span class="mounth">'.esc_html($h_month).'</span>
						</span>' : '';
						
				$display_none        = ( $title_con == '' && $date_con == '' ) ? ' hm_disable_elm' : '';
				$cats_con   = ( $show_cats == 'show' ) ? '<span class="hm_flip_cats">'.idealtheme_get_cats_html( 'category', false ).'</span>' : '';
				
				$blog_carousel_html .= sprintf($blog_carousel_item_html, $last_large, $format_con, $last_thumb, $title, $display_none, $title_con, $date_con, $cats_con);
				
			}else if ( $style == "zoom_effect" ){
				
				$title_con  = ( $show_title == 'show' ) ? '<a class="related_title" href="'.esc_url($url).'">'.esc_html($title).'</a>' : '';
				$format_con = ( $show_format == 'show' ) ? '<span><i class="'.esc_attr($format_icon).'"></i></span>' : '';
				$cats_con   = ( $show_cats == 'show' ) ? '<span class="hm_cats_cont">'.idealtheme_get_cats_html( 'category', false ).' / </span>' : '';
				$date_con   = ( $show_date == 'show' || $show_cats == 'show' ) ? '<span class="post_date">'.$cats_con.esc_html($date).'</span>' : '';
				
				$blog_carousel_html .= sprintf($blog_carousel_item_html, $url, $title, $carousel_img, $format_con, $title_con, $date_con);
				
			}else if ( $style == "hoverdir" ){
				
				$title_con  = ( $show_title == 'show' ) ? '<h6 class="proj_name">'.esc_html($title).'</h6>' : '';
				$date_con   = ( $show_date == 'show' ) ? '<span class="proj_date">'.esc_html($date).'</span>' : '';
				$cats_con   = ( $show_cats == 'show' ) ? '<span class="proj_cats_con">'.idealtheme_get_cats_html( 'category', true ).'</span>' : '';
				
				$blog_carousel_html .= sprintf($blog_carousel_item_html, $last_large, $last_thumb, $title, $title_con, $cats_con, $date_con, $url);
				
			}
		}
			
	}}
	wp_reset_query();
	
	return sprintf($blog_carousel_wrap, $blog_carousel_html);

}
add_shortcode("hm_blog_carousel", "idealtheme_blog_carousel_sc");  

//=====================================================================================> Portfolio Carousel      

function idealtheme_portfolio_carousel_sc($atts, $content = null) {
	global $post;
	global $enar_custom_portfolio_metabox;
	
	extract(shortcode_atts(array(
	   // flip_effect_full - flip_effect_boxed - shadow_effect_full - shadow_effect_boxed - zoom_effect - hoverdir
	   'style' => 'flip_effect_full', 
	   'show_title' => 'show',    // show - hide
	   'show_date' => 'show',     // show - hide
	   'show_cats' => 'show',   // show - hide
	   
	   'posts_num' => 10,
	   'order_by' => 'date',   // date - ID - author - title - rand - comment_count
	   'order' => 'DESC',      // DESC - ASC
	   
	   'posts_from' => 'from_all',      // from_all - from_cats - from_posts
	   'categories' => '', 
	   'posts' => '',
	   
	   'zoom_btn_text'   => 'Zoom',
	   'more_btn_text'   => 'Explore',
	    
	), $atts));
	
	$blog_carousel_html = $blog_carousel_item_html = $blog_carousel_wrap = $cats_con = $url = $title = $date = '';
	$display_none = '';
	
	$posts = (is_array($posts)) ? $posts : explode(',', $posts);
	$categories = (is_array($categories)) ? $categories : explode(',', $categories);
	
	if ($posts_from == 'from_posts'){
		query_posts(array(
			'post_type'      => 'portfolio',
			'post_status' => 'publish',
			'posts_per_page' => $posts_num,
			'orderby'        => $order_by,
			'order' 	      => $order,
			'post__in'       => $posts,
			'post__not_in' => array($post->ID),
		));
		
	}else if($posts_from == 'from_cats'){
		query_posts(array(
			'post_type'      => 'portfolio',
			'post_status' => 'publish',
			'posts_per_page' => $posts_num,
			'orderby'        => $order_by,
			'order' 	      => $order,
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio_category',
					'field'    => 'id',
					'terms'    => $categories,
				),
			),
			'post__not_in' => array($post->ID),
		));
	}else{
		query_posts(array(
			'post_type'      => 'portfolio',
			'post_status' => 'publish',
			'posts_per_page' => $posts_num,
			'orderby'        => $order_by,
			'order' 	      => $order,
			'post__not_in' => array($post->ID),
		));
	}

	if ( $style == "flip_effect_full" || $style == "shadow_effect_full" || $style == "flip_effect_boxed" || $style == "shadow_effect_boxed" ){
		
		$is_it_full = ( $style == "flip_effect_boxed" || $style == "shadow_effect_boxed" ) ? '' : ' full_carousel';
		
		$blog_carousel_wrap = '<div class="featured_slider'.esc_attr($is_it_full).'">%s</div>';
		
		if ( $style == "flip_effect_full" || $style == "flip_effect_boxed" ){
			
			$blog_carousel_item_html  = '
				<div class="featured_slide_block">
					<a href="%1$s" class="featured_slide_img" data-rel="magnific-popup">
						<span class="img_cart_con_h">
							<span class="f_s_i_zoom">
								<i class="ico-circle-plus"></i>
							</span>
							<img src="%2$s" alt="%3$s">
						</span>
						<span class="img_cart_con flip_left">
							<img src="%4$s" alt="%5$s">
						</span>
						<span class="img_cart_con flip_right">
							%6$s
							<img src="%7$s" alt="%8$s">
						</span>
					</a>
					<div class="featured_slide_details%9$s">
						%10$s%11$s
					</div>
				</div>';
			
		} else {
			
			$blog_carousel_item_html  = '
				<div class="featured_slide_block">
					<a href="%1$s" class="featured_slide_img" data-rel="magnific-popup">
						%2$s
						<span class="img_cart_con_normal">
							<img src="%3$s" alt="%4$s">
						</span>
					</a>
					<div class="featured_slide_details">
						%5$s
						%6$s
					</div>
				</div>';	
		}
		
	}else if ( $style == "zoom_effect" ){
		
		$blog_carousel_wrap = '<div class="related_posts"><div class="related_posts_con">%s</div></div>';
		
		$blog_carousel_item_html  = '
			<div class="related_posts_slide">
				<div class="related_img_con">
					<a href="%1$s" class="related_img">
						<img alt="%2$s" src="%3$s">
						%4$s
					</a>
				</div>
				%5$s%6$s
			</div>'; 
	}else if ( $style == "hoverdir" ){
		
		wp_enqueue_script( 'enar_idealtheme_hoverdir_js');
		wp_enqueue_script( 'enar_idealtheme_modernizr_js');
		
		$blog_carousel_wrap = '<div class="featured_slider full_carousel has_hoverdir">%s</div>';
		
		$blog_carousel_item_html  = '
			<div class="featured_slide_block">
				<a href="%1$s" class="featured_slide_img" data-rel="magnific-popup">
					<span class="img_cart_con_normal">
						<img src="%2$s" alt="%3$s">
					</span>
				</a>
				<div class="hoverdir_con">
					<div class="hoverdir_meta clearfix">
						%4$s
						%5$s
						%6$s
						<a class="expand_img" href="#">'.esc_html($zoom_btn_text).'</a>
						<a class="detail_link" href="%7$s">'.esc_html($more_btn_text).'</a>
					</div>
				</div>
			</div>'; 	
	}
	
	if ( have_posts() ) { while ( have_posts() ) { the_post();
	    
		$all_slides        = get_post_meta($post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true);
		$gallery           = isset($all_slides['portfolio_gallery']) ? $all_slides['portfolio_gallery'] : '';
		$porto_type        = isset($all_slides['content_type']) ? $all_slides['content_type'] : '';
		
		$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
		$store_first_id    = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
		
		$thumb_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-carousel');											
		$thumb_first_img_url = $thumb_first_img_url[0];
		
		$large_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-single-image');											
		$large_first_img_url = $large_first_img_url[0];
		
		$carousel_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-carousel');											
		$carousel_first_img_url = $carousel_first_img_url[0];
		
		$thumb_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-carousel');
		$thumb_img 	= $thumb_img['0'];
		
		$larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
		$larg_img 	= $larg_img['0'];
		
		$carousel_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-carousel');
		$carousel_img 	= $carousel_img['0'];
		
		$format_icon = '';
		$url    = get_permalink($post->ID);
		$title  = (isset($post->post_title))? apply_filters('the_title', $post->post_title):'';
		
		$h_month = get_the_date('M', $post->ID);
		$day     = get_the_date('d', $post->ID);
		$date    = get_the_date('m/d/Y', $post->ID);
		
		$title_con = '';
		$date_con = '';
		$format_con = '';
		
		if ( has_post_thumbnail() || ( $gallery !== '' && $porto_type == 'gallery') ) {
            $last_large = '';
			$last_thumb = '';
			
			if( has_post_thumbnail() ){
				$last_large = $larg_img;
				$last_thumb = $thumb_img;	
			}else{
				$last_large = $large_first_img_url;
				$last_thumb = $thumb_first_img_url;
				$carousel_img = $carousel_first_img_url;
			}
			
			
			if ( $style == "flip_effect_full" || $style == "flip_effect_boxed" ){
				
				$title_con  = ( $show_title == 'show' ) ? '<a href="'.esc_url($url).'" class="f_s_d_link">'.esc_html($title).'</a>' : '';
				$format_con = '';
				$date_con   = ( $show_date == 'show' ) ? '<span class="f_s_i_date">
							<span class="day">'.esc_html($day).'</span>
							<span class="mounth">'.esc_html($h_month).'</span>
						</span>' : '';
				$display_none        = ( $title_con == '' && $date_con == '' ) ? ' hm_disable_elm' : '';
						
				$blog_carousel_html .= sprintf($blog_carousel_item_html, $last_large, $last_thumb, $title, $last_thumb, $title, $format_con, $last_thumb, $title, $display_none, $title_con, $date_con);
				
			}else if ( $style == "shadow_effect_full" || $style == "shadow_effect_boxed" ){
				
				$title_con  = ( $show_title == 'show' ) ? '<a href="'.esc_url($url).'" class="f_s_d_link">'.esc_html($title).'</a>' : '';
				$format_con = '';
				$date_con   = ( $show_date == 'show' ) ? '<span class="f_s_i_date">
							<span class="day">'.esc_html($day).'</span>
							<span class="mounth">'.esc_html($h_month).'</span>
						</span>' : '';
				$display_none        = ( $title_con == '' && $date_con == '' ) ? ' hm_disable_elm' : '';
				
				$blog_carousel_html .= sprintf($blog_carousel_item_html, $last_large, $format_con, $last_thumb, $title, $display_none, $title_con, $date_con);
				
			}else if ( $style == "zoom_effect" ){
				
				$title_con  = ( $show_title == 'show' ) ? '<a class="related_title" href="'.esc_url($url).'">'.esc_html($title).'</a>' : '';
				$format_con = '<span><i class="ico-link2"></i></span>';
				
				$cats_con   = ( $show_cats == 'show' ) ? '<span class="hm_cats_cont">'.idealtheme_get_cats_html( 'portfolio_category', false ).' <span class="hm_slash">/</span> </span>' : '';
				$date_html = ( $show_date == 'show' ) ? esc_html($date) : '';
				$date_con   = ( $show_date == 'show' || $show_cats == 'show' ) ? '<span class="post_date">'.$cats_con.$date_html.'</span>' : '';
				
				$blog_carousel_html .= sprintf($blog_carousel_item_html, $url, $title, $carousel_img, $format_con, $title_con, $date_con);
				
			}else if ( $style == "hoverdir" ){
				
				$title_con  = ( $show_title == 'show' ) ? '<h6 class="proj_name">'.esc_html($title).'</h6>' : '';
				$date_con   = ( $show_date == 'show' ) ? '<span class="proj_date">'.esc_html($date).'</span>' : '';
				$cats_con   = ( $show_cats == 'show' ) ? '<span class="proj_cats_con">'.idealtheme_get_cats_html( 'portfolio_category', true ).'</span>' : '';
				
				$blog_carousel_html .= sprintf($blog_carousel_item_html, $last_large, $last_thumb, $title, $title_con, $date_con, $cats_con, $url);
				
			}
		}
			
	}}
	wp_reset_query();
	
	return sprintf($blog_carousel_wrap, $blog_carousel_html);

}
add_shortcode("hm_portfolio_carousel", "idealtheme_portfolio_carousel_sc");

//=====================================================================================> Portfolio Filter
function idealtheme_portfolio_filter_sc($atts, $content = null) {
	global $post;
	global $enar_custom_portfolio_metabox;
	
	extract(shortcode_atts(array(
	    'style'           => 'simple',             // simple - bootmanim - hoverdir
		'buttons_style'   => 'text_but',           // text_but - icon_but
		'filter_layout'   => 'grid_porto',         // grid_porto - masonry_porto
		'filter_column'   => 'three_blocks',       // two_blocks - three_blocks - four_blocks - five_portos
		'filter_spaces'   => 'has_sapce_portos',   // has_sapce_portos - no_sapce_portos
		'filter_width'    => 'boxed_portos',       // boxed_portos - full_portos
		'items_counter'   => 'nav_with_nums',      // nav_with_nums - nav_no_nums
		
		'zoom_btn_text'   => 'Zoom',
		'more_btn_text'   => 'Explore',
		'ajax_btn_text'   => 'Expand',
		'all_btn_text'    => 'All',
		
		'sort_srtby_text'    => 'Sort By',
		'sort_names_text'    => 'Names',
		'sort_dates_text'    => 'Dates',
		'sort_likes_text'    => 'Likes',
		'sort_comnt_text'    => 'Comments',
		
		'cats' 	     => '',
		'posts_num'    => -1,
		
		'orderby' 	  => 'date',                  // date - ID - author - title - rand - comment_count
		'sortby' 	   => 'ASC',                   // DESC - ASC
		
		'cat_orderby'  => 'count',                 // count - name - ID - slug - term_group
		'cat_sortby'   => 'DESC',                  // DESC - ASC
		
		'hide_empty'   => 0,
		
		'show_ajax_expand'  => 'hide',             // show - hide
		'show_sortby'       => 'show',
		'show_all_button'   => 'show',
		'show_filters'      => 'show',
		
		'show_date'         => 'hide',
		'show_cats'         => 'show',
		'show_comments'     => 'show',
		'show_like'         => 'show',
	), $atts));
		
		$show_ajax_expand = 'hide';
		$show_like = 'hide';
		$no_margin = ( $show_filters == 'hide' && $show_sortby == 'hide' ) ? ' no_margin' : '';
		$sort_html   = $portfolio_html = $description = $sort_html = '';
		
		$cats_coma   = $cats;
		$cats_clases = str_replace(',', ' ', $cats);
		$cats        = (is_array($cats)) ? $cats : explode(',', $cats);
		
		$posts_num   = intval($posts_num);
        $get_all_ids = array();

		foreach ($cats as $k => $v) {
			$theCatId = get_term_by( 'slug', $v, 'portfolio_category' );					
			$get_all_ids[] = isset($theCatId->term_id) ? $theCatId->term_id : '';
		}
		
		wp_enqueue_script( 'enar_idealtheme_isotope_js');

		$all_button_con = array(
			'class_name' => 'selected',
			'slug' => '*',
			'name' => $all_btn_text,
		);
		
		$get_all_button_con = (object) $all_button_con;
		
		if($show_all_button !== 'hide' ){
			$categories 	= array_merge(array($get_all_button_con), get_terms('portfolio_category', array(
				'orderby'    => $cat_orderby, 
				'order'    => $cat_sortby, 
				'hide_empty' => $hide_empty,
				'include'    => $get_all_ids,
				'show_post_count' => 0,
			)));
		}else{
			$categories 	= get_terms('portfolio_category', array(
				'orderby'    => $cat_orderby, 
				'order'    => $cat_sortby, 
				'hide_empty' => $hide_empty,
				'include'    => $get_all_ids,
				'show_post_count' => 0,
			));
		}
        
		$porto_args = array(
			'post_type' 	      => 'portfolio',
			'post_status' => 'publish',
			'portfolio_category' => $cats_coma,
			'posts_per_page'     => $posts_num,
			'orderby'		    => $orderby,
			'order'			  => $sortby,
		);
		$porto_query  = new WP_Query( $porto_args );
		$count_posts  = $porto_query->found_posts;
		
		//------------> Sort Options
		
		$sort_dates_text_con = ( $show_date == 'show' ) ? '<li><a data-option-value="number" href="#" class=""><span class="text">'.esc_html($sort_dates_text).'</span></a></li>' : '';
		
		$sort_like_text_con = ( $show_like == 'show' ) ? '<li><a data-option-value="like_counter" href="#" class=""><span class="text">'.esc_html($sort_likes_text).'</span></a></li>' : '';
		
		$sort_comnt_text_con = ( $show_comments == 'show' ) ? '<li><a data-option-value="comm_counter" href="#" class=""><span class="text">'.esc_html($sort_comnt_text).'</span></a></li>' : '';
		
		$sort_by_con = ( $show_sortby == 'show' ) ? '
				<div class="sort_list">
					<a href="#" class="sort_selecter">
						<span class="text">'.esc_html($sort_srtby_text).'</span>
						<span class="arrow"><i class="ico-arrow-back"></i></span>
					</a>
					<ul data-option-key="sortBy" class="option-set clearfix" id="sort-by">
						<li><a data-option-value="name" href="#" class=""><span class="text">'.esc_html($sort_names_text).'</span></a></li>
						'.$sort_dates_text_con.$sort_like_text_con.$sort_comnt_text_con.'
						
					</ul>
			    </div>
			    <ul data-option-key="sortAscending" class="option-set clearfix" id="sort-direction">
					<li><a class="selected" data-option-value="true" href="#">
						<span><i class="ico-keyboard-arrow-up"></i></span></a>
					</li>
					<li><a data-option-value="false" href="#" class="">
						<span><i class="ico-keyboard-arrow-down"></i></span></a>
					</li>
			    </ul>' : '';		
				
		$set_filter_list  = '<li><a data-option-value="%s" class="%s" href="#"><span>%s</span><span class="num"></span></a></li>';
		
		//-------------------> Style
		$style_is = '';
		if( $style == 'hoverdir' ) {
			wp_enqueue_script( 'enar_idealtheme_hoverdir_js');
			wp_enqueue_script( 'enar_idealtheme_modernizr_js');
			$style_is = ' porto_full_desc';
			
		}else if( $style == 'bootmanim' ) {
			$style_is = ' porto_hidden_title';
			
		}else {
			$style_is = ' porto_simple_title';
		}
		
		$store_load_more = ( $posts_num < $count_posts && $posts_num > 0 ) ? '<div class="centered over_hidden">
				<a href="#" target="_self" class="btn_a medium_btn ajax_more_projects" data-post_type="portfolio" data-cat_name="'.esc_attr($cats_clases).'" data-offset="'.esc_attr($posts_num).'" data-loaded_num="3" data-all-posts="'.esc_attr($count_posts).'" data-orderby="'.esc_attr($orderby).'" data-sortby="'.esc_attr($sortby).'" data-show_date="'.esc_attr($show_date).'" data-show_cats="'.esc_attr($show_cats).'" data-show_comments="'.esc_attr($show_comments).'" data-show_like="'.esc_attr($show_like).'" data-buttons_style="'.esc_attr($buttons_style).'" data-show_ajax_expand="'.esc_attr($show_ajax_expand).'" data-zoom_btn_text="'.esc_attr($zoom_btn_text).'" data-more_btn_text="'.esc_attr($more_btn_text).'" data-ajax_btn_text="'.esc_attr($ajax_btn_text).'" data-style="'.esc_attr($style).'" data-layout="'.esc_attr($filter_layout).'">
					<span><i class="in_left ico-refresh4"></i><span>Load More Projects</span><i class="in_right ico-refresh4"></i></span>
				</a>
			</div>' : '';
		
		$set_filter_container  = '
		<div class="hm_filter_wrapper project_text_nav '.esc_attr($filter_layout).' '.esc_attr($filter_width).' '.esc_attr($filter_column).' '.esc_attr($filter_spaces).' '.esc_attr($items_counter).' '.esc_attr($style_is).'">
			<div id="options" class="sort_options clearfix">
			    <ul data-option-key="filter" class="option-set clearfix" id="filter-by">%s</ul>'.$sort_by_con.'
			</div>
			<div class="hm_filter_wrapper_con'.esc_attr($no_margin).'">%s</div>'.$store_load_more.'<div class="porto_store"></div>
			
			<div style="opacity:0;" class="hm_ajax_loader_con">
                <div class="hm_ajax_loader">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>
		</div>';
        
		$is_title_alone = '';
		if ( $show_date == 'hide' && $show_comments == 'hide' && $show_like == 'hide' ){
			$is_title_alone = ' hide_comm_like_date';
		}
		$portfolio_item  = '
						<div class="filter_item_block %s %s">
							<div class="porto_block">
								<div class="porto_type">
									%s
									%s
								</div>
								<div class="porto_desc">
									%s
									<div class="porto_meta'.esc_attr($is_title_alone).' clearfix">
									    %s
										%s
										<span class="porto_nums">
											%s
											%s
										</span>
										%s
									</div>
								</div>
							</div>
						</div>';
		
		if($show_filters !== 'hide'){
			foreach($categories as $cat){
				$filter		= (isset($cat->slug) && $cat->slug !== '*' ) ? '.cat'.esc_attr($cat->term_id) : '*';
				
				$class		= (isset($cat->class_name))? esc_attr($cat->class_name) : '';
				$title		= (isset($cat->name))? $cat->name : '';
				$sort_html	.= sprintf($set_filter_list, $filter, $class, $title);
			}
		}
        
		if($porto_query->have_posts()){
			while($porto_query->have_posts()){ $porto_query->the_post();
				
				$porto_column_width     = get_post_meta($post->ID, 'idealtheme_project_size_type', true);
				$porto_column_width_is  = '';
				$porto_item_img_size = 'enar-portfolio-small';
				
				if( $porto_column_width == 'w1x1'){
					$porto_column_width_is  = '';
					$porto_item_img_size    = 'enar-portfolio-small';
					
				}else if( $porto_column_width == 'w2x2' && $filter_layout == 'masonry_porto' ){
					$porto_column_width_is  = 'width2';
					$porto_item_img_size    = 'enar-portfolio-large';
					
				}else if( $porto_column_width == 'w1x2' && $filter_layout == 'masonry_porto' ){
					$porto_column_width_is  = '';
					$porto_item_img_size    = 'enar-portfolio-rect2';
					
				}else if( $porto_column_width == 'w2x1' && $filter_layout == 'masonry_porto' ){
					$porto_column_width_is  = 'width2';
					$porto_item_img_size    = 'enar-portfolio-rect1';
				}
				
			    $all_slides = get_post_meta($post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true);
			    $gallery    = isset($all_slides['portfolio_gallery']) ? $all_slides['portfolio_gallery'] : '';
				$portfolio_type = isset($all_slides['content_type']) ? $all_slides['content_type'] : '';
				
				if(has_post_thumbnail() || ($gallery !== '' && $portfolio_type == 'gallery')){
					
					$tl 	  = wp_get_object_terms( $post->ID, 'portfolio_category' );
					$filters = $thumb = $zoom_href = $url_rel = $url = $title = $description = '';
	                $filters = esc_attr($filters);
					$date    = get_the_date('m/d/Y', $post->ID);
					$solid_date    = get_the_date('Ymd', $post->ID);
					$comment_counter = get_comments_number( $post->ID );
					
					foreach($tl as $term){
						$filters .= ' cat'.$term->term_id;
					}
					
					$thumb 		= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $porto_item_img_size );
					$thumb 		= $thumb['0'];
					
					$zoom_href 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
					$zoom_href 	= $zoom_href['0'];				
					
					$permalink   = get_permalink($post->ID);
					$title = (isset($post->post_title))? apply_filters('the_title', $post->post_title):'';
					
					$btn_nav = '';
					$hoverdir_nav = '';
					$btn_nav_url_con = '';
					$hover_dir_url_con = '';
					
					//-----------> Feature Image
					$porto_feature_con = '';
					
					if ( $portfolio_type == 'gallery' ){
						
						$porto_feature_con .= '<div class="porto_galla">';
						
						if ( has_post_thumbnail() ) {
							$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($zoom_href).'"><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'"></a>';
						}
						if ($gallery !== ''){
							foreach($gallery as $gall) {							
								$imgid   = isset($gall['imgid']) ? $gall['imgid'] : '';
								$img_src = isset($gall['img_src']) ? $gall['img_src'] : '';	
																		
								if ($imgid == '') { $imgid = $gall; }											
								$gall_wide_img  = wp_get_attachment_image_src($imgid, 'enar-blog-single-image');											
								$gall_wide_img  = $gall_wide_img[0];
								
								$gall_thumb_img = wp_get_attachment_image_src($imgid, $porto_item_img_size);											
								$gall_thumb_img = $gall_thumb_img[0];
								
								$img_caption = isset($gall['img_caption']) ? $gall['img_caption'] : '';
								$url         = isset($gall['url']) ? $gall['url'] : '';
								$target      = isset($gall['target']) ? 'target="'.esc_attr($gall['target']).'"' : '_self';	
								
								if($url !== ''){ 
								
									$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($url).'" target="'.esc_attr($gall['target']).'">';
									
									if ($img_caption !== '') { 
										$porto_feature_con .= '<span class="post_gall_desc">'.esc_html($img_caption).'</span>'; 
									}
									
									$porto_feature_con .= '<img src="'.esc_url($gall_thumb_img).'" alt="'.esc_attr($title).'"></a>';
									
								} else { 
								  
									$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($gall_wide_img).'"><img src="'.esc_url($gall_thumb_img).'" alt="'.esc_attr($title).'"></a>';
									
								} 
							} 
						}
						$porto_feature_con .= '</div>';
						
					} else {
						
						$porto_feature_con = '<a data-rel="magnific-popup" href="'.esc_url($zoom_href).'"><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'"></a>';
						
					}
					//-----------> Show Date
					
					$is_cats_show = ( $show_cats == 'show' ) ? '<span class="proj_cats_con">'.idealtheme_get_cats_html( 'portfolio_category', true ).'</span>' : '';
					
					$is_date_show = ( $show_date == 'show') ? '<span class="porto_date"><span class="number">'.esc_html($solid_date).'</span>'.esc_html($date).'</span>' : '';
					
					$is_comm_show = ( $show_comments == 'show') ? '<span class="comm"><i class="ico-comments"></i><span class="comm_counter">'.esc_html($comment_counter).'</span></span>' : '';
					
					$is_date_show = $is_cats_show.$is_date_show;
					
					/*$is_already_voted = (hasAlreadyVoted($post->ID)) ? ' voted' : '';
					
					$is_like_show = ( $show_like == 'show') ? '<span class="like hm_like_post'.esc_attr($is_already_voted).'" data-post_id="'.esc_attr($post->ID).'"><i class="ico-heart2"></i><span class="like_counter">'.esc_html(getPostLikeLink($post->ID)).'</span></span>' : '';*/
					
					//$is_like_show = ( $show_like == 'show') ? getPostLikeLink($post->ID) : '';
					$is_like_show = '';
					
					if ( $buttons_style == 'text_but' ){
						
						$hoverdir_nav = '';
						$hover_dir_url_con = '';
						
						$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="detail_link ajax_expand_porto">'.$ajax_btn_text.'</a>' : '';
						
						$btn_nav = '<div class="porto_nav">
										<a href="#" class="expand_img">'.$zoom_btn_text.'</a>
										<a href="'.esc_url($permalink).'" class="detail_link">'.$more_btn_text.'</a>
										'.$ajax_expand_con.'
									</div>';
										
						$btn_nav_url_con = '<a href="'.esc_url($permalink).'"><h6 class="name">'.esc_html($title).'</h6></a>';
									
					} else if ( $buttons_style == 'icon_but' ){
						
						$hoverdir_nav = '';
						$hover_dir_url_con = '';
						
						$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="icon_expand"><span><i class="ico-open"></i></span></a>' : '';
						
						$btn_nav = '<div class="porto_nav">
										<a href="#" class="icon_expand"><span><i class="ico-maximize"></i></span></a>
										<a href="'.esc_url($permalink).'" class="icon_expand"><span><i class="ico-link2"></i></span></a>
										'.$ajax_expand_con.'
									</div>';
									
						$btn_nav_url_con = '<a href="'.esc_url($permalink).'"><h6 class="name">'.esc_html($title).'</h6></a>';	
									
					} 
					
					if ( $style == 'hoverdir' ){
						
						$btn_nav = '';
						$btn_nav_url_con = '';
						
						if ( $buttons_style == 'text_but' ){
							$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="detail_link ajax_expand_porto">'.$ajax_btn_text.'</a>' : '';
							$hoverdir_nav = '<a href="#" class="expand_img">'.$zoom_btn_text.'</a>
										 <a href="'.esc_url($permalink).'" class="detail_link">'.$more_btn_text.'</a>
										 '.$ajax_expand_con.'';
										 
						}else{
							$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="icon_expand"><span><i class="ico-open"></i></span></a>' : '';
							$hoverdir_nav = '<a href="#" class="icon_expand"><span><i class="ico-maximize"></i></span></a>
										<a href="'.esc_url($permalink).'" class="icon_expand"><span><i class="ico-link2"></i></span></a>
										'.$ajax_expand_con.'';
							
						}
							
						
						$hover_dir_url_con = '<a href="'.esc_url($permalink).'"><h6 class="name">'.esc_html($title).'</h6></a>';
									
					}
					
					$portfolio_html .= sprintf($portfolio_item, $porto_column_width_is, $filters, $porto_feature_con, $btn_nav, $btn_nav_url_con, $hover_dir_url_con, $is_date_show, $is_comm_show, $is_like_show, $hoverdir_nav);
					
				}
			}
		}
		wp_reset_query();
		
		return sprintf($set_filter_container, $sort_html, $portfolio_html);	

}
add_shortcode("hm_portfolio_filter", "idealtheme_portfolio_filter_sc");

//=====================================================================================> Blog Filter
function idealtheme_blog_filter_sc($atts, $content = null) {
	global $post;
	global $enar_custom_posts_gallery;
	global $enar_custom_posts_audio;
	global $enar_custom_posts_video;
	
	extract(shortcode_atts(array(
	    'style'           => 'simple',             // simple - bootmanim - hoverdir
		'buttons_style'   => 'text_but',           // text_but - icon_but
		'filter_layout'   => 'grid_porto',         // grid_porto - masonry_porto
		'filter_column'   => 'three_blocks',       // two_blocks - three_blocks - four_blocks - five_portos
		'filter_spaces'   => 'has_sapce_portos',   // has_sapce_portos - no_sapce_portos
		'filter_width'    => 'boxed_portos',       // boxed_portos - full_portos
		'items_counter'   => 'nav_with_nums',      // nav_with_nums - nav_no_nums
		
		'zoom_btn_text'   => 'Zoom',
		'more_btn_text'   => 'Explore',
		'ajax_btn_text'   => 'Expand',
		'all_btn_text'    => 'All',
		
		'sort_srtby_text'    => 'Sort By',
		'sort_names_text'    => 'Names',
		'sort_dates_text'    => 'Dates',
		'sort_likes_text'    => 'Likes',
		'sort_comnt_text'    => 'Comments',
		
		'cats' 	     => '',
		'posts_num'    => -1,
		
		'orderby' 	  => 'date',                  // date - ID - author - title - rand - comment_count
		'sortby' 	   => 'ASC',                   // DESC - ASC
		
		'cat_orderby'  => 'count',                 // count - name - ID - slug - term_group
		'cat_sortby'   => 'DESC',                  // DESC - ASC
		
		'hide_empty'   => 1,
		
		'show_ajax_expand'  => 'hide',             // show - hide
		'show_sortby'       => 'show',
		'show_all_button'   => 'show',
		'show_filters'      => 'show',
		
		'show_date'         => 'hide',
		'show_cats'         => 'show',
		'show_comments'     => 'show',
		'show_like'         => 'show',
	), $atts));
		
		$show_ajax_expand = 'hide';
		$show_like = 'hide';
		$no_margin = ( $show_filters == 'hide' && $show_sortby == 'hide' ) ? ' no_margin' : '';
		$sort_html   = $portfolio_html = $description = $sort_html = '';
		
		$cats_coma   = $cats;
		$cats_clases = str_replace(',', ' ', $cats);
		$cats        = (is_array($cats)) ? $cats : explode(',', $cats);
		
		$posts_num   = intval($posts_num);
        $get_all_ids = array();

		foreach ($cats as $k => $v) {
			$theCatId = get_term_by( 'slug', $v, 'category' );					
			$get_all_ids[] = isset($theCatId->term_id) ? $theCatId->term_id : '';
		}
		
		wp_enqueue_script( 'enar_idealtheme_isotope_js');

		$all_button_con = array(
			'class_name' => 'selected',
			'slug' => '*',
			'name' => $all_btn_text,
		);
		
		$get_all_button_con = (object) $all_button_con;
		
		if($show_all_button !== 'hide' ){
			$categories 	= array_merge(array($get_all_button_con), get_terms('category', array(
				'orderby'    => $cat_orderby, 
				'order'    => $cat_sortby, 
				'hide_empty' => $hide_empty,
				'include'    => $get_all_ids,
				'show_post_count' => 0,
			)));
		}else{
			$categories 	= get_terms('category', array(
				'orderby'    => $cat_orderby, 
				'order'    => $cat_sortby, 
				'hide_empty' => $hide_empty,
				'include'    => $get_all_ids,
				'show_post_count' => 0,
			));
		}
        
		$porto_args = array(
			'post_type' 	      => 'post',
			'post_status' => 'publish',
			'category' => $cats_coma,
			'posts_per_page'     => $posts_num,
			'orderby'		    => $orderby,
			'order'			  => $sortby,
		);
		$porto_query  = new WP_Query( $porto_args );
		$count_posts  = $porto_query->found_posts;
		
		//------------> Sort Options
		
		$sort_dates_text_con = ( $show_date == 'show' ) ? '<li><a data-option-value="number" href="#" class=""><span class="text">'.esc_html($sort_dates_text).'</span></a></li>' : '';
		
		$sort_like_text_con = ( $show_like == 'show' ) ? '<li><a data-option-value="like_counter" href="#" class=""><span class="text">'.esc_html($sort_likes_text).'</span></a></li>' : '';
		
		$sort_comnt_text_con = ( $show_comments == 'show' ) ? '<li><a data-option-value="comm_counter" href="#" class=""><span class="text">'.esc_html($sort_comnt_text).'</span></a></li>' : '';
		
		$sort_by_con = ( $show_sortby == 'show' ) ? '
				<div class="sort_list">
					<a href="#" class="sort_selecter">
						<span class="text">'.esc_html($sort_srtby_text).'</span>
						<span class="arrow"><i class="ico-arrow-back"></i></span>
					</a>
					<ul data-option-key="sortBy" class="option-set clearfix" id="sort-by">
						<li><a data-option-value="name" href="#" class=""><span class="text">'.esc_html($sort_names_text).'</span></a></li>
						'.$sort_dates_text_con.$sort_like_text_con.$sort_comnt_text_con.'
						
					</ul>
			    </div>
			    <ul data-option-key="sortAscending" class="option-set clearfix" id="sort-direction">
					<li><a class="selected" data-option-value="true" href="#">
						<span><i class="ico-keyboard-arrow-up"></i></span></a>
					</li>
					<li><a data-option-value="false" href="#" class="">
						<span><i class="ico-keyboard-arrow-down"></i></span></a>
					</li>
			    </ul>' : '';		
				
		$set_filter_list  = '<li><a data-option-value="%s" class="%s" href="#"><span>%s</span><span class="num"></span></a></li>';
		
		//-------------------> Style
		$style_is = '';
		if( $style == 'hoverdir' ) {
			$style_is = ' porto_full_desc';
			
		}else if( $style == 'bootmanim' ) {
			$style_is = ' porto_hidden_title';
			
		}else {
			$style_is = ' porto_simple_title';
		}
		
		$store_load_more = ( $posts_num < $count_posts && $posts_num > 0 ) ? '<div class="centered over_hidden">
				<a href="#" target="_self" class="btn_a medium_btn ajax_more_projects" data-post_type="post" data-cat_name="'.esc_attr($cats_clases).'" data-offset="'.esc_attr($posts_num).'" data-loaded_num="3" data-all-posts="'.esc_attr($count_posts).'" data-orderby="'.esc_attr($orderby).'" data-sortby="'.esc_attr($sortby).'" data-show_date="'.esc_attr($show_date).'" data-show_cats="'.esc_attr($show_cats).'" data-show_comments="'.esc_attr($show_comments).'" data-show_like="'.esc_attr($show_like).'" data-buttons_style="'.esc_attr($buttons_style).'" data-show_ajax_expand="'.esc_attr($show_ajax_expand).'" data-zoom_btn_text="'.esc_attr($zoom_btn_text).'" data-more_btn_text="'.esc_attr($more_btn_text).'" data-ajax_btn_text="'.esc_attr($ajax_btn_text).'" data-style="'.esc_attr($style).'" data-layout="'.esc_attr($filter_layout).'">
					<span><i class="in_left ico-refresh4"></i><span>Load More Projects</span><i class="in_right ico-refresh4"></i></span>
				</a>
			</div>' : '';
		
		$set_filter_container  = '
		<div class="hm_filter_wrapper project_text_nav '.esc_attr($filter_layout).' '.esc_attr($filter_width).' '.esc_attr($filter_column).' '.esc_attr($filter_spaces).' '.esc_attr($items_counter).' '.esc_attr($style_is).'">
			<div id="options" class="sort_options clearfix">
			    <ul data-option-key="filter" class="option-set clearfix" id="filter-by">%s</ul>'.$sort_by_con.'
			</div>
			<div class="hm_filter_wrapper_con'.esc_attr($no_margin).'">%s</div>'.$store_load_more.'<div class="porto_store"></div>
			
			<div style="opacity:0;" class="hm_ajax_loader_con">
                <div class="hm_ajax_loader">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>
		</div>';
        
		$is_title_alone = '';
		if ( $show_date == 'hide' && $show_comments == 'hide' && $show_like == 'hide' ){
			$is_title_alone = ' hide_comm_like_date';
		}
		$portfolio_item  = '
						<div class="filter_item_block %s %s">
							<div class="porto_block">
								<div class="porto_type">
									%s
									%s
								</div>
								<div class="porto_desc">
									%s
									<div class="porto_meta'.esc_attr($is_title_alone).' clearfix">
									    %s
										%s
										<span class="porto_nums">
											%s
											%s
										</span>
										%s
									</div>
								</div>
							</div>
						</div>';
		
		if($show_filters !== 'hide'){
			foreach($categories as $cat){
				$filter		= (isset($cat->slug) && $cat->slug !== '*' ) ? '.cat'.esc_attr($cat->term_id) : '*';

				$class		= (isset($cat->class_name))? esc_attr($cat->class_name) : '';
				$title		= (isset($cat->name))? $cat->name : '';
				$sort_html	.= sprintf($set_filter_list, $filter, $class, $title);
			}
		}
        
		if($porto_query->have_posts()){
			while($porto_query->have_posts()){ $porto_query->the_post();
			    
				$porto_column_width     = get_post_meta($post->ID, 'idealtheme_project_size_type', true);
				$porto_column_width_is  = '';
				$porto_item_img_size = 'enar-portfolio-small';
				
				if( $porto_column_width == 'w1x1'){
					$porto_column_width_is  = '';
					$porto_item_img_size    = 'enar-portfolio-small';
					
				}else if( $porto_column_width == 'w2x2' && $filter_layout == 'masonry_porto' ){
					$porto_column_width_is  = 'width2';
					$porto_item_img_size    = 'enar-portfolio-large';
					
				}else if( $porto_column_width == 'w1x2' && $filter_layout == 'masonry_porto' ){
					$porto_column_width_is  = '';
					$porto_item_img_size    = 'enar-portfolio-rect2';
					
				}else if( $porto_column_width == 'w2x1' && $filter_layout == 'masonry_porto' ){
					$porto_column_width_is  = 'width2';
					$porto_item_img_size    = 'enar-portfolio-rect1';
				}
				
			    $all_slides  = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
			    $gallery     = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
				$post_format = get_post_format( $post->ID ); 
				
				if( has_post_thumbnail() || ( $gallery !== '' && $post_format == 'gallery' )){
					
					$tl 	  = wp_get_object_terms( $post->ID, 'category' );
					$filters = $thumb = $zoom_href = $url_rel = $url = $title = $description = '';
					$date    = get_the_date('m/d/Y', $post->ID);
					$solid_date    = get_the_date('Ymd', $post->ID);
					$comment_counter = get_comments_number( $post->ID );
					
					foreach($tl as $term){
						$filters .= ' cat'.$term->term_id;
					}
					
					$thumb 		= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $porto_item_img_size );
					$thumb 		= $thumb['0'];
					
					$zoom_href 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
					$zoom_href 	= $zoom_href['0'];				
					
					$permalink   = get_permalink($post->ID);
					$title = (isset($post->post_title))? apply_filters('the_title', $post->post_title):'';
					
					$btn_nav = '';
					$hoverdir_nav = '';
					$btn_nav_url_con = '';
					$hover_dir_url_con = '';
					
					//-----------> Feature Image
					$porto_feature_con = '';
					
					if ( $post_format == 'gallery' ){
						
						$porto_feature_con .= '<div class="porto_galla">';
						
						if ( has_post_thumbnail() ) {
							$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($zoom_href).'"><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'"></a>';
						}
						if ($gallery !== ''){
							foreach($gallery as $gall) {							
								$imgid   = isset($gall['imgid']) ? $gall['imgid'] : '';
								$img_src = isset($gall['img_src']) ? $gall['img_src'] : '';	
																		
								if ($imgid == '') { $imgid = $gall; }											
								$gall_wide_img  = wp_get_attachment_image_src($imgid, 'enar-blog-single-image');											
								$gall_wide_img  = $gall_wide_img[0];
								
								$gall_thumb_img = wp_get_attachment_image_src($imgid, $porto_item_img_size);											
								$gall_thumb_img = $gall_thumb_img[0];
								
								$img_caption = isset($gall['img_caption']) ? $gall['img_caption'] : '';
								$url         = isset($gall['url']) ? $gall['url'] : '';
								$target      = isset($gall['target']) ? 'target="'.esc_attr($gall['target']).'"' : '_self';	
								
								if($url !== ''){ 
								
									$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($url).'" target="'.esc_attr($gall['target']).'">';
									
									if ($img_caption !== '') { 
										$porto_feature_con .= '<span class="post_gall_desc">'.esc_html($img_caption).'</span>'; 
									}
									
									$porto_feature_con .= '<img src="'.esc_url($gall_thumb_img).'" alt="'.esc_attr($title).'"></a>';
									
								} else { 
								  
									$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($gall_wide_img).'"><img src="'.esc_url($gall_thumb_img).'" alt="'.esc_attr($title).'"></a>';
									
								} 
							} 
						}
						$porto_feature_con .= '</div>';
						
					} else {
						
						$porto_feature_con = '<a data-rel="magnific-popup" href="'.esc_url($zoom_href).'"><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'"></a>';
						
					}
					//-----------> Show Date
					
					$is_cats_show = ( $show_cats == 'show' ) ? '<span class="proj_cats_con">'.idealtheme_get_cats_html( 'category', true ).'</span>' : '';

					$is_date_show = ( $show_date == 'show') ? '<span class="porto_date"><span class="number">'.esc_html($solid_date).'</span>'.esc_html($date).'</span>' : '';
					
					$is_comm_show = ( $show_comments == 'show') ? '<span class="comm"><i class="ico-comments"></i><span class="comm_counter">'.esc_html($comment_counter).'</span></span>' : '';
					
					$is_date_show = $is_cats_show.$is_date_show;
					
					//$is_like_show = ( $show_like == 'show') ? getPostLikeLink($post->ID) : '';
					$is_like_show = '';
					
					if ( $buttons_style == 'text_but' ){
						
						$hoverdir_nav = '';
						$hover_dir_url_con = '';
						
						$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="detail_link ajax_expand_porto">'.$ajax_btn_text.'</a>' : '';
						
						$btn_nav = '<div class="porto_nav">
										<a href="#" class="expand_img">'.$zoom_btn_text.'</a>
										<a href="'.esc_url($permalink).'" class="detail_link">'.$more_btn_text.'</a>
										'.$ajax_expand_con.'
									</div>';
										
						$btn_nav_url_con = '<a href="'.esc_url($permalink).'"><h6 class="name">'.esc_html($title).'</h6></a>';
									
					} else if ( $buttons_style == 'icon_but' ){
						
						$hoverdir_nav = '';
						$hover_dir_url_con = '';
						
						$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="icon_expand"><span><i class="ico-open"></i></span></a>' : '';
						
						$btn_nav = '<div class="porto_nav">
										<a href="#" class="icon_expand"><span><i class="ico-maximize"></i></span></a>
										<a href="'.esc_url($permalink).'" class="icon_expand"><span><i class="ico-link2"></i></span></a>
										'.$ajax_expand_con.'
									</div>';
									
						$btn_nav_url_con = '<a href="'.esc_url($permalink).'"><h6 class="name">'.esc_html($title).'</h6></a>';	
									
					} 
					
					if ( $style == 'hoverdir' ){
						
						$btn_nav = '';
						$btn_nav_url_con = '';
						
						if ( $buttons_style == 'text_but' ){
							$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="detail_link ajax_expand_porto">'.$ajax_btn_text.'</a>' : '';
							$hoverdir_nav = '<a href="#" class="expand_img">'.$zoom_btn_text.'</a>
										 <a href="'.esc_url($permalink).'" class="detail_link">'.$more_btn_text.'</a>
										 '.$ajax_expand_con.'';
										 
						}else{
							$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="icon_expand"><span><i class="ico-open"></i></span></a>' : '';
							$hoverdir_nav = '<a href="#" class="icon_expand"><span><i class="ico-maximize"></i></span></a>
										<a href="'.esc_url($permalink).'" class="icon_expand"><span><i class="ico-link2"></i></span></a>
										'.$ajax_expand_con.'';
							
						}
							
						
						$hover_dir_url_con = '<a href="'.esc_url($permalink).'"><h6 class="name">'.esc_html($title).'</h6></a>';
									
					}
					
					$portfolio_html .= sprintf($portfolio_item, $porto_column_width_is, $filters, $porto_feature_con, $btn_nav, $btn_nav_url_con, $hover_dir_url_con, $is_date_show, $is_comm_show, $is_like_show, $hoverdir_nav);
					
				}
			}
		}
		wp_reset_query();
		
		return sprintf($set_filter_container, $sort_html, $portfolio_html);	

}
add_shortcode("hm_blog_filter", "idealtheme_blog_filter_sc");

//=====================================================================================> Project Media 

function idealtheme_project_media_sc( $atts, $content = null ){
	global $post;
	global $enar_custom_portfolio_metabox;
	
	extract( shortcode_atts( array(   
	    "id" => "",
		"title" => "",
		"description" => "",
		"arrow_style" => "",
		"animation"  => "",
		"slide_speed"  => "",
		"duration_timeout"  => "",
		"hover"  => "",
		"navigation" => "",
		"pagination" => "",
		"thumbs" => "",
    ), $atts ) );
	
	$output = '';
    $gall_thumb_con = '';
	
	$porto_all_meta  = get_post_meta($post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true);
    $porto_gallery   = isset($porto_all_meta['portfolio_gallery']) ? $porto_all_meta['portfolio_gallery'] : '';
	$porto_type      = isset($porto_all_meta['content_type']) ? $porto_all_meta['content_type'] : '';
	
	$video_iframe      = isset($porto_all_meta['video_embedded']) ? $porto_all_meta['video_embedded'] : '';
	$audio_iframe      = isset($porto_all_meta['audio_embedded']) ? $porto_all_meta['audio_embedded'] : '';
	
	$feature_img_large 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
	$feature_img_thumb 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
	
	$feature_img_large 	= $feature_img_large['0'];
	$feature_img_thumb 	= $feature_img_thumb['0'];
	
	$feature_img_title    = get_the_title();
				
	if ( $porto_type == 'gallery' ){
		if ($porto_gallery !== ''){
			$output .= '<div class="thumbs_gall_slider_con content_thumbs_gall gall_full_width gall_arrow2 clearfix">
						<div class="thumbs_gall_slider_larg owl-carousel" data-animation="slide" data-speed="900" data-duration="4000" data-hover_stop="true" data-navigation="true" data-pagination="true" data-height="false">';
			
			if ( has_post_thumbnail( $post->ID ) ) {

				$output .= '<div class="item">';
				$output .= '<a href="'.esc_url($feature_img_large).'" class="feature_inner_ling">
								<img src="'.esc_url($feature_img_large).'" alt="'.esc_attr($feature_img_title).'">
							</a>
							</div>';
							
				$gall_thumb_con .= '<div class="item"><img src="'.esc_url($feature_img_thumb).'" alt="'.esc_attr($feature_img_title).'"></div>';
			}
			foreach($porto_gallery as $gall) {
	
				$imgid     = isset($gall['imgid']) ? $gall['imgid'] : '';											
				$larg_img  = wp_get_attachment_image_src($imgid, 'enar-blog-single-image');	
				$thumb_img = wp_get_attachment_image_src($imgid, 'thumbnail');										
				$larg_img  = $larg_img[0];
				$thumb_img = $thumb_img[0];
				
				$img_title   = isset($gall['title']) ? $gall['title'] : '';		
				$img_caption = isset($gall['img_caption']) ? $gall['img_caption'] : '';	
				
				//----------->
				$title_con   = ($img_title !== '' ) ? '<span class="gall_desc_t">'.esc_html($img_title).'</span>' : '';
				$caption_con = ($img_caption !== '' ) ? '<span class="gall_desc_d">'.esc_html($img_caption).'</span>' : '';
				
				$output .= '<div class="item">';
				$output .= ($img_title !== '' || $img_caption !== '') ? '<div class="gall_desc">'.$title_con.$caption_con.'</div>' : '';
				$output .= '<a href="'.esc_url($larg_img).'" class="feature_inner_ling">
								<img src="'.esc_url($larg_img).'" alt="'.esc_attr($img_title).'">
							</a>
							</div>';
							
				$gall_thumb_con .= '<div class="item"><img src="'.esc_url($thumb_img).'" alt="'.esc_attr($img_title).'"></div>';
				
			}
			$output .= '</div>';
			$output .= '<div class="gall_thumbs owl-carousel">';
			$output .= $gall_thumb_con;
			$output .= '</div>';
			$output .= '</div>';
		}
		
	}else if ( $porto_type == 'image' ){
		
		if ( has_post_thumbnail( $post->ID ) ) {
			
			$output .= '<a href="'.esc_url($feature_img_large).'" class="magnific-popup img_popup">
							<img src="'.esc_url($feature_img_large).'" alt="'.esc_attr($feature_img_title).'">
							<span>
								<i class="ico-maximize"></i>
							</span>
						</a>';
		}
	}else if ( $porto_type == 'video' ){
		
		$output .= ( $video_iframe !== '') ?'<div class="bordered_content bordered">
						<div class="embed-container">'.$video_iframe.'</div>
					</div>' : '';
					
	}else if ( $porto_type == 'audio' ){
		
		$output .= ( $audio_iframe !== '') ? '<div class="bordered_content bordered">
						<div class="embed-container">'.$audio_iframe.'</div>
					</div>' : '';
					
	}
	return $output;	
}
add_shortcode('hm_project_media', 'idealtheme_project_media_sc');

//=====================================================================================> Social Media Sharing

function idealtheme_social_share_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
		'title' => '',
		'facebook' => 'show',
		'twitter' => 'show',
		'googleplus' => 'show',
		'pinterest' => 'show',
		'linkedin' => 'show',
		'email' => 'show',
		'stumbleupon' => 'show',
		'digg' => 'show',
		'reddit' => 'show',
		'delicious' => 'show',
		'tumblr' => 'show',
		
    ), $atts ) );
	
	$output = '';
	$output .= '<div id="share_on_socials">';
	$output .= '<span class="social_share_btn">Share :</span>';
	
	$output .= ($facebook == 'show') ? '<a class="facebook" href="http://www.facebook.com/sharer.php?s=100&amp;p[url]='.esc_attr(urlencode(get_permalink())).'&amp;p[title]='.esc_attr(urlencode(get_the_title())).'&amp;p[summary]='.esc_attr(urlencode(wp_html_excerpt(get_the_content(), 160))).'&amp;p[images[0]='.esc_attr(urlencode(idealtheme_fun_get_post_img('large'))).'" target="_blank"><i class="ico-facebook4"></i></a>' : '';

	$output .= ($twitter == 'show') ? '<a class="twitter" href="http://twitter.com/home?status='. esc_attr(urlencode(get_the_title())).'+'. esc_attr(urlencode(get_permalink())).'" target="_blank"><i class="ico-twitter4"></i></a>' : '';

	$output .= ($googleplus == 'show') ? '<a class="googleplus" href="https://plus.google.com/share?url='. esc_attr(urlencode(get_permalink())).'" target="_blank"><i class="ico-google-plus"></i></a>' : '';

	$output .= ($pinterest == 'show') ? '<a class="pinterest" href="http://pinterest.com/pin/create/bookmarklet/?media='.esc_attr( esc_url( idealtheme_fun_get_post_img('large')).'&amp;url='.esc_attr(urlencode(get_permalink())).'&amp;is_video=false&amp;description='. esc_attr(urlencode(get_the_title())) ).'" target="_blank"><i class="ico-pinterest-p"></i></a>' : '';

	$output .= ($linkedin == 'show') ? '<a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. esc_attr(urlencode(get_permalink())).'&amp;title='. esc_attr(urlencode(get_the_title())).'&amp;source='.esc_attr(esc_url(home_url())).'" target="_blank"><i class="ico-linkedin3"></i></a>' : '';

	$output .= ($email == 'show') ? '<a class="email" href="mailto:mail@mail.com?subject='.esc_attr(urlencode(get_the_title())).'&amp;body='.esc_attr(urlencode(get_permalink())).'"><i class="ico-envelope-o"></i></a>' : '';

	$output .= ($stumbleupon == 'show') ? '<a class="stumbleupon" href="http://www.stumbleupon.com/submit?url='.esc_attr(urlencode(get_permalink())).'&amp;title='.esc_attr(urlencode(get_the_title())).'" target="_blank"><i class="ico-stumbleupon3"></i></a>' : '';

	$output .= ($digg == 'show') ? '<a class="digg" href="http://www.digg.com/submit?phase=2&amp;url='.esc_attr(urlencode(get_permalink())).'&amp;title='. esc_attr(urlencode(get_the_title())).'" target="_blank"><i class="ico-digg"></i></a>' : '';

	$output .= ($reddit == 'show') ? '<a class="reddit" href="http://www.reddit.com/submit?url='. esc_attr(urlencode(get_permalink())).'&amp;title='. esc_attr(urlencode(get_the_title())).'" target="_blank"><i class="ico-reddit"></i></a>' : '';

	$output .= ($delicious == 'show') ? '<a class="delicious" href="http://del.icio.us/post?url='. esc_attr(urlencode(get_permalink())).'&amp;title='. esc_attr(urlencode(get_the_title())).'&amp;notes='.esc_attr(urlencode(get_the_excerpt())).'" target="_blank"><i class="ico-delicious"></i></a>' : '';

	$output .= ($tumblr == 'show') ? '<a class="tumblr" href="http://www.tumblr.com/share?v=3&amp;u='. esc_attr(urlencode(get_permalink())).'&amp;t='. esc_attr(urlencode(get_the_title())).'" target="_blank"><i class="ico-tumblr"></i></a>' : '';
	
	$output .= '</div>';
		
	return $output;	
}
add_shortcode('hm_social_share', 'idealtheme_social_share_sc');

//=====================================================================================> Social Media Links

function idealtheme_social_links_sc( $atts, $content = null ){
	extract( shortcode_atts( array(
	    'style' => 'default_socials',       // default_socials - circle_socials
		'color_mode' => 'simple_socials',   // simple_socials - colored_socials
		'title' => '',
		
		'facebook' => '',
		'twitter' => '',
		'googleplus' => '',
		'linkedin' => '',
		'vimeo' => '',
		'skype' => '',
		'rss' => '',
		'flickr' => '',
		'picasa' => '',
		'tumblr' => '',
		'dribble' => '',
		'soundcloud' => '',
		'instagram' => '',
		'pinterest' => '',
		'youtube' => '',
    ), $atts ) );
	
	$output = '';
	$output .= '<div class="social_links_widget '.esc_attr($style).' '.esc_attr($color_mode).' clearfix">';
	$output .= ( $title !== '' ) ? '<span class="social_share_btn">'.esc_attr($title).'</span>' : '';
	$output .= ($facebook !== '') ? '<a href="'.esc_url($facebook).'" target="_blank" class="facebook"><i class="ico-facebook4"></i></a>' : ''; 
	$output .= ($twitter !== '') ? '<a href="'.esc_url($twitter).'" target="_blank" class="twitter"><i class="ico-twitter4"></i></a>' : '';
	$output .= ($googleplus !== '') ? '<a href="'.esc_url($googleplus).'" target="_blank" class="googleplus"><i class="ico-google-plus"></i></a>' : '';
	$output .= ($linkedin !== '') ? '<a href="'.esc_url($linkedin).'" target="_blank" class="linkedin"><i class="ico-linkedin3"></i></a>' : '';
	$output .= ($vimeo !== '') ? '<a href="'.esc_url($vimeo).'" target="_blank" class="vimeo"><i class="ico-vimeo"></i></a>' : '';
	$output .= ($skype !== '') ? '<a href="skype:'.esc_url($skype).'?call" class="skype"><i class="ico-skype2"></i></a>' : '';
	$output .= ($rss !== '') ? '<a href="'.esc_url($rss).'" target="_blank" class="rss"><i class="ico-rss"></i></a>' : '';
	$output .= ($flickr !== '') ? '<a href="'.esc_url($flickr).'" target="_blank" class="flickr"><i class="ico-flickr2"></i></a>' : '';
	$output .= ($picasa !== '') ? '<a href="'.esc_url($picasa).'" target="_blank" class="picasa"><i class="ico-picassa"></i></a>' : '';
	$output .= ($tumblr !== '') ? '<a href="'.esc_url($tumblr).'" target="_blank" class="tumblr"><i class="ico-tumblr"></i></a>' : '';
	$output .= ($dribble !== '') ? '<a href="'.esc_url($dribble).'" target="_blank" class="dribble"><i class="ico-dribbble"></i></a>' : '';
	$output .= ($soundcloud !== '') ? '<a href="'.esc_url($soundcloud).'" target="_blank" class="soundcloud"><i class="ico-soundcloud"></i></a>' : '';
	$output .= ($instagram !== '') ? '<a href="'.esc_url($instagram).'" target="_blank" class="instagram"><i class="ico-instagram3"></i></a>' : '';
	$output .= ($pinterest !== '') ? '<a href="'.esc_url($pinterest).'" target="_blank" class="pinterest"><i class="ico-pinterest-p"></i></a>' : '';
	$output .= ($youtube !== '') ? '<a href="'.esc_url($youtube).'" target="_blank" class="youtube"><i class="ico-youtube3"></i></a>' : '';
	$output .= '</div>';
		
	return $output;	
}
add_shortcode('hm_social_links', 'idealtheme_social_links_sc');

//=====================================================================================> Shortcodes for List Icon
$enar_idealtheme_lists_type = '';
function idealtheme_lists_row_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'title' => '',
	  'url' => '',
    ), $atts ) );
	
	global $enar_idealtheme_lists_type;
	$output = '';
	
	$bold_text = ( $title !== '' ) ? '<b>'.esc_html($title).'</b>' : '';
	$content_text = ( $url !== '' ) ? '<a href="'.esc_url($url).'">'.esc_html(do_shortcode($content)).'</a>' : esc_html(do_shortcode($content));
	$check_arrow = ( $enar_idealtheme_lists_type == 'check_arrows' ) ? '<i class="ico-check4"></i>' : '';
	
	$output .= '<li>'.$check_arrow.$bold_text.$content_text.'</li>';
	return $output;
}
add_shortcode('hm_lists_row', 'idealtheme_lists_row_sc');

function idealtheme_lists_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'style'  => 'check_arrows', // check_arrows - red_rounded_arrows - gray_rounded_arrows - blue_square_arrows - no_arrow
    ), $atts ) );
	
	global $enar_idealtheme_lists_type;
	$enar_idealtheme_lists_type = $style;
	$output = '';
	
	      if ( $style == 'check_arrows' ){        $output .= '<ul class="list4 clearfix">';
		  
	}else if ( $style == 'red_rounded_arrows' ){  $output .= '<ul class="list3 clearfix">';
		
	}else if ( $style == 'gray_rounded_arrows' ){ $output .= '<ul class="list1 black clearfix">';
		
	}else if ( $style == 'blue_square_arrows' ){  $output .= '<ul class="list1 clearfix">';
		
	}else if ( $style == 'no_arrow' ){            $output .= '<ul class="list4 clearfix">';
		
	}
	
	$output .= do_shortcode($content);
	$output .= '</ul>';
	$enar_idealtheme_lists_type = '';
	
	return $output;	
}
add_shortcode('hm_lists', 'idealtheme_lists_sc');

//=====================================================================================> Content Text

function idealtheme_hm_text_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'blank'  => '',
    ), $atts ) );
	
	$output = '';
	$output .= '<p class="hm_text_sc">';
	$output .= do_shortcode($content);
	$output .= '</p>';
	
	return $output;	
}
add_shortcode('hm_text', 'idealtheme_hm_text_sc');

//=====================================================================================> Features Slider

$enar_feature_icon_slide_count = 1;
$enar_hm_feature_image     = '';

function idealtheme_hm_feature_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'title'  => '',
	  //'content'  => '',
	  'icon'  => '',
    ), $atts ) );
	
	$output = '';
	global $enar_feature_icon_slide_count;
	global $enar_hm_feature_image;
	
	$image_id = idealtheme_fun_get_image_id_from_img_url($enar_hm_feature_image);
	
	$thumb_image_url = wp_get_attachment_image_src($image_id, 'large');											
	$thumb_image_url = $thumb_image_url[0];
	
	$large_image_url = wp_get_attachment_image_src($image_id, 'enar-blog-single-image');											
	$large_image_url = $large_image_url[0];
		
	$hm_feature_image_con = ( $enar_hm_feature_image !== '' ) ? '<div class="col-md-4">
			    <div class="feature_icon_img">
				<div class="item">
				    <div class="f_s_block circle">
					<a href="'.esc_url($large_image_url).'" class="magnific-popup img_popup">
					    <span><i class="ico-maximize"></i></span>
					    <img src="'.esc_url($thumb_image_url).'" alt="'.esc_attr($title).'">
					</a>
				    </div>
				</div>
			    </div>
			</div>' : '';
			
	$item_con = '<div class="item">
				    <h5>
						<span class="icon"><span><i class="'.esc_attr($icon).'"></i></span></span>
						<span class="title">'.esc_html($title).'</span>
				    </h5>
				    <span>'.do_shortcode($content).'</span>
				</div>';
				
	//==============> Output	
	
	$columns_width = ( $hm_feature_image_con !== '' ) ? 'col-md-4' : 'col-md-6';
	$on_right_icon = ( $enar_feature_icon_slide_count == 1 ) ? ' on_right' : '';
	
	$output .= ( $enar_feature_icon_slide_count == 1 ) ? '<div class="feature_icon_slide">' : '';
	
		$output .= ( $enar_feature_icon_slide_count == 1 || $enar_feature_icon_slide_count == 4 ) ? '<div class="'.esc_attr($columns_width).'"><div class="feature_icon'.esc_attr($on_right_icon).'">' : '';
																$output .= $item_con;
																													
		$output .= ( $enar_feature_icon_slide_count == 3 || $enar_feature_icon_slide_count == 6 ) ? '</div></div>' : '';
		$output .= ( $enar_feature_icon_slide_count == 3 ) ? $hm_feature_image_con : '';
	
	$output .= ( $enar_feature_icon_slide_count == 6 ) ? '</div>' : '';
	
	//==============> Output
	
	$enar_feature_icon_slide_count = ( $enar_feature_icon_slide_count == 6 ) ? 0 : $enar_feature_icon_slide_count;
	$enar_feature_icon_slide_count += 1;
	return $output;	
}
add_shortcode('hm_feature', 'idealtheme_hm_feature_sc');

function idealtheme_hm_features_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'image'  => '', // portfolio-img
    ), $atts ) );
	
	$output = '';
	global $enar_feature_icon_slide_count;
	global $enar_hm_feature_image;
	
	$image = idealtheme_fun_get_image_url($image, 'large');
	
	$enar_hm_feature_image = $image;
		
	$output .= '<div class="feature_icon_slider">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	$enar_feature_icon_slide_count = 0;
	$enar_hm_feature_image = '';
	return $output;	
}
add_shortcode('hm_features', 'idealtheme_hm_features_sc');

//=====================================================================================> News Bar

function idealtheme_hm_news_sc( $atts, $content = null ){
	global $post;
	
	extract( shortcode_atts( array(
		'title'  => 'News',
		'show_icon'  => 'show', // show - hide
		'show_title'  => 'show', // show - hide
		
		'posts_num' => 10,
		'order_by' => 'date',   // date - ID - author - title - rand - comment_count
		'order' => 'DESC',      // DESC - ASC
		
		'posts_from' => 'from_all',      // from_all - from_cats - from_posts
		'categories' => '', 
		'posts' => '',
    ), $atts ) );
	
	$output = '';
	
	$posts = (is_array($posts)) ? $posts : explode(',', $posts);
	$categories = (is_array($categories)) ? $categories : explode(',', $categories);
	
	if ($posts_from == 'from_posts'){
		query_posts(array(
		  'post_type'      => 'post',
		  'post_status' => 'publish',
		  'posts_per_page' => $posts_num,
		  'orderby'        => $order_by,
		  'order' 	      => $order,
		  'post__in'       => $posts,
		  'post__not_in' => array($post->ID),
		));
		
	}else if($posts_from == 'from_cats'){
		query_posts(array(
		  'post_type'      => 'post',
		  'post_status' => 'publish',
		  'posts_per_page' => $posts_num,
		  'orderby'        => $order_by,
		  'order' 	      => $order,
		  'category__in'   => $categories,
		  'post__not_in' => array($post->ID),
		));
	}else{
		query_posts(array(
		  'post_type'      => 'post',
		  'post_status' => 'publish',
		  'posts_per_page' => $posts_num,
		  'orderby'        => $order_by,
		  'order' 	      => $order,
		  'post__not_in' => array($post->ID),
		));
	}
	
	$icon_container  = ( $show_icon == 'show' ) ? '<i class="ico-streetsign"></i>' : '';
	$title_container = ( $show_title == 'show' ) ? '<div class="hm_new_title_con"><h4>'.$icon_container.'<span>'.esc_html($title).'</span></h4></div>' : '';
	$is_title_enable = ( $show_title == 'show' ) ? ' newbar_has_title' : '';
	$is_icon_enable = ( $show_icon == 'show' ) ? ' newbar_has_icon' : '';
	
	$output .= '<div class="content_section hm_new_con'.esc_attr($is_title_enable).esc_attr($is_icon_enable).'">
		<div class="content clearfix">
			'.$title_container.'
			<div class="hm_new_bar">
				<div class="hm_new_bar_slider">';
		
		if ( have_posts() ) { 
			while ( have_posts() ) { 
				the_post();	
				
				$output .= '<div class="news_item">
								<i class="ico-angle-right"></i>
								<a href="'.get_the_permalink().'"><span>'.get_the_title().'</span></a>
							</div>';
			}
		}
		wp_reset_query();
		
	$output .= '</div>
				<div class="hm_new_bar_controll">
					<a class="hm_new_bar_controll_btn play" href="#">
						<i class="pause_news ico-pause2"></i>
						<i class="play_news ico-playback-play"></i>
					</a>
				</div>
			</div>
		</div>
	</div>';
	
	
	return $output;	
}
add_shortcode('hm_news', 'idealtheme_hm_news_sc');

//=====================================================================================> Contact Details
function idealtheme_hm_details_row_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'title' => '',
    ), $atts ) );
	
	$output = '';
	
	$output .= '<span class="c_detail">
					<span class="c_name">'.esc_html($title).'</span>
					<span class="c_desc">'.esc_html(do_shortcode($content)).'</span>
				</span>';
	
	return $output;
}
add_shortcode('hm_details_row', 'idealtheme_hm_details_row_sc');

function idealtheme_hm_details_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'title' => '',
	  'icon' => '',
	  'color' => '',
    ), $atts ) );
	
	$output = '';
	
	$icon_style = ( !empty($color) ) ? 'style="background-color:'.esc_attr($color).'"' : '';
	$icon_con   = ( !empty($icon) ) ? '<span class="icon" '.esc_attr($icon_style).'><i class="'.esc_attr($icon).'"></i></span>' : '';
	
	$output .= '<div class="contact_details_row clearfix">';
		$output .= $icon_con;
		$output .= '<div class="c_con">';
		    $output .= ( !empty($title) ) ? '<span class="c_title">'.esc_html($title).'</span>' : ''; 
			$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div>';
	
	return $output;	
}
add_shortcode('hm_details', 'idealtheme_hm_details_sc');

//=====================================================================================> Blog

function idealtheme_hm_blog_sc( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'style' => 'timeline',  // timeline - grid - masonry
    ), $atts ) );
	
	$output = '';
	
	ob_start(); 
	
	if ( $style == 'grid' ){
		get_template_part('includes/blog', 'grid');
		
	}else if ( $style == 'masonry' ){
		get_template_part('includes/blog', 'masonry');
		
	}else{
		get_template_part('includes/blog', 'timeline');
	}
	
	$ret = ob_get_contents(); 
	ob_end_clean(); 
	
	return '<div class="hm_import_posts">'.$ret.'</div>'; 
}
add_shortcode('hm_blog', 'idealtheme_hm_blog_sc');

//=====================================================================================> FAQs Filter

function idealtheme_faqs_filter_sc($atts, $content = null) {
	global $post;
	
	extract(shortcode_atts(array(
		'cats' 	     => '',
		'posts_num'    => -1,
		
		'orderby' 	  => 'date',                  // date - ID - author - title - rand - comment_count
		'sortby' 	   => 'ASC',                   // DESC - ASC
		
		'cat_orderby'  => 'count',                 // count - name - ID - slug - term_group
		'cat_sortby'   => 'DESC',                  // DESC - ASC
		
		'hide_empty'   => 0,
		'show_all_button'   => 'show',
		'show_filters'      => 'show',
		
		'all_btn_text'    => 'All',

	), $atts));
		
		$sort_html   = $faqs_html = $description = $sort_html = '';
		
		$cats_coma   = $cats;
		$cats_clases = str_replace(',', ' ', $cats);
		$cats        = (is_array($cats)) ? $cats : explode(',', $cats);
		
		$posts_num   = intval($posts_num);
        $get_all_ids = array();

		foreach ($cats as $k => $v) {
			$theCatId = get_term_by( 'slug', $v, 'faq_category' );					
			$get_all_ids[] = isset($theCatId->term_id) ? $theCatId->term_id : '';
		}

		$all_button_con = array(
			'class_name' => 'selected',
			'slug' => '*',
			'name' => $all_btn_text,
		);
		
		$get_all_button_con = (object) $all_button_con;
		
		if($show_all_button !== 'hide' ){
			$categories 	= array_merge(array($get_all_button_con), get_terms('faq_category', array(
				'orderby'    => $cat_orderby, 
				'order'    => $cat_sortby, 
				'hide_empty' => $hide_empty,
				'include'    => $get_all_ids,
				'show_post_count' => 0,
			)));
		}else{
			$categories 	= get_terms('faq_category', array(
				'orderby'    => $cat_orderby, 
				'order'    => $cat_sortby, 
				'hide_empty' => $hide_empty,
				'include'    => $get_all_ids,
				'show_post_count' => 0,
			));
		}
        
		$faq_args = array(
			'post_type' 	      => 'faq',
			'post_status' => 'publish',
			'faq_category' => $cats_coma,
			'posts_per_page'     => $posts_num,
			'orderby'		    => $orderby,
			'order'			  => $sortby,
		);
		$faq_query  = new WP_Query( $faq_args );
		$count_posts  = $faq_query->found_posts;
		
		$set_filter_list  = '<li><a data-option-value="%s" class="%s" href="#"><span>%s</span><span class="num"></span></a></li>';
		
		$style_is = '';
		$set_filter_container  = '<div class="hm_filter_wrapper content_filter">
			<div id="options" class="sort_options clearfix">
			    <ul data-option-key="filter" class="option-set clearfix hm_faq_opt" id="filter-by">%s</ul>
			</div>
			<div class="hm_filter_wrapper_con">%s</div>
		</div>';
        
		$faqs_item  = '<div class="content_filter_item %s">
						<div class="enar_accordion plus_minus" data-type="accordion"> 
							<div class="enar_occ_container" data-expanded="false">
								<span class="enar_occ_title">%s</span>
								<div class="enar_occ_content">
									<div class="acc_content">%s</div>
								</div>
							</div>
						</div>
					</div>';
		
		if($show_filters !== 'hide'){
			foreach($categories as $cat){
				$filter		= (isset($cat->slug) && $cat->slug !== '*' ) ? '.cat'.esc_attr($cat->term_id) : '*';
				$class		= (isset($cat->class_name))? esc_attr($cat->class_name) : '';
				$title		= (isset($cat->name))? $cat->name : '';
				$sort_html	.= sprintf($set_filter_list, $filter, $class, $title);
			}
		}
        
		if($faq_query->have_posts()){
			while($faq_query->have_posts()){ $faq_query->the_post();
				$title = (isset($post->post_title))? apply_filters('the_title', $post->post_title):'';
				$content_text = get_the_content();
				$content_text = apply_filters('the_content', $content_text);
				
				$tl 	  = wp_get_object_terms( $post->ID, 'faq_category' );
				$filters = '';
				foreach($tl as $term){
					$filters .= ' cat'.$term->term_id;
				}

				$faqs_html .= sprintf($faqs_item, $filters, $title, $content_text);
			}
		}
		wp_reset_query();
		
		return sprintf($set_filter_container, $sort_html, $faqs_html);	

}
add_shortcode("hm_faqs", "idealtheme_faqs_filter_sc");

//=====================================================================================> Coming Soon
function idealtheme_soon_sc($atts, $content = null) {
	$default_color = (idealtheme_option('site_main_color') !== '' ) ? idealtheme_option('site_main_color') : '#1CCDCA';
	extract(shortcode_atts(array(
		'evant_day' => '12/20/2020',
		'day_color' => $default_color,
		'day_title' => 'Days',
		
		'evant_hour' => 24,
		'hour_color' => $default_color,
		'hour_title' => 'Hours',
		
		'minutes_color' => $default_color,
		'minutes_title' => 'Minutes',
		
		'seconds_color' => $default_color,
		'seconds_title' => 'Seconds',
		
	), $atts));
	$output = '';	
	
	wp_enqueue_script( 'enar_idealtheme_progressbar');
	
	$output .= '<div class="rows_container '.esc_attr(idealtheme_option('comming_soon_bg_type')).' clearfix">		
            <div class="col-md-3">
                <div class="hm_circle_progressbar_con">
                    <div class="hm_circle_progressbar style1 days" data-event="'.esc_attr($evant_day).'" data-start-color="'.esc_attr($day_color).'" data-end-color="'.esc_attr($day_color).'"></div>
                    <span class="hm_circle_title upper">'.esc_html($day_title).'</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hm_circle_progressbar_con">
                    <div class="hm_circle_progressbar style1 hours" data-hours="'.esc_attr($evant_hour).'" data-start-color="'.esc_attr($hour_color).'" data-end-color="'.esc_attr($hour_color).'" data-delay="600" data-animation="easeInOut"></div>
                    <span class="hm_circle_title upper">'.esc_html($hour_title).'</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hm_circle_progressbar_con">
                    <div class="hm_circle_progressbar style1 minutes" data-start-color="'.esc_attr($minutes_color).'" data-end-color="'.esc_attr($minutes_color).'" data-delay="900" data-animation="easeInOut"></div>
                    <span class="hm_circle_title upper">'.esc_html($minutes_title).'</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hm_circle_progressbar_con">
                    <div class="hm_circle_progressbar style1 seconds" data-start-color="'.esc_attr($seconds_color).'" data-end-color="'.esc_attr($seconds_color).'" data-delay="1200" data-animation="easeInOut"></div>
                    <span class="hm_circle_title upper">'.esc_html($seconds_title).'</span>
                </div>
            </div>
        </div>';		
	return $output;	

}
add_shortcode("hm_soon", "idealtheme_soon_sc");

//=====================================================================================> Sliders 

function idealtheme_sliders_sc( $atts, $content = null ){
	
	global $post;
	global $enar_post_type_gallery_sc;
	
	extract( shortcode_atts( array(   
	    'type' => '',  // owl_slider - owl_png - owl_text - owl_gall - flex - camera - wobbly - scattered - four_boxes_effect
		'id' => 0,
    ), $atts ) );
	
	$output = '';
	$gall_thumb_con = '';
	$title_con    = '';
	$caption_con  = '';
	$wobbly_style = '';
	
	//-----------> Sliders Options
	$sliders_animation_type   = get_post_meta($id, 'idealtheme_sliders_animation_type', true);
	$sliders_duration_speed   = get_post_meta($id, 'idealtheme_sliders_duration_speed', true);
	$sliders_duration_timeout = get_post_meta($id, 'idealtheme_sliders_duration_timeout', true);
	$sliders_pause_on_hover   = get_post_meta($id, 'idealtheme_sliders_pause_on_hover', true);
	$sliders_auto_height      = get_post_meta($id, 'idealtheme_sliders_auto_height', true);
	$sliders_nav_arrows       = get_post_meta($id, 'idealtheme_sliders_nav_arrows', true);
	$sliders_pagination       = get_post_meta($id, 'idealtheme_sliders_pagination', true);
	
	$sliders_flex_animation_type = get_post_meta($id, 'idealtheme_sliders_flex_animation_type', true);
	$sliders_flex_easing         = get_post_meta($id, 'idealtheme_sliders_flex_easing', true);
	$sliders_show_thumbs         = get_post_meta($id, 'idealtheme_sliders_show_thumbs', true);
	
	$sliders_camera_animation    = get_post_meta($id, 'idealtheme_sliders_camera_animation', true);
	$sliders_camera_loader       = get_post_meta($id, 'idealtheme_sliders_camera_loader', true);
	
	$sliders_wobbly_easing       = get_post_meta($id, 'idealtheme_sliders_wobbly_easing', true);
	
	$sliders_pause_on_hover = ( $sliders_pause_on_hover == '1' ) ? 'true' : 'false';
	$sliders_auto_height    = ( $sliders_auto_height == '1' ) ? 'true' : 'false';
	$sliders_nav_arrows     = ( $sliders_nav_arrows == '1' ) ? 'true' : 'false';
	$sliders_pagination     = ( $sliders_pagination == '1' ) ? 'true' : 'false';
	$sliders_show_thumbs    = ( $sliders_show_thumbs == '1' ) ? 'true' : 'false';
	
	//-----------> Sliders Items
	$idealtheme_slides     = get_post_meta($id , $enar_post_type_gallery_sc->get_the_ID(), true);
    $idealtheme_gallery    = isset($idealtheme_slides['gallery_sc']) ? $idealtheme_slides['gallery_sc'] : '';
	$idealtheme_slide_type = isset($idealtheme_slides['slider_type']) ? $idealtheme_slides['slider_type'] : '';
	$type = $idealtheme_slide_type;
	
	$hd_image        = 'full';
	$thumb_image     = 'thumbnail';
	$flex_margin     = ( $sliders_show_thumbs == 'true' ) ? ' flex_margin_bot' : '';
	$flex_pagination = ( $sliders_show_thumbs == 'false' ) ? ' has_control_nav' : '';
	$camera_thumbs   = ( $sliders_show_thumbs == 'true' ) ? ' camera_magenta_skin' : ' without_thumbs';
	
	
		  if ( $type == 'owl_slider' ){    $output .= '<div id="enar_owl_slider" class="owl-carousel" data-animation="'.esc_attr($sliders_animation_type).'" data-speed="'.esc_attr($sliders_duration_speed).'" data-duration="'.esc_attr($sliders_duration_timeout).'" data-hover_stop="'.esc_attr($sliders_pause_on_hover).'" data-height="'.esc_attr($sliders_auto_height).'" data-navigation="'.esc_attr($sliders_nav_arrows).'" data-pagination="'.esc_attr($sliders_pagination).'">'; $hd_image = 'full';
	}else if ( $type == 'owl_png' ){	   $output .= '<div class="png_slider" data-animation="'.esc_attr($sliders_animation_type).'" data-speed="'.esc_attr($sliders_duration_speed).'" data-duration="'.esc_attr($sliders_duration_timeout).'" data-hover_stop="'.esc_attr($sliders_pause_on_hover).'" data-height="'.esc_attr($sliders_auto_height).'" data-navigation="'.esc_attr($sliders_nav_arrows).'" data-pagination="'.esc_attr($sliders_pagination).'">'; $hd_image = 'enar-blog-single-image';
	}else if ( $type == 'owl_text' ){      $output .= '<div class="normal_text_slider centered" data-animation="'.esc_attr($sliders_animation_type).'" data-speed="'.esc_attr($sliders_duration_speed).'" data-duration="'.esc_attr($sliders_duration_timeout).'" data-hover_stop="'.esc_attr($sliders_pause_on_hover).'" data-height="'.esc_attr($sliders_auto_height).'" data-navigation="'.esc_attr($sliders_nav_arrows).'" data-pagination="'.esc_attr($sliders_pagination).'">';
	}else if ( $type == 'owl_gall' ){      $output .= '<div class="thumbs_gall_slider_con content_thumbs_gall gall_full_width gall_arrow2 clearfix">'; $thumb_image = 'thumbnail';$hd_image = 'enar-blog-single-image';
	}else if ( $type == 'flex' ){          $output .= '<div class="flex_slider_container'.esc_attr($flex_margin).' flex_style1">'; $thumb_image = 'thumbnail';$hd_image = 'enar-blog-single-image';
	}else if ( $type == 'camera' ){        $output .= '<div class="camera_slider_container"><div class="camera_wrap hm_camera_slider'.esc_attr($camera_thumbs).'" data-animation="'.esc_attr($sliders_camera_animation).'" data-loader="'.esc_attr($sliders_camera_loader).'" data-speed="'.esc_attr($sliders_duration_speed).'" data-duration="'.esc_attr($sliders_duration_timeout).'" data-hover_stop="'.esc_attr($sliders_pause_on_hover).'" data-navigation="'.esc_attr($sliders_nav_arrows).'" data-pagination="'.esc_attr($sliders_pagination).'" data-thumbs="'.esc_attr($sliders_show_thumbs).'">'; $thumb_image = 'enar-blog-thumb';$hd_image = 'full';
	
	}else if ( $type == 'wobbly' ){        $output .= '<div id="wobbly_slide" class="wobbly_slide" data-easing="'.esc_attr($sliders_wobbly_easing).'" data-duration="'.esc_attr($sliders_duration_timeout).'"><ul>'; $thumb_image = 'thumbnail';
	}else if ( $type == 'scattered' ){     $output .= '<div id="photostack-1" class="photostack scattered_flip_desc photostack-start"><div>'; $thumb_image = 'medium';
	}else if ( $type == 'four_boxes_effect' ){
		                                   $output .= '<div class="boxgallery_con"><div id="boxgallery" class="boxgallery" data-effect="effect-1">'; $hd_image = 'full';
	}	
	
	//-------->
	if ($idealtheme_gallery !== ''){
		if ( $type == 'owl_gall' ){ 
			$output .= '<div class="thumbs_gall_slider_larg owl-carousel" data-animation="'.esc_attr($sliders_animation_type).'" data-speed="'.esc_attr($sliders_duration_speed).'" data-duration="'.esc_attr($sliders_duration_timeout).'" data-hover_stop="'.esc_attr($sliders_pause_on_hover).'" data-height="'.esc_attr($sliders_auto_height).'" data-navigation="'.esc_attr($sliders_nav_arrows).'" data-pagination="'.esc_attr($sliders_pagination).'">';
		}
		if ( $type == 'flex' ){ 
			$output .= '<div id="flex_carousel" class="flexslider has_ovellay '.esc_attr($flex_pagination).'" data-animation="'.esc_attr($sliders_flex_animation_type).'" data-easing="'.esc_attr($sliders_flex_easing).'" data-speed="'.esc_attr($sliders_duration_speed).'" data-duration="'.esc_attr($sliders_duration_timeout).'" data-hover_stop="'.esc_attr($sliders_pause_on_hover).'" data-pagination="'.esc_attr($sliders_pagination).'">';
			$output .= ($sliders_nav_arrows == 'true' ) ? '<a class="flex_previous" href="#">
								<span class="flex_previous_arrow"><span></span></span>
							</a>
							<a class="flex_next" href="#">
								<span class="flex_next_arrow"><span></span></span>
							</a>' : '';
			$output .= '<ul class="slides">';
		}
		
		foreach($idealtheme_gallery as $key=>$gall) {
			$key = intval($key);
			$key += 1;
			$imgid     = isset($gall['imgid']) ? $gall['imgid'] : '';											
			$larg_img  = wp_get_attachment_image_src($imgid, $hd_image);	
			$thumb_img = wp_get_attachment_image_src($imgid, $thumb_image);										
			$larg_img  = $larg_img[0];
			$thumb_img = $thumb_img[0];
			
			$img_title   = isset($gall['title']) ? $gall['title'] : '';	
			$img_title_b = isset($gall['title_b']) ? $gall['title_b'] : '';	
			$img_caption = isset($gall['img_caption']) ? $gall['img_caption'] : '';	
			$btn         = isset($gall['button']) ? $gall['button'] : '';								
			$url         = isset($gall['url']) ? $gall['url'] : '';
			$target      = isset($gall['target']) ? $gall['target'] : '';
			$target      = ( $target !== '' ) ? $target : '_self';
			
			$img_url     = isset($gall['image_url']) ? $gall['image_url'] : '';
			$img_target  = isset($gall['image_target']) ? $gall['image_target'] : '';
			
			$default_color = (idealtheme_option('site_main_color') !== '' ) ? idealtheme_option('site_main_color') : '#1CCDCA';
			$bg_color    = isset($gall['bg_color']) ? $gall['bg_color'] : $default_color;
			
			if ( $type == 'owl_slider' ){   //------------------------------------------------------------->
				$output .= '<div class="item">';
					$output .= ($larg_img !== '' ) ? '<img src="'.esc_url($larg_img).'" alt="'.esc_attr($img_title).'">' : '';
						$output .= '<div class="owl_slider_con">';
						$output .= ($img_title !== '' ) ? '<span class="owl_text_a"><span><span>'.esc_html($img_title).'</span></span></span>':'';
						$output .= ($img_title_b !== '' ) ? '<span class="owl_text_b"><span>'.esc_html($img_title_b).'</span></span>':'';
						$output .= ($img_caption !== '' ) ?'<span class="owl_text_c"><span>'.esc_html($img_caption).'</span></span>':'';
						$output .= ($btn !== '' && $url !== '') ?'<span class="owl_text_d">
										<a href="'.esc_url($url).'" target="'.esc_attr($target).'" class="btn_a">
										<span><i class="in_left ico-angle-right"></i><span>'.esc_html($btn).'</span><i class="in_right ico-angle-right"></i></span>
										</a>
									</span>':'';			
					$output .= '</div>';
				
				$output .= '</div>';
		    
			}else if ( $type == 'owl_png' ){ //------------------------------------------------------------->

				
				$output .= '<div class="png_slide">';
				    $img_target = ( $img_target == '' ) ? '_self' : $img_target;
					$output .= ( $img_url !== '' ) ? '<a href="'.esc_url($img_url).'" target="'.esc_attr($img_target).'"><img src="'.esc_url($larg_img).'" alt="'.esc_attr($imgid).'"></a>' : '<img src="'.esc_url($larg_img).'" alt="'.esc_attr($imgid).'">';
				$output .= '</div>';
				
			}else if ( $type == 'owl_text' ){ //------------------------------------------------------------->
				
				$output .= '<div class="text_slide">';
				    $output .= ($img_title !== '' ) ? '<h2 class="title1 centered upper">'.esc_html($img_title).'</h2>' : '';
					$output .= ($img_caption !== '' ) ? '<span class="desc">'.esc_html($img_caption).'</span>' : '';
					$output .= ($btn !== '' && $url !== '') ?'<a href="'.esc_url($url).'" target="'.esc_attr($target).'" class="btn_a">
										<span><i class="in_left ico-arrow-right4"></i><span>'.esc_html($btn).'</span><i class="in_right ico-arrow-right4"></i></span></a>':'';
				$output .= '</div>';
				
			}else if ( $type == 'owl_gall' ){ //------------------------------------------------------------->
			    $title_con   = ($img_title !== '' ) ? '<span class="gall_desc_t">'.esc_html($img_title).'</span>' : '';
				$caption_con = ($img_caption !== '' ) ? '<span class="gall_desc_d">'.esc_html($img_caption).'</span>' : '';
				
				$output .= '<div class="item">';
				$output .= ($img_title !== '' || $img_caption !== '') ? '<div class="gall_desc">'.$title_con.$caption_con.'</div>' : '';
				    $output .= '<a href="'.esc_url($larg_img).'" class="feature_inner_ling">
									<img src="'.esc_url($larg_img).'" alt="'.esc_attr($img_title).'">
								</a>
							</div>';
							
				$gall_thumb_con .= '<div class="item"><img src="'.esc_url($thumb_img).'" alt="'.esc_attr($img_title).'"></div>';
				
			}else if ( $type == 'flex' ){ //------------------------------------------------------------->
			    $output .= '<li>';
								$output   .= ($img_title !== '' || $img_title_b !== '' || $img_caption !== '' || ($btn !== '' && $url !== '') ) ? 
																	'<div class="flex_in_flex flexslider"><div class="flex_in">' : '';
								$output   .= ($img_title !== '' ) ? '<span class="flex_in1">'.esc_html($img_title).'</span>' : '';
								$output   .= ($img_title_b !== '' ) ? '<span class="flex_in2 upper">'.esc_html($img_title_b).'</span>':'';
								$output   .= ($img_caption !== '' ) ? '<span class="flex_in3 light">'.esc_html($img_caption).'</span>':'';
								$output   .= ($btn !== '' && $url !== '') ? '<a href="'.esc_url($url).'" class="bordered_btn_white upper" target="'.esc_attr($target).'">'.esc_html($btn).'</a>':'';
								$output   .= ($img_title !== '' || $img_title_b !== '' || $img_caption !== '' || ($btn !== '' && $url !== '') ) ? 
								'</div></div>' : '';
					$output .= '<img src="'.esc_url($larg_img).'" alt="'.esc_attr($img_title).'" />
							</li>';
							
				$gall_thumb_con .= '<li><img src="'.esc_url($thumb_img).'" alt="'.esc_attr($img_title).'" /></li>';
				
			}else if ( $type == 'camera' ){ //------------------------------------------------------------->
			
				$output .= '<div data-thumb="'.esc_url($thumb_img).'" data-src="'.esc_url($larg_img).'">';
								$output   .= ($img_title !== '' || $img_caption !== '' || ($btn !== '' && $url !== '') ) ? '<div class="camera_caption fadeFromBottom">' : '';
								$output   .= ($img_title !== '' ) ? '<span class="cam_slid_t">'.esc_html($img_title).'</span>' : '';
								$output   .= ($img_caption !== '' ) ? '<span class="cam_slid_d">'.esc_html($img_caption).'</span>' : '';
								$output   .= ($btn !== '' && $url !== '') ? '<a class="cam_slid_l" href="'.esc_url($url).'" target="'.esc_attr($target).'">'.esc_html($btn).'</a>':'';
								$output   .= ($img_title !== '' || $img_caption !== '' || ($btn !== '' && $url !== '') ) ? '</div>' : '';
				$output .= '</div>';
					
			}else if ( $type == 'wobbly' ){ //------------------------------------------------------------->
				$output .= '<li><div class="wobbly_slide">';
					$output .= ($thumb_img !== '' ) ? '<img class="icon" src="'.esc_url($thumb_img).'" alt="'.esc_attr($img_title).'"/>':'';
					$output .= ($img_title !== '' ) ? '<h2 class="wobbly_title upper">'.esc_html($img_title).'</h2>' : '';
					$output .= ($img_caption !== '' ) ? '<p class="wobbly_desc">'.esc_html($img_caption).'</p>':'';
					$output .= ($btn !== '' && $url !== '') ? '<a class="bordered_btn_white upper" href="'.esc_url($url).'" target="'.esc_attr($target).'">'.esc_html($btn).'</a>':'';
				$output .= '</div></li>';
				
				$wobbly_style .= '.wobbly_slide ul li:nth-child('.$key.') > svg{fill: '.esc_attr($bg_color).'}';
				
			}else if ( $type == 'scattered' ){ //------------------------------------------------------------->
				$output .= '<figure>';
				$output .= ( $img_url !== '' ) ? '<a href="'.esc_url($img_url).'" target="'.esc_attr($img_target).'" class="photostack-img"><img src="'.esc_url($thumb_img).'" alt="'.esc_attr($img_title).'"></a>' : '<img src="'.esc_url($thumb_img).'" alt="'.esc_attr($img_title).'">';
					
				$output .= '<figcaption>';
				$output .= ($img_title !== '' ) ? '<h2 class="photostack-title">'.esc_html($img_title).'</h2>' : '';
				$output .= ($img_caption !== '' ) ? '<div class="photostack-back"><p>'.esc_html($img_caption).'</p></div>' : '';
				$output .= '</figcaption>';
				$output .= '</figure>';
					
			}else if ( $type == 'four_boxes_effect' ){ //----------------------------------------------------->
				$output .= '<div class="panel"><img src="'.esc_url($larg_img).'" alt="'.esc_attr($img_title).'"/></div>';
			}
			
		} // End Foreach
		
		if ( $type == 'owl_gall' ){ 
			$output .= '</div>';
			$output .= '<div class="gall_thumbs owl-carousel">';
			$output .= $gall_thumb_con;
			$output .= '</div>';
		}
		if ( $type == 'flex' ){ 
			$output .= '</ul></div>';
			if ( $sliders_show_thumbs == 'true' ){
				$output .= '<div id="flex_thumbs" class="flexslider">
				<a class="flex_previous" href="#"><i class="ico-angle-left"></i></a>
				<a class="flex_next" href="#"><i class="ico-angle-right"></i></a>
				<ul class="slides">';
				$output .= $gall_thumb_con;
				$output .= '</ul></div>';
			}
		}
		
	}
	
	$output .= ( $type == 'wobbly' ) ? '</ul>' : '';
	$output .= ( $type == 'scattered' ) ? '</div>' : '';
	$output .= ( $type == 'flex' || $type == 'scattered' ) ? '</div>' : '</div>';
	$output .= ( $type == 'camera' ) ? '</div>' : '';
	$output .= ( $type == 'four_boxes_effect' ) ? '</div>' : '';
    
	if ( $type == 'wobbly' ){ 
		$output .= '<style>';
		$output .= $wobbly_style;
		$output .= '</style>';
	}
	
	// wp_enqueue_style('enar_idealtheme_sliders_css');
	
	if ( $type == 'flex' ){ 
	    wp_enqueue_script( 'enar_idealtheme_flexslider_min_js');
	}
	if ( $type == 'camera' ){ 
	    wp_enqueue_script( 'enar_idealtheme_camera_min_js');
	}
	if ( $type == 'wobbly' ){ 
	    wp_enqueue_script( 'enar_idealtheme_modernizr_js');
	    wp_enqueue_script( 'enar_idealtheme_classie_js');
	    wp_enqueue_script( 'enar_idealtheme_wobbly_min_js');
	}
	if ( $type == 'scattered' ){ 
	    wp_enqueue_script( 'enar_idealtheme_classie_js');
	    wp_enqueue_script( 'enar_idealtheme_photostack_js');
	}
	if ( $type == 'four_boxes_effect' ){ 
	    wp_enqueue_script( 'enar_idealtheme_classie_js');
		wp_enqueue_script( 'enar_idealtheme_boxesfx_js');
	}
	return $output;	
}
add_shortcode('hm_sliders', 'idealtheme_sliders_sc');

//=====================================================================================> Related Products

function idealtheme_related_product_sc($atts, $content = null) {
	extract(shortcode_atts(array(
	    'posts' => '',
		'posts_num' => -1,
		
		'show_cats' => 'show',    // show - hide
		'show_price' => 'show',
		'show_review' => 'show',
		'show_cart_btn' => 'show',
		
		'order_by' => 'date',   // date - ID - author - title - rand - comment_count
		'order' => 'DESC',      // DESC - ASC
		
	), $atts));
	
	$related_output = '';	
	
	$posts = (is_array($posts)) ? $posts : explode(',', $posts);
	
	if ( class_exists( 'woocommerce' ) ) {
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $posts_num,
			'orderby' 	    => 'comment_count',
			'post_status' => 'publish',
			'orderby'        => $order_by,
			'order' 	      => $order,
			'post__in'       => $posts,
		);	
		$products = new WP_Query( $args );
		
		$related_output .= '<div class="shop_slider woocommerce">';
		
		if ( $products->have_posts() ): while ( $products->have_posts() ): $products->the_post();
	
			global $product;
			
			$price = get_post_meta( get_the_ID(), '_regular_price', true);
			$sale = get_post_meta( get_the_ID(), '_sale_price', true);
			$product_new_item  = get_post_meta( get_the_ID(), 'idealtheme_product_new_item', true);
			
			$producty = new WC_product_simple( get_the_ID() );
			$attachment_ids = $producty->get_gallery_attachment_ids();
			
			$rating_html = $producty->get_rating_html();

			if ( has_post_thumbnail() ) {
				
				$image_post_thumb_url  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'enar-shop-large');
				$image_post_thumb_url  = $image_post_thumb_url[0];
				
			}else if ( $attachment_ids ){
				$image_post_thumb_url  = wp_get_attachment_image_src( $attachment_ids[0], 'enar-shop-large' );
				$image_post_thumb_url  = $image_post_thumb_url[0];
				
			}else{
				$image_post_thumb_url  = get_template_directory_uri().'/img/shop/default_product.jpg';
			}
			
			if( $image_post_thumb_url ){
				$related_output .= '<div class="add2cart_slide centered">
										<div class="add2cart_image">';
						$related_output .= ( $producty->is_on_sale() ) ? '<span class="sale_new">
												<span class="text">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span><span class="circle sale"></span>
											</span>' : '';
						
						$related_output .= ( $product_new_item ) ? '<span class="hm_new_prod">' . esc_html__( 'New', 'woocommerce' ) . '</span>' : '';
																
						$related_output .= '<a href="'.get_the_permalink().'" class="add2cart_img">
												<span class="add2cart_zoom"><i class="ico-plus3"></i></span>
												<img src="'.esc_url($image_post_thumb_url).'" alt="'.esc_attr(get_the_title()).'">
											</a>';
					$related_output .= '</div>';
					$related_output .= '<div class="add2cart_details">
											<div class="con_cont">
												<a href="'.get_the_permalink().'" class="add2cart_prod_name">'.get_the_title().'</a>';
					
					if ( $show_price == 'show' ) {	
						if ( $sale && $price ) {
							$related_output .= '<span class="add2cart_prod_price">
								<del>'.get_woocommerce_currency_symbol().esc_html($price).'</del>
								<ins class="roboto_font">'.get_woocommerce_currency_symbol().esc_html($sale).'</ins>
							</span>';
							
						}else if ( $price ) {
							$related_output .= '<span class="add2cart_prod_price">
								<ins class="roboto_font">'.get_woocommerce_currency_symbol().esc_html($price).'</ins>
							</span>';
							
						}else if ( $sale ) {
							$related_output .= '<span class="add2cart_prod_price">
								<ins class="roboto_font">'.get_woocommerce_currency_symbol().esc_html($sale).'</ins>
							</span>';
						}
					}
				
					$related_output .= ( $show_review == 'show' ) ? '<div class="centered">'.$rating_html.'</div>' : '';
					
					$is_btn_ajax = $producty->is_purchasable() && $producty->is_in_stock() ? ' add2cart_btn_ajax' : '';
					
					$related_output .= ( $show_cart_btn == 'show' ) ? '<a class="add2cart_btn'.esc_attr($is_btn_ajax).' product_type_'.esc_attr( $producty->product_type ).'" href="'.esc_url( $producty->add_to_cart_url() ).'" rel="nofollow" data-product_id="'.esc_attr( $producty->id ).'" data-product_sku="'.esc_attr( $product->get_sku() ).'" data-quantity="'.esc_attr( isset( $quantity ) ? $quantity : 1 ).'"><i class="refresh_loader ico-refresh4"></i><i class="hm_cart_icon ico-cart"></i><i class="hm_cart_added ico-check4"></i><span>' .esc_html( $product->add_to_cart_text() ). '</span></a>' : '';
					
				$related_output .= '</div></div></div>'; 
			}
	
		endwhile; endif; 
		
		$related_output .= '</div>';
		
		wp_reset_postdata();
	}
	
	return $related_output;	

}
add_shortcode("hm_related_product", "idealtheme_related_product_sc");