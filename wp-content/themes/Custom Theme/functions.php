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

//secure admin dashboard


//limit login attempts
function check_login_attempts($user, $username, $password){
    if(get_transient('tried_to_login')){
        $info = get_transient('tried_to_login');

        if($info['attempted'] >= 5){
            $times = get_option("_transient_timeout_". 'tried_to_login');
            $calculated_time = time_left($times);

            return new WP_Error('you have tried many times', sprintf(__('<strong>ALERT</strong>: You have reached the login limit attempts, please try logging in again after %1$s'), $calculated_time));
        }
    }

    return $user;
}

add_filter('authenticate', 'check_login_attempts', 30, 3);

function failed_login($username){
    if(get_transient('tried_to_login')){
        $info = get_transient('tried_to_login');

        $info['attempted']++;

        if($info['attempted'] <= 5)
            set_transient('tried_to_login', $info, 180);
    } else {
        $info = [
            'attempted' => 1
        ];
        set_transient('tried_to_login', $info, 180);
    }
}
add_action('wp_login_failed', 'failed_login', 10, 1);

function time_left($time){
    $times = [
        'second',
        'minute',
        'hour',
        'day',
        'week',
        'month',
        'year'
    ];

    $times_length = [
        '60',
        '60',
        '24',
        '7',
        '4.35',
        '12'
    ];

    $present_time = time();
    $diff = abs($present_time - $time);

    for($x = 0; $diff >= $times_length[$x] && $x < count($times) - 1; $x++){
        $diff /= $times_length[$x];
    }

    //countdown
    $diff = round($diff);

    if(isset($diff)){
        if($diff != 1){
            $times[$x] .= 's';
            $result = "$diff $times[$x]";
            return $result;
        }
    }
}