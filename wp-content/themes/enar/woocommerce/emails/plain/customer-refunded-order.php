<?php
/**
 * Customer refunded order email (plain text)
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates/Emails/Plain
 * @version  2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

echo "= " . $email_heading . " =\n\n";

echo sprintf( esc_html__("Hi there. Your order on %s has been refunded. Your order details are shown below for your reference:", 'woocommerce' ), get_option( 'blogname' ) ) . "\n\n";

echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n";

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text );

echo strtoupper( sprintf( esc_html__( 'Order number: %s', 'woocommerce' ), $order->get_order_number() ) ) . "\n";
echo date_i18n( esc_html__( 'jS F Y', 'woocommerce' ), strtotime( $order->order_date ) ) . "\n";

do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text );

echo "\n" . $order->email_order_items_table( true, false, true, '', '', true );

echo "==========\n\n";

if ( $refund && $refund->get_refund_amount() > 0 ) {
	echo esc_html__( 'Amount Refunded', 'woocommerce' ) . "\t " . $refund->get_formatted_refund_amount() . "\n";
}

if ( $totals = $order->get_order_item_totals() ) {
	foreach ( $totals as $total ) {
		echo $total['label'] . "\t " . $total['value'] . "\n";
	}
}

echo "\n=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n";

do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text );

do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text );

echo "\n=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n";

echo apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) );