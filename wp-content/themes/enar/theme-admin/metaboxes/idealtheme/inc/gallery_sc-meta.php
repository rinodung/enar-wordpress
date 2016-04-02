<?php 
global $post;
global $wpalchemy_media_access;
?>
<style>.wp-editor-wrap, #post-status-info{display:none;}</style>
<!--tabs_con-->
<h4><?php esc_html_e( 'Shortcode:', 'enar'); ?></h4>
<?php $mb->the_field('slider_type'); ?> 
<?php 
	// owl_slider - owl_png - owl_text - owl_gall - flex - camera - wobbly - scattered - four_boxes_effect
	if (!is_array($mb->meta)) {
		$mb->meta = array ( "slider_type" => "owl_slider" );
	}
?>
<div class="shortcode_output clearfix">
	<span>[hm_sliders type="<span class="type_con"><?php echo $mb->meta['slider_type']; ?></span>" id="<?php echo $post->ID; ?>"]</span>
</div>

<h4><?php esc_html_e( 'Slider Type:', 'enar'); ?></h4>

<div class="tabs_con hm_gall_con">
    
    <ul id="tab-menu" class="clearfix">
        
        <li class="slider_tab<?php echo $mb->is_value('owl_slider')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="owl_slider"<?php echo $mb->is_value('owl_slider')?' checked="checked"':''; ?>/>
            <a href="owl_slider_tab"><span><?php esc_html_e( 'Default', 'enar') ?></span></a>
        </li>
        <li class="slider_tab<?php echo $mb->is_value('owl_png')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="owl_png"<?php echo $mb->is_value('owl_png')?' checked="checked"':''; ?>/>
            <a href="owl_png_tab"><span><?php esc_html_e( 'PNG', 'enar') ?></span></a>
        </li>
        <li class="slider_tab<?php echo $mb->is_value('owl_text')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="owl_text"<?php echo $mb->is_value('owl_text')?' checked="checked"':''; ?>/>
            <a href="owl_text_tab"><span><?php esc_html_e( 'Text', 'enar') ?></span></a>
        </li>
        <li class="slider_tab<?php echo $mb->is_value('owl_gall')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="owl_gall"<?php echo $mb->is_value('owl_gall')?' checked="checked"':''; ?>/>
            <a href="owl_gall_tab"><span><?php esc_html_e( 'Gallery', 'enar') ?></span></a>
        </li>
        <li class="slider_tab<?php echo $mb->is_value('flex')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="flex"<?php echo $mb->is_value('flex')?' checked="checked"':''; ?>/>
            <a href="flex_tab"><span><?php esc_html_e( 'Flex', 'enar') ?></span></a>
        </li>
        <li class="slider_tab<?php echo $mb->is_value('camera')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="camera"<?php echo $mb->is_value('camera')?' checked="checked"':''; ?>/>
            <a href="camera_tab"><span><?php esc_html_e( 'Camera', 'enar') ?></span></a>
        </li>
        <li class="slider_tab<?php echo $mb->is_value('wobbly')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="wobbly"<?php echo $mb->is_value('wobbly')?' checked="checked"':''; ?>/>
            <a href="wobbly_tab"><span><?php esc_html_e( 'Wobbly', 'enar') ?></span></a>
        </li>
        <!--<li class="slider_tab<?php echo $mb->is_value('scattered')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="scattered"<?php echo $mb->is_value('scattered')?' checked="checked"':''; ?>/>
            <a href="scattered_tab"><span><?php esc_html_e( 'Scattered', 'enar') ?></span></a>
        </li>
        <li class="slider_tab<?php echo $mb->is_value('four_boxes_effect')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="four_boxes_effect"<?php echo $mb->is_value('four_boxes_effect')?' checked="checked"':''; ?>/>
            <a href="four_boxes_effect_tab"><span><?php esc_html_e( '4 Boxes', 'enar') ?></span></a>
        </li>-->
    </ul>
    <div class="clear"></div>
    
    <!--================================-->
    <?php 
		
		if( $mb->is_value('owl_slider')){ 
			echo '<style>.hm_row1, .hm_row2, .hm_row3, .hm_row4, .hm_row5, .hm_row6, .hm_row7, .owl_slider_opt{display:block}.hm_row8, .hm_row9, .hm_row10, #idealtheme_sliders_setting .inside .rwmb-meta-box > div:not(.owl_slider_opt){display:none}</style>'; 
			
		}else if( $mb->is_value('owl_png')){ 
			echo '<style>.hm_row1, .hm_row8, .hm_row9, .owl_slider_opt{display:block}.hm_row2, .hm_row3, .hm_row4, .hm_row5, .hm_row6, .hm_row7, .hm_row10, #idealtheme_sliders_setting .inside .rwmb-meta-box > div:not(.owl_slider_opt){display:none}</style>'; 
			
		}else if( $mb->is_value('owl_text')){ 
			echo '<style>.hm_row2, .hm_row4, .hm_row5, .hm_row6, .hm_row7, .owl_slider_opt{display:block}.hm_row1, .hm_row3, .hm_row8, .hm_row9, .hm_row10, #idealtheme_sliders_setting .inside .rwmb-meta-box > div:not(.owl_slider_opt){display:none}</style>'; 
			
		}else if( $mb->is_value('owl_gall')){ 
			echo '<style>.hm_row1, .hm_row2, .hm_row4, .owl_slider_opt{display:block}.hm_row3, .hm_row5, .hm_row6, .hm_row7, .hm_row8, .hm_row9, .hm_row10, #idealtheme_sliders_setting .inside .rwmb-meta-box > div:not(.owl_slider_opt){display:none}</style>'; 
			
		}else if( $mb->is_value('flex')){ 
			echo '<style>.hm_row1, .hm_row2, .hm_row3, .hm_row4, .hm_row5, .hm_row6, .hm_row7, .flex_slider_opt{display:block}.hm_row8, .hm_row9, .hm_row10, #idealtheme_sliders_setting .inside .rwmb-meta-box > div:not(.flex_slider_opt){display:none}</style>';  
			
		}else if( $mb->is_value('camera')){ 
			echo '<style>.hm_row1, .hm_row2, .hm_row4, .hm_row5, .hm_row6, .hm_row7, .camera_slider_opt{display:block}.hm_row3, .hm_row8, .hm_row9, .hm_row10, #idealtheme_sliders_setting .inside .rwmb-meta-box > div:not(.camera_slider_opt){display:none}</style>';
			
		}else if( $mb->is_value('wobbly')){ 
			echo '<style>.hm_row1, .hm_row2, .hm_row4, .hm_row5, .hm_row6, .hm_row7, .hm_row10, .wobbly_slider_opt{display:block}.hm_row3, .hm_row8, .hm_row9, #idealtheme_sliders_setting .inside .rwmb-meta-box > div:not(.wobbly_slider_opt){display:none}</style>'; 
			
		}else if( $mb->is_value('scattered')){ 
			echo '<style>.hm_row1, .hm_row2, .hm_row4, .hm_row8, .hm_row9, .scattered_slider_opt{display:block}.hm_row3, .hm_row5, .hm_row6, .hm_row7, .hm_row10, #idealtheme_sliders_setting .inside .rwmb-meta-box > div:not(.scattered_slider_opt){display:none}</style>'; 
			
		}else if( $mb->is_value('four_boxes_effect')){ 
			echo '<style>.hm_row1, .hm_row2, .hm_row4, .hm_row5, .hm_row6, .hm_row7{display:block}.hm_row3, .hm_row8, .hm_row9, .hm_row10{display:none}</style>'; 
			
		}
	?>
    <div class="portfolio_meta_con" style="display:block">
	<?php while($mb->have_fields_and_multi('gallery_sc')): ?>
    <?php $mb->the_group_open(); ?>
 	<div class="gallery_sc_meta_block_container">
        <i class="shandle"></i>
        <a href="#" class="dodelete button"><?php esc_html_e( 'Delete', 'enar') ?></a>
           
        <div class="hm_row1 have_button hm_slider_row owl_slider_tab owl_png_tab owl_gall_tab flex_tab camera_tab wobbly_tab scattered_tab four_boxes_effect_tab">
        
            <?php $mb->the_field('imgid'); ?>
            <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Choose Image', 'enar') ?></label>
            <?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Insert'); ?>
        
            <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'class' => 'hamdan_mb_image_img_id', 'type' => 'hidden')); ?>
            <?php echo $wpalchemy_media_access->getButton(); ?>
 			<span class="hamdan_gallery_img_src"><img class="get_img_url" alt="" /></span>
            
       		<?php $mb->the_field('img_src'); ?>
			<input type="hidden" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="hamdan_img_src_input" style="visibility: hidden; position: absolute;">
		</div>
        
        <?php $mb->the_field('bg_color'); ?>
            <div class="hm_row10 hm_slider_row wobbly_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Background Color', 'enar') ?></label>
                <div>
                    <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="idealtheme_color_picker" />
                </div>
            </div>
            
        <?php $mb->the_field('title'); ?>
            <div class="hm_row2 hm_slider_row owl_slider_tab owl_text_tab owl_gall_tab flex_tab camera_tab wobbly_tab scattered_tab four_boxes_effect_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Title', 'enar') ?></label>
                <div>
                    <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                </div>
            </div>
            
        <?php $mb->the_field('title_b'); ?>
            <div class="hm_row3 hm_slider_row owl_slider_tab flex_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Title 2', 'enar') ?></label>
                <div class="owl_slider_tab">
                    <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                </div>
            </div>
            
        <?php $mb->the_field('img_caption'); ?>
        	<div class="hm_row4 hm_slider_row owl_slider_tab owl_text_tab owl_gall_tab flex_tab camera_tab wobbly_tab scattered_tab four_boxes_effect_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Description', 'enar') ?></label>
                <div>
                    <textarea id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" placeholder="<?php esc_html_e( 'Slide description text...', 'enar') ?>"><?php $mb->the_value(); ?></textarea>
                </div>
        	</div>
            
        <?php $mb->the_field('button'); ?>
        	<div class="hm_row5 hm_slider_row owl_slider_tab owl_text_tab flex_tab camera_tab wobbly_tab four_boxes_effect_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Button Text', 'enar') ?></label>
                <div>
                    <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="<?php esc_html_e( 'The button text, Example: Read More...', 'enar') ?>" />
                </div>
        	</div>
            
	    <?php $mb->the_field('url'); ?>
        	<div class="hm_row6 hm_slider_row owl_slider_tab owl_text_tab flex_tab camera_tab wobbly_tab four_boxes_effect_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Button URL', 'enar') ?></label>
                <div>
                    <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="<?php esc_html_e( 'Navigate to this link when click on the button...', 'enar') ?>" />
                </div>
        	</div>
             
        <?php $mb->the_field('target'); ?>
        	<div class="hm_row7 hm_slider_row owl_slider_tab owl_text_tab flex_tab camera_tab wobbly_tab four_boxes_effect_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Open Link In', 'enar') ?></label>
                <div>
                    <div class="hm_select_con">
                        <span class="hm_select_arrow"><i class="ico-keyboard-arrow-down"></i></span>
                        <select name="<?php $mb->the_name(); ?>">
                            <option value=""<?php $mb->the_select_state(''); ?>><?php esc_html_e( 'Same Window', 'enar'); ?></option>
                            <option value="_blank"<?php $mb->the_select_state('_blank'); ?>><?php esc_html_e( 'New Window', 'enar'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            
         <?php $mb->the_field('image_url'); ?>
        	<div class="hm_row8 hm_slider_row owl_png_tab scattered_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Image URL', 'enar') ?></label>
                <div>
                    <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="<?php esc_html_e( 'Navigate to this link when click on the image...', 'enar') ?>" />
                </div>
        	</div>
             
        <?php $mb->the_field('image_target'); ?>
        	<div class="hm_row9 hm_slider_row owl_png_tab scattered_tab">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Open Image Link In', 'enar') ?></label>
                <div>
                    <div class="hm_select_con">
                        <span class="hm_select_arrow"><i class="ico-keyboard-arrow-down"></i></span>
                        <select name="<?php $mb->the_name(); ?>">
                            <option value=""<?php $mb->the_select_state(''); ?>><?php esc_html_e( 'Same Window', 'enar'); ?></option>
                            <option value="_blank"<?php $mb->the_select_state('_blank'); ?>><?php esc_html_e( 'New Window', 'enar'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
	</div>
    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
    
        <p style="margin-bottom:15px;" class="take_meta_repeat clearfix">
            <a href="#" class="docopy-gallery_sc copy_bt button">
                <span><?php esc_html_e( 'Add New Slide', 'enar') ?></span>
                <!--<i class="ab-icon"></i>-->
            </a>
        </p>
    </div>
    
    <!--================================-->    
    
</div>
<!--End tabs_con-->

<script type="text/javascript">
jQuery(function($) {
	$('#wpa_loop-gallery_sc').sortable({
		placeholder: "port-state-highlight",
		handle: ".shandle"
	});
        
});
//]]>
</script>