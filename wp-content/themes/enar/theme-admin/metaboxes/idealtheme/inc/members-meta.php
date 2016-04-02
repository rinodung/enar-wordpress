<div class="my_meta_control">
 
	<label><?php echo esc_html__( 'Job title', 'enar') ?></label>
 
	<p>
		<?php $mb->the_field('title'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
	</p>
 
	<label><?php echo esc_html__( 'Short description', 'enar') ?></label>
 
	<p>
		<?php $mb->the_field('description'); ?>
		<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
		
	</p>
    
    <label><?php echo esc_html__( 'External url', 'enar') ?></label>
    <p>
		<?php $mb->the_field('url'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span class="description"><?php echo esc_html__( 'Fill this field only if you want to go elsewhere when click on this member', 'enar') ?></span>
	</p>

</div>