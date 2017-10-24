<?php
/*
Template Name: Full Width
*/
get_header(); ?>
    <div id="page-full-width" class="container-viewport">
        <?php //get_template_part('template-parts/featured-image'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'page'); ?>
                    <?php comments_template(); ?>
                <?php endwhile; ?>
    </div>
<?php get_footer();
