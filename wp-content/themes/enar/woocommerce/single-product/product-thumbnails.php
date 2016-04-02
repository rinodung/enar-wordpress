<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids || has_post_thumbnail() ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
    <div class="gall_thumbs owl-carousel">
	<?php
	    if ( has_post_thumbnail() ) {
            
			$image_post_thumb_url  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
			$image_post_thumb_url  = $image_post_thumb_url[0];
					
			echo '<div class="item"><img src="'.esc_url($image_post_thumb_url).'" alt="'.esc_html__( 'Main Product Image', 'woocommerce' ).'"></div>';

		}
		foreach ( $attachment_ids as $key => $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';

            $image_thumb_url  = wp_get_attachment_image_src($attachment_id, 'thumbnail');
			$image_thumb_url  = $image_thumb_url[0];
			$image_link = wp_get_attachment_url( $attachment_id, 'thumbnail' );

			if ( ! $image_link )
				continue;

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $attr = array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

			$image_class = esc_attr( implode( ' ', $classes ) );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="item"><img src="%s" alt="'.esc_attr($key+1).'"></div>', $image_thumb_url ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

	?></div>
	<?php
}else{
	echo '<div class="gall_thumbs owl-carousel">';
	//echo '<div class="item"><img src="'.wc_placeholder_img_src().'"></div>';
	echo '<div class="item"><img src="'.get_template_directory_uri().'/img/shop/default_product_thumb.jpg" alt="'.esc_html__( 'Placeholder', 'woocommerce' ).'"></div>';
	echo '</div>';
}
