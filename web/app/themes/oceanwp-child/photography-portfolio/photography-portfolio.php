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

            <?php
            $taxonomy = 'phort_post_category';
            $portfolio_categories = get_terms(array('taxonomy' => $taxonomy, 'hide_empty ' => false));
            if ($portfolio_categories) {
                $active_category = get_queried_object()->slug;
                $html = '<div id="portfolio-categories" class="menu-categories"><ul>';
                foreach ($portfolio_categories as $portfolio_categorie) {
                    $html .= '<li>';
                    if($active_category == $portfolio_categorie->slug) {
                        $html .= sprintf('<span>%s</span>', $portfolio_categorie->name);

                    } else {
                        $html .= sprintf('<a href="%s">%s</a>', get_term_link($portfolio_categorie->slug, $taxonomy), $portfolio_categorie->name);
                    }
                    $html .= '</li>';
                }
                $html .= '</ul></div>';
                echo $html;
            }
            ?>

            <div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="heading.default">
                <div class="elementor-widget-container">
                    <h1 class="elementor-heading-title elementor-size-default"><?php echo phort_get_archive_title() ?></h1>
                </div>
            </div>

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