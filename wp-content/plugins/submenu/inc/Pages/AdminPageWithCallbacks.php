<?php

/**
 * @package Submenu Plugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

use \Inc\Api\CallBacks\AdminCallbacks;

class AdminPageWithCallbacks extends BaseController{

    public $settings;

    public $callbacks;

    public $pages;

    public $subpages;

    function register(){

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->createAdminMenus();

        $this->createSubMenus();

      

        $this->settings->AddPages( $this->pages )->HasSubPage('View Student')->addSubPages($this->subpages)->register();
    }

    public function createAdminMenus(){
        $this->pages= [
            [
                'page_title'=> 'Students Menu',
                'menu_title'=> 'Students Menu',
                'capability' => 'manage_options',
                'menu_slug'=> 'students_menu',
                'callback'=> [$this->callbacks, 'viewStudents'],
                'icon_url'=> 'dashicons-buddicons-buddypress-logo',
                'position'=> 200
            ]
        ];
    }

    public function createSubMenus(){
        $this->subpages =[

            [
                'parent_slug'=> 'students_menu',
                'page_title' => 'View Students',
                'menu_title' => 'View Students',
                'capability' => 'manage_options',
                'menu_slug' => 'view_students',
                'callback' => [$this->callbacks, 'viewStudents']
            ],
            [
                'parent_slug'=> 'students_menu',
                'page_title' => 'Register Student',
                'menu_title' => 'Register Student',
                'capability' => 'manage_options',
                'menu_slug' => 'register_students',
                'callback' => [$this->callbacks, 'registerStudents']
            ],
            [
                'parent_slug'=> 'students_menu',
                'page_title' => 'Update Students',
                'menu_title' => 'Update Students',
                'capability' => 'manage_options',
                'menu_slug' => 'update_students',
                'callback' => [$this->callbacks, 'updateStudents']
            ]
        ];
    }

  

}