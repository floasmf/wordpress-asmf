<?php

function admin_bar(){
    if(is_user_logged_in()){
        show_admin_bar(true);
    }
}
add_action('init', 'admin_bar' );

function add_scripts() {
    /**
     * Style
     */
    wp_register_style('theme-style', get_stylesheet_directory_uri().'/assets/css/style.min.css' );
    wp_enqueue_style( 'theme-style' );

    /**
     * Script JS
     */
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_stylesheet_directory_uri().'/assets/js/vendor/jquery-3.3.1.min.js' );
    wp_register_script('theme-script1', get_stylesheet_directory_uri().'/assets/js/vendor/bootstrap.bundle.min.js' , array('jquery'));
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'theme-script1' );
}
add_action( 'wp_enqueue_scripts', 'add_scripts', 100);

add_action('widgets_init','add_widgets');
function add_widgets() {
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