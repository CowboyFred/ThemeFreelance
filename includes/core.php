<?php
/**
 * Contains core functions.
 */

// taxonomies need to be registered before the post type, in order for the rewrite rules to work
add_action( 'init', '_hrb_register_taxonomies', 8 );
add_action( 'init', '_hrb_register_post_types', 9 );

add_filter( 'post_updated_messages', '_hrb_post_updated_messages' );

add_action( 'wp_login', '_hrb_redirect_after_login' );
add_action( 'app_login', '_hrb_redirect_after_login' );

add_action( 'appthemes_pagenavi_args', '_hrb_home_pagenavi_args' );


### Post Types & Taxonomies

/**
 * Register the main custom post types and statuses.
 */
function _hrb_register_post_types() {
	global $hrb_options;

	### Projects

	$labels = array(
		'name'                  => _x( 'Projects', 'post type general name', APP_TD ),
		'singular_name'         => _x( 'Project', 'post type singular name', APP_TD ),
		'add_new'               => __( 'Add New', APP_TD ),
		'add_new_item'          => __( 'Add New Project', APP_TD ),
		'edit_item'             => __( 'Edit Project', APP_TD ),
		'new_item'              => __( 'New Project', APP_TD ),
		'view_item'             => __( 'View Project', APP_TD ),
		'view_items'            => __( 'View Projects', APP_TD ),
		'search_items'          => __( 'Search Projects', APP_TD ),
		'not_found'             => __( 'No projects found.', APP_TD ),
		'not_found_in_trash'    => __( 'No projects found in Trash.', APP_TD ),
		'parent_item_colon'     => __( 'Parent Projects:', APP_TD ),
		'menu_name'             => _x( 'Projects', 'post type menu name', APP_TD ),
		'all_items'             => __( 'All Projects', APP_TD ),
		'archives'              => __( 'Project Archives', APP_TD ),
		'attributes'            => __( 'Project Attributes', APP_TD ),
		'insert_into_item'      => __( 'Insert into project', APP_TD ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', APP_TD ),
		'featured_image'        => __( 'Featured Image', APP_TD ),
		'set_featured_image'    => __( 'Set featured image', APP_TD ),
		'remove_featured_image' => __( 'Remove featured image', APP_TD ),
		'use_featured_image'    => __( 'Use as featured image', APP_TD ),
		'filter_items_list'     => __( 'Filter projects list', APP_TD ),
		'items_list_navigation' => __( 'Projects list navigation', APP_TD ),
		'items_list'            => __( 'Projects list', APP_TD ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'comments' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => $hrb_options->project_permalink, 'with_front' => false ),
		'capability_type'     => HRB_PROJECTS_PTYPE,
		'map_meta_cap'        => true,
		'menu_icon'           => 'dashicons-portfolio',
	);

	if ( current_user_can( 'manage_options' ) ) {
		$args['supports'][] = 'custom-fields';
	}

	register_post_type( HRB_PROJECTS_PTYPE, $args );

	$statuses = array(
		HRB_PROJECT_STATUS_WAITING_FUNDS => array(
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label'                     => __( 'Waiting Funds', APP_TD ),
			'label_count'               => _n_noop( 'Waiting Funds <span class="count">(%s)</span>', 'Waiting Funds <span class="count">(%s)</span>', APP_TD ),
		),
		HRB_PROJECT_STATUS_TERMS => array(
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label'                     => __( 'Discussing Terms', APP_TD ),
			'label_count'               => _n_noop( 'Discussing Terms <span class="count">(%s)</span>', 'Discussing Terms <span class="count">(%s)</span>', APP_TD ),
		),
		HRB_PROJECT_STATUS_WORKING => array(
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label'                     => __( 'In Development', APP_TD ),
			'label_count'               => _n_noop( 'In Development <span class="count">(%s)</span>', 'In Development <span class="count">(%s)</span>', APP_TD ),
		),
		HRB_PROJECT_STATUS_CLOSED_COMPLETED => array(
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label'                     => __( 'Completed', APP_TD ),
			'label_count'               => _n_noop( 'Closed Completed <span class="count">(%s)</span>', 'Closed Completed <span class="count">(%s)</span>', APP_TD ),
		),
		HRB_PROJECT_STATUS_CLOSED_INCOMPLETE => array(
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label'                     => __( 'Closed Incomplete', APP_TD ),
			'label_count'               => _n_noop( 'Closed Incomplete <span class="count">(%s)</span>', 'Closed Incomplete <span class="count">(%s)</span>', APP_TD ),
		),
		HRB_PROJECT_STATUS_CANCELED => array(
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label'                     => __( 'Canceled', APP_TD ),
			'label_count'               => _n_noop( 'Canceled <span class="count">(%s)</span>', 'Canceled <span class="count">(%s)</span>', APP_TD ),
		),
		HRB_PROJECT_STATUS_CANCELED_TERMS => array(
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label'                     => __( 'Canceled Terms', APP_TD ),
			'label_count'               => _n_noop( 'Canceled Terms<span class="count">(%s)</span>', 'Canceled Terms <span class="count">(%s)</span>', APP_TD ),
		),
		HRB_PROJECT_STATUS_EXPIRED => array(
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label'                     => __( 'Expired', APP_TD ),
			'label_count'               => _n_noop( 'Expired <span class="count">(%s)</span>', 'Expired <span class="count">(%s)</span>', APP_TD ),
		),
	);

	foreach( $statuses as $status => $args ) {
		register_post_status( $status, $args );
	}
}

/**
 * Callback for WordPress 'post_updated_messages' filter.
 *
 * @since 1.4.0
 *
 * @param  array $messages The array of messages.
 * @return array $messages The array of messages.
 */
function _hrb_post_updated_messages( $messages ) {
	global $post, $post_ID;

	$messages[ HRB_PROJECTS_PTYPE ] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => sprintf( __( 'Project updated. <a href="%s">View project</a>', APP_TD ), esc_url( get_permalink( $post_ID ) ) ),
		2  => __( 'Custom field updated.', APP_TD ),
		3  => __( 'Custom field deleted.', APP_TD ),
		4  => __( 'Project updated.', APP_TD ),
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Project restored to revision from %s', APP_TD ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => sprintf( __( 'Project published. <a href="%s">View project</a>', APP_TD ), esc_url( get_permalink( $post_ID ) ) ),
		7  => __( 'Project saved.', APP_TD ),
		8  => sprintf( __( 'Project submitted. <a target="_blank" href="%s">Preview project</a>', APP_TD ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9  => sprintf( __( 'Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>', APP_TD ), date_i18n( __( 'M j, Y @ G:i', APP_TD ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Project draft updated. <a target="_blank" href="%s">Preview project</a>', APP_TD ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);

	return $messages;
}

/**
 * Register custom taxonomies.
 */
function _hrb_register_taxonomies() {
	global $hrb_options;

	### Categories

	$labels = array(
		'name'                       => _x( 'Project Categories', 'taxonomy general name', APP_TD ),
		'singular_name'              => _x( 'Project Category', 'taxonomy singular name', APP_TD ),
		'search_items'               => __( 'Search Project Categories', APP_TD ),
		'popular_items'              => __( 'Popular Project Categories', APP_TD ),
		'all_items'                  => __( 'All Project Categories', APP_TD ),
		'parent_item'                => __( 'Parent Project Category', APP_TD ),
		'parent_item_colon'          => __( 'Parent Project Category:', APP_TD ),
		'edit_item'                  => __( 'Edit Project Category', APP_TD ),
		'update_item'                => __( 'Update Project Category', APP_TD ),
		'add_new_item'               => __( 'Add New Project Category', APP_TD ),
		'new_item_name'              => __( 'New Project Category Name', APP_TD ),
		'separate_items_with_commas' => __( 'Separate project categories with commas', APP_TD ),
		'add_or_remove_items'        => __( 'Add or remove project categories', APP_TD ),
		'choose_from_most_used'      => __( 'Choose from the most used project categories', APP_TD ),
		'not_found'                  => __( 'No project categories found.', APP_TD ),
		'no_terms'                   => __( 'No project categories', APP_TD ),
		'items_list_navigation'      => __( 'Project categories list navigation', APP_TD ),
		'items_list'                 => __( 'Project categories list', APP_TD ),
		'menu_name'                  => _x( 'Categories', 'taxonomy menu name', APP_TD ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'hierarchical'      => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'       => $hrb_options->project_permalink . '/' . $hrb_options->project_cat_permalink,
			'with_front' => false,
		),
	);

	register_taxonomy( HRB_PROJECTS_CATEGORY, HRB_PROJECTS_PTYPE, $args );


	### Tags

	$labels = array(
		'name'                       => _x( 'Project Tags', 'taxonomy general name', APP_TD ),
		'singular_name'              => _x( 'Project Tag', 'taxonomy singular name', APP_TD ),
		'search_items'               => __( 'Search Project Tags', APP_TD ),
		'popular_items'              => __( 'Popular Project Tags', APP_TD ),
		'all_items'                  => __( 'All Project Tags', APP_TD ),
		'parent_item'                => __( 'Parent Project Tag', APP_TD ),
		'parent_item_colon'          => __( 'Parent Project Tag:', APP_TD ),
		'edit_item'                  => __( 'Edit Project Tag', APP_TD ),
		'view_item'                  => __( 'View Project Tag', APP_TD ),
		'update_item'                => __( 'Update Project Tag', APP_TD ),
		'add_new_item'               => __( 'Add New Project Tag', APP_TD ),
		'new_item_name'              => __( 'New Project Tag Name', APP_TD ),
		'separate_items_with_commas' => __( 'Separate project tags with commas', APP_TD ),
		'add_or_remove_items'        => __( 'Add or remove project tags', APP_TD ),
		'choose_from_most_used'      => __( 'Choose from the most used project tags', APP_TD ),
		'not_found'                  => __( 'No project tags found.', APP_TD ),
		'no_terms'                   => __( 'No project tags', APP_TD ),
		'items_list_navigation'      => __( 'Project tags list navigation', APP_TD ),
		'items_list'                 => __( 'Project tags list', APP_TD ),
		'menu_name'                  => _x( 'Tags', 'taxonomy menu name', APP_TD ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_tagcloud'     => true,
		'hierarchical'      => false,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'       => $hrb_options->project_permalink . '/' . $hrb_options->project_tag_permalink,
			'with_front' => false,
		),
	);

	register_taxonomy( HRB_PROJECTS_TAG, HRB_PROJECTS_PTYPE, $args );


	### Skills

	$labels = array(
		'name'                       => _x( 'Skills', 'taxonomy general name', APP_TD ),
		'singular_name'              => _x( 'Skill', 'taxonomy singular name', APP_TD ),
		'search_items'               => __( 'Search Skills', APP_TD ),
		'popular_items'              => __( 'Popular Skills', APP_TD ),
		'all_items'                  => __( 'All Skills', APP_TD ),
		'parent_item'                => __( 'Parent Skill', APP_TD ),
		'parent_item_colon'          => __( 'Parent Skill:', APP_TD ),
		'edit_item'                  => __( 'Edit Skill', APP_TD ),
		'view_item'                  => __( 'View Skill', APP_TD ),
		'update_item'                => __( 'Update Skill', APP_TD ),
		'add_new_item'               => __( 'Add New Skill', APP_TD ),
		'new_item_name'              => __( 'New Skill', APP_TD ),
		'separate_items_with_commas' => __( 'Separate skills with commas', APP_TD ),
		'add_or_remove_items'        => __( 'Add or remove skills', APP_TD ),
		'choose_from_most_used'      => __( 'Choose from the most used skills', APP_TD ),
		'not_found'                  => __( 'No skills found.', APP_TD ),
		'no_terms'                   => __( 'No skills', APP_TD ),
		'items_list_navigation'      => __( 'Skills list navigation', APP_TD ),
		'items_list'                 => __( 'Skills list', APP_TD ),
		'menu_name'                  => _x( 'Skills', 'taxonomy menu name', APP_TD ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'hierarchical'      => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'       => $hrb_options->project_permalink . '/' . $hrb_options->project_skill_permalink,
			'with_front' => false,
		),
	);

	register_taxonomy( HRB_PROJECTS_SKILLS, HRB_PROJECTS_PTYPE, $args );
}

/**
 * Redirects the user to the frontpage if the 'redirect_to' post data is not present.
 */
function _hrb_redirect_after_login() {
	if ( ! isset( $_REQUEST['redirect_to'] ) || home_url() == $_REQUEST['redirect_to'] ) {
		$url = esc_url_raw( hrb_get_dashboard_url_for() );
		wp_redirect( $url );
		exit();
	}
}

/**
 * Retrieve additional args to be used with PageNavi.
 */
function _hrb_home_pagenavi_args( $args ) {
	global $hrb_options;

	if ( is_archive() || is_hrb_users_archive() ) {
		return $args;
	}

	if ( ! empty( $args['paginate_projects'] ) ) {
		$listings_permalink = $hrb_options->project_permalink;
	} elseif ( !empty( $args['paginate_users'] ) ) {
		$listings_permalink = $hrb_options->user_permalink;
	}

	if ( !empty( $listings_permalink ) ) {
		$base = trailingslashit( home_url() );
		$args['base'] = str_replace( $base, $base . $listings_permalink . '/', $args['base'] );
	}
	return $args;
}
