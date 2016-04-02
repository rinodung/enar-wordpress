<?php get_header();
	
	$next_post_on      = get_post_meta($post->ID, 'idealtheme_portfolio_next_post', true);
	$next_post_on_opt  = ( idealtheme_option('portfolio_show_prev_next') ) ? 'show' : 'hide';
	$next_post_on      = ( !empty($next_post_on) ) ? $next_post_on : $next_post_on_opt;
	
	$comments_on       = get_post_meta($post->ID, 'idealtheme_portfolio_disable_comments', true);
	$comments_on_opt   = ( idealtheme_option('portfolio_show_comments') ) ? 'show' : 'hide';
	$comments_on       = ( !empty($comments_on) ) ? $comments_on : $comments_on_opt;
	
	$show_related      = get_post_meta($post->ID, 'idealtheme_portfolio_enable_related_posts', true);
	$show_related_opt  = ( idealtheme_option('portfolio_show_related') ) ? 'show' : 'hide';
	$show_related      = ( !empty($show_related) ) ? $show_related : $show_related_opt;
	
	$page_layout       = get_post_meta($post->ID, 'idealtheme_theme_layout', true);
	
	$float_to = '';
	$sidebar_position  = get_post_meta($post->ID, 'idealtheme_sidebar_position', true);
	$sidebar_position_option = idealtheme_option('portfolio_post_sidebar_position');
	$sidebar_position_final  = ( $sidebar_position == '' ) ? $sidebar_position_option : $sidebar_position;
		
	if( $sidebar_position_final == 'right' ){
		$float_to = 'content_block col-md-9 f_left';
		
	}else if( $sidebar_position_final == 'left' ){
		$float_to = 'content_block col-md-9 f_right';
		
	}else{
		$float_to = 'clearfix';
	}
				
	$page_padding_top  = get_post_meta($post->ID, 'idealtheme_page_padding_top', true);
	$page_padding_botm = get_post_meta($post->ID, 'idealtheme_page_padding_bottom', true);
	
	$right_sidebar     = get_post_meta($post->ID, 'idealtheme_page_right_sidebar', true);
	$left_sidebar      = get_post_meta($post->ID, 'idealtheme_page_left_sidebar', true);
	
	$crumb_and_title   = get_post_meta($post->ID, 'idealtheme_page_title_with_crumbs', true);
	$header_font_color = get_post_meta($post->ID, 'idealtheme_page_header_color', true);
	$header_size       = get_post_meta($post->ID, 'idealtheme_page_header_height', true);
	$header_size       = ( $header_size == '' ) ? idealtheme_option('theme_title_height') : $header_size;
	
	$header_bg_color   = get_post_meta($post->ID, 'idealtheme_page_header_bg_color', true);
	$header_bg_image   = get_post_meta($post->ID, 'idealtheme_page_header_bg_image', false);
	$header_bg_repeat  = get_post_meta($post->ID, 'idealtheme_page_header_bg_repeat', true);
	$header_bg_type    = get_post_meta($post->ID, 'idealtheme_page_header_bg_type', true);
	$header_bg_size    = get_post_meta($post->ID, 'idealtheme_page_header_bg_size', true);
	
	$header_bg_url  = '';
	$header_style  = '';
	
	foreach ( $header_bg_image as $img ){
		$header_bg_url = wp_get_attachment_image_src( $img, 'full' );
		$header_bg_url = esc_url($header_bg_url[0]);
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
	
	//-------------------------------------------------------------------------------->
	
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
	
	$padding_style = '';
	if ( $page_padding_top !== '' ){
		$padding_style .= 'padding-top:'.esc_attr($page_padding_top).'px;';
	}
	if ( $page_padding_botm !== '' ){
		$padding_style .= 'padding-bottom:'.esc_attr($page_padding_botm).'px;';
	}
	$get_padding_style = $padding_style;
?>
<?php if ( is_user_logged_in() ) { ?><a class="hm_edit_post" href="<?php echo get_edit_post_link(); ?>"><i class="ico-write"></i></a><?php } ?>
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

<!-- Next Product -->
<?php if ($next_post_on == 'show') { ?>
<nav class="next_product_nav">
    <?php
	$next_post_link     = get_next_post();
	$previous_post_link = get_previous_post();
	
	if (!empty( $previous_post_link )){ ?>
    <div class="prev">
        <a href="<?php echo get_permalink( $previous_post_link->ID ); ?>" class="icon-wrap">
            <i class="ico-keyboard-arrow-left"></i>
        </a>
    </div>
	<?php }if (!empty( $next_post_link )){ ?>
    <div class="next">
        <a href="<?php echo get_permalink( $next_post_link->ID ); ?>" class="icon-wrap">
            <i class="ico-keyboard-arrow-right"></i>
        </a>
    </div>
    <?php }?>
</nav>
<?php } ?>
<!-- End Next Product -->

<!-- Our Blog Grids -->
<div class="content_section">
    <div class="<?php echo esc_attr($full_or_boxed); ?>">
        <div class="clearfix" <?php echo 'style="'.esc_attr($get_padding_style).'"'; ?>>
            <!-- All Content -->
            <?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				$cat_in = array();
				$get_cat_in = '';
				$iii = 0;
				
				foreach((get_the_category()) as $category) {
					$cuurent_cat = single_cat_title("",false) ;
					$cur_cat_id = get_cat_id( single_cat_title("",false) );
				
					$other_cat_id = $category->cat_ID;
					$cat_in[] = $other_cat_id;
				}
			?>
            <div class="<?php echo esc_attr($float_to); ?>"> 
                    <div class="entry-content">
                    	<?php the_content(); ?>
                    </div>
                    
                    <?php if ($comments_on == 'show') { ?>
                    	<div class="content">
                        	<?php comments_template('', true); ?>
                            <br/><br/>
                        </div>	
					<?php } ?>
                    
                    <?php if ( $show_related == 'show' ) { ?> 
						<?php if ( idealtheme_option('portfolio_show_related_title') == true ) { ?>
                        <div class="title_banner centered upper related_portfolio">
                            <div class="content">
                                <h2><?php if ( idealtheme_option('related_portfolio_title_text') !== '' ){
                                    echo idealtheme_option('related_portfolio_title_text');
                                } else {
                                    esc_html_e( 'Related Projects', 'enar');	
                                } ?></h2>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php 
							$show_date_porto = ( idealtheme_option('portfolio_related_post_date') == true ) ? 'show' : 'hide';
							$show_cats_porto = ( idealtheme_option('portfolio_related_post_cats') == true ) ? 'show' : 'hide';
							$porto_posts_num = intval(idealtheme_option('portfolio_related_num_posts'));
							
							$porto_order = idealtheme_option('portfolio_related_order');
							$porto_order = ( $porto_order !== '' ) ? $porto_order : 'ID';
							$porto_sortr = idealtheme_option('portfolio_related_sort_by');
							$porto_sortr = ( $porto_sortr !== '' ) ? $porto_sortr : 'DESC';
							
							$porto_posts_from = idealtheme_option('portfolio_related_posts_from');
							$porto_posts_from = ( $porto_posts_from !== '' ) ? $porto_posts_from : 'from_all';
							
							$porto_get_cats   = idealtheme_option('portfolio_related_from_cats');
							$porto_get_cats   = (is_array($porto_get_cats)) ? implode(',', $porto_get_cats) : $porto_get_cats;
							
							$porto_get_posts  = idealtheme_option('portfolio_related_from_posts');
							$porto_get_posts  = (is_array($porto_get_posts)) ? implode(',', $porto_get_posts) : $porto_get_posts;
							
							$porto_zoom_text  = idealtheme_option('related_portfolio_zoom_btn_text');
							$porto_more_text  = idealtheme_option('related_portfolio_more_btn_text');
						?>
                        
                    <?php echo do_shortcode('[hm_portfolio_carousel style="hoverdir" show_title="show" show_date="'.esc_attr($show_date_porto).'" show_cats="'.esc_attr($show_cats_porto).'" posts_num="'.esc_attr($porto_posts_num).'" zoom_btn_text="'.esc_attr($porto_zoom_text).'" more_btn_text="'.esc_attr($porto_more_text).'" order_by="'.esc_attr($porto_order).'" order="'.esc_attr($porto_sortr).'" posts_from="'.esc_attr($porto_posts_from).'" categories="'.esc_attr($porto_get_cats).'" posts="'.esc_attr($porto_get_posts).'"]'); 
					
					} ?>
            </div>
            <!-- End All Content -->
            <?php endwhile; ?>
			<?php else:  ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            
            <?php if( $sidebar_position_final == 'right' ) {
				get_sidebar();
			}else if( $sidebar_position_final == 'left' ){
				get_sidebar('secondary');
			}?>
            
        </div>
        <!-- End Internal Post Con -->
    </div>
</div>
<!-- End Our Blog Grids -->
    
<?php get_footer(); ?>