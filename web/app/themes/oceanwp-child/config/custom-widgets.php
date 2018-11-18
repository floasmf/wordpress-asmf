<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 25/08/18
 * Time: 12:16
 */

include_once 'classes/ContactWidget.php';
include_once 'classes/EventsWidget.php';
include_once 'classes/PartnersWidget.php';

// Enregistrement et chargement des widgets
function wpb_load_widgets() {
    register_widget( 'ContactWidget' );
    register_widget( 'EventsWidget' );
    register_widget( 'PartnersWidget' );
}
add_action( 'widgets_init', 'wpb_load_widgets' );