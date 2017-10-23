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

        // Set default values.
        if( empty( $lp_header_transparent ) ) $lp_header_transparent = '';
        if( empty( $lp_dark_light ) ) $lp_dark_light = '';

        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="lp_header-transparent" class="lp_header-transparent_label">' . __( 'Transparent Header?', 'launchpad' ) . '</label></th>';
        echo '		<td>';
        echo '			<label><input type="checkbox" id="lp_header_transparent" name="lp_header-transparent" class="lp_header_transparent_field" value="' . $lp_header_transparent . '" ' . checked( $lp_header_transparent, 'checked', false ) . '> ' . __( '', 'launchpad' ) . '</label>';
        echo '			<span class="description">' . __( 'Should the header be transparent or not?', 'launchpad' ) . '</span>';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="lp_dark_light" class="lp_dark_light_label">' . __( 'Header Theme', 'launchpad' ) . '</label></th>';
        echo '		<td>';
        echo '			<label><input type="radio" name="lp_dark_light" class="lp_dark_light_field" value="lp_dark" ' . checked( $lp_dark_light, 'lp_dark', false ) . '> ' . __( 'Dark', 'launchpad' ) . '</label><br>';
        echo '			<label><input type="radio" name="lp_dark_light" class="lp_dark_light_field" value="lp_light" ' . checked( $lp_dark_light, 'lp_light', false ) . '> ' . __( 'Light', 'launchpad' ) . '</label><br>';
        echo '			<p class="description">' . __( 'Will the header be a dark theme (dark text and icons) or a light theme (light text and light icons)? If none selected, theme default (dark) will be used.', 'launchpad' ) . '</p>';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';

    }

    public function save_metabox( $post_id, $post ) {

        // Sanitize user input.
        $lp_new_header_transparent = isset( $_POST[ 'lp_header-transparent' ] ) ? 'checked'  : '';
        $lp_new_dark_light = isset( $_POST[ 'lp_dark_light' ] ) ? $_POST[ 'lp_dark_light' ] : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'lp_header-transparent', $lp_new_header_transparent );
        update_post_meta( $post_id, 'lp_dark_light', $lp_new_dark_light );

    }

}

new Page_Design_Settings;