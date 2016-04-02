<?php
	global $post;
	get_header();
	
	$page_layout       = get_post_meta($post->ID, 'idealtheme_theme_layout', true);
	$sidebar_position      = get_post_meta($post->ID, 'idealtheme_sidebar_position', true);
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
	
	//$header_font_color_over = $header_font_color;
	$header_font_color = ( $header_font_color !== '' ) ? $header_font_color : idealtheme_option('theme_title_breadcrumbs_color');
	
	$header_style_con = $header_style;
	
	//----------------------------------------------------------------------------->
	
	$padding_style = '';
	if ( $page_padding_top !== '' ){
		$padding_style .= 'padding-top:'.esc_attr($page_padding_top).'px;';
	}
	if ( $page_padding_botm !== '' ){
		$padding_style .= 'padding-bottom:'.esc_attr($page_padding_botm).'px;';
	}
	$get_padding_style = $padding_style;
	
	$full_or_boxed = '';
	$layout_option = idealtheme_option('theme_layout');
	$layout_option_final  = ( $page_layout == '' ) ? $layout_option : $page_layout;
	
	if( $layout_option_final == 'full2' ){
		$full_or_boxed    = 'full_content clearfix';
		
	}else if( $layout_option_final == 'boxed1' ){
		$full_or_boxed    = 'content clearfix';
		
	}else if( $layout_option_final == 'boxed2' ){
		$full_or_boxed    = 'content clearfix';
		
	} else{
		$full_or_boxed    = 'content clearfix';
		
	}
	//----------------------------------------------------------------------------->
	
	$templatename      = get_page_template_slug( $post->ID );
	
?>

<!-- Page Title -->
<?php 
	$crumb_and_title = ( $crumb_and_title !== '' ) ? $crumb_and_title : idealtheme_option('theme_title_is');
	if ($crumb_and_title == 'allow_both' || $crumb_and_title == 'allow_title' || $crumb_and_title == '') { 
?>
<div class="content_section page_title <?php echo esc_attr($header_size); ?>" <?php echo 'style="'.esc_attr($header_style_con).'"'; ?>>
    <div class="content clearfix">
        <h1><?php the_title(); ?></h1>
        <?php if ( $crumb_and_title == 'allow_both' ) { ?> 
			<?php if (function_exists('idealtheme_fun_qt_custom_breadcrumbs')) idealtheme_fun_qt_custom_breadcrumbs(); ?> 
        <?php } ?> 
    </div>
</div>
<?php } ?> 
<!-- End Page Title -->

<div class="content_section">
    <div class="<?php echo esc_attr($full_or_boxed); ?>" <?php echo 'style="'.esc_attr($get_padding_style).'"'; ?>>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
			<?php the_content(); ?> 
            <?php if ($crumb_and_title == 'allow_normal_title') { ?>
                <div class="main_title centered lato_font">
                    <h2><span class="line"><span class="dot"></span></span><?php the_title(); ?></h2>
                </div>
            <?php } ?>
        <?php endwhile; ?>
        <?php else:  ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        
        <?php 
		if ( $templatename == 'template-blog-timeline.php' || $templatename == 'template-portfolio-timeline.php' ) { 
			get_template_part('includes/blog', 'timeline');
			
		} else if ( $templatename == 'template-blog-grid-2-columns.php' || 
					$templatename == 'template-blog-grid-3-columns.php' || 
					$templatename == 'template-blog-grid-4-columns.php' ||
					$templatename == 'template-portfolio-grid-2-columns.php' || 
					$templatename == 'template-portfolio-grid-3-columns.php' || 
					$templatename == 'template-portfolio-grid-4-columns.php' 
				) { 
		
			get_template_part('includes/blog', 'grid');
			
		}else{
			get_template_part('includes/blog', 'masonry');
		}
		?> 
    </div>
</div>
<?php get_footer(); ?>