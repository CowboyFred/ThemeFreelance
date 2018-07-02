<?php
/**
 * The sidebar containing the footer widget area
 *
 * @package HireBee
 * @since 1.4.0
 */

// If none of the sidebars have widgets, then let's exit.
if ( ! is_active_sidebar( 'hrb-footer' ) && ! is_active_sidebar( 'hrb-footer2' ) && ! is_active_sidebar( 'hrb-footer3' ) ) {
	return;
}

// Footer can be setup to a maximum of 3 columns.
$sidebars = (int) is_active_sidebar( 'hrb-footer' ) + (int) is_active_sidebar( 'hrb-footer2' ) + (int) is_active_sidebar( 'hrb-footer3' );

if ( ! $sidebars ) {
	$sidebars = 1;
}

$columns = 12 / $sidebars;
?>

<?php if ( is_active_sidebar( 'hrb-footer' ) ) { ?>
	<div id="footer-widget1" class="widget-area <?php echo "large-{$columns}"; ?> columns" role="complementary">
		<?php dynamic_sidebar( 'hrb-footer' ); ?>
	</div><!-- .widget-area -->
<?php } ?>

<?php if ( is_active_sidebar( 'hrb-footer2' ) ) { ?>
	<div id="footer-widget2" class="widget-area <?php echo "large-{$columns}"; ?> columns" role="complementary">
		<?php dynamic_sidebar( 'hrb-footer2' ); ?>
	</div><!-- .widget-area -->
<?php } ?>

<?php if ( is_active_sidebar( 'hrb-footer3' ) ) { ?>
	<div id="footer-widget3" class="widget-area <?php echo "large-{$columns}"; ?> columns" role="complementary">
		<?php dynamic_sidebar( 'hrb-footer3' ); ?>
	</div><!-- .widget-area -->
<?php } ?>
