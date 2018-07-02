<?php
/**
 * The template for displaying hero background images.
 *
 * @package HireBee\Templates
 * @since 1.4.0
 */
?>

<?php
// Support for legacy header nav. 1.4.0 Moved widget default content to index.php page content
if ( is_active_sidebar( 'hrb-header-nav' ) ) : ?>

	<?php if ( ( 'front' == $hrb_options->custom_header_vis && is_front_page() ) || 'any' == $hrb_options->custom_header_vis ) { ?>
		<!-- widgetized area below navbar -->
		<?php hrb_display_ad_sidebar( 'hrb-header-nav', $position = 'inside' ); ?>
	<?php } ?>

<?php else : ?>

	<section <?php echo apply_filters( 'hrb_background_cover', 'home-cover entry-cover', array( 'size' => 'full' ) ); ?>>

		<div class="row">

			<div class="small-12 columns">

				<header class="entry-header">

					<div class="summary">
						<?php strip_shortcodes( the_content() ); ?>
					</div>

					<?php
					/**
					 * Fires in the home page header.
					 *
					 * @since 1.4.0
					 */
					do_action( 'hrb_home_template_header' );
					?>

				</header>

			</div><!-- .columns -->

		</div><!-- .row -->

	</section>

<?php endif; ?>
