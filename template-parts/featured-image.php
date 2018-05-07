<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if (has_post_thumbnail($post->ID)) : ?>
    <header class="featured-hero" role="banner">
        <div class="bg-image" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-medium'); ?>, medium], [<?php the_post_thumbnail_url('fp-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]"></div>
        <div class="overlay"></div>
        <?php
        $show_content = get_field('show_content');
        if ($show_content[0] == 'show') {
            // Variables
            $heading = get_field('heading');
            $heading_type = get_field('heading_type');
            $sub_heading = get_field('sub_heading');
            $sub_heading_type = get_field('sub_heading_type');
            $details = get_field('details');
            $cta = get_field('cta');
            $cta_link = get_field('cta_link');
            ?>
            <div class="container">
                <div class="content">
                    <div class="wrapper">
                        <?php if (!empty($heading)) { ?>
                        <<?php echo $heading_type; ?>><?php echo $heading; ?>
                    </<?php echo $heading_type; ?>>
                    <?php } ?>
                    <?php if (!empty($sub_heading)) { ?>
                    <<?php echo $sub_heading_type; ?>><?php echo $sub_heading; ?>
                </<?php echo $sub_heading_type; ?>>
                <?php } ?>
                <div class="description"><?php echo $details; ?>
                </div>
                <div class="cta"><a class="button" href="<?php echo $cta_link; ?>"><?php echo $cta; ?></a></div>
            </div>
            </div>
            </div>
            <?php
        } // Show Content or not
        ?>
    </header>
<?php endif;
