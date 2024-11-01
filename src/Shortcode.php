<?php
/**
 * Shortcode Register
 *
 * @package Haruncpi\WpCf
 * @author Harun<harun.cox@gmail.com>
 * @link https://learn24bd.com
 * @since 1.1.3
 */

namespace Haruncpi\WpCf;

/**
 * Shortcode Class
 *
 * @since 1.1.3
 */
class Shortcode {

	/**
	 * Register hooks
	 *
	 * @since 1.1.3
	 *
	 * @return void
	 */
	public function __construct() {
		add_shortcode( 'wpcf', array( $this, 'render_wpcf_shortcode' ) );
	}

	/**
	 * Register wpcf shortcode
	 *
	 * @since 1.1.3
	 *
	 * @param array $atts attributes.
	 *
	 * @return void
	 */
	public function render_wpcf_shortcode( $atts ) {
		$a = shortcode_atts(
			array(
				'to' => '',
			),
			$atts
		);

		ob_start();
		Utils::load_view(
			'shortcodes/contact-form.php'
		);
		return ob_get_clean();
	}

}
