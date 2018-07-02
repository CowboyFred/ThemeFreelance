<?php
/**
 * Template Name: How it Works
 *
 * @todo Remove this template. Use full-page instead
 *       and populate on install with placeholder content.
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<?php appthemes_before_page_loop(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php appthemes_before_page(); ?>

			<?php get_template_part( 'parts/content', 'page' ); ?>

			<?php appthemes_after_page(); ?>

		<?php endwhile; ?>

		<?php appthemes_after_page_loop(); ?>

	</div><!-- #main -->

	<?php get_sidebar( 'page' ); ?>

</div><!-- #primary -->
