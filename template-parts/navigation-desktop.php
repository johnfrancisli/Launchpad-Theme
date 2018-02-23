<?php
/**
 * Template part for Mobile Navigation
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$site_settings_options = get_option('site_settings');
$logo_url = get_stylesheet_directory_uri() . "/" . $site_settings_options['logo_url'];
if (strlen($site_settings_options['logo_url']) == 0) :
    $logo_url = get_stylesheet_directory_uri() . "/dist/assets/images/demo/logo-dark.svg";
endif;
?>

<nav id="navigation-desktop" class="site-navigation top-bar" role="navigation">
        <div class="top-bar-left">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php echo $logo_url; ?>">
            </a>
        </div>
        <div class="top-bar-right">
            <?php
                if (has_nav_menu('top-bar-r-utility')): ?>
                    <div class="top-bar-utility"><?php foundationpress_top_bar_r_utility(); ?></div>
                <?php
                endif;
            ?>

            <?php foundationpress_top_bar_r(); ?>
        </div>
</nav>