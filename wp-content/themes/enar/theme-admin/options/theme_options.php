<?php

	if ( ! class_exists( 'Redux' ) ) {
		return;
	}
	
	$enar_opt_name = 'idealtheme_options';
	
	if(defined('ICL_LANGUAGE_CODE')) {
		$lang = ICL_LANGUAGE_CODE;
		if ($lang != 'en' && $lang != '') {
			$enar_opt_name = 'idealtheme_options'.$lang;
		}
	}
	
	// This line is only for altering the demo. Can be easily removed.
	$enar_opt_name = apply_filters( 'redux_demo/opt_name', $enar_opt_name );
	
	$sampleHTML = '';
	if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
		Redux_Functions::initWpFilesystem();
	
		global $wp_filesystem;
	
		$sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
	}
	
	// Background Patterns Reader
	$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
	$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
	$sample_patterns      = array();
	$img_path = ENAR_URI .'/theme-admin/options/images/';
	
	if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }
	
	/**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $enar_opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Enar Options', 'enar' ),
        'page_title'           => esc_html__( 'IdealTheme Options', 'enar' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'enar_options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        //$args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'enar' ), $v );
    } else {
        //$args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'enar' );
    }

    Redux::setArgs( $enar_opt_name, $args );
	
	//=======================================================================> Enar Options
    
	Redux::setSection( $enar_opt_name, array(
        'title'            => esc_html__( 'General Settings', 'enar' ),
        'id'               => 'general_settings',
        'customizer_width' => '400px',
        'icon'             => 'ico-cog4',
		'fields' => array(
		    array (
				'subtitle' => esc_html__( 'Select theme layout style ( full-width or boxed width ).', 'enar'),
				'id' => 'theme_layout',
				'type' => 'image_select',
				'options' => array (
					'full1' => $img_path .'layout_1.png',
					'full2' => $img_path . 'layout_2.png',
					'boxed1' => $img_path . 'layout_3.png',
					'boxed2' => $img_path . 'layout_4.png',
				),
				'title' => esc_html__( 'Theme Layout', 'enar'),
				'default' => 'full1',
			),
			array (
				'subtitle' => esc_html__( 'Select theme color mode ( light or dark ).', 'enar'),
				'id' => 'theme_color_mode',
				'type' => 'image_select',
				'options' => array (
					'light' => $img_path .'layout_light.png',
					'dark' => $img_path . 'layout_dark.png',
				),
				'title' => esc_html__( 'Theme Color Mode', 'enar'),
				'default' => 'light',
			),
			//=============>
			array (
				'subtitle' => esc_html__( 'Select Sidebar Position.', 'enar'),
				'id' => 'sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'none',
			),
			array(
				'id'        => 'pages_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select right sidebar that will display on all pages.', 'enar' ),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'right_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'pages_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select left sidebar that will display on all pages.', 'enar' ),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'left_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'scroll_to_top',
				'subtitle' => esc_html__( 'Enable or disable scroll to top button.', 'enar'),
				'type' => 'switch',
				'title' => esc_html__( 'Scroll To Top Button', 'enar'),
				'default' => true,
				'on'     => 'Enable',
				'off'    => 'Disable',
			),
			/*array (
				'id' => 'enable_responsive',
				'subtitle' => esc_html__( 'Enable or disable responsive style.', 'enar'),
				'type' => 'switch',
				'title' => esc_html__( 'Enable Responsive', 'enar'),
				'default' => 1,
				'on'     => 'Enable',
				'off'    => 'Disable',
			),	*/							
			array(
				'id'       => 'date_format',
				'type'     => 'select',
				'title'    => esc_html__( 'Date Format', 'enar'),
				'subtitle' => esc_html__( 'Choose date format.', 'enar'),
				'options'  => array(
					'F j, Y g:i a' => 'Ex: '.date('F').' '.date('j').', '.date('Y').' 12:50 am',
					'F j, Y' => 'Ex: '.date('F').' '.date('j').', '.date('Y').'',
					'F, Y' => 'Ex: '.date('F').', '.date('Y').'',
					'g:i a' => 'Ex: 12:50 am',
					'g:i:s a' => 'Ex: 12:50:48 am',
					'l, F jS, Y' => 'Ex: '.date('l').', '.date('F').' 6th, '.date('Y').'',
					'M j, Y @ G:i' => 'Ex: '.date('M').' '.date('j').', '.date('Y').' @ 0:50',
					'Y/m/d \a\t g:i A' => 'Ex: '.date('Y').'/'.date('m').'/'.date('d').' at 12:50 AM',
					'Y/m/d \a\t g:ia' => 'Ex: '.date('Y').'/'.date('m').'/'.date('d').' at 12:50am',
					'Y/m/d g:i:s A' => 'Ex: '.date('Y').'/'.date('m').'/'.date('d').' 12:50:48 AM',
					'Y/m/d' => 'Ex: '.date('Y').'/'.date('m').'/'.date('d').'',
					'j M Y' => 'Ex: '.date('j').' '.date('M').' '.date('Y').'',
				),
				'default' => 'F, Y',
				'select2'  => array( 'allowClear' => false )
			),
		)
    ));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Title Bar', 'enar'),
		'subsection' => true,
		'fields' => array(
			array (
				'id' => 'theme_title_is',
				'type'     => 'select',
                'title'    => esc_html__( 'Page Title Type', 'enar' ),
                'subtitle' => esc_html__( 'Select theme pages title type.', 'enar' ),
                'options'  => array(
					'allow_both' => 'Title Bar With Breadcrumbs',
					'allow_title' => 'Title Bar Only',
				    'allow_normal_title' => 'Simple Title',
					'not_of_them' => 'Hide All',
                ),
                'default'  => 'allow_both',
				'select2'  => array( 'allowClear' => false )
			), 
			array (
				'id' => 'theme_title_height',
				'type'     => 'select',
                'title'    => esc_html__( 'Page Title Size', 'enar' ),
                'subtitle' => esc_html__( 'Select theme pages title height size.', 'enar' ),
                'options'  => array(
					'default' => 'Small',
					'has_bg_image' => 'Medium',
				    'large_header has_bg_image' => 'Large',
                ),
                'default'  => 'default',
				'select2'  => array( 'allowClear' => false )
			), 
			array (
				'id' => 'theme_title_breadcrumbs_color',
				'type' => 'color',
				'title' => esc_html__( 'Title Bar Font Color', 'enar'),
				'subtitle' => esc_html__( 'Choose title bar font color.', 'enar'),
				'transparent' => false,
				'default'  => '#888888',
				'output'    => array(
					'color' => '.breadcrumbs span, .page_title .breadcrumbs a, .page_title .breadcrumbs a:hover, .page_title h1',
				),
			),
			array(
                'id'       => 'theme_title_background',
                'type'     => 'background',
                'output'   => array( '.page_title' ),
                'title'    => esc_html__( 'Title bar Background', 'enar' ),
                'subtitle' => esc_html__( 'Title bar background with image, color, etc.', 'enar' ),
                'default'   => '#FBFBFB',
            ),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Preloader', 'enar'),
		'subsection' => true,
		'fields' => array(
			array (
				'id' => 'enable_preloader',
				'subtitle' => esc_html__( 'Enable or disable the preloading effect.', 'enar'),
				'type' => 'switch',
				'title' => esc_html__( 'Enable Preloader', 'enar'),
				'default' => 1,
				'on'     => 'Enable',
				'off'    => 'Disable',
			),
			array(
                'id'       => 'preloader_style',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Preloader Style', 'enar' ),
                'subtitle' => esc_html__( 'Choose the preloader style.', 'enar' ),
                'options'  => array(
                    'preloader1' => 'Style 1',
                    'preloader2' => 'Style 2',
                    'preloader3' => 'Style 3',
					'preloader4' => 'Image Preloader'
                ),
                'default'  => 'preloader3'
            ),
			array (
				'id' => 'preloader_bg_img',
				'subtitle' => esc_html__( 'This is texture image repeated as a background.', 'enar'),
				'type' => 'media',
				'title' => esc_html__( 'Preloader Background Image', 'enar'),
				'url' => true,
				'required'  => array('preloader_style', '=', 'preloader4'),
			),
			array (
				'id' => 'preloader_bg_color',
				'subtitle' => esc_html__( 'Choose the background color for preloader.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Preloader BG-Color', 'enar'),
				'default'  => '#1ccdca',
				'output'    => array(
					'border-color' => '.preloader3 .spinner .sk-dot1, .preloader3 .spinner .sk-dot2',
					'background-color' => '.preloader2 .spinner .sk-dot1, .preloader2 .spinner .sk-dot2, .preloader1 .spinner > div',
					
				),
				'required'  => array('preloader_style', '=', array( 'preloader1', 'preloader2', 'preloader3' )),
			),
			array (
				'id' => 'preloader_con_bg_color',
				'subtitle' => esc_html__( 'Choose the background color for preloader container.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Preloader Container BG-Color', 'enar'),
				'default'  => '#ffffff',
				'output'    => array(
					'background' => '#preloader',
				),
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Backgrounds', 'enar'),
		'subsection' => true,
		'fields' => array(
			array(
                'id'       => 'site_background',
                'type'     => 'background',
                'output'   => array( '.site_full #main_wrapper', 'body.site_boxed' ),
                'title'    => esc_html__( 'Body Background', 'enar' ),
                'subtitle' => esc_html__( 'Body background with image, color, etc.', 'enar' ),
                'default'   => '#FFFFFF',
            ),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-reply4',
		'title' => esc_html__( 'RTL Style', 'enar'),
		'fields' => array(
			array(
				'id'        => 'site_rtl_style',
				'type'      => 'switch',
				'title'     => esc_html__( 'Activate RTL Style', 'enar'),
				'subtitle'      => esc_html__( 'Choose to Enable or Disable RTL Style.', 'enar'),
				'desc'     => esc_html__( 'This option for the languages that written from right to left.', 'enar' ),
				'default'   => false,
				'on'     => 'Enable',
				'off'    => 'Disable',
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-book5',
		'title' => esc_html__( 'Pages', 'enar'),
		'fields' => array(
			array(
				'id'        => 'page_show_comments',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Comments', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide pages comments area.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-eye4',
		'title' => esc_html__( 'Colors', 'enar'),
		//'subsection' => true,
		'fields' => array(
			array (
				'id' => 'site_main_color',
				'subtitle' => esc_html__( 'Choose the main color for all site elements.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Site Main Color', 'enar'),
				'default'  => '#1CCDCA',
				'output'    => array(
					'background-color' => '.hm_go_top',
					
					'color' => '.add2cart_details ins, .single_product_details ins, .price ins, .icon_boxes_con.style2.simple .service_box .icon, .single_product_price_con > .amount, .add2cart_prod_price > .amount, a, a:hover, #navy ul li:hover > a, #navy ul li:hover > a i.menu_icon, #navy .mega_menu > li > a, #navy .tab_menu_item > a:hover, #navy .tab_menu_item:not(.active) > a:hover i, .light_header .top_add_card:hover, .light_header .active .top_add_card, .light_header .active .top_add_card > span, .dark_sup_menu :not(.mobile_menu) #navy ul.mega_menu > li:hover > a, .dark_sup_menu .menu_special_color, .icon_boxes_con.style1.solid_icon .service_box > .icon i, .icon_boxes_con.style2.solid_icon .service_box .icon i, .icon_boxes_con.style2:not(.solid_icon):not(.icon_box_no_border) .service_box:hover .icon, .section_icon i, .feature_icon .item:hover h5 .title, .hm_filter_wrapper.porto_simple_title .filter_item_block:hover .porto_desc h6, .porto_nav .expand_img:hover, .porto_nav .detail_link:hover, .project_text_nav .porto_type:hover .icon_expand:hover, .porto_nums > span.like.added i, .porto_nums > span.like i:hover, #options .sort_list a:hover, #options .sort_list a.selected, #sort-direction.option-set a.selected, #sort-direction.option-set a:hover, .hoverdir_meta .proj_date, .counter .icon, .normal_text_slider .url, .say_datils > h5 > span, .add2cart_btn:hover, .add2cart_btn:hover i, .team_block .back .social_media a:hover, .social_media a:hover, .blog_grid_con .meta a:hover, .post_title_con .meta a:hover, .timeline_block .meta a:hover, .blog_grid_con .title a:hover, .feature_inner_btns > a, .plan_column1:hover .plan_price_block .plan_price_in .price, .plan_column1.active_plan .plan_price_block .plan_price_in .price, .timeline_block .timeline_title a:hover, .read_more_button, .timeline_post_format, .tags_con > a:hover, .post_next_prev a:hover, .post_next_prev a:hover, .post_next_prev a:hover .t, .related_posts_slide .related_title:hover, .gall_arrow2 .thumbs_gall_slider_larg .enar_owl_n, .gall_arrow2 .thumbs_gall_slider_larg .enar_owl_p, .png_slider .owl-prev:hover, .png_slider .owl-next:hover, .porto_galla .enar_owl_p, .porto_galla .enar_owl_n, .rev_color_main, .flex_in_color1, .main_title_c1, #navy > li.current_page_item > a:not(.nav_trigger), 
#navy > li:hover > a:not(.nav_trigger), #navy > li > a.current, .light_header #navy > li > a.current, #navy .image_menu .owl-prev, #navy .image_menu .owl-next, .languages-select .languages-panel-con .lang_checked, .top_cart_list > li > a:hover .top_cart_title, .left.top_cart_total, .left.top_cart_total, .top_search_icon, .welcome_banner h3 span, .icon_boxes_con.style1.circle.just_icon_border:not(.solid_icon) .service_box:hover > .icon i, .main_title h2 .icon, .main_title .line i, .title1, .tabs2:not(.fill_active) .tabs-navi a:hover, .tabs1.ver_tabs .tabs-navi a.selected, .tabs1:not(.ver_tabs) .tabs-navi a.selected, .tabs2 .tabs-navi a.selected, .tabs2 .tabs-navi a.selected > span i, .hm-tabs.simple_tabs .tabs-navi li a.selected, .shop_slider .pro_add2cart_details:hover, .add2cart_image .add2cart_zoom:hover, .cart_toltip_icon, .cart_toltip_icon2, .send_button2, .search_block form .search_btn, .tagcloud a:hover .tag, .posts_widget_list li > a, .posts_widget_list2 li > a span:hover, .add2cart_buttons > a:hover, .product_options .option_name, .simple_title, .vid_con .vid_icon, #reviews .required, .team_block2 a:hover .person_name, .plan_col.plan_column1 > h6, .about_author_link:hover > span, .footer_menu > li a:hover, .blog_grid_desc .title a:hover, .hm_blog_list .blog_grid_con .title a:hover, .post_title_con .title a:hover, .f_s_i_format, .hm_filter_wrapper_con .occ_expanded .enar_occ_title, .hm_filter_wrapper_con .occ_expanded .enar_occ_title i, .panel-heading a:hover i, .btn_a:not(.color1):hover, .btn_a i.in_left, .btn_a i.in_right, .list2 li i, .list4 > li > i, .hm_tooltip-item1, .page404, .sitemap ul li a:hover, i.lfc_icon, .dark .hm-tabs.simple_tabs .tabs-navi li a.selected, .top_expande, .open_options, .open_options:focus, .plan_column1 .plan_price_block .plan_price_in .plan_per, #subscribe_output h4, .list4 a:hover, #share_on_socials a:hover, .porto_full_desc .proj_cats_con a:hover, .hoverdir_meta .proj_cats_con a:hover',

					'background' => '.tree_features > li > .tree_curv, .tree_features > li, .main_title.has_bg > h2, #navy .tab_menu_item.active > a, .topbar.topbar_colored, .light_header .topbar.topbar_colored, .light_header .languages-select .languages-panel-con, .icon_boxes_con.style1 .service_box .ser-box-link:hover > span, .icon_boxes_con.style1 .service_box .ser-box-link:hover > span:after, .icon_boxes_con.style2 .service_box .icon, .icon_boxes_con.style2 .service_box .ser-box-link > span:after, .icon_boxes_con.style2 .service_box .ser-box-link > span:before, .icon_boxes_con.style1.circle.just_icon_border:not(.solid_icon) .service_box > .icon i:after, .icon_boxes_con.style1.solid_icon.radius5 .service_box:hover > .icon:after, .icon_boxes_con.style1.solid_icon.radius5 .service_box:hover > .icon i, .icon_boxes_con.style1.circle.just_icon_border.solid_icon .service_box:hover > span i, .feature_icon .item h5 .icon span, .hm_filter_wrapper .porto_type:after, #filter-by > li a.selected, .counter_a .counter .icon:after, .mb_YTPseekbar, .spec_req2, .spec_req2 .raq_a2, .spec_req2 .raq_b2, .team_block .face.back, .team-col, .team-col .team-col-2 .arrow, .progress_bar .fill, .blog_grid_format i, .feature_inner_ling:after, .timeline_block .timeline_feature > a:not(.quote_con):before, .timeline_block .timeline_feature .owl-item a:before, .colored_masonry .blog_grid_desc, .related_posts_slide .related_img > span:after, #enar_owl_slider .owl-page.active, #enar_owl_slider .owl-page:hover, 
.png_slider .owl-page.active, .png_slider .owl-page:hover, .feature_icon_slider .owl-page.active, .feature_icon_slider .owl-page:hover, .porto_galla .owl-page.active, .porto_galla .owl-page:hover, .content_slider .owl-page.active, .content_slider .owl-page:hover, .rev_offer_circle, .flex_style1 #flex_carousel .flex_next > span:after, .flex_style1 #flex_carousel .flex_previous > span:after, .photostack nav span.current, #photostack-1 nav span.current, .camera_wrap .camera_pag .camera_pag_ul li:hover > span, .camera_wrap .camera_pag .camera_pag_ul li.cameracurrent > span, .flex-control-paging li a.flex-active, .mejs-controls .mejs-time-rail .mejs-time-current, .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current, .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, #navy > li > a::after, #navy li.normal_menu ul:after,  #navy li.has_mega_menu > ul:after, .top_cart_btn, .top_catt_remove:hover:after, .top_catt_remove:hover:before, .title_banner, .icon_boxes_con.style1 .service_box > .icon i, .icon_boxes_con.style1.circle.just_icon_border.solid_icon:not(.radius5) .service_box > .icon:before, 
.icon_boxes_con.style2.solid_icon .service_box > .icon:before, h2.title2 span, ul.list1 li:after, .description3:after, .main_title.blue_bg > h2, .tabs1:not(.ver_tabs):not(.fill_active) .tabs-navi a.selected:before, .tabs2.fill_active .tabs-navi a.selected, .tabs2.fill_active .tabs-navi a:hover, .tabs1.fill_active .tabs-navi a.selected, .tabs1.fill_active .tabs-navi a:hover, .ver_tabs .tabs-navi a.selected:before, .white_section .feature_icon .item h5 .icon span:after, .send_button, .pagination li a:hover, .pagination li.active a, .pagination li.next_pagination > a:hover, .pagination li.prev_pagination > a:hover, .sidebar_slide_title:after, .send_button3:hover, .vid_con:after, .team_block2 .member_img:before, .plan_col.plan_column1:hover  > h6, .plan_col.plan_column1.active_plan > h6, .newsletter_button, .recent_posts_list li > a .recent_posts_img:after, .flickr_badge_image a:after, .hm_vid_con .vid_icon i, .hm_vid_con .vid_icon:hover i, .vid_con .vid_icon:hover i, .blog_list_format, .blog_list_format:hover, .quote_con, a.quote_con:focus, #comments .children:after, .occ_expanded .enar_occ_title, .hm_filter_wrapper_con .occ_expanded .enar_occ_title:after, .hm_filter_wrapper_con .occ_expanded .enar_occ_title:before, .panel-heading a:not(.collapsed), .panel-heading a:hover:after, .panel-heading a:hover:before, .btn_a.color1 > span, .btn_b.color1, .btn_c.color1, .main_button.color1, .tooltip-content3::after, .sitemap > li > a, .spinner1 > div, .dark .icon_boxes_con.style2:not(.icon_box_no_border) .service_box .icon:after, .dark .team_block .face.back, .dark .occ_expanded .enar_occ_title, .main_title .line:before, .option_button.active, .option_button:hover, .hm_vid_con:after, .woocommerce .remove.top_catt_remove:hover:after, .woocommerce .remove.top_catt_remove:hover:before, .remove.top_catt_remove:hover:after, .remove.top_catt_remove:hover:before',

					'border-color' => '.icon_boxes_con.style1 .service_box .ser-box-link:hover, .icon_boxes_con.style1.solid_icon .service_box > .icon:after, .icon_boxes_con.style2.solid_icon .service_box .icon:after, .filter_by_mobile #filter-by > li a.selected, #filter-by > li a.selected, .add2cart_btn:hover, .team_block .face.back, .social_media a:hover, .timeline_post_format, .tags_con > a:hover, .top_catt_remove:hover, .tabs2 .tabs-navi a.selected, .tabs2.fill_active .tabs-navi a.selected, .tabs2.fill_active .tabs-navi a:hover, .tabs1.fill_active .tabs-navi a.selected, .tabs1.fill_active .tabs-navi a:hover, .hm-tabs.simple_tabs .tabs-navi li a.selected, .send_button, .send_button2, .pagination li a:hover, .pagination li.active a, .pagination li.next_pagination > a:hover, .pagination li.prev_pagination > a:hover, .gall_thumbs .current_thumb, .send_button3:hover, #footer .tagcloud a:hover .tag, .comment-reply-link:hover, .comment-edit-link:hover, .occ_expanded .enar_occ_title, .hm_filter_wrapper_con .acc_content, .panel-heading a:not(.collapsed), .btn_b.color1, .main_button.color1, .sitemap > li > a, .dark .hm-tabs.simple_tabs .tabs-navi li a.selected, .option_button.active, .option_button:hover, input[type="text"]:focus:not(.wpcf7-not-valid), input[type="date"]:focus:not(.wpcf7-not-valid), input[type="email"]:focus:not(.wpcf7-not-valid), input[type="number"]:focus:not(.qty):not(.wpcf7-not-valid), textarea:focus:not(.wpcf7-not-valid), input[type="password"]:focus:not(.wpcf7-not-valid), input[type="tel"]:focus:not(.wpcf7-not-valid), #comments .comment-reply-link:hover, #comments .comment-edit-link:hover, .woocommerce .remove.top_catt_remove:hover, .remove.top_catt_remove:hover, .main_title .dot, #share_on_socials a:hover',
					
					'border-top-color' => '.description2, .description3, .main_title.blue_bg .line:before, .with_arrow_d.tabs1.fill_active .tabs-navi a.selected:before, .hm_filter_wrapper_con .occ_expanded .enar_occ_title, .main_title.has_bg .line:before',
					
					'border-right-color' => '.png_slide .desc > span, .tabs1.fill_active .tabs-navi li.prev_selected a, .hm_filter_wrapper_con .occ_expanded .enar_occ_title',
					
					'border-bottom-color' => '.light_header .languages-select .languages-panel-con:after, .description2:after, .tabs1.fill_active.tabs_mobile:not(.ver_tabs) .tabs-navi li a.selected, .tabs1.fill_active.tabs_mobile:not(.ver_tabs) .tabs-navi li a:hover',
					'border-left-color' => '#navy .tab_menu_item.active > a:after, .png_slide .desc > span, .tabs1.fill_active .tabs-navi li a.selected, .tabs1.fill_active .tabs-navi li:first-child a.selected, .tabs1.fill_active .tabs-navi li:first-child a:hover, .tabs1.fill_active.tabs_mobile:not(.ver_tabs) .tabs-navi li a.selected, .tabs1.fill_active.tabs_mobile:not(.ver_tabs) .tabs-navi li a:hover, #comments .children, .hm_filter_wrapper_con .occ_expanded .enar_occ_title',
					
					'stroke' => '.plan_col.active_plan .polygon_con .polygon_fill, .plan_col:hover .polygon_con .polygon_fill',
				),
			),
			array (
				'id' => 'colors_button_color',
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Buttons Background Color', 'enar'),
				'subtitle' => esc_html__( 'Choose the main button background color.', 'enar'),
				'default'  => '#1CCDCA',
				'output'    => array(
					'background' => '.send_button, #submit-comment, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
					'border-color' => '.send_button, #submit-comment, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
				)
			)
	)));
	
	/*Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-home5',
		'id'   => 'general_settings_home',
		'title' => esc_html__( 'Home Page', 'enar'),
		'fields' => array(
		    
		)
    ));*/
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-browser',
		'title' => esc_html__( 'Top Bar', 'enar'),
		'fields' => array(
		 	array (
				'id' => 'show_header_top_bar',
				'type'      => 'switch',
				'title' => esc_html__( 'Show Top Bar', 'enar'),
				'subtitle'  => esc_html__( 'Show or hide top bar from website.', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'show_top_lang',
				'subtitle'  => esc_html__( 'Show or hide languages panel from top bar.', 'enar'),
				'type' => 'switch',
				'title' => esc_html__( 'Show Language Options', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			
			array(
                'id'       => 'top_bar_details',
                'type'     => 'sortable',
                'title'    => esc_html__( 'Tob Bar Details', 'enar' ),
                'subtitle' => esc_html__( 'Define and reorder these however you want.', 'enar' ),
                'desc'     => esc_html__( 'This is the details fields, good for additional info.', 'enar' ),
                'label'    => true,
                'options'  => array(
                    'First'   => 'Call Us : (123) 456 - 7890',
                    'Second'   => 'Support : (123) 456 - 7890',
                )
            ),
			array (
				'id' => 'top_bar_bg_color',
				'subtitle' => esc_html__( 'Choose top bar background color.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Top Bar BG-Color', 'enar'),
				'default'  => '#F9F9F9',
				'output'    => array(
					'background' => '.topbar, .light_header .topbar',
				),
			),
			array (
				'id' => 'top_bar_border_color',
				'subtitle' => esc_html__( 'Choose top bar border bottom color.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Top Bar Border Color', 'enar'),
				'default'  => '#E4E4E4',
				'output'    => array(
					'border-color' => '.topbar, .light_header .topbar',
				),
			),
			array (
				'id' => 'top_bar_color',
				'subtitle' => esc_html__( 'Choose top bar text color.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Top Bar Font Color', 'enar'),
				'default'  => '#777',
				'output'    => array(
					'color' => '.top_details > span > a, .top_details > span, .top_details > div, .top_details > div > a, .top-socials > a',
				),
			),
			array (
				'id' => 'top_bar_lang_bg_color',
				'subtitle' => esc_html__( 'Choose languages panel background color.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Language Panel BG-Color', 'enar'),
				'default'  => '#178E94',
				'output'    => array(
					'background-color' => '.languages-select .languages-panel-con',
				),
			),
			array (
				'id' => 'top_bar_social_color',
				'subtitle' => esc_html__( 'Choose top bar social media icons hover color.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Social Icons Color', 'enar'),
				'default'  => '#1ccdca',
				'output'    => array(
					'background' => '.top-socials span.soc_name:after, .top-socials span.soc_name:before, .top-socials > a > span.soc_name, .top_soc_normall.top-socials.box_socials > a:hover > span.soc_icon_bg',
				),
			),
		)
	));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Social Networks', 'enar'),
        'subsection' => true,
		'fields' => array(
			array (
				'id' => 'social_topbar',
				'type' => 'switch',
				'title' => esc_html__( 'Enable Social Icons', 'enar'),
				'subtitle'  => 'Enable or disable top bar social media icons.',
				'default' => 1,
			),
			array (
				'id' => 'social_topbar_title',
				'type' => 'switch',
				'title' => esc_html__( 'Enable Social Titles', 'enar'),
				'subtitle'  => 'Enable or disable top bar social media icons titles.',
				'default' => 0,
			),
			
		    array (
				'id' => 'facebook_url',
				'type' => 'text',
				'title' => 'Facebook URL',
				'default' => '#',
			),
			/*array (
				'id' => 'facebook_title',
				'type' => 'text',
				'title' => '',
				'default' => 'Facebook',
				'required'  => array('social_topbar_title', '=', '1'),
			),*/
			array (
				'id' => 'twitter_url',
				'type' => 'text',
				'title' => 'Twitter URL',
				'default' => '#',
			),
			array (
				'id' => 'dribble_url',
				'type' => 'text',
				'title' => 'Dribble URL',
				'default' => '#',
			),
			array (
				'id' => 'googleplus_url',
				'type' => 'text',
				'title' => 'Google+ URL',
				'default' => '#',
			),
			array (
				'id' => 'linkedin_url',
				'type' => 'text',
				'title' => 'Linkedin URL',
				'default' => '',
			),
			array (
				'id' => 'blogger_url',
				'type' => 'text',
				'title' => 'Blogger URL',
				'default' => '',
			),
			array (
				'id' => 'tumblr_url',
				'type' => 'text',
				'title' => 'Tumblr URL',
				'default' => '',
			),
			array (
				'id' => 'reddit_url',
				'type' => 'text',
				'title' => 'Reddit URL',
				'default' => '',
			),
			array (
				'id' => 'yahoo_url',
				'type' => 'text',
				'title' => 'Yahoo URL',
				'default' => '',
			),
			array (
				'id' => 'deviantart_url',
				'type' => 'text',
				'title' => 'Deviantart URL',
				'default' => '',
			),
			array (
				'id' => 'vimeo_url',
				'type' => 'text',
				'title' => 'Vimeo URL',
				'default' => '#',
			),
			array (
				'id' => 'youtube_url',
				'type' => 'text',
				'title' => 'Youtube URL',
				'default' => '',
			),
			array (
				'id' => 'pinterest_url',
				'type' => 'text',
				'title' => 'Pinterest URL',
				'default' => '',
			),
			array (
				'id' => 'digg_url',
				'type' => 'text',
				'title' => 'Digg URL',
				'default' => '',
			),
			array (
				'id' => 'flickr_url',
				'type' => 'text',
				'title' => 'Flickr URL',
				'default' => '',
			),
			array (
				'id' => 'forrst_url',
				'type' => 'text',
				'title' => 'Forrst URL',
				'default' => '',
			),
			array (
				'id' => 'skype_url',
				'type' => 'text',
				'title' => 'Skype ID',
				'default' => '',
			),
			array (
				'id' => 'instagram_url',
				'type' => 'text',
				'title' => 'Instagram URL',
				'default' => '',
			),
			array (
				'id' => 'paypal_url',
				'type' => 'text',
				'title' => 'Paypal URL',
				'default' => '',
			),
			array (
				'id' => 'dropbox_url',
				'type' => 'text',
				'title' => 'Dropbox URL',
				'default' => '',
			),
			array (
				'id' => 'soundcloud_url',
				'type' => 'text',
				'title' => 'Soundcloud URL',
				'default' => '',
			),
			array (
				'id' => 'picasa_url',
				'type' => 'text',
				'title' => 'Picasa URL',
				'default' => '',
			),
			array (
				'id' => 'rss_on_off',
				'type' => 'checkbox',
				'title' => 'RSS URL',
			),
			array (
				'id' => 'rss_custom',
				'type' => 'text',
				'desc' => 'leave empty to use default rss link',
				'title' => 'Custom RSS URL',
			),
		)
	) );
	
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-monitor2',
		'title' => esc_html__( 'Navigation', 'enar'),
		'fields' => array(	
			array (
				'id' => 'enable_sticky_nav',
				'type' => 'switch',
				'title' => esc_html__( 'Enable Sticky Header', 'enar'),
				'subtitle' => esc_html__( 'Enable or disable a fixed header when scrolling.', 'enar'),
				'default' => 1,
				'on'     => 'Enable',
				'off'    => 'Disable',
			),
			array (
				'id' => 'enable_nav_cart',
				'type' => 'switch',
				'title' => esc_html__( 'Show Shopping Cart', 'enar'),
				'subtitle' => esc_html__( 'Show or hide shopping cart box from navigation.', 'enar'),
				'default' => 1,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'enable_nav_search',
				'type' => 'switch',
				'title' => esc_html__( 'Show Search Box', 'enar'),
				'subtitle' => esc_html__( 'Show or hide search box from navigation.', 'enar'),
				'default' => 1,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'nav_search_style',
				'type'     => 'select',
                'title'    => esc_html__( 'Search Box Style', 'enar' ),
                'subtitle' => esc_html__( 'Choose search box style.', 'enar' ),
                'options'  => array(
                    'as_bar' => 'Search Bar',
                    'as_icon' => 'Search Icon',
					'hide_icon' => 'Hide Search Icon',
                ),
                'default'  => 'as_bar',
				'required'  => array('enable_nav_search', 'equals', true),
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'nav_float_to',
				'type'     => 'select',
                'title'    => esc_html__( 'Menu Alignment', 'enar' ),
                'subtitle' => esc_html__( 'Choose menu alignment.', 'enar' ),
                'options'  => array(
                    'f_left' => 'Left',
                    'f_right' => 'Right',
                ),
                'default'  => 'f_left',
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'nav_style',
				'type'     => 'select',
                'title'    => esc_html__( 'Menu Style', 'enar' ),
                'subtitle' => esc_html__( 'Choose style for the main navigation menu.', 'enar' ),
                'options'  => array(
                    'classic_menu' => 'Default Style',
                    'menu_button_mode' => 'Button Mode',
                ),
                'default'  => 'classic_menu',
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'nav_position',
				'type'     => 'select',
                'title'    => esc_html__( 'Menu Position', 'enar' ),
                'subtitle' => esc_html__( 'Choose style for the main navigation menu.', 'enar' ),
                'options'  => array(
                    'horizontal_menu' => 'Horizontal Menu',
                    'header_on_side' => 'Side Menu',
                ),
                'default'  => 'horizontal_menu',
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'menu_main_color',
				'type' => 'color',
				'title' => esc_html__( 'Menu Main Color', 'enar'),
				'subtitle' => esc_html__( 'Choose menu main color.', 'enar'),
				'transparent' => false,
				'default'  => '#1ccdca',
				'output'    => array(
					'background' => '.menu_button_mode:not(.header_on_side) #nav_menu:not(.mobile_menu) #navy > li.current_page_item > a,  .menu_button_mode:not(.header_on_side) #nav_menu:not(.mobile_menu) #navy > li.current_page_item:hover > a, .menu_button_mode:not(.header_on_side) #nav_menu:not(.mobile_menu) #navy > li:hover > a, #nav_menu:not(.mobile_menu) #navy li.normal_menu > ul:after',
					
					'color' => '#navy > li.current_page_item > a:not(.nav_trigger), #navy > li:hover > a:not(.nav_trigger), #navy > li.current > a, .light_header #navy > li.current > a, .light_header.dark_sup_menu .has_mobile_menu #navy > li.opened_menu > a',
				),
			),
			array (
				'id' => 'nav_color_mode',
				'type' => 'image_select',
				'title' => esc_html__( 'Menu Color Mode', 'enar'),
				'subtitle' => esc_html__( 'Choose the main menu color mode.', 'enar'),
				'options' => array (
					'light_header' => $img_path .'light_menu.jpg',
					'dark_header' => $img_path . 'dark_menu.jpg',
				),
				'default' => 'light_header',
			),
			array (
				'id' => 'nav_dark_bg_color',
				'type' => 'color',
				'title' => esc_html__( 'Dark Menu BG-Color', 'enar'),
				'subtitle' => esc_html__( 'Choose dark menu background color.', 'enar'),
				'desc'     => esc_html__( 'This option works only with dark menu color mode.', 'enar' ),
				'transparent' => false,
				'default'  => '#1a2023',
				'output'    => array(
					'background' => '.dark_header #navigation_bar, .dark_header .top_search .top_search_con, .dark_header #main_nav.has_mobile_menu:after, .dark_header .top_search .top_search_con',
				),
				'required'  => array('nav_color_mode', 'equals', 'dark_header'),
			),
			array (
				'id' => 'sub_nav_color_mode',
				'type' => 'image_select',
				'title' => esc_html__( 'Sub-Menu Color Mode', 'enar'),
				'subtitle' => esc_html__( 'Choose sub menu color mode.', 'enar'),
				'options' => array (
					'dark_sup_menu' => $img_path .'dark_sub.jpg',
					'light_sup_menu' => $img_path . 'light_sub.jpg',
				),
				'default' => 'dark_sup_menu',
			),
			array (
				'id' => 'sub_nav_dark_bg_color',
				'type' => 'color',
				'title' => esc_html__( 'Sub-Menu BG-Color', 'enar'),
				'subtitle' => esc_html__( 'Choose dark sub menu background color.', 'enar'),
				'desc'     => esc_html__( 'This option works only with dark sub menu color mode.', 'enar' ),
				'transparent' => false,
				'default'  => '#13181a',
				'output'    => array(
					'background' => '.dark_sup_menu #navy ul, .dark_sup_menu #navy .owl-carousel:after, .dark_sup_menu #navy .image_menu_slide > .owl-wrapper-outer:after, .dark_sup_menu .has_mobile_menu #navy, .dark_sup_menu .has_mobile_menu #nav_menu:before, .header_on_side.dark_sup_menu #side_heder_in',
				),
				'required'  => array('sub_nav_color_mode', 'equals', 'dark_sup_menu'),
			),
		)
	) );
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-heart4',
		'title' => esc_html__( 'Logo', 'enar'),
		'fields' => array(
			array (
				'id' => 'logo_img',
				'type' => 'media',
				'title' => esc_html__( 'Default Logo', 'enar'),
				'subtitle' => esc_html__( 'Select an image file for your logo.', 'enar'),
				'url' => true,
			),
			array (
				'id' => 'retina_logo_img',
				'type' => 'media',
				'title' => esc_html__( 'Default Logo (Retina Version @2x)', 'enar'),
				'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'enar'),
				'url' => true,
			),
			array (
				'id' => 'logo_alt_text',
				'type' => 'text',
				'title' => 'Logo Text',
				'subtitle' => esc_html__( 'This text will appear if your logo image not defined.', 'enar'),
				'default' => get_bloginfo('name'),
			),
			//=============>
			array(
				'id'        => 'favicon_apple_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Apple iPhone & iPad Favicon', 'enar'),
			),   
			array (
				'id' => 'custom_favicon',
				'subtitle' => esc_html__( 'Size ( 16x16 OR 32x32 OR 48x48 )', 'enar'),					
				'type' => 'media',
				'title' => esc_html__( 'Main Favicon', 'enar'),
				'url' => true,
			),
			
			array (
				'id' => 'favicon_iphone',				
				'type' => 'media',
				'title' => esc_html__( 'Apple iPhone Icon Upload', 'enar'),
				'subtitle' => esc_html__( 'Favicon for Apple iPhone ( 57x57 )', 'enar'),
				'url' => true,
			),
			array (
				'id' => 'favicon_iphone_retina',				
				'type' => 'media',
				'title' => esc_html__( 'Apple iPhone Retina Icon Upload', 'enar'),
				'subtitle' => esc_html__( 'Favicon for Apple iPhone Retina Version ( 114x114 )', 'enar'),
				'url' => true,
			),
			array (
				'id' => 'favicon_ipad',				
				'type' => 'media',
				'title' => esc_html__( 'Apple iPad Icon Upload', 'enar'),
				'subtitle' => esc_html__( 'Favicon for Apple iPad ( 72x72 )', 'enar'),
				'url' => true,
			),
			array (
				'id' => 'favicon_ipad_retina',				
				'type' => 'media',
				'title' => esc_html__( 'Apple iPad Retina Icon Upload', 'enar'),
				'subtitle' => esc_html__( 'Favicon for Apple iPad Retina Version ( 144x144 )', 'enar'),
				'url' => true,
			),
			//=============>
			array(
				'id'        => 'favicon_ms_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'msApplication Favicon', 'enar'),
			),
			array (
				'id' => 'ms_favicon',
				'title' => esc_html__( 'msApplication Favicon', 'enar'),
				'subtitle' => esc_html__( 'Size ( 144x144 ) Type ( PNG )', 'enar'),					
				'type' => 'media',
				'url' => true,
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-write',
		'title' => esc_html__( 'Blog', 'enar'),
		'fields' => array(
		  	//=============>
			array(
				'id'        => 'post_meta_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Blog Post Meta', 'enar'),
				'desc'      => esc_html__( 'Post meta details for ( Single - Blog - Archive ) pages', 'enar'),
			), 
			array(
				'id'        => 'post_section_show_meta',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Post Meta', 'enar'),
				'subtitle'      => esc_html__( 'Choose to enable or disable all post meta details.', 'enar'),
				'default'   => true,
				'on'        => 'Enable',
				'off'       => 'Disable',
			),
			array(
				'id'        => 'post_section_show_comments',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Comments', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide comments area.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'post_meta_show_format',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Post Format', 'enar'),
				'subtitle'      => esc_html__( 'Show or hide post format link.', 'enar'),
				'default'   => 1,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'post_meta_show_date',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Post Date', 'enar'),
				'subtitle'      => esc_html__( 'Show or hide post date.', 'enar'),
				'default'   => 1,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'post_meta_show_cats',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Categories', 'enar'),
				'subtitle'      => esc_html__( 'Show or hide post categories.', 'enar'),
				'default'   => 1,
				'on'        => 'Show',
				'off'       => 'Hide',
			), 
			array(
				'id'        => 'post_meta_show_auther_name',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Author Name', 'enar'),
				'subtitle'      => esc_html__( 'Show or hide post author name.', 'enar'),
				'default'   => 1,
				'on'        => 'Show',
				'off'       => 'Hide',
			), 
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Post', 'enar'),
		'subsection' => true,
		'fields' => array(
		    //=============>
			array(
				'id'        => 'blog_posts_sidebar_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Post Sidebars', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select single post sidebar position.', 'enar'),
				'id' => 'post_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'right',
			),
			array(
				'id'        => 'blog_posts_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select right sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'right_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'blog_posts_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select left sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'left_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			//=============>
			array(
				'id'        => 'post_sections_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Post Sections', 'enar'),
				'desc'      => esc_html__( '', 'enar'),
			), 
			array(
				'id'        => 'post_section_show_related',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Related Posts', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide related posts.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			), 
			array (
				'id' => 'related_posts_title_text',
				'type' => 'text',
				'title' => 'Related Posts Title',
				'subtitle' => esc_html__( 'The title text for related posts carousel.', 'enar'),
				'default' => 'Related Posts',
			),
			array(
				'id'        => 'post_section_show_prev_next',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Previous/Next Pagination', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide the post navigation.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'post_section_show_tags',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Post Tags', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide the post tags.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array (
				'id' => 'tags_box_title_text',
				'type' => 'text',
				'title' => 'Tags Box Title',
				'subtitle' => esc_html__( 'The title text for tags box.', 'enar'),
				'default' => 'Tags',
			),
			array(
				'id'        => 'post_section_show_author_box',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Author Info Box', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide the author info box.', 'enar'),
				'default'   => false,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array (
				'id' => 'author_box_title_text',
				'type' => 'text',
				'title' => 'Author Info Box Title',
				'subtitle' => esc_html__( 'The title text for author info box.', 'enar'),
				'default' => 'About The Author',
			),
			//=============>
			array(
				'id'        => 'post_socials_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Post Share', 'enar'),
			), 
			array(
				'id'        => 'post_section_show_share',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Social Share Box', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide the social share box.', 'enar'),
				'default'   => false,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'share_on_facebook',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Facebook', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Facebook', 'enar'),
				'default'   => 1,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_twitter',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Twitter', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Twitter', 'enar'),
				'default'   => 1,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_google',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Google+', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Google+', 'enar'),
				'default'   => 1,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_pinterest',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Pinterest', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Pinterest', 'enar'),
				'default'   => 1,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_linkedin',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Linkedin', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Linkedin', 'enar'),
				'default'   => 1,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_mail',
				'type'      => 'switch',
				'title'     => esc_html__( 'To Mail', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Mail', 'enar'),
				'default'   => 1,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_stumbleupon',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Stumbleupon', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Stumbleupon', 'enar'),
				'default'   => 0,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_digg',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Digg', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Digg', 'enar'),
				'default'   => 0,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_reddit',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Reddit', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Reddit', 'enar'),
				'default'   => 0,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			/*array(
				'id'        => 'share_on_evernote',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Evernote', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Evernote', 'enar'),
				'default'   => 0,
				'on'        => 'On',
				'off'       => 'Off',
			), */
			array(
				'id'        => 'share_on_delicious',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Delicious', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Delicious', 'enar'),
				'default'   => 0,
				'on'        => 'On',
				'off'       => 'Off',
			), 
			array(
				'id'        => 'share_on_tumblr',
				'type'      => 'switch',
				'title'     => esc_html__( 'On Tumblr', 'enar'),
				'subtitle'     => esc_html__( 'To Share Post On Tumblr', 'enar'),
				'default'   => 0,
				'on'        => 'On',
				'off'       => 'Off',
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Blog / Home', 'enar'),
		'subsection' => true,
		'fields' => array(
		    //=============>
			array(
				'id'        => 'blog_home_sidebar_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Blog Page Sidebars', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select blog posts page sidebar position.', 'enar'),
				'id' => 'blog_home_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'right',
			),
			array(
				'id'        => 'blog_home_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select right sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'right_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'blog_home_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select left sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'left_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			//=============>
			array(
				'id'        => 'home_page_blog_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Blog Page Posts Style', 'enar'),
			),
			array (
				'id' => 'home_template_type',
				'type'     => 'select',
                'title'    => esc_html__( 'Posts Layout', 'enar' ),
                'subtitle' => esc_html__( 'Select the layout for blog page posts.', 'enar' ),
                'options'  => array(
					'standard' => 'Standard',
				    'list' => 'List',
                    'masonry' => 'Masonry',
                    'grid' => 'Grid',
					'timeline' => 'Timeline',
                ),
                'default'  => 'standard',
				'select2'  => array( 'allowClear' => false )
			),
			//=============>
			array(
				'id'        => 'home_page_title_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Blog Page Title Bar options', 'enar'),
			),
			array (
				'id' => 'home_title_is',
				'type'     => 'select',
                'title'    => esc_html__( 'Page Title Type', 'enar' ),
                'subtitle' => esc_html__( 'Select the blog page title type.', 'enar' ),
                'options'  => array(
					'allow_title' => 'Title Bar',
				    'allow_normal_title' => 'Simple Title',
					'not_of_them' => 'Hide All',
                ),
                'default'  => 'allow_title',
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'home_title_height',
				'type'     => 'select',
                'title'    => esc_html__( 'Page Title Size', 'enar' ),
                'subtitle' => esc_html__( 'Select theme pages title height size.', 'enar' ),
                'options'  => array(
					'default' => 'Small',
					'has_bg_image' => 'Medium',
				    'large_header has_bg_image' => 'Large',
                ),
                'default'  => 'default',
				'select2'  => array( 'allowClear' => false )
			), 
			array(
				'id'        => 'home_title_type',
				'type'      => 'button_set',
				'title'     => esc_html__( 'Title Type', 'enar'),
				'subtitle'  => esc_html__( 'Choose blog page title type.', 'enar'),
				'options'   => array(
					'custom' => 'Custom Title', 
					'site' => 'Site Title', 
				), 
				'default'   => 'custom'
			),
			
			array (
				'id' => 'home_title',
				'type' => 'text',
				'title' => 'Title Text',
				'subtitle'  => esc_html__( 'This text will display in the page title bar.', 'enar'),
				'default' => 'Blog',
				'required'  => array('home_title_type', '=', 'custom'),
			),
			array (
				'id' => 'home_title_breadcrumbs_color',
				'type' => 'color',
				'title' => esc_html__( 'Title Bar Font Color', 'enar'),
				'subtitle' => esc_html__( 'Choose title bar font color.', 'enar'),
				'transparent' => false,
				'default'  => '#888888',
				'output'    => array(

					'color' => 'body.home .page_title h1',
				),
			),
			array(
                'id'       => 'home_title_background',
                'type'     => 'background',
                'output'   => array( 'body.home .page_title' ),
                'title'    => esc_html__( 'Title bar Background', 'enar' ),
                'subtitle' => esc_html__( 'Title bar background with image, color, etc.', 'enar' ),
                'default'   => '#FBFBFB',
            ),
			//=============>
			array(
				'id'        => 'home_page_content_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Blog Custom Content', 'enar'),
			), 
			array (
				'id' => 'custom_home_content',
				'type' => 'editor',
				'title' => esc_html__( 'Custom Content', 'enar'),
				'subtitle'  => esc_html__( 'The custom content that appear after title bar.', 'enar'),
				'args' => array(
					'teeny' => false,
					'drag_drop_upload' => true,
					'textarea_rows' => 20,
				),
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Archive / Category', 'enar'),
		'subsection' => true,
		'fields' => array(
		    //=============>
			array(
				'id'        => 'blog_cats_sidebar_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Category / Archive / Tags / Author Pages', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select category page sidebar position.', 'enar'),
				'id' => 'post_category_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'right',
			),
			array(
				'id'        => 'blog_cats_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select right sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'right_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'blog_cats_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select left sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'left_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'post_category_posts_per_page',
				'title' => esc_html__( 'Number of posts', 'enar'),
				'subtitle' => esc_html__( 'For ( Category - Archive - Tags ) Pages.', 'enar'),
				'desc' => esc_html__( 'Number of posts per page, to show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '9',
			),
			array (
				'id' => 'post_category_template_type',
				'type'     => 'select',
                'title'    => esc_html__( 'Posts Layout', 'enar' ),
                'subtitle' => esc_html__( 'Select the layout for blog page posts.', 'enar' ),
                'options'  => array(
					'standard' => 'Standard',
				    'list' => 'List',
                    'masonry' => 'Masonry',
                    'grid' => 'Grid',
                ),
                'default'  => 'list',
				'select2'  => array( 'allowClear' => false )
			),
			array(
                'id'       => 'post_cats_background',
                'type'     => 'background',
                'output'   => array( '.archive .content_section.hm_posts_tax_con' ),
                'title'    => esc_html__( 'Background', 'enar' ),
                'subtitle' => esc_html__( 'Background image, color, etc.', 'enar' ),
                'default'   => '#F9FAFC',
            ),
	)));
	
	/*Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-user4',
		'title' => esc_html__( 'Author page', 'enar'),
		'fields' => array(
			
	)));*/
	
	//if ( is_plugin_active('enar_functions/enar_functions.php') ) {
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-image4', //ico-book5
		'title' => esc_html__( 'Portfolio', 'enar'),
		'fields' => array(
			//=============>
			array(
				'id'        => 'portfolio_meta_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Portfolio Templates Post Meta', 'enar'),
				'desc'      => esc_html__( 'Post meta details for ( Portfolio Templates ) pages', 'enar'),
			), 
			array(
				'id'        => 'portfolio_section_show_meta',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Post Meta', 'enar'),
				'subtitle'      => esc_html__( 'Choose to enable or disable all post meta details.', 'enar'),
				'default'   => true,
				'on'        => 'Enable',
				'off'       => 'Disable',
			),
			array(
				'id'        => 'portfolio_section_show_comments',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Comments', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide comments area.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'portfolio_meta_show_format',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Post Format', 'enar'),
				'subtitle'      => esc_html__( 'Show or hide post format icon.', 'enar'),
				'default'   => false,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'portfolio_meta_show_date',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Post Date', 'enar'),
				'subtitle'      => esc_html__( 'Show or hide post date.', 'enar'),
				'default'   => false,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'portfolio_meta_show_cats',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Categories', 'enar'),
				'subtitle'      => esc_html__( 'Show or hide post categories.', 'enar'),
				'default'   => 1,
				'on'        => 'Show',
				'off'       => 'Hide',
			), 
			array(
				'id'        => 'portfolio_meta_show_auther_name',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Author Name', 'enar'),
				'subtitle'      => esc_html__( 'Show or hide post author name.', 'enar'),
				'default'   => false,
				'on'        => 'Show',
				'off'       => 'Hide',
			), 
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Post', 'enar'),
		'subsection' => true,
		'fields' => array(
		    //=============>
			array(
				'id'        => 'portfolio_post_sidebar_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Portfolio Post Sidebars', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select sidebar position on all single portfolio posts.', 'enar'),
				'id' => 'portfolio_post_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'none',
			),
			array(
				'id'        => 'portfolio_post_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select right sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'right_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'portfolio_post_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select left sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'left_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			//=============>
			array(
				'id'        => 'portfolio_post_general_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'General Settings', 'enar'),
			), 
			array(
				'id'        => 'portfolio_show_prev_next',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Previous/Next Pagination', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide the post navigation.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array(
				'id'        => 'portfolio_show_comments',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Comments', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide comments area.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			),
			array (
				'id' => 'portfolio_post_slug',
				'type' => 'text',
				'title' => 'Single Portfolio Post Slug',
				'desc' => esc_html__( 'The slug name cannot be the same name as your portfolio page or the layout will break. This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'enar'),
				'default' => 'portfolio-item',
			),
			//=============>
			array(
				'id'        => 'portfolio_related_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Related Posts', 'enar'),
				'desc'      => esc_html__( '', 'enar'),
			),
			array(
				'id'        => 'portfolio_show_related',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show Related Posts', 'enar'),
				'subtitle'      => esc_html__( 'Choose to show or hide related posts.', 'enar'),
				'default'   => true,
				'on'        => 'Show',
				'off'       => 'Hide',
			), 
			array (
				'id' => 'portfolio_show_related_title',
				'subtitle' => esc_html__( 'Show or hide related posts title bar.', 'enar'),
				'type' => 'switch',
				'title' => esc_html__( 'Related Title-Bar', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'related_portfolio_title_text',
				'type' => 'text',
				'title' => 'Related Title-Bar Text',
				'subtitle' => esc_html__( 'The title text for related posts carousel.', 'enar'),
				'default' => 'Related Projects',
				'required'  => array('portfolio_show_related_title', '=', true),
			),
			array (
				'id' => 'related_portfolio_title_bg',
				'subtitle' => esc_html__( 'Background color for related posts title bar.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'title' => esc_html__( 'Related Title-Bar BG-Color', 'enar'),
				'default'  => '#1ccdca',
				'output'    => array(
					'background-color' => '.title_banner.related_portfolio',
					
				),
				'required'  => array('portfolio_show_related_title', '=', true),
			),
			array (
				'id' => 'portfolio_related_post_date',
				'subtitle' => esc_html__( 'Show or hide related posts items dates.', 'enar'),
				'type' => 'switch',
				'title' => esc_html__( 'Related Posts Dates', 'enar'),
				'default' => false,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'portfolio_related_post_cats',
				'subtitle' => esc_html__( 'Show or hide related posts items categories.', 'enar'),
				'type' => 'switch',
				'title' => esc_html__( 'Related Posts Categories', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'portfolio_related_num_posts',
				'title' => esc_html__( 'Number of posts', 'enar'),
				'subtitle' => esc_html__( 'For Standard Posts Layout.', 'enar'),
				'desc' => esc_html__( 'Number of posts in related carousel, to show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '10',
			),
			array(
				'id'        => 'portfolio_related_order',
				'type'      => 'select',
				'title'     => esc_html__( 'Order Posts By', 'enar'),
				'subtitle'      => esc_html__( 'Choose to sort related posts.', 'enar'),
				'options'  => array(
					'date' => 'Order By Data',
					'ID' => 'Order By ID',
					'author' => 'Order By Author',
					'title' => 'Order By Title',
					'rand' => 'Order Random',
					'comment_count' => 'Order by number of comments',
                ),
                'default'  => 'date',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'portfolio_related_sort_by',
				'type'      => 'select',
				'title'     => esc_html__( 'Sort Posts By', 'enar'),
				'subtitle'      => esc_html__( 'Sort related posts by ascending or descending order.', 'enar'),
				'options'  => array(
					'DESC' => 'Descending Order',
					'ASC' => 'Ascending Order',
                ),
                'default'  => 'DESC',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'portfolio_related_posts_from',
				'type'      => 'select',
				'title'     => esc_html__( 'Get Posts From', 'enar'),
				'subtitle'      => esc_html__( 'Choose where you get the related posts.', 'enar'),
				'options'  => array(
					'from_all' => 'From All Posts',
					'from_cats' => 'Choose From Categories',
					'from_posts' => 'Select From Posts',
                ),
                'default'  => 'from_all',
				'select2'  => array( 'allowClear' => false )
			),
			array(
                'id'       => 'portfolio_related_from_cats',
                'type'     => 'select',
                'data' => 'categories',
                'args' => array('taxonomy' => array('portfolio_category')),
				'sortable'    => true,
                'multi'    => true,
                'title'    => esc_html__( 'Select From Categories', 'enar' ),
                'subtitle' => esc_html__( 'Choose categories to include in the carousel.', 'enar' ),
				'required'  => array('portfolio_related_posts_from', '=', 'from_cats'),
				'select2'  => array( 'allowClear' => false )
            ),
			array(
                'id'       => 'portfolio_related_from_posts',
                'type'     => 'select',
                'data'     => 'post',
                'args'     => array('post_type' => array('portfolio')),
				'sortable'    => true,
                'multi'    => true,
                'title'    => esc_html__( 'Select From Posts', 'enar' ),
                'subtitle' => esc_html__( 'Choose posts to include in the carousel.', 'enar' ),
				'required'  => array('portfolio_related_posts_from', '=', 'from_posts'),
				'select2'  => array( 'allowClear' => false )
            ),
			array (
				'id' => 'related_portfolio_zoom_btn_text',
				'type' => 'text',
				'title' => 'Zoom Button Text',
				'subtitle' => esc_html__( 'The text content for zoom button.', 'enar'),
				'default' => 'Zoom',
			),
			array (
				'id' => 'related_portfolio_more_btn_text',
				'type' => 'text',
				'title' => 'Details Button Text',
				'subtitle' => esc_html__( 'The text content for details button.', 'enar'),
				'default' => 'Explore',
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Archive / Category', 'enar'),
		'subsection' => true,
		'fields' => array(
		    //=============>
			array(
				'id'        => 'portfolio_cats_sidebar_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Portfolio Archive / Category Sidebars', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select sidebar position on all portfolio Archive / Category pages..', 'enar'),
				'id' => 'portfolio_cats_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'none',
			),
			array(
				'id'        => 'portfolio_cats_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select right sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'right_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'portfolio_cats_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select left sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'left_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			//=============>
			array(
				'id'        => 'portfolio_cats_general_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'General Settings', 'enar'),
			), 
		    array (
				'id' => 'portfolio_cats_slug',
				'type' => 'text',
				'title' => 'Portfolio Archive / Category Slug',
				'desc' => esc_html__( 'The slug name cannot be the same name as your portfolio page or the layout will break. This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'enar'),
				'default' => 'portfolio_category',
			),
			array (
				'id' => 'portfolio_category_template_type',
				'type'     => 'select',
                'title'    => esc_html__( 'Posts Layout', 'enar' ),
                'subtitle' => esc_html__( 'Select the layout for portfolio archive page posts.', 'enar' ),
                'options'  => array(
					//'standard' => 'Standard',
				    'list' => 'List',
                    'masonry' => 'Masonry',
                    'grid' => 'Grid',
					'filter' => 'Filter',
                ),
                'default'  => 'list',
				'select2'  => array( 'allowClear' => false )
			),
			array(
                'id'       => 'portfolio_cats_background',
                'type'     => 'background',
                'output'   => array( '.archive .content_section.hm_porto_tax_con' ),
                'title'    => esc_html__( 'Background', 'enar' ),
                'subtitle' => esc_html__( 'Background image, color, etc.', 'enar' ),
                'default'   => '#F9FAFC',
            ),
	)));
		
	//}
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-windows3',//ico-tag3
		'title' => esc_html__( 'Templates', 'enar'),
		//'subsection' => true,
		'fields' => array(
		    array(
				'id'        => 'post_templates_num_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Templates Number Of Posts', 'enar'),
				'desc'      => esc_html__( 'Number of posts per page, to show all posts write -1', 'enar'),
			), 
			array (
				'id' => 'home_posts_per_page',
				'title' => esc_html__( 'Standard Layout', 'enar'),
				'subtitle' => esc_html__( 'Number of posts per page.', 'enar'),
				//'desc' => esc_html__( 'Number of posts per page, to show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '5',
			),
			array (
				'id' => 'home_posts_per_page_list',
				'title' => esc_html__( 'List Layout', 'enar'),
				'subtitle' => esc_html__( 'Number of posts per page.', 'enar'),
				//'desc' => esc_html__( 'Number of posts per page, to show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '10',
			),
			array (
				'id' => 'home_posts_per_page_masonry',
				'title' => esc_html__( 'Masonry Layout', 'enar'),
				'subtitle' => esc_html__( 'Number of posts per page.', 'enar'),
				//'desc' => esc_html__( 'Number of posts per page, to show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '13',
			),
			array (
				'id' => 'home_posts_per_page_grid',
				'title' => esc_html__( 'Grid Layout', 'enar'),
				'subtitle' => esc_html__( 'Number of posts per page.', 'enar'),
				//'desc' => esc_html__( 'Number of posts per page, to show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '9',
			),
			array (
				'id' => 'home_posts_per_page_timeline',
				'title' => esc_html__( 'Timeline Layout', 'enar'),
				'subtitle' => esc_html__( 'Number of posts per page.', 'enar'),
				//'desc' => esc_html__( 'Number of posts per page, to show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '6',
			),
			//============>
			array(
				'id'        => 'post_expert_num_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Templates Excerpt Length', 'enar'),
				'desc'      => esc_html__( 'Number of words you want to show in the post excerpts.', 'enar'),
			),
			array(
				'id'        => 'home_standard_expert_length',
				'type'      => 'text',
				'title'     => esc_html__( 'Standard Layout Excerpt', 'enar'),
				'subtitle'  => esc_html__( 'Add the excerpt text length.', 'enar'),
				//'desc'  => esc_html__( 'Number of words you want to show in the post excerpts.', 'enar'),
				'default'   => '50',
			),
			array(
				'id'        => 'home_list_expert_length',
				'type'      => 'text',
				'title'     => esc_html__( 'List Layout Excerpt', 'enar'),
				'subtitle'  => esc_html__( 'Add the excerpt text length.', 'enar'),
				//'desc'  => esc_html__( 'Number of words you want to show in the post excerpts.', 'enar'),
				'default'   => '40',
			),
			array(
				'id'        => 'home_masonry_expert_length',
				'type'      => 'text',
				'title'     => esc_html__( 'Masonry Layout Excerpt', 'enar'),
				'subtitle'  => esc_html__( 'Add the excerpt text length.', 'enar'),
				//'desc'  => esc_html__( 'Number of words you want to show in the post excerpts.', 'enar'),
				'default'   => '20',
			),
			array(
				'id'        => 'home_grid_expert_length',
				'type'      => 'text',
				'title'     => esc_html__( 'Grid Layout Excerpt', 'enar'),
				'subtitle'  => esc_html__( 'Add the excerpt text length.', 'enar'),
				//'desc'  => esc_html__( 'Number of words you want to show in the post excerpts.', 'enar'),
				'default'   => '20',
			),
			array(
				'id'        => 'home_timeline_expert_length',
				'type'      => 'text',
				'title'     => esc_html__( 'Timeline Layout Excerpt', 'enar'),
				'subtitle'  => esc_html__( 'Add the excerpt text length.', 'enar'),
				//'desc'  => esc_html__( 'Number of words you want to show in the post excerpts.', 'enar'),
				'default'   => '40',
			),
			//============>
			array(
				'id'        => 'post_template_buttons_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Templates Buttons', 'enar'),
			),
			array (
				'id' => 'show_more_button',
				'title' => esc_html__( 'Show ( Read More ) Button', 'enar'),
				'subtitle'  => esc_html__( 'Show or hide ( Read More ) button.', 'enar'),
				//'desc'  => esc_html__( 'This button display only inside blog standard and list layouts.', 'enar'),
				'type' => 'switch',
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'read_more_btn_text',
				'type' => 'text',
				'title' => 'Read More Button',
				'subtitle' => esc_html__( 'The text content for ( Read More ) button.', 'enar'),
				'default' => 'Read More',
			),
			array (
				'id' => 'no_more_posts_text',
				'type' => 'text',
				'title' => 'No More Posts Text',
				'subtitle' => esc_html__( 'The text that appears when all posts is loaded.', 'enar'),
				'default' => 'No More Posts',
			),
			array (
				'id' => 'load_more_posts_text',
				'type' => 'text',
				'title' => 'Load More Posts Text',
				'subtitle' => esc_html__( 'The text content for ( Load More ) button.', 'enar'),
				'default' => 'Load More',
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-search5',
		'title' => esc_html__( 'Search Page', 'enar'),
		'fields' => array(
			//=============>
			array(
				'id'        => 'search_page_sidebar_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Search Page Sidebars', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select search page sidebar position.', 'enar'),
				'id' => 'search_page_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'right',
			),
			array(
				'id'        => 'search_page_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select right sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'right_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'search_page_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				//'desc' => esc_html__( 'Select left sidebar that will display on all single posts pages.', 'enar' ),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'left_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			
	)));

	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-cross3',
		'title' => esc_html__( '404 Page', 'enar'),
		'fields' => array(
			array(
                'id'       => 'notfound_page_title',
                'type'     => 'sortable',
                'title'    => esc_html__( 'Page Title', 'enar' ),
                'subtitle' => esc_html__( 'The text content for 404 page title.', 'enar' ),
                'label'    => true,
                'options'  => array(
                    'bold-text'   => "Ooopps.!",
                    'normal-text'   => "The Page you were looking for doesn't exist",
                ),
				'default'  => array(
                    'bold-text'   => "Ooopps.!",
                    'normal-text'   => "The Page you were looking for doesn't exist",
                )
            ),
			array (
				'id' => 'notfound_page_show_search',
				'type'      => 'switch',
				'title' => esc_html__( 'Show Search', 'enar'),
				'subtitle'  => esc_html__( 'Show or hide search bar.', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'notfound_page_search_text',
				'type' => 'text',
				'title' => 'Search Bar Text',
				'subtitle' => esc_html__( 'The search bar text content.', 'enar'),
				'default' => 'Search for Other Pages',
				'required'  => array('notfound_page_show_search', '=', true),
			),
			array (
				'id' => 'notfound_page_text',
				'type' => 'text',
				'title' => 'Content Text',
				'subtitle' => esc_html__( 'The text content for 404 page.', 'enar'),
				'default' => '404',
			),
			array (
				'id' => 'notfound_page_show_button',
				'type'      => 'switch',
				'title' => esc_html__( 'Show Button', 'enar'),
				'subtitle'  => esc_html__( 'Show or hide navigation button.', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'notfound_page_button_text',
				'type' => 'text',
				'title' => 'Button Text',
				'subtitle' => esc_html__( 'The text content for navigation button.', 'enar'),
				'default' => 'Back To Home Page',
				'required'  => array('notfound_page_show_button', '=', true),
			),
			array(
                'id'       => 'notfound_page_button_url',
                'type'     => 'select',
                'data'     => 'pages',
                'title'    => esc_html__( 'Button URL', 'enar' ),
                'subtitle' => esc_html__( 'Select page url for navigation button.', 'enar' ),
            ),
	)));
	
	/*Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-bell4',
		'title' => esc_html__( 'Coming Soon Page', 'enar'),
		'fields' => array(
		    array (
				'id' => 'comming_soon_counters',
				'type'      => 'switch',
				'title' => esc_html__( 'Show Counters', 'enar'),
				'subtitle'  => esc_html__( 'Show circle counter blocks.', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
	)));*/
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-browser',
		'title' => esc_html__( 'Footer', 'enar'),
		'fields' => array(
		    
			array(
                'id'       => 'footer_text_color_mode',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Footer Color Mode', 'enar' ),
                'subtitle' => esc_html__( 'Choose footer text color mode.', 'enar' ),
                'options'  => array(
                    'hm_dark_footer' => 'Dark Footer',
                    'hm_light_footer' => 'Light Footer',
                ),
                'default'  => 'hm_dark_footer'
            ),
			array (
				'id' => 'footer_dark_mode_bg_color',
				'title' => esc_html__( 'Footer Dark Mode BG-Color', 'enar'),
				'subtitle' => esc_html__( 'Choose footer dark mode background color.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'default'  => '#262626',
				'output'    => array(
					'background' => '#footer.hm_dark_footer',
				),
				'required'  => array('footer_text_color_mode', '=', 'hm_dark_footer'),
			),
			array (
				'id' => 'footer_light_mode_bg_color',
				'title' => esc_html__( 'Footer Light Mode BG-Color', 'enar'),
				'subtitle' => esc_html__( 'Choose footer light mode background color.', 'enar'),
				'type' => 'color',
				'transparent' => false,
				'default'  => '#FBFBFB',
				'output'    => array(
					'background' => '#footer.hm_light_footer',
				),
				'required'  => array('footer_text_color_mode', '=', 'hm_light_footer'),
			),
			//=============>
			array(
				'id'        => 'footer_a_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Footer Widgets Area Options', 'enar'),
			), 
			array (
				'id' => 'footer_show_widgets',
				'type' => 'switch',
				'title' => esc_html__( 'Show Footer widgets', 'enar'),
				'subtitle' => esc_html__( 'Show or hide the footer widgets.', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array(
				'id'       => 'footer_widget_col',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Footer Columns', 'enar'),
				'subtitle' => esc_html__( 'Select the number of columns to display in the footer.', 'enar'),
				'options'  => array(
				    '12' => '1',
					'6' => '2',
					'4' => '3',
					'3' => '4',
					'5col' => '5',
					'2' => '6',
				),
				'default' => '4',
				'select2'  => array( 'allowClear' => false )
			),
			//=============>
			array(
				'id'        => 'footer_b_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Footer Copyright Area Options', 'enar'),
			), 
			array (
				'id' => 'footer_show_rights',
				'type' => 'switch',
				'title' => esc_html__( 'Show Copyright Bar', 'enar'),
				'subtitle' => esc_html__( 'Show or hide the footer copyright bar.', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array(
                'id'       => 'footer_menu',
                'type'     => 'select',
                'data'     => 'menus',
                'title'    => esc_html__( 'Copyright Menus', 'enar' ),
                'subtitle' => esc_html__( 'Choose copyright area menu', 'enar' ),
				//'select2'  => array( 'allowClear' => false )
            ),
			array (
			    'id' => 'footer_rights',
				'type' => 'textarea',
				'title' => esc_html__( 'Copyright Text', 'enar'),
				'subtitle' => esc_html__( 'Footer copyright text content.', 'enar'),
				'desc' => esc_html__( 'Enter the text that displays in the copyright bar. HTML markup can be used.', 'enar'),
				'default' => esc_html__( 'Copyright &copy; 2016 Powered By IdealTheme - Enar Theme, All Rights Reserved.', 'enar'),
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-write',
		'title' => esc_html__( 'bbPress', 'enar'),
		'fields' => array(
			//=============>
			array(
				'id'        => 'bbpress_pages_sidebar_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'bbPress Sidebars', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select Sidebar Position.', 'enar'),
				'id' => 'bbpress_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'right',
			),
			array(
				'id'        => 'bbpress_pages_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'right_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'bbpress_pages_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'left_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-store',
		'title' => esc_html__( 'Woocommerce', 'enar'),
		'fields' => array(
			//=========>
			array(
				'id'        => 'woocommerce_general_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Woocommerce Shop Page', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select Sidebar Position.', 'enar'),
				'id' => 'woocommerce_shop_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'right',
			),
			array(
				'id'        => 'woocommerce_shop_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'woocommerce_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'woocommerce_shop_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'woocommerce_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'woocommerce_posts_per_page',
				'title' => esc_html__( 'Number of Products per Page', 'enar'),
				'subtitle' => esc_html__( 'Insert the number of products to display per page.', 'enar'),
				'desc' => esc_html__( 'To show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '9',
			),
			array (
				'id' => 'woocommerce_shop_custom_content',
				'type' => 'editor',
				'title' => esc_html__( 'Custom Content', 'enar'),
				'subtitle'  => esc_html__( 'The custom content that appear before the products.', 'enar'),
				'args' => array(
					'teeny' => false,
					'drag_drop_upload' => true,
					'textarea_rows' => 20,
				),
			),
			//=========>
			array(
				'id'        => 'woocommerce_single_info',
				'type'      => 'info',
                'style'     => 'success',
				'title'      => esc_html__( 'Woocommerce Single Product Page', 'enar'),
			), 
			array (
				'subtitle' => esc_html__( 'Select Sidebar Position.', 'enar'),
				'id' => 'woocommerce_sidebar_position',
				'type' => 'image_select',
				'options' => array (
				    'right' => $img_path . 'on-right.png',
					'left' => $img_path . 'on-left.png',
					'none' => $img_path .'none.png',
				),
				'title' => esc_html__( 'Sidebar Position', 'enar'),
				'default' => 'none',
			),
			array(
				'id'        => 'woocommerce_pages_sidebar_right',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Right Sidebar', 'enar'),
				'desc' => esc_html__( 'Right sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'woocommerce_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array(
				'id'        => 'woocommerce_pages_sidebar_left',
				'type'      => 'select',
				'data'      => 'sidebars',
				'title'     => esc_html__( 'Left Sidebar', 'enar'),
				'desc' => esc_html__( 'Left sidebar can only be used if sidebar position right is selected.', 'enar' ),
				'default' => 'woocommerce_sidebar',
				'select2'  => array( 'allowClear' => false )
			),
			array (
				'id' => 'woocommerce_single_show_related',
				'type'      => 'switch',
				'title' => esc_html__( 'Show Related Products', 'enar'),
				'subtitle'  => esc_html__( 'Choose to show or hide related products.', 'enar'),
				'default' => true,
				'on'     => 'Show',
				'off'    => 'Hide',
			),
			array (
				'id' => 'woocommerce_posts_per_page',
				'title' => esc_html__( 'Related Products Posts Number', 'enar'),
				'subtitle' => esc_html__( 'Insert the number of products to display inside carousel.', 'enar'),
				'desc' => esc_html__( 'To show all posts write -1', 'enar'),
				'step' => '1',
				'min' => '-1',
				'max' => '50',
				'type' => 'slider',
				'default' => '-1',
			),
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'el el-font',
		'title' => esc_html__( 'Typography', 'enar'),
		'fields' => array(
			array(
                'id'       => 'typography_body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'enar' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'enar' ),
                'google'   => true,
				'line-height'   => false,
                'default'  => array(
                    'color'       => '#666666',
                    'font-size'   => '14px',
                    'font-family' => 'Open Sans,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                ),
				'output'      => array( 'body' ),
				'preview'       => true, 
            ),
			array(
				'id'        => 'typography_heading_info',
				'type'      => 'info',
				'notice'    => true,
				'style'     => 'success',
				'title'     => esc_html__( 'General Headings', 'it_arwen_theme'),
				'desc'      => esc_html__( 'h1 - h2 - h3 - h4 - h5 - h6 ( Tags )', 'enar')
			),
			/*array(
                'id'       => 'typography_heading_all',
                'type'     => 'typography',
                'title'    => esc_html__( 'All Headings Font Family', 'enar' ),
                'subtitle' => esc_html__( 'Specify the heading tags font family.', 'enar' ),
                'google'   => true,
				'text-align'    => false,
				'font-style'    => false, 
				'font-size'     => false,
				'font-weight'   => false,
				'line-height'   => false,
				'text-transform' => false, 
				'color'         => false,
                'default'  => array(
                    'font-family' => '"lato","Open Sans",sans-serif',
                ),
				'output'      => array( 'h1, h2, h3, h4, h5, h6' ),
				'preview'       => true, 
            ),*/
			array(
				'id'            => 'typography_heading_h1',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading 1 ( H1 )', 'it_arwen_theme'),
				'font-family'   => false, 
				'text-align'    => false,
				'font-style'    => true, 
				'font-size'     => true,
				'font-weight'   => true,
				'line-height'   => true,
				'text-transform' => true,
				'word-spacing'  => true,  
				'letter-spacing'=> true, 
				'color'         => true,
				'preview'       => true,   
				'output'        => array('h1'), 
				'default'  => array(
                    'color'       => '#324545',
                    'font-size'   => '40px',
                    'line-height' => '40px',
                ),
			),
			array(
				'id'            => 'typography_heading_h2',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading 2 ( H2 )', 'it_arwen_theme'),
				'font-family'   => false, 
				'text-align'    => false,
				'font-style'    => true, 
				'font-size'     => true,
				'font-weight'   => true,
				'line-height'   => true,
				'text-transform' => true,
				'word-spacing'  => true,  
				'letter-spacing'=> true, 
				'color'         => true,
				'preview'       => true,   
				'output'        => array('h2'), 
				'default'  => array(
                    'color'       => '#324545',
                    'font-size'   => '35px',
                    'line-height' => '35px',
                ),
			),
			array(
				'id'            => 'typography_heading_h3',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading 3 ( H3 )', 'it_arwen_theme'),
				'font-family'   => false, 
				'text-align'    => false,
				'font-style'    => true, 
				'font-size'     => true,
				'font-weight'   => true,
				'line-height'   => true,
				'text-transform' => true,
				'word-spacing'  => true,  
				'letter-spacing'=> true, 
				'color'         => true,
				'preview'       => true,   
				'output'        => array('h3'), 
				'default'  => array(
                    'color'       => '#324545',
                    'font-size'   => '30px',
                    'line-height' => '30px',
                ),
			),
			array(
				'id'            => 'typography_heading_h4',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading 4 ( H4 )', 'it_arwen_theme'),
				'font-family'   => false, 
				'text-align'    => false,
				'font-style'    => true, 
				'font-size'     => true,
				'font-weight'   => true,
				'line-height'   => true,
				'text-transform' => true,
				'word-spacing'  => true,  
				'letter-spacing'=> true, 
				'color'         => true,
				'preview'       => true,   
				'output'        => array('h4'), 
				'default'  => array(
                    'color'       => '#324545',
                    'font-size'   => '24px',
                    'line-height' => '24px',
                ),
			),
			array(
				'id'            => 'typography_heading_h5',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading 5 ( H5 )', 'it_arwen_theme'),
				'font-family'   => false, 
				'text-align'    => false,
				'font-style'    => true, 
				'font-size'     => true,
				'font-weight'   => true,
				'line-height'   => true,
				'text-transform' => true,
				'word-spacing'  => true,  
				'letter-spacing'=> true, 
				'color'         => true,
				'preview'       => true,   
				'output'        => array('h5'), 
				'default'  => array(
                    'color'       => '#324545',
                    'font-size'   => '20px',
                    'line-height' => '20px',
                ),
			),
			array(
				'id'            => 'typography_heading_h6',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading 6 ( H6 )', 'it_arwen_theme'),
				'font-family'   => false, 
				'text-align'    => false,
				'font-style'    => true, 
				'font-size'     => true,
				'font-weight'   => true,
				'line-height'   => true,
				'text-transform' => true,
				'word-spacing'  => true,  
				'letter-spacing'=> true, 
				'color'         => true,
				'preview'       => true,   
				'output'        => array('h6'), 
				'default'  => array(
                    'color'       => '#324545',
                    'font-size'   => '16px',
                    'line-height' => '16px',
                ),
			),
	)));
		
	Redux::setSection( $enar_opt_name, array(
			'icon' => ' ico-code2',
			'title' => esc_html__( 'Custom CSS / jQuery', 'enar'),
			'fields' => array(
					array(
						'id'        => 'my_custom_css',
						'type'      => 'ace_editor',
						'title'     => esc_html__( 'CSS Code', 'enar'),
						'subtitle'  => esc_html__( 'CSS code - without &lt;style&gt; &lt;/style&gt; tag', 'enar'),
						'mode'      => 'css',
						'theme'    => 'monokai',
					),
					
					array(
						'id'        => 'my_custom_script',
						'type'      => 'ace_editor',
						'title'     => esc_html__( 'JS Code', 'enar'),
						'subtitle'  => esc_html__( 'Paste your Script Code here.', 'enar'),
						'mode'      => 'javascript',
						'theme'     => 'chrome',
						'desc' => esc_html__( 'it will be added before closing body tag, you can but any javascript code.', 'enar'),
						'default'   => "jQuery(document).ready(function($){\n\n});"
					),
			)

	) );
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-key3',
		'title' => esc_html__( 'API Authentication', 'enar'),
		'fields' => array(
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Mailchimp', 'enar'), // ( For Newsletter Widget )
		'subsection' => true,
		'fields' => array(
			array (
				'id' => 'mailchimp_api',
				'type' => 'text',
				'title' => esc_html__('Mailchimp API Key', 'enar'),
				'default' => '',
			), 
			array (
				'id' => 'mailchimp_list',
				'type' => 'text',
				'title' => esc_html__('Mailchimp List ID', 'enar'),
				'default' => '',
			), 
	)));
	
	Redux::setSection( $enar_opt_name, array(
		'icon' => 'ico-chevron-right2',
		'title' => esc_html__( 'Twitter Data', 'enar'),
		'subsection' => true,
		'fields' => array(
			array (
				'id' => 'twitter_username',
				'type' => 'text',
				'title' => esc_html__( 'Twitter UserName', 'enar'),
				'desc' => esc_html__( '@username for the website used in the card footer.', 'enar'),
				'default' => 'username',
			), 
	)));
	
	//=======================================================================> End Enar Options
	
	// Remove Redux Ads
	function idealtheme_redux_remove_ads() {
		 ?><style type="text/css">
			#redux-header .rAds {
				height: 0 !important;
			}
			</style>
		<?php
	}
	add_action('admin_head', 'idealtheme_redux_remove_ads');
	
	function idealtheme_options_style_css() {
		 $idealtheme_main_color = idealtheme_option('site_main_color');
		 echo $idealtheme_main_color = ( !empty($idealtheme_main_color) ) ? '<style type="text/css">
		    ::-webkit-selection {
			 	background: '.esc_attr($idealtheme_main_color).';
			}
			::-moz-selection {
			 	background: '.esc_attr($idealtheme_main_color).';
			}
			::selection {
				background: '.esc_attr($idealtheme_main_color).';
			}
			@media only screen and (max-width: 992px) {
				#navy > li.current_page_item > a, #navy > li > a:hover, .mobile_menu #navy > li.opened_menu > a{
					color: '.esc_attr($idealtheme_main_color).';
				}
			}
			@media only screen and (min-width: 768px) {
			  .hm-select, .no-touch .hm-secondary-theme .hm-pricing-list > li .hm-select:hover, .no-touch .hm-popular .hm-select:hover, .hm-secondary-theme .hm-popular .hm-select {
				  background: '.esc_attr($idealtheme_main_color).';
			  }
			}
			@media only screen and (max-width: 320px) {
				.light_header .top-socials > a > span.soc_icon_bg {
						background: '.esc_attr($idealtheme_main_color).';
				}
			}
			@media only screen and (max-width: 992px) {
				.top_add_card:hover, .active .top_add_card, .active .top_add_card > span{
					color: '.esc_attr($idealtheme_main_color).';
				}
			}</style>' : '';
	}
	add_action('wp_head', 'idealtheme_options_style_css');
	
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'enar' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'enar' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }