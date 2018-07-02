<?php
/**
 * The purchase credits page template
 *
 * Template Name: Purchase Credits
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns order-checkout purchase-plans">

		<div class="form-wrapper">
			<?php appthemes_display_form_progress(); ?>
			<?php appthemes_display_checkout(); ?>
		</div>

	</div><!-- #main -->

	<?php get_sidebar( 'create-proposal' ); ?>

</div><!-- #primary -->
