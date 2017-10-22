<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
    <?php get_template_part('template-parts/mobile-off-canvas'); ?>
<?php endif; ?>

<div data-sticky-container>
    <header class="site-header" role="banner" data-sticky data-options="marginTop:0;" data-sticky-on="small">
        <?php get_template_part('template-parts/navigation-mobile'); ?>
        <?php get_template_part('template-parts/navigation-desktop'); ?>

    </header>
</div>
<div class="container">
