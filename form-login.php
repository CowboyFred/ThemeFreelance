<?php
/**
 * Password login page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="primary" class="content-area row">

	<div id="main" class="large-8 columns">

		<div class="row form-wrapper log-in">

			<div class="large-12 columns">

				<div class="row">
					<div class="large-6 columns login-box">

						<?php require APP_THEME_FRAMEWORK_DIR . '/templates/form-login.php'; ?>

					</div>

					<?php if ( get_option( 'users_can_register' ) ) { ?>
						<div class="large-6 columns">
							<div class="register-box">
								<h5><?php echo $hrb_options->registration_box_title; ?></h5>
								<p class="registration-message"><?php echo $hrb_options->registration_box_text; ?></p>
								<?php wp_register( '<div class="button form-field" id="register-now">','</div>' ); ?>
							</div>
						</div>
					<?php } ?>

				</div><!-- .row -->

			</div><!-- .columns -->

	</div><!-- .row -->

	</div><!-- #main -->

	<?php get_sidebar( app_template_base() ); ?>

</div><!-- #primary -->
