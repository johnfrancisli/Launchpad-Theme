<?php
/**
 * Template part for Mobile Navigation
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$site_settings_options = get_option('site_settings');
$logo_url = get_stylesheet_directory_uri() . "/" . $site_settings_options['logo_url'];
if (!isset($site_settings_options['logo_url'])) :
    $logo_url = get_stylesheet_directory_uri()."/dist/assets/images/demo/logo-dark.svg";
endif;
?>

<nav class="site-navigation top-bar" role="navigation">
    <div class="top-bar-left">
        <div class="site-desktop-title top-bar-title">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php echo $logo_url; ?>">
            </a>
        </div>
    </div>
    <div class="top-bar-right">
        <?php foundationpress_top_bar_r(); ?>
        <?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>
            <?php get_template_part('template-parts/mobile-top-bar'); ?>
        <?php endif; ?>
    </div>
</nav>