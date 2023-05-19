<?php
/**
 * @package Submenu Plugin
 */

namespace Inc\Api\CallBacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController{

    public function viewStudents(){
        return require_once $this->plugin_path.'templates/view-students.php'; 
    }

    public function registerStudents(){
        return require_once $this->plugin_path.'templates/register-students.php';
    }

    public function updateStudents(){
        return require_once $this->plugin_path.'templates/update-students.php';
    }

    

}