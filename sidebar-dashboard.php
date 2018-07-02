<?php
/**
 * The sidebar containing the user dashboard widget area
 *
 * @package HireBee
 * @since 1.0.0
 */
?>

<div id="sidebar" class="large-4 columns dashboard-side" role="complementary">

	<div class="sidebar-widget-wrap sidebar-dashboard">

		<?php appthemes_before_sidebar_widgets( 'dashboard' ); ?>

		<aside class="user-info-wrap">

			<div class="section-head">
				<h3><?php printf( __( 'Welcome, %s', APP_TD ), $dashboard_user->display_name ); ?></h3>
			</div>

			<div class="user-meta-wrap cf">
				<div class="user-gravatar"><?php the_hrb_user_gravatar( $dashboard_user->ID, 200 ); ?></div>
				<div class="user-name"><?php echo $dashboard_user->first_name; ?> <?php echo $dashboard_user->last_name; ?></div>
			</div>

			<div class="dashboard-edit-profile"><?php echo html_link( appthemes_get_edit_profile_url(), __( 'Edit Profile', APP_TD ) ); ?></div>

		</aside>

		<?php if ( current_user_can( 'edit_projects' ) ) { ?>
			<aside class="add-project-wrap">
				<div class="add-project"><span>+</span><?php echo html_link( get_the_hrb_project_create_url(), __( 'Add a Project', APP_TD ) ); ?></div>
			</aside>
		<?php } ?>

		<aside id="dashboard-side-nav">

			<div class="section-head">
				<h3><?php _e( 'Dashboard', APP_TD ); ?></h3>
			</div>

			<ul class="dashboard-links">
				<li class="notifications <?php hrb_dashboard_current_page_class( 'dashboard' ); ?>">
					<a href="<?php echo esc_url( hrb_get_dashboard_url_for() ); ?>"><?php _e( 'Recent', APP_TD ); ?></a>
				</li>
				<li class="notifications <?php hrb_dashboard_current_page_class( 'notifications' ); ?>">
					<a href="<?php echo esc_url( hrb_get_dashboard_url_for( 'notifications' ) ); ?>"><?php _e( 'Notifications', APP_TD ); ?></a>
				</li>
				<li class="projects <?php hrb_dashboard_current_page_class( 'projects' ); ?>">
					<a href="<?php echo esc_url( hrb_get_dashboard_url_for( 'projects') ); ?>"><?php _e( 'Projects', APP_TD ); ?></a>
				</li>
				<?php if ( current_user_can( 'edit_bids' ) && appthemes_get_user_total_bids( $dashboard_user->ID ) > 0  ): ?>
					<li class="proposals <?php hrb_dashboard_current_page_class( 'proposals' ); ?>">
						<a href="<?php echo esc_url( hrb_get_dashboard_url_for( 'proposals' ) ); ?>"><?php _e( 'Proposals', APP_TD ); ?></a>
					</li>
				<?php endif; ?>
				<?php if ( hrb_get_dashboard_reviews() ) : ?>
					<li class="reviews <?php hrb_dashboard_current_page_class( 'reviews' ); ?>">
						<a href="<?php echo esc_url( hrb_get_dashboard_url_for( 'reviews' ) ); ?>"><?php _e( 'Reviews', APP_TD ); ?></a>
					</li>
				<?php endif; ?>
				<li class="payments <?php hrb_dashboard_current_page_class( 'payments' ); ?>">
					<a href="<?php echo esc_url( hrb_get_dashboard_url_for( 'payments' ) ); ?>"><?php _e( 'Payments', APP_TD ); ?></a>
				</li>
			</ul>

		</aside>

		<aside id="dashboard-acct-stats">

			<div class="section-head">
				<h3><?php _e( 'Stats', APP_TD ); ?></h3>
			</div>

			<ul class="dashboard-stats">
				<li class="rating">
					<?php _e( 'Rating', APP_TD ); ?>
					<span><?php the_hrb_user_rating( $dashboard_user, '&ndash;' ); ?></span>
				</li>
				<li class="projects-current">
					<?php _e( 'Active Projects', APP_TD ); ?>
					<span><?php the_hrb_user_related_active_projects_count( $dashboard_user ); ?></span>
				</li>
				<li class="projects-complete">
					<?php _e( 'Projects Completed', APP_TD ); ?>
					<span><?php the_hrb_user_completed_projects_count( $dashboard_user ); ?></span>
				</li>
				<li class="reviews-received">
					<?php _e( 'Reviews Received', APP_TD ); ?>
					<span><?php the_hrb_user_total_reviews( $dashboard_user ); ?></span>
				</li>
				<li class="reviews-given">
					<?php _e( 'Reviews Given', APP_TD ); ?>
					<span><?php the_hrb_user_total_authored_reviews( $dashboard_user ); ?></span>
				</li>
				<li class="reviews-success_rate">
					<?php _e( 'Success Rate', APP_TD ); ?>
					<span><?php the_hrb_user_success_rate( $dashboard_user ); ?></span>
				</li>
			</ul>

		</aside>

		<aside id="dashboard-acct-info">

			<div class="section-head">
				<h3><?php _e( 'Account Info', APP_TD ); ?></h3>
			</div>

			<ul class="links">
				<li><?php _e( 'Email shared in projects:', APP_TD ); ?></li>
				<?php the_hrb_user_contact_info( $dashboard_user->ID, '<li>', '</li>' ); ?>
			</ul>

		</aside>

		<?php appthemes_after_sidebar_widgets( 'dashboard' ); ?>

	</div><!-- .sidebar-widget-wrap -->

</div><!-- #sidebar -->
