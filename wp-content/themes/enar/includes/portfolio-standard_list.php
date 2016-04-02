<?php

	global $post;
	global $enar_custom_portfolio_metabox;
	global $enar_parent_page_id;
	
	$small_image_size = $large_image_size  = 'enar-blog-single-image';
	$templatename     = get_page_template_slug( $enar_parent_page_id );

	if ( $templatename == 'template-portfolio-list.php' ){
		$small_image_size    = 'enar-portfolio-small';
	}
		
	$all_slides     = get_post_meta( $post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true );
	$gallery        = isset( $all_slides['portfolio_gallery'] ) ? $all_slides['portfolio_gallery'] : '';
	$portfolio_type = isset( $all_slides['content_type'] ) ? $all_slides['content_type'] : '';
	
	$video_iframe      = isset($all_slides['video_embedded']) ? $all_slides['video_embedded'] : '';
	$audio_iframe      = isset($all_slides['audio_embedded']) ? $all_slides['audio_embedded'] : '';
	
	$thumb 		  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $small_image_size );
	$thumb 		  = $thumb['0'];
	
	$zoom_href 	  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $large_image_size );
	$zoom_href 	  = $zoom_href['0'];				
	
	$title          = get_the_title( $post->ID );
	$output         = '';
	
	//=================================================================>
	if ( $portfolio_type == 'image' || $portfolio_type == '' ) {
		if ( has_post_thumbnail() ) {
			$output .= '<div class="feature_inner"><div class="feature_inner_corners">
                            <div class="feature_inner_btns">
                                <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                <a href="'.get_the_permalink($post->ID).'" class="icon_link"><i class="ico-link3"></i></a>
                            </div><a class="feature_inner_ling" data-rel="magnific-popup" href="'.esc_url($zoom_href).'">
				<img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'">
			</a></div></div>';
		}
	}else if ( $portfolio_type == 'video' ){
		if ( $video_iframe !== '' ) {
			$output .= '<div class="feature_inner no_corners"><div class="embed-container">'.$video_iframe.'</div></div>';
			
		} else if ( has_post_thumbnail() ) {
			$output = '<div class="feature_inner"><div class="feature_inner_corners">
                            <div class="feature_inner_btns">
                                <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                <a href="'.get_the_permalink($post->ID).'" class="icon_link"><i class="ico-link3"></i></a>
                            </div><a class="feature_inner_ling" data-rel="magnific-popup" href="'.esc_url($zoom_href).'">
				<img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'">
			</a></div></div></div>';
		}
					
	}else if ( $portfolio_type == 'audio' ){
		
		if ( $audio_iframe !== '' ) {
			$output .= '<div class="feature_inner no_corners"><div class="embed-container">'.$audio_iframe.'</div></div>';
			
		} else if ( has_post_thumbnail() ) {
			$output .= '<div class="feature_inner"><div class="feature_inner_corners">
                            <div class="feature_inner_btns">
                                <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                <a href="'.get_the_permalink($post->ID).'" class="icon_link"><i class="ico-link3"></i></a>
                            </div><a class="feature_inner_ling" data-rel="magnific-popup" href="'.esc_url($zoom_href).'">
				<img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'">
			</a></div></div></div>';
		}
					
	}else if( $gallery !== '' && $portfolio_type == 'gallery' ){
		
		if ( $portfolio_type == 'gallery' ){
			
			$output .= '<div class="feature_inner"><div class="feature_inner_corners">
                            <div class="feature_inner_btns">
                                <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                <a href="'.get_the_permalink($post->ID).'" class="icon_link"><i class="ico-link3"></i></a>
                            </div><div class="porto_galla">';
			
			if ( has_post_thumbnail() ) {
				$output .= '<a data-rel="magnific-popup" href="'.esc_url($zoom_href).'"><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'"></a>';
			}
			if ($gallery !== ''){
				foreach($gallery as $gall) {							
					$imgid   = isset($gall['imgid']) ? $gall['imgid'] : '';
					$img_src = isset($gall['img_src']) ? $gall['img_src'] : '';	
																									
					$gall_wide_img  = wp_get_attachment_image_src($imgid, $large_image_size);											
					$gall_wide_img  = $gall_wide_img[0];
					
					$gall_thumb_img = wp_get_attachment_image_src($imgid, $small_image_size);											
					$gall_thumb_img = $gall_thumb_img[0];
					
					$output .= '<a href="'.esc_url($gall_wide_img).'" data-rel="magnific-popup"><img src="'.esc_url($gall_thumb_img).'" alt="'.esc_attr($title).'"></a>';
					 
				} 
			}
			$output .= '</div></div></div>';
		} 
		
	}
	
	echo $output; // Contains HTML