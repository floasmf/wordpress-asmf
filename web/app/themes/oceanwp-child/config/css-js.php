<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 31/08/18
 * Time: 18:07
 */

function add_styles_scripts() {
    wp_enqueue_script('jquery.inherit', get_stylesheet_directory_uri().'/assets/lib/jquery.inherit.js', array('oceanwp-main'));
    wp_enqueue_script('PartnersWidgetsController', get_stylesheet_directory_uri().'/assets/js/classes/PartnersWidgetController.js', array('jquery.inherit'));
    wp_enqueue_script('main', get_stylesheet_directory_uri().'/assets/js/main.js', array('jquery.inherit'));

}

add_action( 'wp_enqueue_scripts', 'add_styles_scripts' , 10);
