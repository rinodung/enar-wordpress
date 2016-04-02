<?php if ( class_exists( 'woocommerce' ) ) { 

	get_header(); 
	
	$page_layout       = get_post_meta($post->ID, 'idealtheme_theme_layout', true);
	$sidebar_position  = get_post_meta($post->ID, 'idealtheme_sidebar_position', true);
	$page_padding_top  = get_post_meta($post->ID, 'idealtheme_page_padding_top', true);
	$page_padding_botm = get_post_meta($post->ID, 'idealtheme_page_padding_bottom', true);
	$right_sidebar     = get_post_meta($post->ID, 'idealtheme_page_right_sidebar', true);
	$left_sidebar      = get_post_meta($post->ID, 'idealtheme_page_left_sidebar', true);
	$crumb_and_title   = get_post_meta($post->ID, 'idealtheme_page_title_with_crumbs', true);
	$header_bg_color   = get_post_meta($post->ID, 'idealtheme_page_header_bg_color', true);
	$header_size       = get_post_meta($post->ID, 'idealtheme_page_header_height', true);
	$header_size       = ( $header_size == '' ) ? idealtheme_option('theme_title_height') : $header_size;
	$header_font_color = get_post_meta($post->ID, 'idealtheme_page_header_color', true);
	$header_bg_image   = get_post_meta($post->ID, 'idealtheme_page_header_bg_image', true);
	$header_bg_repeat  = get_post_meta($post->ID, 'idealtheme_page_header_bg_repeat', true);
	$header_bg_type    = get_post_meta($post->ID, 'idealtheme_page_header_bg_type', true);
	$header_bg_size    = get_post_meta($post->ID, 'idealtheme_page_header_bg_size', true);
	
	$header_bg_url  = '';
	$header_style  = '';
	
	if (is_array($header_bg_image) || is_object($header_bg_image))
	{
		foreach ( $header_bg_image as $img ){
			$header_bg_url = wp_get_attachment_image_src( $img, 'full' );
			$header_bg_url = esc_url($header_bg_url[0]);
		}
	}
	
	if($header_bg_url !== '') { 
	   $header_style .= 'background-attachment: '.esc_attr($header_bg_type).';
						 background-image: url('.esc_url($header_bg_url).');
						 background-position: center 0;
						 background-repeat: '.esc_attr($header_bg_repeat).';
						 background-size: '.esc_attr($header_bg_size).';';
	}
	if($header_bg_color !== '') { 
		$header_style .= 'background-color:'.esc_attr($header_bg_color).';'; 
	}
	
	$header_font_color = ( $header_font_color !== '' ) ? $header_font_color : idealtheme_option('theme_title_breadcrumbs_color');
	
	$header_style_con = $header_style;
	
	//--------------------------------------------------------------------------->

	$full_or_boxed = '';
	$layout_option = idealtheme_option('theme_layout');
	$layout_option_final  = 'boxed1';
	
	if( $layout_option_final == 'full2' ){
		$full_or_boxed    = 'full_content clearfix';
		
	}else if( $layout_option_final == 'boxed1' ){
		$full_or_boxed    = 'content clearfix';
		
	}else if( $layout_option_final == 'boxed2' ){
		$full_or_boxed    = 'content clearfix';
		
	} else{
		$full_or_boxed    = 'content clearfix';
		
	}

	$float_to = '';
	if (is_product()) {
		$sidebar_position_option = idealtheme_option('woocommerce_sidebar_position');
	}else{
		$sidebar_position_option = idealtheme_option('woocommerce_shop_sidebar_position');
	}
	
	$sidebar_position_final  = ( $sidebar_position == '' ) ? $sidebar_position_option : $sidebar_position;

	if( $sidebar_position_final == 'right' ){
		$float_to = 'content_block col-md-9 f_left';
		
	}else if( $sidebar_position_final == 'left' ){
		$float_to = 'content_block col-md-9 f_right';
		
	}else{
		$float_to = 'clearfix';
	}
				
	$padding_style = '';
	if ( $page_padding_top !== '' ){
		$padding_style .= 'padding-top:'.esc_attr($page_padding_top).'px;';
	}
	if ( $page_padding_botm !== '' ){
		$padding_style .= 'padding-bottom:'.esc_attr($page_padding_botm).'px;';
	}
	$get_padding_style = $padding_style;
?>

<!-- Page Title --> 
<?php 
	$crumb_and_title = ( $crumb_and_title !== '' ) ? $crumb_and_title : idealtheme_option('theme_title_is');
	if ($crumb_and_title == 'allow_both' || $crumb_and_title == 'allow_title' || $crumb_and_title == '') { 
?>
<div class="content_section page_title <?php echo esc_attr($header_size); ?>" <?php echo 'style="'.esc_attr($header_style_con).'"'; ?>>
    <div class="content clearfix">
        <h1><?php woocommerce_page_title(); ?></h1>
        <?php if ( $crumb_and_title == 'allow_both' ) { ?> 
        <div class="breadcrumbs">
        	<?php woocommerce_breadcrumb(); ?>
        </div> 
        <?php } ?> 
    </div>
</div>
<?php } ?>
<!-- End Page Title -->

<div class="content_section">

    <?php if (is_product()) { ?>
		<div class="" <?php echo 'style="'.esc_attr($get_padding_style).'"'; ?>>
    <?php } else { ?>
    	<div class="<?php echo esc_attr($full_or_boxed); ?> content_spacer entry-content">
    	<?php echo apply_filters('the_content', idealtheme_option('woocommerce_shop_custom_content')); ?>
    <?php } ?>
    
        <div class="hm_shop_page <?php echo esc_attr($float_to); ?> entry-content">
        	<?php woocommerce_content(); ?>
        </div>
        
        <?php if( $sidebar_position_final == 'right' ) {
			get_sidebar();
		}else if( $sidebar_position_final == 'left' ){
			get_sidebar('secondary');
		} ?>
        
    </div>
    
</div>
<?php get_footer(); } ?>