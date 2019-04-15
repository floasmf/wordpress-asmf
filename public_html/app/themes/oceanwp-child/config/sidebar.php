<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 12/01/19
 * Time: 18:49
 */

function custom_register_sidebar() {

    unregister_sidebar('sidebar');

    $heading = 'h4';
    $heading = apply_filters( 'ocean_sidebar_heading', $heading );
    register_sidebar( array(
        'name'			=> esc_html__( 'Default Sidebar', 'oceanwp' ),
        'id'			=> 'sidebar',
        'description'	=> esc_html__( 'Widgets in this area will be displayed in the left or right sidebar area if you choose the Left or Right Sidebar layout.', 'oceanwp' ),
        'before_widget'	=> '<div id="%1$s" class="sidebar-box %2$s clr">',
        'after_widget'	=> '</div>',
        'before_title'	=> '<div class="container-widget-title"><'. $heading .' class="widget-title">',
        'after_title'	=> '</'. $heading .'></div>',
    ) );
}
add_action( 'widgets_init', 'custom_register_sidebar', 100);