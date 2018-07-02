<?php
/**
 * Password recovery page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<div class="row form-wrapper recover-password">

			<div class="large-12 columns">

				<?php require APP_THEME_FRAMEWORK_DIR . '/templates/form-password-recovery.php'; ?>

			</div><!-- .columns -->

		</div><!-- .recover-password -->

	</div><!-- #main -->

	<?php get_sidebar( app_template_base() ); ?>

</div><!-- #primary -->
