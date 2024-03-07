<?php
/*
 * Show post info. Using in sidebar.
 * */

//function author_content_shortcode($atts) {
//
//    $atts = shortcode_atts([
//        'post_name' => 'author'
//    ], $atts, 'custom_post_content');
//
//    $post = get_page_by_title($atts['post_name'], OBJECT, 'post');
//
//    if ($post) {
//
//        $output = apply_filters('the_content', $post->post_content);
//
//        $output .= '<div class="author__shortcode-link"><a href="' . get_permalink($post->ID) . '">Continue Reading</a></div>';
//
//        return $output;
//    }
//
//}
//add_shortcode('author_post', 'author_content_shortcode');

function author_content_shortcode($atts) {

    $atts = shortcode_atts([
        'post_name' => 'author'
    ], $atts, 'custom_post_content');

    $post = get_page_by_title($atts['post_name'], OBJECT, 'post');

    if ($post) {
        ob_start();
        ?>

        <div class="author__shortcode">

            <?php
            $thumbnail = get_the_post_thumbnail($post->ID, 'large');
            if (!empty($thumbnail)) {
                echo $thumbnail;
            }
            ?>

            <h4><?php echo apply_filters('the_content', $post->post_title); ?></h4>

            <?php
            echo apply_filters('the_content', $post->post_excerpt);
            ?>

            <div class="author__shortcode-link">
                <a href="<?php echo get_permalink($post->ID); ?>">Continue Reading</a>
            </div>

        </div>

        <?php
        return ob_get_clean();
    }
}
add_shortcode('author_post', 'author_content_shortcode');

