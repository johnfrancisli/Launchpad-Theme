<?php
/**
 * Template part for Mobile Navigation
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$site_settings_options = get_option('site_settings');
$logo_url_mobile = get_stylesheet_directory_uri() . "/" . $site_settings_options['logo_url_mobile'];
if (strlen($site_settings_options['logo_url_mobile']) == 0 ) :
    $logo_url_mobile = get_stylesheet_directory_uri() . "/dist/assets/images/demo/logo-dark-mobile.svg";
endif;
?>

<div id="navigation-mobile" class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>
     data-hide-for="nav">
    <div class="title-bar-left">
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <img src="<?php echo $logo_url_mobile; ?>">
        </a>
    </div>
    <div class="title-bar-right">
        <button id="mobile-menu-button" class="mobile-menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</div>
<?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>
    <?php get_template_part('template-parts/mobile-top-bar'); ?>
<?php endif; ?>