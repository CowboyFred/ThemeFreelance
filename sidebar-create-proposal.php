<?php
/**
 * The sidebar containing the create proposal widget area
 *
 * @package HireBee
 * @since 1.4.0
 */
?>

<div id="sidebar" class="large-4 columns" role="complementary">

	<div class="sidebar-widget-wrap">

		<?php
		if ( is_page_template( 'create-proposal.php' ) ) {
			appthemes_load_template( 'sidebar-project-author.php', array( 'user' => $project_author, 'user_reviews' => $project_author_reviews ) );
		}
		?>

		<?php dynamic_sidebar( 'hrb-create-proposal' ); ?>

	</div><!-- .sidebar-widget-wrap -->

</div><!-- #sidebar -->
