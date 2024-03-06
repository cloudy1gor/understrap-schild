<?php
/**
* Sets up theme defaults and registers support for various WordPress features.
*/
function understrap_setup() {
// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
* Let WordPress manage the document title.
*/
add_theme_support( 'title-tag' );

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support( 'post-thumbnails' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus(
array(
'primary' => __( 'Primary Menu', 'understrap' ),
'secondary' => __( 'Secondary Menu', 'understrap' ),
)
);

/*
* Valid HTML5.
*/
add_theme_support(
'html5',
array(
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
'style',
'script',
)
);

}
add_action( 'after_setup_theme', 'understrap_setup' );

/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
    return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );
