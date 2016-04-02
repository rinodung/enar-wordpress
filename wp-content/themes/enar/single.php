<?php get_header();
	global $enar_custom_posts_gallery;
	global $enar_custom_posts_audio;
	global $enar_custom_posts_video;
	
	$feature_img_on    = get_post_meta($post->ID, 'idealtheme_posto_hide_feature_img', true);
	$social_share_on   = get_post_meta($post->ID, 'idealtheme_posto_post_share', true);
	$related_on        = get_post_meta($post->ID, 'idealtheme_posto_enable_related_posts', true);
	$next_post_on      = get_post_meta($post->ID, 'idealtheme_posto_next_post', true);
	$post_meta_on      = get_post_meta($post->ID, 'idealtheme_posto_meta', true);
	$post_tags_on      = get_post_meta($post->ID, 'idealtheme_posto_tags', true);
	$comments_on       = get_post_meta($post->ID, 'idealtheme_posto_disable_comments', true);
	$show_author_box   = get_post_meta($post->ID, 'idealtheme_posto_show_author_box', true);
	
	$social_share_opt  = ( idealtheme_option('post_section_show_share') ) ? 'show' : 'hide';
	$social_share_on   = ( $social_share_on !== '' ) ? $social_share_on : $social_share_opt;
	
	$related_on_opt    = ( idealtheme_option('post_section_show_related') ) ? 'show' : 'hide';
	$related_on        = ( $related_on !== '' ) ? $related_on : $related_on_opt;
	
	$next_post_on_opt  = ( idealtheme_option('post_section_show_prev_next') ) ? 'show' : 'hide';
	$next_post_on      = ( $next_post_on !== '' ) ? $next_post_on : $next_post_on_opt;
	
	$post_meta_on_opti = ( idealtheme_option('post_section_show_meta') ) ? 'show' : 'hide';
	$post_meta_on      = ( $post_meta_on !== '' ) ? $post_meta_on : $post_meta_on_opti;
	
	$post_tags_on_opt  = ( idealtheme_option('post_section_show_tags') ) ? 'show' : 'hide';
	$post_tags_on      = ( $post_tags_on !== '' ) ? $post_tags_on : $post_tags_on_opt;
	
	$comments_on_opti  = ( idealtheme_option('post_section_show_comments') ) ? 'show' : 'hide';
	$comments_on       = ( $comments_on !== '' ) ? $comments_on : $comments_on_opti;
	
	$show_author_opt   = ( idealtheme_option('post_section_show_author_box') ) ? 'show' : 'hide';
	$show_author_box   = ( $show_author_box !== '' ) ? $show_author_box : $show_author_opt;
	
	$page_layout       = get_post_meta($post->ID, 'idealtheme_theme_layout', true);
	$sidebar_position  = get_post_meta($post->ID, 'idealtheme_sidebar_position', true);
	$page_padding_top  = get_post_meta($post->ID, 'idealtheme_page_padding_top', true);
	$page_padding_botm = get_post_meta($post->ID, 'idealtheme_page_padding_bottom', true);
	
	$right_sidebar     = get_post_meta($post->ID, 'idealtheme_page_right_sidebar', true);
	$left_sidebar      = get_post_meta($post->ID, 'idealtheme_page_left_sidebar', true);
	
	$crumb_and_title   = get_post_meta($post->ID, 'idealtheme_page_title_with_crumbs', true);
	$header_font_color = get_post_meta($post->ID, 'idealtheme_page_header_color', true);
	$header_size       = get_post_meta($post->ID, 'idealtheme_page_header_height', true);
	$header_size       = ( $header_size == '' ) ? idealtheme_option('theme_title_height') : $header_size;
	
	$header_bg_color   = get_post_meta($post->ID, 'idealtheme_page_header_bg_color', true);
	$header_bg_image   = get_post_meta($post->ID, 'idealtheme_page_header_bg_image', false);
	$header_bg_repeat  = get_post_meta($post->ID, 'idealtheme_page_header_bg_repeat', true);
	$header_bg_type    = get_post_meta($post->ID, 'idealtheme_page_header_bg_type', true);
	$header_bg_size    = get_post_meta($post->ID, 'idealtheme_page_header_bg_size', true);
	
	$header_bg_url  = '';
	$header_style  = '';
	
	foreach ( $header_bg_image as $img ){
		$header_bg_url = wp_get_attachment_image_src( $img, 'full' );
		$header_bg_url = esc_url($header_bg_url[0]);
	}
	
	if($header_bg_url !== '') { 
	   $header_style .= 'background-attachment: '.esc_attr($header_bg_type).';
						 background-image: url('.esc_url($header_bg_url).');
						 background-position: center 0;
						 background-repeat: '.esc_attr($header_bg_repeat).';
						 background-size: '.esc_attr($header_bg_size).';';
	}
	if($header_bg_color !== '') { 
		$header_style .= 'background-color:'.esc_attr($header_bg_color).';'; 
	}
	
	//$header_font_color_over = $header_font_color;
	$header_font_color = ( $header_font_color !== '' ) ? $header_font_color : idealtheme_option('theme_title_breadcrumbs_color');
	
	$header_style_con = $header_style;
	
	//-----------------------------------------------------------------------------------------> Post Meta
	
	$related_type      = get_post_meta($post->ID, 'idealtheme_related_posts_type', true);
	$related_items     = get_post_meta($post->ID, 'idealtheme_related_posts_items_choosen', false);
	$related_post_date = get_post_meta($post->ID, 'idealtheme_related_posts_items_date', true);
	
	$format            = get_post_format( get_the_ID() ); 
	$format_link       = get_post_format_link($format);
	
	$i_quote           = get_post_meta($post->ID, 'idealtheme_quote_text', true);
	$quote_auther_type = get_post_meta($post->ID, 'idealtheme_quote_auther', true);
	$quote_auther_name = get_post_meta($post->ID, 'idealtheme_quote_auther_name', true);
	
	//-----------------------------------------------------> Gallery
	
	$all_slides = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
	$gallery    = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
	
	//-----------------------------------------------------> Audio
	
	$audio_format_meta = get_post_meta(get_the_ID(), $enar_custom_posts_audio->get_the_ID(), true);
	$audio_type = isset($audio_format_meta['audio_type']) ? $audio_format_meta['audio_type'] : '';
	$audio_soundcloud = isset($audio_format_meta['audio_soundcloud']) ? $audio_format_meta['audio_soundcloud'] : '';
	$audio_mp3 = isset($audio_format_meta['audio_mp3']) ? $audio_format_meta['audio_mp3'] : '';
	$audio_ogg = isset($audio_format_meta['audio_ogg']) ? $audio_format_meta['audio_ogg'] : '';
	$audio_m4a = isset($audio_format_meta['audio_m4a']) ? $audio_format_meta['audio_m4a'] : '';
	$audio_wav = isset($audio_format_meta['audio_wav']) ? $audio_format_meta['audio_wav'] : '';
	$audio_wma = isset($audio_format_meta['audio_wma']) ? $audio_format_meta['audio_wma'] : '';
	
	//-----------------------------------------------------> Video
	
	$video_format_meta = get_post_meta(get_the_ID(), $enar_custom_posts_video->get_the_ID(), true);
	$video_type = isset($video_format_meta['video_type']) ? $video_format_meta['video_type'] : '';
	$video_id   = isset($video_format_meta['video_id']) ? $video_format_meta['video_id'] : '';
	
	$video_mp4  = isset($video_format_meta['video_mp4']) ? $video_format_meta['video_mp4'] : '';
	$video_flv  = isset($video_format_meta['video_flv']) ? $video_format_meta['video_flv'] : '';
	$video_m4v  = isset($video_format_meta['video_m4v']) ? $video_format_meta['video_m4v'] : '';
	$video_ogv  = isset($video_format_meta['video_ogv']) ? $video_format_meta['video_ogv'] : '';
	$video_webm = isset($video_format_meta['video_webm']) ? $video_format_meta['video_webm'] : '';
	$video_wmv  = isset($video_format_meta['video_wmv']) ? $video_format_meta['video_wmv'] : '';
	
	$full_or_boxed = '';
	$layout_option = idealtheme_option('theme_layout');
	$layout_option_final  = ( $page_layout == '' ) ? $layout_option : $page_layout;
	
	if( $layout_option_final == 'full2' ){
		$full_or_boxed    = 'full_content clearfix';
		
	}else if( $layout_option_final == 'boxed1' ){
		$full_or_boxed    = 'content clearfix';
		
	}else if( $layout_option_final == 'boxed2' ){
		$full_or_boxed    = 'content clearfix';
		
	} else{
		$full_or_boxed    = 'content clearfix';
		
	}

	$padding_style = '';
	if ( $page_padding_top !== '' ){
		$padding_style .= 'padding-top:'.esc_attr($page_padding_top).'px;';
	}
	if ( $page_padding_botm !== '' ){
		$padding_style .= 'padding-bottom:'.esc_attr($page_padding_botm).'px;';
	}
	$get_padding_style = $padding_style;	
	
	$float_to = '';
	$sidebar_position_option = idealtheme_option('post_sidebar_position');
	$sidebar_position_final  = ( $sidebar_position == '' ) ? $sidebar_position_option : $sidebar_position;

	if( $sidebar_position_final == 'right' ){
		$float_to = 'content_block col-md-9 f_left';
		
	}else if( $sidebar_position_final == 'left' ){
		$float_to = 'content_block col-md-9 f_right';
		
	}else{
		$float_to = 'hm_blog_full_list hm_blog_list clearfix';
	}
