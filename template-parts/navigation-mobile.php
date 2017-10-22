<?php
/**
 * Template part for Mobile Navigation
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$site_settings_options = get_option('site_settings');
$logo_url_mobile = get_stylesheet_directory_uri() . "/" . $site_settings_options['logo_url_mobile'];
if (!isset($site_settings_options['logo_url_mobile'])) :
    $logo_url_mobile = get_stylesheet_directory_uri()."/dist/assets/images/demo/logo-dark-mobile.svg";
endif;
?>

<div id="navigation-mobile" class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>>
    <div class="title-bar-left">
        <span class="site-mobile-title title-bar-title">
					<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo $logo_url_mobile; ?>">
                    </a>
				</span>
    </div>
    <div class="title-bar-right">
        <button class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
    </div>
</div>