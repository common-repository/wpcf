<?php
/**
 * Helper Class
 *
 * @package Haruncpi\WpCf
 * @author Harun<harun.cox@gmail.com>
 * @link https://learn24bd.com
 * @since 1.1.3
 */

namespace Haruncpi\WpCf;

/**
 * Utils Class
 *
 * @since 1.1.3
 */
class Utils {

	/**
	 * Load view
	 *
	 * @since 1.1.3
	 *
	 * @param string $path view path.
	 * @param array  $data view data.
	 *
	 * @return void
	 */
	public static function load_view( $path = null, $data = array() ) {
		$final_path = WPCF_DIR . 'views';
		if ( $path ) {
			$final_path .= '/' . $path;
		}

		if ( file_exists( $final_path ) ) {
			if ( count( $data ) > 0 ) {
				extract( $data );
			}
			
			require_once $final_path;
		}

	}
}
