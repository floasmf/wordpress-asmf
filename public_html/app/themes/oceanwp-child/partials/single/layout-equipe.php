<article id="post-<?php the_ID(); ?>">
    <?php
    global $paged, $post;
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    if ($paged == 1) {
        ?>
        <section id="post-thumbnail-team" class="elementor-section">
            <?php the_post_thumbnail('thumbnail-team'); ?>
            <h1 class="title"><?php the_title(); ?></h1>
        </section>
        <?php
        $convocations = get_field('convocation');
        $count_convocations = $convocations ? count($convocations) : 0;
        if ($count_convocations) { ?>
            <section id="convocations" class="elementor-section">
                <div class="elementor-element elementor-widget elementor-widget-heading"
                     data-element_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default"><?php echo __('Convocations', 'asmf') ?></h2>
                    </div>
                </div>
                <div class="container-convocation">
                    <div class="oceanwp-row clr">
                        <?php
                        if ($count_convocations <= 2 || $count_convocations % 2 == 0) {
                            $class = 'span_1_of_2';
                        } else {
                            $class = 'span_1_of_3';
                        }
                        foreach ($convocations as $convocation) {
                            ?>
                            <div class="convocation col <?php echo $class ?>">
                                <div class="team-name">
                                    <span><?php echo $convocation ['nom_de_lequipe'] ?></span>
                                </div>
                                <div class="convocation-content">
                                    <div class="details">
                                        <dt>Lieu</dt>
                                        <dd><?php echo $convocation['lieu_du_match'] ?></dd>
                                        <dt>Adv.</dt>
                                        <dd><?php echo $convocation['equipe_adverse'] ?></dd>
                                        <dt>Date</dt>
                                        <dd><?php echo $convocation['date_du_match'] ?></dd>
                                        <dt>RDV</dt>
                                        <dd><?php echo $convocation['heure_de_convocation'] ?></dd>
                                        <dt>Début</dt>
                                        <dd><?php echo $convocation['heure_du_match'] ?></dd>
                                        <dt>Terrain</dt>
                                        <dd><?php echo $convocation['type_de_terrain'] ?></dd>
                                        <dt>Info.</dt>
                                        <dd><?php echo $convocation['informations'] ?></dd>
                                    </div>
                                    <hr>
                                    <ul class="players">
                                        <?php foreach ($convocation['joueurs'] as $player) {
                                            ?>
                                            <li><?php echo get_the_title($player) ?></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?
                        }
                        ?>
                    </div>
                </div>
            </section>
        <?php }
    }
    $category_blog = get_field('categorie_article_equipe');
    $category_event = get_category_by_slug('evenement');
    $base = get_permalink();
    $query = new WP_Query(array(
        'posts_per_page' => get_option('posts_per_page'),
        'paged' => $paged,
        'category__in' => $category_blog,
    ));

    if ($query->have_posts()) { ?>
        <section id="blog-entries" class="<?php oceanwp_blog_wrap_classes(); ?> elementor-section">
            <div class="elementor-element elementor-widget elementor-widget-heading"
                 data-element_type="heading.default">
                <div class="elementor-widget-container">
                    <h2 class="elementor-heading-title elementor-size-default"><?php echo __('Actualités', 'asmf') ?></h2>
                </div>
            </div>
            <?php

            foreach ($query->posts as $post) {
                get_template_part('partials/entry/layout', $post->post_type);
            } ?>
        </section>
    <?php } ?>
</article>
<?php
if (function_exists('pagination')) {
    pagination($base, $query->max_num_pages);
}
wp_reset_postdata();
