<?php
class idealtheme_posts extends WP_Widget {
 
    function idealtheme_posts() {     
        $widget_ops = array( 'classname' => 'posts_widget', 'description' => esc_html__( 'Show your favorite Posts photos!','enar') );
        parent::__construct( 'posts_widget', esc_html__( 'Enar - Posts','enar'), $widget_ops);
    }
 
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'        => 'Posts', 
			'order_by'     => 'Recent', 
			'post_type'    => 'post', 
			'view_image'   => 'yes',
			'post_date'    => 'yes',
			'post_cats'    => 'yes',
			'posts_number' => 5,
			
			//'link_title' => '', 
			//'link_url' => '', 
		));
		
		$title          = esc_attr($instance['title']);
		$order_by       = esc_attr($instance['order_by']);		
		$post_type      = esc_attr($instance['post_type']);
		$view_image     = esc_attr($instance['view_image']);
		$post_date      = esc_attr($instance['post_date']);
		$post_cats      = esc_attr($instance['post_cats']);
		$posts_number   = intval($instance['posts_number']);
		
		//$link_title = esc_attr($instance['link_title']);
		//$link_url = esc_attr($instance['link_url']);
		
		?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title :', 'enar') ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>"><?php esc_html_e( 'Order By (Recent - Popular - Random) :', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_by' )); ?>" class="widefat">
                    <option value="recent" <?php if ( 'recent' == $instance['order_by'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Recent', 'enar') ?></option>
                    <option value="popular" <?php if ( 'popular' == $instance['order_by'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Popular', 'enar') ?></option>
                    <option value="random" <?php if ( 'random' == $instance['order_by'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Random', 'enar') ?></option>
                </select>
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'post_type' )); ?>"><?php esc_html_e( 'Post Type', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'post_type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_type' )); ?>" class="widefat">
                    <option value="post" <?php if ( 'post' == $instance['post_type'] ) echo 'selected="selected"'; ?>>Post</option>
                    <option value="portfolio" <?php if ( 'portfolio' == $instance['post_type'] ) echo 'selected="selected"'; ?>>Portfolio</option>
                </select>
            </p>
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'view_image' )); ?>"><?php esc_html_e( 'Display Post Image', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'view_image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'view_image' )); ?>" class="widefat">
                    <option value="yes" <?php if ( 'yes' == $instance['view_image'] ) echo 'selected="selected"'; ?>>Yes</option>
                    <option value="no" <?php if ( 'no' == $instance['view_image'] ) echo 'selected="selected"'; ?>>No</option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'post_date' )); ?>"><?php esc_html_e( 'Display Post Date', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'post_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_date' )); ?>" class="widefat">
                    <option value="yes" <?php if ( 'yes' == $instance['post_date'] ) echo 'selected="selected"'; ?>>Yes</option>
                    <option value="no" <?php if ( 'no' == $instance['post_date'] ) echo 'selected="selected"'; ?>>No</option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'post_cats' )); ?>"><?php esc_html_e( 'Display Post Ctegories', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'post_cats' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_cats' )); ?>" class="widefat">
                    <option value="yes" <?php if ( 'yes' == $instance['post_cats'] ) echo 'selected="selected"'; ?>>Yes</option>
                    <option value="no" <?php if ( 'no' == $instance['post_cats'] ) echo 'selected="selected"'; ?>>No</option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('posts_number')); ?>"><?php esc_html_e( 'Number Of Posts', 'enar') ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('posts_number')); ?>" name="<?php echo esc_attr($this->get_field_name('posts_number')); ?>" type="text" value="<?php echo esc_attr($posts_number); ?>" />
            </p>
            <?php /*?><p>
                <label for="<?php echo esc_attr($this->get_field_id('link_title')); ?>"><?php esc_html_e( 'Button Title:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_title')); ?>" name="<?php echo esc_attr($this->get_field_name('link_title')); ?>" type="text" value="<?php echo esc_attr($link_title); ?>" />
            </p>     
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('link_url')); ?>"><?php esc_html_e( 'Button URL:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_url')); ?>" name="<?php echo esc_attr($this->get_field_name('link_url')); ?>" type="text" value="<?php echo esc_attr($link_url); ?>" />
            </p><?php */?>
    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title']= strip_tags($new_instance['title']);
		$instance['order_by']= $new_instance['order_by'];
		$instance['post_type']= $new_instance['post_type'];
		$instance['view_image']= $new_instance['view_image'];
		$instance['post_date']= $new_instance['post_date'];
		$instance['post_cats']= $new_instance['post_cats'];
		$instance['posts_number']= $new_instance['posts_number'];
		
		//$instance['link_title'] = $new_instance['link_title'];
		//$instance['link_url'] = $new_instance['link_url'];
		
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		global $post; 
		global $enar_custom_portfolio_metabox;
		global $enar_custom_posts_gallery;
		
		$title          = apply_filters('widget_title', $instance['title']); //
		$order_by       = $instance['order_by'];		
		$post_type      = $instance['post_type']; 
		$view_image     = $instance['view_image'];
		$post_date      = $instance['post_date'];
		$post_cats      = $instance['post_cats'];
		$posts_number   = $instance['posts_number'];
		
		//$link_title     = $instance['link_title'];
		//$link_url       = $instance['link_url'];
		
		if ($order_by == 'recent') {
			$get_order_by = 'post_date';
			
		} else if ($order_by == 'popular') {
			$get_order_by = 'comment_count';
			
		} else if ($order_by == 'random'){
			$get_order_by = 'rand';
			
		} else{
			$get_order_by = 'post_date';
		}
		
		echo $before_widget;
		
        if ( empty($title) ) $title = false;
		if ( $title ) echo $before_title . $title . $after_title; 
		
		?>
                <ul class="recent_posts_list clearfix">
				<?php 
				$args = array(
				  'post_type' => $post_type,
				  'posts_per_page' => intval($posts_number),
				  'post_status'    => 'publish',
				  'orderby' 	    => $get_order_by,
				  'order' 		  => 'DESC',
				);
				$posts_w_query = null;
				$posts_w_query = new WP_Query($args);
				
				if ( $posts_w_query->have_posts() ) : while ( $posts_w_query->have_posts() ) : $posts_w_query->the_post(); ?>
                    <?php 
						$larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-thumb');
						$larg_img 	= $larg_img['0'];
					?>
                    <?php if(!has_post_thumbnail() && get_post_type() == 'portfolio') { 
                    	$all_slides = get_post_meta($post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true);
						$portfolio_type = isset($all_slides['content_type']) ? $all_slides['content_type'] : '';
						$gallery = isset($all_slides['portfolio_gallery']) ? $all_slides['portfolio_gallery'] : '';
						$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
						$store_first_id = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
						$get_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-thumb');											
						$get_first_img_url = $get_first_img_url[0];
						$get_first_img_src = $get_first_img_url;
						
					} else if(!has_post_thumbnail() && get_post_type() == 'post'){ 
						$all_slides = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
						$gallery = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
						$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
						$store_first_id = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
						$get_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-thumb');											
						$get_first_img_url = $get_first_img_url[0];
						$get_first_img_src = $get_first_img_url;
					} else {
						$gallery = '';
					}?>
                    
                    <?php if(has_post_thumbnail() || $gallery !== '') { ?>
						<?php if(!has_post_thumbnail() && get_post_format() !== 'gallery' && $gallery !== '' && get_post_type() == 'post'){
							
						} else if(!has_post_thumbnail() && $gallery !== '' && get_post_type() == 'portfolio' && $portfolio_type !== 'gallery'){
							
						} else { ?>
                        
                        <li class="clearfix">
                            <?php $con_class = ( has_post_thumbnail() && $view_image == 'yes' ) ? 'in' : 'all'; ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() && $view_image == 'yes' ) { ?>
                                	<span class="recent_posts_img"><img title="<?php esc_attr(the_title()); ?>" alt="<?php echo esc_attr(the_title()); ?>" src="<?php echo esc_url($larg_img); ?>"></span>
                                <?php } else if(!has_post_thumbnail() && $gallery !== '' && $view_image == 'yes'){ ?>
                                    <span class="recent_posts_img"><img title="<?php esc_attr(the_title()); ?>" alt="<?php echo esc_attr(the_title()); ?>" src="<?php echo esc_url($get_first_img_src); ?>"></span>
                                <?php } ?>   
                                <span>
									<?php $trimexcerpt_title = get_the_title();
                                    echo wp_trim_words( $trimexcerpt_title, 8, ' ...' );
									?>
                                </span>
                            </a>
                            
                            <?php if ( $post_cats == 'yes' ) { ?>
                            	<span class="recent_post_detail">
                                	<?php 
									if ( $post_type == 'post' ) {
										echo idealtheme_get_cats_html( 'category', false );
									} else {
										echo idealtheme_get_cats_html( 'portfolio_category', false );
									}
									
									?>
                                </span>
                            <?php } ?>
                            
                            <?php if ( $post_date == 'yes' ) { ?>
                            	<span class="recent_post_detail"><?php idealtheme_fun_get_date_format(); ?></span>
                            <?php } ?>
                        </li>
                        <?php } ?>
                        
                    <?php } ?>
                <?php endwhile; ?>
                <?php  else:  ?>
                <?php  endif; ?>
                </ul>
					<?php /*?><?php if ( $link_url !== '' && $link_title !== '' ) { ?>
                        <a href="<?php echo esc_attr($link_url); ?>" class="arrow_button">
                            <span>
                                <i class="ico-arrow-forward"></i>
                                <span><?php echo esc_attr($link_title); ?></span>
                                <i class="ico-arrow-forward"></i>
                            </span>
                        </a>
                    <?php } ?><?php */?>
                <?php wp_reset_query(); ?>
        <?php 
		echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'idealtheme_posts_widget' );
function idealtheme_posts_widget() {
    register_widget('idealtheme_posts');
}
?>