<?php 
	$right_sidebar = '';
	if( is_single() || is_page() ){
		$right_sidebar = get_post_meta($post->ID, 'idealtheme_page_right_sidebar', true); 
	}
	
	$is_bbpress_right_sidebar = false;
	if (function_exists('is_bbpress') && is_bbpress()) {
		$is_bbpress_right_sidebar = true;
	}
	
	if ( is_search() ) {
		$right_sidebar = idealtheme_option('search_page_sidebar_right');
	}
	else if ( is_home() ) {
		$right_sidebar = idealtheme_option('blog_home_sidebar_right');
		
	}else if ( ( is_page() || is_single() ) && $is_bbpress_right_sidebar ) {
		$right_sidebar = ( !empty($right_sidebar) ) ? $right_sidebar : idealtheme_option('bbpress_pages_sidebar_right');
	}
	else if ( is_page() ) {
		$right_sidebar = ( !empty($right_sidebar) ) ? $right_sidebar : idealtheme_option('pages_sidebar_right');
	}
	else if ( is_single() && get_post_type() == 'post' ) {
		$right_sidebar = ( !empty($right_sidebar) ) ? $right_sidebar : idealtheme_option('blog_posts_sidebar_right');
	}
	else if ( is_archive() && get_post_type() == 'post' ) {
		$right_sidebar = idealtheme_option('blog_cats_sidebar_right');
	}
	else if ( is_single() && get_post_type() == 'portfolio' ) {
		$right_sidebar = ( !empty($right_sidebar) ) ? $right_sidebar : idealtheme_option('portfolio_post_sidebar_right');
	}
	else if ( is_archive() && get_post_type() == 'portfolio' ) {
		$right_sidebar = idealtheme_option('portfolio_cats_sidebar_right');
	}
	
	if ( class_exists( 'woocommerce' ) ) { 
		if ( is_woocommerce() ){
			if (is_shop()) {
				$right_sidebar = idealtheme_option('woocommerce_shop_sidebar_right');
			}else{
				$right_sidebar = idealtheme_option('woocommerce_pages_sidebar_right');
			}
		}
	}
	
?>
<aside id="sidebar" class="col-md-3 right_sidebar">
   <?php if ( $right_sidebar !== '' ) { ?>
    	<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar($right_sidebar)){ }else {  } ?>
   <?php }else{ ?>
   		<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('right_sidebar')){ }else {  } ?>
   <?php } ?>
</aside>