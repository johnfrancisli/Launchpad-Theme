<?php
/*
Template Name: Front
*/
get_header(); ?>
<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php endwhile; ?>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
