<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<div class="sku_wrapper"><b><?php esc_html_e( 'SKU:', 'woocommerce' ); ?></b> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></div>

	<?php endif; ?>

	<?php echo $product->get_categories( '', '<div class="small_title">
                            <span class="small_title_con">
                                <span class="s_icon"><i class="ico-folder-open-o"></i></span>
                                <span class="s_text">'. esc_html__( 'Categories', 'woocommerce').'</span>
                            </span>
                        </div><div class="tags_con">' . _n( '', '', $cat_count, 'woocommerce' ) . ' ', '</div>' ); ?>

	<?php echo $product->get_tags( '', '<div class="small_title">
                            <span class="small_title_con">
                                <span class="s_icon"><i class="ico-tag4"></i></span>
                                <span class="s_text">'. esc_html__( 'Tags', 'woocommerce').'</span>
                            </span>
                        </div><div class="tags_con">' . _n( '', '', $tag_count, 'woocommerce' ) . ' ', '</div>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
