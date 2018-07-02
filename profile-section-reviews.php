<?php
/**
 * The user reviews tab section template file
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="reviews">

	<?php if ( $reviews ): ?>

		<ul class="reviews">

			<?php foreach ( $reviews as $review ) : ?>
				  <?php appthemes_load_template( 'parts/content-review.php', array( 'review' => $review, 'reviewer' => get_userdata( $review->get_author_ID() ) ) ); ?>
			<?php endforeach; ?>

		</ul>

	<?php else : ?>

		<h5 class="no-results"><?php _e( 'No reviews yet.', APP_TD ); ?></h5>

	<?php endif; ?>

<div class="section-footer row">
</div><!-- .section-footer -->

</div><!-- #reviews -->
