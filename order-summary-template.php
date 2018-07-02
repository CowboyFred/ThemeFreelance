<?php
/**
 * Main order summary page content
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row create-project purchase-plans">

	<div id="main" class="large-8 columns create-projects-section">

		<div class="form-wrapper checkout-process">
			<?php appthemes_display_form_progress(); ?>
			<?php appthemes_load_template( $template, $vars ); ?>
		</div>

	</div><!-- #main -->

	<?php get_sidebar( $sidebar ); ?>

</div><!-- #primary -->
