<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 25/08/18
 * Time: 12:19
 */

class CalendarWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            // Base ID of your widget
            'asmf_calendar',
            // Widget name will appear in UI
            __('Calendrier ', 'asmf'),

            // Widget description
            array('description' => __('Widget pour afficher les matchs à venir ou déja joués', 'asmf'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $slide_matchs = get_posts(array(
            'post_type' => 'matchs',
            'numberposts' => -1,
            'orderby' => 'order',
            'order' => 'ASC'
        ));
        if($slide_matchs) {
            $title = apply_filters('widget_title', $instance['title']);

            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if (!empty($title))
                echo $args['before_title'] . $title . $args['after_title'];

            $html = '<div id="calendar-carousel" class="carousel">';
            foreach ($slide_matchs as $slide_match) {

                $html .= '<div class="slide-match">';
                foreach (get_field('matchs', $slide_match->ID) as $match) {
                    $html .= sprintf('<div class="slide-match-title">%s</div>', $slide_match->post_title);
                    $html .= '<div class="match">';
                    $html .= sprintf('<div class="date">%s</div>', $match['date']);
                    $html .= '<div class="teams">';
                    $html .= sprintf('<span class="team team-1">%s</span>', $match['team_1']);
                    $html .= '<span class="versus">'._('vs').'</span>';
                    $html .= sprintf('<span class="team team-2">%s</span>', $match['team_2']);
                    $html .= '</div>';
                    if($match['score_team_1'] != '' && $match['score_team_2'] != '') {
                        $html .= '<div class="scores">';
                        $html .= sprintf('<span class="score score-1">%s</span>', $match['score_team_1']);
                        $html .= '-';
                        $html .= sprintf('<span class="score score-2">%s</span>', $match['score_team_2']);
                        $html .= '</div>';
                    }
                    $html .= '</div>';
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
            $title = __('Calendrier', 'asmf');
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