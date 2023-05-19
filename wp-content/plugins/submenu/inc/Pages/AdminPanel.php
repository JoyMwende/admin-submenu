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
            'page_title'=> 'Employee Menu',
            'menu_title'=> 'Employee Menu',
            'capability' => 'manage_options',
            'menu_slug'=> 'employees_menu',
            'callback'=> function(){
                echo '<h1> Employees Menu </h1>';
            },
            'icon_url'=> 'dashicons-buddicons-buddypress-logo',
            'position'=> 200
        ]
    ];

    $this->subpages =[
        [
            'parent_slug'=> 'employees_menu',
            'page_title' => 'Register Employee',
            'menu_title' => 'Register Employee',
            'capability' => 'manage_options',
            'menu_slug' => 'register_employees',
            'callback' => function() {
                echo '<h1> Register Employees </h1>';
            }
        ],
        [
            'parent_slug'=> 'employees_menu',
            'page_title' => 'Update Employee',
            'menu_title' => 'Update Employee',
            'capability' => 'manage_options',
            'menu_slug' => 'update_employees',
            'callback' => function() {
                echo '<h1> Update Employee </h1>';
            }
        ],
        [
            'parent_slug'=> 'employees_menu',
            'page_title' => 'View Employees',
            'menu_title' => 'View Employees',
            'capability' => 'manage_options',
            'menu_slug' => 'view_employees',
            'callback' => function() {
                echo '<h1> View Employees </h1>';
            }
        ]
    ];
    }

    function register(){
        $this->settings->AddPages( $this->pages )->HasSubPage('View Employees')->addSubPages($this->subpages)->register();
    }



}
