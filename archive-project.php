<?php
/**
 * The template for displaying project listings
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<?php get_template_part( 'parts/loop', HRB_PROJECTS_PTYPE ); ?>

	</div><!-- #main -->

	<?php get_sidebar( 'archive' ); ?>

</div><!-- #primary -->
