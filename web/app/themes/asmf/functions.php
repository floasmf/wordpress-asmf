<?php

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