<?php
function add_social_options($social_options) {
    return array_merge($social_options, array(
        'district' => array(
            'label' => esc_html__( 'District 44', 'asmf' ),
            'icon_class' => 'custom-icon icon-district',
        ),
        'fff' => array(
            'label' => esc_html__( 'FFF', 'asmf' ),
            'icon_class' => 'custom-icon icon-fff',
        ),
    ));
}
add_filter('ocean_social_options', 'add_social_options', 10, 1);