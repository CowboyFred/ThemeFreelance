<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package HireBee\Templates
 * @since 1.4.0
 */
?>

<section class="no-results not-found">

	<div class="section-head">
		<h1 class="post-heading"><?php _e( 'Nothing Found', APP_TD ); ?></h1>
	</div>

	<div class="page-content">

		<p><?php _e( "We can't find what you're looking for. Perhaps search can help.", APP_TD ); ?></p>
		<?php get_search_form(); ?>
		
	</div><!-- .page-content -->

</section><!-- .no-results -->
