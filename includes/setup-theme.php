<?php
/**
 * Functions related with the base theme setup: menus, sidebars, styles, scripts, etc.
 */

/**
 * Register menus, sidebars and other important theme related stuff.
 *
 * @since 1.0.0
 */
function _hrb_setup_theme() {
	global $hrb_options;

	/**
	 * Register menus.
	 *
	 * @since 1.0.0
	 */
	register_nav_menus( array(
		'header' => __( 'Header Menu', APP_TD ),
		'footer' => __( 'Footer Menu', APP_TD ),
	) );

	/**
	 * Enable support for post thumbnails on posts and pages.
	 *
	 * @since 1.0.0
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 *
	 * @since 1.0.0
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for a custom background image.
	 *
	 * @since 1.0.0
	 */
	add_theme_support( 'custom-background', apply_filters( 'hrb_custom_background_args', array(
		'wp-head-callback' => 'hrb_custom_background_cb',
	) ) );

	/**
	 * Enable support for a custom logo.
	 *
	 * @since 1.4.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 150,
		'flex-width'  => true,
		'flex-height' => false,
	) );
}
add_action( 'after_setup_theme', '_hrb_setup_theme' );

/**
 * Enqueues core JS scripts to be used on all pages
 *
 * @since 1.0.0
 * @since 1.4.0 Moved all main enqueue scripts into this function.
 */
function _hrb_enqueue_core_scripts() {
	global $hrb_options;

	$min = hrb_get_minified_suffix();

	// Set the assets path so we don't repeat ourselves.
	$assets_path = get_template_directory_uri() . '/assets';

	/**
	 * Core Stylesheets.
	 */

	// Load the core foundation files.
	wp_enqueue_style( 'hrb-normalize', get_template_directory_uri() . "/styles/core/normalize{$min}.css", array(), '7.0.0' );
	wp_enqueue_style( 'hrb-foundation', get_template_directory_uri() . "/styles/core/foundation{$min}.css", array(), '4.3.2' );

	// Foundation 6.4.x is installed. Uncomment and then comment out hrb-normalize and hrb-foundation above.
	// Also do the same for the Foundation scripts below. Not using b/c theme needs to be rebuilt to use v6.x.
	//wp_enqueue_style( 'hrb-foundation', get_template_directory_uri() . "/assets/css/foundation{$min}.css", array(), '6.4.1' );

	// Load the Google fonts.
	wp_enqueue_style( 'googleFonts', hrb_google_fonts_url(), false );

	// Load the theme stylesheet.
	wp_enqueue_style( 'hrb-styles', $assets_path . "/css/style{$min}.css", array(), HRB_VERSION );

	// Load the rtl theme stylesheet.
	wp_style_add_data( 'hrb-styles', 'rtl', 'replace' );

	/**
	 * We are replacing the existing file, and we use a
	 * suffix like `-min` so we need to let core know about it.
	 * That way, it can keep that suffix after the added `-rtl`.
	 * Without this code, we get 404 with this style.min-rtl.css.
	 */
	wp_style_add_data( 'hrb-styles', 'suffix', $min );

	if ( ! is_child_theme() ) {
		wp_enqueue_style( 'hrb-color', get_template_directory_uri() . "/styles/$hrb_options->color.css", array(), HRB_VERSION );
	}

	/**
	 * Core Scripts.
	 */

	if ( wp_is_mobile() ) {
		wp_enqueue_script( 'zepto', get_template_directory_uri() . "/scripts/core/zepto{$min}.js", false, HRB_VERSION, true );
		$fnd_dependency = array( 'zepto' );
	} else {
		$fnd_dependency = array( 'jquery' );
	}

	// Load the Foundation scripts.
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . "/scripts/core/custom.modernizr{$min}.js", array( 'jquery' ), '2.6.2', true );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . "/scripts/core/foundation{$min}.js", $fnd_dependency, '4.3.2', true );

	// Foundation 6.4.x is installed. Uncomment and then comment out modernizr and foundation above.
	//wp_enqueue_script( 'foundation', $assets_path . "/js/lib/foundation/foundation{$min}.js", array( 'jquery' ), '6.4.1', true );
	//wp_enqueue_script( 'foundation-motion-ui', $assets_path . "/js/lib/foundation/motion-ui{$min}.js", array( 'jquery', 'foundation' ), '1.2.2', true );

	// Load the main theme scripts.
	wp_enqueue_script( 'hrb-scripts', $assets_path . "/js/theme-scripts{$min}.js", array( 'jquery' ), HRB_VERSION, true );

	// Load any global options we want to access via js (e.g. hrb_i18n.ajaxurl).
	wp_localize_script( 'hrb-scripts', 'hrb_i18n', hrb_theme_scripts_strings() );
}
add_action( 'wp_enqueue_scripts', '_hrb_enqueue_core_scripts' );

