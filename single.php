<?php
/**
 * The single post template file
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<?php appthemes_before_blog_loop(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php appthemes_before_blog_post(); ?>

			<?php get_template_part( 'parts/content', get_post_type() ); ?>

			<?php appthemes_after_blog_post(); ?>

		<?php endwhile; ?>

		<?php appthemes_after_blog_loop(); ?>

	</div><!-- #main -->

	<?php get_sidebar( 'blog' ); ?>

</div><!-- #primary -->
