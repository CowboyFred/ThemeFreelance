<?php
/**
 * Project workspace manage reviewer section template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div class="row workspace-type-reviewer">
	<div class="section-container project-trunk auto section-tabs" data-section data-options="deep_linking: true">

		<section class="active">

			<p class="title" data-section-title><a href="#manage"><?php _e( 'Employer', APP_TD ); ?></a></p>

			<div class="content" data-section-content="">
				<?php appthemes_load_template( "dashboard-workspace-section-manage-employer.php" ); ?>
			</div>

		</section>

		<section>

			<p class="title" data-section-title><a href="#manage"><?php _e( 'Worker', APP_TD ); ?></a></p>

			<div class="content" data-section-content="">
				<?php appthemes_load_template( "dashboard-workspace-section-manage-worker.php" ); ?>
			</div>

		</section>

	</div>
</div>
