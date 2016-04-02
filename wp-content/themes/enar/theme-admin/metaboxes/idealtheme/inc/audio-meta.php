<?php 

global $post;
global $wpalchemy_media_access; 

$format = get_post_format( $post->ID );

if( $format == 'audio'){ 
	echo '<style>#audio_format_meta_metabox{display:block}</style>';
}
?>

    <!--================================-->
    <div class="audio_format_meta_block">
            <br/>
            <!--====================-->
		    <?php $mb->the_field('audio_type'); ?>
            <div class="rwmb-field">
                <div class="rwmb-label">
                    <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'Audio Type', 'enar') ?></label>
                </div>
                <div class="rwmb-input">
                    <div class="hm_select_con">
                        <span class="hm_select_arrow"><i class="ico-keyboard-arrow-down"></i></span>
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="soundcloud" <?php $mb->the_select_state('soundcloud'); ?>><?php esc_html_e( 'SondCloud Audio', 'enar'); ?></option>
                            <option value="self_hosted" <?php $mb->the_select_state('self_hosted'); ?>><?php esc_html_e( 'Self Hosted Audio', 'enar'); ?></option>
                        </select>
                    </div>
                 </div>
			</div>
            
            <!-- ================== -->
            <div class="audio_soundcloud_block">
				<?php $mb->the_field('audio_soundcloud'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'soundcloud', 'enar') ?></label>
                    </div>
                    <div class="rwmb-input">
                        <textarea type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
                        <span class="description"><?php esc_html_e( 'Include the embedded iframe', 'enar') ?></span>
                    </div>
                </div>
            </div>
            <!-- ================== -->
            
			<!-- ================== -->
            <div class="audio_self_hosted_block">
				<?php $mb->the_field('audio_mp3'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'MP3 URL', 'enar') ?></label>
                    </div>
                    <div class="rwmb-input">
                        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                        <?php echo $wpalchemy_media_access->getButton(); ?>
                    </div>
                </div>
    
                <?php $mb->the_field('audio_ogg'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'OGG URL', 'enar') ?></label>
                    </div>
                    <div class="rwmb-input">
                        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                        <?php echo $wpalchemy_media_access->getButton(); ?>
                    </div>
                </div>
    
                <?php $mb->the_field('audio_m4a'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'M4A URL', 'enar') ?></label>
                    </div>
                    <div class="rwmb-input">
                        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                        <?php echo $wpalchemy_media_access->getButton(); ?>
                    </div>
                </div>
    
                <?php $mb->the_field('audio_wav'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'WAV URL', 'enar') ?></label>
                    </div>
                    <div class="rwmb-input">
                        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                        <?php echo $wpalchemy_media_access->getButton(); ?>
                    </div>
                </div>
    
                <?php $mb->the_field('audio_wma'); ?>
                <div class="rwmb-field">
                    <div class="rwmb-label">
                        <label for="<?php $mb->the_name(); ?>"><?php esc_html_e( 'WMA URL', 'enar') ?></label>
                    </div>
                    <div class="rwmb-input">
                        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                        <?php echo $wpalchemy_media_access->getButton(); ?>
                    </div>
                </div>
            </div>
            <!-- ================== -->
    </div>
    <!--================================-->    