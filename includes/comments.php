<?php
/**
 * Custom comments functions
 *
 * @package HireBee
 * @since 1.4.0
 */

if ( ! function_exists( 'hrb_comments_callback' ) ) :
/**
 * Custom callback to list comments in HTML5
 * and include schema.org microdata.
 *
 * @since 1.4.1
 *
 * @param object $comment Comment to display.
 * @param array  $args    An array of arguments.
 * @param int    $depth   Depth of comment.
 *
 * @return void
*/
function hrb_comments_callback( $comment, $args, $depth ) {
	global $post;

	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? 'parent' : '' ); ?>>

		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<footer class="comment-meta-wrapper">
				
				<div class="comment-author">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( '%s', sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
					<?php
					if ( $comment->user_id === $post->post_author ) :
						$comment_badge = ( HRB_PROJECTS_PTYPE == $post->post_type ? __( 'project owner', APP_TD ) : __( 'author', APP_TD ) );
					?>
						<span class="label success comment-badge <?php esc_attr_e( $comment_badge ); ?>"><?php echo $comment_badge; ?></span>
					<?php endif; ?>
				</div> <!-- .comment-author -->

				<div class="comment-meta">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
						<time title="<?php esc_attr( printf( _x( '%1$s @ %2$s', '1: date, 2: time', APP_TD ), get_comment_date(), get_comment_time() ) ); ?>">
							<?php printf( _x( '%s ago', '%s = human-readable time difference', APP_TD ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
						</time>
					</a>
				</div> <!-- .comment-meta -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<div class="alert alert-info">
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', APP_TD ); ?></p>
					</div>
				<?php endif; ?>

			</footer> <!-- .comment-meta-wrapper -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div> <!-- .comment-content -->

			<?php
			comment_reply_link( array_merge( $args, array(
				'reply_text'    => __( 'Reply', APP_TD ),
				'reply_to_text' => __( 'Reply to %s', APP_TD ),
				'login_text'    => __( 'Log in to reply.', APP_TD ),
				'add_below'     => 'div-comment',
				'depth'         => $depth,
				'max_depth'     => $args['max_depth'],
				'before'        => '<span class="reply">',
				'after'         => '</span>',
			) ) );
			?>

		<?php edit_comment_link( __( 'Edit', APP_TD ), '<span class="edit-link">', '</span>' ); ?>

		</article> <!-- .comment-body -->
	<?php
	// The </li> is added by WordPress automatically.
}
endif;

/**
 * Use custom comment form arguments.
 *
 * This is so we can use Foundation markup and include
 * text for the .pot file vs using WordPress .pot
 *
 * @since 1.4.0
 *
 * @param array $defaults The default comment form arguments.
 */
function hrb_comment_form_defaults( $defaults ) {

	$post_id       = get_the_ID();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$defaults = array(
		'comment_field'        => '<div class="comment-form-comment"><label for="comment">' . _x( 'Message', 'noun', APP_TD ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" required="required"></textarea></div>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', APP_TD ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out</a>', APP_TD ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_submit'         => 'button',
		'name_submit'          => 'submit',
		'title_reply'          => __( 'Leave a Reply', APP_TD ),
		'title_reply_to'       => __( 'Leave a Reply to %s', APP_TD ),
		'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after'    => '</h3>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply', APP_TD ),
		'label_submit'         => __( 'Submit', APP_TD ),
		'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
		'format'               => 'html5',
	);

	// Don't show the login buttons for dispute comments.
	if ( hrb_is_disputes_enabled() && APP_DISPUTE_PTYPE == get_post_type() ) {
		$defaults['logged_in_as'] = '';
	}

	return $defaults;
}
add_filter( 'comment_form_defaults', 'hrb_comment_form_defaults' );


/**
 * Setup the comment form fields.
 *
 * @since 1.4.0
 *
 * @param array $fields The default comment fields.
 */
function hrb_comment_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );

	$fields    = array(
		'author' => '<div class="comment-form-author"><label for="author">' . __( 'Name', APP_TD ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="author" class="regular-text required" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . $html_req . ' /></div>',
		'email'  => '<div class="comment-form-email"><label for="email">' . __( 'Email', APP_TD ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="email" class="regular-text required email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',
		'url'    => '<div class="comment-form-url"><label for="url">' . __( 'Website', APP_TD ) . '</label><input id="url" class="regular-text" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '"></div>',
	);

	return $fields;
}
add_filter( 'comment_form_default_fields', 'hrb_comment_fields' );
