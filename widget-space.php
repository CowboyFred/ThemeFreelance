<?php
/**
 * Ad space widget
 *
 * @package HireBee\Widgets
 * @since 1.0.0
 */
?>

<?php if ( is_active_sidebar( $sidebar_id ) ) : ?>

	<?php if ( 'header' == $position ) : ?>

		<div id="header-ad">
			<div class="ad-space">
				<?php dynamic_sidebar( $sidebar_id ); ?>
			</div><!-- .ad-space -->
		</div><!-- .header-ad -->

	<?php elseif ( 'listing' == $position ) : ?>

		<div class="ad-space">
			<?php dynamic_sidebar( $sidebar_id ); ?>
		</div><!-- .ad-space -->

	<?php else : ?>

		<div class="top-widgets">
			<?php dynamic_sidebar( $sidebar_id ); ?>
		</div><!-- .top-widgets -->

	<?php endif; ?>

<?php endif; ?>
