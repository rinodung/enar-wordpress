<?php
//----> Blog
add_image_size('enar-blog-avatar-thumb', 75, 75, true);
add_image_size('enar-blog-thumb', 90, 60, true);
add_image_size('enar-blog-carousel', 450, 290, true);
add_image_size('enar-blog-single-image', 1140);
add_image_size('enar-blog-timeline', 500);
add_image_size('enar-blog-masonry', 700);

add_image_size('enar-shop-large', 500, 600, true);          // Shop

add_image_size('enar-portfolio-small', 600, 375, true);     // 1 X 1
add_image_size('enar-portfolio-large', 800, 500, true);     // 2 X 2 
add_image_size('enar-portfolio-rect1', 800, 250, true);     // 2 X 1 
add_image_size('enar-portfolio-rect2', 600, 750, true);     // 1 X 2 

//---------------------------------------------------------------------------------> Body Classes And Style
function idealtheme_get_mata_vars(){
	global $post;
	$vars = array();
	
	$enable_top_bar_option    = idealtheme_option('show_header_top_bar') ? 'show' : 'hide';
	$vars['enable_top_bar']   = $enable_top_bar_option;
	$vars['page_bg_overlay']  = false;
	
	$vars['page_bg_style'] = $set_bg_img_style = $bg_image_url = $vars['page_layout'] = $vars['color_skin'] = $vars['show_preloader'] = $vars['preloader_style'] = $vars['current_menu'] = $vars['menu_style'] = $vars['menu_mode'] = $vars['sub_menu_mode'] = $vars['menu_align'] = $vars['top_bar_mode'] = $vars['show_search_as'] = $vars['menu_position'] = $vars['templatename'] = $vars['header_font_color'] = '';
	
		
	if( is_object($post) ){
		$vars['page_layout']       = get_post_meta($post->ID, 'idealtheme_theme_layout', true);
		$vars['current_menu']      = get_post_meta($post->ID, 'idealtheme_page_select_menu', true);
		$vars['menu_style']        = get_post_meta($post->ID, 'idealtheme_page_menu_style', true);
		$vars['menu_position']     = get_post_meta($post->ID, 'idealtheme_page_menu_position', true);
		$vars['menu_mode']         = get_post_meta($post->ID, 'idealtheme_page_menu_color_mode', true);
		$vars['sub_menu_mode']     = get_post_meta($post->ID, 'idealtheme_page_sub_menu_color_mode', true);
		$vars['menu_align']        = get_post_meta($post->ID, 'idealtheme_page_menu_align', true);
		$vars['enable_top_bar']    = get_post_meta($post->ID, 'idealtheme_page_top_bar_show', true);
		$vars['enable_top_bar']    = ( !empty( $vars['enable_top_bar'] ) ) ? $vars['enable_top_bar'] : $enable_top_bar_option;
		$vars['show_search_as']    = get_post_meta($post->ID, 'idealtheme_page_show_search_as', true);
		
		$vars['templatename']      = get_page_template_slug( $post->ID );
		
		$vars['header_font_color'] = get_post_meta($post->ID, 'idealtheme_page_header_color', true);
		$vars['header_font_color'] = ( $vars['header_font_color'] !== '' ) ? $vars['header_font_color'] : idealtheme_option('theme_title_breadcrumbs_color');
		
		$vars['page_bg_color']     = get_post_meta($post->ID, 'idealtheme_page_custom_bg_color', true);
		$vars['page_bg_img']       = get_post_meta($post->ID, 'idealtheme_page_custom_bg_image', false );
		$vars['bg_repeat']         = get_post_meta($post->ID, 'idealtheme_page_custom_bg_repeat', true);
		$vars['bg_type']           = get_post_meta($post->ID, 'idealtheme_page_custom_bg_type', true);
		$vars['bg_size']           = get_post_meta($post->ID, 'idealtheme_page_custom_bg_size', true);
		$vars['page_bg_overlay']   = get_post_meta($post->ID, 'idealtheme_page_bg_overlay', true);
		
		if ( is_array($vars['page_bg_img']) && !empty($vars['page_bg_img']) ){
			$bg_image_url = wp_get_attachment_image_src( $vars['page_bg_img'][0], 'full' );
			$bg_image_url = esc_url($bg_image_url[0]);
		}
		
		if($bg_image_url !== '') { 
		   $set_bg_img_style .= 'background-attachment: '.esc_attr($vars['bg_type']).';
								 background-image: url('.esc_url($bg_image_url).');
								 background-position: center 0;
								 background-repeat: '.esc_attr($vars['bg_repeat']).';
								 background-size: '.esc_attr($vars['bg_size']).';';
		}
		if($vars['page_bg_color'] !== '') { 
			$set_bg_img_style .= 'background-color:'.esc_attr($vars['page_bg_color']).';'; 
		}
		$vars['page_bg_style'] = $set_bg_img_style;
	}
    
	$menu_position_option = idealtheme_option('nav_position');
	$vars['menu_position_final']  = ( !empty( $vars['menu_position'] ) ) ? $vars['menu_position'] : $menu_position_option;
	
	$menu_style_option = idealtheme_option('nav_style');
	$vars['menu_style_final']  = ( !empty( $vars['menu_style'] ) ) ? $vars['menu_style'] : $menu_style_option;
	
	$nav_color_mode       = idealtheme_option('nav_color_mode');
	$vars['nav_color_mode_final'] = ( !empty($vars['menu_mode']) ) ? $vars['menu_mode'] : $nav_color_mode;
	
	$sub_nav_color_mode       = idealtheme_option('sub_nav_color_mode');
	$vars['sub_nav_color_mode_final'] = ( !empty($vars['sub_menu_mode']) ) ? $vars['sub_menu_mode'] : $sub_nav_color_mode;
	
	return $vars;
}

