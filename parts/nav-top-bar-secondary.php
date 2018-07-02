<?php
/**
 * The template for displaying the main navigation
 *
 * @package HireBee
 * @since 1.4.0
 */
?>

<div class="main-navigation">

	<div class="row">

		<div class="large-12 columns">

			<nav class="top-bar lower-top-bar">

				<ul class="title-area">
					<li class="name"></li>
					<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
				</ul>

				<section class="top-bar-section">
					<?php
					wp_nav_menu( array(
						'menu_id'         => 'navigation',
						'theme_location'  => 'header',
						'container_class' => 'left',
						'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
						'fallback_cb'     => false,
					) );
					?>
				</section>

			</nav>

		</div><!-- .columns -->

	</div><!-- .row -->

</div>

<?php if ( $hrb_options->categories_menu['show'] && ! is_page_template('categories-list-project.php') ) { ?>
	<div class="row category-row categories-menu <?php echo ( 'click' == $hrb_options->categories_menu['show'] && ! wp_is_mobile() ? 'click-cat-menu' : '' ); ?>">
		<div class="large-12 columns">
			<?php the_hrb_project_categories_list( 'categories_menu' ); ?>
		</div>
	</div>
<?php } ?>
