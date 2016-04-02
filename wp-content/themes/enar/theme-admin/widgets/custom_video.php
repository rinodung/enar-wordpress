<?php

class idealtheme_custom_video_widget extends WP_Widget {
 
    function idealtheme_custom_video_widget() {     
        $widget_ops = array( 'classname' => 'custom_lightbox_video', 'description' => esc_html__( 'Show custom light box video.','enar') );
        parent::__construct( 'custom_lightbox_video', esc_html__( 'Enar - Custom Video','enar'), $widget_ops);
    }
	
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title' => '', 
			'image' => '',
			'video_url' => 'http://vimeo.com/29193046', 
		));
		
		$title = esc_attr($instance['title']);
		$image = esc_attr($instance['image']);
		$video_url = esc_attr($instance['video_url']);
		
		?>	
            <script>
       		jQuery(document).ready(function($) {
				
				function upload_custom_image() {
					
					var upload_btn = $('.hm_upload_custom_image');
					var remove_btn = $('.hm_remove_custom_image');
					var view_selected_image = $('img.hm_custom_image');
					var store_value = $('.hm_upload_custom_img');
					
					$('.hm_upload_custom_img_con').each(function(index, element) {
						var this_con = $(this);
						var img_value = $(this_con).find(store_value).val();
						if( img_value == '' ){
							$(this_con).find(view_selected_image).hide();
							$(this_con).find(remove_btn).hide();
							$(this_con).find(upload_btn).show();
						}else{
							$(this_con).find(view_selected_image).show();
							$(this_con).find(remove_btn).show();
							$(this_con).find(upload_btn).hide();
						}
						
						$(this_con).find(upload_btn).unbind('click');
						$(this_con).find(upload_btn).on('click',function( event ) {
								 
							event.preventDefault();
							var add_image_button = $(this);
							
							wp.media.frames.customHeader = wp.media({
								type: 'image' 
							});
							wp.media.frames.customHeader.on( "select", function() {
								var selected_image_tag = wp.media.frames.customHeader.state().get("selection").first();
								var selected_image_src = selected_image_tag.attributes.url;
								
								$(this_con).find(remove_btn).show();
								$(this_con).find(upload_btn).hide();
								
								$(this_con).find(view_selected_image).attr('src',selected_image_src);
								$(this_con).find(store_value).val(selected_image_src);				
							});
							wp.media.frames.customHeader.open();
							
							$(this_con).find(view_selected_image).show();
						});	
						
						$(this_con).find(remove_btn).unbind('click');
						$(this_con).find(remove_btn).on('click',function( event ) {	 
							event.preventDefault();
							
							$(this_con).find(upload_btn).show();
							$(this_con).find(remove_btn).hide();		
									
							$(this_con).find(view_selected_image).attr('src','');
							$(this_con).find(store_value).val('');
							
							$(this_con).find(view_selected_image).hide();
						});
					});
					
							
				};
				upload_custom_image();
			
			});
		    </script>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title :', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p> 
            
            <p class="hm_upload_custom_img_con">
                <label style="display:block" for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e( 'Cover Image:', 'enar') ?></label>
                <input style="display:none" name="<?php echo esc_attr($this->get_field_name('image')); ?>" id="<?php echo esc_attr($this->get_field_id('image')); ?>" class="hm_upload_custom_img widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
                <img style="display:none" class="hm_custom_image" src="<?php echo esc_url( $image ); ?>" alt="" />
                <a href="#" class="button hm_upload_custom_image"><?php esc_html_e( 'Upload Image', 'enar') ?></a>
                <a style="display:none" href="#" class="button hm_remove_custom_image"><?php esc_html_e( 'Remove Image', 'enar') ?></a>
            </p> 
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('video_url')); ?>"><?php esc_html_e( 'Video Link: ( YouTube - Vimeo )', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('video_url')); ?>" name="<?php echo esc_attr($this->get_field_name('video_url')); ?>" type="text" value="<?php echo esc_attr($video_url); ?>" />
            </p>      
            
    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['image'] = $new_instance['image'];
		$instance['video_url'] = $new_instance['video_url'];
		
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$image = $instance['image'];
		$video_url = $instance['video_url'];
		
		if ( empty($title) ) $title = false;
		
		echo $before_widget;
        if ( $title ) echo $before_title . $title . $after_title;
		echo '<a class="hm_vid_con popup-vimeo" href="'.esc_attr($video_url).'">
					<span class="vid_icon"><i class="ico-play5"></i></span>
					<img alt="'.esc_attr($title).'" src="'.esc_attr($image).'">
			  </a>';	
	    	
		echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'idealtheme_load_custom_video_widget' );
function idealtheme_load_custom_video_widget() {
    register_widget('idealtheme_custom_video_widget');
}
?>