function idealtheme_body_classes( $body_classes ) {
	
	extract( idealtheme_get_mata_vars() );
	
	$layout_option = idealtheme_option('theme_layout');
	$layout_option_final  = ( $page_layout == '' ) ? $layout_option : $page_layout;
	
	if( $layout_option_final == 'full2' ){
		$body_classes[]    = 'site_full site_full_all';
		
	}else if( $layout_option_final == 'boxed1' ){
		$body_classes[]    = 'site_boxed';
		
	}else if( $layout_option_final == 'boxed2' ){
		$body_classes[]    = 'site_boxed site_boxed_space';
		
	} else{
		$body_classes[]    = 'site_full';
		
	}
	
	if( class_exists( 'woocommerce' ) && $templatename == 'template-shop.php' ){
		$body_classes[]    = 'woocommerce';
	}
	
	if( class_exists( 'woocommerce' ) ){
		if ( !is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page() && !is_product() && $templatename !== 'template-shop.php' ) {
			// woocommerce-general woocommerce-layout woocommerce-smallscreen
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );
		}
	}
		
	$preloader_style = idealtheme_option('preloader_style');
	$body_classes[]  = $preloader_style;
	$body_classes[]  = $menu_style_final;
	$body_classes[]  = $menu_position_final;
	$body_classes[]  = $nav_color_mode_final;
	$body_classes[]  = $sub_nav_color_mode_final;
	
	
	$body_classes[]  = (idealtheme_option('theme_color_mode') == 'dark') ? 'dark' : '';
	
	return $body_classes;
}
add_filter( 'body_class', 'idealtheme_body_classes' );

//---------------------------------------------------------------------------------> Enqueue Google Fonts
function idealtheme_fun_google_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
	
    wp_enqueue_style( 'enar_idealtheme_opensans_font', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" );
	
	wp_enqueue_style( 'enar_idealtheme_lato_font', "$protocol://fonts.googleapis.com/css?family=Lato:300,300italic,400italic,600,600italic,700,700italic,800,800italic" );
	
	wp_enqueue_style( 'enar_idealtheme_roboto_font', "$protocol://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" );
	
}
add_action( 'wp_enqueue_scripts', 'idealtheme_fun_google_fonts' );   

//---------------------------------------------------------------------------------> WPML Language List
 
function idealtheme_fun_wpml_languages_list(){
	$languages = icl_get_languages('skip_missing=0&orderby=code');
	if(!empty($languages)){
		foreach($languages as $l){   
			
			$is_arabic = ( $l['language_code'] == 'ar' ) ? ' tahoma_font' : '';
			
			if($l['active']){
				echo '<li class="active'.esc_attr($is_arabic).'"><span>'; 
				  
			} else{
				echo '<li class="'.esc_attr($is_arabic).'">';   
			}
			
			if(!$l['active']) echo '<a href="'.esc_url($l['url']).'">';
			echo icl_disp_language($l['native_name'], '');
			
			if ( !$l['active'] ) {
				echo '</a>';
			} else {
				echo '<i class="ico-check lang_checked"></i>';
			}
			
			if($l['active']){
				echo '</span></li>';   
			}else{
				echo '</li>';   
			}
		}
	}
}

//---------------------------------------------------------------------------------> Ajax Loader

