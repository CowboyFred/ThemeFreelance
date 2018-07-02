<?php
/**
 * Single project custom post loop content template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'single-project' ) ); ?> role="article">

	<div class="project-wrapper">

		<div class="project-header-wrapper">

			<div class="single-project-header">

				<div class="row">

					<div class="budget-deadline large-6 small-7 columns">
						<div class="project-budget" title="<?php esc_attr_e( 'Project budget', APP_TD ); ?>">
							<span class="budget"><?php the_hrb_project_budget(); ?></span>
							<span class="budget-type"><?php echo the_hrb_project_budget_type(); ?></span>
						</div>

						<?php $remain_days = get_the_hrb_project_remain_days(); ?>

						<?php if ( '' !== $remain_days ) { ?>
							<div class="<?php echo ( $remain_days < 0 ? 'project-expired' : '' ); ?>" title="<?php esc_attr_e( 'Time until expiration', APP_TD ); ?>">
								<div class="project-expires"><?php the_hrb_project_remain_days(); ?></div>
							</div>
						<?php } ?>
					</div>

					<div class="bid large-4 small-5 columns large-offset-2">
						<?php the_hrb_create_edit_proposal_link(); ?>
					</div>

			</div><!-- .row -->

			</div><!-- .single-project-header -->

		</div><!-- .project-header-wrapper -->


		<div class="article-header-top">

			<div class="row">

				<div class="large-3 small-5 columns">
					<span class="projects-starred"><?php the_hrb_project_faves_link(); ?></span>
				</div>

				<div class="large-4 small-6 columns add-ons">
					<?php the_hrb_project_addons(); ?>
				</div>

			</div><!-- .row -->

		</div><!-- .article-header-top -->

		<?php if ( function_exists( 'sharethis_button' ) && $hrb_options->listing_sharethis ) { ?>
			<div class="row share-this">
				<div class="large-12 columns">
					<div><?php sharethis_button(); ?></div>
				</div>
			</div>
		<?php } ?>

		<div class="article-header">

			<div class="row">

				<div class="large-9 columns article-title">

					<?php appthemes_before_post_title( HRB_PROJECTS_PTYPE ); ?>

					<?php the_title( '<h3 class="project-heading">', '</h3>' ); ?>

					<?php appthemes_after_post_title( HRB_PROJECTS_PTYPE ); ?>

				</div>

				<div class="large-3 columns single-project-meta-buttons">
					<?php the_hrb_project_actions(); ?>
				</div>

			</div><!-- .row -->

		</div><!-- .article-header -->


		<div class="project-content-wrapper">

			<div class="project-details">

				<?php appthemes_before_post_content( HRB_PROJECTS_PTYPE ); ?>

				<?php the_content(); ?>

				<?php appthemes_after_post_content( HRB_PROJECTS_PTYPE ); ?>

			</div><!-- .project-details -->


			<div class="project-branches">

				<div class="project-custom-fields">
					<?php the_hrb_project_custom_fields( get_the_ID(), 'file', $include = false ); ?>
				</div><!-- .project-custom-fields -->

				<div class="project-files">
					<?php the_hrb_project_files( get_the_ID(), '<fieldset><legend>' . __( 'Attachments', APP_TD ) . '</legend>', '</fieldset>' ); ?>
				</div><!-- .project-files -->

			</div><!-- .project-branches -->

		</div><!-- .project-content-wrapper -->


		<div class="single-project-meta-group">

			<div class="single-project-meta cf">
				<span class="project-location"><i class="icon i-project-location"></i> <?php the_hrb_project_location(); ?></span>
				<span class="project-cat"><i class="icon i-project-category"></i> <?php the_hrb_tax_terms( HRB_PROJECTS_CATEGORY ); ?></span>
				<span class="project-skills"><?php the_hrb_tax_terms( HRB_PROJECTS_SKILLS, 0, '', '<span class="label">','</span>' ); ?></span>
			</div>

			<?php if ( has_term( '', HRB_PROJECTS_TAG ) ) { ?>
				<div class="single-project-meta-tags project-tags cf">
					<span><i class="icon i-tags"></i><?php the_hrb_tax_terms( HRB_PROJECTS_TAG ); ?></span>
				</div>
			<?php } ?>

		</div><!-- .single-project-meta-group -->

	</div><!-- .project-wrapper -->

</article>


<!-- tabs section -->

<div class="section-container auto section-tabs project-trunk" data-section data-options="deep_linking: true">

	<section class="active">
		<p class="title" data-section-title><a href="#proposals"><?php printf( __( 'Proposals (%s)', APP_TD ), appthemes_get_post_total_bids( get_the_ID() ) ); ?></a></p>

		<div class="content" data-section-content>
			<?php appthemes_load_template( 'single-project-section-proposals.php', array( 'proposals' => $proposals ) ); ?>
		</div>
	</section>

	<?php if ( $hrb_options->projects_clarification ) : ?>
	<section>
		<p class="title" data-section-title><a href="#clarification"><?php printf( __( 'Clarification Board (%s)', APP_TD ), get_comments_number() ); ?></a></p>

		<div class="content" data-section-content>
			<?php appthemes_load_template( 'single-project-section-clarification.php' ); ?>
		</div>
	</section>
	<?php endif; ?>

</div><!-- .section-container -->


<?php hrb_display_ad_sidebar( 'hrb-single_project_ad_space' ); ?>
