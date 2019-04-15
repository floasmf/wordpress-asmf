<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 23/03/19
 * Time: 11:44
 */

function category_title() {
    if(is_category()) {
        echo '<h1>'.get_the_category()[0]->name.'</h1>';
        echo '<div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="heading.default" >';
        echo '<div class="elementor-widget-container">';
        echo '<h2 class="elementor-heading-title elementor-size-default">'.__('Actualités', 'asmf') .'</h2>';
        echo '</div>';
        echo '</div>';
    }
}

add_action('ocean_before_content_inner', 'category_title');