<?php
	$templatename                 = get_page_template_slug( get_the_ID() );
	$hm_show_footer_widgets       = get_post_meta(get_the_ID(), 'idealtheme_page_show_footer_widgets_opt', true);
	$hm_show_footer_copyrights    = get_post_meta(get_the_ID(), 'idealtheme_page_show_footer_copyright_opt', true);

	$footer_color_mode = idealtheme_option('footer_text_color_mode');
	
	$hm_show_footer_copyrights_opt = ( idealtheme_option('footer_show_rights') ) ? 'show' : 'hide';
	$hm_show_footer_copyrights     = ( !empty($hm_show_footer_copyrights) ) ? $hm_show_footer_copyrights : $hm_show_footer_copyrights_opt;
	
	$hm_show_footer_widgets_opt    = ( idealtheme_option('footer_show_widgets') ) ? 'show' : 'hide';
	$hm_show_footer_widgets        = ( !empty($hm_show_footer_widgets) ) ? $hm_show_footer_widgets : $hm_show_footer_widgets_opt;
	
	$widget_width = ( idealtheme_option('footer_widget_col') !== '' ) ? idealtheme_option('footer_widget_col') : '3';
	
?>
    <?php if ( ( $hm_show_footer_widgets == 'show' || $hm_show_footer_copyrights == 'show' ) && $templatename !== 'template-soon.php' ) { ?>
    
	<footer id="footer" class="<?php echo esc_attr($footer_color_mode); ?>">
        <?php if ( $hm_show_footer_widgets == 'show' ) { ?>
		<div class="container clearfix">
			<div class="rows_container clearfix">
				<div class="col-md-<?php echo esc_attr($widget_width); ?>">
					<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('footer_sidebar_a')){ }else { ?><?php } ?>
				</div>
				
				<div class="col-md-<?php echo esc_attr($widget_width); ?>">
                    <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('footer_sidebar_b')){ }else { ?><?php } ?>
				</div>
				
				<div class="col-md-<?php echo esc_attr($widget_width); ?>">
                    <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('footer_sidebar_c')){ }else { ?><?php } ?>
				</div>
				
				<div class="col-md-<?php echo esc_attr($widget_width); ?>">
                    <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('footer_sidebar_d')){ }else { ?><?php } ?>
				</div>
			</div>
		</div>
        <?php } ?>
        
        <?php if ( $hm_show_footer_copyrights == 'show' ) { ?>
		<div class="footer_copyright">
			<div class="container clearfix">
            
                <?php if ( idealtheme_option('footer_rights') !== '' ) { ?>
				<div class="col-md-6">
					<span class="footer_copy_text"><?php echo idealtheme_option('footer_rights'); ?></span>
				</div>
                <?php } ?>
                
                <?php 
				$menu_locations = get_nav_menu_locations();
				$menu_id_opt    = idealtheme_option('footer_menu');
				$menu_location  = '';
				
				foreach( $menu_locations as $menu_key => $menu_value ){
					if ($menu_value == $menu_id_opt){
						$menu_location = $menu_key;
					}
				}
				
				if ( has_nav_menu( $menu_location ) ) { ?>
                    <div class="col-md-6 clearfix">
                        <?php 
                            wp_nav_menu( 
                                array( 
                                    'theme_location'  => $menu_location,
                                    'menu'            => '',
                                    'container'       => false,
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'footer_menu clearfix',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => false,
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth'           => 1,
                                ) 
                            ); 
                        ?>
                    </div>
                 <?php } ?>
			</div>
		</div>
        <?php } ?>
	</footer>
    <?php } ?>
	<!-- End footer -->
    <?php if ( idealtheme_option('scroll_to_top') == true ){ ?>
	<a href="#0" class="hm_go_top"></a>
    <?php } ?>
</div>
<!-- End wrapper -->
<?php if(idealtheme_option('my_custom_script') !== ''){ echo '<script type="text/javascript">'.idealtheme_option('my_custom_script').'</script>';} ?>
<?php wp_footer(); ?>
</body>
</html>