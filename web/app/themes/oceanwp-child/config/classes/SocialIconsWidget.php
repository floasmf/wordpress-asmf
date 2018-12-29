<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 25/08/18
 * Time: 12:19
 */

class SocialIconsWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'asmf_social_icons',
// Widget name will appear in UI
            __('Icônes sociaux + boutique', 'asmf'),

            // Widget description
            array('description' => __('Widget pour afficher les icônes sociaux et le bouton de la boutique', 'asmf'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {

        // Style
        $style = get_theme_mod( 'ocean_menu_social_style', 'simple' );
        $style = $style ? $style : 'simple';

// Classes
        $classes = array( 'oceanwp-social-menu', 'clr' );

// Add class if social menu has class
        if (  'simple' != $style ) {
            $classes[] = 'social-with-style';
        } else {
            $classes[] = 'simple-social';
        }

// Turn classes into space seperated string
        $classes = implode( ' ', $classes );

// Inner classes
        $inner_classes = array( 'social-menu-inner', 'clr' );
        if ( 'simple' != $style ) {
            $inner_classes[] = $style;
        }

// Turn classes into space seperated string
        $inner_classes = implode( ' ', $inner_classes );

        $options_general_page = acf_get_options_page('asmf-options-general');
        $url = get_field('fichier_boutique', $options_general_page['post_id']);

        $profiles = get_theme_mod('ocean_menu_social_profiles');
        $social_options = oceanwp_social_options();
        if (empty($social_options) && !$profiles && !$url) {
            return;
        }
        // Get theme mods
        $link_target = get_theme_mod( 'ocean_menu_social_target', 'blank' ); ?>

        <div class="<?php echo esc_attr( $classes ); ?>">

        <div class="<?php echo esc_attr( $inner_classes ); ?>">
            <ul class="login-shop-menu">
                <?php
                if($url) {
                    ?>
                    <li>
                        <a href="<?php echo $url ?>" target="_blank"><?php echo __('Boutique', 'asmf'); ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul>

                <?php
                // Loop through social options
                foreach ( $social_options as $key => $val ) {

                    // Get URL from the theme mods
                    $url = isset( $profiles[$key] ) ? $profiles[$key] : '';

                    // Display if there is a value defined
                    if ( $url ) {

                        // Display link
                        echo '<li class="oceanwp-'. esc_attr( $key ) .'">';

                        if ( in_array( $key, array( 'skype' ) ) ) {
                            echo '<a href="skype:'. esc_attr( $url ) .'?call" target="_self">';
                        } else if ( in_array( $key, array( 'email' ) ) ) {
                            echo '<a href="mailto:'. antispambot( esc_attr( $url ) ) .'" target="_self">';
                        } else {
                            echo '<a href="'. esc_url( $url ) .'" target="_'. esc_attr( $link_target ) .'">';
                        }

                        echo '<span class="'. esc_attr( $val['icon_class'] ) .'"></span>';

                        echo '</a>';

                        echo '</li>';

                    } // End url check

                } // End loop ?>

            </ul>
        </div>
        </div>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
} // Class wpb_widget ends here