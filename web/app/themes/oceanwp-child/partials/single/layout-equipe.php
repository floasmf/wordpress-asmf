<article id="post-<?php the_ID(); ?>">
    <?php
        global $paged, $post;
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        if($paged == 1 ) {
    ?>
    <div id="post-thumbnail-team">
        <?php the_post_thumbnail('thumbnail-team'); ?>
        <h1 class="title"><?php the_title(); ?></h1>
    </div>

    <h2>Convocations</h2>
    <div id="convocations">
        <div class="oceanwp-row clr">
            <?php
            $convocations = get_field('convocation');
            $count_convocations = count($convocations);
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
    <?php } ?>
    <h2>Actualités</h2>
    <div id="blog-entries" class="<?php oceanwp_blog_wrap_classes(); ?>">
        <?php
        $base = get_permalink();
        $query = new WP_Query(array(
            'posts_per_page' => get_option('posts_per_page'),
            'paged' => $paged
        ));

        if ( $query->have_posts() ) {
            foreach ( $query->get_posts() as $post ) {
                get_template_part('partials/entry/layout', $post->post_type);
            }

            if (function_exists('pagination')) {
                pagination($base, $query->max_num_pages);
            }
            wp_reset_postdata();
        }
        ?>
</article>