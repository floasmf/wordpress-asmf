<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 25/08/18
 * Time: 12:19
 */

class ContactWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'asmf_contact',
// Widget name will appear in UI
            __('Contact équipe', 'asmf_domain'),

            // Widget description
            array('description' => __('Widget pour afficher les contacts de chaque équipe', 'asmf_domain'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        global $post;
        if($post->post_type == 'equipe') {
            $contact_equipe = get_field('contact_equipe', $post->ID);
            if($contact_equipe) {
                $title = apply_filters('widget_title', $instance['title']);
                // before and after widget arguments are defined by themes
                echo $args['before_widget'];
                if (!empty($title))
                    echo $args['before_title'] . $title . $args['after_title'];


                foreach ($contact_equipe as $contact) {
                    echo '<div class="team">'.$contact['equipe'].'</div>';

                    echo '<ul>';
                    foreach ($contact['personne'] as $personne) {
                        $html = '<li>';
                        $lastname = '<span class="lastname">'.$personne['nom'].'</span>';
                        $firstname = '<span class="firstname">'.$personne['prenom'].'</span>';
                        $phone = $personne['telephone'];
                        $html .= '<strong class="name">'.join(' ', [$lastname, $firstname]).'</strong>';
                        $html .= '<a href="tel:'.$phone.'">'.chunk_split($phone, 2, ' ').'</a>';
                        $html .= '</li>';
                        echo $html;
                    }
                    echo '</ul>';
                }

                echo $args['after_widget'];
            }
        }
    }

// Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Contact', 'asmf_domain');
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