<?php

require_once get_template_directory() . '/includes/manage-tour-tags.php';
require_once get_template_directory() . '/includes/manage-nav-menu.php';
require_once get_template_directory() . '/includes/management-menu.php';
require_once get_template_directory() . '/includes/manage-gallery-images.php';
//css
function load_theme_styles() {
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/css/style.css', array(), filemtime(get_template_directory() . '/css/style.css'), 'all');
}
add_action('wp_enqueue_scripts', 'load_theme_styles');

//js
function enqueue_custom_scripts() {
    wp_enqueue_script('scroll-animate', get_template_directory_uri() . '/js/scroll-animate.js', [], null, true);
    wp_enqueue_script('menu', get_template_directory_uri() . '/js/menu.js', [], null, true);
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


function create_destinations_post()
{
    $args = array(
        'labels' => array(
            'name' => 'Destinations',
            'singular_name' => 'Destination'
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-airplane',
        'supports' => array('title','editor','thumbnail'),
        'rewrite' => array("slug"=>"destinations")
    );
    register_post_type('destination', $args);
}
add_action( 'init', 'create_destinations_post');


function custom_menu_admin_page() {
    add_menu_page(
        'Management', // Page title
        'Management',       // Menu title
        'manage_options',    // Capability
        'manage',  // Menu slug
        'parent_menu_page',  // Callback function
        'dashicons-admin-generic', // Icon
        30                    // Position
    );
    add_submenu_page(
        'manage', // Parent menu slug
        'Manage Custom Menu', 
        'Custom Menu',        // Menu title
        'manage_options',   // Capability
        'custom-menu', 
        'custom_menu_page_html' 
    );

    add_submenu_page(
        'manage', // Parent menu slug
        'Manage Tour Tags', 
        'Tour Tags',        // Menu title
        'manage_options',   // Capability
        'tour-tags', 
        'manage_tour_tags_page'
    );
    add_submenu_page(
        'manage', // Parent menu slug
        'Manage Gallery Images', 
        'Gallery Images',        // Menu title
        'manage_options',   // Capability
        'gallery', 
        'image_manager_page'
    );
}
add_action('admin_menu', 'custom_menu_admin_page');


function add_custom_capability() {
    $role = get_role('editor'); // Get the editor role
    if ($role) {
        $role->add_cap('manage_yatra'); // Add capability to delete others' posts
        $role->add_cap('manage_options'); // Add capability to delete others' posts


        $role->add_cap('edit_yatra-bookings');
        $role->add_cap('delete_yatra-bookings');
        $role->add_cap('delete_yatra-bookings');
        $role->add_cap('publish_yatra-bookings');
        $role->add_cap('read_private_yatra-bookings');

        $role->add_cap('read_private_yatra-customerss');

        $role->add_cap('manage_tour_terms');
        $role->add_cap('edit_tour_terms');
        $role->add_cap('delete_tour_terms');
        $role->add_cap('assign_tour_terms');

        $role->add_cap('manage_tour_terms');
        $role->add_cap('edit_tour_terms');
        $role->add_cap('delete_tour_terms');
        $role->add_cap('assign_tour_terms');

        $role->add_cap('edit_published_tours');
        $role->add_cap('edit_published_yatra-bookings');
        $role->add_cap('edit_published_yatra-customerss');

        $role->add_cap('edit_tour');
        $role->add_cap('edit_tours');
        $role->add_cap('edit_others_tours');
        $role->add_cap('delete_tours');
        $role->add_cap('publish_tours');
        $role->add_cap('read_private_tours');
        $role->add_cap('edit_yatra_tour');
        $role->add_cap('edit_yatra-bookings');
        $role->add_cap('edit_yatra-bookings_terms');
        $role->add_cap('edit_yatra-booking');
        $role->add_cap('edit_yatra-bookings');


    }
}
add_action('admin_init', 'add_custom_capability');