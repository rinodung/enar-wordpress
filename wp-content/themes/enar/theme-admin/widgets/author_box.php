<?php
class idealtheme_author_box_widget extends WP_Widget {
 
    function idealtheme_author_box_widget() {     
        $widget_ops = array( 'classname' => 'author_box_with_image', 'description' => esc_html__( 'To Show Author Profile.','enar') );
        parent::__construct( 'author_box_with_image', esc_html__( 'Enar - Author Box','enar'), $widget_ops);
    }
	
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title' => '', 
			'author_from' => '',
			'author' => '', 
			
			'image' => '', 
			'author_name' => '', 
			'author_link' => '', 
			
			'facebook' => '',
			'twitter' => '',
			'dribbble' => '',
			'google_plus' => '',
			'linkedin' => '',
			
		));
		
		$title = esc_attr($instance['title']);
		$author_from = esc_attr($instance['author_from']);
		$author = esc_attr($instance['author']);
		
		$image = esc_attr($instance['image']);
		$author_name = esc_attr($instance['author_name']);
		$author_link = esc_attr($instance['author_link']);
		
		$facebook = esc_attr($instance['facebook']);
		$twitter = esc_attr($instance['twitter']);
		$dribbble = esc_attr($instance['dribbble']);
		$google_plus = esc_attr($instance['google_plus']);
		$linkedin = esc_attr($instance['linkedin']);
		
		?>
		<script>
       		jQuery(document).ready(function($) {
				
				$('.has_filtered_option select').each(function(index, element) {
					var $selection = $(this);
					var curr_val = $(this).val();
					var $selection_parent = $selection.parent();
					
					$selection_parent.siblings('.filtered_con').not('.'+curr_val).hide();
					$selection_parent.siblings('.'+curr_val).show();
						
                    $selection.on('change', function() {
						var val_class = $(this).val();
						$selection_parent.siblings('.filtered_con').not('.'+val_class).hide();
						$selection_parent.siblings('.'+val_class).show();
						
					});
                });
				
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
            
            <div class="has_filtered_option">
                <label for="<?php echo esc_attr($this->get_field_id( 'author_from' )); ?>"><?php esc_html_e( 'Get Author From:', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'author_from' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'author_from' )); ?>" class="widefat">
                    <option value="existing_user" <?php if ( 'existing_user' == $instance['author_from'] ) echo 'selected="selected"'; ?>>From Users</option>
                    <option value="custom_user" <?php if ( 'custom_user' == $instance['author_from'] ) echo 'selected="selected"'; ?>>Create Custom Author</option>
                </select>
            </div>
            
            <div class="filtered_con existing_user">
            	<p>
                    <label for="<?php echo esc_attr($this->get_field_id( 'author' )); ?>"><?php esc_html_e( 'Author Name', 'enar') ?></label>
                    <select id="<?php echo esc_attr($this->get_field_id( 'author' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'author' )); ?>" class="widefat">
                       <?php 
					        $blogusers = get_users();
							foreach ( $blogusers as $user ) { ?>
                               
							   <option value="<?php echo esc_html( $user->ID ); ?>" <?php if ( $user->ID == $instance['author'] ) echo 'selected="selected"'; ?>>
							   <?php echo esc_attr($user->display_name); ?></option>
					   <?php } ?>
                    </select>
                </p>
            </div>
            
            <div class="filtered_con custom_user">
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('author_name')); ?>"><?php esc_html_e( 'Author Name:', 'enar'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_name')); ?>" name="<?php echo esc_attr($this->get_field_name('author_name')); ?>" type="text" value="<?php echo esc_attr($author_name); ?>" />
                </p>  
                   
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('author_link')); ?>"><?php esc_html_e( 'Author Page Link:', 'enar'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_link')); ?>" name="<?php echo esc_attr($this->get_field_name('author_link')); ?>" type="text" value="<?php echo esc_attr($author_link); ?>" />
                </p>
                <p class="hm_upload_custom_img_con">
                    <label style="display:block" for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e( 'Author Avatar:', 'enar') ?></label>
                    <input style="display:none" name="<?php echo esc_attr($this->get_field_name('image')); ?>" id="<?php echo esc_attr($this->get_field_id('image')); ?>" class="hm_upload_custom_img widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
                    <img style="display:none" class="hm_custom_image" src="<?php echo esc_url( $image ); ?>" alt="" />
                    <a href="#" class="button hm_upload_custom_image"><?php esc_html_e( 'Upload Image', 'enar') ?></a>
                    <a style="display:none" href="#" class="button hm_remove_custom_image"><?php esc_html_e( 'Remove Image', 'enar') ?></a>
                </p> 
                
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e( 'Facebook Link:', 'enar'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
                </p> 
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e( 'Twitter Link:', 'enar'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
                </p> 
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('dribbble')); ?>"><?php esc_html_e( 'Dribbble Link:', 'enar'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
                </p> 
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('google_plus')); ?>"><?php esc_html_e( 'Google+ Link:', 'enar'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('google_plus')); ?>" name="<?php echo esc_attr($this->get_field_name('google_plus')); ?>" type="text" value="<?php echo esc_attr($google_plus); ?>" />
                </p> 
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e( 'LinkedIn Link:', 'enar'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
                </p> 
            </div>
    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['author_from'] = $new_instance['author_from'];
		$instance['author'] = $new_instance['author'];
		
		$instance['image'] = $new_instance['image'];
		$instance['author_name'] = $new_instance['author_name'];
		$instance['author_link'] = $new_instance['author_link'];
		
		$instance['facebook'] = $new_instance['facebook'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['dribbble'] = $new_instance['dribbble'];
		$instance['google_plus'] = $new_instance['google_plus'];
		$instance['linkedin'] = $new_instance['linkedin'];
		
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$author_from = $instance['author_from'];
		$author = $instance['author'];

		$image = $instance['image'];
		$author_name = $instance['author_name'];
		$author_link = $instance['author_link'];
		
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$dribbble = $instance['dribbble'];
		$google_plus = $instance['google_plus'];
		$linkedin = $instance['linkedin'];
		
		if ( empty($title) ) $title = false;
		if ( empty($image) ) $image = false;
		
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		
	    if( $author_from == 'existing_user' ){
			$user_meta = get_user_meta($author);
			$all_meta_for_user = get_userdata($author);
			
			$author_avatar = get_avatar( $author, 100 );
			$author_url = get_author_posts_url( $author );
			
			?>
            <div class="about_author clearfix">
                <a href="<?php echo esc_attr($author_url); ?>" class="about_author_link">
                    <?php echo $author_avatar; ?>
                    <span><?php echo esc_attr($all_meta_for_user->display_name); ?></span>
                </a>
                <div class="social_media clearfix">
                    <?php if ($user_meta['twitter'][0] !== '') { ?>
                        <a class="twitter" target="_blank" href="<?php echo esc_attr($user_meta['twitter'][0]); ?>">
                            <i class="ico-twitter4"></i>
                        </a>
                    <?php } ?>
                    <?php if ($user_meta['facebook'][0] !== '') { ?>
                        <a class="facebook" target="_blank" href="<?php echo esc_attr($user_meta['facebook'][0]); ?>">
                            <i class="ico-facebook4"></i>
                        </a>    
                    <?php } ?>
                    <?php if ($user_meta['google_plus'][0] !== '') { ?>    
                        <a class="googleplus" target="_blank" href="<?php echo esc_attr($user_meta['google_plus'][0]); ?>">
                            <i class="ico-google-plus"></i>
                        </a>   
                    <?php } ?> 
                    <?php if ($user_meta['linkedin'][0] !== '') { ?> 
                        <a class="linkedin" target="_blank" href="<?php echo esc_attr($user_meta['linkedin'][0]); ?>">
                            <i class="ico-linkedin3"></i>
                        </a>
                    <?php } ?>
                    <?php if ($user_meta['dribbble'][0] !== '') { ?>
                        <a class="dribbble" target="_blank" href="<?php echo esc_attr($user_meta['dribbble'][0]); ?>">
                            <i class="ico-dribbble"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php
		}else{
			?>
            <div class="about_author clearfix">
                <a href="<?php echo esc_attr($author_link); ?>" class="about_author_link">
                    <img src="<?php echo esc_attr($image); ?>" alt="<?php echo esc_attr($author_name); ?>" />
                    <span><?php echo esc_html($author_name); ?></span>
                </a>
                <div class="social_media clearfix">
                    <?php if ($twitter !== '') { ?>
                        <a class="twitter" target="_blank" href="<?php echo esc_attr($twitter); ?>">
                            <i class="ico-twitter4"></i>
                        </a>
                    <?php } ?>
                    <?php if ($facebook !== '') { ?>
                        <a class="facebook" target="_blank" href="<?php echo esc_attr($facebook); ?>">
                            <i class="ico-facebook4"></i>
                        </a>    
                    <?php } ?>
                    <?php if ($google_plus !== '') { ?>    
                        <a class="googleplus" target="_blank" href="<?php echo esc_attr($google_plus); ?>">
                            <i class="ico-google-plus"></i>
                        </a>   
                    <?php } ?> 
                    <?php if ($linkedin !== '') { ?> 
                        <a class="linkedin" target="_blank" href="<?php echo esc_attr($linkedin); ?>">
                            <i class="ico-linkedin3"></i>
                        </a>
                    <?php } ?>
                    <?php if ($dribbble !== '') { ?>
                        <a class="dribbble" target="_blank" href="<?php echo esc_attr( $dribbble ); ?>">
                            <i class="ico-dribbble"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php
		}
		
		echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'idealtheme_load_author_box_widget' );
function idealtheme_load_author_box_widget() {
    register_widget('idealtheme_author_box_widget');
}
?>