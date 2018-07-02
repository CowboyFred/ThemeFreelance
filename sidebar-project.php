<?php
/**
 * The sidebar containing the single project widget area
 *
 * @package HireBee
 * @since 1.0.0
 */
?>

<div id="sidebar" class="large-4 columns" role="complementary">

	<?php appthemes_load_template( 'sidebar-project-author.php', array( 'user' => $project_author, 'user_reviews' => $project_author_reviews ) ); ?>

	<div class="sidebar-widget-wrap">

		<?php dynamic_sidebar( 'hrb-single-project' ); ?>

	</div><!-- .sidebar-widget-wrap -->

</div><!-- #sidebar -->
