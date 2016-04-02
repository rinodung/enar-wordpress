<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>
<?php if ( idealtheme_option('woocommerce_single_show_related') ) { ?>
<div class="content_section bg_gray hm_woo_related">
    <div class="container content_spacer clearfix">
    	<div class="container shop_related_title">
        	<h2 class="title1"><i class="ico-store" style="font-size: 22px;margin-right:9px;color: #bbb;"></i><?php esc_html_e( 'Related Products', 'woocommerce' ); ?></h2>
        </div>
		<div class="related products">
            <?php idealtheme_woocommerce_related_product(); ?>
		</div>
	</div>
</div>
<?php } ?>
<?php endif;

wp_reset_postdata();