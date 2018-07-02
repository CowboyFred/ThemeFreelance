<?php
/**
 * User registration page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<div class="row form-wrapper register">

			<div class="large-12 columns">

				<?php if ( get_option( 'users_can_register' ) ) : ?>

					<?php appthemes_load_template( 'form-registration-main.php' ); ?>

				<?php else: ?>

					<h3><?php _e( 'User registration has been disabled.', APP_TD ); ?></h3>

				<?php endif; ?>

			</div><!-- .columns -->

		</div><!-- .row -->

	</div><!-- #main -->

	<?php get_sidebar( app_template_base() ); ?>

</div><!-- #primary -->
