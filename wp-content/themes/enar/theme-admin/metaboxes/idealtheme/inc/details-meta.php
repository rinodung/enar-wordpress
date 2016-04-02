<?php global $wpalchemy_media_access; ?>
<!--================================-->
<div class="portfolio_details_con">
    <!-- gall -->
    <?php while($mb->have_fields_and_multi('portfolio_details')): ?>
    <?php $mb->the_group_open(); ?>
    <div class="portfolio_details_meta_block_container">
        <i class="shandle"><?php esc_html_e( 'Handle', 'enar') ?></i>
        <a href="#" class="dodelete button"><?php esc_html_e( 'Delete', 'enar') ?></a>
        
        <?php $mb->the_field('icon'); ?>
        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Choose Icon', 'enar') ?></label>
        <div class="idealtheme_choose_icon">
            <a href="#" class="choose_icon button-primary"><?php esc_html_e( 'Select Your Icon', 'enar') ?></a>
            <input class="hide" type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
            <i id="ico" class="<?php $mb->the_value(); ?>"></i>

        </div>
        
        <?php $mb->the_field('title'); ?>
        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Title', 'enar') ?></label>
        <div>
            <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
            <span class="description"><?php esc_html_e( 'leave blank and the image will open in lightbox', 'theme'); ?></span>
        </div>
            
        <?php $mb->the_field('desc'); ?>
        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Description', 'enar') ?></label>
        <div>
            <textarea id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
        </div>
                    
    </div>
    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
    
    <p style="margin-bottom:15px;" class="take_meta_repeat">
        <a href="#" class="docopy-portfolio_details copy_bt button">
            <span><?php esc_html_e( 'Add Slide', 'enar') ?></span>
            <i class="ab-icon"></i>
        </a>
    </p>
</div>
<!--================================-->

<script type="text/javascript">
jQuery(function($) {
    $('#wpa_loop-portfolio_details').sortable({
        handle: ".shandle"
    });
        
});
</script>