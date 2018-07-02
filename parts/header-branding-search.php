<?php
/**
 * The template for displaying the header branding & search area
 *
 * @package HireBee
 * @since 1.4.0
 */
?>

<div class="row header-branding-wrap">

	<div class="large-5 columns">

		<div class="site-branding">

			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
				<?php the_custom_logo(); ?>
			<?php } else { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="custom-logo-link" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hirebee-logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php } ?>

			<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color:#<?php header_textcolor(); ?>"><?php bloginfo( 'name' ); ?></a></h2>

			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description" style="color:#<?php header_textcolor(); ?>;"><?php echo $description; ?></p>
			<?php endif; ?>

		</div><!-- .site-branding -->

	</div>

	<div class="large-7 columns top-navigation-header">

		<form method="get" action="<?php echo esc_url( trailingslashit( home_url() ) ); ?>">

			<div class="row">

				<div class="large-3 columns project-dropdown">
					<?php the_hrb_search_dropdown( array( 'name' => 'drop-search' ) ); ?>
				</div>

				<div class="large-9 columns search-field">
					<input type="search" id="search" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', APP_TD ); ?>" name="ls" class="text search" value="<?php esc_attr( hrb_output_search_query_var( 'ls' ) ); ?>" />
					<div class="search-btn">
							<button type="submit" id="search-submit" class="search-button"><i class="fi-magnifying-glass"></i></button>
					</div>
				</div>

				<input type="hidden" id="st" name="st" value="<?php echo esc_attr( hrb_get_search_query_var( 'st' ) ? hrb_get_search_query_var( 'st' ) : HRB_PROJECTS_PTYPE ); ?>">

			</div><!-- .row -->

		</form>

	</div><!-- .columns -->

</div><!-- .row -->
