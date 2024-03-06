<?php
/**
* Removes the parent themes stylesheet and scripts from inc/enqueue.php
*/

function understrap_remove_scripts() {
wp_dequeue_style( 'understrap-styles' );
wp_deregister_style( 'understrap-styles' );

wp_dequeue_script( 'understrap-scripts' );
wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
* Enqueue our stylesheet and javascript file
*/
function theme_enqueue_styles() {

// Get the theme data.
$the_theme     = wp_get_theme();
$theme_version = $the_theme->get( 'Version' );

$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
// Grab asset urls.
$theme_styles  = "/css/child-theme{$suffix}.css";
$theme_scripts = "/js/child-theme{$suffix}.js";

$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
wp_enqueue_script( 'jquery' );

$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );

wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
