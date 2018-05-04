<?php
/**
 * User: Francis Li
 * Date: 4/2/2018
 * Time: 3:15 PM
 */
class Fa5_Social_links extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'fa5-social-link',
            __( 'Font Awesome 5 Social Links', 'launchpad' ),
            array(
                'description' => __( 'Creates a list of social links to be displayed as icons', 'launchpad' ),
                'classname'   => 'fa5-social-links',
            )
        );

    }

    public function widget( $args, $instance ) {
        //print_r($args);
        //print_r($instance);
        //Example Array ( [fa5sl_link_facebook] => https://www.facebook.com/pages/Hi-Cube-Storage-Products-Vancouver/134451324658?ref=hl [fa5sl_link_twitter] => https://twitter.com/HiCube [fa5sl_link_googleplus] => https://plus.google.com/116771033953745424342/posts [fa5sl_link_linkedin] => [fa5sl_link_instagram] => [classes] => social [fa5sl_link_youtube] => https://www.youtube.com/channel/UCWp8OemcB5zB7K4IM4EjoKQ )
        echo '<section class="social social-widget">';
        if (!empty($instance['fa5sl_link_facebook'])): echo '<a href="'.$instance['fa5sl_link_facebook'].'"><i class="fab fa-facebook"></i></a>'; endif;
        if (!empty($instance['fa5sl_link_twitter'])): echo '<a href="'.$instance['fa5sl_link_twitter'].'"><i class="fab fa-twitter"></i></a>'; endif;
        if (!empty($instance['fa5sl_link_googleplus'])): echo '<a href="'.$instance['fa5sl_link_googleplus'].'"><i class="fab fa-google-plus"></i></a>'; endif;
        if (!empty($instance['fa5sl_link_linkedin'])): echo '<a href="'.$instance['fa5sl_link_linkedin'].'"><i class="fab fa-linkedin"></i></a>'; endif;
        if (!empty($instance['fa5sl_link_instagram'])): echo '<a href="'.$instance['fa5sl_link_instagram'].'"><i class="fab fa-instagram"></i></a>'; endif;
        if (!empty($instance['fa5sl_link_youtube'])): echo '<a href="'.$instance['fa5sl_link_youtube'].'"><i class="fab fa-youtube"></i></a>'; endif;
        echo '</section>';
    }

    public function form( $instance ) {

        // Set default values
        $instance = wp_parse_args( (array) $instance, array(
            'fa5sl_link_facebook' => '',
            'fa5sl_link_twitter' => '',
            'fa5sl_link_googleplus' => '',
            'fa5sl_link_linkedin' => '',
            'fa5sl_link_instagram' => '',
            'fa5sl_link_youtube' => '',
        ) );

        // Retrieve an existing value from the database
        $fa5sl_link_facebook = !empty( $instance['fa5sl_link_facebook'] ) ? $instance['fa5sl_link_facebook'] : '';
        $fa5sl_link_twitter = !empty( $instance['fa5sl_link_twitter'] ) ? $instance['fa5sl_link_twitter'] : '';
        $fa5sl_link_googleplus = !empty( $instance['fa5sl_link_googleplus'] ) ? $instance['fa5sl_link_googleplus'] : '';
        $fa5sl_link_linkedin = !empty( $instance['fa5sl_link_linkedin'] ) ? $instance['fa5sl_link_linkedin'] : '';
        $fa5sl_link_instagram = !empty( $instance['fa5sl_link_instagram'] ) ? $instance['fa5sl_link_instagram'] : '';
        $fa5sl_link_youtube = !empty( $instance['fa5sl_link_youtube'] ) ? $instance['fa5sl_link_youtube'] : '';

        // Form fields
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'fa5sl_link_facebook' ) . '" class="fa5sl_link_facebook_label">' . __( 'Facebook', 'launchpad' ) . '</label>';
        echo '	<input type="url" id="' . $this->get_field_id( 'fa5sl_link_facebook' ) . '" name="' . $this->get_field_name( 'fa5sl_link_facebook' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'launchpad' ) . '" value="' . esc_attr( $fa5sl_link_facebook ) . '">';
        echo '</p>';

        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'fa5sl_link_twitter' ) . '" class="fa5sl_link_twitter_label">' . __( 'Twitter', 'launchpad' ) . '</label>';
        echo '	<input type="url" id="' . $this->get_field_id( 'fa5sl_link_twitter' ) . '" name="' . $this->get_field_name( 'fa5sl_link_twitter' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'launchpad' ) . '" value="' . esc_attr( $fa5sl_link_twitter ) . '">';
        echo '</p>';

        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'fa5sl_link_googleplus' ) . '" class="fa5sl_link_googleplus_label">' . __( 'Google Plus', 'launchpad' ) . '</label>';
        echo '	<input type="url" id="' . $this->get_field_id( 'fa5sl_link_googleplus' ) . '" name="' . $this->get_field_name( 'fa5sl_link_googleplus' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'launchpad' ) . '" value="' . esc_attr( $fa5sl_link_googleplus ) . '">';
        echo '</p>';

        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'fa5sl_link_linkedin' ) . '" class="fa5sl_link_linkedin_label">' . __( 'LinkedIn', 'launchpad' ) . '</label>';
        echo '	<input type="url" id="' . $this->get_field_id( 'fa5sl_link_linkedin' ) . '" name="' . $this->get_field_name( 'fa5sl_link_linkedin' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'launchpad' ) . '" value="' . esc_attr( $fa5sl_link_linkedin ) . '">';
        echo '</p>';

        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'fa5sl_link_instagram' ) . '" class="fa5sl_link_instagram_label">' . __( 'Instagram', 'launchpad' ) . '</label>';
        echo '	<input type="url" id="' . $this->get_field_id( 'fa5sl_link_instagram' ) . '" name="' . $this->get_field_name( 'fa5sl_link_instagram' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'launchpad' ) . '" value="' . esc_attr( $fa5sl_link_instagram ) . '">';
        echo '</p>';

        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'fa5sl_link_youtube' ) . '" class="fa5sl_link_youtube_label">' . __( 'Youtube', 'launchpad' ) . '</label>';
        echo '	<input type="url" id="' . $this->get_field_id( 'fa5sl_link_youtube' ) . '" name="' . $this->get_field_name( 'fa5sl_link_youtube' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'launchpad' ) . '" value="' . esc_attr( $fa5sl_link_youtube ) . '">';
        echo '</p>';

    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['fa5sl_link_facebook'] = !empty( $new_instance['fa5sl_link_facebook'] ) ? strip_tags( $new_instance['fa5sl_link_facebook'] ) : '';
        $instance['fa5sl_link_twitter'] = !empty( $new_instance['fa5sl_link_twitter'] ) ? strip_tags( $new_instance['fa5sl_link_twitter'] ) : '';
        $instance['fa5sl_link_googleplus'] = !empty( $new_instance['fa5sl_link_googleplus'] ) ? strip_tags( $new_instance['fa5sl_link_googleplus'] ) : '';
        $instance['fa5sl_link_linkedin'] = !empty( $new_instance['fa5sl_link_linkedin'] ) ? strip_tags( $new_instance['fa5sl_link_linkedin'] ) : '';
        $instance['fa5sl_link_instagram'] = !empty( $new_instance['fa5sl_link_instagram'] ) ? strip_tags( $new_instance['fa5sl_link_instagram'] ) : '';
        $instance['fa5sl_link_youtube'] = !empty( $new_instance['fa5sl_link_youtube'] ) ? strip_tags( $new_instance['fa5sl_link_youtube'] ) : '';

        return $instance;

    }

}

function fa5sl_register_widgets() {
    register_widget( 'Fa5_Social_links' );
}
add_action( 'widgets_init', 'fa5sl_register_widgets' );