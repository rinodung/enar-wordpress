<?php

class idealtheme_custom_Walker extends Walker_Nav_Menu {
 private $curItem;
 function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];

        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
        }

        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	 
// add classes to ul sub-menus
function start_lvl( &$output, $depth=0, $args=array() ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'hm_parent_ul',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'hm_parent_ul' : '' ),
        'menu-depth-' . esc_attr($display_depth)
        );
    $class_names = implode( ' ', $classes );
    
	$hm_sub_ul = '';
	if ( isset( $this->curItem->idealtheme_sub_menu_type )) {
		
		if ( 0 == $depth ){
			if( $this->curItem->idealtheme_sub_menu_type == 'normal'){
				$hm_sub_ul = '';
				
			}else if( $this->curItem->idealtheme_sub_menu_type == 'mega' ){
				$hm_sub_ul = ' mega_menu';
				
			}else if( $this->curItem->idealtheme_sub_menu_type == 'tabs' ){
				$hm_sub_ul = ' tab_menu';
				
			}else if( $this->curItem->idealtheme_sub_menu_type == 'slider' ){
				$hm_sub_ul = ' image_menu';
			}
		}else if ( 1 == $depth ){
			if( $this->curItem->idealtheme_sub_menu_type == 'normal'){
				$hm_sub_ul = '';
				
			}else if( $this->curItem->idealtheme_sub_menu_type == 'mega' ){
				$hm_sub_ul = ' mega_menu_in';
				
			}else if( $this->curItem->idealtheme_sub_menu_type == 'tabs' ){
				$hm_sub_ul = ' tab_menu_list';
				
			}else if( $this->curItem->idealtheme_sub_menu_type == 'slider' ){
				$hm_sub_ul = ' image_menu';
			}
		}
	}

    $output .= "\n" . $indent . '<ul class="' . esc_attr($class_names) . esc_attr($hm_sub_ul) . '">' . "\n";
	if ( isset( $this->curItem->idealtheme_sub_menu_type )) {
		
		if ( 0 == $depth && $this->curItem->idealtheme_sub_menu_type == 'slider'){
			$output .= '<li class="image_menu_slide">';
		}
	}
}

// Displays end of a level. E.g '</ul>'
// @see Walker::end_lvl()
function end_lvl(&$output, $depth=0, $args=array()) {
	if ( isset( $this->curItem->idealtheme_sub_menu_type )) {
		
		if ( 0 == $depth && $this->curItem->idealtheme_sub_menu_type == 'slider'){
			$output .= "</li>\n";
		}
	}
	$output .= "</ul>\n";
} 
 