?>

<!-- Page Title -->
<?php 
	$crumb_and_title = ( $crumb_and_title !== '' ) ? $crumb_and_title : idealtheme_option('theme_title_is');
	if ($crumb_and_title == 'allow_both' || $crumb_and_title == 'allow_title' ) { 
?>
<div class="content_section page_title <?php echo esc_attr($header_size); ?>" <?php echo 'style="'.esc_attr($header_style_con).'"'; ?>>
    <div class="content clearfix">
        <h1><?php the_title(); ?></h1>
        <?php if ( $crumb_and_title == 'allow_both' ) { ?> 
			<?php if (function_exists('idealtheme_fun_qt_custom_breadcrumbs')) idealtheme_fun_qt_custom_breadcrumbs(); ?> 
        <?php } ?> 
    </div>
</div>
<?php } ?> 
<!-- End Page Title -->

<!-- Our Blog Grids -->
<div class="content_section">
    <div class="<?php echo esc_attr($full_or_boxed); ?>">
        <div class="internal_post_con clearfix" <?php echo 'style="'.esc_attr($get_padding_style).'"'; ?>>
            <!-- All Content -->
            <?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				$cat_in = array();
				$get_cat_in = '';
				$iii = 0;
				foreach((get_the_category()) as $category) {
					$cuurent_cat = single_cat_title("",false) ;
					$cur_cat_id = get_cat_id( single_cat_title("",false) );
				
					$other_cat_id = $category->cat_ID;
					$cat_in[] = $other_cat_id;
					
				}
			?>
            <div class="<?php echo esc_attr($float_to); ?>">
                <div class="hm_blog_full_list hm_blog_list clearfix">
                    
                    <!-- Post Container -->
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        
                        <?php if ( $feature_img_on == true ) { ?>
							<?php if ( $audio_type !== 'self_hosted' && $format !== 'audio' ) { ?>
                            <!--<div class="post_format_con">
                                <span>
                                    <a href="<?php echo esc_url($format_link); ?>">
                                        <i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i>
                                    </a>
                                </span>
                            </div>-->
                            <?php } ?>
                        <div class="feature_inner">
                        
                        <?php //----------------------------------------------------------------------------> Gallery
						
						$larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
						$larg_img 	= $larg_img['0'];
						
						if( $format == 'gallery' ) { ?>
                        
                            <div class="feature_inner_corners">
                                <div class="feature_inner_btns">
                                    <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                </div>
                                <div class="porto_galla">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <a href="<?php echo esc_url($larg_img); ?>" data-rel="magnific-popup">
                                            <img src="<?php echo esc_url($larg_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
                                        </a>
                                    <?php } ?>
                                    <?php
									if ($gallery !== ''){
									foreach($gallery as $gall) {							
											$imgid = isset($gall['imgid']) ? $gall['imgid'] : '';
											$img_src = isset($gall['img_src']) ? $gall['img_src'] : '';	
																					
											if ($imgid == '') { $imgid = $gall; }											
											$gall_wide_img = wp_get_attachment_image_src($imgid, 'enar-blog-single-image');											
											$gall_wide_img = $gall_wide_img[0];
											
											$img_caption = isset($gall['img_caption']) ? $gall['img_caption'] : '';
											$url = isset($gall['url']) ? $gall['url'] : '';
											$target = isset($gall['target']) ? 'target="'.esc_attr($gall['target']).'"' : '_self';	
											?>
                                            
												<?php if($url !== ''){ ?>    
                                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($gall['target']); ?>">
                                                    <?php if ($img_caption !== '') { ?>
                                                        <span class="post_gall_desc"><?php echo esc_html($img_caption); ?></span>
                                                    <?php } ?>
                                                    <img src="<?php echo esc_url($gall_wide_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
                                                </a>
                                                <?php } else { ?>   
                                                <a href="<?php echo esc_url($gall_wide_img); ?>" data-rel="magnific-popup">
                                                    <img src="<?php echo esc_url($gall_wide_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
                                                </a>
                                                <?php } ?>
                                            
                                      <?php } } ?>
                                </div>
                            </div>
                        
						<?php } else if($format == 'audio') { //---------------------------------------------> Audio
						?>
                            <?php if( $audio_type == 'soundcloud' && $audio_soundcloud !== '' ){ ?>
                                <div class="embed-container">
                                    <?php echo $audio_soundcloud; ?>
                                </div>   
                            <?php } else if ( $audio_type == 'self_hosted' ){ ?> 
                            
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
                        
                        	<div class="quote_con">
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
                            </div>
                        
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
                            
                        	<div class="feature_inner_corners">
                                <div class="feature_inner_btns">
                                    <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                </div>
                                <a href="<?php echo esc_url($larg_img); ?>" class="feature_inner_ling" data-rel="magnific-popup">
                                    <img src="<?php echo esc_url($larg_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
                                </a>
                            </div>
                            
                            <?php } ?>
                        
                        <?php } ?>
                        
                        </div>
                        
						<?php } //---------------------------------------------------------------------------> End Feature Content
						?>
                        
                        <div class="post_title_con">
                            <?php if ($crumb_and_title == 'allow_normal_title') { ?>
                            <h6 class="title"><?php the_title(); ?></h6>
							<?php } ?>
                            
                            <?php if ($post_meta_on == 'show') { ?> 
                            <span class="meta">
                                <?php if ( get_post_format() && idealtheme_option('post_meta_show_format') == true ){ ?>
                                <span class="meta_part">
                                    <a href="<?php echo esc_url($format_link); ?>">
                                        <!--<i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i>-->
                                        <i class="ico-keyboard-arrow-right"></i>
                                        <span><?php echo esc_attr($format); ?></span>
                                    </a>
                                </span>
                                <?php } ?>
                                
                                <?php if ( idealtheme_option('post_meta_show_date') == true ){ ?>
                                <span class="meta_part">
                                    <!--<i class="ico-clock7"></i>-->
                                    <i class="ico-keyboard-arrow-right"></i>
                                    <span><?php idealtheme_fun_get_date_format(); ?></span>
                                </span>
                                <?php } ?>
                                
                                <?php if ( $comments_on == 'show' ) { ?>
                                <span class="meta_part">
                                    <a class="scroll" href="#comments">
                                        <!--<i class="ico-comment-o"></i>-->
                                        <i class="ico-keyboard-arrow-right"></i>
                                        <span><?php comments_number(esc_html__( 'No Comments', 'enar'), esc_html__( '1 Comment', 'enar'), esc_html__( '% Comments', 'enar')); ?></span>
                                    </a>
                                </span>
                                <?php } ?>
                                
                                <?php if ( idealtheme_option('post_meta_show_cats') == true ) { ?>
                                <span class="meta_part">
                                    <!--<i class="ico-folder-open-o"></i>-->
                                    <i class="ico-keyboard-arrow-right"></i>
                                    <span>
                                        <?php 
										if ( get_post_type() == 'portfolio' ) { 
											echo idealtheme_get_cats_html( 'portfolio_category', true );
										} else { 
											echo idealtheme_get_cats_html( 'category', true );
										}
										?>
                                    </span>
                                </span>
                                <?php } ?>
                                
                                <?php if ( idealtheme_option('post_meta_show_auther_name') == true ) { ?>
                                <span class="meta_part">
                                    <!--<i class="ico-user5"></i>-->
                                    <i class="ico-keyboard-arrow-right"></i>
                                    <span><?php echo the_author_posts_link(); ?></span>
                                </span>
                                <?php } ?>
                                
                            </span>
                            <?php } ?>
                        </div>
                        
                        <div class="blog_grid_con entry-content">
                            <?php the_content(); ?>
                        </div>
                        
                        <!-- Next / Prev and Social Share-->
                        <div class="post_next_prev_con clearfix">
                            <?php if ($next_post_on == 'show') { ?>
                            <div class="post_next_prev clearfix">
                                <?php $prev_text = esc_html__("Prev", 'enar'); 
								      $next_text = esc_html__("Next", 'enar');
								?>
                                <?php previous_post_link( '%link', '<i class="ico-arrow-back"></i><span class="t">'.esc_html($prev_text).'</span>', true ); ?>
                                <?php next_post_link( '%link', '<span class="t">'.esc_html($next_text).'</span><i class="ico-arrow-forward"></i>' , true ); ?>
                            </div>
                            <?php } ?>
                            
                            <!-- Social Share-->
                            <?php if ($social_share_on == 'show') { ?>
                            <div class="single_pro_row">
                                <div id="share_on_socials">
                                    <?php get_template_part('includes/content', 'share'); ?>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- End Social Share-->
                        </div>
                        <!-- End Next / Prev and Social Share-->
                        
                        <!-- Tags -->
                        <?php if($post_tags_on == 'show' && get_post_type() == 'post' && get_the_tags($post->ID)){ ?>
                        <div class="small_title">
                            <span class="small_title_con">
                                <span class="s_icon"><i class="ico-tag4"></i></span>
                                <span class="s_text"><?php 
                                        if ( idealtheme_option('tags_box_title_text') !== '' ) { 
                                            echo idealtheme_option('tags_box_title_text');
                                            
                                        } else{
                                            esc_html_e("Tags", 'enar');
                                        }?></span>
                            </span>
                        </div>
                        
                        <div class="tags_con">
                            <?php
							foreach(get_the_tags($post->ID) as $tag){
								echo '<a rel="tag" href="'.esc_url(get_tag_link($tag->term_id)).'">' . esc_html($tag->name) . '</a>';
							}
							?>
                        </div>
                        <?php } ?>
                        <!-- End Tags -->
                        
                        <!-- About the author -->
						<?php if($show_author_box == 'show' && get_post_type() == 'post'){ ?>
                        <div class="about_auther">
                            <div class="small_title">
                                <span class="small_title_con">
                                    <span class="s_icon"><i class="ico-user5"></i></span>
                                    <span class="s_text"><?php 
                                        if ( idealtheme_option('author_box_title_text') !== '' ) { 
                                            echo idealtheme_option('author_box_title_text');
                                            
                                        } else{
                                            esc_html_e("About The Author", 'enar');
                                        }?></span>
                                </span>
                            </div>
                            <?php 
							$user_ID = get_the_author_meta( 'ID' );
							$user_meta = get_user_meta($user_ID);
							$all_meta_for_user = get_userdata($user_ID);
							
							$author_avatar = get_avatar( $user_ID, 140 );
							$author_url = get_author_posts_url( $user_ID );
							?>
                            <div class="about_auther_con clearfix">
                                <span class="avatar_img">
                                    <a href="<?php echo esc_attr($author_url); ?>"><?php echo $author_avatar; ?></a>
                                </span>
                                <div class="about_auther_details">
                                    <a href="<?php echo esc_attr($author_url); ?>" class="auther_link"><?php echo esc_html($all_meta_for_user->display_name); ?></a>
                                    <span class="desc">
                                    <?php $shortexcerpt_for_user = wp_trim_words( $user_meta['description'][0], 34, ' ...' );
                                          echo esc_html($shortexcerpt_for_user); 
								    ?>
                                    </span>
                                    <div class="social_media clearfix">
                                        <?php get_template_part('includes/user', 'share'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- End About the author -->
                    </div>
                    <!-- End Post Container -->
                    
                    <!-- Related Posts -->
                    <?php 
					if($related_type == 'f_current_cats'){
						$args = array(
						  'post_type' => 'post',
						  'post_status' => 'publish',
						  'posts_per_page' => -1,
						  'orderby' 			=> 'comment_count',
						  'order' 			=> 'DESC',
						  'category__in' => $cat_in,
						  'post__not_in' => array($post->ID),
						  
						);
					} else if ($related_type == 'f_choosen'){
						$args = array(
						  'post_type' => 'post',
						  'post_status' => 'publish',
						  'posts_per_page' => -1,
						  'order' 			=> 'DESC',
						  'post__in' => $related_items,
						  'post__not_in' => array($post->ID),
						);
					} else {
						$args = array(
						  'post_type' => 'post',
						  'post_status' => 'publish',
						  'posts_per_page' => -1,
						  'orderby' 			=> 'comment_count',
						  'order' 			=> 'DESC',
						  'post__not_in' => array($post->ID),
						);
					} 
									
					$related_query = null;
					$related_query = new WP_Query($args); 
					?>
                    
                    <?php if ($related_on == 'show' && $related_query->have_posts() ) { ?>
                    <div class="related_posts">
                        <div class="small_title">
                            <span class="small_title_con">
                                <span class="s_icon"><i class="ico-laptop4"></i></span>
                                <?php if ( idealtheme_option('related_posts_title_text') !== '') { ?>
                                	<span class="s_text"><?php echo esc_html(idealtheme_option('related_posts_title_text')); ?></span>
                                <?php } else {?>
                                    <span class="s_text"><?php esc_html_e("Related Posts", 'enar');?></span>
                                <?php } ?>
                            </span>
                        </div>
                        
                        <div class="related_posts_con">
                            <?php 																							
                            if ( $related_query->have_posts() ) : 
								while ( $related_query->have_posts() ) : $related_query->the_post(); 

								$related_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-carousel');
								$related_img 	= $related_img['0'];
								
								$format_related = (get_post_format(get_the_ID())) ? get_post_format(get_the_ID()) : ''; 
								$format_link_related = (get_post_format_link($format_related)) ? get_post_format_link($format_related) : '';
                                ?>
                                
                                <?php if ( has_post_thumbnail() || $format_related == 'gallery' ) { //==> has thumbnail ?>  
                                 
                                <?php if( !has_post_thumbnail() && $format_related == 'gallery') { 
									$get_all_slides = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
									$gallery = isset($get_all_slides['gallery']) ? $get_all_slides['gallery'] : '';
									$get_first_gall_img = isset($gallery[0]) ? $gallery[0] : '';
									$get_first_img_id = isset($get_first_gall_img['imgid']) ? $get_first_gall_img['imgid'] : '';
									$get_first_img_url = wp_get_attachment_image_src($get_first_img_id, 'enar-blog-carousel');											
									$get_first_img_url = $get_first_img_url[0];
									$related_img = $get_first_img_url;
									
									if($related_img == ''){
										
									} else { ?>
                                    
                                        <div class="related_posts_slide">
                                            <div class="related_img_con">
                                                <a href="<?php the_permalink(); ?>" class="related_img">
                                                    <img alt="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($related_img); ?>">
                                                    <span><i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i></span>
                                                </a>
                                            </div>
                                            <a class="related_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <span class="post_date"><?php idealtheme_fun_get_date_format(); ?></span>
                                        </div>
                                   <?php }
								} else { ?>
                                        <div class="related_posts_slide">
                                            <div class="related_img_con">
                                                <a href="<?php the_permalink(); ?>" class="related_img">
                                                    <img alt="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($related_img); ?>">
                                                    <span><i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i></span>
                                                </a>
                                            </div>
                                            <a class="related_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <?php if($related_post_date == true){ ?>
                                            <span class="post_date"><?php idealtheme_fun_get_date_format(); ?></span>
                                            <?php } ?>
                                        </div>
                                 <?php } } //==> has thumbnail ?>
                            <?php endwhile; ?>
                            <?php else:  ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?> 
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- End Related Posts -->
                    <?php } ?>
                    
                    <?php if ($comments_on == 'show') { 
                    	comments_template('', true); 
					} ?>                 
                
                </div>
                <!-- End blog List -->
            </div>
            <!-- End All Content -->
            <?php endwhile; ?>
			<?php else:  ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            
            <?php if( $sidebar_position_final == 'right' ) {
				get_sidebar();
			}else if( $sidebar_position_final == 'left' ){
				get_sidebar('secondary');
			}?>
            
        </div>
        <!-- End Internal Post Con -->
    </div>
</div>
<!-- End Our Blog Grids -->
    
<?php get_footer(); ?>