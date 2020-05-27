<?php defined( 'ABSPATH' ) or die( 'No direct access allowed' );

/**
 * @package REST_API_Custom_Fields
 * @version 1.2
 */

/*
Plugin Name: REST API Custom Fields
Description: Enhances Wordpress REST API v2 about metadata
Author: Integromat
Author URI: https://www.integromat.com/
Version: 1.2
*/

define('IMAPIE_FIELD_PREFIX', 'integromat_api_field_');
define('IMAPIE_MENUITEM_IDENTIFIER', 'integromat_api_mi');


include __DIR__ . '/response/response.php';
include __DIR__ . '/settings/render.php';
include __DIR__ . '/settings/Controller.php';
include __DIR__ . '/settings/MetaObject.php';
$IAPIControler = new \IntegromatAPI\Controller();
$IAPIControler->init();


// Custom CSS, JS
add_action('admin_enqueue_scripts', function ($hook) {
	if (!isset($_GET['page']) || $_GET['page'] !== IMAPIE_MENUITEM_IDENTIFIER) {
		return;
	}
	wp_enqueue_style('imapie_css', plugin_dir_url(__FILE__) . '/assets/imapie.css');
	wp_enqueue_script('imapie_js', plugin_dir_url(__FILE__) . '/assets/imapie.js');

	// Load WP native jQuery libraries
	wp_enqueue_script('jquery-ui-tabs');
});