// add main/sub classes to li's and links
function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
	$this->curItem = $item;
	
	if ( isset($args->has_children) && $args->has_children ) {
            $item->classes[] = 'dropdown-toggle nav-toggle';
    }
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
    
	
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . esc_attr($depth)
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
    
	$sub_menu_type = '';
	if ( isset($item->idealtheme_sub_menu_type)) {
		
		if( $item->idealtheme_sub_menu_type == 'normal'){
			$sub_menu_type = ' normal_menu';
			
		}else if( $item->idealtheme_sub_menu_type == 'mega' ){
			$sub_menu_type = ' has_mega_menu';
			
		}else if( $item->idealtheme_sub_menu_type == 'tabs' ){
			$sub_menu_type = ' has_tab_menu ';
			
		}else if( $item->idealtheme_sub_menu_type == 'slider' ){
			$sub_menu_type = ' has_image_menu';
		}
		
	}
	
    // build html

	if ( 1 == $depth && $item->idealtheme_sub_menu_type == 'slider'){
		$output .= $indent . '<div class="img_menu_i">';
	}else{
		$output .= $indent . '<li id="nav-menu-item-'. esc_attr($item->ID) . '" class="' . esc_attr($depth_class_names) . ' ' . esc_attr($class_names) . esc_attr($sub_menu_type) .'">';
	}

  
    // link attributes
	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	//==========> icon output
	$get_menu_icon_html = '';

	if ( isset($item->choose_icon) && isset($item->idealtheme_menu_type) ) {
		if( $item->choose_icon !== '' ){
			
			if ( $item->idealtheme_menu_type == 'icon' || $item->idealtheme_menu_type == 'all') {
				$get_menu_icon_html = '<i class="menu_icon '.esc_attr($item->choose_icon).'"></i>';	
			}
		}
		
	}
	if ($item->menu_item_parent != 0 ) {
		
	}
	//==========> one page
	$page = get_page( $item->object_id );
	
	if (isset($page->post_name)) {
		$slug = $page->post_name;
	} else {
		$slug = '';
	}
	
	
	if (isset($item->idealtheme_one_page) && $item->idealtheme_one_page == 'section') {
		wp_enqueue_script( 'idealtheme_onepage_js', get_template_directory_uri() . '/js/jquery.nav.js', array(), '1.0', true );
		
		$attributes .= ' href="'.esc_attr( $item->url).'" class="scroll onepage"';
		
	} else {
		
		$attributes .= ! empty( $item->url )  ? ' href="'.esc_attr( $item->url).'"' : '';
	}
	
	//=========== title and icon
	$title_container = '';
	if ( isset($item->idealtheme_menu_type) ) {
		if( $item->idealtheme_menu_type == 'all' || $item->idealtheme_menu_type == 'title' ){
			$title_container = apply_filters( 'the_title', $item->title, $item->ID );
		}
	}
	
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	
	$get_curr_id  = ! empty( $item->ID )           ? $item->ID : '';
	$get_curr_val = ! empty( $item->color_picker ) ? $item->color_picker : '';
	
	if ($item->color_picker !== '') {
		
		echo '<style>.menu_button_mode:not(.header_on_side) #navy > li#nav-menu-item-'.esc_attr($get_curr_id).'.current_page_item > a, 
.menu_button_mode:not(.header_on_side) #navy > li#nav-menu-item-'.esc_attr($get_curr_id).'.current_page_item:hover > a, .menu_button_mode:not(.header_on_side) #navy > li#nav-menu-item-'.esc_attr($get_curr_id).':hover > a { background: '.esc_attr($get_curr_val).' !important }
li#nav-menu-item-'.esc_attr($get_curr_id).'.active > a, li#nav-menu-item-'.esc_attr($get_curr_id).'.current-menu-item > a, li#nav-menu-item-'.esc_attr($get_curr_id).'.current_page_item > a, li#nav-menu-item-'.esc_attr($get_curr_id).' > a:hover{background-color:'.esc_attr($get_curr_val).'; color:#fff;}li#nav-menu-item-'.esc_attr($get_curr_id).':hover > a{background-color:'.esc_attr($get_curr_val).';color:#fff;}
		li.current_page_ancestor > a{background-color:'.esc_attr($get_curr_val).';color:#fff;}</style>';
		
	}
	
	
	//=========== First Level
	if ( $depth == 0 ){
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s%6$s</a>%7$s',
			$args->before,
			$attributes,
			$args->link_before,
			$get_menu_icon_html,
			$title_container,
			$args->link_after,
			$args->after
		);
	}else{
		if ( isset($item->idealtheme_menu_type) ){
			if ( 1 == $depth && $item->idealtheme_sub_menu_type == 'slider' ){
				
				$post_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($item->object_id), 'enar-blog-carousel');
				$post_img 	= $post_img['0'];
				
				$item_output = sprintf( '<a%1$s>
						<img src="%2$s" alt="%3$s" >
						<span>%4$s</span>
					</a>',
					$attributes,
					esc_attr($post_img),
					esc_attr($item->title),
					$item->title
				);
			}else{
				$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s%6$s</a>%7$s',
					$args->before,
					$attributes,
					$get_menu_icon_html,
					$args->link_before,
					$title_container,
					$args->link_after,
					$args->after
				);
			}
		}else{
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s%6$s</a>%7$s',
				$args->before,
				$attributes,
				$get_menu_icon_html,
				$args->link_before,
				$title_container,
				$args->link_after,
				$args->after
			);
		}
	}
    
	
	$get_menu_icon_html = '';
	$title_container = '';
	
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}

function end_el(&$output, $item, $depth=0, $args=array()) {
	if ( 1 == $depth && $item->idealtheme_sub_menu_type == 'slider'){
		$output .= "</div>\n";
	}else{
		$output .= "</li>\n";
	}
	
}

}

?>