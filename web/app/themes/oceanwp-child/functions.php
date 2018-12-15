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
require_once 'config/social-options.php';

function pagination($base, $max_num_pages) {
    global $paged;

    $paginate_links = paginate_links(array(
        'base'            => $base.'%_%',
        'format'          => '?page=%#%',
        'total'           => $max_num_pages,
        'current'         => $paged,
        'show_all'        => false,
        'end_size'        => 1,
        'mid_size'        => 2,
        'prev_next'       => True,
        'prev_text'       => __('«'),
        'next_text'       => __('»'),
        'type'            => 'plain',
        'add_args'        => false,
        'add_fragment'    => ''
    ));

    if ($paginate_links) {
        ?>
        <nav class='custom-pagination'><?php echo $paginate_links ?></nav>
        <?php
    }
}