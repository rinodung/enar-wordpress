<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}

$attachment_ids = $product->get_gallery_attachment_ids();

$product_new_item  = get_post_meta($product->id, 'idealtheme_product_new_item', true);

?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
    <div class="add2cart_slide">
        <div class="add2cart_image">
            <a href="<?php the_permalink($product->id); ?>" class="add2cart_img">
            
                <?php if ( $product->is_on_sale() ) : ?>
        			<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="sale_new"><span class="text">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span><span class="circle sale"></span></span>', $post, $product ); ?>
    			<?php endif; ?>
                
                <?php
					if ( $product_new_item ){
						echo '<span class="hm_new_prod">' . esc_html__( 'New', 'woocommerce' ) . '</span>';	
					}
				?>
                <span class="add2cart_zoom"><i class="ico-plus3"></i></span>
                
                <?php
                    if ( has_post_thumbnail($product->id) ) {
                        
                        $image_thumb_url  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'enar-shop-large');
                        $image_thumb_url  = $image_thumb_url[0];
                        
                        echo '<img src="'.esc_url($image_thumb_url).'" alt="'.esc_attr(get_the_title($product->id)).'">';
            
                    } else if ( $attachment_ids ) { 
					
                        $image_thumb_url  = wp_get_attachment_image_src( $attachment_ids[0], 'enar-shop-large');
                        $image_thumb_url  = $image_thumb_url[0];
						
                        echo '<img src="'.esc_url($image_thumb_url).'" alt="'.esc_attr(get_the_title($product->id)).'">';
                        
                    }else {
            
                        echo '<img src="'.get_template_directory_uri().'/img/shop/default_product.jpg" alt="'.esc_attr(get_the_title($product->id)).'">';
            
                    }
                ?>
             </a>
         </div>  
         <div class="add2cart_details">
         	<div class="con_cont">
            	<a class="add2cart_prod_name" href="<?php echo esc_url(get_the_permalink($product->id)); ?>"><?php echo get_the_title($product->id); ?></a>
                
				<span class="price add2cart_prod_price">
					<?php echo $product->get_price_html(); ?>
                </span>
                
                <?php if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {?>
                <div class="hm_rating_con clearfix">
                	<?php echo $product->get_rating_html(); ?>
                </div>
                <?php } ?>
            </div>
            <div class="add2cart_buttons clearfix">
                <?php
					echo apply_filters( 'woocommerce_loop_add_to_cart_link', sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="pro_add2cart_add add2cart_btn_ajax product_type_simple product_type_%s"><i class="refresh_loader ico-refresh4"></i><i class="hm_cart_icon ico-heart4"></i><i class="hm_cart_added ico-check4"></i><span>%s</span></a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						esc_attr( isset( $quantity ) ? $quantity : 1 ),
						esc_attr( $product->product_type ),
						esc_html( $product->add_to_cart_text() )
					), $product );
				?>

                <a class="pro_add2cart_details" href="<?php echo esc_url(get_the_permalink($product->id)); ?>"><i class="ico-angle-right"></i><?php esc_html_e( 'Show Details', 'woocommerce') ?></a>
            </div>
         </div>
    </div>
</li>
