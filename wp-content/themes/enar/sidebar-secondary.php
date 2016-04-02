<?php 
	$left_sidebar = '';
	if( is_single() || is_page() ){
		$left_sidebar = get_post_meta($post->ID, 'idealtheme_page_left_sidebar', true);
	}
	
	$is_bbpress_left_sidebar = false;
	if (function_exists('is_bbpress') && is_bbpress()) {
		$is_bbpress_left_sidebar = true;
	}
		
	if ( is_search() ) {
		$left_sidebar = idealtheme_option('search_page_sidebar_left');
	}
	else if ( is_home() ) {
		$left_sidebar = idealtheme_option('blog_home_sidebar_left');
		
	}else if ( ( is_page() || is_single() ) && $is_bbpress_left_sidebar ) {
		$left_sidebar = ( !empty($left_sidebar) ) ? $left_sidebar : idealtheme_option('bbpress_pages_sidebar_left');
	}
	else if ( is_page() ) {
		$left_sidebar = ( !empty($left_sidebar) ) ? $left_sidebar : idealtheme_option('pages_sidebar_left');
	}
	else if ( is_single() && get_post_type() == 'post' ) {
		$left_sidebar = ( !empty($left_sidebar) ) ? $left_sidebar : idealtheme_option('blog_posts_sidebar_left');
	}
	else if ( is_archive() && get_post_type() == 'post' ) {
		$left_sidebar = idealtheme_option('blog_cats_sidebar_left');
	}
	else if ( is_single() && get_post_type() == 'portfolio' ) {
		$left_sidebar = ( !empty($left_sidebar) ) ? $left_sidebar : idealtheme_option('portfolio_post_sidebar_left');
	}
	else if ( is_archive() && get_post_type() == 'portfolio' ) {
		$left_sidebar = idealtheme_option('portfolio_cats_sidebar_left');
	}
	
	if ( class_exists( 'woocommerce' ) ) { 
		if ( is_woocommerce() ){
			if (is_shop()) {
				$left_sidebar = idealtheme_option('woocommerce_shop_sidebar_left');
			}else{
				$left_sidebar = idealtheme_option('woocommerce_pages_sidebar_left');
			}
		}
	}

?>
<aside id="sidebar" class="col-md-3 left_sidebar">
   <?php if ( $left_sidebar !== '' ) { ?>
    	<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar($left_sidebar)){ }else {  } ?>
   <?php }else{ ?>
   		<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('left_sidebar')){ }else { } ?>
   <?php } ?>
</aside>