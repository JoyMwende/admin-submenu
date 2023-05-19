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

    public function registerEmployees(){
        return require_once $this->plugin_path.'templates/register-employees.php';
    }

    

}