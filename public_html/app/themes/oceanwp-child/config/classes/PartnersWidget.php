<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 25/08/18
 * Time: 12:19
 */

class PartnersWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'asmf_partners',
// Widget name will appear in UI
            __('Partenaires', 'asmf'),

            // Widget description
            array('description' => __('Widget pour afficher les partenaires du club', 'asmf'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $partners = get_posts(array(
            'numberposts' => -1,
            'post_type' => 'partenaire',
            'orderby' => 'rand',
        ));
        if ($partners) {
            $title = apply_filters('widget_title', $instance['title']);
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if (!empty($title))
                echo $args['before_title'] . $title . $args['after_title'];

            $html = '<div id="partners-carousel">';
            foreach ($partners as $partner) {
                $id = $partner->ID;
                $logo = get_the_post_thumbnail_url( $id, 'medium' );
                $website =  get_field('website', $id);

                $html .= '<div class="partner">';

                if($website) {
                    $html .= sprintf('<a href="%s" target="_blank">', $website);
                }
                $html .= sprintf('<img src="%s" alt="%s">', $logo, $partner->post_title);
                if($website) {
                    $html .= '</a>';
                }

                $html .= '</div>';

            }
            $html .= '</div>';
            echo $html;
            echo $args['after_widget'];
        }
    }

// Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Nos partenaires', 'asmf');
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
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