<?php get_header(); 
	
	$full_or_boxed = '';
	$layout_option = idealtheme_option('theme_layout');
	$layout_option_final  = $layout_option;
	
	if( $layout_option_final == 'full2' ){
		$full_or_boxed    = 'full_content clearfix';
		
	}else if( $layout_option_final == 'boxed1' ){
		$full_or_boxed    = 'content clearfix';
		
	}else if( $layout_option_final == 'boxed2' ){
		$full_or_boxed    = 'content clearfix';
		
	} else{
		$full_or_boxed    = 'content clearfix';
		
	}
	
	$header_size = idealtheme_option('home_title_height');
?>

<!-- Page Title -->
<?php if ( idealtheme_option('home_title_is') == 'allow_title' ) { ?> 
<div class="content_section page_title <?php echo esc_attr($header_size); ?>">
    <div class="content clearfix">
		<h1><?php 
			if(is_home()){ 
				if( idealtheme_option('home_title_type') == 'custom'){ 
					echo esc_html(idealtheme_option('home_title'));
				}else{ 
					echo bloginfo('name');
				}
			} else{
				the_title();
			} 
		?></h1>
    </div>
</div>
<?php } ?> 
<!-- End Page Title -->

<div class="content_section">
    <div class="content_spacer <?php echo esc_attr($full_or_boxed); ?>">
        
        <?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if ( $paged == 1 ){
			echo idealtheme_option('custom_home_content'); 
		}
		
		?>
         
		<?php if ( idealtheme_option('home_title_is') == 'allow_normal_title' ) { ?>
            <div class="main_title centered lato_font">
                <h2><span class="line"><span class="dot"></span></span>
                    <?php 
						if(is_home()){ 
							if( idealtheme_option('home_title_type') == 'custom'){ 
								echo esc_html(idealtheme_option('home_title'));
							}else{ 
								echo bloginfo('name');
							}
						} else{
							the_title();
						} 
					?>
                </h2>
            </div>
        <?php } ?>
        
        <?php 
			if ( idealtheme_option('home_template_type') == 'standard' ) { 
				get_template_part('includes/blog', 'standard_list');
				
			}else if ( idealtheme_option('home_template_type') == 'list' ) { 
				get_template_part('includes/blog', 'standard_list');
				
			}else if ( idealtheme_option('home_template_type') == 'masonry' ) { 
				get_template_part('includes/blog', 'masonry');
				
			}else if ( idealtheme_option('home_template_type') == 'grid' ) { 
				get_template_part('includes/blog', 'grid');
				
			}else if ( idealtheme_option('home_template_type') == 'timeline' ) { 
				get_template_part('includes/blog', 'timeline');
				
			}else{
				get_template_part('includes/blog', 'standard_list');
			}
		?>
    </div>
</div>
<?php get_footer(); ?>