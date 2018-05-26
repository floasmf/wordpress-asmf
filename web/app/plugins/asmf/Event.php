<?php 
class Event
{
	
	function __construct()
	{
		add_action( 'init', array($this, 'register_cpt_event' ));
		add_action('admin_menu', array($this, 'add_admin_menu'), 20);
	}

	public function add_admin_menu()
    {
        add_submenu_page('asmf', 'Events', 'Events', 'manage_options', 'asmf__events', array($this, 'page_html'));
    }

    public function page_html() {
    	global $wpdb;

    	echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Bienvenue sur la page de Events du plugin</p>';
    }

	public function register_cpt_event() {
	 
	    $labels = array(
	        'name' => _x( 'Events', 'Events' ),
	        'singular_name' => _x( 'Event', 'event' ),
	        'add_new' => _x( 'Add New', 'event' ),
	        'add_new_item' => _x( 'Add New Event', 'event' ),
	        'edit_item' => _x( 'Edit Event', 'event' ),
	        'new_item' => _x( 'New Event', 'event' ),
	        'view_item' => _x( 'View Event', 'event' ),
	        'search_items' => _x( 'Search Events', 'event' ),
	        'not_found' => _x( 'No Events found', 'event' ),
	        'not_found_in_trash' => _x( 'No Events found in Trash', 'event' ),
	        'parent_item_colon' => _x( 'Parent Event:', 'event' ),
	        'menu_name' => _x( 'Events', 'event' ),
	    );
	 
	    $args = array(
	        'labels' => $labels,
	        'hierarchical' => true,
	        'description' => 'Events created',
	        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
	        'taxonomies' => array(),
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 5,
	        'menu_icon' => 'dashicons-calendar-alt',
	        'query_var' => true,
	        'can_export' => true,
	        'rewrite' => true,
	        'capability_type' => 'post'
	    );
	 
	    register_post_type( 'event', $args );

	    register_taxonomy(
		  'type',
		  'event',
		  array(
		    'label' => 'Types',
		    'labels' => array(
		    'name' => 'Types',
		    'singular_name' => 'Type',
		    'all_items' => 'Tous les types',
		    'edit_item' => 'Éditer le type',
		    'view_item' => 'Voir le type',
		    'update_item' => 'Mettre à jour le type',
		    'add_new_item' => 'Ajouter un type',
		    'new_item_name' => 'Nouveau type',
		    'search_items' => 'Rechercher parmi les types',
		    'popular_items' => 'Types les plus utilisés'
		  ),
		  'hierarchical' => true
		  )
		);
	    register_taxonomy_for_object_type( 'type', 'event' );
	}
}