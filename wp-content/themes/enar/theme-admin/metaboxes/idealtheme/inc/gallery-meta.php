<?php 
global $post;
global $wpalchemy_media_access; 

$format = get_post_format( $post->ID );

if( $format == 'gallery'){ 
	echo '<style>#gallery_custom_meta_metabox{display:block}</style>';
}

?>
<!--tabs_con-->
<div class="tabs_con">
    <br/>
    <!--================================-->
    <div class="portfolio_meta_con active_meta_tab post_gall_con" id="slider_tab">
	<?php while($mb->have_fields_and_multi('gallery')): ?>
    <?php $mb->the_group_open(); ?>
 	<div class="gallery_meta_block_container">
        <i class="shandle"></i>
        <a href="#" class="dodelete button"><?php esc_html_e( 'Delete', 'enar') ?></a>
                
        <div class="have_button">
            <?php $mb->the_field('imgid'); ?>
            <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Choose Image', 'enar') ?></label>
            <?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Insert'); ?>
        
            <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'class' => 'hamdan_mb_image_img_id', 'type' => 'hidden')); ?>
            <?php echo $wpalchemy_media_access->getButton(); ?>
 			<span class="hamdan_gallery_img_src"><img class="get_img_url" alt="" /></span>
            
       		<?php $mb->the_field('img_src'); ?>
			<input type="hidden" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="hamdan_img_src_input" style="visibility: hidden; position: absolute;">
		</div>
 
        <?php $mb->the_field('img_caption'); ?>
        	<div class="hm_slider_row">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Description', 'enar') ?></label>
                <div>
                    <textarea id="<?php $mb->the_name(); ?>" placeholder="<?php esc_html_e( 'Slide description text...', 'enar') ?>" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
                </div>
        	</div>
            
	    <?php $mb->the_field('url'); ?>
        	<div class="hm_slider_row">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'URL Link', 'enar') ?></label>
                <div>
                    <input type="text" id="<?php $mb->the_name(); ?>" placeholder="<?php esc_html_e( 'Navigate to this link when click on the image...', 'enar') ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                </div>
        	</div>
            
        <?php $mb->the_field('target'); ?>
        	<div class="hm_slider_row">
                <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Link Open In', 'enar') ?></label>
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
            <a href="#" class="docopy-gallery copy_bt button">
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
	$('#wpa_loop-gallery').sortable({
		placeholder: "port-state-highlight",
		handle: ".shandle"
	});
        
});
//]]>
</script>