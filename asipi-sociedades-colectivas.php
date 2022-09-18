<?php
/**
 * Asipi Sociedades Colectivas
 *
 * @package           ASIPICOLECTIVESSOCIETY
 * @author            Juan Carlos Avila
 * @copyright         2022 ZTGRUOP
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Asipi Sociedades Colectivas
 *
 * Description:       Sociedades Colectivas
 * Version:           1.0.3
 * Author:            Juan Carlos Avila
 * Text Domain:       asipi_colective_society
 *
 */
define('ASIPICOLECTIVESSOCIETY_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ASIPICOLECTIVESSOCIETY_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ASIPICOLECTIVESSOCIETY_PLUGIN_FILE', __FILE__);
define('ASIPICOLECTIVESSOCIETY_PLUGIN_VERSION', '1.0.0');


//Language domain
add_action( 'plugins_loaded', 'asipi_colective_society_textdomain' );
   function asipi_colective_society_textdomain() {
       load_plugin_textdomain( 'asipi_colective_society', false, dirname( plugin_basename( ASIPICOLECTIVESSOCIETY_PLUGIN_FILE ) ) . '/languages/' );
   }

 //activate plugin
function asipi_colective_society_activate() { 
    asipi_colective_society_ctp_register();
    asipi_country_origin_function();
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'asipi_colective_society_activate' );


require ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . '/inc/post-types.php';
require ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . '/inc/taxonomies.php';
require ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . '/functions.php';
