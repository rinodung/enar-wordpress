<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'YOUR_PREFIX_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'idealtheme_';
    $imgpath = get_template_directory_uri() . '/theme-admin/metaboxes/img/';
    
	$get_menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	$default_menu['main'] = 'Default Menu';
	foreach ( $get_menus as $menu ) {
		$default_menu[$menu->slug] = $menu->name;
	}
	
	global $wp_registered_sidebars;
	$get_sidebars = $wp_registered_sidebars;
	$right_sedebars[''] = 'Default';
	$left_sedebars[''] = 'Default';
	
	if(is_array($get_sidebars) && !empty($get_sidebars)){
		foreach($get_sidebars as $get_sidebars){
			$right_sedebars[$get_sidebars['id']] = $get_sidebars['name'];
			$left_sedebars[$get_sidebars['id']] = $get_sidebars['name'];
		}
	}
	
    //===================================> 
	$meta_boxes[] = array(
        'id' => 'woocommerce_video',
        'title' => 'Video',
        'pages' => array( 'product'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
                'name' => esc_html__( 'Product Video URL', 'enar'),
                'desc' => esc_html__( 'Insert the product video url from youtube.com or vimeo.com', 'enar'),
                'id' => $prefix . 'woocommerce_product_video',
                'type' => 'text',
            ),
           
        )
    );
	
    $meta_boxes[] = array(
        'id' => 'quote_settings',
        'title' => 'Quote Settings',
        'pages' => array( 'post'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
                'name' => esc_html__( 'Quote', 'enar'),
                'desc' => esc_html__( 'Insert the quote content text.', 'enar'),
                'id' => $prefix . 'quote_text',
                'type' => 'textarea',
				'class'   => 'quote_area',
            ),
			array(
				'name'    => esc_html__( 'Quote Author', 'enar'),
				'desc'    => esc_html__( 'Select the place you want to get the name of the author.', 'enar'),
				'id'      => "{$prefix}quote_auther",
				'type'    => 'radio',
				'class'   => 'quote_auther',
				'options' => array(
					'from_title' => esc_html__( 'Make the main title as quote author.', 'enar'),
					'from_admin' => esc_html__( 'Get the post author name.', 'enar'),
					'from_spici' => esc_html__( 'Set a special name.', 'enar'),
				),
				'std'  => 'from_title',
			),
			array(
                'name' => esc_html__( 'Quote Author Special Name', 'enar'),
                'id' => $prefix . 'quote_auther_name',
                'type' => 'text',
                'std' => '',
                'class' => 'hide from_spici',
                'clone' => false,
            ),
           
        )
    );
	
	$meta_boxes[] = array(
		'id' => 'idealtheme_project_setting',
		'title' => esc_html__( 'Project Settings', 'enar'),
		'pages' => array('portfolio' ),
		'context'  => 'normal',
        'priority' => 'high',
		'fields' => array(
		     //=====>
			 array(
                'name' => esc_html__( 'Portfolio Filter Shortcode Image Size:', 'enar'),
                'id' => $prefix . 'post_masonry_color_heading',
                'type' => 'heading',
             ),
			 array(
				'name'    => esc_html__( 'Project Image Size ', 'enar'),
				'id'      => "{$prefix}project_size_type",
				'desc'    => esc_html__( 'Choose the project size for the portfolio filter shortcode ( options 2 - 3 - 4 is for masonry layout ).', 'enar'),
				'type'    => 'radio',
				'options' => array(
					'w1x1' => esc_html__( 'Width Equal Height ( 1 X 1 )', 'enar'),
					'w2x1' => esc_html__( 'Width Equal Double Height ( 2 X 1 )', 'enar'),
					'w1x2' => esc_html__( 'Height Equal Double Width ( 1 X 2 )', 'enar'),
					'w2x2' => esc_html__( 'Double Width & Double Height ( 2 X 2 )', 'enar'),
				),
				'std'  => 'w1x1',
			),
			array(
                'name' => esc_html__( 'For Masonry Colored Template:', 'enar'),
                'id' => $prefix . 'post_masonry_color_heading',
                'type' => 'heading',
            ),
			array(
				'name'  => esc_html__( 'Masonry Custom Color', 'enar'),
				'desc'    => esc_html__( 'Select the box color for this post that will appear inside masonry page template. Note: ( This option only works with the masonry page template ).', 'enar'),
				'id'    => "{$prefix}post_masonry_bg_color",
				'type'  => 'color',
			),							 
		)
	);
	
	
	$meta_boxes[] = array(
        'id'       => 'page_options_settings',
        'title'    => 'Page Options',
        'desc'     => '',
        'pages'    => array( 'post', 'page', 'portfolio', 'product', 'forum', 'topic', 'reply' ),
        'context'  => 'normal',
        'priority' => 'default', // ('high', 'core', 'default' or 'low')
        'fields'   => array(

			array(
                'name' => esc_html__( 'Layout :', 'enar'),
                'id' => $prefix . 'page_layout_heading',
                'type' => 'heading',
            ),
            array(
                'name'    => esc_html__( 'Page Layout', 'enar'),
                'desc'    => 'Choose Page Content Layout ( Full Width - Boxed Width - Sidebar Left - Sidebar Right )',
                'id'      => "{$prefix}theme_layout",
                'type'    => 'image_select',
                'options' => array(
				    '' => "{$imgpath}default_sidebar.png",
					'full1'  => "{$imgpath}layout_a.png",
					'full2'  => "{$imgpath}layout_b.png",
					'boxed1'  => "{$imgpath}layout_c.png",
					'boxed2'  => "{$imgpath}layout_d.png",
                ),
				'std' => '',
            ),
			array(
                'name'    => esc_html__( 'Sidebar Position', 'enar'),
                'desc'    => 'Choose Page Content Layout ( Full Width - Boxed Width - Sidebar Left - Sidebar Right )',
                'id'      => "{$prefix}sidebar_position",
                'type'    => 'image_select',
                'options' => array(
				    '' => "{$imgpath}default_sidebar.png",
					'right' => "{$imgpath}on-right.png",
					'left' => "{$imgpath}on-left.png",
					'none' => "{$imgpath}no_sidebar.png",
                ),
				'std' => "",
            ),
			array(
                'name' => esc_html__( 'Content Padding Top', 'enar'),
                'id' => $prefix . 'page_padding_top',
				'desc'    => esc_html__( 'The space that will appear on the top of the content, In pixels example: 20', 'enar'),
                'type' => 'text',
                'clone' => false,
            ),
			array(
                'name' => esc_html__( 'Content Padding Bottom', 'enar'),
                'id' => $prefix . 'page_padding_bottom',
				'desc'    => esc_html__( 'The space that will appear on the bottom of the content, In pixels example: 20', 'enar'),
                'type' => 'text',
                'clone' => false,
            ),
			/*array(
				'name'    => esc_html__( 'Page Color Skin', 'enar'),
				'id'      => "{$prefix}page_color_skin",
				'desc'    => esc_html__( 'Choose the color mode for this page.', 'enar'),
				'type'    => 'radio',
				'class'   => 'page_title_with_crumbs',
				'options' => array(
					'light_site' => esc_html__( 'Light color ( default background is white and the color text is dark )', 'enar'),
					'dark' => esc_html__( 'Dark color ( default background is dark and the color text is white )', 'enar'),
				),
				'std'  => 'light_site',
			),*/
			array(
				'name'    => esc_html__( 'Select Right Sidebar', 'enar'),
				'id'      => "{$prefix}page_right_sidebar",
				'desc'    => esc_html__( 'Select sidebar that will display on right.', 'enar'),
				'type'    => 'select',
				'class'   => '',
				'options' => $right_sedebars,
			),
			array(
				'name'    => esc_html__( 'Select Left Sidebar', 'enar'),
				'id'      => "{$prefix}page_left_sidebar",
				'desc'    => esc_html__( 'Select sidebar that will display on left.', 'enar'),
				'type'    => 'select',
				'class'   => '',
				'options' => $left_sedebars,
			),
			/*array(
				'name' => esc_html__( 'Show Preloader', 'enar'),
				'id'   => "{$prefix}page_show_preloader",
				'desc'    => esc_html__( 'Choose to show or hide the preloader effect.', 'enar'),
				'type' => 'checkbox',
				'std'  => 1,
			),
			array(
				'name'  => esc_html__( 'Preloader Style', 'enar'),
				'id'    => "{$prefix}page_preloader_style",
				'desc'    => esc_html__( 'Choose the preloader effect style.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    'preloader1' => esc_html__( 'Style 1', 'enar'),
				    'preloader2' => esc_html__( 'Style 2', 'enar'),	
					'preloader3' => esc_html__( 'Style 3', 'enar'),				
				),
				'std'  => 'preloader3',
			),*/
			//-----------------------------------------------------> TopBar
			array(
                'name' => esc_html__( 'Top Bar :', 'enar'),
                'id' => $prefix . 'page_topbar_heading',
                'type' => 'heading',
            ),
			array(
				'name'  => esc_html__( 'Show Top Bar', 'enar'),
				'id'    => "{$prefix}page_top_bar_show",
				'desc'    => esc_html__( 'Choose to show or hide the topbar.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
					'hide' => esc_html__( 'Hide', 'enar'),
				),
				'std'  => '',
			),
			//-----------------------------------------------------> Menu
			array(
                'name' => esc_html__( 'Navigation Bar :', 'enar'),
                'id' => $prefix . 'page_menu_heading',
                'type' => 'heading',
            ),
			array(
				'name'  => esc_html__( 'How To Show Search?', 'enar'),
				'id'    => "{$prefix}page_show_search_as",
				'desc'    => esc_html__( 'Choose how to show the site search.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default Search Bar', 'enar'),
				    'as_bar' => esc_html__( 'Search Bar Beside Menu', 'enar'),
				    'as_icon' => esc_html__( 'Search Icon Beside Menu', 'enar'),	
					'no_search' => esc_html__( 'No Search', 'enar'),				
				),
			),
			array(
				'name'    => esc_html__( 'Select Menu', 'enar'),
				'id'      => "{$prefix}page_select_menu",
				'desc'    => esc_html__( 'Select which menu displays on this page.', 'enar'),
				'type'    => 'select',
				'class'   => 'page_title_with_crumbs',
				'options' => $default_menu,
			),
			array(
				'name'  => esc_html__( 'Menu Align', 'enar'),
				'id'    => "{$prefix}page_menu_align",
				'desc'    => esc_html__( 'Choose the alignment for the main menu.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'f_left' => esc_html__( 'Left', 'enar'),
				    'f_right' => esc_html__( 'Right', 'enar'),					
				),
			),
			array(
				'name'  => esc_html__( 'Menu Style', 'enar'),
				'id'    => "{$prefix}page_menu_style",
				'desc'    => esc_html__( 'Choose style for the main navigation menu.', 'enar'),
				'type'  => 'select',
				'options' => array(
					'' => esc_html__( 'Default', 'enar'),
					'classic_menu' => esc_html__( 'Default Style', 'enar'),
                    'menu_button_mode' => esc_html__( 'Button Mode', 'enar'),				
				),
			),
			array(
				'name'  => esc_html__( 'Menu Position', 'enar'),
				'id'    => "{$prefix}page_menu_position",
				'desc'    => esc_html__( 'Choose style for the main navigation menu.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
					'horizontal_menu' => esc_html__( 'Horizontal Menu', 'enar'),
                    'header_on_side' => esc_html__( 'Side Menu', 'enar'),				
				),
			),
			array(
				'name'  => esc_html__( 'Menu Color Mode', 'enar'),
				'id'    => "{$prefix}page_menu_color_mode",
				'desc'    => esc_html__( 'Choose the main menu color mode.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'light_header' => esc_html__( 'Light', 'enar'),
					'dark_header' => esc_html__( 'Darak', 'enar'),					
				),
			),
			array(
				'name'  => esc_html__( 'Sub Menu Color Mode', 'enar'),
				'id'    => "{$prefix}page_sub_menu_color_mode",
				'desc'    => esc_html__( 'Choose the color for sub menu.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'dark_sup_menu' => esc_html__( 'Darak', 'enar'),
				    'light_sup_menu' => esc_html__( 'Light', 'enar'),					
				),
			),
			
			//-----------------------------------------------------> Title
			array(
                'name' => esc_html__( 'Title Bar :', 'enar'),
                'id' => $prefix . 'page_titlebar_heading',
                'type' => 'heading',
            ),
			array(
				'name'    => esc_html__( 'Page Title Bar', 'enar'),
				'id'      => "{$prefix}page_title_with_crumbs",
				'desc'    => esc_html__( 'Choose how to show or hide the page title bar.', 'enar'),
				'type'    => 'radio',
				'class'   => 'page_title_with_crumbs',
				'options' => array(
				    'option' => esc_html__( 'Default Title', 'enar'),
					'allow_both' => esc_html__( 'Title Bar & Breadcrumbs', 'enar'),
					'allow_title' => esc_html__( 'Title Bar Only', 'enar'),
					'allow_normal_title' => esc_html__( 'Simple Title', 'enar'),
					'not_of_them' => esc_html__( 'Hide All', 'enar'),
				),
				'std'  => 'option',
			),
			array(
				'name'  => esc_html__( 'Title Bar Size', 'enar'),
				'id'    => "{$prefix}page_header_height",
				'desc'    => esc_html__( 'The height size of the title bar.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'default' => esc_html__( 'Small', 'enar'),
					'has_bg_image' => esc_html__( 'Medium', 'enar'),					
					'large_header has_bg_image' => esc_html__( 'Large', 'enar'),
				),
				'std'  => '',
			),
			array(
				'name'  => esc_html__( 'Title Bar BG-Color', 'enar'),
				'id'    => "{$prefix}page_header_bg_color",
				'desc'    => esc_html__( 'Select title bar background color.', 'enar'),
				'type'  => 'color',
			),
			array(
				'name'  => esc_html__( 'Title Bar Font Color', 'enar'),
				'id'    => "{$prefix}page_header_color",
				'desc'    => esc_html__( 'Select title bar font color.', 'enar'),
				'type'  => 'color',
			),
			array(
				'name'  => esc_html__( 'Title Bar BG-Image', 'enar'),
				'id'    => "{$prefix}page_header_bg_image",
				'desc'    => esc_html__( 'Select an image to use for the header background.', 'enar'),
				'type'  => 'media',
				'max_file_uploads'  => 1,
			),
			array(
				'name'  => esc_html__( 'Title Bar BG-Repeat', 'enar'),
				'id'    => "{$prefix}page_header_bg_repeat",
				'desc'    => esc_html__( 'Select how the background image repeats.', 'enar'),
				'type'  => 'select',
				'options' => array(
				    'no-repeat' => esc_html__( 'No Repeat', 'enar'),
					'repeat' => esc_html__( 'Repeat', 'enar'),					
					'repeat-x' => esc_html__( 'Repeat Horizontally', 'enar'),
					'repeat-y' => esc_html__( 'Repeat Vertically', 'enar'),
				),
			),
		    array(
				'name'  => esc_html__( 'Title Bar BG-Attachment', 'enar'),
				'id'    => "{$prefix}page_header_bg_type",
				'desc'    => esc_html__( 'Select the background image attachment type.', 'enar'),
				'type'  => 'select',
				
				'options' => array(
				    'scroll' => esc_html__( 'Scroll', 'enar'),
					'fixed' => esc_html__( 'Fixed', 'enar'),
				),
				'std'  => 'fixed',
			),
		    array(
				'name'  => esc_html__( 'Title Bar BG-Size', 'enar'),
				'id'    => "{$prefix}page_header_bg_size",
				'desc'    => esc_html__( 'Select the background image size.', 'enar'),
				'type'  => 'select',
				
				'options' => array(
					'cover' => esc_html__( 'cover', 'enar'),
					'auto' => esc_html__( 'inherit', 'enar'),
					'contain' => esc_html__( 'contain', 'enar'),
				),
				'std'  => 'cover',
			),
			
			//-----------------------------------------------------> Background
			array(
                'name' => esc_html__( 'Page Background :', 'enar'),
                'id' => $prefix . 'page_bg_heading',
                'type' => 'heading',
            ),
			array(
				'name'  => esc_html__( 'Background color', 'enar'),
				'desc'    => esc_html__( 'Select the page background color.', 'enar'),
				'id'    => "{$prefix}page_custom_bg_color",
				'type'  => 'color',
			),
			array(
				'name'  => esc_html__( 'Background Image', 'enar'),
				'id'    => "{$prefix}page_custom_bg_image",
				'desc'    => esc_html__( 'Select an image to use as a background for this page.', 'enar'),
				'type'  => 'media',
				'max_file_uploads'  => 1,
			),	
			array(
				'name'  => esc_html__( 'Background Repeat', 'enar'),
				'id'    => "{$prefix}page_custom_bg_repeat",
				'desc'    => esc_html__( 'Select how the background image repeats.', 'enar'),
				'type'  => 'select',
				
				'options' => array(
				    'no-repeat' => esc_html__( 'No Repeat', 'enar'),
					'repeat' => esc_html__( 'Repeat', 'enar'),					
					'repeat-x' => esc_html__( 'Repeat Horizontally', 'enar'),
					'repeat-y' => esc_html__( 'Repeat Vertically', 'enar'),
				),
			),
		    array(
				'name'  => esc_html__( 'Background Attachment', 'enar'),
				'id'    => "{$prefix}page_custom_bg_type",
				'type'  => 'select',
				'desc'    => esc_html__( 'Select the background image attachment type.', 'enar'),
				'options' => array(
					'fixed' => esc_html__( 'Fixed', 'enar'),
					'scroll' => esc_html__( 'Scroll', 'enar'),
				),
				'std'  => 'fixed',
			),
	
		   array(
				'name'  => esc_html__( 'Background size', 'enar'),
				'id'    => "{$prefix}page_custom_bg_size",
				'type'  => 'select',
				'desc'    => esc_html__( 'Select the background image size.', 'enar'),
				'options' => array(
					'cover' => esc_html__( 'cover', 'enar'),
					'auto' => esc_html__( 'inherit', 'enar'),
					'contain' => esc_html__( 'contain', 'enar'),
				),
				'std'  => 'cover',
			),
			array(
				'name' => esc_html__( 'Background Overlay', 'enar'),
				'id'   => "{$prefix}page_bg_overlay",
				'type' => 'checkbox',
				'std'  => 0,
			),
			//-----------------------------------------------------> Footer
			array(
                'name' => esc_html__( 'Footer :', 'enar'),
                'id' => $prefix . 'page_footer_heading',
                'type' => 'heading',
            ),
			array(
				'name' => esc_html__( 'Display Footer Widgets Area', 'enar'),
				'desc' => esc_html__( 'Choose to show or hide footer widgets.', 'enar'),
				'id'   => "{$prefix}page_show_footer_widgets_opt",
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
					'hide' => esc_html__( 'Hide', 'enar'),
				),
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Display Copyright Area', 'enar'),
				'desc' => esc_html__( 'Choose to show or hide footer copyright area.', 'enar'),
				'id'   => "{$prefix}page_show_footer_copyright_opt",
				'type'  => 'select',
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
					'hide' => esc_html__( 'Hide', 'enar'),
				),
				'std'  => '',
			),
			
        ),
    );
	
	$meta_boxes[] = array(
        'id'       => 'related_post_layout',
        'title'    => 'Single Post Options',
        'desc'     => '',
        'pages'    => array( 'post' ),
        'context'  => 'normal', // ('normal', 'advanced', or 'side')
        'priority' => 'high', // ('high', 'core', 'default' or 'low')
        'fields'   => array(

			//-----------------------------------------------------> Related Posts
			array(
                'name' => esc_html__( 'Related Posts:', 'enar'),
                'id' => $prefix . 'post_related_heading',
                'type' => 'heading',
            ),
			/*array(
                'name' => esc_html__( 'Related Main Title', 'enar'),
                'id' => $prefix . 'related_posts_title',
				'desc'    => esc_html__( 'The related posts carousel title text.', 'enar'),
                'type' => 'text',
                'clone' => false,
            ),*/
			array(
				'name'    => esc_html__( 'Related Posts Source', 'enar'),
				'id'      => "{$prefix}related_posts_type",
				'desc'    => esc_html__( 'Set where you get the related posts from.', 'enar'),
				'type'    => 'radio',
				'class'   => 'related_posts_type',
				'options' => array(
					'f_all_posts' => esc_html__( 'From All Posts', 'enar'),
					'f_current_cats' => esc_html__( 'From The Categories Of Current Post', 'enar'),
					'f_choosen' => esc_html__( 'Select From The Posts', 'enar'),				
				),
				'std'  => 'f_all_posts',
			),
			array(
				'name' => esc_html__( 'Select Related Posts', 'enar'),
				'id' => $prefix ."related_posts_items_choosen",
				'type' => 'post',				
				'post_type' => 'post',
				'field_type' => 'select',
				'multiple' => true,
				'class' => 'hiden_selected_posts hm_multi_select',
			),
			array(
				'name' => esc_html__( 'Show Related Posts Dates', 'enar'),
				'id'   => "{$prefix}related_posts_items_date",
				'desc'    => esc_html__( 'Choose to show or hide the post date inside related posts items.', 'enar'),
				'type' => 'checkbox',
				'std'  => 1,
			),
			//=====>
			array(
                'name' => esc_html__( 'Blog Filter Shortcode Image Size:', 'enar'),
                'id' => $prefix . 'post_masonry_color_heading',
                'type' => 'heading',
            ),
			array(
				'name'    => esc_html__( 'Post Image Size ', 'enar'),
				'id'      => "{$prefix}project_size_type",
				'desc'    => esc_html__( 'Choose post image size for the blog filter shortcode ( options 2 - 3 - 4 is for masonry layout ).', 'enar'),
				'type'    => 'radio',
				'options' => array(
					'w1x1' => esc_html__( 'Width Equal Height ( 1 X 1 )', 'enar'),
					'w2x1' => esc_html__( 'Width Equal Double Height ( 2 X 1 )', 'enar'),
					'w1x2' => esc_html__( 'Height Equal Double Width ( 1 X 2 )', 'enar'),
					'w2x2' => esc_html__( 'Double Width & Double Height ( 2 X 2 )', 'enar'),
				),
				'std'  => 'w1x1',
			),
			array(
                'name' => esc_html__( 'For Masonry Colored Template:', 'enar'),
                'id' => $prefix . 'post_masonry_color_heading',
                'type' => 'heading',
            ),
			array(
				'name'  => esc_html__( 'Masonry Custom Color', 'enar'),
				'desc'    => esc_html__( 'Select the box color for this post that will appear inside masonry page template. Note: ( This option only works with the masonry page template ).', 'enar'),
				'id'    => "{$prefix}post_masonry_bg_color",
				'type'  => 'color',
			),
        ),
    ); 
	
	$meta_boxes[] = array(
		'id' => 'idealtheme_post_setting',
		'title' => esc_html__( 'Post Settings', 'enar'),
		'pages' => array( 'post'),
		'context' => 'side',
		'priority' => 'core',
		'fields' => array(
			 array(
				'name'  => esc_html__( 'Show Feature Area', 'enar'),
				'id'    => "{$prefix}posto_hide_feature_img",
				'type'  => 'checkbox', 
				'std'   => true,           
			),	  
			array(
				'name'  => esc_html__( 'Show Social Share Box', 'enar'),
				'id'    => "{$prefix}posto_post_share",
				'type'  => 'select',   
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
				    'hide' => esc_html__( 'Hide', 'enar'),					
				),    
				'std'   => '',  
			),  
			
			array(
				'name'  => esc_html__( 'Show Related Posts', 'enar'),
				'id'    => "{$prefix}posto_enable_related_posts",
				'type'  => 'select',   
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
				    'hide' => esc_html__( 'Hide', 'enar'),					
				),    
				'std'   => '',  
			), 
			              
			array(
				'name'  => esc_html__( 'Show Previous/Next Pagination', 'enar'),
				'id'    => "{$prefix}posto_next_post",
				'type'  => 'select',   
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
				    'hide' => esc_html__( 'Hide', 'enar'),					
				),    
				'std'   => '',  
			),
			
			array(
				'name'  => esc_html__( 'Show Post Meta', 'enar'),
				'id'    => "{$prefix}posto_meta",
				'type'  => 'select',   
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
				    'hide' => esc_html__( 'Hide', 'enar'),					
				),    
				'std'   => '',                      
			),
			
			array(
				'name'  => esc_html__( 'Show Post Tags', 'enar'),
				'id'    => "{$prefix}posto_tags",
				'type'  => 'select',   
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
				    'hide' => esc_html__( 'Hide', 'enar'),					
				),    
				'std'   => '',                        
			),
			
			array(
				'name'  => esc_html__( 'Show Comments', 'enar'),
				'id'    => "{$prefix}posto_disable_comments",
				'type'  => 'select',   
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
				    'hide' => esc_html__( 'Hide', 'enar'),					
				),    
				'std'   => '',  
			), 
			
			array(
				'name'  => esc_html__( 'Show Author Info Box', 'enar'),
				'id'    => "{$prefix}posto_show_author_box",
				'type'  => 'select',   
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
				    'hide' => esc_html__( 'Hide', 'enar'),					
				),    
				'std'   => '',  
			), 
										 
		)
	
	);
    
	$meta_boxes[] = array(
		'id' => 'idealtheme_page_setting',
		'title' => esc_html__( 'Page Settings', 'enar'),
		'pages' => array( 'page'),
		'context' => 'side',
		'priority' => 'core',
		'fields' => array(
			array(
				'name'  => esc_html__( 'Show Comments', 'enar'),
				'id'    => "{$prefix}page_show_comments",
				'type'  => 'select',   
				'options' => array(
				    '' => esc_html__( 'Default', 'enar'),
				    'show' => esc_html__( 'Show', 'enar'),
				    'hide' => esc_html__( 'Hide', 'enar'),					
				),    
				'std'   => '',  
			), 							 
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'idealtheme_sliders_setting',
		'title' => esc_html__( 'Slider Settings', 'enar'),
		'pages' => array( 'sliders'),
		'context' => 'side',
		'priority' => 'core',
		'fields' => array(
			array(
				'name'  => esc_html__( 'Animation Type', 'enar'),
				'class'  => 'owl_slider_opt',
				'id'    => "{$prefix}sliders_animation_type",
				'type'  => 'select',
				'options' => array(
				    'slide' => esc_html__( 'Slide Effect', 'enar'),
					'fade' => esc_html__( 'Fade Effect', 'enar'),
					'fadeUp' => esc_html__( 'FadeUp Effect', 'enar'),
					'backSlide' => esc_html__( 'BackSlide Effect', 'enar'),					
					'goDown' => esc_html__( 'GoDown Effect', 'enar'),
				),
				'std'  => 'slide',
			),	
			array(
				'name'  => esc_html__( 'Animation Type', 'enar'),
				'class'  => 'flex_slider_opt',
				'id'    => "{$prefix}sliders_flex_animation_type",
				'type'  => 'select',
				'options' => array(
				    'slide' => esc_html__( 'Slide Effect', 'enar'),
					'fade' => esc_html__( 'Fade Effect', 'enar'),
				),
				'std'  => 'slide',
			),
			array(
				'name'  => esc_html__( 'Easing Type', 'theme'),
				'class'  => 'flex_slider_opt',
				'id'    => "{$prefix}sliders_flex_easing",
				'type'  => 'select',
				'options' => array(					
					'easeInQuad' => 'easeInQuad',
					'easeOutQuad' => 'easeOutQuad',
					'easeInOutQuad' => 'easeInOutQuad',
					'easeInCubic' => 'easeInCubic',
					'easeOutCubic' => 'easeOutCubic',
					'easeInOutCubic' => 'easeInOutCubic',
					'easeInQuart' => 'easeInQuart',
					'easeOutQuart' => 'easeOutQuart',
					'easeInOutQuart' => 'easeInOutQuart',
					'easeInQuint' => 'easeInQuint',
					'easeOutQuint' => 'easeOutQuint',
					'easeInOutQuint' => 'easeInOutQuint',
					'easeInSine' => 'easeInSine',
					'easeOutSine' => 'easeOutSine',
					'easeInOutSine' => 'easeInOutSine',
					'easeInExpo' => 'easeInExpo',
					'easeOutExpo' => 'easeOutExpo',
					'easeInOutExpo' => 'easeInOutExpo',
					'easeInCirc' => 'easeInCirc',
					'easeOutCirc' => 'easeOutCirc',
					'easeInOutCirc' => 'easeInOutCirc',
					'easeInElastic' => 'easeInElastic',
					'easeOutElastic' => 'easeOutElastic',
					'easeInOutElastic' => 'easeInOutElastic',
					'easeInBack' => 'easeInBack',
					'easeOutBack' => 'easeOutBack',
					'easeInOutBack' => 'easeInOutBack',
					'easeInBounce' => 'easeInBounce',
					'easeOutBounce' => 'easeOutBounce',
					'easeInOutBounce' => 'easeInOutBounce',
					'jswing' => 'jswing',
					'def' => 'def',
				),
				'std'         => 'easeInOutExpo',
			),
			array(
				'name'  => esc_html__( 'Easing Type', 'theme'),
				'class'  => 'wobbly_slider_opt',
				'id'    => "{$prefix}sliders_wobbly_easing",
				'type'  => 'select',
				'options' => array(		
					'cubic-bezier(0.8,0,.2,1)' => 'Default Easing',    
					'cubic-bezier(0.250, 0.250, 0.750, 0.750)' => 'linear',
					'cubic-bezier(0.250, 0.100, 0.250, 1.000)' => 'ease (default)',
					'cubic-bezier(0.420, 0.000, 1.000, 1.000)' => 'ease-in',
					'cubic-bezier(0.000, 0.000, 0.580, 1.000)' => 'ease-out',
					'cubic-bezier(0.420, 0.000, 0.580, 1.000)' => 'ease-in-out',
					'cubic-bezier(0.550, 0.085, 0.680, 0.530)' => 'easeInQuad',
					'cubic-bezier(0.550, 0.055, 0.675, 0.190)' => 'easeInCubic',
					'cubic-bezier(0.895, 0.030, 0.685, 0.220)' => 'easeInQuart',
					'cubic-bezier(0.755, 0.050, 0.855, 0.060)' => 'easeInQuint',
					'cubic-bezier(0.470, 0.000, 0.745, 0.715)' => 'easeInSine',
					'cubic-bezier(0.950, 0.050, 0.795, 0.035)' => 'easeInExpo',
					'cubic-bezier(0.600, 0.040, 0.980, 0.335)' => 'easeInCirc',
					'cubic-bezier(0.600, -0.280, 0.735, 0.045)' => 'easeInBack',
					'cubic-bezier(0.250, 0.460, 0.450, 0.940)' => 'easeOutQuad',
					'cubic-bezier(0.215, 0.610, 0.355, 1.000)' => 'easeOutCubic',
					'cubic-bezier(0.165, 0.840, 0.440, 1.000)' => 'easeOutQuart',
					'cubic-bezier(0.230, 1.000, 0.320, 1.000)' => 'easeOutQuint',
					'cubic-bezier(0.390, 0.575, 0.565, 1.000)' => 'easeOutSine',
					'cubic-bezier(0.190, 1.000, 0.220, 1.000)' => 'easeOutExpo',
					'cubic-bezier(0.075, 0.820, 0.165, 1.000)' => 'easeOutCirc',
					'cubic-bezier(0.175, 0.885, 0.320, 1.275)' => 'easeOutBack',
					'cubic-bezier(0.455, 0.030, 0.515, 0.955)' => 'easeInOutQuad',
					'cubic-bezier(0.645, 0.045, 0.355, 1.000)' => 'easeInOutCubic',
					'cubic-bezier(0.770, 0.000, 0.175, 1.000)' => 'easeInOutQuart',
					'cubic-bezier(0.860, 0.000, 0.070, 1.000)' => 'easeInOutQuint',
					'cubic-bezier(0.445, 0.050, 0.550, 0.950)' => 'easeInOutSine',
					'cubic-bezier(1.000, 0.000, 0.000, 1.000)' => 'easeInOutExpo',
					'cubic-bezier(0.785, 0.135, 0.150, 0.860)' => 'easeInOutCirc',
					'cubic-bezier(0.680, -0.550, 0.265, 1.550)' => 'easeInOutBack',
				),
				'std'         => 'cubic-bezier(0.8,0,.2,1)',
			),
			array(
				'name'  => esc_html__( 'Animation Type', 'theme'),
				'class'  => 'camera_slider_opt',
				'id'    => "{$prefix}sliders_camera_animation",
				'type'  => 'select',
				'options' => array(		
					'random' => 'Random',
					'simpleFade' => 'simpleFade', 
					'curtainTopLeft' => 'curtainTopLeft', 
					'curtainTopRight' => 'curtainTopRight', 
					'curtainBottomLeft' => 'curtainBottomLeft', 
					'curtainBottomRight' => 'curtainBottomRight', 
					'curtainSliceLeft' => 'curtainSliceLeft', 
					'curtainSliceRight' => 'curtainSliceRight', 
					'blindCurtainTopLeft' => 'blindCurtainTopLeft', 
					'blindCurtainTopRight' => 'blindCurtainTopRight', 
					'blindCurtainBottomLeft' => 'blindCurtainBottomLeft', 
					'blindCurtainBottomRight' => 'blindCurtainBottomRight', 
					'blindCurtainSliceBottom' => 'blindCurtainSliceBottom', 
					'blindCurtainSliceTop' => 'blindCurtainSliceTop', 
					'stampede' => 'stampede', 
					'mosaic' => 'mosaic', 
					'mosaicReverse' => 'mosaicReverse', 
					'mosaicRandom' => 'mosaicRandom', 
					'mosaicSpiral' => 'mosaicSpiral', 
					'mosaicSpiralReverse' => 'mosaicSpiralReverse', 
					'topLeftBottomRight' => 'topLeftBottomRight', 
					'bottomRightTopLeft' => 'bottomRightTopLeft', 
					'bottomLeftTopRight' => 'bottomLeftTopRight', 
					'bottomLeftTopRight' => 'bottomLeftTopRight', 
					'scrollLeft' => 'scrollLeft', 
					'scrollRight' => 'scrollRight', 
					'scrollHorz' => 'scrollHorz', 
					'scrollBottom' => 'scrollBottom', 
					'scrollTop' => 'scrollTop', 
				),
				'std'  => 'random',
			),
			array(
				'name'  => esc_html__( 'Loader Type', 'enar'),
				'class'  => 'camera_slider_opt',
				'id'    => "{$prefix}sliders_camera_loader",
				'type'  => 'select',
				'options' => array(
				    'pie' => esc_html__( 'Pie Loader', 'enar'),
					'bar' => esc_html__( 'Bar Loader', 'enar'),
					'none' => esc_html__( 'None', 'enar'),
				),
				'std'  => 'pie',
			),
			array(
				'name' => esc_html__( 'Duration speed', 'enar'),
				'class'  => 'owl_slider_opt flex_slider_opt camera_slider_opt',
				'desc' => esc_html__( 'The time one slide take to complete it\'s animation on the screen in Milliseconds.', 'enar'),
				'id'   => "{$prefix}sliders_duration_speed",
				'type' => 'slider',
				
				'prefix' => '( ',
				'suffix' => ' )',
				'js_options' => array(
					'min'   => 1000,
					'max'   => 20000,
					'step'  => 200,
				),
				'std'  => 1000,
			),
			array(
				'name' => esc_html__( 'Time Out Duration', 'enar'),
				'class'  => 'owl_slider_opt flex_slider_opt camera_slider_opt wobbly_slider_opt',
				'desc' => esc_html__( 'The time one slide stays on the screen in Milliseconds.', 'enar'),
				'id'   => "{$prefix}sliders_duration_timeout",
				'type' => 'text',
				'std'  => '3000',
				
			),
			array(
				'name' => esc_html__( 'Show Thumbnails', 'enar'),
				'class'  => 'flex_slider_opt camera_slider_opt',
				'id'   => "{$prefix}sliders_show_thumbs",
				'desc' => esc_html__( 'Show or hide the thumbnails carousel.', 'enar'),
				'type' => 'checkbox',
				'std'  => 1,
			),
			array(
				'name' => esc_html__( 'Stop On Hover', 'enar'),
				'class'  => 'owl_slider_opt flex_slider_opt camera_slider_opt',
				'id'   => "{$prefix}sliders_pause_on_hover",
				'desc' => esc_html__( 'Stop the Timer when hovering the slider.', 'enar'),
				'type' => 'checkbox',
				'std'  => 1,
			),
			array(
				'name' => esc_html__( 'Auto Height', 'enar'),
				'class'  => 'owl_slider_opt',
				'id'   => "{$prefix}sliders_auto_height",
				'desc' => esc_html__( 'Use diffrent heights on each slide.', 'enar'),
				'type' => 'checkbox',
				'std'  => 1,
			),	
			array(
				'name' => esc_html__( 'Show Navigation', 'enar'),
				'class'  => 'owl_slider_opt flex_slider_opt camera_slider_opt',
				'id'   => "{$prefix}sliders_nav_arrows",
				'desc' => esc_html__( 'Always show the navigation arrows.', 'enar'),
				'type' => 'checkbox',
				'std'  => 1,
			),	
			array(
				'name' => esc_html__( 'Show Pagination', 'enar'),
				'class'  => 'owl_slider_opt flex_slider_opt camera_slider_opt',
				'id'   => "{$prefix}sliders_pagination",
				'desc' => esc_html__( 'Always show the pagination bullets.', 'enar'),
				'type' => 'checkbox',
				'std'  => 1,
			),					 
		)
	
	);
	
	if ( class_exists( 'woocommerce' ) ) {
		if ( post_type_exists( 'portfolio' ) ){	
			$meta_boxes[] = array(
				'id' => 'idealtheme_product_single_setting',
				'title' => esc_html__( 'Other Options', 'enar'),
				'pages' => array('product' ),
				'context' => 'side',
				'priority' => 'core',
				'fields' => array(
					array(
						'name'  => esc_html__( 'Show Product As a New Product', 'enar'),
						'id'    => "{$prefix}product_new_item",
						'type'  => 'checkbox',   
						/*'options' => array(
							'' => esc_html__( 'Default', 'enar'),
							'show' => esc_html__( 'Show', 'enar'),
							'hide' => esc_html__( 'Hide', 'enar'),					
						),  */  
						'std'   => false,  
					),						 
				)
			
			);
		}
	}
	
	if ( post_type_exists( 'portfolio' ) ){	
		$meta_boxes[] = array(
			'id' => 'idealtheme_post_setting',
			'title' => esc_html__( 'Post Settings', 'enar'),
			'pages' => array('portfolio' ),
			'context' => 'side',
			'priority' => 'core',
			'fields' => array(
				array(
					'name'  => esc_html__( 'Show Previous/Next Pagination', 'enar'),
					'id'    => "{$prefix}portfolio_next_post",
					'type'  => 'select',   
					'options' => array(
						'' => esc_html__( 'Default', 'enar'),
						'show' => esc_html__( 'Show', 'enar'),
						'hide' => esc_html__( 'Hide', 'enar'),					
					),    
					'std'   => '',  
				),
				array(
					'name'  => esc_html__( 'Show Related Posts', 'enar'),
					'id'    => "{$prefix}portfolio_enable_related_posts",
					'type'  => 'select',   
					'options' => array(
						'' => esc_html__( 'Default', 'enar'),
						'show' => esc_html__( 'Show', 'enar'),
						'hide' => esc_html__( 'Hide', 'enar'),					
					),    
					'std'   => '',  
				), 		  
				array(
					'name'  => esc_html__( 'Show Post Meta', 'enar'),
					'id'    => "{$prefix}portfolio_meta",
					'type'  => 'select',   
					'options' => array(
						'' => esc_html__( 'Default', 'enar'),
						'show' => esc_html__( 'Show', 'enar'),
						'hide' => esc_html__( 'Hide', 'enar'),					
					),    
					'std'   => '',                      
				),
				array(
					'name'  => esc_html__( 'Show Comments', 'enar'),
					'id'    => "{$prefix}portfolio_disable_comments",
					'type'  => 'select',   
					'options' => array(
						'' => esc_html__( 'Default', 'enar'),
						'show' => esc_html__( 'Show', 'enar'),
						'hide' => esc_html__( 'Hide', 'enar'),					
					),    
					'std'   => '',  
				), 							 
			)
		
		);
	}

	return $meta_boxes;
}