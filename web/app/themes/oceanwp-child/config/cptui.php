<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 08/09/18
 * Time: 16:28
 */

function get_player_title ( $post_id ) {
    global $wpdb;
    if ( get_post_type( $post_id ) == 'joueur' ) {
        $lastname = mb_strtoupper(get_field('lastname', $post_id));
        $firstname = ucwords(mb_strtolower(get_field('firstname', $post_id)));
        $title = join(' ', [$lastname, $firstname]);
        $where = array( 'ID' => $post_id );
        $wpdb->update( $wpdb->posts, array( 'post_title' => $title ), $where );
    }
}
add_action( 'save_post', 'get_player_title' );
