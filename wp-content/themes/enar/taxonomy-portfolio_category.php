<?php get_header(); 

	$full_or_boxed = $float_to = '';
	
	$c_term       = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$current_term = $c_term->name;
	
	$header_size  = idealtheme_option('theme_title_height');
	$layout_option = idealtheme_option('theme_layout');
	$layout_option_final  = $layout_option;
	
	if( $layout_option_final == 'full2' ){
		$full_or_boxed    = 'full_content clearfix';
		
	}else if( $layout_option_final == 'boxed1' ){
		$full_or_boxed    = 'content clearfix';
		
	}else if( $layout_option_final == 'boxed2' ){
		$full_or_boxed    = 'content clearfix';
		
	} else{
		$full_or_boxed    = 'content clearfix';
	}
	
	$sidebar_position_final  = idealtheme_option('portfolio_cats_sidebar_position');
	
	if( $sidebar_position_final == 'right' ){
		$float_to = 'content_block col-md-9 f_left';
		
	}else if( $sidebar_position_final == 'left' ){
		$float_to = 'content_block col-md-9 f_right';
		
	}else{
		$float_to = 'clearfix';
	}
?>

<!-- Page Title -->
<?php 
	$crumb_and_title = idealtheme_option('theme_title_is');
	if ($crumb_and_title == 'allow_both' || $crumb_and_title == 'allow_title' ) { 
?>
<div class="content_section page_title <?php echo esc_attr($header_size); ?>">
    <div class="content clearfix">
        <h1><?php echo apply_filters( 'the_title', $current_term ); ?></h1>
        <?php if ( $crumb_and_title == 'allow_both' ) { ?> 
			<?php if (function_exists('idealtheme_fun_qt_custom_breadcrumbs')) idealtheme_fun_qt_custom_breadcrumbs(); ?> 
        <?php } ?> 
    </div>
</div>
<?php } ?> 
<!-- End Page Title -->

<div class="content_section hm_porto_tax_con">
    <div class="<?php echo esc_attr($full_or_boxed); ?> content_spacer">
    
        <?php if ($crumb_and_title == 'allow_normal_title') { ?>
            <div class="main_title centered lato_font">
                <h2><span class="line"><span class="dot"></span></span><?php the_title(); ?></h2>
            </div>
        <?php } ?>
        <div class="<?php echo esc_attr($float_to); ?>">
            <?php
			if ( idealtheme_option('portfolio_category_template_type') == 'masonry' ) { 
                get_template_part('includes/blog', 'masonry');
                
            } else if ( idealtheme_option('portfolio_category_template_type') == 'grid' ) { 
                get_template_part('includes/blog', 'grid');
                
            } else if ( idealtheme_option('portfolio_category_template_type') == 'list' ) { 
                get_template_part('includes/blog', 'standard_list');
                
            }else { 
                get_template_part('includes/portfolio', 'filter');
                
            }
			?>  
        </div>
         
		<?php if( $sidebar_position_final == 'right' ) {
        	get_sidebar();
        }else if( $sidebar_position_final == 'left' ){
        	get_sidebar('secondary');
        }?>
        
    </div>
</div>
<?php get_footer(); ?>