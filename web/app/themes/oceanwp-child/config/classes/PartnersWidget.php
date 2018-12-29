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
        $options_partners_page = acf_get_options_page('asmf-options-partners');
        $fields = get_fields($options_partners_page['post_id']);
        if ($fields['partenaires']) {
            $title = apply_filters('widget_title', $instance['title']);
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if (!empty($title))
                echo $args['before_title'] . $title . $args['after_title'];

            $html = '<div id="partners-carousel">';
            foreach ($fields['partenaires'] as $partner) {
                $logo = wp_get_attachment_image_src( $partner['logo'], 'medium' );

                $html .= '<div class="partner">';
                $html .= sprintf('<a href="%s" target="_blank">', $partner['site_web']);
                $html .= sprintf('<img src="%s" alt="%s">', $logo[0], $partner['nom']);
                $html .= '</a>';
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