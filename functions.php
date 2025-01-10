<?php
require_once get_template_directory() . '/includes/manage-tour-tags.php';
//css
function load_theme_styles() {
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/css/style.css', array(), filemtime(get_template_directory() . '/css/style.css'), 'all');
}
add_action('wp_enqueue_scripts', 'load_theme_styles');

//js
function enqueue_custom_scripts() {
    wp_enqueue_script('scroll-animate', get_template_directory_uri() . '/js/scroll-animate.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


//theme support
add_theme_support('custom-logo', array(
    'height' => 100,
    'width' => 200,
    'flex-height' => true,
    'flex-width' => true,
));

add_theme_support('widgets');

add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
set_post_thumbnail_size(1070, 510, true);
add_image_size('post-default', 780, 500, true);
add_image_size('post-grid', 820, 500, true);
add_theme_support('title-tag');
add_theme_support('wp-block-styles');
add_theme_support('customize-selective-refresh-widgets');
add_theme_support('editor-styles');



