<?php 
    global $post;
    $c_term       = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$current_term = $c_term->name;
	
	$filter_style   = 'simple';               // simple - bootmanim - hoverdir        
	$filter_buttons_style   = 'icon_but';     // text_but - icon_but      
	$filter_filter_layout   = 'grid_porto';   // grid_porto - masonry_porto     
	$filter_filter_column   = 'two_blocks';   // two_blocks - three_blocks - four_blocks - five_portos      
	$filter_filter_spaces   = 'has_sapce_portos';   
	$filter_filter_width    = 'boxed_portos';      
	$filter_items_counter   = 'nav_with_nums';     

	$filter_zoom_btn_text   = 'Zoom';
	$filter_more_btn_text   = 'Explore';
	$filter_ajax_btn_text   = 'Expand';
	$filter_all_btn_text    = 'All';
	
	$filter_sort_srtby_text   = 'Sort By';
	$filter_sort_names_text   = 'Names';
	$filter_sort_dates_text   = 'Dates';
	$filter_sort_likes_text   = 'Likes';
	$filter_sort_comnt_text   = 'Comments';
	
	$filter_cats   = $current_term;
	$filter_posts_num   = -1;
	
	$filter_orderby   = 'date';                  
	$filter_sortby   = 'ASC';                   
	
	$filter_cat_orderby   = 'count';                 
	$filter_cat_sortby   = 'DESC';                  
	
	$filter_hide_empty   = 0;
	
	$filter_show_ajax_expand   = 'hide';             
	$filter_show_sortby        = 'show';
	$filter_show_all_button    = 'show';
	$filter_show_filters       = 'hide';
	
	$filter_show_date       = 'hide';
	$filter_show_comments   = 'hide';
	$filter_show_like       = 'hide';
?>
            
<?php echo do_shortcode('[hm_portfolio_filter cats="'.esc_attr($filter_cats).'" style="'.esc_attr($filter_style).'" filter_layout="'.esc_attr($filter_filter_layout).'" filter_width="'.esc_attr($filter_filter_width).'" filter_column="'.esc_attr($filter_filter_column).'" filter_spaces="'.esc_attr($filter_filter_spaces).'" items_counter="'.esc_attr($filter_items_counter).'" buttons_style="'.esc_attr($filter_buttons_style).'" orderby="'.esc_attr($filter_orderby).'" sortby="'.esc_attr($filter_sortby).'" cat_orderby="'.esc_attr($filter_cat_orderby).'" cat_sortby="'.esc_attr($filter_cat_sortby).'" hide_empty="'.esc_attr($filter_hide_empty).'" show_all_button="'.esc_attr($filter_show_all_button).'" show_ajax_expand="'.esc_attr($filter_show_ajax_expand).'" show_filters="'.esc_attr($filter_show_filters).'" show_sortby="'.esc_attr($filter_show_sortby).'" show_date="'.esc_attr($filter_show_date).'" show_comments="'.esc_attr($filter_show_comments).'" show_like="'.esc_attr($filter_show_like).'" all_btn_text="'.esc_attr($filter_all_btn_text).'" zoom_btn_text="'.esc_attr($filter_zoom_btn_text).'" more_btn_text="'.esc_attr($filter_more_btn_text).'" ajax_btn_text="'.esc_attr($filter_ajax_btn_text).'" sort_srtby_text="'.esc_attr($filter_sort_srtby_text).'" sort_names_text="'.esc_attr($filter_sort_names_text).'" sort_dates_text="'.esc_attr($filter_sort_dates_text).'" sort_likes_text="'.esc_attr($filter_sort_likes_text).'" sort_comnt_text="'.esc_attr($filter_sort_comnt_text).'" posts_num="'.esc_attr($filter_posts_num).'"]'); ?>