<?php
/**
 * Project details agreement page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<div class="dashboard dashboard-agreement">

			<?php if ( $proposal->selected ) { ?>
				<h2><i class="icon i-agreement"></i><?php _e( 'Agreement', APP_TD  ); ?></h2>
			<?php } else { ?>
				<h2><i class="icon i-proposal-details"></i><?php _e( 'Details', APP_TD  ); ?></h2>
			<?php } ?>

			<fieldset class="proposal">

				<div class="row">
					<div class="large-12 columns">
						<legend class="project-title"><span><?php the_hrb_project_title(); ?></span></legend>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns proposal-meta">

						<fieldset class="large-4 columns budget">
							<span class="project-budget"><i class="icon i-budget"></i><small><?php _e( 'Budget:', APP_TD  ); ?></small> <?php the_hrb_project_budget(); ?></span>
						</fieldset>

						<fieldset class="large-4 columns average">
							<span class="project-avg-bid"><i class="icon i-avg-proposals"></i><small><?php _e( 'Avg. Proposals:', APP_TD  ); ?></small> <?php echo appthemes_display_price( appthemes_get_post_avg_bid( get_the_ID() ) ); ?></span>
						</fieldset>

						<fieldset class="large-4 columns total">
							<span class="project-total-bids"><i class="icon i-proposals-count"></i><small><?php echo __( 'Total Proposals:', APP_TD  ); ?></small> <?php echo appthemes_get_post_total_bids( get_the_ID() ); ?></span>
						</fieldset>

					</div>
				</div>

			</fieldset>

			<div class="agreement">

				<fieldset>

					<legend><?php _e( 'User Info', APP_TD ); ?></legend>
					<div class="row">
						<div class="large-12 columns">
							<div class="row">
								<div class="large-3 columns user-meta-info">
									<?php the_hrb_user_bulk_info( $proposal->user_id, array( 'show_gravatar' => array( 'size' => 65 ) ) ); ?>
								</div>
								<div class="large-9 columns">
									<p class="proposal-user-description"><?php the_hrb_user_bio( $proposal->user_id ); ?></p>
									<div title="<?php esc_attr_e( __( 'User skills', APP_TD ) ); ?>" class="proposal-user-skills user-skills"><?php the_hrb_user_skills( $proposal->user_id, ' ', '<span class="label">', '</span>' ); ?></div>
								</div>
							</div>
						</div>
					</div>

				</fieldset>

				<fieldset>

					<legend><?php _e( 'Proposal', APP_TD ); ?></legend>

						<div class="row section-primary-info">
							<div class="large-4 small-6 columns proposal-amount">
								<span data-tooltip title="<?php esc_attr_e( 'Estimated cost', APP_TD ); ?>"><i class="icon i-budget-alt"></i><?php the_hrb_proposal_amount( $proposal ); ?></span>
							</div>
							<div class="large-4 small-6 columns proposal-delivery-date">
								<span data-tooltip title="<?php esc_attr_e( 'Days to complete', APP_TD ); ?>"><i class="icon i-days-deliver"></i><?php echo $proposal->_hrb_delivery . ' ' . $proposal->label_delivery_unit; ?></span>
							</div>
							<div class="large-4 columns proposal-date">
								<span data-tooltip title="<?php esc_attr_e( 'Submitted', APP_TD ); ?>"><i class="icon i-proposal-date"></i><?php the_hrb_proposal_posted_time_ago( $proposal ); ?></span>
							</div>
						</div>

				</fieldset>

				<fieldset>

					<legend><?php _e( 'Description', APP_TD ); ?></legend>

					<div class="row">
						<div class="large-12 columns dashboard-proposal-description">
							<span><?php echo sanitize_text_field( $proposal->comment_content ); ?></span>
						</div>
					</div>

				</fieldset>

				<?php do_action( 'hrb_proposal_agreement_custom_fields', $proposal ) ; ?>

				<?php appthemes_load_template( "form-proposal-agreement-{$user_relation}.php" ); ?>

			</div>

		</div>

	</div><!-- #main -->

	<?php appthemes_load_template( 'sidebar-dashboard.php' ); ?>

</div><!-- #primary -->
