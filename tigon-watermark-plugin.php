<?php
/**
 * Plugin Name: WooCommerce-Product-Watermark-Plugin
 * Plugin URI:  https://jaslowdigital.com
 * Description: Add watermark functionality for products for TIGON Golf Carts.
 * Version:     2.0.2
 * Author:      Jaslow Digital
 * Author URI:  https://jaslowdigital.com
 * Authors:     Noah Jaslow | Joe Shapiro
 * Text Domain: tigonwm-plugin-woocommerce 
 * Copyright: 2025 Jaslow Digital
 * Requires Plugins: WooCommerce,
 */
// Plugin by Jaslow Digital

/*
 * Callbacks
 */
if (!defined('WPINC')) {
	die();
}

if (!defined('tigonwm_path')) {
	define('tigonwm_path', plugin_dir_url( __FILE__ ));
}




function tigonwm_dbtables()
{
	Global $wpdb;
	$charset_collate       = $wpdb->get_charset_collate();
	$tigonwm_watermarks    = 'tigonwm_watermarks';
	$tigonwm_table         = "CREATE TABLE $tigonwm_watermarks (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`watermark` varchar(255) DEFAULT NULL,
							PRIMARY KEY (`id`)
						) $charset_collate;";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($tigonwm_table);
}
register_activation_hook( __FILE__, 'tigonwm_dbtables' );

require_once('essential-asset.php');
