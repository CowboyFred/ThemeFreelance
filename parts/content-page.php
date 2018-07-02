<?php
/**
 * Page loop content template.
 *
 * @package HireBee\Templates
 * @since 1.4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

	<div class="entry-content">

		<?php the_post_thumbnail( 'full', array( 'class' => 'featured-image' ) ); ?>

		<?php appthemes_before_page_content(); ?>

		<?php the_content(); ?>

		<?php appthemes_after_page_content(); ?>

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

	<?php edit_post_link( __( 'Edit', APP_TD ), '<span class="edit-link">', '</span>' ); ?>

	<?php get_template_part( 'parts/content', 'comments' ); ?>

</article>
