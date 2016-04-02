<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
	 
	 global $post, $woocommerce, $product;
	 $attachment_ids = $product->get_gallery_attachment_ids();
	 
	 $desc_content = ( $attachment_ids || has_post_thumbnail() || !has_post_thumbnail() ) ? "single_product_details" : "";
	 
	 //echo get_the_ID();
?>

<!-- Next Product -->
<nav class="next_product_nav">
    <?php
	
	$next_post_link     = get_next_post();
	$previous_post_link = get_previous_post();
	
	if (!empty( $previous_post_link )){ 
	    $previous_regular = get_post_meta( $previous_post_link->ID, '_regular_price', true);
	    $previous_sale = get_post_meta( $previous_post_link->ID, '_sale_price', true);
		$previous_total_price = ( $previous_regular ) ? $previous_regular : $previous_sale;
		
		$p_producty = new WC_product_simple( $previous_post_link->ID );
		$p_attachment_ids = $p_producty->get_gallery_attachment_ids();
		
		if( has_post_thumbnail( $previous_post_link->ID ) || $p_attachment_ids){
		?>
            <div class="prev">
                <a href="<?php echo get_permalink( $previous_post_link->ID ); ?>" class="icon-wrap">
                    <i class="ico-keyboard-arrow-left"></i>
                </a>
                <div>
                    <a href="<?php echo get_permalink( $previous_post_link->ID ); ?>">
                        <?php 
						if ( has_post_thumbnail( $previous_post_link->ID ) ) {
							echo get_the_post_thumbnail( $previous_post_link->ID, 'enar-blog-avatar-thumb' ); 
						} else {
							$p_first_attachment_img  = wp_get_attachment_image_src( $p_attachment_ids[0], 'enar-blog-avatar-thumb' );
							$p_first_attachment_img  = $p_first_attachment_img[0];
							echo '<img src="'.esc_url($p_first_attachment_img).'" alt="'.esc_attr(get_the_title( $previous_post_link->ID )).'">';
						}?>
                        <h3><?php echo get_the_title( $previous_post_link->ID ); ?></h3>
                        <span class="price"><?php echo get_woocommerce_currency_symbol().esc_html($previous_total_price); ?></span>
                    </a>
                </div>
            </div>
		<?php }
	}if (!empty( $next_post_link )){ 
	   $next_regular = get_post_meta( $next_post_link->ID, '_regular_price', true);
	   $next_sale = get_post_meta( $next_post_link->ID, '_sale_price', true);
	   $next_total_price = ( $next_regular ) ? $next_regular : $next_sale;
	   
	   $n_producty = new WC_product_simple( $next_post_link->ID );
	   $n_attachment_ids = $n_producty->get_gallery_attachment_ids();
		
	   if( has_post_thumbnail( $next_post_link->ID ) || $n_attachment_ids ){
		?>
        <div class="next">
            <a href="<?php echo get_permalink( $next_post_link->ID ); ?>" class="icon-wrap">
                <i class="ico-keyboard-arrow-right"></i>
            </a>
            <div>
                <a href="<?php echo get_permalink( $next_post_link->ID ); ?>">
                   <?php 
					if ( has_post_thumbnail( $next_post_link->ID ) ) {
						echo get_the_post_thumbnail( $next_post_link->ID, 'enar-blog-avatar-thumb' );
					} else {
						$n_first_attachment_img  = wp_get_attachment_image_src( $n_attachment_ids[0], 'enar-blog-avatar-thumb' );
						$n_first_attachment_img  = $n_first_attachment_img[0];
						echo '<img src="'.esc_url($n_first_attachment_img).'" alt="'.esc_attr(get_the_title( $next_post_link->ID )).'">';
					}?>
                    <h3><?php echo get_the_title( $next_post_link->ID ); ?></h3>
                    <span class="price"><?php echo get_woocommerce_currency_symbol().esc_html($next_total_price); ?></span>
                </a>
            </div>
        </div>
    <?php } }?>
</nav>
<!-- End Next Product -->

<div class="shop_product_wrapper clearfix">
    <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="content">
			<?php
                /**
                 * woocommerce_before_single_product_summary hook
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
            ?>
        
            <div class="<?php echo esc_attr($desc_content); ?>">
        
                <?php
                    /**
                     * woocommerce_single_product_summary hook
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action( 'woocommerce_single_product_summary' );
                ?>
        
            </div><!-- .summary -->
            <div class="clear"></div>
        </div>
        <?php
            /**
             * woocommerce_after_single_product_summary hook
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            do_action( 'woocommerce_after_single_product_summary' );
        ?>
    
        <meta itemprop="url" content="<?php the_permalink(); ?>" />
    
    </div><!-- #product-<?php the_ID(); ?> -->
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
