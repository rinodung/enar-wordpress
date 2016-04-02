<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <?php extract( idealtheme_get_mata_vars() ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    
    <?php if ( !function_exists( 'wp_site_icon' ) || 
			   idealtheme_option('custom_favicon', 'url') !== '' || 
			   idealtheme_option('favicon_iphone', 'url') !== '' || 
			   idealtheme_option('favicon_iphone_retina', 'url') !== '' || 
			   idealtheme_option('favicon_ipad', 'url') !== '' || 
			   idealtheme_option('favicon_ipad_retina', 'url') !== '' ) { ?>
    
    	<?php if ( idealtheme_option('custom_favicon', 'url') !== '' ) { ?>
        	<link rel="shortcut icon" href="<?php echo esc_url(idealtheme_option('custom_favicon', 'url')); ?>" type="image/x-icon" />
		<?php } else { ?>
        	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico" type="image/x-icon" />
		<?php } ?>
        
        <?php if ( idealtheme_option('favicon_iphone', 'url') !== '' ) { ?>
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url(idealtheme_option('favicon_iphone', 'url')); ?>"><?php } ?>
    
        <?php if ( idealtheme_option('favicon_iphone_retina', 'url') !== '' ) { ?>
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(idealtheme_option('favicon_iphone_retina', 'url')); ?>"><?php } ?>
    
        <?php if ( idealtheme_option('favicon_ipad', 'url') !== '' ) { ?>
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(idealtheme_option('favicon_ipad', 'url')); ?>"><?php } ?>
    
        <?php if ( idealtheme_option('favicon_ipad_retina', 'url') !== '' ) { ?>
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(idealtheme_option('favicon_ipad_retina', 'url')); ?>"><?php } ?>
        
        <?php if ( idealtheme_option('ms_favicon', 'url') != '') { ?>
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="<?php echo esc_url(idealtheme_option('ms_favicon', 'url')); ?>"><?php } ?>
        
    
    <?php } ?>
         
    <style type="text/css">
		@media only screen and (min-width: 992px) {
			.header_on_side.dark_sup_menu #side_heder #side_heder_in {
				background: <?php echo esc_attr(idealtheme_option('nav_dark_bg_color')); ?>;
			}
		}
		<?php if(idealtheme_option('my_custom_css') !== ''){ echo idealtheme_option('my_custom_css'); } ?>
		
		<?php if ( $header_font_color !== '' ) { ?>
		.breadcrumbs span, .page_title .breadcrumbs a, .page_title .breadcrumbs a:hover, .page_title h1{
			color: <?php echo esc_attr($header_font_color); ?> !important;
		}
    	<?php } ?>
    </style>
	
    <!--[if lt IE 9]><script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script><![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php echo 'style="'.esc_attr($page_bg_style).'"'; ?>>
    <?php if ( idealtheme_option('enable_preloader') == true ){ ?>
    <div id="preloader">
        <?php if ( idealtheme_option('preloader_style') == 'preloader4' ){ 
		
			$preloader_img = ( idealtheme_option('preloader_bg_img', 'url') !== '' ) ? idealtheme_option('preloader_bg_img', 'url') : get_template_directory_uri().'/img/camera-loader.gif';
		?>
        <div class="preloader_img"><img src="<?php echo esc_url($preloader_img); ?>" alt="..."/></div>
        <?php } ?>
        <div class="spinner clearfix">
            <div class="sk-dot1"></div><div class="sk-dot2"></div>
            <div class="rect3"></div><div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
    <?php } ?>
    
    <?php if ( $page_bg_overlay ) { ?> <div class="bg_overlay hm_overlay"></div> <?php } ?>
    <?php if ( is_user_logged_in() ) { ?><a class="hm_edit_post" href="<?php echo get_edit_post_link(); ?>"><i class="ico-write"></i></a><?php } ?>
    
    <div id="main_wrapper">
    	<header id="site_header">
           
            <?php if ( $enable_top_bar == 'show' ) { ?>
            <div class="topbar">
                <div class="content clearfix">
                
                    <div class="top_details clearfix f_left">
                    <?php if ( idealtheme_option('show_top_lang') == true ) { 
							if (function_exists('icl_get_languages')) { 
                            ?><div class="languages-select languages-drop">
                                <span><i class="ico-globe4"></i><span><?php echo ICL_LANGUAGE_NAME; ?></span></span>
                                <div class="languages-panel">
                                    <ul class="languages-panel-con">
                                        <?php idealtheme_fun_wpml_languages_list(); ?>
                                    </ul>
                                </div>
                            </div><?php 
							} 
						} ?>
                        
                        <?php $top_bar_details = idealtheme_option('top_bar_details'); 
						
							if ( $top_bar_details ){
								foreach($top_bar_details as $detelsa){ 
									if( !empty($detelsa) ){
										?><span><i class="icon ico-keyboard-arrow-right"></i><?php echo esc_html($detelsa); ?></span><?php 
									}
								}
							}
						?>
                    </div>
                    
                    <?php $top_soc_class = ( idealtheme_option('social_topbar_title') == true ) ? '' : ' top_soc_normall'; ?>   
                    
                    <?php if ( idealtheme_option('social_topbar') == true ) { ?>
                    <div class="top-socials box_socials f_right<?php echo esc_attr($top_soc_class); ?>">
                        <?php if ( idealtheme_option('facebook_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('facebook_url')); ?>" target="_blank">
                                <span class="soc_name">Facebook</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-facebook4"></i>
                            </a>
                        <?php } if ( idealtheme_option('twitter_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('twitter_url')); ?>" target="_blank">
                                <span class="soc_name">Twitter</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-twitter4"></i>
                            </a>
                        <?php } if ( idealtheme_option('googleplus_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('googleplus_url')); ?>" target="_blank">
                                <span class="soc_name">Google+</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-google-plus"></i>
                            </a>
                        <?php } if ( idealtheme_option('dribble_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('dribble_url')); ?>" target="_blank">
                                <span class="soc_name">Dribble</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-dribbble"></i>
                            </a>
                        <?php } if ( idealtheme_option('linkedin_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('linkedin_url')); ?>" target="_blank">
                                <span class="soc_name">Linkedin</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-linkedin3"></i>
                            </a> 
                        <?php } if ( idealtheme_option('blogger_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('blogger_url')); ?>" target="_blank">
                                <span class="soc_name">Blogger</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-blogger"></i>
                            </a> 
                        <?php } if ( idealtheme_option('tumblr_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('tumblr_url')); ?>" target="_blank">
                                <span class="soc_name">Tumblr</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-tumblr"></i>
                            </a> 
                        <?php } if ( idealtheme_option('reddit_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('reddit_url')); ?>" target="_blank">
                                <span class="soc_name">Reddit</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-reddit"></i>
                            </a> 
                        <?php } if ( idealtheme_option('yahoo_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('yahoo_url')); ?>" target="_blank">
                                <span class="soc_name">Yahoo</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-yahoo"></i>
                            </a> 
                        <?php } if ( idealtheme_option('deviantart_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('deviantart_url')); ?>" target="_blank">
                                <span class="soc_name">Deviantart</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-deviantart"></i>
                            </a> 
                        <?php } if ( idealtheme_option('vimeo_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('vimeo_url')); ?>" target="_blank">
                                <span class="soc_name">Vimeo</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-vimeo"></i>
                            </a>
                        <?php } if ( idealtheme_option('youtube_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('youtube_url')); ?>" target="_blank">
                                <span class="soc_name">Youtube</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-youtube3"></i>
                            </a> 
                        <?php } if ( idealtheme_option('pinterest_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('pinterest_url')); ?>" target="_blank">
                                <span class="soc_name">Pinterest</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-pinterest-p"></i>
                            </a> 
                        <?php } if ( idealtheme_option('digg_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('digg_url')); ?>" target="_blank">
                                <span class="soc_name">Digg</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-digg"></i>
                            </a> 
                        <?php } if ( idealtheme_option('flickr_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('flickr_url')); ?>" target="_blank">
                                <span class="soc_name">Flickr</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-flickr2"></i>
                            </a> 
                        <?php } if ( idealtheme_option('forrst_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('forrst_url')); ?>" target="_blank">
                                <span class="soc_name">Forrst</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-forrst"></i>
                            </a>
                        <?php } if ( idealtheme_option('skype_url') !== '' ) { ?> 
                            <a href="skype:<?php echo esc_attr(idealtheme_option('skype_url')); ?>?call">
                                <span class="soc_name">Skype</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-skype"></i>
                            </a>
                        <?php } if ( idealtheme_option('instagram_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('instagram_url')); ?>" target="_blank">
                                <span class="soc_name">Instagram</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-instagram3"></i>
                            </a> 
                        <?php } if ( idealtheme_option('paypal_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('paypal_url')); ?>" target="_blank">
                                <span class="soc_name">PayPal</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-paypal"></i>
                            </a> 
                        <?php } if ( idealtheme_option('dropbox_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('dropbox_url')); ?>" target="_blank">
                                <span class="soc_name">Dropbox</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-dropbox"></i>
                            </a> 
                        <?php } if ( idealtheme_option('soundcloud_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('soundcloud_url')); ?>" target="_blank">
                                <span class="soc_name">Soundcloud</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-soundcloud"></i>
                            </a> 
                        <?php } if ( idealtheme_option('picasa_url') !== '' ) { ?>
                            <a href="<?php echo esc_url(idealtheme_option('picasa_url')); ?>" target="_blank">
                                <span class="soc_name">Picassa</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-picassa"></i>
                            </a>
                        <?php } if (idealtheme_option('rss_on_off') == true) { ?>
                            <a href="<?php if(idealtheme_option('rss_custom') != ''){
                                    echo esc_url(idealtheme_option('rss_custom'));
                                } else { 
                                    echo esc_url(bloginfo( 'rss2_url' )); 
                                } ?>" target="_blank">
                                <span class="soc_name">RSS</span>
                                <span class="soc_icon_bg"></span>
                                <i class="ico-rss"></i>
                            </a> 
                        <?php } ?>
                     </div>
                     <?php } ?>
                </div>
                <!-- End content -->
                <span class="top_expande not_expanded">
                    <i class="no_exp ico-arrow-down2"></i>
                    <i class="exp ico-arrow-up2"></i>
                </span>
            </div>
            <!-- End topbar -->
            <?php } ?>
            
            <?php if ( $templatename == 'template-soon.php' ) {
				$soon_logo = idealtheme_option('logo_img', 'url');
				if ( $soon_logo !== '' ) {
					echo '</header><div class="topbar white_topbar large_topbar">
								<div class="container clearfix">
									<div class="centered">
										<img src="'.esc_url($soon_logo).'" alt="'.esc_attr(get_bloginfo('name')).'">
									</div>
								</div>
							</div>';
				}
				return;
			} ?>
            
            <?php 
			if ($menu_position_final == 'header_on_side'){
				echo '<div id="side_heder">
					<div id="side_heder_in">';
			} ?>
            
            <?php $is_sticky = ( idealtheme_option('enable_sticky_nav') == true ) ? 'hm_sticky' : ''; ?>
            
            <div id="navigation_bar" class="<?php echo esc_attr($is_sticky); ?>">
                <div class="content">
                    <?php
					//if( idealtheme_option('logo_img', 'url') !== '' || idealtheme_option('retina_logo_img', 'url') !== ''){ 
					    
						$logo_width1 = ( idealtheme_option('logo_img', 'width') !== '' ) ? intval(idealtheme_option('logo_img', 'width')) : intval(idealtheme_option('retina_logo_img', 'width')) / 2;
						$logo_height1 = ( idealtheme_option('logo_img', 'height') !== '' ) ? intval(idealtheme_option('logo_img', 'height')) : intval(idealtheme_option('retina_logo_img', 'height')) / 2;
						
						$logo_width2 = ( idealtheme_option('retina_logo_img', 'width') !== '' ) ? intval(idealtheme_option('retina_logo_img', 'width')) / 2 : intval(idealtheme_option('logo_img', 'width'));
						$logo_height2 = ( idealtheme_option('retina_logo_img', 'height') !== '' ) ? intval(idealtheme_option('retina_logo_img', 'height')) / 2 : intval(idealtheme_option('logo_img', 'height'));
					
						$normal_logo = ( idealtheme_option('logo_img', 'url') !== '' ) ? idealtheme_option('logo_img', 'url') : idealtheme_option('retina_logo_img', 'url');
						$retina_logo = ( idealtheme_option('retina_logo_img', 'url') !== '' ) ? idealtheme_option('retina_logo_img', 'url') : idealtheme_option('logo_img', 'url');
						if ( $normal_logo == '' && $retina_logo == '' ){
							$logo_width1 = $logo_width2 = 124;
							$logo_height1 = $logo_height2 = 42;
							$normal_logo = $retina_logo = get_template_directory_uri().'/img/logo-dark.png';
						}
						
						$logo_alt_text = ( idealtheme_option('logo_alt_text') !== '' ) ? idealtheme_option('logo_alt_text') : get_bloginfo('name');
					?>
                        
                    <div id="logo">
                        <a href="<?php echo esc_url(home_url()); ?>">
                            
                            <?php if ( $normal_logo !== '' ) { ?>
                            	<img class="normal_logo" src="<?php echo esc_url($normal_logo); ?>" width="<?php echo esc_attr($logo_width1); ?>" height="<?php echo esc_attr($logo_height1); ?>" alt="<?php echo esc_attr($logo_alt_text); ?>">
                            <?php } ?>
                            
                            <?php if ( $retina_logo !== '' ) { ?>
                            	<img class="retina_logo" src="<?php echo esc_url($retina_logo); ?>" width="<?php echo esc_attr($logo_width2); ?>" height="<?php echo esc_attr($logo_height2); ?>" alt="<?php echo esc_attr($logo_alt_text); ?>">
                            <?php } ?>
                            
                        </a>
                    </div>
                    
                    <?php //} ?>
                    
                    <?php if ($menu_position_final !== 'header_on_side'){ ?>
                        
                         
					  <?php if ( idealtheme_option('enable_nav_cart') == true ) {
                                if ( class_exists( 'woocommerce' ) ) { 
                                    idealtheme_woocommerce_header_cart(); 
                                }
                            } ?>
                        
                        <?php if ( idealtheme_option('enable_nav_search') == true ) { ?>
                            <?php
							    $search_type_option = idealtheme_option('nav_search_style');
								$sinal_search_type = ( !empty($show_search_as) ) ? $show_search_as : $search_type_option;
							?>
							<?php if ( $sinal_search_type == 'as_bar') { ?>
                                <form class="top_search clearfix small_top_search" method="get" action="<?php echo esc_url(home_url()); ?>">
                                    <div class="top_search_con">
                                        <input type="text" name="s" placeholder="<?php esc_html_e( 'Search...', 'enar'); ?>">
                                        <span class="top_search_icon"><i class="ico-search8"></i></span>
                                        <input type="submit" class="top_search_submit" >
                                    </div>
                                </form>
                            <?php } else if ($sinal_search_type == 'as_icon'){ ?>
                                <div class="hm_icon_search">
                                    <a href="#" class="hm_icon_search_btn"><i class="ico-search8"></i></a>
                                    <div class="hm_search_form hm_toogle_prep">
                                        <form method="get" action="<?php echo esc_url(home_url()); ?>">
                                            <input class="hm_si" type="text" placeholder="<?php esc_html_e( 'Search...', 'enar'); ?>" name="s">
                                            <!--<button class="hm_search_btn" type="submit"><i class="ico-search8"></i></button>-->
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                         <?php } ?>
                         
                    <?php } ?>
                    
                    <?php 
					    $menu_align_option = idealtheme_option('nav_float_to');
						$hm_float_m = ( !empty($menu_align) ) ? $menu_align : $menu_align_option;
					?>
                    <nav id="main_nav" class="<?php echo esc_attr($hm_float_m); ?>">
                        <div id="nav_menu">
                            <span class="mobile_menu_trigger">
                                <a href="#" class="nav_trigger"><span></span></a>
                            </span>
                            
                            <?php 
							
							if ( !empty($current_menu) &&  $current_menu !== 'main') {
								
								wp_nav_menu( 
									array( 
										'theme_location'  => '',
										'menu'            => $current_menu,
										'container'       => false,
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'clearfix',
										'menu_id'         => 'navy',
										'echo'            => true,
										'fallback_cb'     => false,
										'before'          => '',
										'after'           => '',
										'link_before'     => '<span>',
										'link_after'      => '</span>',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 10,
										'walker'          => new idealtheme_custom_Walker
									) 
								); 
							}else{
								wp_nav_menu( 
									array( 
										'theme_location'  => 'main',
										'menu'            => '',
										'container'       => false,
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'clearfix',
										'menu_id'         => 'navy',
										'echo'            => true,
										'fallback_cb'     => false,
										'before'          => '',
										'after'           => '',
										'link_before'     => '<span>',
										'link_after'      => '</span>',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 10,
										'walker'          => new idealtheme_custom_Walker
									) 
								);
							}
							?>	
                            	
                        </div>
                    </nav>
                    <!-- End Nav -->	
                    
                    <div class="clear"></div>
                </div>
            </div>
            <?php 
			if ($menu_position_final == 'header_on_side'){
				echo '</div></div>';
			} ?>
</header>