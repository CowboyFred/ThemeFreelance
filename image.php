<?php
/**
 * The template for displaying image attachments
 *
 * @package HireBee\Templates
 * @since 1.4.1
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-12 columns no-gradient">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'parts/content', 'image' ); ?>

			<?php get_template_part( 'parts/content', 'comments' ); ?>

		<?php endwhile; ?>

	</div><!-- #main -->

</div><!-- #primary -->
