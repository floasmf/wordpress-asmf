<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 12/01/19
 * Time: 16:48
 */

function my_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo wp_get_attachment_url(get_theme_mod( 'custom_logo' )); ?>);
            width: 100%;
            background-size: contain;
            background-position: center;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'login_logo_url_title' );