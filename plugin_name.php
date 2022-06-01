<?php

/**
 * @package   PLUGIN_NAME
 * @author    {{author_name}} <{{author_email}}>
 * @license   GPL-3.0+
 * @link      {{author_link}}
 *
 * Plugin Name:     Plugin Name
 * Plugin URI:      {{plugin_link}}
 * Description:     @TODO
 * Version:         0.0.1
 * Author:          {{author_name}}
 * Author URI:      {{author_link}}
 * Text Domain:     plugin_textdomain
 * License:         GPL-3.0+
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:     /languages
 * Requires PHP:    7.0
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	die( 'We\'re sorry, but you can not directly access this file.' );
}

define( 'PN_VERSION', '0.0.1' );
define( 'PN_TEXTDOMAIN', 'plugin_textdomain' );
define( 'PN_NAME', 'Plugin Name' );
define( 'PN_PLUGIN_ROOT', plugin_dir_path( __FILE__ ) );
define( 'PN_PLUGIN_ABSOLUTE', __FILE__ );
define( 'PN_MIN_PHP_VERSION', '7.0' );
define( 'PN_WP_VERSION', '5.3' );

add_action(
	'init',
	static function () {
		load_plugin_textdomain( PN_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	);

if ( version_compare( PHP_VERSION, PN_MIN_PHP_VERSION, '<=' ) ) {
	add_action(
		'admin_init',
		static function() {
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	);
	add_action(
		'admin_notices',
		static function() {
			echo wp_kses_post(
				sprintf(
					'<div class="notice notice-error"><p>%s</p></div>',
					__( '"Plugin Name" requires PHP 5.6 or newer.', PN_TEXTDOMAIN )
				)
			);
		}
	);

	// Return early to prevent loading the plugin.
	return;
}
require_once(PN_PLUGIN_ROOT . 'vendor/autoload.php');
(new PLUGIN_NAME\Admin\Enqueue)->initialize();
