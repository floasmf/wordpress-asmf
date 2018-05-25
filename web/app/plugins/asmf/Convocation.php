<?php 
class Convocation
{
	
	function __construct()
	{
		add_action( 'init', array($this, 'register_cpt_convocation' ));
		add_action('admin_menu', array($this, 'add_admin_menu'), 20);
	}

	public static function install() {
		global $wpdb;

    	$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}players (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), first_name VARCHAR(255), email VARCHAR(255) NOT NULL);");
    }

    public static function uninstall() {
    	global $wpdb;

	    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}players;");
	}

	public function add_admin_menu()
    {
        add_submenu_page('asmf', 'Convocations', 'Convocations', 'manage_options', 'asmf__convocations', array($this, 'page_html'));
    }

    public function page_html() {
    	global $wpdb;

    	echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Bienvenue sur la page de convocations du plugin</p>';
		$players = $wpdb->get_results("SELECT * from {$wpdb->prefix}players;");
		if(!empty($players)) {
			echo '<table>';
			foreach ($players as $player) {
				echo '<tr><td>'.$player->name.'</td></tr>';
			}
			echo '</table>';
		}
    }

	public function register_cpt_convocation() {
	 
	    $labels = array(
	        'name' => _x( 'Convocations', 'convocations' ),
	        'singular_name' => _x( 'Convocation', 'convocation' ),
	        'add_new' => _x( 'Add New', 'convocation' ),
	        'add_new_item' => _x( 'Add New Convocation', 'convocation' ),
	        'edit_item' => _x( 'Edit Convocation', 'convocation' ),
	        'new_item' => _x( 'New Convocation', 'convocation' ),
	        'view_item' => _x( 'View Convocation', 'convocation' ),
	        'search_items' => _x( 'Search Convocations', 'convocation' ),
	        'not_found' => _x( 'No Convocations found', 'convocation' ),
	        'not_found_in_trash' => _x( 'No Convocations found in Trash', 'convocation' ),
	        'parent_item_colon' => _x( 'Parent Convocation:', 'convocation' ),
	        'menu_name' => _x( 'Convocations', 'convocation' ),
	    );
	 
	    $args = array(
	        'labels' => $labels,
	        'hierarchical' => true,
	        'description' => 'Convocations filterable by genre',
	        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions' ),
	        'taxonomies' => array( 'genres' ),
	        'public' => false,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 5,
	        'menu_icon' => 'dashicons-media-spreadsheet',
	        'query_var' => true,
	        'can_export' => true,
	        'rewrite' => true,
	        'capability_type' => 'post'
	    );
	 
	    register_post_type( 'convocation', $args );
	}
}