<?php
if ( class_exists( 'woocommerce' ) ) {
    
	add_action( 'after_setup_theme', 'idealtheme_woocommerce_support' );
	function idealtheme_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
    
	// Custom woocommerece styles/scripts
	
	add_action( 'wp_enqueue_scripts', 'idealtheme_woocommerce_jquery_style' );
	function idealtheme_woocommerce_jquery_style(){
		wp_register_style( 'enar_idealtheme_woocommerce_style', get_template_directory_uri() . '/theme-admin/woocommerce/woocommerce.css' );
		wp_register_script( 'enar_idealtheme_woocommerce_js', get_template_directory_uri() . '/theme-admin/woocommerce/woocommerce.js' );
		wp_enqueue_style( 'enar_idealtheme_woocommerce_style' );
		wp_enqueue_script( 'enar_idealtheme_woocommerce_js' );
	}
	
	function idealtheme_woocommerce_header_cart(){
		global $woocommerce;
		
		$cart_output = '';
		
		$woo_cart_page_link = get_permalink( get_option( 'woocommerce_cart_page_id' ) );
		
		$cart_output .= '<div id="top_cart" class="top_cart">';
		   $cart_output .= '<a href="#" class="top_add_card">
								<i class="ico-cart"></i>';
			   $cart_output .= '<span>'.esc_html(count($woocommerce->cart->cart_contents)).'</span>';
		   $cart_output .= '</a>';
		   $cart_output .= '<div class="top_cart_con hm_toogle_prep">';
			   //$cart_output .= '<div class="top_cart_header"><h3>' . esc_html__( 'Shopping Cart', 'woocommerce' ) . '</h3></div>';
			   $cart_output .= '<div class="top_cart_block">
									<ul class="top_cart_list">';
					if( $woocommerce->cart->cart_contents_count ) {
										
						foreach( $woocommerce->cart->cart_contents as $cart_item_key => $cart_item ) {
							
							$product_page = get_permalink( $cart_item['product_id'] );
							
							$thumbnail_id = ( $cart_item['variation_id'] ) ? $cart_item['variation_id'] : $cart_item['product_id'];
							
							$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
							
							$producty = new WC_product_simple( $product_id );
							$attachment_ids = $producty->get_gallery_attachment_ids();
	
							$cart_output .= '<li>
												<a href="'.esc_url($product_page).'">';
												if ( has_post_thumbnail($thumbnail_id) ) {
													
								   $cart_output .= get_the_post_thumbnail( $thumbnail_id, 'enar-blog-avatar-thumb' );
								   
												}else if ( $attachment_ids ){
													
													$first_attachment_img  = wp_get_attachment_image_src( $attachment_ids[0], 'enar-blog-avatar-thumb' );
													$first_attachment_img  = $first_attachment_img[0];
													
													$cart_output .= '<img alt="'.esc_attr($cart_item['data']->post->post_title).'" src="'.esc_url($first_attachment_img).'">';
												}else{
													
													$cart_output .= '<img alt="'.esc_attr($cart_item['data']->post->post_title).'" src="'.get_template_directory_uri().'/img/shop/default_product_very_thumb.jpg">';
												}
								   $cart_output .= '<span class="cart_top_details">
														<span class="top_cart_title">'.$cart_item['data']->post->post_title.'</span>
														<span class="top_cart_price">'.$cart_item['quantity'].' x '. $woocommerce->cart->get_product_subtotal( $cart_item['data'], 1 ).'</span>
													</span>
												</a>';
								$cart_output .= apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove top_catt_remove" title="%s" data-product_id="%s" data-product_sku="%s"></a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'woocommerce' ), esc_attr( $product_id ), esc_attr( $_product->get_sku() ) ), $cart_item_key );
												
												//$cart_output .= '<a class="remove top_catt_remove"></a>';
							$cart_output .= '</li>';
						}
					}else{
						$cart_output .= '<li class="hm_cart_empty"><span>' . esc_html__( 'No products in the cart.', 'woocommerce' ) . '</span></li>';
					}
					$cart_output .= '</ul>
								</div>';
			   $cart_output .= '<div class="top_cart_footer clearfix">
									<span class="left top_cart_total">'.$woocommerce->cart->get_cart_total().'</span>
									<a href="'.esc_url($woo_cart_page_link).'" class="button top_cart_btn shadow_btn f_right">' . esc_html__( 'View Cart', 'woocommerce' ) . '</a>
								</div>';
		   $cart_output .= '</div>
					    </div>';
		
		echo $cart_output;
	}
	
	function idealtheme_woocommerce_related_product(){
		
		global $product;
		
		$posts_per_page = idealtheme_option('woocommerce_related_posts_per_page');
		
		if ( empty( $product ) || ! $product->exists() ){
			return;
		}
		//$related = $product->get_related( $posts_per_page );
        $related = $product->get_related();
		
		if ( sizeof( $related ) == 0 ) return;

		$args = apply_filters( 'woocommerce_related_products_args', array(
			'post_type'            => 'product',
			'ignore_sticky_posts'  => 1,
			'no_found_rows'        => 1,
			'posts_per_page'       => $posts_per_page,
			'orderby'              => 'rand',
			'post__in'             => $related,
			'post__not_in'         => array( $product->id )
		) );
		
		$products = new WP_Query( $args );
		
		$related_output = '';
		
		$related_output .= '<div class="shop_slider">';
		
		while ( $products->have_posts() ) : $products->the_post();
		    
            $price = get_post_meta( get_the_ID(), '_regular_price', true);
			$sale = get_post_meta( get_the_ID(), '_sale_price', true);
			$product_new_item  = get_post_meta( get_the_ID(), 'idealtheme_product_new_item', true);
			
			$producty = new WC_product_simple( get_the_ID() );
			$attachment_ids = $producty->get_gallery_attachment_ids();
			
			$rating_html = $producty->get_rating_html();

			//if ( $attachment_ids || has_post_thumbnail() ) {
				if ( has_post_thumbnail() ) {
					
					$image_post_thumb_url  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'enar-shop-large');
					$image_post_thumb_url  = $image_post_thumb_url[0];
					
				}else if ( $attachment_ids ){
					$image_post_thumb_url  = wp_get_attachment_image_src( $attachment_ids[0], 'enar-shop-large' );
                    $image_post_thumb_url  = $image_post_thumb_url[0];
					
				}else{
					$image_post_thumb_url  = get_template_directory_uri().'/img/shop/default_product.jpg';
				}
				
				if( $image_post_thumb_url ){
					$related_output .= '<div class="add2cart_slide centered">
											<div class="add2cart_image">';
							$related_output .= ( $producty->is_on_sale() ) ? '<span class="sale_new">
													<span class="text">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span><span class="circle sale"></span>
												</span>' : '';
							
							$related_output .= ( $product_new_item ) ? '<span class="hm_new_prod">' . esc_html__( 'New', 'woocommerce' ) . '</span>' : '';
																	
							$related_output .= '<a href="'.get_the_permalink().'" class="add2cart_img">
													<span class="add2cart_zoom"><i class="ico-plus3"></i></span>
													<img src="'.esc_url($image_post_thumb_url).'" alt="'.esc_attr(get_the_title()).'">
												</a>';
						$related_output .= '</div>';
						$related_output .= '<div class="add2cart_details">
												<div class="con_cont">
													<a href="'.get_the_permalink().'" class="add2cart_prod_name">'.get_the_title().'</a>';
							
						if ( $sale && $price ) {
							$related_output .= '<span class="add2cart_prod_price">
								<del>'.get_woocommerce_currency_symbol().esc_html($price).'</del>
								<ins class="roboto_font">'.get_woocommerce_currency_symbol().esc_html($sale).'</ins>
							</span>';
							
						}else if ( $price ) {
							$related_output .= '<span class="add2cart_prod_price">
								<ins class="roboto_font">'.get_woocommerce_currency_symbol().esc_html($price).'</ins>
							</span>';
							
						}else if ( $sale ) {
							$related_output .= '<span class="add2cart_prod_price">
								<ins class="roboto_font">'.get_woocommerce_currency_symbol().esc_html($sale).'</ins>
							</span>';
						}
					
					
								$related_output .= '<div class="centered">'.$rating_html.'</div>';
								
								$is_btn_ajax = $producty->is_purchasable() && $producty->is_in_stock() ? ' add2cart_btn_ajax' : '';
								
								$related_output .= '<a class="add2cart_btn'.esc_attr($is_btn_ajax).' product_type_'.esc_attr( $producty->product_type ).'" href="'.esc_url( $producty->add_to_cart_url() ).'" rel="nofollow" data-product_id="'.esc_attr( $producty->id ).'" data-product_sku="'.esc_attr( $product->get_sku() ).'" data-quantity="'.esc_attr( isset( $quantity ) ? $quantity : 1 ).'"><i class="refresh_loader ico-refresh4"></i><i class="hm_cart_icon ico-cart"></i><i class="hm_cart_added ico-check4"></i><span>' .esc_html( $product->add_to_cart_text() ). '</span></a>';
								
							$related_output .= '</div>
											</div>
										</div>'; 
				}
			//}
			
		endwhile;
		
		$related_output .= '</div>';
		
		wp_reset_postdata();
		
		echo $related_output;

	}
	
	// Remove woocommerce defauly styles
	//add_filter( 'woocommerce_enqueue_styles', '__return_false' );
}