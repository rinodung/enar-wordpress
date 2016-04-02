<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="clearfix <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
    <div class="col-md-6 row_spacer2">
    	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
    
			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

            <?php wc_cart_totals_shipping_html(); ?>

            <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

        <?php elseif ( WC()->cart->needs_shipping() ) : ?>
                <h4><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></h4>
                <?php woocommerce_shipping_calculator(); ?>
        <?php endif; ?>
    </div>
    
    <div class="col-md-6 row_spacer2">
		<h4 class="upper roboto_font"><?php esc_html_e( 'Cart Totals', 'woocommerce' ); ?></h4>

        <div class="check_out_totals">
    
            <div class="totals_row clearfix">
                <div><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
                <div><?php wc_cart_totals_subtotal_html(); ?></div>
            </div>
    
            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
            <div class="totals_row clearfix cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                <div><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
                <div><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
            </div>
            <?php endforeach; ?>

            <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
            <div class="fee totals_row clearfix">
                <div><?php echo esc_html( $fee->name ); ?></div>
                <div><?php wc_cart_totals_fee_html( $fee ); ?></div>
            </div>
            <?php endforeach; ?>
    
            <?php if ( wc_tax_enabled() && WC()->cart->tax_display_cart == 'excl' ) : ?>
                <?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                        <div class="totals_row clearfix tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                            <div><?php echo esc_html( $tax->label ); ?></div>
                            <div><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="totals_row clearfix tax-total">
                        <div><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
                        <div><?php wc_cart_totals_taxes_total_html(); ?></div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
    
            <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
    
            <div class="totals_row clearfix order-total">
                <div><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
                <div><?php wc_cart_totals_order_total_html(); ?></div>
            </div>
    
            <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
    
        </div>
    
        <?php if ( WC()->cart->get_cart_tax() ) : ?>
            <p class="wc-cart-shipping-notice"><small><?php
    
                $estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
                    ? sprintf( ' ' . esc_html__( ' (taxes estimated for %s)', 'woocommerce' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'woocommerce' ) )
                    : '';
    
                printf( esc_html__( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );
    
            ?></small></p>
        <?php endif; ?>
    
        <div class="wc-proceed-to-checkout">
            <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
        </div>
        
    </div>
    
	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
