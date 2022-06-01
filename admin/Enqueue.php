<?php

/**
 * PLUGIN_NAME
 *
 * @package   PLUGIN_NAME
 * @author    {{author_name}} <{{author_email}}>
 * @copyright {{author_copyright}}
 * @license   GPL-3.0+
 * @link      {{author_link}}
 */

namespace PLUGIN_NAME\Admin;


/**
 * This class contain the Enqueue stuff for the backend
 */
class Enqueue {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {

		\add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		\add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}


	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since 0.0.1
	 * @return void
	 */
	public function enqueue_admin_styles() {
		$admin_page = \get_current_screen();

		\wp_enqueue_style( PN_TEXTDOMAIN . '-admin-styles', \plugins_url( 'assets/css/admin.css', PN_PLUGIN_ABSOLUTE ), array( 'dashicons' ), PN_VERSION );
	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since
	 * @return void
	 */
	public function enqueue_admin_scripts() {

	}

}
