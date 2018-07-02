<?php
/**
 * Template Name: Projects & Freelancers Listings
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'parts/hero', 'cover' ); ?>

	<div id="primary" class="content-area row">

		<div id="main" class="large-8 columns">

			<?php do_action( 'hrb_front_loops' ); ?>

		</div><!-- #main -->

		<?php get_sidebar( app_template_base() ); ?>

	</div><!-- #primary -->

<?php endwhile; ?>
