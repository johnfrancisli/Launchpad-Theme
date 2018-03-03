<?php
/**
 * Created by PhpStorm.
 * User: franz
 * Date: 2017-08-05
 * Time: 3:50 PM
 */
class Page_Design_Settings {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
        add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

    }

    public function add_metabox() {

        add_meta_box(
            'page-design-settings',
            __( 'Page Design Settings', 'launchpad' ),
            array( $this, 'render_page_design_settings' ),
            'page',
            'normal',
            'high'
        );

    }

    public function render_page_design_settings( $post ) {

        // Retrieve an existing value from the database.
        $lp_header_transparent = get_post_meta( $post->ID, 'lp_header-transparent', true );
        $lp_dark_light = get_post_meta( $post->ID, 'lp_dark_light', true );
        $lp_dark_light_sticky = get_post_meta( $post->ID, 'lp_dark_light_sticky', true );
        $lp_hide_elements = get_post_meta( $post->ID, 'lp_hide_elements', true );

        // Set default values.
        if( empty( $lp_header_transparent ) ) $lp_header_transparent = '';
        if( empty( $lp_dark_light ) ) $lp_dark_light = '';
        if( empty( $lp_dark_light_sticky ) ) $lp_dark_light_sticky = array();
        if( empty( $lp_hide_elements ) ) $lp_hide_elements = array();

        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="lp_header-transparent" class="lp_header-transparent_label">' . __( 'Transparent Header?', 'launchpad' ) . '</label></th>';
        echo '		<td>';
        echo '			<label><input type="checkbox" id="lp_header_transparent" name="lp_header-transparent" class="lp_header_transparent_field" value="checked" ' . checked( $lp_header_transparent, 'checked', false ) . '> ' . __( '', 'launchpad' ) . '</label>';
        echo '			<span class="description">' . __( 'Should the header be transparent or not?', 'launchpad' ) . '</span>';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="lp_dark_light" class="lp_dark_light_label">' . __( 'Header Theme', 'launchpad' ) . '</label></th>';
        echo '		<td>';
        echo '			<label><input type="radio" name="lp_dark_light" class="lp_dark_light_field" value="lp_dark" ' . checked( $lp_dark_light, 'lp_dark', false ) . '> ' . __( 'Dark logo and fonts', 'launchpad' ) . '</label><br>';
        echo '			<label><input type="radio" name="lp_dark_light" class="lp_dark_light_field" value="lp_light" ' . checked( $lp_dark_light, 'lp_light', false ) . '> ' . __( 'Light logo and fonts', 'launchpad' ) . '</label><br>';
        echo '			<p class="description">' . __( 'Will the header be a dark theme (dark text and icons) or a light theme (light text and light icons)? If none selected, theme default (dark) will be used.', 'launchpad' ) . '</p>';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="lp_dark_light_sticky" class="lp_dark_light_sticky_label">' . __( 'Header Theme Sticky', 'launchpad' ) . '</label></th>';
        echo '		<td>';
        echo '			<label><input type="checkbox" name="lp_dark_light_sticky[]" class="lp_dark_light_sticky_field" value="' . esc_attr( 'dark' ) . '" ' . ( in_array( 'dark', $lp_dark_light_sticky )? 'checked="checked"' : '' ) . '> ' . __( 'Dark logo and fonts', 'launchpad' ) . '</label><br>';
        echo '			<label><input type="checkbox" name="lp_dark_light_sticky[]" class="lp_dark_light_sticky_field" value="' . esc_attr( 'light' ) . '" ' . ( in_array( 'light', $lp_dark_light_sticky )? 'checked="checked"' : '' ) . '> ' . __( 'Light logo and fonts', 'launchpad' ) . '</label><br>';
        echo '			<p class="description">' . __( 'Will the sticky header be a dark theme (dark text and icons) or a light theme (light text and light icons)? If none selected, theme default (dark) will be used.', 'launchpad' ) . '</p>';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="lp_hide_elements" class="lp_hide_elements_label">' . __( 'Hide Elements', 'launchpad' ) . '</label></th>';
        echo '		<td>';
        echo '			<label><input type="checkbox" name="lp_hide_elements[]" class="lp_hide_elements_field" value="' . esc_attr( 'hideheader' ) . '" ' . ( in_array( 'hideheader', $lp_hide_elements )? 'checked="checked"' : '' ) . '> ' . __( 'Hide Header', 'launchpad' ) . '</label><br>';
        echo '			<label><input type="checkbox" name="lp_hide_elements[]" class="lp_hide_elements_field" value="' . esc_attr( 'hidefooter' ) . '" ' . ( in_array( 'hidefooter', $lp_hide_elements )? 'checked="checked"' : '' ) . '> ' . __( 'Hide Footer', 'launchpad' ) . '</label><br>';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';

    }

    public function save_metabox( $post_id, $post ) {

        // Sanitize user input.
        $lp_new_header_transparent = isset( $_POST[ 'lp_header-transparent' ] ) ? 'checked'  : '';
        $lp_new_dark_light = isset( $_POST[ 'lp_dark_light' ] ) ? $_POST[ 'lp_dark_light' ] : '';
        $lp_new_dark_light_sticky = isset( $_POST[ 'lp_dark_light_sticky' ] ) ? array_intersect( (array) $_POST[ 'lp_dark_light_sticky' ], array( 'dark','light' ) )  : array();
        $lp_new_hide_elements = isset( $_POST[ 'lp_hide_elements' ] ) ? array_intersect( (array) $_POST[ 'lp_hide_elements' ], array( 'hideheader','hidefooter' ) )  : array();

        // Update the meta field in the database.
        update_post_meta( $post_id, 'lp_header-transparent', $lp_new_header_transparent );
        update_post_meta( $post_id, 'lp_dark_light', $lp_new_dark_light );
        update_post_meta( $post_id, 'lp_dark_light_sticky', $lp_new_dark_light_sticky );
        update_post_meta( $post_id, 'lp_hide_elements', $lp_new_hide_elements );

    }

}

new Page_Design_Settings;