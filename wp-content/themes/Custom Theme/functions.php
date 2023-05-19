<?php
function newcustomtheme_script_enqueue()
{
    //add bootstrap
    wp_register_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', [], '5.2.3', 'all');
    wp_enqueue_style('bootstrapcss');

    wp_register_script('jsbootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], '5.2.3', false);
    wp_enqueue_script('jsbootstrap');
}

add_action('wp_enqueue_scripts', 'newcustomtheme_script_enqueue');

//header and footer
function newcustomtheme_setup()
{
    //add menu
    add_theme_support('menus');
    register_nav_menu('primary', 'primary_header');
    register_nav_menu('secondary', 'footer_navigation');
}

// navwalker
if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('init', 'newcustomtheme_setup');

/**
 * THEME SUPPORT
 */

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');


//declare global variables

global $successmessage;
$successmessage;

global $errormessage;
$errormessage;