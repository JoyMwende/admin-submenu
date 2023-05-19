<?php
/**
 * @package Submenu Plugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;

class RegisterEmployees{
    public function register(){
        $this->create_table_to_db();
        $this->add_employee_to_db();
    }

    function create_table_to_db(){
        global $wpdb;

        $table = $wpdb->prefix.'employees';

        $employee_data = "CREATE TABLE IF NOT EXISTS ".$table."(
            name text NOT NULL,
            email text NOT NULL,
            phone_no text NOT NULL
        );";

        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta($employee_data);
    }

    function add_employee_to_db(){
        if(isset($_POST['registerbtn'])){
            $info =[
                'name'=> $_POST['name'],
                'email'=> $_POST['email'],
                'phone_no'=> $_POST['phone_no']
            ];

            global $wpdb;

            global $successmessage;
            global $errormessage;

            $successmessage = false;
            $errormessage = false;

            $table = $wpdb->prefix.'employees';

            $result = $wpdb->insert($table, $info, $format=NULL);

            if($result == true){
                $successmessage = true;
            }else{
                $errormessage = true;
            }
        }
    }

}