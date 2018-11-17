<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
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

require_once 'config/css-js.php';
require_once 'config/settings.php';
require_once 'config/custom-widgets.php';
require_once 'config/cptui.php';
require_once 'config/image-size.php';

function example_callback($social_options) {
    return array_merge($social_options, array(
        'district' => array(
            'label' => esc_html__( 'District 44', 'oceanwp' ),
            'icon_class' => 'custom-icon icon-district',
        ),
        'fff' => array(
            'label' => esc_html__( 'FFF', 'oceanwp' ),
            'icon_class' => 'custom-icon icon-fff',
        ),
    ));
}
add_filter('ocean_social_options', 'example_callback',10, 1);