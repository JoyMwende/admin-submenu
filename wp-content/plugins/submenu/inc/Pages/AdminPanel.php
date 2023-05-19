<?php

/**
 * @package Submenu Plugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class AdminPanel extends BaseController{

    public $settings;

    public $pages;
    public $subpages;

    public function __construct(){
        $this->settings = new SettingsApi();
        
    $this->pages= [
        [
            'page_title'=> 'Student Menu',
            'menu_title'=> 'Student Menu',
            'capability' => 'manage_options',
            'menu_slug'=> 'students_menu',
            'callback'=> function(){
                echo '<h1> Students Menu </h1>';
            },
            'icon_url'=> 'dashicons-buddicons-buddypress-logo',
            'position'=> 200
        ]
    ];

    $this->subpages =[
        [
            'parent_slug'=> 'students_menu',
            'page_title' => 'Register student',
            'menu_title' => 'Register Student',
            'capability' => 'manage_options',
            'menu_slug' => 'register_students',
            'callback' => function() {
                echo '<h1> Register Students </h1>';
            }
        ],
        [
            'parent_slug'=> 'students_menu',
            'page_title' => 'Update Student',
            'menu_title' => 'Update Student',
            'capability' => 'manage_options',
            'menu_slug' => 'update_students',
            'callback' => function() {
                echo '<h1> Update Student </h1>';
            }
        ],
        [
            'parent_slug'=> 'students_menu',
            'page_title' => 'View Students',
            'menu_title' => 'View Students',
            'capability' => 'manage_options',
            'menu_slug' => 'view_students',
            'callback' => function() {
                echo '<h1> View Students </h1>';
            }
        ]
    ];
    }

    function register(){
        $this->settings->AddPages( $this->pages )->HasSubPage('View Students')->addSubPages($this->subpages)->register();
    }



}
