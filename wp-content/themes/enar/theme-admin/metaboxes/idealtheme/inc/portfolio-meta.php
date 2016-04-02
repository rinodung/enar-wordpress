<?php global $wpalchemy_media_access; ?>
<!--tabs_con-->
<div class="shortcode_output clearfix">
	<span>[hm_project_media]</span>
</div>
<p class="description"><?php esc_html_e( 'Copy the shortcode text above, and paste it any plae in the text editor.', 'enar'); ?></p>

<div class="tabs_con">

    <?php $mb->the_field('content_type'); ?>    
    <ul id="tab-menu" class="clearfix">
        <?php 
		                                          $what_is_type = '';
				  if( $mb->is_value('gallery')){  $what_is_type = 'gallery_val';
			}else if( $mb->is_value('video')){    $what_is_type = 'video_val';
			}else if( $mb->is_value('audio')){    $what_is_type = 'audio_val';
			}
		
			if (!is_array($mb->meta)) {
				$mb->meta = array ( "content_type" => "image" );
			}
		?>
        <li class="slider_tab<?php echo $mb->is_value('image')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="image"<?php echo $mb->is_value('image')?' checked="checked"':''; ?>/>
            <a href="image_tab"><span><?php esc_html_e( 'Image', 'enar') ?></span></a>
        </li>
        <li class="slider_tab<?php echo $mb->is_value('gallery')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="gallery"<?php echo $mb->is_value('gallery')?' checked="checked"':''; ?>/>
        	<a href="slider_tab"><span><?php esc_html_e( 'Gallery', 'enar') ?></span></a>
        </li>
        <li class="video_tab<?php echo $mb->is_value('video')? ' active_tab_li':''; ?>">
        	<input type="radio" name="<?php $mb->the_name(); ?>" value="video"<?php echo $mb->is_value('video')?' checked="checked"':''; ?>/>
        	<a href="video_tab"><span><?php esc_html_e( 'Video', 'enar') ?></span></a>
        </li>
        <li class="audio_tab<?php echo $mb->is_value('audio')? ' active_tab_li':''; ?>">
            <input type="radio" name="<?php $mb->the_name(); ?>" value="audio"<?php echo $mb->is_value('audio')?' checked="checked"':''; ?>/>
        	<a href="audio_tab"><span><?php esc_html_e( 'Audio', 'enar') ?></span></a>
        </li>
    </ul>
    <div class="clear"></div>
    
    <!--================================-->
    <div class="portfolio_meta_con active_meta_tab post_gall_con slider_tab" <?php if( $what_is_type == 'gallery_val'){ echo 'style="display: block"';}else{ echo 'style="display: none"';} ?>>
        <!-- gall -->
        <?php while($mb->have_fields_and_multi('portfolio_gallery')): ?>
        <?php $mb->the_group_open(); ?>
        <div class="portfolio_gallery_meta_block_container">
            <i class="shandle"></i>
            <a href="#" class="dodelete button"><?php esc_html_e( 'Delete', 'enar') ?></a>
                    
            <?php $mb->the_field('imgid'); ?>
            <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Choose Image', 'enar') ?></label>
            
            <?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Insert'); ?>
            <div class="have_button">
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
                        <textarea id="<?php $mb->the_name(); ?>" rows="7" placeholder="<?php esc_html_e( 'Slide description text...', 'enar') ?>" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
                    </div>
            	</div>
        </div>
        <?php $mb->the_group_close(); ?>
        <?php endwhile; ?>
        
        <p style="margin-bottom:15px;" class="take_meta_repeat clearfix">
            <a href="#" class="docopy-portfolio_gallery copy_bt button">
                <span><?php esc_html_e( 'Add New Slide', 'enar') ?></span>
                <!--<i class="ab-icon"></i>-->
            </a>
        </p>
        <!-- end gall -->
    </div>
    
    <!--================================-->
    
    <div class="portfolio_meta_con video_tab" <?php if( $what_is_type == 'video_val'){ echo 'style="display: block"';}else{ echo 'style="display: none"';} ?>>
    	<div class="meta_block_container">
			<?php $mb->the_field('video_embedded'); ?>
            <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Embed iframe', 'enar') ?></label>
            <textarea type="text" class="embeded_text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
            <span class="description" style="margin-left:117px;"><?php esc_html_e( 'Include the embedded iframe From Youtube or Vimeo', 'enar') ?></span>
        </div>
    </div>
    
    <!--================================-->
    <div class="portfolio_meta_con audio_tab" <?php if( $what_is_type == 'audio_val'){ echo 'style="display: block"';}else{ echo 'style="display: none"';} ?>>
    	<div class="meta_block_container">
			<?php $mb->the_field('audio_embedded'); ?>
            <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'soundcloud', 'enar') ?></label>
            <textarea type="text" class="embeded_text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
            <span class="description" style="margin-left:117px;"><?php esc_html_e( 'Include the embedded iframe', 'enar') ?></span>
        </div>
    </div>
    
    <!--================================-->
    
</div>
<!--End tabs_con-->

<script type="text/javascript">
jQuery(function($) {
	$('#wpa_loop-portfolio_gallery').sortable({
		handle: ".shandle"
	});
        
});
//]]>
</script>