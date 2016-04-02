<?php
class idealtheme_tag_cloud extends WP_Widget {
 
    function idealtheme_tag_cloud() {     
        $widget_ops = array( 'classname' => 'tag_cloud_widget', 'description' => esc_html__( 'A cloud of your most used tags.','enar') );
        parent::__construct( 'tag_cloud_widget', esc_html__( 'Enar - Tag Cloud','enar'), $widget_ops);
    }
 
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'        => 'Tag Cloud', 
			'tags_style'     => '', 
			'taxonomy'    => '', 
			'tags_limit'        => 100,
		));
		
		$title          = esc_attr($instance['title']);
		$tags_style       = esc_attr($instance['tags_style']);		
		$taxonomy      = esc_attr($instance['taxonomy']);
		$tags_limit      = esc_attr($instance['tags_limit']);
		$current_taxonomy = $this->_get_current_taxonomy($instance);
		
		?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title :', 'enar') ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p> 
            
            <?php 
			$tags_style = array(
				'style1'        => 'Sidebar 1', 
				'style2'        => 'Sidebar 2', 
				'style3'        => 'Sidebar 3', 
				'footer_style'        => 'Footer Style',
	        );
			
			?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'tags_style' )); ?>"><?php esc_html_e( 'Tag Clouds Style:', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'tags_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tags_style' )); ?>" class="widefat">
                    
                    <?php foreach ( $tags_style as $key => $styly ) : ?>
					<option value="<?php echo esc_attr($key) ?>" <?php if ( $key == $instance['tags_style'] ) echo 'selected="selected"'; ?>>
						<?php echo esc_attr($styly); ?>
                    </option>
					<?php endforeach; ?>
                    
                </select>
            </p> 
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'taxonomy' )); ?>"><?php esc_html_e( 'Post Type', 'enar') ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'taxonomy' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'taxonomy' )); ?>" class="widefat">
                   <?php foreach ( get_taxonomies() as $taxonomy ) :
						$tax = get_taxonomy($taxonomy);
						if ( !$tax->show_tagcloud || empty($tax->labels->name) )
							continue;
					?>
					<option value="<?php echo esc_attr($taxonomy) ?>" <?php selected($taxonomy, $current_taxonomy) ?>><?php echo esc_attr($tax->labels->name); ?></option>
					<?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('tags_limit')); ?>"><?php esc_html_e( 'Number Of Tags', 'enar') ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tags_limit')); ?>" name="<?php echo esc_attr($this->get_field_name('tags_limit')); ?>" type="text" value="<?php echo esc_attr($tags_limit); ?>" />
            </p>
    	<?php
    }
 
    function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['tags_style']= $new_instance['tags_style'];
		$instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
		$instance['tags_limit'] = stripslashes($new_instance['tags_limit']);
		return $instance;
    }
 
    function widget($args, $instance) {
		extract($args);
		
		$title          = apply_filters('widget_title', $instance['title']); //
		$tags_style       = $instance['tags_style'];		
		$taxonomy      = $instance['taxonomy']; 
		$tags_limit      = $instance['tags_limit']; 
		
		$current_taxonomy = $this->_get_current_taxonomy($instance);
		if ( !empty($instance['title']) ) {
			$title = $instance['title'];
		} else {
			if ( 'post_tag' == $current_taxonomy ) {
				$title = esc_html__( 'Tags', 'enar');
			} else {
				$tax = get_taxonomy($current_taxonomy);
				$title = $tax->labels->name;
			}
		}
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		$style2 = ( $tags_style == 'style2' ) ? 'style2' : '';
		
		echo '<div class="tagcloud hm_tagcloud '.esc_attr($style2).' clearfix">';
		
		$html = '';
		$tags_limit = intval($tags_limit);
		$limit_plus = 0;
		
		if ( $taxonomy == 'post_tag' ){
			$tags = get_tags();
			
			foreach ( $tags as $tag ) {
				
				if ( $tags_limit >= $limit_plus ){
					$tag_link = get_tag_link( $tag->term_id );
					$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
					$html .= "<span class='tag'>{$tag->name}</span>";
					$html .= ( $tags_style == 'style1' || $tags_style == 'style2') ? "<span class='num'>{$tag->count}</span>" : "";
					$html .= "</a>";
				}
				$limit_plus += 1;
			}
			
			echo $html;
		}else{
			$all_categories = get_categories('type=post');
			foreach ( $all_categories as $catt ) {
				if ( $tags_limit >= $limit_plus ){
					$catt_link = get_category_link( $catt->term_id );
					$html .= "<a href='{$catt_link}' title='{$catt->name} Tag' class='{$catt->slug}'>";
					$html .= "<span class='tag'>{$catt->name}</span>";
					$html .= ( $tags_style == 'style1' || $tags_style == 'style2') ? "<span class='num'>{$catt->count}</span>" : "";
					$html .= "</a>";
				}
				$limit_plus += 1;
			}
			echo $html;
		}
		echo '</div>';
		
		echo $args['after_widget'];	
    }
    
	public function _get_current_taxonomy($instance) {
		if ( !empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']) )
			return $instance['taxonomy'];

		return 'post_tag';
	}
}
 
 
add_action( 'widgets_init', 'idealtheme_tag_cloud_widget' );
function idealtheme_tag_cloud_widget() {
    register_widget('idealtheme_tag_cloud');
}
?>