<?php
/**
 * The template for displaying the footer
 *
 * Displays all of the footer elements.
 *
 * @package HireBee
 * @since 1.0.0
 */
?>

<footer id="footer" class="site-footer" role="contentinfo">

	<div class="footer-top row widgets-footer">

		<?php get_sidebar( 'footer' ); ?>

	</div><!-- .footer-top -->

	<div class="row">
		<div class="large-12 columns">
			<div class="divider"></div>
		</div>
	</div>

	<div class="row footer-bottom">

		<div id="theme-info" class="footer-info large-6 medium-6 columns">

			<div class="footer-credits">
				<?php if ( get_theme_mod( 'footer_copyright_text' ) ) : ?>
					<?php echo get_theme_mod( 'footer_copyright_text' ); ?>
				<?php else : ?>
					<a href="https://www.appthemes.com/themes/hirebee/" target="_blank" rel="nofollow">HireBee Theme</a> | <?php _e( 'Powered by', APP_TD ); ?> <a href="https://www.wordpress.org" target="_blank" rel="nofollow">WordPress</a>
				<?php endif; ?>
			</div>

		</div>

		 <div class="footer-links large-6 medium-6 columns">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
				'menu_class'     => 'inline-list right',
				'fallback_cb'    => false,
				'depth'          => 1,
			) );
			?>
		</div>

	</div><!-- .footer-bottom -->

</footer><!-- #footer -->
