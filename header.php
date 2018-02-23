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
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
    <?php do_action('wp_after_body'); ?>
    <?php do_action('site_analytics_after_body'); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>


    <?php if (get_post_meta($post->ID, "lp_header-transparent", true) == "checked") : ?>
        <?php
        $header_transparent_class = "transparent";
        // Checks if you are to use the light or dark theme
        $header_theme = get_post_meta($post->ID, "lp_dark_light", true);
        if ($header_theme = 'lp_light') {
            $header_theme_color = 'light';
        } else {
            $header_theme_color = 'dark';
        }
        ?>
    <?php endif ; ?>
    <?php
        // Show Header
        $hide_elements = get_post_meta($post->ID, "lp_hide_elements", true);
        $show_header = true;
        if (is_array($hide_elements) && in_array('hideheader', $hide_elements)) :
            $show_header = false;
        endif;
    ?>

    <?php if ($show_header) : ?>
    <div id="header-container" data-sticky-container class="<?php echo $header_transparent_class; ?> <?php echo $header_theme_color; ?>">
        <header class="site-header" role="banner" data-sticky data-options="marginTop:0;" data-sticky-on="small">
            <?php get_template_part('template-parts/navigation-mobile'); ?>
            <?php get_template_part('template-parts/navigation-desktop'); ?>
        </header>
    </div>
    <?php endif; ?>