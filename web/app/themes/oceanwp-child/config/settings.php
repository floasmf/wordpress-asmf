<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 09/09/18
 * Time: 09:17
 */

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'Options ASMF',
        'menu_title' => 'Options ASMF',
        'menu_slug' => 'asmf-options',
        'capability' => 'manage_options',
        'parent_slug' => '',
        'position' => false,
        'icon_url' => false,
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Classements',
        'menu_title' => 'Classements',
        'menu_slug' => 'asmf-options-ranks',
        'capability' => 'manage_options',
        'parent_slug' => 'asmf-options',
        'position' => false,
        'icon_url' => false,
    ));
}