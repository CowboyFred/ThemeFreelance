<?php
/**
 * Order checkout page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row create-project purchase-plans">

	<div id="main" class="large-8 columns create-projects-section">

		<div class="form-wrapper checkout-process">

			<?php
				appthemes_display_form_progress();
				$success = process_the_order();
				$order   = get_order();

				// Redirect the user if the order completes.
				if ( $success && ( in_array( $order->get_status(), array( APPTHEMES_ORDER_PAID, APPTHEMES_ORDER_COMPLETED, APPTHEMES_ORDER_ACTIVATED ) ) ) ) {

					$redirect_to = get_post_meta( $order->get_id(), 'complete_url', true );

					if ( ! empty( $redirect_to ) ) {
						hrb_js_redirect( $redirect_to );
					}

				} elseif ( APPTHEMES_ORDER_PENDING == $order->get_status() && $success !== NULL && ! $success ) {

					$text = html( 'p', __( 'There was a problem processing your order. Please try again later.', APP_TD ) );
					$text .= html( 'p', sprintf( __( 'If the problem persists, contact the site owner and refer your <strong>Order ID: %d</strong>', APP_TD ), $order->get_id() ) );

					// output sanitized link for previous page
					$location = wp_sanitize_redirect( $_SERVER['HTTP_REFERER'] );
					$location = wp_validate_redirect( $location, admin_url() );

					$text .= html( 'a', array( 'href' => $location ), __( '&#8592; Return', APP_TD ) );
					echo html( 'span', array( 'class' => 'redirect-text' ), $text );
				}
			?>

		</div><!-- .form-wrapper -->

	</div><!-- #main -->

	<?php
		$sidebar = ( $order->is_escrow() ) ? 'transfer-funds' : 'create-project';
		get_sidebar( $sidebar );
	?>

</div><!-- #primary -->
