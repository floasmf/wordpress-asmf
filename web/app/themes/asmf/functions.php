<?php

function add_scripts() {
    wp_register_style('theme-style', get_stylesheet_directory_uri().'/assets/css/style.min.css' );
    wp_enqueue_style( 'theme-style' );
    wp_register_script('theme-script', get_stylesheet_directory_uri().'/assets/js/vendor/bootstrap.min.js' );
    wp_enqueue_script( 'theme-script' );
}
add_action( 'wp_enqueue_scripts', 'add_scripts', 100);

add_action('widgets_init','add_widgets');
function add_widgets() {
    var_dump("COUCOU");

    register_sidebar(array(
        'id' => 'footer-1',
        'name' => 'Footer 1',
        'description' => 'Colonne 1 du footer',
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ));
}

add_action('init', 'add_menu');
function add_menu() {
    register_nav_menu('main_menu', 'Menu principal');

}