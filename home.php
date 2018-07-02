<?php
/**
 * Template Name: Blog
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<div id="posts">

			<?php appthemes_before_blog_loop(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/content', get_post_type() ); ?>

			<?php endwhile; ?>

			<?php appthemes_after_blog_loop(); ?>

			<?php if ( $wp_query->max_num_pages > 1 ) { ?>
				<nav class="pagination">
					<?php appthemes_pagenavi(); ?>
				</nav>
			<?php } ?>

		</div><!-- #posts -->

	</div><!-- #main -->

	<?php get_sidebar( 'blog' ); ?>

</div><!-- #primary -->
