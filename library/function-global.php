<?php
/**
 * User: Francis Li
 * Date: 5/4/2018
 * Time: 9:14 AM
 */


// Get the Excerpt with a Certain Length
function get_the_excerpt_max_length($charlength)
{
    $excerpt = get_the_excerpt();
    $charlength++;

    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = -(mb_strlen($exwords[count($exwords) - 1]));
        if ($excut < 0) {
            echo mb_substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}


// Search form to only search for posts
//add_action( 'pre_get_posts', function ( $q )
//{
//    if (    !is_admin()         // Only target front end,
//        && $q->is_main_query() // Only target the main query
//        && $q->is_search()     // Only target the search page
//    ) {
//        $q->set( 'post_type', ['page', 'post'] );
//    }
//});