add_action( 'admin_head', 'idealtheme_modal_box' );
function idealtheme_modal_box() { ?>
	<div class="icons_container" style="display:none">
		<div class="icons_block">
        	<h1><?php esc_html_e( 'Select Icon', 'enar'); ?></h1>
            <div class="search_boxy">
            	<form class="search_for_icon">
                	<input type="text" placeholder="search for icon ..." class="search_in_icons" />
                </form>
            </div>
            <div class="get_icons_from_ajax"></div>
            <div class="icon_end_block">
				<a class="select_icon_save button-primary" href="#"><?php esc_html_e( 'Select Save', 'enar'); ?></a>
            </div>
        </div>
	</div>
	<div class="close_box_icon"></div>
<?php }

function idealtheme_fun_call_admin_ajax() 
{
	global $wp_query;
    wp_localize_script( 'function', 'call_idealtheme_ajax', array( 
			'url' => admin_url( 'admin-ajax.php' ) ,
			'nonce' => wp_create_nonce( 'ajax-nonce' ),
		) 
	);
}
add_action('template_redirect', 'idealtheme_fun_call_admin_ajax');

add_action('wp_ajax_idealtheme_fun_load_select_icons', 'idealtheme_fun_ajax_for_icons');
add_action('wp_ajax_nopriv_idealtheme_fun_load_select_icons', 'idealtheme_fun_ajax_for_icons');

//==============================================================================> Theme Menus

function idealtheme_fun_register_my_menus() {
	register_nav_menus(
		array(
			'main' => esc_html__( 'Main Menu' , 'enar' ),
			'one_page' => esc_html__( 'One Page Menu' , 'enar' ),
			'footer' => esc_html__( 'Footer Menu' , 'enar' ),
		)
	);
}
add_action( 'init', 'idealtheme_fun_register_my_menus' );

//==============================================================================>  Color Picker

add_action( 'admin_enqueue_scripts', 'idealtheme_fun_enqueue_color_picker' );
function idealtheme_fun_enqueue_color_picker( $hook ) {
	if( is_admin() ) { 
    	wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
	}
}

//==============================================================================> limited words

function idealtheme_fun_string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

//==============================================================================> Theme Sidebars

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => esc_html__( 'Right Sidebar', 'enar'),
		'id' => 'right_sidebar',
		'description' => esc_html__( 'Default Right SideBar.', 'enar'),
		'before_widget' => '<div class="widget_block %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget_title">',
		'after_title' => '</h6>'
	));
	
	register_sidebar(array(
		'name' => esc_html__( 'Left Sidebar', 'enar'),
		'id' => 'left_sidebar',
		'description' => esc_html__( 'Default Left SideBar.', 'enar'),
		'before_widget' => '<div class="widget_block %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget_title">',
		'after_title' => '</h6>'
	));
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer 1', 'enar'),
		'id' => 'footer_sidebar_a',
		'description' => esc_html__( 'Footer Widget Conteiner 1.', 'enar'),
		'before_widget' => '<div class="footer_row clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="footer_title">',
		'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => esc_html__( 'Footer 2', 'enar'),
		'id' => 'footer_sidebar_b',
		'description' => esc_html__( 'Footer Widget Conteiner 2.', 'enar'),
		'before_widget' => '<div class="footer_row clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="footer_title">',
		'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => esc_html__( 'Footer 3', 'enar'),
		'id' => 'footer_sidebar_c',
		'description' => esc_html__( 'Footer Widget Conteiner 3.', 'enar'),
		'before_widget' => '<div class="footer_row clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="footer_title">',
		'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => esc_html__( 'Footer 4', 'enar'),
		'id' => 'footer_sidebar_d',
		'description' => esc_html__( 'Footer Widget Conteiner 4.', 'enar'),
		'before_widget' => '<div class="footer_row clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="footer_title">',
		'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => esc_html__( 'Woocommerce Sidebar', 'enar'),
		'id' => 'woocommerce_sidebar',
		'description' => esc_html__( 'Woocommerce SideBar.', 'enar'),
		'before_widget' => '<div class="widget_block %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget_title">',
		'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => esc_html__( 'SideBar 1', 'enar'),
		'id' => 'sidebar_a',
		'before_widget' => '<div class="widget_block %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget_title">',
		'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => esc_html__( 'SideBar 2', 'enar'),
		'id' => 'sidebar_b',
		'before_widget' => '<div class="widget_block %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget_title">',
		'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => esc_html__( 'SideBar 3', 'enar'),
		'id' => 'sidebar_c',
		'before_widget' => '<div class="widget_block %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget_title">',
		'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => esc_html__( 'SideBar 4', 'enar'),
		'id' => 'sidebar_d',
		'before_widget' => '<div class="widget_block %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget_title">',
		'after_title' => '</h6>'
	));
	
 }
