<?php
/*
Template Name: Coming Soon
*/
	get_header(); 
    
	$page_layout       = get_post_meta($post->ID, 'idealtheme_theme_layout', true);
	$page_padding_top  = get_post_meta($post->ID, 'idealtheme_page_padding_top', true);
	$page_padding_botm = get_post_meta($post->ID, 'idealtheme_page_padding_bottom', true);
	
	$padding_style = '';
	if ( $page_padding_top !== '' ){
		$padding_style .= 'padding-top:'.esc_attr($page_padding_top).'px;';
	}
	if ( $page_padding_botm !== '' ){
		$padding_style .= 'padding-bottom:'.esc_attr($page_padding_botm).'px;';
	}
	$get_padding_style = $padding_style;
	
	$full_or_boxed = '';
	$layout_option = idealtheme_option('theme_layout');
	$layout_option_final  = ( $page_layout == '' ) ? $layout_option : $page_layout;
	
	if( $layout_option_final == 'full2' ){
		$full_or_boxed    = 'full_content clearfix';
		
	}else{
		$full_or_boxed    = 'content clearfix';
		
	}
?>
<div class="content_section">
    <div class="<?php echo esc_attr($full_or_boxed); ?>" <?php echo 'style="'.esc_attr($get_padding_style).'"'; ?>>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
        
        <?php the_content(); ?> 
        
        <?php endwhile; ?>
        <?php else:  ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        
    </div>  
</div>
<?php get_footer(); ?>