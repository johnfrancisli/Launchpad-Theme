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
    $logo_url = get_stylesheet_directory_uri() . "/dist/assets/images/demo/logo-dark.svg";
endif;
?>

<nav id="main-navigation" class="site-navigation top-bar" role="navigation">
        <div class="top-bar-left">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php echo $logo_url; ?>">
            </a>
        </div>
        <div class="top-bar-right">
            <?php foundationpress_top_bar_r(); ?>
        </div>
</nav>