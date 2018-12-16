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
    // Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
    $theme   = wp_get_theme( 'OceanWP' );
    $version = $theme->get( 'Version' );
    // Load the stylesheet
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/style.min.css', array( 'oceanwp-style' ), $version );

}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' , 10);

function add_styles_scripts() {
    wp_enqueue_script('jquery.inherit', get_stylesheet_directory_uri().'/assets/lib/jquery.inherit.js', array('oceanwp-main'));
    wp_enqueue_script('PartnersWidgetsController', get_stylesheet_directory_uri().'/assets/js/classes/PartnersWidgetController.js', array('jquery.inherit'));
    wp_enqueue_script('EventsWidgetsController', get_stylesheet_directory_uri().'/assets/js/classes/EventsWidgetController.js', array('jquery.inherit'));
    wp_enqueue_script('main', get_stylesheet_directory_uri().'/assets/js/main.js', array('jquery.inherit'));
    wp_dequeue_script( 'ops-js-scripts');
    wp_deregister_script('ops-js-scripts');
    wp_enqueue_script( 'ops-js-scripts', get_stylesheet_directory_uri().'/assets/js/posts-slider.js', array( 'jquery', 'oceanwp-main' ));
}
add_action( 'wp_enqueue_scripts', 'add_styles_scripts' , 1000);
