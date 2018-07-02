<?php
/**
 * The user projects tab section template file
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="projects-<?php echo $relation; ?>">

	<?php if ( $projects->have_posts() ) : ?>

	<div class="projects-active">

			<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>

				<?php appthemes_load_template( 'parts/content-project-secondary.php', array( 'content' => 'profile' ) ); ?>

			<?php endwhile; ?>

	</div>

	<div class="section-footer">

		<?php hrb_display_ad_sidebar( 'hrb-project-ads' ); ?>

		<?php
			if ( $projects->max_num_pages > 1 ) {
				hrb_output_pagination( $projects,  array( 'paginate_projects' => 1 ), get_the_hrb_projects_base_url() );
			}
		?>

	</div><!-- .section-footer -->

	<?php else : ?>

		<h5 class="no-results"><?php _e( 'No active projects found.', APP_TD ); ?></h5>

	<?php endif; ?>

</div><!-- #projects -->
