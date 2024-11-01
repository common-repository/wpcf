<?php
/**
 * Asset Management
 *
 * @package Haruncpi\WpCf
 * @author Harun<harun.cox@gmail.com>
 * @link https://learn24bd.com
 */

namespace Haruncpi\WpCf;

/**
 * Assets Class
 */
class Assets {
	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'load_site_scripts' ) );
	}

	/**
	 * Load admin scripts.
	 *
	 * @return void
	 */
	public function load_admin_scripts() {

	}

	/**
	 * Load site script
	 *
	 * @return void
	 */
	public function load_site_scripts() {
		wp_enqueue_script( 'jquery' );

		wp_register_style( 'wpcf_style', plugins_url( 'css/style.css', WPCF_FILE ), array(), WPCF_VERSION );
		wp_register_script( 'wpcf_functions', plugins_url( 'js/function.js', WPCF_FILE ), array( 'jquery' ), WPCF_VERSION, true );

		wp_enqueue_style( 'wpcf_style' );
		wp_enqueue_script( 'wpcf_functions' );
	}
}
