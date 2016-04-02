<?php

	global $post;
	global $enar_custom_portfolio_metabox;
		
	$all_slides     = get_post_meta( $post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true );
	$gallery        = isset( $all_slides['portfolio_gallery'] ) ? $all_slides['portfolio_gallery'] : '';
	$portfolio_type = isset( $all_slides['content_type'] ) ? $all_slides['content_type'] : '';
	
	$video_iframe      = isset($all_slides['video_embedded']) ? $all_slides['video_embedded'] : '';
	$audio_iframe      = isset($all_slides['audio_embedded']) ? $all_slides['audio_embedded'] : '';
	
	$thumb 		  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'enar-blog-timeline' );
	$thumb 		  = $thumb['0'];
	
	$zoom_href 	  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'enar-blog-single-image');
	$zoom_href 	  = $zoom_href['0'];				
	
	$title          = get_the_title( $post->ID );
	$output         = '';
	
	//=================================================================>
	if ( $portfolio_type == 'image' || $portfolio_type == '' ) {
		if ( has_post_thumbnail() ) {
			$output .= '<div class="timeline_feature"><a data-rel="magnific-popup" href="'.esc_url($zoom_href).'">
				<span class="image-zoom"><i class="ico-plus3"></i></span><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'">
			</a></div>';
		}
	}else if ( $portfolio_type == 'video' ){
		if ( $video_iframe !== '' ) {
			$output .= '<div class="timeline_feature"><div class="embed-container">'.$video_iframe.'</div></div>';
			
		} else if ( has_post_thumbnail() ) {
			$output = '<div class="timeline_feature"><a data-rel="magnific-popup" href="'.esc_url($zoom_href).'">
				<img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'">
			</a></div>';
		}
					
	}else if ( $portfolio_type == 'audio' ){
		
		if ( $audio_iframe !== '' ) {
			$output .= '<div class="timeline_feature"><div class="embed-container">'.$audio_iframe.'</div></div>';
			
		} else if ( has_post_thumbnail() ) {
			$output .= '<div class="timeline_feature"><a data-rel="magnific-popup" href="'.esc_url($zoom_href).'">
				<img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'">
			</a></div>';
		}
					
	}else if( $gallery !== '' && $portfolio_type == 'gallery' ){
		
		if ( $portfolio_type == 'gallery' ){
			
			$output .= '<div class="timeline_feature"><div class="porto_galla">';
			
			if ( has_post_thumbnail() ) {
				$output .= '<a class="feature_inner_ling" href="'.esc_url($zoom_href).'"><span class="image-zoom"><i class="ico-plus3"></i></span><img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'"></a>';
			}
			if ($gallery !== ''){
				foreach($gallery as $gall) {							
					$imgid   = isset($gall['imgid']) ? $gall['imgid'] : '';
					$img_src = isset($gall['img_src']) ? $gall['img_src'] : '';	
																									
					$gall_wide_img  = wp_get_attachment_image_src($imgid, 'enar-blog-single-image');											
					$gall_wide_img  = $gall_wide_img[0];
					
					$gall_thumb_img = wp_get_attachment_image_src($imgid, 'enar-blog-timeline');											
					$gall_thumb_img = $gall_thumb_img[0];
					
					$output .= '<a class="feature_inner_ling" href="'.esc_url($gall_wide_img).'" data-rel="magnific-popup"><span class="image-zoom"><i class="ico-plus3"></i></span><img src="'.esc_url($gall_thumb_img).'" alt="'.esc_attr($title).'"></a>';
					 
				} 
			}
			$output .= '</div></div>';
		} 
		
	}
	
	echo $output; // Contains HTML