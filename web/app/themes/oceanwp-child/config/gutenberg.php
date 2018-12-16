<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 16/12/18
 * Time: 09:53
 */

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);