<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>
<?php
$hide_elements = get_post_meta($post->ID, "lp_hide_elements", true);
$show_footer = true;
if (is_array($hide_elements) && in_array('hidefooter', $hide_elements)) :
    $show_footer = false;
endif;
if ($show_footer) : ?>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
        </div>
        <?php if (is_active_sidebar('sub-footer-widgets')) { ?>
            <div class="sub-footer-container">
                <div class="footer-grid">
                    <?php dynamic_sidebar('sub-footer-widgets'); ?>
                </div>
            </div>
        <?php } ?>

    </footer>
<?php endif; ?>

<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
    </div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>