<?php
/**
 * The transfer funds page template
 *
 * Template Name: Transfer Funds
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns order-checkout transfer-funds">

		<div class="form-wrapper">

			<?php appthemes_display_checkout(); ?>

		</div>

	</div><!-- #main -->

	<?php get_sidebar( 'transfer-funds' ); ?>

</div><!-- #primary -->
