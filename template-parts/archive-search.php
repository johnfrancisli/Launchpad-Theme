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

<a class="search-result" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wrapper">
        <header>
            <h3><?php the_title(); ?></h3>
        </header>
        <main class="entry-content" data-equalizer-watch>
            <p><?php get_the_excerpt_max_length(140); ?></p>
        </main>
        <footer>
            <div class="cta"><span><?php _e('Read More', 'launchpad'); ?></span></div>
        </footer>
    </div>
</a>
