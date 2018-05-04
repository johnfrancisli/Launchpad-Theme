<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
    <div id="blog" class="main-container">
        <div class="main-grid">
            <main class="main-content">
                <h1 class="entry-title"><?php _e('Search Results for', 'foundationpress'); ?>
                    "<?php echo get_search_query(); ?>"</h1>
                <div class="blog-nav">
                    <div class="category">
                        <?php
                        if (isset($_GET['post_type'])) {
                            $type = $_GET['post_type'];
                            if ($type == 'post') {
                                $categories = get_categories();
                                foreach ($categories as $category) {
                                    echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                                    echo '<a href="/blog">' . __('All', 'launchpad') . '</a>';
                                }
                            } elseif ($type == 'page') {

                            }
                        }
                        ?>

                    </div>
                    <div class="search">
                        <?php get_template_part('template-parts/search', 'post'); ?>
                    </div>
                </div>
                <?php if (have_posts()) : ?>
                    <?php /* Start the Loop */ ?>
                    <div class="archive" data-equalizer data-equalize-on="medium" data-equalize-by-row="true">
                        <?php while (have_posts()) : the_post();

                        // Change Search Result Layout Based on Post Type Search and a generic
                            if ($type == 'post') {
                                get_template_part('template-parts/archive', 'blog-excerpt');
                            } else {
                                get_template_part('template-parts/archive', 'search');
                            }
                        ?>

                            <?php  ?>
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
