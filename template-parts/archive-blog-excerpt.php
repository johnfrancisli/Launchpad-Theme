<?php
/**
 * The default template for displaying page content
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


$featured_image = get_stylesheet_directory_uri() . "/dist/assets/images/ui/placeholder.png";
?>

<a class="" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wrapper">
        <header>
            <div class="featured-image" style="background-image: url('<?php echo $featured_image; ?>');"></div>
        </header>
        <main class="entry-content" data-equalizer-watch>
            <h3><?php the_title(); ?></h3>
            <p><?php get_the_excerpt_max_length(140); ?></p>
        </main>
        <footer>
            <div class="cta"><span><?php _e('Read More', 'launchpad'); ?></span></div>
        </footer>
    </div>
</a>