/**
 * Registers JS scripts to be selectively enqueued later.
 *
 * This function is called throughout the theme so
 * don't combine with _hrb_enqueue_core_scripts()
 *
 * @since 1.0.0
 */
function _hrb_register_scripts() {
	global $hrb_options;

	$min = hrb_get_minified_suffix();

	// Load some 3rd party scripts.
	wp_register_script( 'jquery-tagmanager', get_template_directory_uri() . "/assets/js/lib/tagmanager/tagmanager{$min}.js", array('jquery'), '3.0.0', true );
	wp_register_script( 'jquery-select2', get_template_directory_uri() . "/assets/js/lib/select2/select2{$min}.js", array( 'jquery' ), '3.5.0', true );

	// Load the custom theme scripts.
	wp_register_script( 'app-saved-filter', get_template_directory_uri() . "/scripts/saved-filters{$min}.js", array( 'jquery' ), HRB_VERSION, true );
	wp_register_script( 'app-project-edit', get_template_directory_uri() . "/scripts/project-edit{$min}.js", array( 'jquery' ), HRB_VERSION, true );
	wp_register_script( 'app-proposal-edit', get_template_directory_uri() . "/scripts/proposal-edit{$min}.js", array( 'jquery' ), HRB_VERSION, true );
	wp_register_script( 'app-dashboard', get_template_directory_uri() . "/scripts/dashboard{$min}.js", array( 'jquery' ), HRB_VERSION, true );
	wp_register_script( 'app-workspace', get_template_directory_uri() . "/scripts/workspace{$min}.js", array( 'jquery' ), HRB_VERSION, true );
	wp_register_script( 'app-proposal-agreement', get_template_directory_uri() . "/scripts/proposal-agreement{$min}.js", array( 'jquery' ), HRB_VERSION, true );
}
add_action( 'wp_enqueue_scripts', '_hrb_register_scripts' );

/**
 * Registers CSS styles to be selectively enqueued later.
 *
 * This function is called throughout the theme so
 * don't combine with _hrb_enqueue_core_scripts()
 *
 * @since 1.0.0
 */
function _hrb_register_styles() {

	$min = hrb_get_minified_suffix();

	wp_register_style( 'jquery-tagmanager', get_template_directory_uri() . "/assets/js/lib/tagmanager/tagmanager{$min}.css", array(), '3.0.0' );
	wp_register_style( 'jquery-select2', get_template_directory_uri() . "/assets/js/lib/select2/select2{$min}.css", array(), '3.5.0' );
}
add_action( 'wp_enqueue_scripts', '_hrb_register_styles' );

/**
 * Global text strings we want to access via js.
 *
 * Add any values we want to access via js.
 * Use var hrb_i18n to access ajaxurl or current_url.
 *
 * @since 1.4.0
 */
function hrb_theme_scripts_strings() {
	global $post, $hrb_options;

	if ( ! empty( $post->ID ) ) {
		$nonce = $post->ID;
	} else {
		$nonce = 0;
	}

	$strings = array(
		'ajaxurl'              => admin_url( 'admin-ajax.php' ),
		'ajax_nonce'           => wp_create_nonce( "listing-{$nonce}" ),
		'ajaxloader'           => html( 'img', array( 'class' => 'processing', 'src' => get_template_directory_uri() . '/images/processing.gif' ) ),
		'current_url'          => scbUtil::get_current_url(),
		'dashboard'            => hrb_get_dashboard_page(),
		'user_id'              => get_current_user_id(),
		'file_upload_required' => __( 'Please upload some files.', APP_TD ),
		'loading_img'          => '',
		'loading_msg'          => '',
		'categories_menu'      => ! wp_is_mobile() ? $hrb_options->categories_menu['show'] : '',
	);

	/**
	 * Filters the theme script strings.
	 * Ideal for dynamic values and strings that require translation.
	 *
	 * @since 1.4.0
	 *
	 * @param array $strings List of theme script strings.
	 */
	return apply_filters( 'hrb_theme_scripts_strings', $strings );
}