//==============================================================================> Pagination
function idealtheme_fun_wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;
    $get_next_text = '<i class="ico-arrow-right4"></i>';
	$get_prev_text = '<i class="ico-arrow-left4"></i>';
	$text_a = esc_html__("Page ", 'enar');
	$text_b = esc_html__(" Of ", 'enar');
	
	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
    
	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination" id="pagination"><ul class="clearfix">' . "\n";
	
	if($max >= 1){	
		echo '<li class="page_of">'.esc_html($text_a.$paged.$text_b.$max).'</li>';
	}
	/**	Previous Post Link */
	if ( get_previous_posts_link() )
	    
		printf( '<li class="prev_post">%s</li>' . "\n", get_previous_posts_link($get_prev_text) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>...</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>...</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		
		printf( '<li class="next_post">%s</li>' . "\n", get_next_posts_link($get_next_text) );

	echo '</ul></div>' . "\n";

}

//=========================================> include custom posts in search

function idealtheme_fun_include_all_in_search( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'feed', 'portfolio', 'members', 'timeline'));
	}
	return $query;
}
add_filter( 'the_search_query', 'idealtheme_fun_include_all_in_search' );

//=========================================> Set Blog Posts Per Page

add_action( 'pre_get_posts', 'idealtheme_fun_custom_query_for_post_types' );

function idealtheme_fun_custom_query_for_post_types( $query ) {
	
	if ( !is_admin() && $query->is_main_query() && $query->is_archive() ){
		
		$category_num_posts = intval(idealtheme_option('post_category_posts_per_page'));
		$woocomme_num_posts = intval(idealtheme_option('woocommerce_posts_per_page'));
		
		if ( $category_num_posts ){
			$query->set( 'posts_per_page', $category_num_posts );
		}
		
		if ( class_exists( 'woocommerce' ) ) { 
			if ( is_woocommerce() ){
				$query->set( 'posts_per_page', $woocomme_num_posts );
			}
		}
	}
}

//=========================================> URL From ID 

function idealtheme_fun_get_image_url($img, $size = 'enar-blog-single-image') {
	$image_url = '';
	
	if ( $img !== '' ) {
		if (strpos($img, 'http') !== 0 ) {
			$image_url = wp_get_attachment_image_src($img, $size);
			$image_url = $image_url[0];
			
		}else{
			$image_id = idealtheme_fun_get_image_id_from_img_url($img);
			$image_url = wp_get_attachment_image_src($image_id, $size);
			$image_url = $image_url[0];
		}
	}
    return $image_url;
}

//=========================================> ID From URL

function idealtheme_fun_get_image_id_from_img_url($img) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $img )); 
	if(isset ($attachment[0])){
		return $attachment[0]; 
	}
    
}

//=========================================> Get Image Size

function idealtheme_fun_get_post_img($size){
		global $post;
		global $enar_custom_posts_gallery;
		global $enar_custom_portfolio_metabox;
		
		$get_image = '';
		$format = get_post_format( get_the_ID() ); 
		$post_type = get_post_type( get_the_ID() ); 
		
		$img_id = get_post_thumbnail_id($post->ID);
		$get_image = wp_get_attachment_image_src($img_id, $size);
		
		
		if($format == 'gallery' && $post_type == 'post' && !has_post_thumbnail()){
			$posts_all_slides     = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
			$posts_gallery        = isset($posts_all_slides['gallery']) ? $posts_all_slides['gallery'] : '';
				
			$posts_get_gallery_first = isset($posts_gallery[0]) ? $posts_gallery[0] : '';
			$posts_store_first_id = isset($posts_get_gallery_first['imgid']) ? $posts_get_gallery_first['imgid'] : '';
			$posts_get_first_img_url = wp_get_attachment_image_src($posts_store_first_id, $size);											
			$posts_get_first_img_url = $posts_get_first_img_url[0];
			
			$get_image = $posts_get_first_img_url;
			
		}else if($post_type == 'post' && has_post_thumbnail()){
			$get_image = $get_image[0];
			
		}else if($post_type == 'portfolio' && !has_post_thumbnail()){
			
			$all_slides     = get_post_meta($post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true);
			$gallery        = isset($all_slides['portfolio_gallery']) ? $all_slides['portfolio_gallery'] : '';
		    $portfolio_type = isset($all_slides['content_type']) ? $all_slides['content_type'] : '';
				
			$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
			$store_first_id = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
			$get_first_img_url = wp_get_attachment_image_src($store_first_id, $size);											
			$get_first_img_url = $get_first_img_url[0];
			
			$get_image = $get_first_img_url;
			
		}else{
			$get_image = $get_image[0];
		}
		
		if ($get_image) return $get_image;
}

