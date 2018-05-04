<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
    <div id="blog" class="main-container">
        <div class="main-grid">
            <main class="main-content">
                <?php
                $posts_page = get_post(get_option('page_for_posts'));
                echo apply_filters('the_content', $posts_page->post_content);
                ?>
                <div class="blog-nav">
                    <div class="category">
                        <?php get_template_part('template-parts/navigation', 'blog'); ?>
                    </div>
                    <div class="search">
                        <?php get_template_part('template-parts/search', 'post'); ?>
                    </div>
                </div>
                <?php if (have_posts()) : ?>
                    <?php /* Start the Loop */ ?>
                    <div class="archive" data-equalizer data-equalize-on="medium" data-equalize-by-row="true">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/archive', 'blog-excerpt'); ?>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; // End have_posts() check. ?>

                <?php /* Display navigation to next/previous pages when applicable */ ?>
                <?php
                if (function_exists('foundationpress_pagination')) :
                    foundationpress_pagination();
                elseif (is_paged()) :
                    ?>
                    <nav id="post-nav">
                        <div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
                        <div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
                    </nav>
                <?php endif; ?>

            </main>
        </div>
    </div>
<?php get_footer();
