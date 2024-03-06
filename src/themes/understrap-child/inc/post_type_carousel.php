<?php
/*
 * carousel post type
 *
 * @link https://wp-kama.ru/function/register_post_type
 */

function understrap_post_type_carousel() {
	register_post_type('carousel', [
		'label'  => esc_html__('carousel'),
		'labels' => [
			'name'               => 'carousel',
			'singular_name'      => 'carousel',
			'add_new'            => 'Add carousel-item',
			'add_new_item'       => 'Add new carousel-item',
			'edit_item'          => 'Edit carousel-item',
			'new_item'           => 'New carousel-item',
			'view_item'          => 'View carousel',
			'search_items'       => 'Search carousel',
			'menu_name'          => 'carousel',
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null,
		'show_in_menu'           => true,
		'menu_position'       => 81,
		'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail', 'author' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);
}

add_action('init', 'understrap_post_type_carousel');