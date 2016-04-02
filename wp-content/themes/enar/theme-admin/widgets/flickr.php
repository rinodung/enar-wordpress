<?php
class RM_Flickr extends WP_Widget {
 
    function RM_Flickr() {     
        $widget_ops = array( 'classname' => 'flickr_widget', 'description' => esc_html__( 'Show your favorite Flickr photos!','enar') );
        parent::__construct( 'flickr_widget', esc_html__( 'Enar - Flickr','enar'), $widget_ops);
    }
 
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title' => 'Flickr Photos', 'number' => 8, 'flickr_id' => '127240934@N08', 'type' => 'user',
		'display' => 'latest') );
		$title     = esc_attr($instance['title']);
		$flickr_id = esc_attr($instance['flickr_id']);
		$number    = absint($instance['number']);
		$type      = esc_attr($instance['type']);
		$display   = esc_attr($instance['display']);
		
		?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title :', 'enar') ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>"><?php esc_html_e( 'Flickr username:', 'enar') ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" type="text" value="<?php echo esc_attr($flickr_id); ?>" />
 
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e( 'Number of Photos:', 'enar') ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'type' )); ?>"><?php esc_html_e( 'Type : User or Group', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'type' )); ?>" class="widefat">
                    <option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
                    <option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
                </select>
            </p>
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'display' )); ?>"><?php esc_html_e( 'Display : Random or Latest', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'display' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display' )); ?>" class="widefat">
                    <option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
                    <option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
                </select>
            </p>
    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id']= strip_tags( $new_instance['flickr_id'] );
		$instance['number']= $new_instance['number'];
		$instance['type'] = $new_instance['type'];
		$instance['display'] = $new_instance['display'];
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;
		$flickr_id = $instance['flickr_id'];
		$number = absint( $instance['number'] );
		$type = $instance['type'];
	    $display = $instance['display'];
		
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
		echo $before_title . $title . $after_title;
		//http://www.flickr.com/badge_code_v2.gne?count=9&display=latest&size=s&layout=x&source=user&user=127240934@N08
?>
        <div class="flickr_widget_block clearfix">
            
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo esc_attr($number); ?>&amp;display=<?php echo esc_attr($display); ?>&amp;size=m&amp;layout=x&amp;source=<?php echo esc_attr($type); ?>&amp;<?php echo esc_attr($type); ?>=<?php echo esc_attr($flickr_id); ?>"></script>
            
        </div><?php echo $after_widget;		
    }
 
}
 
 
add_action( 'widgets_init', 'rm_load_widgets' );
function rm_load_widgets() {
    register_widget('RM_Flickr');
}
?>