//-----------------------------------------------------------> Get Date Format

function idealtheme_fun_get_date_format() {
	global $post;
	
	$hm_date = (idealtheme_option('date_format') !== '') ? idealtheme_option('date_format') : 'F, Y';
	echo get_the_date($hm_date, $post->ID);
}

//-----------------------------------------------------------> Set Default Avatar

if (idealtheme_option('default_avatar', 'url') !== '') {
	echo idealtheme_option('default_avatar', 'url');
	add_filter( 'avatar_defaults', 'idealtheme_fun_newgravatar' );
	function idealtheme_fun_newgravatar($avatar_defaults) {
		$myavatar = idealtheme_option('default_avatar', 'url');
		$avatar_defaults[$myavatar] = "Own";
		return $avatar_defaults;
	}
}

//-----------------------------------------------------------> Body Classes

function idealtheme_fun_body_class( $class ) {
	if (idealtheme_option('site_layout_style') != '') {
			$class[] = idealtheme_option('site_layout_style');
	}
	return $class;
}
add_filter( 'body_class', 'idealtheme_fun_body_class' );

//-----------------------------------------------------------> Custom Fields For Users Pages

add_filter( 'user_contactmethods', 'idealtheme_user_contact_methods');
function idealtheme_user_contact_methods( $user_contact ) {
	
	$user_contact['facebook'] = esc_html__( 'Facebook', 'theme' );
	$user_contact['twitter'] = esc_html__( 'Twitter', 'theme' );
	$user_contact['dribbble'] = esc_html__( 'Dribbble', 'theme' );
	$user_contact['google_plus'] = esc_html__( 'Google+', 'theme' );
	$user_contact['linkedin'] = esc_html__( 'Linkedin', 'theme' );
	$user_contact['blogger'] = esc_html__( 'Blogger', 'theme' );
	$user_contact['tumblr'] = esc_html__( 'Tumblr', 'theme' );
	$user_contact['reddit'] = esc_html__( 'Reddit', 'theme' );
	$user_contact['yahoo'] = esc_html__( 'Yahoo', 'theme' );
	$user_contact['deviantart'] = esc_html__( 'Deviantart', 'theme' );
	$user_contact['vimeo'] = esc_html__( 'Vimeo', 'theme' );
	$user_contact['youtube'] = esc_html__( 'Youtube', 'theme' );
	$user_contact['pinterest'] = esc_html__( 'Pinterest', 'theme' );
	$user_contact['digg'] = esc_html__( 'Digg', 'theme' );
	$user_contact['flickr'] = esc_html__( 'Flickr', 'theme' );
	$user_contact['forrst'] = esc_html__( 'Forrst', 'theme' );
	$user_contact['skype'] = esc_html__( 'Skype', 'theme' );
	$user_contact['instagram'] = esc_html__( 'Instagram', 'theme' );
	$user_contact['paypal'] = esc_html__( 'PayPal', 'theme' );
	$user_contact['dropbox'] = esc_html__( 'Dropbox', 'theme' );
	$user_contact['soundcloud'] = esc_html__( 'Soundcloud', 'theme' );
	
	return $user_contact;
}

//=========================================> Comments
// Allow Comments on Pages by Default

function idealtheme_open_comments_for_pages( $status, $post_type, $comment_type ) {
	if ( 'page' === $post_type ) {
		if ( in_array( $comment_type, array( 'pingback', 'trackback' ) ) ) {
			$status = get_option( 'default_ping_status' );
		} else {
			$status = get_option( 'default_comment_status' );
		}
	}

	return $status;
}
add_filter( 'get_default_comment_status', 'idealtheme_open_comments_for_pages', 10, 3 );

add_filter( "get_comment_author_link", "idealtheme_fun_comment_author_url" );
function idealtheme_fun_comment_author_url( $author_link ){
	return str_replace( '<a', '<a', $author_link );
}

//=========================================> Get Comment Nums

function idealtheme_get_comments_num() {
	$num_comments = get_comments_number();
	
	if ( comments_open() ) {
		if ( $num_comments == 0 ) {
			$comments = esc_html__( 'No Comments', 'enar');
		} elseif ( $num_comments > 1 ) {
			$comments = $num_comments . esc_html__( ' Comments', 'enar');
		} else {
			$comments = esc_html__( '1 Comment', 'enar');
		}
		$write_comments = $comments;
	} else {
		$write_comments =  esc_html__( 'Comments are off for this post.', 'enar');
	}
	
	return $write_comments; 
}

//=========================================> Get Format Icon

