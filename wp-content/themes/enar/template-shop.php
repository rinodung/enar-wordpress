<?php
/*
Template Name: Shop Page
*/
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

	$float_to = '';
	$sidebar_position_option = idealtheme_option('woocommerce_sidebar_position');
	$sidebar_position_final  = ( $sidebar_position == '' ) ? $sidebar_position_option : $sidebar_position;

	if( $sidebar_position_final == 'right' ){
		$float_to = 'content_block col-md-9 f_left';
		
	}else if( $sidebar_position_final == 'left' ){
		$float_to = 'content_block col-md-9 f_right';
		
	}else{
		$float_to = 'hm_blog_full_list hm_blog_list clearfix';
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
        <h1><?php the_title(); ?></h1>
        <?php if ( $crumb_and_title == 'allow_both' ) { ?> 
			<?php if (function_exists('idealtheme_fun_qt_custom_breadcrumbs')) idealtheme_fun_qt_custom_breadcrumbs(); ?> 
        <?php } ?>
    </div>
</div>
<?php } ?> 
<!-- End Page Title -->

<div class="content_section">
    <div class="entry-content">
    <?php
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			the_content();
		endwhile; 
		else:  
		endif;
		wp_reset_query();
	?>
    </div>
    
    <div class="<?php echo esc_attr($full_or_boxed); ?> clearfix" <?php echo 'style="'.esc_attr($get_padding_style).'"'; ?>>
        <div class="hm_shop_page <?php echo esc_attr($float_to); ?>">
            <?php 
			if ( class_exists( 'woocommerce' ) ) {  
				
				$woocomme_num_posts = intval(idealtheme_option('woocommerce_posts_per_page'));
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'product',
					'paged' => $paged,
					'posts_per_page' => $woocomme_num_posts
				);
				query_posts($args);
				
				if ( have_posts() ) {

					//do_action( 'woocommerce_before_shop_loop' );
					
					?><ul class="products_filter clear"><?php
					
					while ( have_posts() ) : the_post();
					
						wc_get_template_part( 'content', 'product' );
						
					endwhile;
					
					?></ul><?php 
					
					do_action( 'woocommerce_after_shop_loop' );
				} 
				wp_reset_postdata();
			
			} 
			?>
        </div>
        
        <?php if( $sidebar_position_final == 'right' ) {
            get_sidebar();
        }else if( $sidebar_position_final == 'left' ){
            get_sidebar('secondary');
        } ?>   
    </div>
</div>
<?php get_footer(); ?>