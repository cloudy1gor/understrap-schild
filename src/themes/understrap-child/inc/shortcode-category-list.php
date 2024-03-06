<?php
/*
 * Show category list with count
 * */

function category_list_shortcode() {

$categories = get_categories([
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => false
]);

$output = '<ul class="category__shortcode">';

    foreach ($categories as $category) {
        $output .= '<li>';
        $output .= '<div class="category-name">' . $category->name . '</div>';
        $output .= '<div class="category-count">' . '(' . $category->count . ')' . '</div>';
        $output .= '</li>';
    }

$output .= '</ul>';

return $output;

}
add_shortcode('category_list', 'category_list_shortcode');
