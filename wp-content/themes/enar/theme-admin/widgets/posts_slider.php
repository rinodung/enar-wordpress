<?php
class idealtheme_posts_slider extends WP_Widget {
 
    function idealtheme_posts_slider() {     
        $widget_ops = array( 'classname' => 'posts_slider_widget', 'description' => esc_html__( 'Show your favorite Posts In Slider!','enar') );
        parent::__construct( 'posts_slider_widget', esc_html__( 'Enar - Posts Slider','enar'), $widget_ops);
    }
 
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'        => 'Posts Slider', 
			'order_by'     => 'Recent', 
			'post_type'    => 'post', 
			'post_date'    => 'yes',
			'post_cats'    => 'yes',
			'posts_number' => '5',
		));
		
		$title          = esc_attr($instance['title']);
		$order_by       = esc_attr($instance['order_by']);		
		$post_type      = esc_attr($instance['post_type']);
		$post_date      = esc_attr($instance['post_date']);
		$post_cats      = esc_attr($instance['post_cats']);
		$posts_number   = intval($instance['posts_number']);
		
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

    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title']= strip_tags($new_instance['title']);
		$instance['order_by']= $new_instance['order_by'];
		$instance['post_type']= $new_instance['post_type'];
		$instance['post_date']= $new_instance['post_date'];
		$instance['post_cats']= $new_instance['post_cats'];
		$instance['posts_number']= $new_instance['posts_number'];
		
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
		$post_date      = $instance['post_date'];
		$post_cats      = $instance['post_cats'];
		$posts_number   = $instance['posts_number'];
		
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
             <div class="related_slider_widget centered">
                <?php 
				$args = array(
				  'post_type' => $post_type,
				  'post_status' => 'publish',
				  'posts_per_page' => $posts_number,
				  'orderby' 			=> $get_order_by,
				  'order' 			=> 'DESC',
				);
				$posts_w_query = null;
				$posts_w_query = new WP_Query($args);
				
				query_posts( $args );
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php 
						$larg_img 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'enar-blog-carousel');
						$larg_img 	= $larg_img['0'];
						$gallery = '';
					?>
                    <?php if(!has_post_thumbnail() && get_post_type() == 'portfolio') { 
                    	$all_slides = get_post_meta($post->ID , $enar_custom_portfolio_metabox->get_the_ID(), true);
						$portfolio_type = isset($all_slides['content_type']) ? $all_slides['content_type'] : '';
						$gallery = isset($all_slides['portfolio_gallery']) ? $all_slides['portfolio_gallery'] : '';
						$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
						$store_first_id = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
						$get_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-carousel');											
						$get_first_img_url = $get_first_img_url[0];
						$get_first_img_src = $get_first_img_url;
						
					} else if(!has_post_thumbnail() && get_post_type() == 'post'){ 
						$all_slides = get_post_meta($post->ID , $enar_custom_posts_gallery->get_the_ID(), true);
						$gallery = isset($all_slides['gallery']) ? $all_slides['gallery'] : '';
						$get_gallery_first = isset($gallery[0]) ? $gallery[0] : '';
						$store_first_id = isset($get_gallery_first['imgid']) ? $get_gallery_first['imgid'] : '';
						$get_first_img_url = wp_get_attachment_image_src($store_first_id, 'enar-blog-carousel');											
						$get_first_img_url = $get_first_img_url[0];
						$get_first_img_src = $get_first_img_url;
						$larg_img = $get_first_img_src;
					}?>
                    
                    <?php if(has_post_thumbnail() || $gallery !== '') { ?>
                    <div class="related_posts_slide">
                        <div class="related_img_con">
                            <a href="<?php the_permalink(); ?>" class="related_img">
                                <img alt="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($larg_img); ?>">
                                <span><i class="<?php echo esc_attr(idealtheme_get_format_icon($post->ID)); ?>"></i></span>
                            </a>
                        </div>
                        <a class="related_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        
                        
                        
                        <?php if ( $post_date == 'yes' || $post_cats == 'yes' ) { ?>
                        	<span class="post_date">
								<?php if ( $post_date == 'yes' ) { echo get_the_date('m/d/Y', $post->ID); } ?>
                                <?php if ( $post_date == 'yes' && $post_cats == 'yes' ) { echo '&nbsp;&nbsp;|&nbsp;&nbsp;'; } ?>
                                <?php if ( $post_cats == 'yes' ) { 
                                        $post_categories = wp_get_post_categories( $post->ID );
                                        $numItems = count($post_categories);
                                        $cats = array();
                                        $c_i = 0;
                                        foreach($post_categories as $c){
                                            $cat = get_category( $c );
                                            echo esc_html($cat->name);
                                            if(++$c_i !== $numItems) {
                                                echo ', ';
                                            }
                                    	}
                                } ?>
                            </span>
                        <?php } ?>
                        
                    </div>
                    <?php } ?>
                    
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
                    <?php else: ?>
                    <?php  endif; ?>
            </div>   
        <?php 
		echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'idealtheme_posts_slider_widget' );
function idealtheme_posts_slider_widget() {
    register_widget('idealtheme_posts_slider');
}
?>