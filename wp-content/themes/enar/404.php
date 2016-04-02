<?php get_header(); ?>
<!-- Section -->
<div class="content_section">
    <div class="container row_spacer clearfix">
        <div class="content">
			<?php 
                $notfound_page_title = idealtheme_option('notfound_page_title'); 
                
                if ( !empty($notfound_page_title['bold-text']) || !empty($notfound_page_title['normal-text']) ){
                    echo '<div class="main_desc centered"><p>';
                    
                    if( !empty($notfound_page_title['bold-text']) ){
                       ?><b><?php echo esc_html($notfound_page_title['bold-text']); ?></b> <?php
                    }
                    
                    if( !empty($notfound_page_title['normal-text']) ){
                       echo esc_html($notfound_page_title['normal-text']);
                    }
                    
                    echo '</p></div>';
                }
            ?>
            
            <?php if ( idealtheme_option('notfound_page_show_search') == true ) { 
				  $search_bar_text = ( idealtheme_option('notfound_page_search_text') !== '' ) ? idealtheme_option('notfound_page_search_text') : esc_html__( 'Search for Other Pages...', 'enar'); ?>
                  
                <div class="col-md-4 on_the_center col_centered">
                    <div class="search_block large_search">
                        <form class="widget_search" method="get" action="<?php echo esc_url(home_url()); ?>">
                            <input class="serch_input" type="search" name="s" id="s" placeholder="<?php echo esc_attr($search_bar_text); ?>" />
                            <button type="submit" id="searchsubmit" class="search_btn">
                                <i class="ico-search8"></i>
                            </button>
                            <div class="clear"></div>
                        </form>
                    </div>
                </div>
            <?php } ?>
            
            <div class="page404">
                <?php $text_404 = ( idealtheme_option('notfound_page_text') !== '' ) ? idealtheme_option('notfound_page_text') : esc_html__( '404', 'enar'); ?>
                <span><?php echo esc_html($text_404); ?><span class="face404"></span></span>
            </div>
            
            <?php if ( idealtheme_option('notfound_page_show_button') == true ) { 
			      
				  $button_text_opt = idealtheme_option('notfound_page_button_text');
				  $button_text     = ( $button_text_opt !== '' ) ? $button_text_opt : esc_html__( 'Back To Home Page', 'enar'); 
				  
				  $button_link_opt = idealtheme_option('notfound_page_button_url');
				  $button_link_opt = ( !empty($button_link_opt) ) ? get_the_permalink($button_link_opt) : home_url();
			?>
                  
                <div class="centered">
                    <a href="<?php echo esc_url($button_link_opt); ?>" target="_self" class="btn_a medium_btn bottom_space">
                        <span><i class="in_left ico-home5"></i><span><?php echo esc_html($button_text); ?></span><i class="in_right ico-home5"></i></span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Section -->
<?php get_footer(); ?>