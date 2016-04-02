<?php
	global $post;
	global $enar_custom_posts_gallery;
	global $enar_custom_posts_audio;
	global $enar_custom_posts_video;
	global $enar_custom_portfolio_metabox;
	
	$page_layout           = get_post_meta($post->ID, 'idealtheme_theme_layout', true);
	$sidebar_position      = get_post_meta($post->ID, 'idealtheme_sidebar_position', true);
	
	$float_to = '';
	$sidebar_position_option = is_home() ? idealtheme_option('blog_home_sidebar_position') : idealtheme_option('sidebar_position');
	$sidebar_position_final  = ( $sidebar_position == '' ) ? $sidebar_position_option : $sidebar_position;
	
	if ( is_archive() ) {
		$sidebar_position_final = idealtheme_option('post_category_sidebar_position');
	}
	
	if( $sidebar_position_final == 'right' ){
		$float_to = 'content_block col-md-9 f_left';
		
	}else if( $sidebar_position_final == 'left' ){
		$float_to = 'content_block col-md-9 f_right';
		
	}else{
		$float_to = 'clearfix';
	}
	
	$templatename      = get_page_template_slug( $post->ID );
	$masonry_cols_nums = ( is_home() && $sidebar_position_final == 'none' ) ? 'three_blocks' : 'two_blocks';	
	$blog_template       = false;
	$portfolio_template  = false;
	$get_pots_from_post  = 'post';
	
		  if ( $templatename == 'template-blog-grid-2-columns.php' ) {  
					$masonry_cols_nums = 'two_blocks';
					$blog_template     = true;
		
	}else if ( $templatename == 'template-blog-grid-3-columns.php' ) {  
					$masonry_cols_nums = 'three_blocks';
					$blog_template     = true;
		
	}else if ( $templatename == 'template-blog-grid-4-columns.php' ) {  
					$masonry_cols_nums = 'four_blocks';
					$blog_template     = true;
		
	}else if ( $templatename == 'template-portfolio-grid-2-columns.php' ) {  
					$masonry_cols_nums  = 'two_blocks';
					$portfolio_template = true;
					$get_pots_from_post = 'portfolio';
		
	}else if ( $templatename == 'template-portfolio-grid-3-columns.php' ) {  
					$masonry_cols_nums  = 'three_blocks';
					$portfolio_template = true;
					$get_pots_from_post = 'portfolio';
		
	}else if ( $templatename == 'template-portfolio-grid-4-columns.php' ) {  
					$masonry_cols_nums  = 'four_blocks';
					$portfolio_template = true;
					$get_pots_from_post = 'portfolio';
		
	}else{
		            $masonry_cols_nums = 'three_blocks';
					$blog_template     = true;	
	}
    
	$home_num_posts        = intval(idealtheme_option('home_posts_per_page_grid'));
	$page_for_posts_option = get_option('posts_per_page');
	$posts_per_page        = $home_num_posts ? $home_num_posts : $page_for_posts_option;
	
	$num_posts_loaded  = 3;
	$published_posts   = wp_count_posts( $get_pots_from_post )->publish;
	$paged             = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	if ( ( $portfolio_template || $blog_template ) && !is_archive() ) {
		
		$args = array(
			'post_type' => $get_pots_from_post,
			'paged' => $paged,
			'post_status' => 'publish',
			'posts_per_page' => $posts_per_page,
		);
		query_posts($args);
	}
	
	if( is_archive() && get_post_type() == 'portfolio' ){
		$portfolio_template = true;
	}
	
	//====> hosted audio video scripts
	idealtheme_get_media_scripts($get_pots_from_post);

