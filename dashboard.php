<?php
/**
 * User dashboard main page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<?php do_action( 'hrb_dashboard', $dashboard_type ); ?>

		<?php do_action( 'hrb_before_dashboard_' . $dashboard_type ); ?>

		<div class="dashboard dashboard-<?php echo esc_attr( $dashboard_type ); ?>">
			<?php appthemes_load_template( $dashboard_template );  ?>
		</div>

		<?php do_action( 'hrb_after_dashboard_' . $dashboard_type ); ?>

	</div><!-- #main -->

	<?php appthemes_load_template( 'sidebar-dashboard.php' ); ?>

</div><!-- #primary -->
