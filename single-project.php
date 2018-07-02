<?php
/**
 * The single project template file
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'parts/content', 'project-single' ); ?>

		<?php endwhile; ?>

	</div><!-- #main -->

	<?php get_sidebar( 'project' ); ?>

</div><!-- #primary -->
