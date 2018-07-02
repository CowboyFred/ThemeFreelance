<?php
/**
 * The template for displaying comments
 *
 * @package HireBee
 * @since 1.0.0
 * @since 1.4.0 Cleaned up code, fixed bugs, and made more efficient.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="row">
	<div class="columns-12">

		<div class="section-head">
			<a id="add-review" name="add-review"></a>
		</div>

		<?php appthemes_before_comments(); ?>

		<?php if ( have_comments() ) : ?>
			<h2 id="comments-title">
				<?php
				$comments_number = get_comments_number();
				if ( 1 == $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One response to &ldquo;%s&rdquo;', 'comments title', APP_TD ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments/messages, 2: post title */
						_nx(
							'%1$s response to &ldquo;%2$s&rdquo;',
							'%1$s responses to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							APP_TD
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
				?>
			</h2>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 150,
						'callback'    => 'hrb_comments_callback',
						'short_ping'  => true,
					) );
				?>
			</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', APP_TD ); ?></h2>
				<div class="nav-links">
					<div class="row">
						<div class="nav-previous small-6 columns"><?php previous_comments_link( esc_html__( '&larr; Older Comments', APP_TD ) ); ?></div>
						<div class="nav-next small-6 columns text-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', APP_TD ) ); ?></div>
					</div> <!-- .row -->
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Discussion is closed.', APP_TD ); ?></p>
	<?php endif; ?>

		<?php appthemes_after_comments(); ?>

		<?php appthemes_before_comments_form(); ?>

		<?php comment_form(); ?>

		<?php appthemes_after_comments_form(); ?>

	</div>
</div><!-- #comments -->
