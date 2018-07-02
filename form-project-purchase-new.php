<?php
/**
 * Post a project purchase new content
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div class="section-head">
	<h1><?php _e( 'Select a Plan', APP_TD ); ?></h1>
</div>

<form id="purchase-project" method="post" class="custom main" action="<?php echo esc_url( appthemes_get_step_url() ); ?>">

		<?php if ( ! empty( $plans ) ) : ?>

			<?php foreach ( $plans as $key => $plan ) : ?>

					<?php
						$selected_addons = $sel_addons;

						if ( $plan['post']->ID != $sel_plan ) {
							$selected_addons = array();
						}
					?>

					<fieldset>

						<div class="plan">

							<h3><?php echo $plan['title'] . ( $is_relist ? ' ' . __( '(Relist)', APP_TD ) : '' ); ?></h3>

							<div class="plan-content">

								<p class="description"><?php echo $plan['description']; ?></p>

								<div class="featured-options">
									<?php if ( ! hrb_addons_available( $plan, HRB_PROJECTS_PTYPE ) ) : ?>

										<h5><?php _e( 'Addons are not available for this price plan.', APP_TD ); ?></h5>

									<?php else : ?>

										<h5><?php _e( 'Addons', APP_TD ); ?></h5>

										<?php foreach ( hrb_get_addons( HRB_PROJECTS_PTYPE ) as $addon ) : ?>
												<div class="featured-option <?php echo esc_attr( "plan_id-{$plan['post']->ID}" ) ?>">
													<?php if ( $project_id && hrb_project_has_addon( $project_id, $addon ) ) { ?>
														<label><?php _hrb_output_purchased_addon( $addon, $plan['post']->ID, $project_id ); ?></label>
													<?php } else { ?>
														<label><?php _hrb_output_purchaseable_addon( $addon, $plan['post']->ID, $selected_addons ); ?></label>
													<?php } ?>
												</div>
										<?php endforeach; ?>

									<?php endif; ?>
								</div><!-- .featured-options -->

							</div><!-- .plan-content -->

							<div class="price-box">

								<input name="plan" type="radio" <?php echo $plan['post']->ID == $sel_plan ? 'checked="checked"' : ''; ?> value="<?php echo esc_attr( $plan['post']->ID ); ?>" id="plan-<?php echo esc_attr( $plan['post']->ID ); ?>" />
								<label for="plan-<?php echo esc_attr( $plan['post']->ID ); ?>">

									<?php if ( $is_relist ) : ?>

										<?php appthemes_display_price( $plan['relist_price'] ); ?>

									<?php else : ?>

										<?php appthemes_display_price( $plan['price'] ); ?>

									<?php endif; ?>

									<?php if ( $plan['duration'] != 0 ) { ?>
										<?php printf( _n( 'for <br /> %s day', 'for %s days', $plan['duration'], APP_TD ), $plan['duration'] ); ?>
									<?php } else { ?>
										<?php _e( 'Unlimited days', APP_TD ); ?>
									<?php } ?>
								</label>

							</div><!-- .price-box -->

						</div><!-- .plan -->

					</fieldset>

			<?php endforeach; ?>

		<?php else : ?>

			<em><?php _e( 'No plans are currently available for this category.', APP_TD ); ?></em>

		<?php endif; ?>


	<?php do_action( 'hrb_project_form_purchase' ); ?>

	<fieldset>

		<?php do_action( 'appthemes_purchase_fields', HRB_PRICE_PLAN_PTYPE ); ?>

		<?php hrb_hidden_input_fields( array( 'action' => esc_attr( 'purchase-project' ) ) ); ?>

		<?php if ( $previous_step = appthemes_get_previous_step() ) { ?>
			<input class="button secondary previous-step" previous-step-url="<?php echo esc_url( appthemes_get_step_url( $previous_step ) ); ?>" value="<?php esc_attr_e( '&#8592; Back', APP_TD ); ?>" type="submit" />
		<?php } ?>

		<?php if ( ! empty( $plans ) ) { ?>
			<input class="button" type="submit" value="<?php echo esc_attr( $bt_step_text ); ?>" />
		<?php } ?>

	</fieldset>

</form>
