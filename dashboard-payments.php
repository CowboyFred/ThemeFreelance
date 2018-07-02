<?php
/**
 * User dashboard payments template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<h2><i class="icon i-payments"></i><?php _e( 'Payments', APP_TD  ); ?></h2>

<div class="section-container auto section-tabs project-trunk" data-section data-options="deep_linking: true">

	<?php if ( hrb_credits_enabled() && current_user_can( 'edit_bids' ) ) : ?>
		<section class="<?php echo empty( $active ) ? $active = 'active' : ''; ?> payments-wallet-tab">

			<p class="title" data-section-title><a href="#wallet"><?php _e( 'Wallet', APP_TD ); ?></a></p>

			<div class="content" data-section-content>

				<h3><?php _e( 'Credits Balance', APP_TD ); ?></h3>
				<p><?php _e( 'Credits:', APP_TD ); ?> <span class="credits"><?php echo hrb_get_user_credits(); ?></span></p>

				<p><a href="<?php echo esc_url( hrb_get_credits_purchase_url() ); ?>" class="button purchase-credits"><?php _e( 'Purchase Credits', APP_TD )?></a></p>

			</div><!-- .content -->

		</section>
	<?php endif; ?>

	<?php if ( APP_Gateway_Registry::get_active_gateways( 'escrow' ) && hrb_is_escrow_enabled() && current_user_can( 'edit_bids' ) ): ?>
		<section class="<?php echo empty( $active ) ? $active = 'active' : ''; ?> payments-escrow-tab">

			<p class="title" data-section-title><a href="#escrow"><?php _e( 'Escrow', APP_TD ); ?></a></p>

			<div class="content" data-section-content>

				<?php appthemes_display_escrow_form(); ?>

			</div>

		</section>
	<?php endif; ?>

	<section class="<?php echo empty( $active ) ? $active = 'active' : ''; ?> payments-purchases-tab">

		<p class="title" data-section-title><a href="#purchases"><?php _e( 'Purchases', APP_TD ); ?></a></p>

		<div class="content" data-section-content>
			<?php appthemes_load_template( 'dashboard-payments-section-purchases.php', array( 'orders' => $orders, 'orders_no_filters' => $orders_no_filters ) ); ?>
		</div>

	</section>

</div><!-- .section-container -->
