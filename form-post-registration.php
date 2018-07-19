<?php
/**
 * User registration page template
 *
 * Template Name: Post Authorisation
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

                    <form action="<?php echo appthemes_get_registration_url( 'login_post' ); ?>" method="post" class="login-form register-form custom" name="registerform" id="login-form">

                        <fieldset>

                            <div class="row">
                                <div class="large-6 columns form-field user-role-type">
                                    <label><?php _e( 'Role:', APP_TD ); ?></label>
                                    <select name="role">
                                        <option value="<?php echo esc_attr( HRB_ROLE_EMPLOYER ); ?>"><?php _e( 'Employer', APP_TD ); ?></option>
                                        <option value="<?php echo esc_attr( HRB_ROLE_FREELANCER ); ?>"><?php _e( 'Freelancer', APP_TD ); ?></option>
                                        <?php if ( $hrb_options->share_roles_caps ) { ?>
                                            <option value="<?php echo esc_attr( HRB_ROLE_BOTH ); ?>"/> <?php _e( 'Both', APP_TD ) ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-field">
                                <?php echo HRB_Login_Registration::redirect_field(); ?>
                                <input tabindex="30" type="submit" class="btn reg" id="finish" name="finish" value="<?php esc_attr_e( 'Finish Authorisation', APP_TD ); ?>" />
                            </div>

                        </fieldset>

                    </form>

				<?php else: ?>

					<h3><?php _e( 'User registration has been disabled.', APP_TD ); ?></h3>

				<?php endif; ?>

			</div><!-- .columns -->

		</div><!-- .row -->

	</div><!-- #main -->

	<?php get_sidebar( app_template_base() ); ?>

</div><!-- #primary -->
