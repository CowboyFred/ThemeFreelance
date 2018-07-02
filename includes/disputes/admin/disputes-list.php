<?php
/**
 * Disputes admin listings.
 *
 * @package Components\Disputes\Admin
 * @since 1.0.0
 */

/**
 * Customize dispute columns.
 *
 * @since 1.0.0
 */
function _appthemes_dispute_manage_columns( $columns ) {

	$comments = $columns['comments'];
	$date     = $columns['date'];
	$author   = $columns['author'];

	unset( $columns['author'] );
	unset( $columns['date'] );
	unset( $columns['comments'] );

	$columns['status']   = __( 'Status', APP_TD );
	$columns['author']   = __( 'Disputer', APP_TD );
	$columns['comments'] = $comments;
	$columns['date']     = $date;

	return $columns;
}
add_filter( 'manage_' . APP_DISPUTE_PTYPE . '_posts_columns', '_appthemes_dispute_manage_columns', 11 );

/**
 * Add data to customized columns.
 *
 * @since 1.0.0
 */
function _appthemes_dispute_add_column_data( $column_index, $post_id ) {

	switch ( $column_index ) {

		case 'status':
			$post   = get_post( $post_id );
			$status = appthemes_get_disputes_statuses_verbiages( $post->post_status );
			echo $status;
			break;
	}
}
add_action( 'manage_' . APP_DISPUTE_PTYPE . '_posts_custom_column', '_appthemes_dispute_add_column_data', 10, 2 );

/**
 * Provide sorting functionality to disputes columns.
 *
 * @since 1.0.0
 */
function _appthemes_dispute_columns_sort( $columns ) {
	$columns['status'] = 'status';
	return $columns;
}
add_filter( 'manage_edit-' . APP_DISPUTE_PTYPE . '_sortable_columns', '_appthemes_dispute_columns_sort' );
