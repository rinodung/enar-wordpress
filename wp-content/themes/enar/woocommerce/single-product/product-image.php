<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

$attachment_ids = $product->get_gallery_attachment_ids();
$product_video    = get_post_meta($post->ID, 'idealtheme_woocommerce_product_video', true);

$product_new_item  = get_post_meta($product->id, 'idealtheme_product_new_item', true);

?>
<div class="single_product_slider">
    <?php if ( $product->is_on_sale() ) : ?>
    
        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="sale_new"><span class="text">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span><span class="circle sale"></span></span>', $post, $product ); ?>
    
    <?php endif; ?>
    
    <?php
		if ( $product_new_item ){
			echo '<span class="hm_new_prod">' . esc_html__( 'New', 'woocommerce' ) . '</span>';	
		}
	?>
    <div class="thumbs_gall_slider_con content_thumbs_gall gall_arrow2">
            <?php if ( $product_video !== '' ){ ?>
            <a class="hm_woocomm_vid" href="<?php echo esc_url($product_video); ?>">
                <i class="ico-play5"></i>
                <span class="hm_woocomm_vid_desc"><?php esc_html_e( 'Video', 'woocommerce' ) ?></span>
            </a>
            <?php } ?>
            <div class="thumbs_gall_slider_larg owl-carousel">
    
                <?php
					
                    if ( has_post_thumbnail() ) {
            
                        $image_post_large_url  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'enar-blog-single-image');
                        $image_post_large_url  = $image_post_large_url[0];
                        
						$image_post_thumb_url  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'enar-shop-large');
                        $image_post_thumb_url  = $image_post_thumb_url[0];
						
                        echo '<div class="item">
                                    <a class="feature_inner_ling hm_commerce_slider" href="'.esc_url($image_post_large_url).'">
                                        <img src="'.esc_url($image_post_thumb_url).'" alt="'.esc_html__( 'Main Product Image', 'woocommerce' ).'">
                                    </a>
                                </div>';
            
                    }else {
            
                        echo '<div class="item">
                                    <a class="feature_inner_ling hm_commerce_slider" href="'.get_template_directory_uri().'/img/shop/default_product.jpg">
                                        <img src="'.get_template_directory_uri().'/img/shop/default_product.jpg" alt="'.esc_html__( 'Placeholder', 'woocommerce' ).'">
                                    </a>
                                </div>';
            
                    }
					if ( $attachment_ids ) { 
                        
                        foreach ( $attachment_ids as $key => $attachment_id ) {
							
                            $image_large_url  = wp_get_attachment_image_src($attachment_id, 'enar-blog-single-image');
                            $image_large_url  = $image_large_url[0];
                            
							$image_thumb_url  = wp_get_attachment_image_src($attachment_id, 'enar-shop-large');
                        	$image_thumb_url  = $image_thumb_url[0];
						
                            echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="item">
                                    <a class="feature_inner_ling hm_commerce_slider" href="%s">
                                        <img src="%s" alt="'.esc_attr($key+1).'">
                                    </a>
                                </div>', $image_large_url, $image_thumb_url ), $post->ID );
                        }
                        
                    }
                ?>
            </div>
            
        <?php do_action( 'woocommerce_product_thumbnails' ); ?>
    </div>
</div>