function idealtheme_get_format_icon( $post_id ) {
	global $post;
	global $enar_custom_portfolio_metabox;
	
	$format_icon = ''; 
	$get_format = (get_post_format($post_id)) ? get_post_format($post_id) : ''; 
	$format_link_related = (get_post_format_link($get_format)) ? get_post_format_link($get_format) : '';
	
	$portfolio_slides = get_post_meta( $post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true );
	$portfolio_type   = isset( $portfolio_slides['content_type'] ) ? $portfolio_slides['content_type'] : '';
							
	if     ($get_format == 'image' || $portfolio_type == 'image' ){$format_icon = 'ico-image4';}
	else if($get_format == 'quote'){$format_icon = 'ico-quote-right';}
	else if($get_format == 'gallery' || $portfolio_type == 'gallery' ){$format_icon = 'ico-gallery';}
	else if($get_format == 'audio' || $portfolio_type == 'audio' ){$format_icon = 'ico-sound3';}
	else if($get_format == 'video' || $portfolio_type == 'video' ){$format_icon = 'ico-video-camera';} //ico-video-camera2
	else if($get_format == 'link'){$format_icon = 'ico-hyperlink';}
	else if($get_format == 'chat'){$format_icon = 'ico-chat2';}
	else   {$format_icon = 'ico-pencil4';}
	
	return $format_icon; 
}

//=========================================> Get Posts & Categories As Array

function idealtheme_get_posts_cats( $hm_type = 'portfolio', $hm_tax = 'portfolio_category', $hm_get_what = 'get_cats'){
	global $post;
	//$hm_type     ==> post - portfolio
    //$hm_tax      ==> category - portfolio_category
	//$hm_get_what ==> get_posts - get_cats
	
	if ( !post_type_exists( $hm_type) ) {
		return;
	}
		
	$hm_args       = array('post_type' => $hm_type,'post_status' => 'publish','posts_per_page' => -1, 'taxonomy'=> $hm_tax);
	$the_query     = get_posts( $hm_args);
	$hm_categories = get_categories($hm_args);
	
	$hm_posts_store = array();
	$hm_posts       = array();
	$hm_posts_con   = array();
	
	$hm_cats_store = array();
	$hm_cats       = array();
	$hm_cats_con   = array();
	
	if($the_query){
		foreach($the_query as $post) {
			$hm_posts_store[$post->ID] = $post->post_title;
		}
		foreach($hm_posts_store as $id => $name) {
			$hm_posts['name'] = $id;
			$hm_posts['value'] = $name;
			$hm_posts_con[] = $hm_posts;
		}
	}
	
	if($hm_categories){
		
		foreach($hm_categories as $cat) {
			if( isset($cat->term_id)){
				$hm_cats_store[$cat->term_id] = $cat->name;
			}
		}
		foreach($hm_cats_store as $id => $name) {
			$hm_cats['name'] = $id;
			$hm_cats['value'] = $name;
			$hm_cats_con[] = $hm_cats;
		}
	}
	
	if( $hm_get_what == 'get_posts' ){
		return $hm_posts_con;
	}else{
		return $hm_cats_con;
	}	
}

//----------------------------------------------------------------------------------> Get Categories

function idealtheme_get_cats_html( $hm_tax = 'category', $with_links = true ){
	global $post;

	$get_the_terms     = get_the_terms(get_the_ID(), $hm_tax);
	$store_caaaaats    = '';
	$store_caaaaats_id = array();
	$numItems          = count($get_the_terms);
	$i                 = 0;
	
	if($get_the_terms){
		foreach ( $get_the_terms as $term ) {
			
			$term_link = get_term_link( $term );
			if ( is_wp_error( $term_link ) ) {
				continue;
			}
			if ($with_links){
				$store_caaaaats .= '<span><a href="' . esc_url( $term_link ) . '">' . esc_html($term->name) . '</a></span>';
			}else{
				$store_caaaaats .= '<span>' . esc_html($term->name) . '</span>';
			}
			
			$store_caaaaats_id[] = $term->term_id;
						
			if(++$i !== $numItems) {
				$store_caaaaats .= ', ';
			}
		}
		$store_caaaaats_id_implode = join(",", $store_caaaaats_id);
	}
	return $store_caaaaats;
}

//----------------------------------------------------------------------------------> Single Post
	
