<?php
class idealtheme_tabs_posts extends WP_Widget {
 
    function idealtheme_tabs_posts() {     
        $widget_ops = array( 'classname' => 'tabs_posts_widget', 'description' => esc_html__( 'Show recent posts, popular posts, and comments.','enar') );
        parent::__construct( 'tabs_posts_widget', esc_html__( 'Enar - Posts Tabs','enar'), $widget_ops);
    }
 
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
		    'order_by' => 'comments',
			'show_popular' => 'on', 
			'show_recent' => 'on', 
			'show_comments' => 'on', 
			'num_posts' => 5, 
			
		));
		
		$orderby          = esc_attr($instance['order_by']);
		$show_popular          = esc_attr($instance['show_popular']);
		$show_recent          = esc_attr($instance['show_recent']);
		$show_comments          = esc_attr($instance['show_comments']);
		$num_posts          = esc_attr($instance['num_posts']);
		
		?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>"><?php esc_html_e( 'Order By:', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_by' )); ?>" class="widefat">
                
                    <option value="comments" <?php if ( 'comments' == $instance['order_by'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Comments', 'enar') ?></option>
                    <option value="views" <?php if ( 'views' == $instance['order_by'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Views', 'enar') ?></option>
                </select>
            </p> 
            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['show_popular'], 'on'); ?> id="<?php echo esc_attr($this->get_field_id('show_popular')); ?>" name="<?php echo esc_attr($this->get_field_name('show_popular')); ?>" />
                
                <label for="<?php echo esc_attr($this->get_field_id( 'show_popular' )); ?>"><?php esc_html_e( 'Show Popular Post:', 'enar') ?></label>
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['show_recent'], 'on'); ?> id="<?php echo esc_attr($this->get_field_id('show_recent')); ?>" name="<?php echo esc_attr($this->get_field_name('show_recent')); ?>" />
                
                <label for="<?php echo esc_attr($this->get_field_id( 'show_recent' )); ?>"><?php esc_html_e( 'Show Recent Post:', 'enar') ?></label>
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['show_comments'], 'on'); ?> id="<?php echo esc_attr($this->get_field_id('show_comments')); ?>" name="<?php echo esc_attr($this->get_field_name('show_comments')); ?>" />
                
                <label for="<?php echo esc_attr($this->get_field_id( 'show_comments' )); ?>"><?php esc_html_e( 'Show Comments:', 'enar') ?></label>
            </p>
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('num_posts')); ?>"><?php esc_html_e( 'Number Of Posts', 'enar') ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('num_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('num_posts')); ?>" type="text" value="<?php echo esc_attr($num_posts); ?>" />
            </p>

    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;

		$instance['order_by']= $new_instance['order_by'];
		$instance['show_popular']= $new_instance['show_popular'];
		$instance['show_recent']= $new_instance['show_recent'];
		$instance['show_comments']= $new_instance['show_comments'];
		$instance['num_posts']= $new_instance['num_posts'];
		
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		global $post; 
		global $enar_custom_portfolio_metabox;
		global $enar_custom_posts_gallery;
		
		$order_by       = $instance['order_by'];		
		$show_popular      = $instance['show_popular']; 
		$show_recent     = $instance['show_recent'];
		$show_comments      = $instance['show_comments'];
		$num_posts      = $instance['num_posts'];
		
		echo $before_widget; ?>
        	<div class="hm-tabs tabs1">
                <nav>
                    <ul class="tabs-navi">
                        <?php if ( $show_popular == 'on' ){ ?>
                        	<li><a data-content="popular" class="selected" href="#"><span></span><?php esc_html_e( 'Popular', 'enar') ?></a></li>
						<?php } ?>
                        <?php if ( $show_recent == 'on' ){ ?>
                        	<li><a data-content="recent" href="#"><span></span><?php esc_html_e( 'Recent', 'enar') ?></a></li>
						<?php } ?>
                        <?php if ( $show_comments == 'on' ){ ?>
                        	<li><a data-content="comments" href="#"><?php esc_html_e( 'Comments', 'enar') ?></a></li>
						<?php } ?>
                    </ul>
                </nav>
                
                <ul class="tabs-body">
                    <?php if ( $show_popular == 'on' ){ ?>
                        
                    
                        <li data-content="popular" class="selected">
                            <ul class="posts_widget_list2">
                                <?php 
									$args_for_porular = array(
									  'post_type' => 'post',
									  'post_status' => 'publish',
									  'posts_per_page' => $num_posts,
									  'orderby' 			=> 'comment_count',
									  'order' 			=> 'DESC',
									);
									$query_for_porular = null;
									$query_for_porular = new WP_Query($args_for_porular);
									
									if ( $query_for_porular->have_posts() ) : while ( $query_for_porular->have_posts() ) : $query_for_porular->the_post(); ?>
									
									<?php 
										$larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-thumb');
										$larg_img 	= $larg_img['0'];
										$gallery = '';
										
										if(!has_post_thumbnail() && get_post_format() == 'gallery'){ 
											$all_slides = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
											$gallery = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
											$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
											$store_first_id = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
											$get_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-thumb');											
											$get_first_img_url = $get_first_img_url[0];
											$get_first_img_src = $get_first_img_url;
											$larg_img = $get_first_img_src;
										} 
								?>
									<?php if(has_post_thumbnail() || $gallery !== '') { ?>
                                        <li class="clearfix">
                                            <a href="<?php the_permalink(); ?>">
                                                <img alt="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($larg_img); ?>">
                                                <span><?php the_title(); ?></span>
                                            </a>
                                            <span class="post_date"><i class="ico-comment2"></i><?php echo idealtheme_get_comments_num(); ?></span> 
                                        </li>
                                    <?php } ?>
                                   
                                <?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
                                <?php else: ?>
                                <li><?php esc_html_e( 'No posts have been published yet.', 'enar' ); ?></li>						
                                <?php endif; ?>
                            </ul>
                        </li>
                        
                	<?php } ?>
                    
                    <?php if ( $show_recent == 'on' ){ ?>
                        <li data-content="recent">
                            <ul class="posts_widget_list2">
                                <?php 
									$args_for_porular = array(
									  'post_type' => 'post',
									  'post_status' => 'publish',
									  'posts_per_page' => $num_posts,
									  'orderby' 			=> 'post_date',
									  'order' 			=> 'DESC',
									);
									$query_for_porular = null;
									$query_for_porular = new WP_Query($args_for_porular);
									
									if ( $query_for_porular->have_posts() ) : while ( $query_for_porular->have_posts() ) : $query_for_porular->the_post(); ?>
									
									<?php 
										$larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-thumb');
										$larg_img 	= $larg_img['0'];
										$gallery = '';
										
										if(!has_post_thumbnail() && get_post_format() == 'gallery'){ 
											$all_slides = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
											$gallery = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
											$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
											$store_first_id = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
											$get_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-thumb');											
											$get_first_img_url = $get_first_img_url[0];
											$get_first_img_src = $get_first_img_url;
											$larg_img = $get_first_img_src;
										} 
								?>
                                	<?php if(has_post_thumbnail() || $gallery !== '') { ?>
                                    <li class="clearfix">
                                        <a href="<?php the_permalink(); ?>">
                                            <img alt="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($larg_img); ?>">
                                            <span><?php the_title(); ?></span>
                                        </a>
                                        <span class="post_date"><?php idealtheme_fun_get_date_format(); ?></span> 
                                    </li>
                                    <?php } ?>
                                    
                                <?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
                                <?php else: ?>
                                <li><?php esc_html_e( 'No posts have been published yet.', 'enar' ); ?></li>						
                                <?php endif; ?>
                            </ul>
                        </li>
                	<?php } ?>
                    
                    <?php if ( $show_comments == 'on' ){ ?>
                        <li data-content="comments">
                            <ul class="posts_widget_list2">
                                <?php
								global $wpdb;
								$get_recent_comments = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,110) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $num_posts";
								$get_comments = $wpdb->get_results($get_recent_comments);
								
								if( $get_comments ) {
									foreach($get_comments as $comment) { 
									//$user_mail = $comment->comment_author_email;
									//$user = get_user_by( 'email', $user_mail );
									//print_r($user);
									?>
                                        <li class="clearfix">
                                            <a>
                                                <?php echo get_avatar($comment, '60'); ?>
                                                <span><?php echo strip_tags($comment->comment_author); ?>:</span>
                                            </a>
                                            <span class="post_comment">
                                            <a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo esc_attr($comment->comment_ID); ?>" title="<?php echo esc_attr($comment->comment_author); ?> <?php esc_html_e( 'on', 'enar' ); ?> <?php echo esc_attr($comment->post_title); ?>">
                                            
											<?php echo wp_trim_words( $comment->com_excerpt, 13, ' ...' ); ?>
                                            
                                            </a></span> 
                                        </li>
                                	<?php } 
									
								} else { ?>
									<li><?php esc_html_e( 'No comments have been published yet.', 'enar' ); ?></li>
								<?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    
                </ul>
            </div>        
        <?php echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'idealtheme_tabs_posts_widget' );
function idealtheme_tabs_posts_widget() {
    register_widget('idealtheme_tabs_posts');
}
?>