<?php
/**
 * Plugin Initiator
 *
 * @package Haruncpi\WpCf
 * @author Harun<harun.cox@gmail.com>
 * @link https://learn24bd.com
 * @since 1.1.3
 */

namespace Haruncpi\WpCf;

/**
 * Plugin Class
 *
 * @since 1.1.3
 */
class Plugin {
	/**
	 * Constructor
	 *
	 * @since 1.1.3
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Init function.
	 *
	 * @since 1.1.3
	 *
	 * @return void
	 */
	public function init() {
		new Assets();
		new Ajax();
		new Shortcode();
	}

	/**
	 * Invoke when plugin activated.
	 *
	 * @since 1.1.3
	 *
	 * @return void
	 */
	public function on_plugin_active() {
	}

}
