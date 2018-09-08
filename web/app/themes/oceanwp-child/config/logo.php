<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 30/08/18
 * Time: 19:14
 */

/**
 * Suppression du logo dans le header
 */
function remove_actions() {
    remove_action('ocean_header_inner_middle_content', 'oceanwp_header_logo',10);
}
//add_action( 'init', 'remove_actions');

/**
 * Ajout du logo dans la top bar
 */
//add_action('ocean_before_top_bar_inner', 'oceanwp_header_logo', 1);
