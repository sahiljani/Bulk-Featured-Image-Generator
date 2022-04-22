<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://janisahil.com/
 * @since             1.0.0
 * @package           Image_Generator
 *
 * @wordpress-plugin
 * Plugin Name:       Bulk Featured Image Generator
 * Plugin URI:        https://janisahil.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sahil Jani
 * Author URI:        https://janisahil.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       image-generator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	exit;
}

define('IMAGE_GENERATOR_VERSION', '1.0.0');


if (is_admin()) {

	require_once plugin_dir_path(__FILE__) . 'includes/add-menu.php';
	require_once plugin_dir_path(__FILE__) . 'includes/custom-settings-fields.php';
	require_once plugin_dir_path(__FILE__) . 'includes/display.php';
	require_once plugin_dir_path(__FILE__) . 'includes/register-settings.php';
	require_once plugin_dir_path(__FILE__) . 'includes/settings.php';

	// require_once plugin_dir_path(__FILE__) . 'inc/callback.php';
	// require_once plugin_dir_path(__FILE__) . 'inc/core-fun.php';
	// require_once plugin_dir_path(__FILE__) . 'inc/register.php';
	// require_once plugin_dir_path(__FILE__) . 'inc/set.php';


	// 
	require_once plugin_dir_path(__FILE__) . 'includes/functions/font.php';
	require_once plugin_dir_path(__FILE__) . 'includes/functions/general.php';
	require_once plugin_dir_path(__FILE__) . 'includes/functions/others.php';
	require_once plugin_dir_path(__FILE__) . 'includes/functions/position.php';
	require_once plugin_dir_path(__FILE__) . 'includes/functions/set-general.php';
	require_once plugin_dir_path(__FILE__) . 'includes/settings.php';
}


function bulk_image_generator_enqueue_admin_pages($hook) {

	$style_css = plugin_dir_url(__FILE__) . 'css/style.css';
	$script_js = plugin_dir_url(__FILE__) . 'js/script.js';




	wp_enqueue_style('bulk_image_generator_style', $style_css, array(), null, 'all');
	wp_enqueue_script('bulk_image_generator_script', $script_js, array('jquery'), '1.0', true);
}
add_action('admin_menu', 'bulk_image_generator_enqueue_admin_pages');