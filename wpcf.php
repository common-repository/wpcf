<?php
/**
 * Plugin Name: WPCF
 * Plugin URI: https://learn24bd.com
 * Description: WPCF (Wordpress Contact Form) is simple contact form. You can add this in any where whare you need it. It support sortcode.
 * Author: Harun
 * Author URI: https://learn24bd.com
 * Version: 1.1.3
 * License:GPL2
 * Requires at least: 5.3
 * Tested up to: 6.2
 * Text Domain: wpcf
 */

use Haruncpi\WpCf\Plugin;

require_once 'vendor/autoload.php';

define( 'WPCF_VERSION', '1.1.3' );
define( 'WPCF_FILE', __FILE__ );
define( 'WPCF_DIR', plugin_dir_path( __FILE__ ) );

$plugin = new Plugin();
$plugin->init();


