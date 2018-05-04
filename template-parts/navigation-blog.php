<?php
/**
 * User: Francis Li
 * Date: 5/4/2018
 * Time: 3:55 PM
 */
?>
<ul id="desktop-category-navigation">
    <?php
    $categories = get_categories();
    foreach ($categories as $category) {
        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
    }
    ?>
    <li><a href="/blog"><?php _e('All', 'launchpad'); ?></a></li>
</ul>
<ul id="mobile-category-navigation" class="dropdown menu" data-dropdown-menu>
    <li><a href="#">Categories</a>
        <ul class="menu">
            <li><a href="/blog"><?php _e('All', 'launchpad'); ?></a></li>
            <?php
            foreach ($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            ?>

        </ul>
    </li>
</ul>
