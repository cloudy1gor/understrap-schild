<?php
/*
 * Added 2 custom fields to the Settings page
 * */

abstract class WPOrg_Meta_Box {

    /**
     * Set up and add the meta box.
     */
    public static function add() {

        $screen = 'page';
        $page_id = 6;

        if ( isset( $_GET['post'] ) ) {
            $post_id = $_GET['post'];
        } elseif ( isset( $_POST['post_ID'] ) ) {
            $post_id = $_POST['post_ID'];
        }

        if ( $post_id == $page_id ) {

            add_meta_box(
                'wporg_box_id',          // Unique ID
                'Custom Meta Box Title', // Box title
                [ self::class, 'html' ],   // Content callback, must be of type callable
                $screen                  // Post type
            );

        }
    }

    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public static function save( int $post_id ) {

        if ( isset( $_POST['wporg_field_site_name'] ) ) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key_site_name',
                sanitize_text_field( $_POST['wporg_field_site_name'] )
            );
        }

        if ( isset( $_POST['wporg_field_copyright'] ) ) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key_copyright',
                sanitize_text_field( $_POST['wporg_field_copyright'] )
            );
        }

    }

    /**
     * Display the meta box HTML to the user.
     *
     * @param WP_Post $post   Post object.
     */
    public static function html( $post ) {

        $value_site_name = get_post_meta( $post->ID, '_wporg_meta_key_site_name', true );
        $value_copyright = get_post_meta( $post->ID, '_wporg_meta_key_copyright', true );
        ?>
        <label for="wporg_field_site_name">Site Name:</label>
        <input type="text" name="wporg_field_site_name" id="wporg_field_site_name" value="<?php echo esc_attr( $value_site_name ); ?>">

        <label for="wporg_field_copyright">Copyright:</label>
        <input type="text" name="wporg_field_copyright" id="wporg_field_copyright" value="<?php echo esc_attr( $value_copyright ); ?>">
        <?php

    }
}

add_action( 'add_meta_boxes', [ 'WPOrg_Meta_Box', 'add' ] );
add_action( 'save_post', [ 'WPOrg_Meta_Box', 'save' ] );
