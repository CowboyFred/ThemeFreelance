<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head elements.
 *
 * @package HireBee
 * @since 1.0.0
 * @since 1.4.0 Added header tag. Moved content blocks into own template parts.
 */
?>

<header class="header" role="banner">

	<?php hrb_display_ad_sidebar( 'hrb-header', $position = 'header' ); ?>

	<?php get_template_part( 'parts/nav-top-bar-primary' ); ?>

	<?php get_template_part( 'parts/header-branding-search' ); ?>

	<?php get_template_part( 'parts/nav-top-bar-secondary' ); ?>

</header><!-- .header -->
