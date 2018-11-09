<article id="post-<?php the_ID(); ?>">
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
            if($count_convocations <= 2 || $count_convocations % 2 == 0) {
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
    <h2>Actualités</h2>
    <div>
        TODO!!!!!
    </div>
</article>