<?php
/*
* Customisation du template pour le rendre compatible avec le thème
*/

get_header(); ?>

<?php do_action( 'ocean_before_content_wrap' ); ?>

<div id="content-wrap" class="container clr">

    <?php do_action( 'ocean_before_primary' ); ?>

    <div id="primary" class="content-area clr">

        <?php do_action( 'ocean_before_content' ); ?>

        <div id="content" class="site-content clr">

            <?php do_action( 'ocean_before_content_inner' ); ?>

            <?php phort_load_view(); ?>

            <?php do_action( 'ocean_after_content_inner' ); ?>

        </div><!-- #content -->

        <?php do_action( 'ocean_after_content' ); ?>

    </div><!-- #primary -->

    <?php do_action( 'ocean_after_primary' ); ?>

    <?php do_action( 'ocean_display_sidebar' ); ?>

</div><!-- #content-wrap -->

<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer(); ?>