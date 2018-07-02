<?php
/**
 * The create project page template
 * and also used as the edit project page
 *
 * Template Name: Create Project
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row create-project purchase-plans">

	<div id="main" class="large-8 columns create-projects-section">

		<div class="form-wrapper">
			<?php appthemes_display_form_progress(); ?>
			<?php appthemes_display_checkout(); ?>
		</div>

	</div><!-- #main -->

	<?php get_sidebar( 'create-project' ); ?>

</div><!-- #primary -->
