<?php
if (file_exists(ENAR_INC . '/mailchimp/subscribe.php')) {
	require_once( ENAR_INC . '/mailchimp/subscribe.php');
}
class idealtheme_newsletter_widget extends WP_Widget {
 
    function idealtheme_newsletter_widget() {     
        $widget_ops = array( 'classname' => 'newsletter_widget', 'description' => esc_html__( 'Widget display NewsLetter Subscribe form it support Mailchimp and feedburner !','enar') );
        parent::__construct( 'newsletter_widget', esc_html__( 'Enar - NewsLetter','enar'), $widget_ops);
    }
	
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title' => '', 
			'message' => '', 
			'newsletter_type' => '', 
			'chimp_api_key' => '', 
			'chimp_mail_list' => '', 
			'feedburner_name' => '', 
		));
		
		$title = esc_attr($instance['title']);
		$message = esc_attr($instance['message']);
		
		$newsletter_type = esc_attr($instance['newsletter_type']);
		
		$chimp_api_key = esc_attr($instance['chimp_api_key']);
		$chimp_mail_list = esc_attr($instance['chimp_mail_list']);
		
		$feedburner_name = esc_attr($instance['feedburner_name']);
		
		?>	
            <script>
				jQuery(document).ready(function($) {
					$('#<?php echo esc_js($this->get_field_id( 'newsletter_type' )); ?>').each(function(index, element) {
						var newsletter_type = (this);
						var value = $(this).val();
						
						if( value == 'mailchimp'){
							$('.chimp_api_key_con').show();
							$('.feedburner_name_con').hide();
						}else{
							$('.chimp_api_key_con').hide();
							$('.feedburner_name_con').show();
						}
						
                        $(newsletter_type).on('change', function(){
							var dynamic_value = $(this).val();
							if( dynamic_value == 'mailchimp'){
								$('.chimp_api_key_con').show();
								$('.feedburner_name_con').hide();
							}else{
								$('.chimp_api_key_con').hide();
								$('.feedburner_name_con').show();
							}
					
						});
                    });
				});
			</script>
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title :', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p> 
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'message' )); ?>"><?php esc_html_e( 'Message:', 'enar') ?></label>
                <textarea rows="3" cols="20" class="widefat" name="<?php echo esc_attr($this->get_field_name('message')); ?>" id="<?php echo esc_attr($this->get_field_id('message')); ?>"><?php echo esc_attr($message); ?></textarea>
            </p>  
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'newsletter_type' )); ?>"><?php esc_html_e( 'Maillist Type:', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'newsletter_type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'newsletter_type' )); ?>" class="widefat">
                    <option value="mailchimp" <?php if ( 'mailchimp' == $instance['newsletter_type'] ) echo 'selected="selected"'; ?>>MailChimp</option>
                    <?php /*?><option value="feedburner" <?php if ( 'feedburner' == $instance['newsletter_type'] ) echo 'selected="selected"'; ?>>FeedBurner</option><?php */?>
                </select>
            </p> 
             
            <p class="chimp_api_key_con">
                <label for="<?php echo esc_attr($this->get_field_id('chimp_api_key')); ?>"><?php esc_html_e( 'Mailchimp API Key:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('chimp_api_key')); ?>" name="<?php echo esc_attr($this->get_field_name('chimp_api_key')); ?>" type="text" value="<?php echo esc_attr($chimp_api_key); ?>" />
            </p>   
              
            <p class="chimp_api_key_con">
                <label for="<?php echo esc_attr($this->get_field_id('chimp_mail_list')); ?>"><?php esc_html_e( 'Subscribe List:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('chimp_mail_list')); ?>" name="<?php echo esc_attr($this->get_field_name('chimp_mail_list')); ?>" type="text" value="<?php echo esc_attr($chimp_mail_list); ?>" />
            </p>
            
            <p style="display:none" class="feedburner_name_con">
                <label for="<?php echo esc_attr($this->get_field_id( 'feedburner_name' )); ?>"><?php esc_html_e( 'FeedBurner Name: ( Without http://feeds.feedburner.com/ ) ', 'enar'); ?></label>
                <input type="text" id="<?php echo esc_attr($this->get_field_id( 'feedburner_name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feedburner_name' )); ?>" value="<?php echo esc_attr($instance['feedburner_name']); ?>" class="widefat" />
            </p>
            
    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = $new_instance['message'];
		
		$instance['newsletter_type'] = $new_instance['newsletter_type'];
		
		$instance['chimp_api_key'] = $new_instance['chimp_api_key'];
		$instance['chimp_mail_list'] = $new_instance['chimp_mail_list'];
		
		$instance['feedburner_name'] = $new_instance['feedburner_name'];
		
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$message = $instance['message'];

        $newsletter_type = $instance['newsletter_type'];
		
		$chimp_api_key = $instance['chimp_api_key'];
		$chimp_mail_list = $instance['chimp_mail_list'];
		
		$feedburner_name = $instance['feedburner_name'];
		
		if ( empty($title) ) $title = false;
		
		echo $before_widget;
       
			if ( $title ) echo $before_title . $title . $after_title;
			
			if( $newsletter_type == 'mailchimp' ) {
				echo '<span class="footer_desc">'.esc_html($message).'</span>';
				
				?>
                <form id="newsletter_form" class="newsletter_form" action="<?php echo ( get_template_directory_uri() . '/inc/mailchimp/subscribe.php'); ?>" method="post">
                    <div class="newsletter_con">
                        <input class="subscribe-mail" name="subscribe-mail" id="subscribe-mail" type="email" placeholder="Your Email Here ..." required>
                        <button type="submit" name="submit" class="newsletter_button">
                            <i class="subscribe_true ico-check3"></i>
                            <i class="subscribe_btn ico-send-o"></i>
                            <i class="refresh_loader ico-refresh4"></i>
                        </button>
                    </div>
                    <div id="subscribe_output"></div>
                </form>
                <?php
			}else{
				
			}
	    	
		
		echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'idealtheme_load_newsletter_widget' );
function idealtheme_load_newsletter_widget() {
    register_widget('idealtheme_newsletter_widget');
}
?>