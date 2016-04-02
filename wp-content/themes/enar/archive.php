<?php get_header(); 

	$user_ID           = get_the_author_meta( 'ID' );
	$user_meta         = get_user_meta($user_ID);
	$all_meta_for_user = get_userdata($user_ID);
	
	$author_avatar     = get_avatar( $user_ID, 140 );
	$author_url        = get_author_posts_url( $user_ID );
	
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
?>

<!-- Page Title -->
<div class="content_section page_title">
    <div class="content clearfix">
        <h1><?php 
		   $post_type = get_post_type_object(get_post_type());
		   echo single_cat_title('', false);
		   if( is_author() ){
			   echo esc_html($all_meta_for_user->display_name);
		   }
		?></h1>
		<?php if (function_exists('idealtheme_fun_qt_custom_breadcrumbs')) idealtheme_fun_qt_custom_breadcrumbs(); ?> 
    </div>
</div>
<!-- End Page Title -->

<div class="content_section hm_posts_tax_con">
    <div class="<?php echo esc_attr($full_or_boxed); ?>">    
        <!-- About the author -->
        <?php if( is_author() ){ ?>
        <div class="about_auther about_auther_page">

            <div class="about_auther_con clearfix">
                <span class="avatar_img">
                    <?php echo $author_avatar; ?>
                </span>
                <div class="about_auther_details">
                    <span class="auther_link"><?php esc_html_e( 'About', 'enar'); ?> <?php echo esc_html($all_meta_for_user->display_name); ?></span>
                    <span class="desc">
                    <?php $shortexcerpt_for_user = wp_trim_words( $user_meta['description'][0], 34, ' ...' );
                          echo esc_html($shortexcerpt_for_user); 
                    ?>
                    </span>
                    <div class="social_media clearfix">
                        <?php get_template_part('includes/user', 'share'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- End About the author -->
        
        <?php 
            if ( idealtheme_option('post_category_template_type') == 'standard' ) { 
                get_template_part('includes/blog', 'standard_list');
                
            }else if ( idealtheme_option('post_category_template_type') == 'list' ) { 
                get_template_part('includes/blog', 'standard_list');
                
            }else if ( idealtheme_option('post_category_template_type') == 'masonry' ) { 
                get_template_part('includes/blog', 'masonry');
                
            }else if ( idealtheme_option('post_category_template_type') == 'grid' ) { 
                get_template_part('includes/blog', 'grid');
                
            }else{
                get_template_part('includes/blog', 'standard_list');
            }
        ?> 
	</div>
</div>
<?php get_footer(); ?>