function idealtheme_hosted_a($audio_mp3 = '', $audio_ogg = '', $audio_m4a = '', $audio_wav = '', $audio_wma= ''){
	global $post;
	
	$audio_mp3 = ( $audio_mp3 !== '' ) ? '<source src="'.esc_url($audio_mp3).'" type="audio/mp3" />' : '';
	$audio_ogg = ( $audio_ogg !== '' ) ? '<source src="'.esc_url($audio_ogg).'" type="audio/ogg" />' : '';
	$audio_m4a = ( $audio_m4a !== '' ) ? '<source src="'.esc_url($audio_m4a).'" type="audio/m4a" />' : '';
	$audio_wav = ( $audio_wav !== '' ) ? '<source src="'.esc_url($audio_wav).'" type="audio/wav" />' : '';
	$audio_wma = ( $audio_wma !== '' ) ? '<source src="'.esc_url($audio_wma).'" type="audio/wma" />' : '';
	
	$output = '<audio class="hosted_audio" id="audio_player_1" preload="metadata" controls="controls">
					'.$audio_mp3.$audio_ogg.$audio_m4a.$audio_wav.$audio_wma.'
			   </audio>';
	
	wp_enqueue_script('enar_idealtheme_mediaelement_js');
	wp_enqueue_style('enar_idealtheme_mediaelement_css');
	
	return $output;
}

function idealtheme_hosted_v( $video_poster = '', $video_mp4 = '', $video_webm = '', $video_ogv = '', $video_flv = '', $video_wmv = '', $video_m4v = '' ){
	global $post;
	
	$video_mp4  = ( $video_mp4 !== '' ) ? '<source type="video/mp4" src="'.esc_url($video_mp4).'" />' : '';
	$video_webm = ( $video_webm !== '' ) ? '<source type="video/webm" src="'.esc_url($video_webm).'" />' : '';
	$video_ogv  = ( $video_ogv !== '' ) ? '<source type="video/ogg" src="'.esc_url($video_ogv).'" />' : '';
	$video_flv  = ( $video_flv !== '' ) ? '<source type="video/flv" src="'.esc_url($video_flv).'" />' : '';
	$video_wmv  = ( $video_wmv !== '' ) ? '<source type="video/wmv" src="'.esc_url($video_wmv).'" />' : '';
	$video_m4v  = ( $video_m4v !== '' ) ? '<source type="video/m4v" src="'.esc_url($video_m4v).'" />' : '';
	
	
	$output = '<video class="hosted_video" poster="'.esc_url($video_poster).'" preload="metadata" controls="controls" style="width:100%;height:100%;">
				'.$video_mp4.$video_webm.$video_ogv.$video_flv.$video_wmv.$video_m4v.'
			</video>';
	
	wp_enqueue_script('enar_idealtheme_mediaelement_js');
	wp_enqueue_style('enar_idealtheme_mediaelement_css');
	
	return $output;
}

function idealtheme_get_media_scripts($get_pots_from){
	
	global $post;
	global $enar_custom_posts_audio;
	global $enar_custom_posts_video;
	
	$all_ids = get_posts( array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	) );
	
	$all_ids_arr = wp_list_pluck( $all_ids, 'ID' );
    if ($all_ids_arr && $get_pots_from == 'post'){
		foreach( $all_ids_arr as $post_id){
			
			$aud_type = get_post_meta($post_id, $enar_custom_posts_audio->get_the_ID(), true);
            $aud_type = isset($aud_type['audio_type']) ? $aud_type['audio_type'] : '';
				
			$vid_type = get_post_meta($post_id, $enar_custom_posts_video->get_the_ID(), true);
            $vid_type = isset($vid_type['video_type']) ? $vid_type['video_type'] : '';
							
			$is_audio = has_post_format('audio',$post_id);
			$is_video = has_post_format('video',$post_id);

			if ( $is_audio || $is_video ){
				if ( $aud_type == 'self_hosted' || $vid_type == 'self_hosted' ) {
					
					wp_enqueue_script('enar_idealtheme_mediaelement_js');
					wp_enqueue_style('enar_idealtheme_mediaelement_css');
				}
			}
		}
	}
}

//----------------------------------------------------------------------------------> Bbpress

// Remove Bbpress Default Style
add_action( 'wp_print_styles', 'idealtheme_register_bbpress_styles', 10 );
function idealtheme_register_bbpress_styles() {
 	wp_deregister_style( 'bbp-default' );
}

/**
 * Gets the items for the breadcrumb trail if bbPress is installed.
 *
 * @since 0.5.0
 * @access public
 * @param array $args Mixed arguments for the menu.
 * @return array List of items to be shown in the trail.
 */
