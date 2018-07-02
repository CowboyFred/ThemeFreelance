<?php
/**
 * The template for displaying the top navigation
 *
 * @package HireBee
 * @since 1.4.0
 */
?>

<div class="top-navigation">
	<div class="row">

		<div class="large-12 columns">

			<nav id="top-bar-primary" class="top-bar" role="navigation">

				<ul class="title-area">
					<li class="name"></li>
					<li class="toggle-topbar menu-icon"><a href="#"><span><?php _e( 'Menu', APP_TD ); ?></span></a></li>
				</ul>

				<section class="top-bar-section">
					<ul class="left">
						<?php do_action( 'hrb_before_social_nav_links' ); ?>
						<?php the_hrb_social_nav_links(); ?>
						<?php do_action( 'hrb_after_social_nav_links' ); ?>
					</ul>
				</section>

				<section class="top-bar-section">
					<ul class="right">
						<?php do_action( 'hrb_before_user_nav_links' ); ?>
						<?php the_hrb_user_nav_links(); ?>
						<?php do_action( 'hrb_after_user_nav_links' ); ?>
					</ul>
				</section>

			</nav><!-- .top-bar -->

		</div><!-- .columns -->

	</div><!-- .row -->
</div><!-- .top-navigation -->
