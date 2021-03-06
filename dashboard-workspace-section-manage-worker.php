<?php
/**
 * Project workspace manage worker section template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<fieldset>

	<legend><?php _e( 'Employer Info', APP_TD ); ?></legend>

	<div class="participant-details">

		<div class="row work-user-meta">
			<div class="large-3 columns user-meta-info">
				<?php the_hrb_user_bulk_info( $employer, array( 'show_gravatar' => array( 'size' => 90 ) ) ); ?>
			</div>
			<div class="large-9 columns">

				<div class="user-contact-info">

					<div class="row user-contact">
						<div class="large-12 columns ">
							<i class="icon i-contact"></i><?php the_hrb_user_contact_info( $employer ); ?>
						</div>
					</div>

					<div class="row user-location">
						<div class="large-12 columns ">
							<i class="icon i-user-location"></i><?php the_hrb_user_location( $employer ); ?>
						</div>
					</div>

					<?php
						ob_start();
						the_hrb_dashboard_user_work_actions( get_queried_object(), $project, $employer );
						$actions = ob_get_clean();
					?>

					<?php if ( $actions ) { ?>
						<div class="row work-meta">
							<div class="large-3 columns participant-actions right">
								<?php echo $actions; ?>
							</div>
						</div>
					<?php } ?>

				</div>

			</div>
		</div>

		<?php if ( current_theme_supports( 'app-reviews' ) ) { ?>
			<div class="row form-review-fieldset review-user-<?php echo esc_attr( $employer->ID ); ?>">
				<fieldset>
					<h4><?php _e( 'Add a Review', APP_TD ); ?></h4>
				</fieldset>
				<fieldset>
					<?php appthemes_load_template( 'form-review.php', array( 'review_recipient' => $employer ) ); ?>
				</fieldset>
			</div>
		<?php } ?>

		<?php if ( hrb_is_disputes_enabled() ) { ?>
			<div class="row form-raise-dispute-fieldset">
				<fieldset>
					<h4><?php _e( 'Open a Dispute', APP_TD ); ?></h4>
				</fieldset>
				<fieldset>
					<?php appthemes_load_template( 'form-dispute.php' ); ?>
				</fieldset>
			</div>
		<?php } ?>

	</div>

</fieldset>

<?php if ( HRB_PROJECT_STATUS_WORKING == $post->post_status ) : ?>

	<?php appthemes_load_template( 'form-workspace-manage-worker.php' ); ?>

<?php elseif ( HRB_PROJECT_STATUS_WORKING != $post->post_status && HRB_PROJECT_STATUS_WAITING_FUNDS != $post->post_status && 'reviewer' != $participant->type ) : ?>

	<fieldset>
		<legend><i class="icon i-closed-date"></i> <?php _e( 'Closed On', APP_TD ) ?></legend>
		<p class="worker-status-timestamp"><?php echo appthemes_display_date( $post->post_date ); ?></p>
	</fieldset>

<?php endif; ?>
