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
include_once 'classes/SocialIconsWidget.php';

// Enregistrement et chargement des widgets
function load_widgets() {
    register_widget( 'ContactWidget' );
    register_widget( 'EventsWidget' );
    register_widget( 'PartnersWidget' );
    register_widget( 'SocialIconsWidget' );
}
add_action( 'widgets_init', 'load_widgets' );