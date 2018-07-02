<?php
/**
 * Setup the sidebars.
 *
 * @package HireBee
 * @since   1.4.0
 */

if ( ! function_exists( 'hrb_register_sidebars' ) ) :
/**
 * Register sidebar widget areas.
 *
 * @since 1.4.0
 */
function hrb_register_sidebars() {

	register_sidebar( array(
		'name'          => __( 'Blog - Sidebar', APP_TD ),
		'id'            => 'hrb-blog',
		'description'   => __( 'This is your blog sidebar.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Main - Sidebar', APP_TD ),
		'id'            => 'hrb-main',
		'description'   => __( 'This is your main sidebar.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page - Sidebar', APP_TD ),
		'id'            => 'hrb-page',
		'description'   => __( 'This is your page sidebar.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Create Project - Sidebar', APP_TD ),
		'id'            => 'hrb-create-project',
		'description'   => __( 'This is your create a project sidebar.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Create Proposal - Sidebar', APP_TD ),
		'id'            => 'hrb-create-proposal',
		'description'   => __( 'This is your create a proposal sidebar.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Transfer Funds - Sidebar', APP_TD ),
		'id'            => 'hrb-transfer-funds',
		'description'   => __( 'This is your transfer funds sidebar.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Listings - Sidebar', APP_TD ),
		'id'            => 'hrb-listings',
		'description'   => __( 'This is your projects/freelancers listings sidebar.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Project - Sidebar', APP_TD ),
		'id'            => 'hrb-single-project',
		'description'   => __( 'This is your single project sidebar.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Project Listings Ad - Sidebar', APP_TD ),
		'id'            => 'hrb-project-ads',
		'description'   => __( 'An optional sidebar to display ads on project listing pages.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'User Listings Ad - Sidebar', APP_TD ),
		'id'            => 'hrb-user-ads',
		'description'   => __( 'An optional sidebar to display ads on user listing pages.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'User Profile - Sidebar', APP_TD ),
		'id'            => 'hrb-profile',
		'description'   => __( 'The sidebar for the user profile page.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Dashboard Activity Header - Sidebar', APP_TD ),
		'id'            => 'hrb-activity-header',
		'description'   => __( 'An optional sidebar to display on the users activity dashboard header.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Dashboard Activity Footer - Sidebar', APP_TD ),
		'id'            => 'hrb-activity-footer',
		'description'   => __( 'An optional sidebar to display on the users activity dashboard footer.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Support for legacy header nav. 1.4.0
	// Moved widget default content to index.php page content.
	if ( is_active_sidebar( 'hrb-header-nav' ) ) :
		register_sidebar( array(
			'name'          => __( 'Header Nav - Sidebar', APP_TD ),
			'id'            => 'hrb-header-nav',
			'description'   => __( 'An optional sidebar below the main navigation bar.', APP_TD ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	endif;

	register_sidebar( array(
		'name'          => __( 'Header - Sidebar', APP_TD ),
		'id'            => 'hrb-header',
		'description'   => __( 'An optional sidebar for your site header.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area One', APP_TD ),
		'id'            => 'hrb-footer',
		'description'   => __( 'An optional widget area for your site footer.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title-wrap"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area Two', APP_TD ),
		'id'            => 'hrb-footer2',
		'description'   => __( 'An optional widget area for your site footer.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title-wrap"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area Three', APP_TD ),
		'id'            => 'hrb-footer3',
		'description'   => __( 'An optional widget area for your site footer.', APP_TD ),
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title-wrap"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
}
endif;
add_action( 'widgets_init', 'hrb_register_sidebars' );