/**
 * Build the url for Google fonts we use.
 *
 * @since 1.4.0
 */
function hrb_google_fonts_url() {

	// Set the default Google fonts we want to use.
	$defaults = array(
		'Open Sans'     => array(
			'weights' => array( '300italic', '400italic', '600italic', 300, 400, 600 ),
		),
		'Titillium Web' => array(
			'weights' => array( 400, 700 ),
		)
	);

	/**
	 * Filters the default Google fonts used.
	 *
	 * @since 1.4.0
	 *
	 * @param array $defaults The default font values.
	 */
	$fonts = apply_filters( 'hrb_google_font_args', $defaults );

	foreach ( $fonts as $font => $value ) {
		$weight = '';

		if ( isset( $value['weights'] ) ) {
			$weight = implode( ',', $value['weights'] );
		}

		$output     = ( ! empty( $weight ) ) ? ':' . $weight : '';
		$families[] = urlencode( $font . $output );
	}

	return add_query_arg( 'family', implode( '|', $families ), 'https://fonts.googleapis.com/css' );
}

/**
 * Registers common backend/frontend JS scripts.
 */
function hrb_register_common_scripts() {

	$min = hrb_get_minified_suffix();

	wp_register_script( 'hrb-user-edit', get_template_directory_uri() . "/scripts/user-edit{$min}.js", null, HRB_VERSION, true );

	wp_localize_script( 'hrb-user-edit', 'app_user_edit_i18n', array(
		'geocomplete_options' => hrb_get_geocomplete_options('user'),
	) );
}

/**
 * Outputs the login styling for the login page.
 */
function _hrb_login_styling() {

	$header_image = get_header_image();

	if ( ! empty( $header_image ) ) {
?>
		<style>
			body.login div#login h1 a {
				background-image: url('<?php header_image(); ?>');
				width: <?php echo HEADER_IMAGE_WIDTH; ?>;
				height: <?php echo HEADER_IMAGE_HEIGHT; ?>;
			}
		</style>
<?php
	}
}
add_action( 'login_enqueue_scripts', '_hrb_login_styling' );

/**
 * Retrieves a 'not-logged-in' CSS class to the be used in the page body if user is not logged in.
 */
function _hrb_body_class( $classes ) {

	if ( ! is_user_logged_in() ) {
		$classes[] = 'not-logged-in';
	}
	return $classes;
}
add_filter( 'body_class', '_hrb_body_class' );

/**
 * Update the favicon with every theme updated.
 */
function _hrb_favicon( $favicon ) {
	return add_query_arg( array( 'ver'=> HRB_VERSION ), appthemes_locate_template_uri( 'images/favicon.ico' ) );
}
add_filter( 'appthemes_favicon', '_hrb_favicon' );

/**
 * Retrieves the URL to be used on the site logo.
 */
function _hrb_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', '_hrb_login_logo_url' );

/**
 * Retrieves the description to be used with the logo.
 */
function _hrb_login_logo_url_title() {
	return get_bloginfo( 'description' );
}
add_filter( 'login_headertitle', '_hrb_login_logo_url_title' );


### Helper functions

/**
 * Default callback to output a background image/color.
 *
 * //@todo check if needed on final design
 */
function hrb_custom_background_cb() {

	$background = get_background_image();
	$color = get_background_color();

	if ( ! $background && ! $color ) {
		return;
	}

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {

		$image  = " background-image: url('$background');";
		$repeat = get_theme_mod( 'background_repeat', 'repeat' );

		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) ) {
			$repeat = 'repeat';
		}

		$repeat   = " background-repeat: $repeat;";
		$position = get_theme_mod( 'background_position_x', 'left' );

		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) ) {
			$position = 'left';
		}

		$position   = " background-position: top $position;";
		$attachment = get_theme_mod( 'background_attachment', 'scroll' );

		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) ) {
			$attachment = 'scroll';
		}

		$attachment = " background-attachment: $attachment;";
		$style .= $image . $repeat . $position . $attachment;

	} else if ( ! $background && $color ) {
		$style .= " background-image: none; ";
	}
