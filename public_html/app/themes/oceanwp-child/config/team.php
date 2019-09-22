<?php
function add_meta_image_team(WPSEO_OpenGraph_Image $WPSEO_OpenGraph_Image){
    if( is_singular('equipe') ) {
        var_dump("Test");
        $WPSEO_OpenGraph_Image = new WPSEO_OpenGraph_Image();
        $images = get_field('images');
        if($images) {
            $WPSEO_OpenGraph_Image->
        }
    }
}
add_action('wpseo_add_opengraph_additional_images', 'add_meta_image_team');
