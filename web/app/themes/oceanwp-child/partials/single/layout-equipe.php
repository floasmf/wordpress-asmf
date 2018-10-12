<article id="post-<?php the_ID(); ?>">
    <div id="post-thumbnail-team">
        <?php the_post_thumbnail('thumbnail-team'); ?>
        <h1 class="title"><?php the_title(); ?></h1>
    </div>

    <h2>Convocations</h2>
    <div id="convocations">
        <div class="oceanwp-row">
            <?php
            $convocations = get_field('convocation');
            $class = 'col span_1_of_2';
            foreach ($convocations as $convocation) {
                ?>
                <div class="convocation <?php echo $class ?>">
                    <div class="team-name"><?php echo $convocation ['nom_de_lequipe'] ?></div>
                    <dt>Lieu</dt>
                    <dd><?php echo $convocation['lieu_du_match'] ?></dd>
                    <dt>Adv.</dt>
                    <dd><?php echo $convocation['equipe_adverse'] ?></dd>
                    <dt>Terrain</dt>
                    <dd><?php echo $convocation['type_de_terrain'] ?></dd>
                    <dt>Début</dt>
                    <dd><?php echo $convocation['heure_du_match'] ?></dd>
                    <dt>RDV</dt>
                    <dd><?php echo $convocation['heure_de_convocation'] ?></dd>
                    <ul class="players">
                        <?php foreach ($convocation['joueurs'] as $player) {
                            ?>
                            <li><?php echo get_the_title($player) ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?
            }
            ?>
        </div>
    </div>
</article>