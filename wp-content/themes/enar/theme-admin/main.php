<?php

define ('ENAR_URI' , get_template_directory_uri());
define ('ENAR_DIR' , get_template_directory());
define ('ENAR_JS' , ENAR_URI . '/js');
define ('ENAR_CSS' , ENAR_URI . '/css');
define ('ENAR_IMG' , ENAR_URI . '/images');

define ('ENAR_ADMIN', ENAR_DIR . '/theme-admin');
define ('ENAR_FUN', ENAR_ADMIN . '/functions');
define ('ENAR_SC', ENAR_ADMIN . '/shortcodes');
define ('ENAR_TYPES', ENAR_ADMIN . '/custom-post-types');
define ('ENAR_WIDGETS', ENAR_ADMIN . '/widgets');
define ('ENAR_INC', ENAR_ADMIN . '/inc');
define ('ENAR_VC', ENAR_ADMIN . '/vc');

//=======================================================================> Theme Includes

include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); //For use is_plugin_active functions
require_once( ENAR_ADMIN . '/plugins/plugins.php');
require_once( ENAR_FUN ."/functions.php");
require_once( ENAR_SC ."/shortcodes.php");
require_once( ENAR_DIR . '/theme-admin/elements/menu_walker.php' );
require_once( ENAR_DIR . '/theme-admin/elements/comments.php' );

foreach ( glob( ENAR_WIDGETS . '/*.php' ) as $file ){require_once $file;}
foreach ( glob( ENAR_INC . '/*.php' ) as $file ){require_once $file;}
require_once( ENAR_VC . '/visual_composer_sc.php' );

require_once( ENAR_ADMIN . '/ajax/timeline-ajax.php' );
require_once( ENAR_ADMIN . '/ajax/grid-ajax.php' );
require_once( ENAR_ADMIN . '/ajax/masonry-ajax.php' );
require_once( ENAR_ADMIN . '/ajax/filter-more.php' );

//=====================================================================================> Shortcodes Light-Box

function idealtheme_fun_shortcode_init_buttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
		
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "idealtheme_fun_shortcode_add_buttons_plugin");
		add_filter('mce_buttons', 'idealtheme_fun_shortcode_register_buttons');
	}
}
add_action('init', 'idealtheme_fun_shortcode_init_buttons');

function idealtheme_fun_shortcode_add_buttons_plugin($plugin_array) {
   $plugin_array['popupbutton'] = get_template_directory_uri() . '/theme-admin/shortcodes/tinymcepopup.js';
	return $plugin_array;
}

function idealtheme_fun_shortcode_register_buttons($buttons) {
	array_push( $buttons, "popup" );
	return $buttons;
}

//=======================================================================> Theme Options

if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/theme-admin/options/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( get_template_directory() . '/theme-admin/options/ReduxFramework/ReduxCore/framework.php' );
}

if ( file_exists( ENAR_ADMIN . '/options/theme_options.php' ) ) {
	require_once( ENAR_ADMIN . '/options/theme_options.php' );
}

function idealtheme_option( $option, $array=null )
{
	if(defined('ICL_LANGUAGE_CODE')) {
		$lang = ICL_LANGUAGE_CODE;
		global $enar_opt_name;
		global ${$enar_opt_name};

		if($array) {
			if(isset(${$enar_opt_name}[$option][$array])) {
				return ${$enar_opt_name}[$option][$array];
			}
		} else {
			if(isset(${$enar_opt_name}[$option])) {
		   		return ${$enar_opt_name}[$option];
			}
		}		
		
	} else {
		global $idealtheme_options;
		if($array) {
			if(isset($idealtheme_options[$option][$array])) {
				return $idealtheme_options[$option][$array];
			}
		} else {
			if(isset($idealtheme_options[$option])) {
		     	return $idealtheme_options[$option];
			}
		}
	}
}

//========================================================================> Woocommerce

if ( class_exists( 'woocommerce' ) ) {
	include_once ENAR_ADMIN . '/woocommerce/woocommerce.php';
}

//========================================================================> Jquery Files

