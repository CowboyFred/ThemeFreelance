<?php
/**
 * The template for displaying user listings
 *
 * @package Vantage\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<?php get_template_part( 'parts/loop', HRB_FREELANCER_UTYPE ); ?>

	</div><!-- #main -->

	<?php get_sidebar( 'archive' ); ?>

</div><!-- #primary -->
