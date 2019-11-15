<?php
/**
 * Single post layout
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<article id="post-<?php the_ID(); ?>">
	<?php
	// Get posts format
	$format = get_post_format();
	get_template_part( 'partials/single/media/blog-single', $format ? $format : 'thumbnail' );

	get_template_part( 'partials/single/header' );

	get_template_part( 'partials/single/content' );

    $documents = get_field('documents');
    if(!empty($documents)) {
        ?>
        <div class="projet-educatif-documents">
            <?php
            foreach ($documents as $document) {
                $title = $document['titre'];
                ?>
                <a class="projet-educatif-document" href="<?php echo $document['document'] ?>" target="_blank" title="<?php echo $title ?>">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/icon-pdf.png" alt="">
                    <div><?php echo $title ?></div>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
    }

    // Social Share
    if (OCEAN_EXTRA_ACTIVE ) {
        do_action( 'ocean_social_share' );
    }
    ?>

</article>