function idealtheme_register_blugins_scripts() {
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'enar_idealtheme_plugins', get_template_directory_uri() . '/js/plugins.min.js', 'jquery', '1.0', true);
	wp_enqueue_script( 'enar_idealtheme_functions', get_template_directory_uri() . '/js/functions.js', array('jquery', 'enar_idealtheme_plugins'), '1.0', true);
	
	wp_register_script('enar_idealtheme_isotope_js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', 'jquery', '1.0', true);
	wp_enqueue_script( 'enar_idealtheme_isotope_js');
	
	wp_register_script('enar_idealtheme_mediaelement_js', get_template_directory_uri() . '/js/mediaelement-and-player.min.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_flexslider_min_js', get_template_directory_uri() . '/js/flexslider-min.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_classie_js', get_template_directory_uri() . '/js/classie.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_hoverdir_js', get_template_directory_uri() . '/js/hoverdir.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_camera_min_js', get_template_directory_uri() . '/js/camera.min.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_wobbly_min_js', get_template_directory_uri() . '/js/wobbly-min.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_modernizr_js', get_template_directory_uri() . '/js/modernizr.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_photostack_js', get_template_directory_uri() . '/js/photostack.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_boxesfx_js', get_template_directory_uri() . '/js/boxesFx.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_yt_player_js', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.min.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_videobackground_js', get_template_directory_uri() . '/js/jquery.videobackground.js', 'jquery', '1.0', true);
	wp_register_script('enar_idealtheme_progressbar', get_template_directory_uri() . '/js/progressbar.min.js', 'jquery', '1.0', true );
	wp_register_script('enar_idealtheme_maps', 'https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true', 'jquery', '1.0', true  );
	wp_register_script('enar_idealtheme_mapmarker', get_template_directory_uri() . '/js/gmaps.js', array('jquery', 'enar_idealtheme_maps'), '1.0', true );
	
	wp_register_style('enar_idealtheme_mediaelement_css', get_template_directory_uri(). '/css/mediaelementplayer.css', array(), '1.0', 'all', true);
	wp_enqueue_style('enar_idealtheme_mediaelement_css');
	
	wp_register_style('enar_idealtheme_sliders_css', get_template_directory_uri() . '/css/sliders.css', array(), '1.0', 'all');
	wp_enqueue_style('enar_idealtheme_sliders_css');
	
	wp_enqueue_style( 'enar_idealtheme_main_style', get_template_directory_uri().'/css/style.css', array(), '1.0', 'all');
	wp_enqueue_style( 'enar_idealtheme_animate_style', get_template_directory_uri().'/css/animate.min.css', array(), '1.0', 'all');
	wp_enqueue_style( 'enar_idealtheme_icon_fonts_style', get_template_directory_uri().'/css/icon-fonts.css', array(), '1.0', 'all');
	
	if (function_exists('is_bbpress')){
		if ( is_bbpress() ){
			wp_enqueue_style( 'enar_idealtheme_bbpress_style', get_template_directory_uri().'/css/bbpress.css', array(), '1.0', 'all');
		}
	}
	
	if( idealtheme_option('theme_color_mode') == 'dark' ){
		wp_enqueue_style( 'enar_idealtheme_dark_style', get_template_directory_uri().'/css/dark.css', array(), '1.0', 'all');
	}
	
	wp_register_style( 'enar_idealtheme_rtl_style', get_template_directory_uri().'/css/rtl.css', array(), '1.0', 'all');
	if ( idealtheme_option('site_rtl_style') == true ){
		wp_enqueue_style('enar_idealtheme_rtl_style');
	}
	if( defined('ICL_LANGUAGE_CODE') ) {
		$curr_lang = ICL_LANGUAGE_CODE;
		if ( $curr_lang == "he" || $curr_lang == "ar" ){
			wp_enqueue_style('enar_idealtheme_rtl_style');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'idealtheme_register_blugins_scripts' );

//========================================================================> Admin Clumn
function idealtheme_fun_sliders_cpt_columns($columns) {
	unset(
		$columns['ssid']
	);
	
	$new_columns = array(
		'shortcode' => esc_html__( 'Shortcode', 'enar'),
	);
    return array_merge($columns, $new_columns);
}
add_filter('manage_sliders_posts_columns' , 'idealtheme_fun_sliders_cpt_columns');

add_action('manage_sliders_posts_custom_column', 'idealtheme_fun_manage_sliders_columns', 10, 2);
function idealtheme_fun_manage_sliders_columns($column_name, $id) {
	global $post;
	global $enar_post_type_gallery_sc;
	
	$idealtheme_slides = get_post_meta(get_the_ID(), $enar_post_type_gallery_sc->get_the_ID(), true);
	$hm_slides_type    = isset($idealtheme_slides['slider_type']) ? $idealtheme_slides['slider_type'] : '';
	
    switch ($column_name) {
    case 'shortcode':
        echo '<span>[hm_sliders type="'.esc_attr($hm_slides_type).'" id="'.esc_attr($id).'"]</span>';
            break;
   
    default:
        break;
    } // end switch
}

//=======================================================================> Theme Metaboxes

if ( file_exists( ENAR_DIR . '/theme-admin/metaboxes/meta-box.php' ) ) {
	require_once( ENAR_DIR . '/theme-admin/metaboxes/meta-box.php' );
}

if ( file_exists( ENAR_DIR . '/theme-admin/metaboxes/demo/demo.php' ) ) {
	require_once( ENAR_DIR . '/theme-admin/metaboxes/demo/demo.php' );
}

include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/MetaBox.php');
include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/MediaAccess.php');

include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/inc/gallery-spec.php');
include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/inc/portfolio-spec.php');
include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/inc/members-spec.php');
include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/inc/members_social-spec.php');
include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/inc/audio-spec.php');
include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/inc/video-spec.php');
include_once ( ENAR_DIR . '/theme-admin/metaboxes/idealtheme/inc/gallery_sc-spec.php');

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

// global styles for the meta boxes
if (is_admin()) add_action('admin_enqueue_scripts', 'idealtheme_fun_metabox_style');

function idealtheme_fun_metabox_style() {
	wp_enqueue_style('enar_idealtheme_wpalchemy-metabox', get_stylesheet_directory_uri() . '/theme-admin/metaboxes/idealtheme/css/meta.css');
}

//=======================================================================> Admin Style and Sripts

function idealtheme_fun_my_custom_css_for_admin() {
    wp_enqueue_style('enar_idealtheme_admin_style', get_stylesheet_directory_uri() . '/css/admin_style.css');
	wp_enqueue_script( 'enar_idealtheme_admin_script', get_stylesheet_directory_uri() . '/js/admin_style.js' );
}
add_action('admin_enqueue_scripts', 'idealtheme_fun_my_custom_css_for_admin');

//=======================================================================>	Define Walker - Setup Fields - Save Fields

if(basename( $_SERVER['PHP_SELF']) == "nav-menus.php" ) {
    add_action('admin_menu', 'idealtheme_fun_admin_menu_custom_style');
}

function idealtheme_fun_admin_menu_custom_style()
{
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
}

add_action( 'wp_update_nav_menu_item', 'idealtheme_fun_update_menu_fields', 10, 3 );
function idealtheme_fun_update_menu_fields( $menu_id, $menu_item_db_id, $args ) {
	if (isset($_REQUEST['menu-item-idealtheme_one_page']) && is_array($_REQUEST['menu-item-idealtheme_one_page'])) {
		$idealtheme_one_page_value = $_REQUEST['menu-item-idealtheme_one_page'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_idealtheme_one_page', $idealtheme_one_page_value );
	}
	if (isset($_REQUEST['menu-item-idealtheme_sub_menu_type']) && is_array($_REQUEST['menu-item-idealtheme_sub_menu_type'])) {
		$idealtheme_sub_menu_type_value = $_REQUEST['menu-item-idealtheme_sub_menu_type'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_idealtheme_sub_menu_type', $idealtheme_sub_menu_type_value );
	}
	if (isset($_REQUEST['menu-item-color_picker'])) {
		$color_picker_value = $_REQUEST['menu-item-color_picker'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_color_picker', $color_picker_value );
	}
	if (isset($_REQUEST['menu-item-choose_icon'])) {
		$choose_icon_value = $_REQUEST['menu-item-choose_icon'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_choose_icon', $choose_icon_value );
	}
	if (isset($_REQUEST['menu-item-idealtheme_menu_type']) && is_array($_REQUEST['menu-item-idealtheme_menu_type'])) {
		$idealtheme_menu_type_value = $_REQUEST['menu-item-idealtheme_menu_type'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_idealtheme_menu_type', $idealtheme_menu_type_value );
	}
}

add_filter( 'wp_setup_nav_menu_item','idealtheme_fun_custom_nav_item_fields' );
function idealtheme_fun_custom_nav_item_fields($menu_item) {
    $menu_item->idealtheme_one_page = get_post_meta( $menu_item->ID, '_menu_item_idealtheme_one_page', true );
	$menu_item->idealtheme_sub_menu_type = get_post_meta( $menu_item->ID, '_menu_item_idealtheme_sub_menu_type', true );
	$menu_item->color_picker = get_post_meta( $menu_item->ID, '_menu_item_color_picker', true );
	$menu_item->choose_icon = get_post_meta( $menu_item->ID, '_menu_item_choose_icon', true );
	$menu_item->idealtheme_menu_type = get_post_meta( $menu_item->ID, '_menu_item_idealtheme_menu_type', true );
    return $menu_item;
}

add_filter( 'wp_edit_nav_menu_walker', 'idealtheme_fun_custom_nav_edit_walker',10,2 );
function idealtheme_fun_custom_nav_edit_walker($walker,$menu_id) {
    return 'Idealtheme_HM_Walker_Nav_Menu_Edit_Custom';
}


//========================================================================> Custom MenuWalker to create custom field 

class Idealtheme_HM_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
	
	function start_lvl( &$output, $depth = 0, $args = array() ) {}
	
	function end_lvl( &$output, $depth = 0, $args = array() ) {}
	
	function start_el( &$output, $item, $depth = 0, $args = array() , $id = 0 ) {
	    global $_wp_nav_menu_max_depth;
	   
	    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
	
	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	    ob_start();
	    $item_id = esc_attr( $item->ID );
	    $removed_args = array(
	        'action',
	        'customlink-tab',
	        'edit-menu-item',
	        'menu-item',
	        'page-tab',
	        '_wpnonce',
	    );
	
	    $original_title = '';
	    if ( 'taxonomy' == $item->type ) {
	        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
	        if ( is_wp_error( $original_title ) )
	            $original_title = false;
	    } elseif ( 'post_type' == $item->type ) {
	        $original_object = get_post( $item->object_id );
	        if (!empty($original_object->post_title)) $original_title = $original_object->post_title;
	    }
	
	    $classes = array(
	        'menu-item menu-item-depth-' . $depth,
	        'menu-item-' . esc_attr( $item->object ),
	        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
	    );
	
	    $title = $item->title;
	
	    if ( ! empty( $item->_invalid ) ) {
	        $classes[] = 'menu-item-invalid';
	        /* translators: %s: title of menu item which is invalid */
	        $title = sprintf( esc_html__( '%s (Invalid)', 'enar' ), $item->title );
	    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
	        $classes[] = 'pending';
	        /* translators: %s: title of menu item in draft status */
	        $title = sprintf( esc_html__( '%s (Pending)', 'enar'), $item->title );
	    }
	
	    $title = empty( $item->label ) ? $title : $item->label;
	
	    ?>
	    <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo esc_attr(implode(' ', $classes )); ?>">
	        <dl class="menu-item-bar">
	            <dt class="menu-item-handle">
	                <span class="item-title"><?php echo esc_html( $title ); ?></span>
	                <span class="item-controls">
	                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
	                    <span class="item-order hide-if-js">
	                        <a href="<?php
	                            echo esc_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-up-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'enar'); ?>">&#8593;</abbr></a>
	                        |
	                        <a href="<?php
	                            echo esc_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-down-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'enar'); ?>">&#8595;</abbr></a>
	                    </span>
	                    <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'enar'); ?>" href="<?php
	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? esc_url(admin_url( 'nav-menus.php' )) : esc_url(add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) ) );
	                    ?>"><?php esc_html_e( 'Edit Menu Item', 'enar' ); ?></a>
	                </span>
	            </dt>
	        </dl>
	
	        <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
	            <?php if( 'custom' == $item->type ) : ?>
	                <p class="field-url description description-wide">
	                    <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
	                        <?php esc_html_e( 'URL', 'enar' ); ?><br />
	                        <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
	                    </label>
	                </p>
	            <?php endif; ?>
	            <p class="description description-thin">
	                <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
	                    <?php esc_html_e( 'Navigation Label', 'enar' ); ?><br />
	                    <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
	                </label>
	            </p>
	            <p class="description description-thin">
	                <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
	                    <?php esc_html_e( 'Title Attribute', 'enar' ); ?><br />
	                    <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
	                </label>
	            </p>
	            <p class="field-link-target description">
	                <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
	                    <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
	                    <?php esc_html_e( 'Open link in a new window/tab', 'enar' ); ?>
	                </label>
	            </p>
	            <p class="field-css-classes description description-thin">
	                <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
	                    <?php esc_html_e( 'CSS Classes (optional)', 'enar' ); ?><br />
	                    <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
	                </label>
	            </p>
	            <p class="field-xfn description description-thin">
	                <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
	                    <?php esc_html_e( 'Link Relationship (XFN)', 'enar' ); ?><br />
	                    <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
	                </label>
	            </p>
	            <p class="field-description description description-wide">
	                <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
	                    <?php esc_html_e( 'Description', 'enar' ); ?><br />
	                    <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
	                    <span class="description"><?php esc_html_e( 'The description will be displayed in the menu if the current theme supports it.', 'enar' ); ?></span>
	                </label>
	            </p> 
				       
	            <?php //=======================> This is the added field ============== ?>      
	            <p class="field-custom description description-thin">
	                <label for="edit-menu-item-idealtheme_one_page-<?php echo esc_attr($item_id); ?>"><?php esc_html_e( 'Link Navigation To', 'enar' ); ?></label><br />
					<select class="idealtheme_one_page_select" id="edit-menu-item-idealtheme_one_page-<?php echo esc_attr($item_id); ?>" name="menu-item-idealtheme_one_page[<?php echo esc_attr($item_id); ?>]">                  	
                  	<option value="page" <?php selected('page' , esc_attr( $item->idealtheme_one_page ) , true); ?>><?php esc_html_e( 'Normal Page' , 'enar'); ?></option>
                    <option value="section" <?php selected('section' , esc_attr( $item->idealtheme_one_page ) , true); ?>><?php esc_html_e( 'One Page Section' , 'enar'); ?></option>
                  </select>
	            </p>
                
                <p class="field-custom description description-thin">
	                <label for="edit-menu-item-idealtheme_sub_menu_type-<?php echo esc_attr($item_id); ?>"><?php esc_html_e( 'Sub Menu Type', 'enar' ); ?></label><br />
					<select class="idealtheme_sub_menu_type_select" id="edit-menu-item-idealtheme_sub_menu_type-<?php echo esc_attr($item_id); ?>" name="menu-item-idealtheme_sub_menu_type[<?php echo esc_attr($item_id); ?>]">                  	
                  	<option value="normal" <?php selected('normal' , esc_attr( $item->idealtheme_sub_menu_type ) , true); ?>><?php esc_html_e( 'Normal Menu' , 'enar'); ?></option>
                    <option value="mega" <?php selected('mega' , esc_attr( $item->idealtheme_sub_menu_type ) , true); ?>><?php esc_html_e( 'Mega Menu' , 'enar'); ?></option>
                    <!--<option value="tabs" <?php selected('tabs' , esc_attr( $item->idealtheme_sub_menu_type ) , true); ?>><?php esc_html_e( 'Tabs Menu' , 'enar'); ?></option>-->
                    <option value="slider" <?php selected('slider' , esc_attr( $item->idealtheme_sub_menu_type ) , true); ?>><?php esc_html_e( 'Slider Menu' , 'enar'); ?></option>
                  </select>
	            </p>
                
                <p class="description description-thin">
	                <label for="edit-menu-item-attr-color_picker-<?php echo esc_attr($item_id); ?>">
	                    <?php esc_html_e( 'Choose Color', 'enar' ); ?><br />
                        <input type="text" id="edit-menu-item-color_picker-<?php echo esc_attr($item_id); ?>" class="idealtheme_color_picker" name="menu-item-color_picker[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->color_picker ); ?>" />
                        
	                </label>
	            </p>
                
                <p class="description description-thin">
	                <label class="chooser_icon_con" for="edit-menu-item-attr-choose_icon-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Choose Icon', 'enar' ); ?><br />
	                    <a href="#" class="choose_icon_for_menu"><?php esc_html_e( 'Select Icon', 'enar' ); ?></a>
                        <input type="text" id="edit-menu-item-choose_icon-<?php echo esc_attr($item_id); ?>" class="idealtheme_choose_icon_menu" name="menu-item-choose_icon[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->choose_icon ); ?>" />
                        <i id="menu_icon" class="<?php echo esc_attr( $item->choose_icon ); ?>"><i id="remove_menu" class="ico-close2"></i></i>
	                </label>
	            </p>
                
                <p class="field-custom description description-wide">
	                <label for="edit-menu-item-idealtheme_menu_type-<?php echo esc_attr($item_id); ?>"><?php esc_html_e( 'Display', 'enar' ); ?></label><br />
					<select class="idealtheme_menu_type_select" id="edit-menu-item-idealtheme_menu_type-<?php echo esc_attr($item_id); ?>" name="menu-item-idealtheme_menu_type[<?php echo esc_attr($item_id); ?>]">
                  	<option value="all" <?php selected('all' , esc_attr( $item->idealtheme_menu_type ) , true); ?>><?php esc_html_e( 'Title And Icon' , 'enar'); ?></option>
                  	<option value="icon" <?php selected('icon' , esc_attr( $item->idealtheme_menu_type ) , true); ?>><?php esc_html_e( 'Icon Only' , 'enar'); ?></option>
                    <option value="title" <?php selected('title' , esc_attr( $item->idealtheme_menu_type ) , true); ?>><?php esc_html_e( 'Title Only' , 'enar'); ?></option>
                  </select>
	            </p>
                
	            <?php //========================> This is the added field ============= ?>
				
	            <div class="menu-item-actions description-wide submitbox">
	                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
	                    <p class="link-to-original">
	                        <?php printf( esc_html__( 'Original: %s' , 'enar'), '<a href="' . esc_url( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
	                    </p>
	                <?php endif; ?>
	                <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
	                echo esc_url(
	                    add_query_arg(
	                        array(
	                            'action' => 'delete-menu-item',
	                            'menu-item' => $item_id,
	                        ),
	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                    ),
	                    'delete-menu_item_' . $item_id
	                ); ?>"><?php esc_html_e( 'Remove', 'enar'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
	                    ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php esc_html_e( 'Cancel', 'enar'); ?></a>
	            </div>
	
	            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
	            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
	            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
	            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
	            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
	            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
	        </div><!-- .menu-item-settings-->
	        <ul class="menu-item-transport"></ul>
	    <?php
	    
	    $output .= ob_get_clean();

	    }
}

//=========================================================> Sort Pages Order By Menu Order

if ( ! function_exists( 'idealtheme_fun_get_all_page_sections' ) ) {
	
	function idealtheme_fun_get_all_page_sections($get_one_page_menu) {
		
		$all_sections = array();
		$get_option_id_for_blog = get_option('page_for_posts');
		$get_option_id_for_front = get_option('page_on_front');
		
		if ( has_nav_menu( $get_one_page_menu ) )  {
			
			$hm_menu_id = get_nav_menu_locations();
			$hm_menu_id = get_term( $hm_menu_id[$get_one_page_menu] , 'nav_menu' );
			$hm_menu_id = $hm_menu_id->term_id;
			
			$hm_menu_items = wp_get_nav_menu_items( $hm_menu_id , array( 'orderby' => 'menu_order') );
			
			foreach ( $hm_menu_items as $item ) { 
				if( $item->idealtheme_one_page == 'section' && $get_option_id_for_blog != $item->object_id && $get_option_id_for_front != $item->object_id) {
					$all_sections[] = $item->object_id;	
										
				}
			}
			return($all_sections);
		}
			
	}
}

//=====================================================> breadcrumbs

function idealtheme_fun_qt_custom_breadcrumbs() {
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '<span class="crumbs-spacer"><i class="ico-angle-right"></i></span>'; // delimiter between crumbs
  $home = esc_html__( 'Home','enar'); // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
  global $post;
  $homeLink = esc_url(home_url());
  if (is_home() || is_front_page()) {
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></div>';
  } else {
    echo '<div class="breadcrumbs"><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a> ' . $delimiter . ' ';
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo '<span class="current">' . 'Archive by category "' . single_cat_title('', false) . '"' . '</span>';
    } else if( is_archive() && has_post_format() && !is_day() && !is_month() && !is_year() && !is_single() && !is_attachment() && !is_tag()){
		echo '<span class="current">'.get_post_format().' format</span>';
	} elseif ( is_search() ) {
      echo '<span class="current">' . esc_html__("Search results for", 'enar').' "' . get_search_query() . '"' . '</span>';
    } elseif ( is_day() ) {
      echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo '<span class="current">' . get_the_time('d') . $after;
    } elseif ( is_month() ) {
      echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<span class="current">' . get_the_time('F') . $after;
    } elseif ( is_year() ) {
      echo '<span class="current">' . get_the_time('Y') . $after;
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' && !is_archive() ) {
		
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
		$get_custom_post_link = get_post_type_archive_link( get_post_type() );
        //echo '<a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
		if(get_post_type() == 'members'){
			echo esc_html($post_type->labels->singular_name);
		}else if(get_post_type() == 'portfolio'){
			echo esc_html($post_type->labels->singular_name);
		}else{
			//echo '<a href="' . esc_url($get_custom_post_link) . '">' . esc_html($post_type->labels->singular_name) . '</a>';
			echo esc_html($post_type->labels->singular_name);
		}
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats; if ($showCurrent == 1) echo '<span class="current">' . get_the_title() . $after;
      }
    } elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
		
		if ( function_exists( 'is_bbpress' ) && is_bbpress() )
		foreach (tc_breadcrumb_trail_get_bbpress_items() as $bbkey => $bbvalue){
			if( $bbkey !== 0 ){
				echo '<span class="crumbs-spacer"><i class="ico-angle-right"></i></span>'.$bbvalue;
			}else{
				echo esc_html($bbvalue);
			}
			
		}
	}elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	  //echo '<span class="current">' . apply_filters( 'the_title', $term->name ) . $after;
	  
      $post_type = get_post_type_object(get_post_type());
	  if(isset($post_type->labels->singular_name)){
		  echo '<span class="current">' . $post_type->labels->singular_name . $after;
	  }
	  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . esc_url(get_permalink($parent)) . '">' . esc_html($parent->post_title) . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo '<span class="current">' . get_the_title() . $after;
    } elseif ( is_page() && $post->post_parent ) {
	  
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        //$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
		$breadcrumbs[] = get_the_title($page->ID);
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo esc_html($breadcrumbs[$i]);
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    } elseif ( is_tag() ) {
      echo '<span class="current">' . 'Posts tagged "' . single_tag_title('', false) . '"' . '</span>';
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo '<span class="current">' . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif ( is_404() ) {
      echo '<span class="current">' . 'Error 404' . $after;
    }
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo esc_html__( ' Page' , 'enar') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</div>';
  }
}

