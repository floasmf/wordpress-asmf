<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 25/08/18
 * Time: 12:19
 */

class EventsWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'asmf_events',
// Widget name will appear in UI
            __('Evénements à venir', 'asmf'),

            // Widget description
            array('description' => __('Widget pour afficher les événements à venir', 'asmf'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $category_event = get_category_by_slug( 'evenement');
        $events = get_posts(array(
            'numberposts' => -1,
            'category' => $category_event->term_id,
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'date',
                    'value' => date('Ymd'),
                    'type' => 'DATE',
                    'compare' => '>='
                )
            ),
            'orderby' => 'date',
            'order' => 'ASC'
        ));
        if($events) {
            $title = apply_filters('widget_title', $instance['title']);

            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if (!empty($title))
                echo $args['before_title'] . $title . $args['after_title'];

            $html = '<div id="events-carousel">';
            foreach ($events as $event) {
                setup_postdata($event);

                $html .= '<div class="event">';
                // Date
                $date = new DateTime(get_field('date', $event));
                $html .= sprintf('<div class="date pull-right">%s</div>', strftime('%e %b %Y', $date->getTimestamp()));
                // Categories
                $html .= '<div class="categories">';
                foreach (wp_get_post_categories($event->ID) as $category) {
                    $html .= sprintf('<div class="category">%s</div>', get_cat_name($category));
                }
                $html .= '</div>';
                // Titre
                $html .= sprintf('<h4 class="title">%s</h4>', get_the_title($event));
                // Extrait
                $html .= sprintf('<div class="excerpt">%s</div>',get_the_excerpt());
                // Image principale
                $html .= get_the_post_thumbnail($event);
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
            $title = __('Évènements', 'asmf');
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