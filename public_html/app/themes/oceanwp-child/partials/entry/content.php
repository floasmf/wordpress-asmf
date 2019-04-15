<?php
/**
 * Displays post entry content
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php do_action( 'ocean_before_blog_entry_content' ); ?>

<div class="blog-entry-summary clr"<?php oceanwp_schema_markup( 'entry_content' ); ?>>

    <?php
    echo wpautop($post->post_content);
    ?>

</div><!-- .blog-entry-summary -->

<?php do_action( 'ocean_after_blog_entry_content' ); ?>