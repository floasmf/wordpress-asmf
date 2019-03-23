<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 23/03/19
 * Time: 17:13
 */

namespace Elementor;

class MembersElementorWidget extends Widget_Base
{

    /**
     * Get element name.
     *
     * Retrieve the element name.
     *
     * @since 1.4.0
     * @access public
     *
     * @return string The name.
     */
    public function get_name()
    {
        return 'asmf_members';
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
        return __( 'Membres', 'asmf' );
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
        return 'fa fa-users';
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
            'content_section',
            [
                'label' => __( 'Membres', 'asmf' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'role', [
                'label' => __( 'Rôle', 'asmf' ),
                'placeholder' => __( 'Rôle', 'asmf' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'firstname', [
                'label' => __( 'Prénom', 'asmf' ),
                'placeholder' => __( 'Prénom', 'asmf' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'lastname', [
                'label' => __( 'Nom', 'asmf' ),
                'placeholder' => __( 'Nom', 'asmf' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'phone', [
                'label' => __( 'Téléphone', 'asmf' ),
                'placeholder' => __( 'Téléphone', 'asmf' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'members',
            [
                'label' => __( 'Liste des membres', 'asmf' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ firstname }}} {{{ lastname }}} ({{{ role }}})',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( $settings['members'] ) {
            echo '<table>';
            foreach (  $settings['members'] as $item ) {
                echo '<tr class="elementor-repeater-item-' . $item['_id'] . '">';
                echo '<td class="role">'.$item['role'].'</td>';
                echo '<td class="name"><span class="lastname">'.$item['lastname'].'</span> '.$item['firstname'].'</td>';
                echo '<td class="phone">'.($item['phone'] ? '<a href="tel:'.$item['phone'].'">'.chunk_split($item['phone'], 2, ' ').'</a>' : '').'</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }

}