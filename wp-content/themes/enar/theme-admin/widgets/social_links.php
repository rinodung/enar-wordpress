<?php
class idealtheme_social_links extends WP_Widget {
 
    function idealtheme_social_links() {     
        $widget_ops = array( 'classname' => 'social_links_widget', 'description' => esc_html__( 'Show your favorite social_links photos!','enar') );
        parent::__construct( 'social_links_widget', esc_html__( 'Enar - Social Links','enar'), $widget_ops);
    }
	
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title' => 'Social Media', 
			'target' => '_blank', 
			'style' => 'circle_socials',
			'color_mode' => 'simple_socials',
			
			'rss' => '',
			'facebook' => '',
			'twitter' => '',
			'dribbble' => '',
			'google_plus' => '',
			'linkedin' => '',
			'blogger' => '',
			'tumblr' => '',
			'reddit' => '',
			'yahoo' => '',
			'deviantart' => '',
			'vimeo' => '',
			'youtube' => '',
			'pinterest' => '',
			'digg' => '',
			'flickr' => '',
			'forrst' => '',
			'skype' => '',
			'instagram' => '',
			'paypal' => '',
			'dropbox' => '',
			'soundcloud' => '',
			
			//'myspace' => '',
			//'vk' => '',
		));
		
		$title = esc_attr($instance['title']);
		$target = esc_attr($instance['target']);
		$style = esc_attr($instance['style']);
		$color_mode = esc_attr($instance['color_mode']);
		
		$rss = esc_attr($instance['rss']);
		$facebook = esc_attr($instance['facebook']);
		$twitter = esc_attr($instance['twitter']);
		$dribbble = esc_attr($instance['dribbble']);
		$google_plus = esc_attr($instance['google_plus']);
		$linkedin = esc_attr($instance['linkedin']);
		$blogger = esc_attr($instance['blogger']);
		$tumblr = esc_attr($instance['tumblr']);
		$reddit = esc_attr($instance['reddit']);
		$yahoo = esc_attr($instance['yahoo']);
		$deviantart = esc_attr($instance['deviantart']);
		$vimeo = esc_attr($instance['vimeo']);
		$youtube = esc_attr($instance['youtube']);
		$pinterest = esc_attr($instance['pinterest']);
		$digg = esc_attr($instance['digg']);
		$flickr = esc_attr($instance['flickr']);
		$forrst = esc_attr($instance['forrst']);
		$skype = esc_attr($instance['skype']);
		$instagram = esc_attr($instance['instagram']);
		$paypal = esc_attr($instance['paypal']);
		$dropbox = esc_attr($instance['dropbox']);
		$soundcloud = esc_attr($instance['soundcloud']);
		
		//$myspace = esc_attr($instance['myspace']);
		//$vk = esc_attr($instance['vk']);
		
		?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title :', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'target' )); ?>"><?php esc_html_e( 'Link Target:', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'target' )); ?>" class="widefat">
                    <option value="_blank" <?php if ( '_blank' == $instance['target'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Open In New Window', 'enar'); ?></option>
                    <option value="_self" <?php if ( '_self' == $instance['target'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Open In Same Window', 'enar'); ?></option>
                </select>
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php esc_html_e( 'Icons Style:', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" class="widefat">
                    <option value="circle_socials" <?php if ( 'circle_socials' == $instance['style'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Circle Style', 'enar'); ?></option>
                    <option value="default_socials" <?php if ( 'default_socials' == $instance['style'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Box Style', 'enar'); ?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'color_mode' )); ?>"><?php esc_html_e( 'Icons Color Mode:', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'color_mode' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'color_mode' )); ?>" class="widefat">
                    <option value="simple_socials" <?php if ( 'simple_socials' == $instance['color_mode'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Simple', 'enar'); ?></option>
                    <option value="colored_socials" <?php if ( 'colored_socials' == $instance['color_mode'] ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Colored', 'enar'); ?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>"><?php esc_html_e( 'RSS Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_attr($rss); ?>" />
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
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('blogger')); ?>"><?php esc_html_e( 'Blogger Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('blogger')); ?>" name="<?php echo esc_attr($this->get_field_name('blogger')); ?>" type="text" value="<?php echo esc_attr($blogger); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e( 'Tumblr Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('reddit')); ?>"><?php esc_html_e( 'Reddit Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('reddit')); ?>" name="<?php echo esc_attr($this->get_field_name('reddit')); ?>" type="text" value="<?php echo esc_attr($reddit); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('yahoo')); ?>"><?php esc_html_e( 'Yahoo Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('yahoo')); ?>" name="<?php echo esc_attr($this->get_field_name('yahoo')); ?>" type="text" value="<?php echo esc_attr($yahoo); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('deviantart')); ?>"><?php esc_html_e( 'Deviantart Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('deviantart')); ?>" name="<?php echo esc_attr($this->get_field_name('deviantart')); ?>" type="text" value="<?php echo esc_attr($deviantart); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php esc_html_e( 'Vimeo Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e( 'YouTube Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e( 'Pinterest Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('digg')); ?>"><?php esc_html_e( 'Digg Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('digg')); ?>" name="<?php echo esc_attr($this->get_field_name('digg')); ?>" type="text" value="<?php echo esc_attr($digg); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>"><?php esc_html_e( 'Flickr Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('forrst')); ?>"><?php esc_html_e( 'Forrst Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('forrst')); ?>" name="<?php echo esc_attr($this->get_field_name('forrst')); ?>" type="text" value="<?php echo esc_attr($forrst); ?>" />
            </p> 
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('skype')); ?>"><?php esc_html_e( 'Skype Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('skype')); ?>" name="<?php echo esc_attr($this->get_field_name('skype')); ?>" type="text" value="<?php echo esc_attr($skype); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e( 'Instagram Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('paypal')); ?>"><?php esc_html_e( 'PayPal Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('paypal')); ?>" name="<?php echo esc_attr($this->get_field_name('paypal')); ?>" type="text" value="<?php echo esc_attr($paypal); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('dropbox')); ?>"><?php esc_html_e( 'Dropbox Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dropbox')); ?>" name="<?php echo esc_attr($this->get_field_name('dropbox')); ?>" type="text" value="<?php echo esc_attr($dropbox); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>"><?php esc_html_e( 'Soundcloud Link:', 'enar'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>" name="<?php echo esc_attr($this->get_field_name('soundcloud')); ?>" type="text" value="<?php echo esc_attr($soundcloud); ?>" />
            </p> 
            
    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['target'] = $new_instance['target'];
		$instance['style'] = $new_instance['style'];
		$instance['color_mode'] = $new_instance['color_mode'];
		
		$instance['rss'] = $new_instance['rss'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['dribbble'] = $new_instance['dribbble'];
		$instance['google_plus'] = $new_instance['google_plus'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['blogger'] = $new_instance['blogger'];
		$instance['tumblr'] = $new_instance['tumblr'];
		$instance['reddit'] = $new_instance['reddit'];
		$instance['yahoo'] = $new_instance['yahoo'];
		$instance['deviantart'] = $new_instance['deviantart'];
		$instance['vimeo'] = $new_instance['vimeo'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['digg'] = $new_instance['digg'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['forrst'] = $new_instance['forrst'];
		$instance['skype'] = $new_instance['skype'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['paypal'] = $new_instance['paypal'];
		$instance['dropbox'] = $new_instance['dropbox'];
		$instance['soundcloud'] = $new_instance['soundcloud'];
		
		/*$instance['myspace'] = $new_instance['myspace'];
        $instance['vk'] = $new_instance['vk'];*/
		
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		$target = $instance['target'];
		$style = $instance['style'];
		$color_mode = $instance['color_mode'];
		
		$rss = $instance['rss'];
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$dribbble = $instance['dribbble'];
		$google_plus = $instance['google_plus'];
		$linkedin = $instance['linkedin'];
		$blogger = $instance['blogger'];
		$tumblr = $instance['tumblr'];
		$reddit = $instance['reddit'];
		$yahoo = $instance['yahoo'];
		$deviantart = $instance['deviantart'];
		$vimeo = $instance['vimeo'];
		$youtube = $instance['youtube'];
		$pinterest = $instance['pinterest'];
		$digg = $instance['digg'];
		$flickr = $instance['flickr'];
		$forrst = $instance['forrst'];
		$skype = $instance['skype'];
		$instagram = $instance['instagram'];
		$paypal = $instance['paypal'];
		$dropbox = $instance['dropbox'];
		$soundcloud = $instance['soundcloud'];
		
		/*$myspace = $instance['myspace'];
		$vk = $instance['vk'];*/
		
		if ( empty($title) ) $title = false;
		
		echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title;

		echo '<div class="social_links_widget clearfix '.esc_attr($style).' '.esc_attr($color_mode).'">';
		
if ( $rss !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($rss).'" class="rss"><i class="ico-rss"></i></a>';
if ( $facebook !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($facebook).'" class="facebook"><i class="ico-facebook4"></i></a>';
if ( $twitter !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($twitter).'" class="twitter"><i class="ico-twitter4"></i></a>';
if ( $dribbble !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($dribbble).'" class="dribble"><i class="ico-dribbble"></i></a>';
if ( $google_plus !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($google_plus).'" class="googleplus"><i class="ico-google-plus"></i></a>';
if ( $linkedin !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($linkedin).'" class="linkedin"><i class="ico-linkedin3"></i></a>';
if ( $blogger !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($blogger).'" class="blogger"><i class="ico-blogger"></i></a>';
if ( $tumblr !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($tumblr).'" class="tumblr"><i class="ico-tumblr"></i></a>';
if ( $reddit !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($reddit).'" class="reddit"><i class="ico-reddit"></i></a>';
if ( $yahoo !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($yahoo).'" class="yahoo"><i class="ico-yahoo"></i></a>';
if ( $deviantart !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($deviantart).'" class="deviantart"><i class="ico-deviantart"></i></a>';
if ( $vimeo !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($vimeo).'" class="vimeo"><i class="ico-vimeo"></i></a>';
if ( $youtube !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($youtube).'" class="youtube"><i class="ico-youtube3"></i></a>';
if ( $pinterest !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($pinterest).'" class="pinterest"><i class="ico-pinterest-p"></i></a>';
if ( $digg !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($digg).'" class="digg"><i class="ico-digg"></i></a>';
if ( $flickr !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($flickr).'" class="flickr"><i class="ico-flickr2"></i></a>';
if ( $forrst !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($forrst).'" class="forrst"><i class="ico-forrst"></i></a>';
if ( $skype !== '' ) echo '<a target="'.esc_attr($target).'" href="skype:'.esc_attr($skype).'?call" class="skype"><i class="ico-skype2"></i></a>';
if ( $instagram !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($instagram).'" class="instagram"><i class="ico-instagram3"></i></a>';
if ( $paypal !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($paypal).'" class="paypal"><i class="ico-paypal"></i></a>';
if ( $dropbox !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($dropbox).'" class="dropbox"><i class="ico-dropbox"></i></a>';
if ( $soundcloud !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_url($soundcloud).'" class="soundcloud"><i class="ico-soundcloud"></i></a>';

/*if ( $myspace !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_attr($myspace).'" class="facebook"><i class="ico-facebook4"></i></a>';
if ( $vk !== '' ) echo '<a target="'.esc_attr($target).'" href="'.esc_attr($vk).'" class="facebook"><i class="ico-facebook4"></i></a>';*/
		  
        echo '</div>';
		echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'idealtheme_load_social_links' );
function idealtheme_load_social_links() {
    register_widget('idealtheme_social_links');
}
?>