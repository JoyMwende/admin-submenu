<?php
/**
 * @package Submenu Plugin
 */

namespace Inc\Api\CallBacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController{

    public function viewEmployees(){
        return require_once $this->plugin_path.'templates/view-employees.php'; 
    }

    public function registeremployees(){
        return require_once $this->plugin_path.'templates/register-employees.php';
    }

    public function updateEmployees(){
        return require_once $this->plugin_path.'templates/update-employees.php';
    }

    

}