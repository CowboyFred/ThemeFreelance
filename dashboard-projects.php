<?php
/**
 * User dashboard projects template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 *
 */
?>

<h2><i class="icon i-project"></i><?php _e( 'Projects', APP_TD  ); ?></h2>

<div class="content-projects">

		<div class="section-container auto section-tabs project-trunk" data-section data-options="deep_linking: true">

			<section class="<?php echo esc_attr( 'projects' == hrb_get_dashboard_page() ? 'active' : '' ); ?>">

				<p class="title" data-section-title><a href="#projects"><?php _e( 'My Projects', APP_TD ); ?></a></p>

				<div class="content" data-section-content>
					<?php appthemes_load_template( 'dashboard-projects-section-projects.php', array( 'projects_no_filters' => $projects_no_filters, 'projects' => $projects ) ); ?>
				</div>

			</section>

			<section class="<?php echo esc_attr( 'favorites' == hrb_get_dashboard_page() ? 'active' : '' ); ?>">

				<p class="title" data-section-title><a href="#favorites"><?php _e( 'Favorites', APP_TD ); ?></a></p>

				<div class="content" data-section-content>
					<?php appthemes_load_template( 'dashboard-projects-section-favorites.php', array( 'projects' => $favorites ) ); ?>
				</div>

			</section>

			<?php do_action( 'hrb_dashboard_projects_tabs' ); ?>

		</div>

</div>
