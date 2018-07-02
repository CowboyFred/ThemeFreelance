<?php
/**
 * The sidebar containing the archive widget area
 *
 * @package HireBee
 * @since 1.0.0
 */
?>

<div id="sidebar" class="large-4 columns" role="complementary">

	<div class="sidebar-widget-wrap">

		<div class="sidebar-archive">

			<form method="get" class="custom" action="<?php echo esc_url( get_the_hrb_refine_search_base_url() ); ?>">

				<div class="section-head">
					<button type="submit" class="search-button"><i class="fi-magnifying-glass"></i></button>
					<div class="search-field-wrap">
						<input type="search" placeholder="<?php echo esc_attr_x( 'Refine Search', 'placeholder', APP_TD ); ?>" name="refine_ls" class="text search" value="<?php esc_attr( hrb_output_search_query_var( 'ls' ) ); ?>" />
					</div>
					<?php if ( ! hrb_get_search_query_var( 'st' ) ) { ?>
						<input type="hidden" name="st" value="<?php echo esc_attr( HRB_PROJECTS_PTYPE ); ?>">
					<?php } ?>
				</div>

				<?php
				/**
				 * Fires after the sidebar refine search.
				 *
				 * @since 1.0.0
				 */
				do_action( 'hrb_sidebar_refine_search' );
				?>

				<?php if ( ! is_hrb_users_archive() && ! is_hrb_users_search() && ! is_tax( HRB_PROJECTS_CATEGORY ) ) { ?>
					<div id="refine-categories">
						<h4><?php _e( 'Categories', APP_TD ); ?></h4>
						<?php the_hrb_refine_category_ui( HRB_PROJECTS_CATEGORY ); ?>
					</div>
				<?php } ?>

				<?php if ( ! is_tax( HRB_PROJECTS_SKILLS ) ) { ?>
					<div id="refine-skills">
						<h4><?php _e( 'Skills', APP_TD ); ?></h4>
						<?php the_hrb_refine_skills_ui(); ?>
					</div>
				<?php } ?>

				<div id="refine-location">

					<h4><?php _e( 'Location', APP_TD ); ?></h4>

					<?php if ( ( ! empty( $_REQUEST['st'] ) && HRB_ROLE_FREELANCER == $_REQUEST['st'] ) || get_query_var( 'archive_freelancer' ) ) : ?>

						<?php the_hrb_refine_location_ui( HRB_ROLE_FREELANCER, 'users' ); ?>

					<?php else : ?>

						<?php the_hrb_refine_location_ui( HRB_ROLE_EMPLOYER ); ?>

					<?php endif; ?>

				</div>

				<?php appthemes_pass_request_var( array( HRB_PROJECTS_CATEGORY, HRB_PROJECTS_SKILLS ) ); ?>
				<?php appthemes_pass_request_var( 'post_type' ); ?>
				<?php appthemes_pass_request_var( 'ls' ); ?>
				<?php appthemes_pass_request_var( 'orderby' ); ?>
				<?php appthemes_pass_request_var( 'st' ); ?>

				<?php
				/**
				 * Fires in the refine search sidebar hidden fields area.
				 *
				 * @since 1.0.0
				 */
				do_action( 'hrb_sidebar_refine_search_hidden' );
				?>

				<input type="submit" class="button expand" value="<?php esc_attr_e( 'Update', APP_TD ); ?>" />
			</form>

		</div>

		<?php dynamic_sidebar( 'hrb-listings' ); ?>

	</div><!-- .sidebar-widget-wrap -->

</div><!-- #sidebar -->
