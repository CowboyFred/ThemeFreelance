<?php
/**
 * The pagination template file
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<nav class="fl-pagination">

	<div class="pagination-centered">

		<ul class="pagination">
			<?php if ( ! is_front_page() ) : ?>

				<?php the_hrb_pagination( $wp_query_object, $pagination_args ); ?>

			<?php else : ?>

				<li>
					<a href="<?php echo esc_url( $pagination_args['base_url'] ); ?>">&rarr;</a>
				</li>

			<?php endif; ?>
		</ul>

	</div>

</nav>
