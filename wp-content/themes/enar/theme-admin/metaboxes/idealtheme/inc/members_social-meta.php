<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()) . '/css/'; ?>icon-fonts.css" />
<div class="my_meta_control">
    
    <?php $mb->the_field('social_mail'); ?>
	<div class="social_media_raw">
    	<span class="social_icon"><i class="ico-envelope-o"></i></span>
        <span class="name">contact</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_pinterest'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-pinterest-p"></i></span>
        <span class="name">pinterest</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_dribbble'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-dribbble"></i></span>
        <span class="name">dribbble</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_github'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-github2"></i></span>
        <span class="name">github</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_google_plus'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-google-plus"></i></span>
        <span class="name">google plus</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_instagram'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-instagram2"></i></span>
        <span class="name">instagram</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_linkedin'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-linkedin3"></i></span>
        <span class="name">linkedin</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_skype'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-skype"></i></span>
        <span class="name">skype</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_tumblr'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-tumblr"></i></span>
        <span class="name">tumblr</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_vimeo'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-vimeo"></i></span>
        <span class="name">vimeo</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_facebook'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-facebook4"></i></span>
        <span class="name">facebook</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_twitter'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-twitter"></i></span>
        <span class="name">twitter</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_youtube'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-youtube3"></i></span>
        <span class="name">youtube</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
    </div>
    
    <?php $mb->the_field('social_rss'); ?>
    <div class="social_media_raw">
    	<span class="social_icon"><i class="ico-rss"></i></span>
        <span class="name">rss</span>
        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>"> 
        <div class="clear"></div>
        <span class="description"><?php echo esc_html__( 'Write <strong class="color_desc">#</strong> To Use default RSS link Or Put Your Custom Link','enar'); ?></span>
    </div>
</div>