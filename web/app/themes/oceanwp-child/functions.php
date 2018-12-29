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

require_once get_stylesheet_directory().'/config/css-js.php';
require_once get_stylesheet_directory().'/config/settings.php';
require_once get_stylesheet_directory().'/config/custom-widgets.php';
require_once get_stylesheet_directory().'/config/cptui.php';
require_once get_stylesheet_directory().'/config/image-size.php';
require_once get_stylesheet_directory().'/config/social-options.php';
require_once get_stylesheet_directory().'/config/pagination.php';
require_once get_stylesheet_directory().'/config/gutenberg.php';

add_action( 'elementor/widgets/widgets_registered', function() {
    require_once get_stylesheet_directory().'/config/classes/PostsElementorWidget.php';

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PostsElementorWidget() );
} );