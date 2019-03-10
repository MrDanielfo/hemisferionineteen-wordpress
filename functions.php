<?php

function hemisferio_setup() {

    add_theme_support('post-thumbnails'); 

    update_option('thumbnail-size_w', 253);
    update_option('thumbnail-size_h', 164);

    add_image_size('articulo-grande', 600, 400, true);

    add_image_size('articulo-mediano', 450, 270, true);

    add_image_size('articulo-chico', 330, 220, true);

    add_image_size('articulo-especial', 400, 480, true);

    add_image_size('articulo-single', 1366, 550, true);

    add_image_size('laterales-widget', 80, 55, true);

}

add_action('after_setup_theme', 'hemisferio_setup');

function hemisferio_styles() {

    wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');
    wp_register_style('google_fonts', 'https://fonts.googleapis.com/css?family=PT+Sans|Ubuntu:700|Work+Sans:400,700', array(), '1.0');
    wp_register_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.2.0');
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

    wp_enqueue_style('style');
    wp_enqueue_style('google_fonts');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('normalize');


    wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
    wp_enqueue_script('scripts');
}

add_action('wp_enqueue_scripts', 'hemisferio_styles');

function hemisferio_menus() {

    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'hemisferio'),
        'contacto-menu' => __('Contacto Menu', 'hemisferio'),
        'social-menu' => __('Social Menu', 'hemisferio')
    ));

}

add_action('init', 'hemisferio_menus');


// Widgets

function hemisferio_widgets() {
    register_sidebar(array(
        'name' => 'Noticias Sidebar',
        'id' => 'noticias_sidebar'
    ));
}

add_action('widgets_init', 'hemisferio_widgets');

add_action('init', 'hemisferio_noticiasentradas');

function hemisferio_noticiasentradas() {
    $labels = array(
        'name' => _x('Noticias', 'noticias'),
        'singular_name' => _x('Noticias', 'post type singular name', 'noticias'),
        'menu_name' => _x('Noticias', 'admin menu', 'noticias'),
        'name_admin_bar' => _x('Noticias', 'add new on admin bar', 'noticias'),
        'add_new' => _x('Agrega Nueva', 'book', 'noticias'),
        'add_new_item' => __('Agrega Nueva Noticia', 'noticias'),
        'new_item' => __('New Noticias', 'noticias'),
        'edit_item' => __('Edit Noticias', 'noticias'),
        'view_item' => __('View Noticias', 'noticias'),
        'all_items' => __('All Noticias', 'noticias'),
        'search_items' => __('Search Noticias', 'noticias'),
        'parent_item_colon' => __('Parent Noticias:', 'noticias'),
        'not_found' => __('No Noticias found.', 'noticias'),
        'not_found_in_trash' => __('No Noticias found in Trash.', 'noticias')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'hemisferio'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'noticias'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array('title', 'editor', 'thumbnail', 'category'),
        'taxonomies' => array('category', 'post_tag'),
    );

    register_post_type('noticias', $args);
}

function wpse28145_add_custom_types($query)
{
    if (is_tag() && $query->is_main_query()) {
        // this gets all post types:
        $post_types = get_post_types();
        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );
        $query->set('post_type', $post_types);
    }

    if (is_category() && $query->is_main_query()) {
        $post_types = get_post_types();
        $query->set('post_type', $post_types);
    }

    if (is_search() && $query->is_main_query()) {
        $post_types = get_post_types();
        $query->set('post_type', $post_types);
    }

}

add_filter('pre_get_posts', 'wpse28145_add_custom_types');