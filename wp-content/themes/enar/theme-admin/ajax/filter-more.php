<?php

add_action( 'init', 'idealtheme_ajax_more_projects' );
function idealtheme_ajax_more_projects() {
	
	wp_enqueue_script( 'idealtheme_ajax_more_projects', get_template_directory_uri().'/theme-admin/ajax/filter-more.js', 'jquery', '1.0', true);
        
	wp_localize_script( 'idealtheme_ajax_more_projects', 'ajax_more_projects', array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'ajax-nonce' ),
		'empty' => esc_html__( 'No More Projects', 'enar'),
	));
          
	add_action( 'wp_ajax_hm_ajax_more_projects', 'idealtheme_ajax_more_projects_fun' );  
	add_action( 'wp_ajax_nopriv_hm_ajax_more_projects', 'idealtheme_ajax_more_projects_fun');
}

function idealtheme_ajax_more_projects_fun() {
	
	global $post;
	global $wp_query;
	global $enar_custom_portfolio_metabox;
	global $enar_custom_posts_gallery;
	
	$nonce = $_POST['nonce'];
	$offset = $_POST['offset'];
	$number_posts_loaded = $_POST['number_posts_loaded'];
	
	$post_type   = $_POST['post_type'];
	$cats_coma   = $_POST['cat_name'];
	//$cats_coma   = explode(' ', $cats_coma);
	$cats_coma = str_replace(' ', ',', $cats_coma);
	
	$orderby     = $_POST['orderby'];
	$sortby      = $_POST['sortby'];
	
	$show_date        = $_POST['show_date'];
	$show_cats        = $_POST['show_cats'];
	$show_comments    = $_POST['show_comments'];
	$show_like        = $_POST['show_like'];
	$buttons_style    = $_POST['buttons_style'];
	
	$show_ajax_expand = $_POST['show_ajax_expand'];
	$zoom_btn_text    = $_POST['zoom_btn_text'];
	$more_btn_text    = $_POST['more_btn_text'];
	$style            = $_POST['style'];
	
	$ajax_btn_text    = $_POST['ajax_btn_text'];
	$loaded_img_layout = $_POST['loaded_img_layout'];
	
	$published_posts  = wp_count_posts( 'portfolio' )->publish;
	
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) || $offset >= $published_posts )
        die ();
	?>
	<?php 
		global $enar_custom_portfolio_metabox;
		
		if ( $post_type == 'portfolio' ) {
			$args = array(
				'post_type'           => 'portfolio',
				'post_status' => 'publish',
				'portfolio_category'  => $cats_coma,
				'ignore_sticky_posts' => $number_posts_loaded,
				'posts_per_page'      => $number_posts_loaded,
				'offset'              => $offset,
				'orderby'		     => $orderby,
				'order'			   => $sortby,
			);
		}else{
			$args = array(
				'post_type'           => 'post',
				'post_status' => 'publish',
				'category'  => $cats_coma,
				'ignore_sticky_posts' => $number_posts_loaded,
				'posts_per_page'      => $number_posts_loaded,
				'offset'              => $offset,
				'orderby'		     => $orderby,
				'order'			   => $sortby,
			);
		}
		query_posts($args);
					
		if( have_posts()){
			while( have_posts()){ the_post();
			    
				$porto_column_width     = get_post_meta($post->ID, 'idealtheme_project_size_type', true);
				$porto_column_width_is  = '';
				$porto_item_img_size = 'enar-portfolio-small';
				
				if( $porto_column_width == 'w1x1'){
					$porto_column_width_is  = '';
					$porto_item_img_size    = 'enar-portfolio-small';
					
				}else if( $porto_column_width == 'w2x2' && $loaded_img_layout == 'masonry_porto' ){
					$porto_column_width_is  = 'width2';
					$porto_item_img_size    = 'enar-portfolio-large';
					
				}else if( $porto_column_width == 'w1x2' && $loaded_img_layout == 'masonry_porto' ){
					$porto_column_width_is  = '';
					$porto_item_img_size    = 'enar-portfolio-rect2';
					
				}else if( $porto_column_width == 'w2x1' && $loaded_img_layout == 'masonry_porto' ){
					$porto_column_width_is  = 'width2';
					$porto_item_img_size    = 'enar-portfolio-rect1';
				}
				
				if ( $post_type == 'portfolio' ) {
					$all_slides = get_post_meta($post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true);
					$gallery    = isset($all_slides['portfolio_gallery']) ? $all_slides['portfolio_gallery'] : '';
					$post_format = isset($all_slides['content_type']) ? $all_slides['content_type'] : '';
				}else{
					$all_slides = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
					$gallery    = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
					$post_format = get_post_format( $post->ID );
				}
				
				if(has_post_thumbnail() || ($gallery !== '' && $post_format == 'gallery')){
					
					if ( $post_type == 'portfolio' ) {
						$tl = wp_get_object_terms( $post->ID, 'portfolio_category' );
					}else{
						$tl = wp_get_object_terms( $post->ID, 'category' );
					}
					$filters = $thumb = $zoom_href = $url_rel = $url = $title = $description = '';
	                $filters = esc_attr($filters);
					$date    = get_the_date('m/d/Y', $post->ID);
					$solid_date    = get_the_date('Ymd', $post->ID);
					$comment_counter = get_comments_number( $post->ID );
					
					foreach($tl as $term){
						$filters .= ' cat'.$term->term_id;
					}
					
					$thumb 		= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $porto_item_img_size );
					$thumb 		= $thumb['0'];
					
					$zoom_href 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
					$zoom_href 	= $zoom_href['0'];				
					
					$url   = get_permalink($post->ID);
					$title = (isset($post->post_title))? apply_filters('the_title', $post->post_title):'';
					
					$btn_nav = '';
					$hoverdir_nav = '';
					$btn_nav_url_con = '';
					$hover_dir_url_con = '';
					
					//-----------> Feature Image
					$porto_feature_con = '';
					
					if ( $post_format == 'gallery' ){
						
						$porto_feature_con .= '<div class="porto_galla">';
						
						if ( has_post_thumbnail() ) {
							$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($zoom_href).'"><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'"></a>';
						}
						if ($gallery !== ''){
							foreach($gallery as $gall) {							
								$imgid   = isset($gall['imgid']) ? $gall['imgid'] : '';
								$img_src = isset($gall['img_src']) ? $gall['img_src'] : '';	
																		
								if ($imgid == '') { $imgid = $gall; }											
								$gall_wide_img  = wp_get_attachment_image_src($imgid, 'enar-blog-single-image');											
								$gall_wide_img  = $gall_wide_img[0];
								
								$gall_thumb_img = wp_get_attachment_image_src($imgid, $porto_item_img_size);											
								$gall_thumb_img = $gall_thumb_img[0];
								
								$img_caption = isset($gall['img_caption']) ? $gall['img_caption'] : '';
								$url         = isset($gall['url']) ? $gall['url'] : '';
								$target      = isset($gall['target']) ? 'target="'.esc_attr($gall['target']).'"' : '_self';	
								
								if($url !== ''){ 
								
									$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($url).'" target="'.esc_attr($gall['target']).'">';
									
									if ($img_caption !== '') { 
										$porto_feature_con .= '<span class="post_gall_desc">'.esc_html($img_caption).'</span>'; 
									}
									
									$porto_feature_con .= '<img src="'.esc_url($gall_thumb_img).'" alt="'.esc_attr($title).'"></a>';
									
								} else { 
								  
									$porto_feature_con .= '<a class="feature_inner_ling" href="'.esc_url($gall_wide_img).'" data-rel="magnific-popup"><img src="'.esc_url($gall_thumb_img).'" alt="'.esc_attr($title).'"></a>';
									
								} 
							} 
						}
						$porto_feature_con .= '</div>';
						
					} else {
						
						$porto_feature_con = '<a data-rel="magnific-popup" href="'.esc_url($zoom_href).'"><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'"></a>';
						
					}
					//-----------> Show Date
					$is_cats_show = '';
					if ( $show_cats == 'show' && $post_type == 'portfolio' ) {
						$is_cats_show = '<span class="proj_cats_con">'.idealtheme_get_cats_html( 'portfolio_category', true ).'</span>';
						
					}else if ( $show_cats == 'show' && $post_type == 'post' ) {
						$is_cats_show = '<span class="proj_cats_con">'.idealtheme_get_cats_html( 'category', true ).'</span>';
					}
					
					
					$is_date_show = ( $show_date == 'show') ? '<span class="porto_date"><span class="number">'.esc_html($solid_date).'</span>'.esc_html($date).'</span>' : '';
					
					$is_comm_show = ( $show_comments == 'show') ? '<span class="comm"><i class="ico-comments"></i><span class="comm_counter">'.esc_html($comment_counter).'</span></span>' : '';
					
					$is_date_show = $is_cats_show.$is_date_show;
					
					//$is_like_show = ( $show_like == 'show') ? getPostLikeLink($post->ID) : '';
					$is_like_show = '';
					
					if ( $buttons_style == 'text_but' ){
						
						$hoverdir_nav = '';
						$hover_dir_url_con = '';
						
						$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="detail_link ajax_expand_porto">'.$ajax_btn_text.'</a>' : '';
						
						$btn_nav = '<div class="porto_nav">
										<a href="#" class="expand_img">'.$zoom_btn_text.'</a>
										<a href="'.esc_url($url).'" class="detail_link">'.$more_btn_text.'</a>
										'.$ajax_expand_con.'
									</div>';
										
						$btn_nav_url_con = '<a href="'.esc_url($url).'"><h6 class="name">'.esc_html($title).'</h6></a>';
									
					} else if ( $buttons_style == 'icon_but' ){
						
						$hoverdir_nav = '';
						$hover_dir_url_con = '';
						
						$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="icon_expand"><span><i class="ico-open"></i></span></a>' : '';
						
						$btn_nav = '<div class="porto_nav">
										<a href="#" class="icon_expand"><span><i class="ico-maximize"></i></span></a>
										<a href="'.esc_url($url).'" class="icon_expand"><span><i class="ico-link2"></i></span></a>
										'.$ajax_expand_con.'
									</div>';
									
						$btn_nav_url_con = '<a href="'.esc_url($url).'"><h6 class="name">'.esc_html($title).'</h6></a>';	
									
					} 
					
					if ( $style == 'hoverdir' ){
						
						$btn_nav = '';
						$btn_nav_url_con = '';
						
						if ( $buttons_style == 'text_but' ){
							$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="detail_link ajax_expand_porto">'.$ajax_btn_text.'</a>' : '';
							$hoverdir_nav = '<a href="#" class="expand_img">'.$zoom_btn_text.'</a>
										 <a href="'.esc_url($url).'" class="detail_link">'.$more_btn_text.'</a>
										 '.$ajax_expand_con.'';
										 
						}else{
							$ajax_expand_con = ( $show_ajax_expand == 'show' ) ? '<a href="#" class="icon_expand"><span><i class="ico-open"></i></span></a>' : '';
							$hoverdir_nav = '<a href="#" class="icon_expand"><span><i class="ico-maximize"></i></span></a>
										<a href="'.esc_url($url).'" class="icon_expand"><span><i class="ico-link2"></i></span></a>
										'.$ajax_expand_con.'';
							
						}
							
						
						$hover_dir_url_con = '<a href="'.esc_url($url).'"><h6 class="name">'.esc_html($title).'</h6></a>';
									
					}

					?>
                    <div class="filter_item_block <?php echo esc_attr($porto_column_width_is); ?> <?php echo esc_attr($filters); ?>">
                        <div class="porto_block">
                            <div class="porto_type">
                                <?php echo $porto_feature_con; ?>
                                <?php echo $btn_nav; ?>
                            </div>
                            <div class="porto_desc">
                                <?php echo $btn_nav_url_con; ?>
                                <div class="porto_meta clearfix">
                                    <?php echo $hover_dir_url_con; ?>
                                    <?php echo $is_date_show; ?>
                                    <span class="porto_nums">
                                        <?php echo $is_comm_show; ?>
                                       <?php echo $is_like_show; ?>
                                    </span>
                                    <?php echo $hoverdir_nav; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
					
				}
			}
		}
		wp_reset_query(); 
   
	exit();
}

?>