//==============================================================================> Limit Content Text Words 

if ( !function_exists( 'idealtheme_content' ) ) {
	function idealtheme_content( $contenttype, $num_words ) {
		global $post;
		if ($contenttype == 'content') { $output_content = get_the_content(); }
		if ($contenttype == 'excerpt') { $output_content = get_the_excerpt(); }
		
		$output_content = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output_content );
		$output_content = preg_replace('/<img[^>]+./','', $output_content);
		
		$output_content = preg_replace('/\[.+\]/','', $output_content);
		$output_content = apply_filters('the_content', $output_content); 
		$output_content = str_replace(']]>', ']]&gt;', $output_content);
		$output_content = str_replace("<p>", "", $output_content);
		$output_content = str_replace("</p>", "", $output_content);
		
		$output_content = explode(' ', $output_content, $num_words);
		
		if ( count($output_content) >= $num_words) {
			array_pop($output_content);
			$output_content = implode(" ",$output_content).' ... ';
		} else {
			$output_content = implode(" ",$output_content);
		}	
		
		return $output_content;
	}
}

//==============>

function idealtheme_get_content_stripped( $words_length, $the_content, $enable_more_button = false ) {

	$get_pattern = get_shortcode_regex();
	$the_content = preg_replace_callback( "/$get_pattern/s", function ( $m ) {
		
		if ( $m[2] == 'hm_text' || $m[2] == 'hm_section' || $m[2] == 'vc_row' || $m[2] == 'vc_column' || $m[2] == 'vc_column_text' ) {
			return $m[0];
		}
	    	return $m[1] . $m[6];
		
	}, $the_content );

	$the_content = explode( ' ', $the_content, $words_length + 1 );
	if( count( $the_content ) > $words_length ) {
		array_pop($the_content);
	}
	$the_content = implode(" ",$the_content);
	$the_content = str_replace(']]>', ']]&gt;', $the_content);
	$the_content = strip_tags( $the_content );
	$the_content = str_replace( array( '"', "'" ), array( '&quot;', '&#39;' ), $the_content );
	$the_content = trim( strip_shortcodes( $the_content ) ).' ... ';
    
	if ($enable_more_button == true) { 
		$permalink_text = idealtheme_option('read_more_btn_text');
		$permalink_text = ( $permalink_text !== '' ) ? $permalink_text : esc_html__( 'Read More', 'enar');
		$the_content .= '<a href="'.get_permalink().'" class="post_readmore">'.esc_html($permalink_text).'</a>'; 
	}
		
	return $the_content;
}

