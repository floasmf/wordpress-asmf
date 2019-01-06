<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 06/01/19
 * Time: 14:54
 */
function register_elementor_widgets() {
    require_once get_stylesheet_directory().'/config/classes/PostsElementorWidget.php';

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PostsElementorWidget() );
}
add_action( 'elementor/widgets/widgets_registered', 'register_elementor_widgets' );