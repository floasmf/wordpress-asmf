<?php
/**
 * Displays the post header
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Return if quote format
if ( 'quote' == get_post_format() ) {
	return;
}

// Heading tag
$heading = get_theme_mod( 'ocean_single_post_heading_tag', 'h2' );
$heading = $heading ? $heading : 'h2';
$heading = apply_filters( 'ocean_single_post_heading', $heading ); ?>

<?php do_action( 'ocean_before_single_post_title' ); ?>
<?php $event_date = get_field('date'); ?>
<header class="entry-header clr">
	<<?php echo esc_attr( $heading ); ?> class="single-post-title entry-title <?php echo $event_date ? 'no-margin' : ''?>"<?php oceanwp_schema_markup( 'headline' ); ?>><?php the_title(); ?></<?php echo esc_attr( $heading ); ?>><!-- .single-post-title -->
    <?php
    if($event_date) { ?>
        <p class="event-date"><?php echo $event_date ?></p>
    <?php } ?>
</header><!-- .entry-header -->

<?php do_action( 'ocean_after_single_post_title' ); ?>