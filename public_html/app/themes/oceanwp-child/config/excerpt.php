<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 06/01/19
 * Time: 14:54
 */

function excerpt_length( $length ) {
    return get_theme_mod( 'ocean_blog_entry_excerpt_length', '30' );
}
add_filter( 'excerpt_length', 'excerpt_length', 10 );

function excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'excerpt_more' );