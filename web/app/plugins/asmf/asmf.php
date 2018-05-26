<?php
/*
Plugin Name: ASMF
Description: Plugin permettant la gestion des équipes, joueurs, convocations..
Version: 1.0
Author: Florent GAILLARD
*/
class ASMF {
	
	public function __construct() {
		add_action('admin_menu', array($this, 'add_admin_menu'));

		include_once plugin_dir_path( __FILE__ ).'Convocation.php';
		new Convocation();

		include_once plugin_dir_path( __FILE__ ).'Event.php';
		new Event();

        include_once plugin_dir_path( __FILE__ ).'Player.php';
        new Player();
	}

	public function add_admin_menu() {
		add_menu_page('ASMF', 'ASMF', 'manage_options', 'asmf', array($this, 'page_html'));
	}

	public function page_html() {
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
	}

}
new ASMF();