<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 25/08/18
 * Time: 12:19
 */

class RanksWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'asmf_ranks',
// Widget name will appear in UI
            __('Classements équipe', 'asmf_domain'),

            // Widget description
            array('description' => __('Widget pour afficher les classements de chaque équipe', 'asmf_domain'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        global $post;

        $title = apply_filters('widget_title', $instance['title']);
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        if($post->post_type == 'equipe') {
            $category_team = get_field('categorie_equipe');
        }

        $options_ranks_page = acf_get_options_page('asmf-options-ranks');
        $fields = get_fields($options_ranks_page['post_id']);
        if ($fields['categories']) {
            $html = '<ul class="ranks-menu dropdown-menu sf-menu">';
            foreach ($fields['categories'] as $category) {
                if($category_team && $category_team != $category['categorie']->term_id) {
                    continue;
                }
                if($category['liens']) {
                    $html .= '<li class="menu-item menu-item-has-children dropdown">';
                    $html .= '<a class="menu-link" href="#"><span class="text-wrap">' . $category['categorie']->name.'<span class="nav-arrow fa fa-angle-down"></span></span></a>';
                    $html .= '<ul class="sub-menu">';
                    foreach ($category['liens'] as $lien) {
                        $html .= sprintf('<li class="menu-item"><a class="menu-link" href="%s" target="_blank">%s</a></li>', $lien['lien'], $lien['equipe']);
                    }
                    $html .= '</ul>';
                    $html .= '</li>';
                }
            }
            $html .= '</ul>';
            echo $html;
        }


        echo $args['after_widget'];
}

// Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Classements', 'asmf_domain');
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