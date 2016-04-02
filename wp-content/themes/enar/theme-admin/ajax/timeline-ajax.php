<?php

add_action( 'init', 'idealtheme_fun_ajax_timeline' );
function idealtheme_fun_ajax_timeline() {
	
	wp_enqueue_script( 'idealtheme_ajax_timeline', get_template_directory_uri().'/theme-admin/ajax/timeline-ajax.js', 'jquery', '1.0', true);
    $no_more_text =  ( idealtheme_option('no_more_posts_text') !== '' ) ? idealtheme_option('no_more_posts_text') : esc_html__( 'No More Posts', 'enar');   
	wp_localize_script( 'idealtheme_ajax_timeline', 'ajax_timeline', array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'ajax-nonce' ),
		'empty' => $no_more_text,
	));
		     
	add_action( 'wp_ajax_ajax_timeline', 'idealtheme_ajax_timeline_show_more' );  
	add_action( 'wp_ajax_nopriv_ajax_timeline', 'idealtheme_ajax_timeline_show_more');
}

function idealtheme_ajax_timeline_show_more() {
	
	global $post;
	global $wp_query;
	global $enar_custom_posts_gallery;
	global $enar_custom_posts_audio;
	global $enar_custom_posts_video;
	global $enar_custom_portfolio_metabox;
	
	$nonce = $_POST['nonce'];
	$offset = $_POST['offset'];
	$post_type_is = $_POST['post_type_is'];
	$post_type_is = ( $post_type_is !== '' ) ? $post_type_is : 'post';
	
	$number_posts_loaded = $_POST['number_posts_loaded'];
	$published_posts     = wp_count_posts( $post_type_is )->publish;
	
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) || $offset >= $published_posts )
        die (); 
	?>
	<?php 
	    
		$blog_template       = false;
		$portfolio_template  = false;
		
	    if( $post_type_is == 'portfolio' ){
			$portfolio_template  = true;
		}else{
			$blog_template       = true;
		}
		
		if ( $portfolio_template || $blog_template ) {
		    
			$args = array(
				'post_type' => $post_type_is,
				'ignore_sticky_posts' => $number_posts_loaded,
				'posts_per_page' => $number_posts_loaded,
				'offset' => $offset
			);
			query_posts($args);
			
		}
					
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
		$feature_img_on    = get_post_meta($post->ID, 'idealtheme_posto_hide_feature_img', true);
		$post_meta_on      = get_post_meta($post->ID, 'idealtheme_posto_meta', true);
		$comments_on       = get_post_meta($post->ID, 'idealtheme_posto_disable_comments', true);
					
		$comments_on_opt   = ( idealtheme_option('post_section_show_comments') ) ? 'show' : 'hide';
		$comments_on       = ( $comments_on !== '' ) ? $comments_on : $comments_on_opt;
					
		$post_meta_on_opt  = ( idealtheme_option('post_section_show_meta') ) ? 'show' : 'hide';
		$post_meta_on      = ( $post_meta_on !== '' ) ? $post_meta_on : $post_meta_on_opt;
					
		$format            = get_post_format( get_the_ID() ); 
		$format_link       = get_post_format_link($format);
		
		$i_quote           = get_post_meta($post->ID, 'idealtheme_quote_text', true);
		$quote_auther_type = get_post_meta($post->ID, 'idealtheme_quote_auther', true);
		$quote_auther_name = get_post_meta($post->ID, 'idealtheme_quote_auther_name', true);
		
		// Gallery
		
		$all_slides = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
		$gallery    = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
		
		// Audio
		
		$audio_format_meta = get_post_meta(get_the_ID(), $enar_custom_posts_audio->get_the_ID(), true);
		$audio_type = isset($audio_format_meta['audio_type']) ? $audio_format_meta['audio_type'] : '';
		$audio_soundcloud = isset($audio_format_meta['audio_soundcloud']) ? $audio_format_meta['audio_soundcloud'] : '';
		$audio_mp3 = isset($audio_format_meta['audio_mp3']) ? $audio_format_meta['audio_mp3'] : '';
		$audio_ogg = isset($audio_format_meta['audio_ogg']) ? $audio_format_meta['audio_ogg'] : '';
		$audio_m4a = isset($audio_format_meta['audio_m4a']) ? $audio_format_meta['audio_m4a'] : '';
		$audio_wav = isset($audio_format_meta['audio_wav']) ? $audio_format_meta['audio_wav'] : '';
		$audio_wma = isset($audio_format_meta['audio_wma']) ? $audio_format_meta['audio_wma'] : '';
		
		// Video
		
		$video_format_meta = get_post_meta(get_the_ID(), $enar_custom_posts_video->get_the_ID(), true);
		$video_type = isset($video_format_meta['video_type']) ? $video_format_meta['video_type'] : '';
		$video_id   = isset($video_format_meta['video_id']) ? $video_format_meta['video_id'] : '';
		
		$video_mp4  = isset($video_format_meta['video_mp4']) ? $video_format_meta['video_mp4'] : '';
		$video_flv  = isset($video_format_meta['video_flv']) ? $video_format_meta['video_flv'] : '';
		$video_m4v  = isset($video_format_meta['video_m4v']) ? $video_format_meta['video_m4v'] : '';
		$video_ogv  = isset($video_format_meta['video_ogv']) ? $video_format_meta['video_ogv'] : '';
		$video_webm = isset($video_format_meta['video_webm']) ? $video_format_meta['video_webm'] : '';
		$video_wmv  = isset($video_format_meta['video_wmv']) ? $video_format_meta['video_wmv'] : '';

	?>
	<li id="post-<?php the_ID(); ?>" class="filter_item_block animated" data-animation-delay="300" data-animation="fadeInUp">
	<div class="timeline_block clearfix">
	
		<?php 
		if ( $portfolio_template ) { 
			?><span class="timeline_post_format"><i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i></span><?php
			
		} else {  
			if ( idealtheme_option('post_meta_show_format') == true ) { 
				?><a href="<?php echo esc_url($format_link); ?>" class="timeline_post_format"><i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i></a><?php
				
			}else{ 
		
			?><span class="timeline_post_format"><i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i></span><?php
			} 
		} ?>
		
		<?php if ( $feature_img_on == true ) { ?>
		<?php $timeline_gall = ( $format == 'gallery' ) ? ' timeline_gallery porto_galla' : ''; ?>
		<div class="timeline_feature<?php echo esc_attr($timeline_gall); ?>">   
	  
		<?php //----------------------------------------------------------------------------> Gallery
		
		$larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
		$larg_img 	= $larg_img['0'];
		
		$small_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-timeline');
		$small_img 	= $small_img['0'];
		
		if( $format == 'gallery' ) { ?>
		
				
					<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php echo esc_url($larg_img); ?>" class="feature_inner_ling">
						<span class="image-zoom"><i class="ico-plus3"></i></span> 
						<img src="<?php echo esc_url($larg_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
					</a>
					<?php } ?>
					<?php
					if ($gallery !== ''){
					foreach($gallery as $gall) {							
							$imgid = isset($gall['imgid']) ? $gall['imgid'] : '';
							$img_src = isset($gall['img_src']) ? $gall['img_src'] : '';	
																	
							if ($imgid == '') { $imgid = $gall; }
								
							$gall_normall_img = wp_get_attachment_image_src($imgid, 'enar-blog-timeline');											
							$gall_normall_img = $gall_normall_img[0];
																	
							$gall_wide_img = wp_get_attachment_image_src($imgid, 'enar-blog-single-image');											
							$gall_wide_img = $gall_wide_img[0];
							
							$img_caption = isset($gall['img_caption']) ? $gall['img_caption'] : '';
							$url = isset($gall['url']) ? $gall['url'] : '';
							$target = isset($gall['target']) ? 'target="'.esc_attr($gall['target']).'"' : '_self';	
							?>
							
								<?php if($url !== ''){ ?>   
								<a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($gall['target']); ?>" class="feature_inner_ling">
									<span class="image-zoom"><i class="ico-plus3"></i></span> 
									<?php if ($img_caption !== '') { ?>
										<span class="post_gall_desc"><?php echo esc_html($img_caption); ?></span>
									<?php } ?>
									<img src="<?php echo esc_url($gall_normall_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
								</a>
								<?php } else { ?>  
								<a href="<?php echo esc_url($gall_wide_img); ?>" class="feature_inner_ling">
									<span class="image-zoom"><i class="ico-plus3"></i></span> 
									<img src="<?php echo esc_url($gall_normall_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
								</a>
								<?php } ?>
							
					  <?php } } ?>
		
		<?php } else if($format == 'audio') { //---------------------------------------------> Audio
		?>
			<?php if($audio_type == 'soundcloud' && $audio_soundcloud !== ''){ ?>

			<div class="embed-container">
				<?php echo $audio_soundcloud; ?>
			</div>   
			<?php }else if($audio_type == 'self_hosted'){ ?> 
				<!-- Audio -->
				<?php if ( $audio_mp3 !== '' || $audio_ogg !== '' || $audio_m4a !== '' || $audio_wav !== '' || $audio_wma !== '' ){ ?>
                <div class="self_hosted_container">
                <?php echo idealtheme_hosted_a( $audio_mp3, $audio_ogg, $audio_m4a, $audio_wav, $audio_wma ); ?>
                </div>
                <?php } ?>
                <!-- End Audio -->
			<?php } ?>
		
		<?php } else if($format == 'video') { //---------------------------------------------> Video
		?>
			<?php if($video_type == 'id_vimeo' && $video_id !== ''){ ?>
				<div class="embed-container">
					<iframe src="http://player.vimeo.com/video/<?php echo esc_attr(esc_html($video_id)); ?>?title=0&byline=0&portrait=0&badge=0" style="border: 0px none;" allowfullscreen></iframe>
				</div>
			
			<?php } else if($video_type == 'id_tube' && $video_id !== ''){ ?>
				<div class="embed-container">
					<iframe src="https://www.youtube.com/embed/<?php echo esc_attr(esc_html($video_id)); ?>?showinfo=0" allowfullscreen></iframe>
				</div>
			<?php } else if($video_type == 'self_hosted'){ ?>
			<?php $video_poster = ($larg_img !== '') ? esc_url($larg_img) : ''; ?>
				<!-- Video -->
				<?php if ( $video_mp4 !== '' || $video_webm !== '' || $video_ogv !== '' || 
                           $video_flv !== '' || $video_wmv !== '' || $video_m4v !== '' ){ ?>
                <div class="self_hosted_container">
                <?php echo idealtheme_hosted_v( $video_poster, $video_mp4, $video_webm, $video_ogv, $video_flv, $video_wmv, $video_m4v ); ?>
                </div>
                <?php } ?>
                <!-- End Video -->
			<?php } ?>
		
		<?php } else if($format == 'quote') { //---------------------------------------------> Quote
		?>
		
			<a href="<?php the_permalink(); ?>" class="quote_con">
				<span><?php if($i_quote !== ''){ echo esc_html($i_quote); } ?></span>
				<span class="quote_author"><?php 
							 if($quote_auther_type == 'from_title'){ the_title(); } 
						else if($quote_auther_type == 'from_admin'){ the_author(); } 
						else if($quote_auther_type == 'from_spici'){  
							 if($quote_auther_name !== ''){
								 echo esc_html($quote_auther_name);
							 } else {
								 the_title();
							 }
						}
					?></span>
			</a>
		
		<?php } else if($format == 'link') { //----------------------------------------------> Link
		?>
		
		<?php } else if($format == 'aside') { //---------------------------------------------> Aside
		?>
		
		<?php } else if($format == 'status') { //--------------------------------------------> Status
		?>
		
		<?php } else if($format == 'chat') { //----------------------------------------------> Chat
		?>
		
		<?php } else { //--------------------------------------------------------------------> Image & Standard 
		?>
			<?php if ( has_post_thumbnail() ){ ?> 
			
			<a href="<?php echo esc_url($larg_img); ?>" data-rel="magnific-popup">
				<span class="image-zoom"><i class="ico-plus3"></i></span> 
				<img src="<?php echo esc_url($small_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
			</a>
			
			<?php } ?>
		
		<?php } ?>
		
		</div>
		
		<?php } //---------------------------------------------------------------------------> End Feature Content
		?>
		
        <?php 
		    $portfolio_meta_on = '';
			$portfolio_comm_on = '';
			$portfolio_all_meta = '';
			$portfolio_format = '';
			
			if ( $portfolio_template ) {
				
				$portfolio_all_meta = get_post_meta( $post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true );
				$portfolio_format   = isset( $portfolio_all_meta['content_type'] ) ? $portfolio_all_meta['content_type'] : '';

				$portfolio_meta_op = ( idealtheme_option('portfolio_section_show_meta') ) ? 'show' : 'hide';
				$portfolio_meta_on = get_post_meta($post->ID, 'idealtheme_portfolio_meta', true);
				$portfolio_meta_on = ( $portfolio_meta_on !== '' ) ? $portfolio_meta_on : $portfolio_meta_op;
				
				$portfolio_comm_op = ( idealtheme_option('portfolio_section_show_comments') ) ? 'show' : 'hide';
				$portfolio_comm_on = get_post_meta($post->ID, 'idealtheme_portfolio_disable_comments', true);
				$portfolio_comm_on = ( $portfolio_comm_on !== '' ) ? $portfolio_comm_on : $portfolio_comm_op;
				
				get_template_part('includes/portfolio', 'timeline');
			}
		?>
                    
		<h6 class="timeline_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
			
		<?php if ( $post_meta_on == 'show' || $portfolio_meta_on == 'show' ) { ?> 
		<span class="meta">
            
            <?php if ( ( idealtheme_option('post_meta_show_date') == true && !$portfolio_template ) || 
					   ( idealtheme_option('portfolio_meta_show_date') == true && $portfolio_template ) 
			){ ?>
			<span class="meta_part">
				<i class="ico-clock7"></i>
				<span><?php idealtheme_fun_get_date_format(); ?></span>
			</span>
            <?php } ?>
            
            <?php if ( ( $comments_on == 'show' && !$portfolio_template ) || 
					   ( $portfolio_comm_on == 'show' && $portfolio_template ) 
			){ ?>
            <span class="meta_part">
                <a class="scroll" href="<?php the_permalink(); ?>#comments">
                    <i class="ico-comment-o"></i>
                    <span><?php comments_number(esc_html__( 'No Comments', 'enar'), esc_html__( '1 Comment', 'enar'), esc_html__( '% Comments', 'enar')); ?></span>
                </a>
            </span>
            <?php } ?>
            
            <?php if ( ( idealtheme_option('post_meta_show_cats') == true && !$portfolio_template ) || 
					   ( idealtheme_option('portfolio_meta_show_cats') == true && $portfolio_template ) 
			){ ?>          
			<span class="meta_part">
				<i class="ico-folder-open-o"></i>
				<span>
					<?php 
					if ( $post_type_is == 'portfolio' ) { 
						echo idealtheme_get_cats_html( 'portfolio_category', true );
					} else { 
						echo idealtheme_get_cats_html( 'category', true );
					}
					?>
				</span>
			</span>
            <?php } ?>
            
            <?php if ( ( idealtheme_option('post_meta_show_auther_name') == true && !$portfolio_template ) || 
					   ( idealtheme_option('portfolio_meta_show_auther_name') == true && $portfolio_template ) 
			){ ?>
            <span class="meta_part">
                <i class="ico-user5"></i>
                <span><?php echo the_author_posts_link(); ?></span>
            </span>
            <?php } ?>
            
		</span>
		<?php } ?>
			
		<div class="article">
		<?php 
			$num_words = intval(idealtheme_option('home_timeline_expert_length'));
			$num_words = ( $num_words ) ? $num_words : 40;
			
			$is_con_exist = idealtheme_content('content', $num_words );
			$is_exc_exist = idealtheme_content('excerpt', $num_words );
			
			if ( !empty($is_exc_exist) ){
				echo $is_exc_exist; } else {
				echo $is_con_exist; }
				
			if ( idealtheme_option('show_more_button') ) { 
				$permalink_text = idealtheme_option('read_more_btn_text');
				$permalink_text = ( $permalink_text !== '' ) ? $permalink_text : esc_html__( 'Read More', 'enar');
				echo '<a href="'.get_permalink().'" class="post_readmore">'.esc_html($permalink_text).'</a>'; 
			}
		 ?>
		</div>
			
	</div>
	</li>
    
<?php endwhile; ?>
<?php else:  ?>
<?php endif; ?>
    <?php
	exit();
}

?>
