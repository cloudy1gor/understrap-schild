<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = [
    '/understrap_enque.php', //Include scripts and styles
    '/post_type_carousel.php', //Carousel post type
    '/settings_page.php', //Custom settings page
    '/understrap_setup.php', //Setup theme
    '/class-custom-meta-boxes.php', //Custom metaboxes
    '/shortcode-category-list.php', //Custom category shortcode
    '/shortcode-author.php', //Custom author post shortcode using in sidebar
];

// Include files.
foreach ( $understrap_includes as $file ) {
    require_once get_theme_file_path( $understrap_inc_dir . $file );
}
