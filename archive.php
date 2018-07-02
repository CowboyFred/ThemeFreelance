<?php
/**
 * The archive page template file
 *
 * @package HireBee\Templates
 * @since 1.4.1
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h3 class="page-title">', '</h3>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/content', get_post_type() ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'parts/content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #main -->

	<?php get_sidebar( 'blog' ); ?>

</div><!-- #primary -->
