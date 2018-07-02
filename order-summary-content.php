<?php
/**
 * Order summary page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div class="section-head">
	<h1><?php _e( 'Order Summary', APP_TD ); ?></h1>
</div>

<div class="order-summary">

	<fieldset>

		<?php the_order_summary(); ?>

			<p><?php _e( 'Thank you!', APP_TD ); ?></p>

			<?php if ( ! in_array( $order->get_status(), array( APPTHEMES_ORDER_PAID, APPTHEMES_ORDER_COMPLETED, APPTHEMES_ORDER_ACTIVATED ) ) ) : ?>

				<?php if ( get_query_var('bt_end') ) { ?>
					<p><?php _e( 'Your order is pending payment. After payment clears, it will become available.', APP_TD ); ?>
				<?php } else { ?>
					<p><?php _e( 'Your order is still being processed.', APP_TD ); ?>
					<p><?php printf( __( 'If it does not complete soon, please contact us and refer to your <strong>Order ID - #%d</strong>.', APP_TD ), $order->get_id() ); ?>
				<?php } ?>

			<?php else : ?>

				<?php if ( $order->is_escrow() ) { ?>
					<p><?php _e( 'Funds were transferred succesfully.', APP_TD ); ?></p>
					<p><?php _e( 'The workspace for this project is now active and work can begin.', APP_TD ); ?></p>
				<?php } else {  ?>
					<p><?php _e( 'Your order has been completed!', APP_TD ); ?></p>
				<?php } ?>

			<?php endif; ?>

		<?php do_action( 'hrb_order_summary' ); ?>

	</fieldset>

	<fieldset>
		<input type="submit" class="button" value="<?php echo esc_attr( $bt_step_text ); ?>" onClick="location.href='<?php echo esc_url( $url ); ?>';return false;">
	</fieldset>

</div>