?>
	<div class="clearfix">
		<div class="<?php echo esc_attr($float_to); ?>">
        	<div class="hm_filter_wrapper masonry_grid_posts <?php echo esc_attr($masonry_cols_nums); ?>">  
                <ul class="hm_filter_wrapper_con space20">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                
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
        
                ?>
                <li class="filter_item_block animated" data-animation-delay="300" data-animation="fadeInUp">
                <div class="blog_grid_block">
                    <?php if ( $feature_img_on == true ) { ?>
                    
                    <?php
                        $corner_enable = '';
                        if( $format == 'video' || $format == 'audio'){
                            $corner_enable = ' no_corners';
                        }else{
                            $corner_enable = '';
                        }
                    ?>
                    <div class="feature_inner<?php echo esc_attr($corner_enable); ?>">       
                    <?php //----------------------------------------------------------------------------> Gallery
                    
                    $larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-single-image');
                    $larg_img 	= $larg_img['0'];
                    
                    $small_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-masonry');
                    $small_img 	= $small_img['0'];
                        
                    if( $format == 'gallery' ) { ?>
                    
                        <div class="feature_inner_corners">
                            <div class="feature_inner_btns">
                                <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                <a href="<?php the_permalink(); ?>" class="icon_link"><i class="ico-link3"></i></a>
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
                                        
                                        $gall_normall_img = wp_get_attachment_image_src($imgid, 'enar-blog-masonry');											
                                        $gall_normall_img = $gall_normall_img[0];
                                                                                
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
                                                    <img src="<?php echo esc_url($gall_normall_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
                                                </a>
                                            <?php } else { ?>    
                                                <a href="<?php echo esc_url($gall_wide_img); ?>" data-rel="magnific-popup">
                                                    <img src="<?php echo esc_url($gall_normall_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
                                                </a>
                                            <?php } ?>
                                        
                                  <?php } } ?>
                            </div>
                        </div>
                    
                    <?php } else if($format == 'audio') { //---------------------------------------------> Audio
                    ?>
                        <?php if($audio_type == 'soundcloud' && $audio_soundcloud !== ''){ ?>
                        <!--<div class="feature_inner_btns">
                            <a href="<?php the_permalink(); ?>" class="icon_link"><i class="ico-link3"></i></a>
                        </div>-->
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
                            <!--<div class="feature_inner_btns">
                                <a href="<?php the_permalink(); ?>" class="icon_link"><i class="ico-link3"></i></a>
                            </div>-->
                            <div class="embed-container">
                                <iframe src="http://player.vimeo.com/video/<?php echo esc_attr(esc_html($video_id)); ?>?title=0&byline=0&portrait=0&badge=0" style="border: 0px none;" allowfullscreen></iframe>
                            </div>
                        
                        <?php } else if($video_type == 'id_tube' && $video_id !== ''){ ?>
                            <!--<div class="feature_inner_btns">
                                <a href="<?php the_permalink(); ?>" class="icon_link"><i class="ico-link3"></i></a>
                            </div>-->
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
                        
                        <div class="feature_inner_corners">
                            <div class="feature_inner_btns">
                                <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                <a href="<?php the_permalink(); ?>" class="icon_link"><i class="ico-link3"></i></a>
                            </div>
                            <a href="<?php echo esc_url($larg_img); ?>" class="feature_inner_ling" data-rel="magnific-popup">
                                <img src="<?php echo esc_url($small_img); ?>" alt="<?php echo esc_attr(the_title()); ?>">
                            </a>
                        </div>
                        
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
							
							get_template_part('includes/portfolio', 'masonry_grid');
						}
					?>
                    
                    <div class="blog_grid_con">
                        
                        <?php if ( get_post_type() == 'post' && idealtheme_option('post_meta_show_format') == true ) {  ?>
                            <?php if ( $format == 'audio' && $audio_type == "self_hosted" ) { } else { ?>
                                <a href="<?php echo esc_url($format_link); ?>" class="blog_grid_format">
                                    <i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i>
                                </a>
							<?php } ?>
                        <?php } else if ( get_post_type() == 'portfolio' && idealtheme_option('portfolio_meta_show_format') == true ) { ?>
                        
							<span class="blog_grid_format">
                                <i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i>
                            </span>
							
						<?php } ?>
                        
                        <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                        
                        <?php if ( $post_meta_on == 'show' || $portfolio_meta_on == 'show' ) { ?> 
                            <span class="meta">
                                
                                <?php if ( ( idealtheme_option('post_meta_show_date') == true && !$portfolio_template ) || 
								           ( idealtheme_option('portfolio_meta_show_date') == true && $portfolio_template ) 
								){ ?>
                                    <span class="meta_part">
                                        <span><?php idealtheme_fun_get_date_format(); ?></span>
                                    </span>
                                    <span class="meta_slash">/</span>
                                <?php } ?>
                                
                                <?php if ( ( $comments_on == 'show' && !$portfolio_template ) || 
								   		   ( $portfolio_comm_on == 'show' && $portfolio_template ) 
								){ ?>
                                    <span class="meta_part">
                                        <a class="scroll" href="<?php the_permalink(); ?>#comments">
                                            <span><?php comments_number(esc_html__( 'No Comments', 'enar'), esc_html__( '1 Comment', 'enar'), esc_html__( '% Comments', 'enar')); ?></span>
                                        </a>
                                    </span>
                                    <span class="meta_slash">/</span>
                                <?php } ?>
                                
                                <?php if ( ( idealtheme_option('post_meta_show_cats') == true && !$portfolio_template ) || 
								   		   ( idealtheme_option('portfolio_meta_show_cats') == true && $portfolio_template ) 
								){ ?>
                                    <span class="meta_part">
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
                                    <span class="meta_slash">/</span>
                                <?php } ?>
                                
                                <?php if ( ( idealtheme_option('post_meta_show_auther_name') == true && !$portfolio_template ) || 
								   ( idealtheme_option('portfolio_meta_show_auther_name') == true && $portfolio_template ) 
								){ ?>
                                    <span class="meta_part">
                                        <span><?php echo the_author_posts_link(); ?></span>
                                    </span>
                                <?php } ?>
                                
                            </span>
                        <?php } ?>
                        
                        <div class="entry-content">
                        <?php 
							$num_words = intval(idealtheme_option('home_grid_expert_length'));
							$num_words = ( $num_words ) ? $num_words : 20;
							
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
                </div>
            <?php endwhile; ?>
            <?php else:  ?>
            <?php endif; ?>
            </ul> 
            
            <?php if ( $posts_per_page < $published_posts && !is_archive() && $posts_per_page > 0 ) { ?>
            <div class="centered masonry_more">
                <a href="#" class="btn_c" data-loaded_num="<?php echo esc_attr($num_posts_loaded); ?>" data-offset="<?php echo esc_attr($posts_per_page); ?>" data-all-posts="<?php echo esc_attr($published_posts); ?>" data-post-type="<?php echo esc_attr($get_pots_from_post); ?>">
                    <span class="btn_c_ic_a"><i class="ico-refresh4"></i></span>
                    <span class="btn_c_t"><?php 
                                        if ( idealtheme_option('load_more_posts_text') !== '' ) { 
                                            echo idealtheme_option('load_more_posts_text');
                                            
                                        } else{
                                            esc_html_e("Load More", 'enar');
                                        }?></span>
                    <span class="btn_c_ic_b"><i class="ico-refresh4"></i></span>
                </a>
            </div>
            <?php } ?>
            
            <div class="grid_store"></div>
            
            <!-- Ajax Loader-->
            <div class="hm_ajax_loader_con" style="opacity:0;">
                <div class="hm_ajax_loader">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>
            <!-- Ajax Loader-->
            
            <br/>
        </div>
        
        <?php if ( is_archive() ) { 
			if( function_exists( 'idealtheme_fun_wpbeginner_numeric_posts_nav' ) ) { idealtheme_fun_wpbeginner_numeric_posts_nav(); }
		} ?>
        
        <?php wp_reset_query(); ?>
        
    </div>
    
   <?php if( $sidebar_position_final == 'right' ) {
		get_sidebar();
	}else if( $sidebar_position_final == 'left' ){
		get_sidebar('secondary');
	}?>
</div>