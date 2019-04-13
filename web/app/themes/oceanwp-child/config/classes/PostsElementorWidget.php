<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 29/12/18
 * Time: 18:20
 */

namespace Elementor;

class PostsElementorWidget extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'asmf_posts';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Articles', 'asmf' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-newspaper-o';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $this->start_controls_section(
            'options',
            [
                'label' => __( 'Options', 'asmf' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $categories = array();
        foreach (get_categories() as $category) {
            $categories[$category->term_id] = $category->name;
        }

        $this->add_control(
            'categories',
            [
                'label' => __( 'Catégories', 'asmf' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $categories,
                'default' => array_keys($categories),
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        global $paged, $post;
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        $settings = $this->get_settings_for_display();

        $categories = $settings['categories'];

        ?>
        <div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="heading.default">
            <div class="elementor-widget-container">
                <h2 class="elementor-heading-title elementor-size-default"><?php echo __('Actualités', 'asmf') ?></h2>
            </div>
        </div>
        <div id="blog-entries" class="<?php oceanwp_blog_wrap_classes(); ?>">
        <?php
        $base = get_permalink();
        $query = new \WP_Query(array(
            'posts_per_page' => get_option('posts_per_page'),
            'paged' => $paged,
            'cat' => $categories,
        ));

        if ( $query->have_posts() ) {
            foreach ( $query->posts as $post ) {
                get_template_part('partials/entry/layout', $post->post_type);
            }
        }
        ?>
        </div>
        <?php
        if (function_exists('pagination')) {
            pagination($base, $query->max_num_pages);
        }
        wp_reset_postdata();
    }
}