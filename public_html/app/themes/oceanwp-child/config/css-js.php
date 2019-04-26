<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 31/08/18
 * Time: 18:07
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
    // Load the stylesheet
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/style.min.css', array( 'oceanwp-style' ), filemtime(get_stylesheet_directory().'/assets/css/style.min.css') );
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' , 10);

function add_styles_scripts() {
    wp_enqueue_script('jquery.inherit', get_stylesheet_directory_uri().'/assets/lib/jquery.inherit.js', array('oceanwp-main'));
    wp_enqueue_script('PartnersWidgetsController', get_stylesheet_directory_uri().'/assets/js/classes/PartnersWidgetController.js', array('jquery.inherit'), filemtime(get_stylesheet_directory().'/assets/js/classes/PartnersWidgetController.js'));
    wp_enqueue_script('CarouselController', get_stylesheet_directory_uri().'/assets/js/classes/CarouselController.js', array('jquery.inherit'),  filemtime(get_stylesheet_directory().'/assets/js/classes/CarouselController.js'));
    if (is_singular('equipe')) {
        wp_enqueue_script('TeamController', get_stylesheet_directory_uri().'/assets/js/classes/TeamController.js', array('jquery.inherit'),  filemtime(get_stylesheet_directory().'/assets/js/classes/TeamController.js'));
    }
    wp_enqueue_script('main', get_stylesheet_directory_uri().'/assets/js/main.js', array('jquery.inherit'), filemtime(get_stylesheet_directory().'/assets/js/main.js'));
    wp_dequeue_script( 'ops-js-scripts');
    wp_deregister_script('ops-js-scripts');
    wp_enqueue_script( 'ops-js-scripts', get_stylesheet_directory_uri().'/assets/js/posts-slider.js', array( 'jquery', 'oceanwp-main' ),  filemtime(get_stylesheet_directory().'/assets/js/posts-slider.js'));
}
add_action( 'wp_enqueue_scripts', 'add_styles_scripts' , 1000);
