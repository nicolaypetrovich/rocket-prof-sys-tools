<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="my-profile">
	<div class="wrap-profile-form">
		<p><?php
			/* translators: 1: user display name 2: logout url */
			printf(
				__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
				'<strong>' . esc_html( $current_user->billing_first_name ) . '</strong>',
				esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
			);
		?></p>

		<p><?php
			printf('Вы можете настроить <a href="%1$s">свой профиль</a>, просмотреть <a href="%2$s">заказы</a>, или же просмотреть свой <a href="%3$s">список желаний</a>',
				esc_url( wc_get_endpoint_url( 'edit-account' ) ),
				esc_url( wc_get_endpoint_url( 'orders' ) ),
				home_url() . '/my-account/wishlist/'
			);
		?></p>
	</div>
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
