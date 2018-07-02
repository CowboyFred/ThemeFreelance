<?php
/**
 * Blog post single loop content template.
 *
 * @package HireBee\Templates
 * @since 1.4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

	<?php appthemes_before_blog_post_title(); ?>

	<div class="post-header cf">
		<div class="post-title">
			<?php
			if ( is_single() ) {
				the_title( '<h2 class="post-heading">', '</h2>' );
			} else {
				the_title( '<h2 class="post-heading"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>
			<div class="author-post-link"><?php echo get_the_hrb_author_posts_link(); ?></div>
			<div class="category-post-list"><?php
			/* translators: used between list items, there is a space after the comma */
			echo get_the_category_list( __( ', ', APP_TD ) );
			?></div>
		</div>

		<?php echo hrb_post_date_box(); ?>
	</div>

	<?php appthemes_after_blog_post_title(); ?>

	<div class="entry-content">

		<?php
		if ( is_single() ) {
			the_post_thumbnail( 'full', array( 'class' => 'featured-image' ) );
		}
		?>

		<?php appthemes_before_blog_post_content(); ?>

		<?php the_content( __( 'Read more', APP_TD ) ); ?>

		<?php appthemes_after_blog_post_content(); ?>

		<?php
		wp_link_pages( array(
			'before'      => '<nav class="page-links"><span class="page-links-title">' . __( 'Pages:', APP_TD ) . '</span>',
			'after'       => '</nav>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', APP_TD ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>

	</div><!-- .entry-content -->

	<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) {
		get_template_part( 'parts/content', 'bio' );
	}
	?>

	<?php if ( is_single() ) : ?>
		<footer class="entry-footer">
			<?php
				the_tags( '<p class="post-tags"><i class="fi-price-tag" aria-hidden="true"></i> <span class="label">', '</span> <span class="label">', '</span></p>' );

				/**
				 * Fires in the single page footer.
				 *
				 * @since 1.4.1
				 */
				do_action( 'hrb_single_template_footer' );

				edit_post_link( __( 'Edit', APP_TD ), '<span class="edit-link">', '</span>' );
			?>
		</footer>
	<?php endif; ?>

	<?php if ( function_exists( 'sharethis_button' ) && $hrb_options->blog_post_sharethis ) { ?>
		<section class="sharethis cf">
			<div class="sharethis"><?php sharethis_button(); ?></div>
		</section>
	<?php } ?>

	<?php get_template_part( 'parts/content', 'comments' ); ?>

</article>
