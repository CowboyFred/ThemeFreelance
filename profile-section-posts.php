<?php
/**
 * The user posts tab section template file
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="posts">

	<div class="article-header row">

		<?php if ( $user_posts->have_posts() ) : ?>

			<?php while ( $user_posts->have_posts() ) : $user_posts->the_post(); ?>

				<article class="post">
					<div class="post-header cf">
						<div class="post-title">
							<h2 class="post-heading"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<div class="author-post-link"><?php echo get_the_hrb_author_posts_link(); ?></div>
							<div class="category-post-list"><?php
							/* translators: used between list items, there is a space after the comma */
							echo get_the_category_list( __( ', ', APP_TD ) );
							?></div>
						</div>

						<?php echo hrb_post_date_box(); ?>
					</div>
				</article>

			<?php endwhile; ?>

		<?php else : ?>

			<div class="large-12 columns">
				<h4><?php _e( 'No posts found.', APP_TD ); ?></h4>
			</div>

		<?php endif; ?>

		<div class="section-footer row">

			<!-- pagination -->
			<?php
			if ( $user_posts->max_num_pages > 1 ) {
				hrb_output_pagination( $user_posts, array() );
			}
			?>

		</div><!-- .section-footer -->

	</div>

</div><!-- #posts -->
