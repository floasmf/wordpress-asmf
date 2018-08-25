<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 25/08/18
 * Time: 12:16
 */

include 'classes/EventsWidget.php';

// Enregistrement et chargement des widgets
function wpb_load_widgets() {
    register_widget( 'EventsWidget' );
}
add_action( 'widgets_init', 'wpb_load_widgets' );