?>
	<style type="text/css">
		body.custom-background { <?php echo trim( $style ); ?> }
	</style>
<?php
}

/**
 * Register scripts and enqueue them as needed.
 */
function hrb_register_enqueue_scripts( $scripts, $admin_only = false ) {

	// Register common backend/frontend scripts.
	hrb_register_common_scripts();

	if ( ! $admin_only ) {
		_hrb_register_scripts();
	}

	wp_enqueue_script( $scripts );
}

/**
 * Register styles and enqueue them as needed.
 */
function hrb_register_enqueue_styles( $styles ) {
	_hrb_register_styles();
	wp_enqueue_style( $styles );
}

/**
 * Enqueues the geo complete scripts if requested.
 */
function hrb_maybe_enqueue_geo( $callback = '' ) {

	if ( ! current_theme_supports( 'app-geo' ) ) {
		return;
	}

	appthemes_enqueue_geo_scripts( $callback );

	// enqueued later
	wp_enqueue_script( 'app-geocomplete', get_template_directory_uri() . "/assets/js/lib/geocomplete/geocomplete.min.js", array( 'jquery', 'google-maps-api' ), '1.4', true );
}

/**
 * Retrieves the '.min' suffix for CSS/JS files on a live site considering SCRIPT_DEBUG constant.
 *
 * @since 1.3.2
 */
function hrb_get_minified_suffix() {
	return ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
}


### External Plugins

/**
 * Social Connect plugin compatibility.
 */
function _hrb_sc_connect_grab_login_redirect() {
	if ( ! empty( $_POST['action'] ) && 'social_connect' == $_POST['action'] ) {
		return false;
	}

	return true;
}

### External Plugins Compatibility

// SocialConnect plugin.
if ( function_exists( 'sc_render_login_form_social_connect' ) ) {
	add_action( 'hrb_after_admin_bar_login_form', 'sc_render_login_form_social_connect' );
	add_action( 'app_login_pre_redirect', '_hrb_sc_connect_grab_login_redirect' );
}

// ShareThis plugin.
function _hrb_maybe_unhook_sharethis() {

	if ( ! function_exists('sharethis_button') ) {
		return;
	}

	remove_filter( 'the_content', 'st_add_widget' );
	remove_filter( 'the_excerpt', 'st_add_widget' );
}
add_action( 'wp_head', '_hrb_maybe_unhook_sharethis' );

/**
 * Add support for the language files and set location.
 *
 * @since 1.4.0
 */
function hrb_setup_language_support() {
	/**
	 * We want more control over the language file location.
	 *
	 * @todo Remove this once the function has been deprecated from theme-framework.
	 *
	 * @since 1.4.0
	 */
	remove_action( 'appthemes_theme_framework_loaded', 'appthemes_load_textdomain' );

	/**
	 * Add support for language files.
	 *
	 * Looks in WP_LANG_DIR . '/themes/' first otherwise
	 * For example: wp-content/languages/themes/hirebee-de_DE.mo
	 *
	 * Otherwise defaults to: "wp-content/themes/hirebee/languages/$domain . '-' . $locale.mo"
	 *
	 * @since 1.4.0
	 */
	load_theme_textdomain( APP_TD, get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'hrb_setup_language_support' );

/**
 * Disable the front-end admin bar for non-admins.
 *
 * @since 1.4.0
 */
function hrb_disable_admin_bar() {
	/**
	 * Filter the allowed capability to view the front-end admin bar.
	 *
	 * @url https://codex.wordpress.org/Roles_and_Capabilities
	 *
	 * @since 1.4.0
	 *
	 * @param string $capability The minimum WordPress capability allowed.
	 *                           Defaults to 'manage_options'.
	 */
	$capability = apply_filters( 'hrb_disable_admin_bar', 'manage_options' );

	if ( ! current_user_can( $capability ) && ! is_admin() ) {
		add_filter( 'show_admin_bar', '__return_false' );
	}
}
add_action( 'after_setup_theme', 'hrb_disable_admin_bar' );
