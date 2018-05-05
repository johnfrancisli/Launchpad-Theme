<?php
/**
 * The default template for displaying page content
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <div id="blog-nav">
            <div class="category">
                <?php get_template_part('template-parts/navigation', 'blog'); ?>
            </div>
            <div class="search">
                <?php get_template_part('template-parts/search', 'post'); ?>
            </div>
        </div>
    </header>
    <div class="entry-content">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="header">

            <div class="title"><h1><?php the_title(); ?></h1></div>
            <div class="meta"><?php the_date(); ?></div>
        </div>
        <?php the_content(); ?>
        <?php edit_post_link(__('(Edit)', 'foundationpress'), '<span class="edit-link">', '</span>'); ?>
    </div>
    <footer>

    </footer>
</article>
