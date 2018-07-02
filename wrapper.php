<?php
/**
 * The main page wrapper for serving up all content
 *
 * Loads each content template within this wrapper.
 *
 * @package HireBee
 *
 * @since 1.0.0
 * @since 1.4.0 Updated and rebuilt for modern standards.
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<title><?php wp_title(''); ?></title>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php appthemes_before(); ?>

		<div id="content">

			<?php appthemes_before_header(); ?>

			<?php get_header( app_template_base() ); ?>

			<?php appthemes_after_header(); ?>

			<div class="full-width">

				<?php do_action( 'hrb_content_container_top' ); ?>

				<div id="notices" class="row">

					<div class="small-12 columns">

						<?php do_action( 'appthemes_notices' ); ?>

					</div><!-- .columns -->

				</div><!-- #appthemes_notices -->

				<?php load_template( app_template_path() ); ?>

			</div><!-- .full-width -->

			<?php appthemes_before_footer(); ?>

			<?php get_footer( app_template_base() ); ?>

			<?php appthemes_after_footer(); ?>

		</div><!-- #content -->

		<?php appthemes_after(); ?>

		<?php wp_footer(); ?>

	</body>
</html>
