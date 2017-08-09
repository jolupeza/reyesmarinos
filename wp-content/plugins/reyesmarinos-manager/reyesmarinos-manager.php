<?php
/**
 * The file responsible for starting the Reyes Marinos Manager plugin.
 *
 * The Reyes Marinos Manager is a plugin it allows you to manage other types of content and functionality of the web.
 *
 *
 * @wordpress-plugin
 * Plugin Name:       Reyes Marinos Manager
 * Plugin URI:        https://github.com/jolupeza/reyesmarinos
 * Description:       Manage personalized web content.
 * Version:           1.0.0
 * Author:            Anewpixel
 * Text Domain:       reyesmarinos-manager-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, then abort execution.
if (!defined('WPINC')) {
    die;
}

/**
 * Include the core class responsible for loading all necessary components of the plugin.
 */
require_once plugin_dir_path(__FILE__).'includes/class-reyesmarinos-manager.php';

/**
 * Instantiates the Reyes Marinos Manager class and then
 * calls its run method officially starting up the plugin.
 */
function run_reyesmarinos_manager()
{
    $spmm = new ReyesMarinos_Manager();
    $spmm->run();
}

// Call the above function to begin execution of the plugin.
run_reyesmarinos_manager();
