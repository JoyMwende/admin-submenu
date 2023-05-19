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

      

        $this->settings->AddPages( $this->pages )->HasSubPage('View Employee')->addSubPages($this->subpages)->register();
    }

    public function createAdminMenus(){
        $this->pages= [
            [
                'page_title'=> 'Employees Menu',
                'menu_title'=> 'Employees Menu',
                'capability' => 'manage_options',
                'menu_slug'=> 'employees_menu',
                'callback'=> [$this->callbacks, 'viewEmployees'],
                'icon_url'=> 'dashicons-buddicons-buddypress-logo',
                'position'=> 200
            ]
        ];
    }

    public function createSubMenus(){
        $this->subpages =[

            [
                'parent_slug'=> 'employees_menu',
                'page_title' => 'Register Employees',
                'menu_title' => 'Register Employees',
                'capability' => 'manage_options',
                'menu_slug' => 'register_employees',
                'callback' => [$this->callbacks, 'registerEmployees']
            ]
        ];
    }

  

}