function tc_breadcrumb_trail_get_bbpress_items( $args = array() ) {
	/* Set up a new trail items array. */
	$trail = array();
	/* Get the forum post type object. */
	$post_type_object = get_post_type_object( bbp_get_forum_post_type() );
	/* If not viewing the forum root/archive page and a forum archive exists, add it. */
	if ( !empty( $post_type_object->has_archive ) && !bbp_is_forum_archive() )
		$trail[] = '<a href="' . get_post_type_archive_link( bbp_get_forum_post_type() ) . '">' . bbp_get_forum_archive_title() . '</a>';
	/* If viewing the forum root/archive. */
	if ( bbp_is_forum_archive() ) {
		$trail[] = bbp_get_forum_archive_title();
	}
	/* If viewing the topics archive. */
	elseif ( bbp_is_topic_archive() ) {
		$trail[] = bbp_get_topic_archive_title();
	}
	/* If viewing a topic tag archive. */
	elseif ( bbp_is_topic_tag() ) {
		$trail[] = bbp_get_topic_tag_name();
	}
	/* If viewing a topic tag edit page. */
	elseif ( bbp_is_topic_tag_edit() ) {
		$trail[] = '<a href="' . bbp_get_topic_tag_link() . '">' . bbp_get_topic_tag_name() . '</a>';
		$trail[] = esc_html__( 'Edit' , 'customizr' );
	}
	/* If viewing a "view" page. */
	elseif ( bbp_is_single_view() ) {
		$trail[] = bbp_get_view_title();
	}
	/* If viewing a single topic page. */
	elseif ( bbp_is_single_topic() ) {
		/* Get the queried topic. */
		$topic_id = get_queried_object_id();
		/* Get the parent items for the topic, which would be its forum (and possibly forum grandparents). */
		$trail = array_merge( $trail, $this -> tc_breadcrumb_trail_get_parents( bbp_get_topic_forum_id( $topic_id ) ) );
		/* If viewing a split, merge, or edit topic page, show the link back to the topic.  Else, display topic title. */
		if ( bbp_is_topic_split() || bbp_is_topic_merge() || bbp_is_topic_edit() )
			$trail[] = '<a href="' . bbp_get_topic_permalink( $topic_id ) . '">' . bbp_get_topic_title( $topic_id ) . '</a>';
		else
			$trail[] = bbp_get_topic_title( $topic_id );
		/* If viewing a topic split page. */
		if ( bbp_is_topic_split() )
			$trail[] = esc_html__( 'Split' , 'customizr' );
		/* If viewing a topic merge page. */
		elseif ( bbp_is_topic_merge() )
			$trail[] = esc_html__( 'Merge' , 'customizr' );
		/* If viewing a topic edit page. */
		elseif ( bbp_is_topic_edit() )
			$trail[] = esc_html__( 'Edit' , 'customizr' );
	}
	/* If viewing a single reply page. */
	elseif ( bbp_is_single_reply() ) {
		/* Get the queried reply object ID. */
		$reply_id = get_queried_object_id();
		/* Get the parent items for the reply, which should be its topic. */
		$trail = array_merge( $trail, $this -> tc_breadcrumb_trail_get_parents( bbp_get_reply_topic_id( $reply_id ) ) );
		/* If viewing a reply edit page, link back to the reply. Else, display the reply title. */
		if ( bbp_is_reply_edit() ) {
			$trail[] = '<a href="' . bbp_get_reply_url( $reply_id ) . '">' . bbp_get_reply_title( $reply_id ) . '</a>';
			$trail[] = esc_html__( 'Edit' , 'customizr' );
		} else {
			$trail[] = bbp_get_reply_title( $reply_id );
		}
	}
	/* If viewing a single forum. */
	elseif ( bbp_is_single_forum() ) {
		/* Get the queried forum ID and its parent forum ID. */
		$forum_id = get_queried_object_id();
		$forum_parent_id = bbp_get_forum_parent_id( $forum_id );
		/* If the forum has a parent forum, get its parent(s). */
		if ( 0 !== $forum_parent_id)
			$trail = array_merge( $trail, $this -> tc_breadcrumb_trail_get_parents( $forum_parent_id ) );
		/* Add the forum title to the end of the trail. */
		$trail[] = bbp_get_forum_title( $forum_id );
	}
	/* If viewing a user page or user edit page. */
	elseif ( bbp_is_single_user() || bbp_is_single_user_edit() ) {
		if ( bbp_is_single_user_edit() ) {
			$trail[] = '<a href="' . bbp_get_user_profile_url() . '">' . bbp_get_displayed_user_field( 'display_name' ) . '</a>';
			$trail[] = esc_html__( 'Edit' , 'customizr' );
		} else {
			$trail[] = bbp_get_displayed_user_field( 'display_name' );
		}
	}
	/* Return the bbPress breadcrumb trail items. */
	return apply_filters( 'breadcrumb_trail_get_bbpress_items' , $trail, $args );
}