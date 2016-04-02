<?php
/**
 * Radio field class.
 */
class RWMB_Radio_Field extends RWMB_Input_Field
{
	/**
	 * Enqueue scripts and styles
	 *
	 * @return void
	 */
	static function admin_enqueue_scripts()
	{
		wp_enqueue_style( 'rwmb-radio-css', RWMB_CSS_URL . 'radio.css', array(), RWMB_VER );
	}
	
	/**
	 * Get field HTML
	 *
	 * @param mixed $meta
	 * @param array $field
	 *
	 * @return string
	 */
	static function html( $meta, $field )
	{
		$html = array();
        
		$tpl = '<div class="radio_style"><span class="radioo"><input %s %s><label><i class="dashicons dashicons-yes"></i></label></span><span>%s</span><div class="clear"></div></div>';
		
		foreach ( $field['options'] as $value => $label )
		{
			$attributes = self::get_attributes( $field, $value );
			$html[]     = sprintf(
				$tpl,
				self::render_attributes( $attributes ),
				checked( $value, $meta, false ),
				$label
			);
		}

		return implode( ' ', $html );
	}

	/**
	 * Get the attributes for a field
	 *
	 * @param array $field
	 * @param mixed $value
	 *
	 * @return array
	 */
	static function get_attributes( $field, $value = null )
	{
		$attributes         = parent::get_attributes( $field, $value );
		$attributes['list'] = false;
		$attributes['id']   = false;
		$attributes['type'] = 'radio';

		return $attributes;
	}

	/**
	 * Output the field value
	 * Display option name instead of option value
	 *
	 * @use self::meta()
	 *
	 * @param  array    $field   Field parameters
	 * @param  array    $args    Additional arguments. Rarely used. See specific fields for details
	 * @param  int|null $post_id Post ID. null for current post. Optional.
	 *
	 * @return mixed Field value
	 */
	static function the_value( $field, $args = array(), $post_id = null )
	{
		$value = parent::get_value( $field, $args, $post_id );
		return empty( $value ) ? '' : $field['options'][$value];
	}
}