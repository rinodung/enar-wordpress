<?php
function hm_load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'hm_load_wp_media_files' );
class idealtheme_custom_text_widget extends WP_Widget {
 
    function idealtheme_custom_text_widget() {     
        $widget_ops = array( 'classname' => 'custom_text_with_image', 'description' => esc_html__( 'Show custom text with image and button.','enar') );
        parent::__construct( 'custom_text_with_image', esc_html__( 'Enar - Custom Text','enar'), $widget_ops);
    }
	
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title' => '', 
			'image' => '', 
			'desc' => '', 
			'link_title' => '', 
			'link_url' => '', 
			'link_target' => '', 
		));
		
		$title = esc_attr($instance['title']);
		$image = esc_attr($instance['image']);
		
		$desc = esc_attr($instance['desc']);
		$link_title = esc_attr($instance['link_title']);
		$link_url = esc_attr($instance['link_url']);
		$link_target = esc_attr($instance['link_target']);
		
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
                <label style="display:block" for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e( 'Image:', 'enar') ?></label>
                <input style="display:none" name="<?php echo esc_attr($this->get_field_name('image')); ?>" id="<?php echo esc_attr($this->get_field_id('image')); ?>" class="hm_upload_custom_img widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
                <img style="display:none" class="hm_custom_image" src="<?php echo esc_url( $image ); ?>" alt="" />
                <a href="#" class="button hm_upload_custom_image"><?php esc_html_e( 'Upload Image', 'enar') ?></a>
                <a style="display:none" href="#" class="button hm_remove_custom_image"><?php esc_html_e( 'Remove Image', 'enar') ?></a>
            </p> 
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'desc' )); ?>"><?php esc_html_e( 'Description:', 'enar') ?></label>
                <textarea rows="3" cols="20" class="widefat" name="<?php echo esc_attr($this->get_field_name('desc')); ?>" id="<?php echo esc_attr($this->get_field_id('desc')); ?>"><?php echo esc_html($desc); ?></textarea>
            </p>   
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('link_title')); ?>"><?php esc_html_e( 'Button Title:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_title')); ?>" name="<?php echo esc_attr($this->get_field_name('link_title')); ?>" type="text" value="<?php echo esc_attr($link_title); ?>" />
            </p>     
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('link_url')); ?>"><?php esc_html_e( 'Button URL:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_url')); ?>" name="<?php echo esc_attr($this->get_field_name('link_url')); ?>" type="text" value="<?php echo esc_attr($link_url); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'link_target' )); ?>"><?php esc_html_e( 'Button Link Target:', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'link_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_target' )); ?>" class="widefat">
                    
                    <option value="_self" <?php if ( '_self' == $instance['link_target'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Open In Same Window', 'enar'); ?></option>
                    <option value="_blank" <?php if ( '_blank' == $instance['link_target'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Open In New Window', 'enar'); ?></option>
                    
                </select>
            </p>  
            
    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['image'] = $new_instance['image'];
		$instance['desc'] = $new_instance['desc'];
		
		$instance['link_title'] = $new_instance['link_title'];
		$instance['link_url'] = $new_instance['link_url'];
		$instance['link_target'] = $new_instance['link_target'];
		
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$image = $instance['image'];
		$desc = $instance['desc'];

		$link_title = $instance['link_title'];
		$link_url = $instance['link_url'];
		$link_target = $instance['link_target'];
		
		if ( empty($title) ) $title = false;
		if ( empty($image) ) $image = false;
		
		echo $before_widget;
       
			if ( $title ) echo $before_title . $title . $after_title;
			
	    	if ( $image ) echo '<img class="footer_logo" src="'.esc_attr($image).'" alt="'.esc_attr($title).'">';
			echo '<span class="footer_desc">'.esc_html($desc).'</span>';
			if ( $link_title !== '' &&  $link_url !== '') echo '<a class="black_button" href="'.esc_attr($link_url).'" target="'.esc_attr($link_target).'"><i class="ico-angle-right"></i><span>'.esc_attr($link_title).'</span></a>';
		
		echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'idealtheme_load_custom_text_widget' );
function idealtheme_load_custom_text_widget() {
    register_widget('idealtheme_custom_text_widget');
}
?>