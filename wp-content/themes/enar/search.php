<?php 
    get_header(); 

	$float_to = '';
	$sidebar_position_option = idealtheme_option('search_page_sidebar_position');
	
	if( $sidebar_position_option == 'right' ){
		$float_to = 'content_block col-md-9 f_left';
		
	}else if( $sidebar_position_option == 'left' ){
		$float_to = 'content_block col-md-9 f_right';
		
	}else{
		$float_to = 'clearfix';
	}
	
	$full_or_boxed = '';
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
?>

<!-- Page Title -->
<?php 
	$crumb_and_title = idealtheme_option('theme_title_is');
	if ($crumb_and_title == 'allow_both' || $crumb_and_title == 'allow_title' ) { 
?> 
<div class="content_section page_title">
    <div class="<?php echo esc_attr($full_or_boxed); ?>">
        <h1><?php esc_html_e( 'Search results for','enar'); ?> "<?php echo get_search_query(); ?>"</h1>
        <?php if ( $crumb_and_title == 'allow_both' ) { ?> 
            <?php if (function_exists('idealtheme_fun_qt_custom_breadcrumbs')) idealtheme_fun_qt_custom_breadcrumbs(); ?> 
        <?php } ?> 
    </div>
</div>
<?php } ?> 
<!-- End Page Title -->

<div class="content_section">
    <div class="<?php echo esc_attr($full_or_boxed); ?>">
		<?php if ($crumb_and_title == 'allow_normal_title') { ?>
            <div class="main_title centered lato_font">
                <h2><span class="line"><span class="dot"></span></span>
					<?php esc_html_e( 'Search results for','enar'); ?> "<?php echo get_search_query(); ?>"
                </h2>
            </div>
        <?php } ?>
        
        <div class="content_spacer clearfix">
            <div class="<?php echo esc_attr($float_to); ?>">
                <div class="hm_blog_full_list hm_blog_list clearfix">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="hm_search_results_block clearfix">
                        <!-------------------------->
                        <div class="blog_grid_con">
                            <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                            
                            <?php if ( get_post_type() ){ ?>
                            <span class="meta">
                                <span class="meta_part">
                                    <!--<i class="ico-keyboard-arrow-right"></i>-->
                                    <span><?php echo esc_attr( get_post_type() ); ?></span>
                                </span>
                            </span>
                            <?php } ?>
                            
                            <div class="hm_search_results_con">
                            <?php echo idealtheme_content('content', 30, false); ?>
                            </div>
                        </div>
                        <!-------------------------->
                    </div>
                <?php endwhile; ?>
                <?php else:  ?>
                
                <div class="hm_message hm_error">
                	<i class="arwen-forbid"></i>
                	<?php esc_html_e( ' No Results For ', 'enar'); ?>"<?php echo get_search_query(); ?>"
				</div>
                
                <?php endif; ?>
                <?php wp_reset_query(); ?> 
                </div>
                
                <?php if( function_exists( 'idealtheme_fun_wpbeginner_numeric_posts_nav' ) ) { idealtheme_fun_wpbeginner_numeric_posts_nav(); } ?>
                
            </div>
            
            <?php if( $sidebar_position_option == 'right' ) {
				get_sidebar();
			}else if( $sidebar_position_option == 'left' ){
				get_sidebar('secondary');
			}?>
        </div>
    </div>
</div>
<?php get_footer(); ?>