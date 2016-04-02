<?php 

global $post;
global $wpalchemy_media_access; 

$format = get_post_format( $post->ID );

if( $format == 'video'){ 
	echo '<style>#video_format_meta_metabox{display:block}</style>';
}
?>

    <!--================================-->
    <div class="video_format_meta_block">
            <br/>
            <!--====================-->
		    <?php $mb->the_field('video_type'); ?>
            <div class="rwmb-field">
                <div class="rwmb-label">
                    <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Video Type', 'enar') ?></label>
                </div>
                <div class="rwmb-input">
                    <div class="hm_select_con">
                        <span class="hm_select_arrow"><i class="ico-keyboard-arrow-down"></i></span>
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="id_tube" <?php $mb->the_select_state('id_tube'); ?>><?php esc_html_e( 'Youtube', 'enar'); ?></option>
                            <option value="id_vimeo" <?php $mb->the_select_state('id_vimeo'); ?>><?php esc_html_e( 'Vimeo', 'enar'); ?></option>
                            <option value="self_hosted" <?php $mb->the_select_state('self_hosted'); ?>><?php esc_html_e( 'Self Hosted Video', 'enar'); ?></option>
                        </select>
                    </div>
                 </div>
			</div>
            
            <!-- ================== -->
            <div class="video_id_block">
				<?php $mb->the_field('video_id'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Video ID', 'enar') ?></label>
                    </div>
                    <div class="rwmb-input">
                        <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                        <span class="description"><?php esc_html_e( 'For Example : The ID Is Colored text in these links :', 'enar') ?></span>
                        <span class="description"><?php esc_html_e( 'https://www.youtube.com/watch?v=<strong style="color:red;">0_jNjpVxUt0</strong>', 'enar') ?></span>
                        <span class="description"><?php esc_html_e( 'http://vimeo.com/<strong style="color:red;">105329112</strong>', 'enar') ?></span>
                    </div>
                </div>
            </div>
            <!-- ================== -->
            
			<!-- ================== -->
            <div class="video_self_hosted_block">
                
				<?php $mb->the_field('video_mp4'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Video MP4 Upload', 'enar') ?></label>
                        <span class="description"><?php esc_html_e( 'MP4 format must be included to render your video with cross browser compatibility.', 'enar') ?></span>
                    </div>
                    <div class="rwmb-input">
                        <div class="clearfix">
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                            <?php echo $wpalchemy_media_access->getButton(); ?>
                        </div>
                    </div>
                </div>
                
                <?php $mb->the_field('video_webm'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Video WebM Upload', 'enar') ?></label>
                        <span class="description"><?php esc_html_e( 'WebM format must be included to render your video with cross browser compatibility.', 'enar') ?></span>
                    </div>
                    <div class="rwmb-input">
                    	<div class="clearfix">
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                            <?php echo $wpalchemy_media_access->getButton(); ?>
                        </div>
                    </div>
                </div> 
                
                <?php $mb->the_field('video_flv'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Video FLV Upload', 'enar') ?></label>
                        <span class="description"><?php esc_html_e( 'Add your FLV video file. This is optional.', 'enar') ?></span>
                    </div>
                    <div class="rwmb-input">
                        <div class="clearfix">
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                            <?php echo $wpalchemy_media_access->getButton(); ?>
                        </div>
                    </div>
                </div>
                
                
                
                <?php $mb->the_field('video_m4v'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Video M4V Upload', 'enar') ?></label>
                        <span class="description"><?php esc_html_e( 'Add your M4V video file. This is optional.', 'enar') ?></span>
                    </div>
                    <div class="rwmb-input">
                        <div class="clearfix">
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                            <?php echo $wpalchemy_media_access->getButton(); ?>
                        </div>
                    </div>
                </div>
                
                <?php $mb->the_field('video_ogv'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Video OGV Upload', 'enar') ?></label>
                        <span class="description"><?php esc_html_e( 'Add your OGV video file. This is optional.', 'enar') ?></span>
                    </div>
                    <div class="rwmb-input">
                        <div class="clearfix">
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                            <?php echo $wpalchemy_media_access->getButton(); ?>
                        </div>
                    </div>
                </div>
                
                <?php $mb->the_field('video_wmv'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Video WMV Upload', 'enar') ?></label>
                        <span class="description"><?php esc_html_e( 'Add your WMV video file. This is optional.', 'enar') ?></span>
                    </div>
                    <div class="rwmb-input">
                        <div class="clearfix">
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                            <?php echo $wpalchemy_media_access->getButton(); ?>
                        </div>
                    </div>
                </div>                
                
            </div>
            <!-- ================== -->
    </div>
    <!--================================-->    