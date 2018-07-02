<?php
/**
 * The sidebar containing the project author widget area
 *
 * @package HireBee
 * @since 1.0.0
 */
?>

<aside id="appthemes_posted_by" class="widget widget-posted-by">

	<div class="single-posted-by-widget">

		<div class="row">
			<div class="small-4 columns posted-by-gravatar-widget">
				<?php the_hrb_user_gravatar( $user, $size = 200 ); ?>
			</div>

			<div class="small-8 columns posted-by-widget">
				<span class="meta posted-by"><?php _e( 'Posted by', APP_TD ); ?></span>
				<span class="meta name"><?php echo html_link( get_the_hrb_user_profile_url( $user ), $user->display_name ); ?></span>
				<span class="meta member"><?php _e( 'Member Since:', APP_TD ); ?> <?php the_hrb_user_member_since( $user ); ?></span>
				<span class="meta location"><i class="icon i-user-location"></i> <?php the_hrb_user_location( $user ); ?></span>
				<span class="meta rating"><?php printf( __( 'Rating: %1$s (%2$s)', APP_TD ), get_the_hrb_user_avg_rating( $user ), sprintf( _n( '1 Review', '%d Reviews', number_format_i18n( $user_reviews ), APP_TD ), number_format_i18n( $user_reviews ) ) ); ?></span>
			</div>
		</div>

	</div><!-- .single-posted-by-widget -->

	<div class="single-by-widget-meta">

			<div class="row user-projects-stats">
				<div class="small-6 large-6 columns active-projects">
					<span>
						<i class="icon i-active-projects"></i><small><?php _e( 'Active Projects:', APP_TD ); ?></small>
						<?php echo the_hrb_user_related_active_projects_count( $user ); ?>
					</span>
				</div>
				<div class="small-6 large-6 columns completed-projects">
					<span>
						<i class="icon i-completed-projects"></i><small><?php _e( 'Completed Projects:', APP_TD ); ?></small>
						<?php echo the_hrb_user_completed_projects_count( $user ); ?>
					</span>
				</div>
			</div>

			<div class="row more-projects-link">
				<div class="columns">
					<?php echo html_link( get_the_hrb_user_profile_url( $user ), sprintf( __( "See all %s's projects", APP_TD ), $user->display_name ) ); ?>
				</div>
			</div>

	</div>

</aside>
