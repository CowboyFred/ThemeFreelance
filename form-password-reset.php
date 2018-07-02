<?php
/**
 * Password reset page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<div class="row form-wrapper reset-password">

			<div class="large-12 columns">

				<?php get_template_part( 'form-password-reset-fields' ); ?>

			</div><!-- .columns -->

		</div><!-- .row -->

	</div><!-- #main -->

	<?php get_sidebar( app_template_base() ); ?>

</div><!-- #primary -->
