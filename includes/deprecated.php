<?php
/**
 * Deprecated functions.
 */

/**
 * Wrapper for 'wp_update_post()' to update a post status.
 *
 * @deprecated 1.3.2
 */
function hrb_update_post_status( $post_id, $new_status ) {
	_deprecated_function( __FUNCTION__, '1.3.2', 'wp_update_post()' );

	return wp_update_post( array(
		'ID'          => $post_id,
		'post_status' => $new_status,
	) );
}

/**
 * Enqueues core CSS styles to be used on all pages.
 *
 * @deprecated 1.4.0
 */
function _hrb_enqueue_core_styles() {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Enqeues Google fonts.
 *
 * @deprecated 1.4.0
 */
function _hrb_load_fonts() {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Simple wrapper to get the stylesheet.
 *
 * @deprecated 1.4.0
 */
function hrb_get_stylesheet_uri() {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Outputs the site header logo applying any
 * attributes from the WordPress site customizer.
 *
 * @deprecated 1.4.0
 */
function the_hrb_logo() {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Disables the hierarchy in the footer.
 *
 * @deprecated 1.4.0
 */
function _hrb_disable_hierarchy_in_footer( $items, $args ) {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Retrieves custom attributes for a sidebar type.
 *
 * @deprecated 1.4.0
 */
function hrb_get_sidebar_attributes( $type ) {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Wrapper function used to register sidebars with common custom attributes.
 *
 * @deprecated 1.4.0
 */
function hrb_register_sidebar( $id, $name, $description = '', $type = 'default' ) {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Outputs the main navigation menu below the site title.
 */
function the_hrb_nav_menu() {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Outputs the footer navigation menu.
 *
 * @since 1.0.0
 */
function the_hrb_footer_menu() {
	_deprecated_function( __FUNCTION__, '1.4.0' );
	return false;
}

/**
 * Outputs the available actions for a user (edit profile, etc).
 *
 * @uses do_action() Calls 'hrb_output_user_actions'
 *
 * @since 1.0.0
 */
function the_hrb_user_actions( $user = '' ) {
	_deprecated_function( __FUNCTION__, '1.4.1' );
	return false;
}

/**
 * Outputs the formatted link for editing a user profile.
 *
 * @since 1.0.0
 */
function the_hrb_user_edit_profile_link( $user = '', $text = '', $before = '', $after = '' ) {
	_deprecated_function( __FUNCTION__, '1.4.1' );
	return false;
}


/**
 * Deprecated action and filter hooks
 *
 * $old_hook, $new_hook, $version, $hook_type, $args
 */
appthemes_deprecate_hook( 'hrb_sidebar_attributes', '', '1.4.0', 'filter' );
