<?php

/**
 * @package Submenu Plugin
 */

/*
    Plugin Name: Submenu Plugin
    Plugin URI: http://...........
    Description: This is a plugin to implement submenu in wordpress
    Version: 1.0.0
    Author: Joy
    AUthor URI: http://...........
    Licence: GPLv2 or Later
    Text Domain: Submenu-plugin
*/


//aunthentication
defined('ABSPATH') or die('Hey you hacker! Got Ya!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (class_exists('Inc\\init')) {
    Inc\init::register_services();
}