//==============> Adding the Open Graph in the Language Attributes

function idealtheme_add_opengraph_doctype( $output ) {
	return $output . ' prefix="og: http://ogp.me/ns#"';
}
add_filter('language_attributes', 'idealtheme_add_opengraph_doctype');

function idealtheme_insert_og_meta() {
	global $post;

	if ( !is_singular() )
		return;
	
	$thumbnail_img = '';
	if( ! has_post_thumbnail( $post->ID ) ) {
		if(  idealtheme_option('logo_img', 'url') !== '' ) {
			$thumbnail_img =  idealtheme_option('logo_img', 'url');
		}
	} else {
		$thumbnail_img =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$thumbnail_img =  $thumbnail_img[0];
	}
		
	//=====> Schema.org markup for Google+
	
	echo sprintf( '<meta itemprop="name" content="%s">', strip_tags( str_replace( array( '"', "'" ), array( '&quot;', '&#39;' ), $post->post_title )) );
	echo sprintf( '<meta itemprop="description" content="%s">', idealtheme_get_content_stripped( 50, $post->post_content ) );
	if ( $thumbnail_img !== '' ) {
		echo sprintf( '<meta itemprop="image" content="%s">', esc_attr( $thumbnail_img ) );
	} 
	
	//=====> Open Graph data 
	
	echo '<meta name="twitter:card" content="summary_large_image">';
	echo sprintf('<meta name="twitter:site" content="%s">', idealtheme_option('twitter_username') );
	echo sprintf('<meta name="twitter:title" content="%s">', strip_tags( str_replace( array( '"', "'" ), array( '&quot;', '&#39;' ), $post->post_title )) );
	echo sprintf('<meta name="twitter:description" content="%s">', idealtheme_get_content_stripped( 50, $post->post_content ) );
	echo sprintf('<meta name="twitter:creator" content="%s">', idealtheme_option('twitter_username') );
	if ( $thumbnail_img !== '' ) {
		echo sprintf('<meta name="twitter:image:src" content="%s">', esc_attr( $thumbnail_img ) );
	} 
	
	//=====> Open Graph data 
	
	echo '<meta property="og:type" content="article"/>';	
	echo sprintf( '<meta property="og:site_name" content="%s"/>', get_bloginfo('name') );					
	echo sprintf( '<meta property="og:title" content="%s"/>', strip_tags( str_replace( array( '"', "'" ), array( '&quot;', '&#39;' ), $post->post_title ) ) );
	echo sprintf( '<meta property="og:description" content="%s"/>', idealtheme_get_content_stripped( 50, $post->post_content ) );
	echo sprintf( '<meta property="og:url" content="%s"/>', get_permalink() );
	
	if ( $thumbnail_img !== '' ) {
		echo sprintf( '<meta property="og:image" content="%s"/>', esc_attr( $thumbnail_img ) );
	} 
}
add_action( 'wp_head', 'idealtheme_insert_og_meta', 5 );