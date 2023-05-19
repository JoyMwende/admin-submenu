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
        $this->update_employee();
    }

    function create_table_to_db(){
        global $wpdb;

        $table = $wpdb->prefix.'employees';

        $employee_data = "CREATE TABLE IF NOT EXISTS ".$table."(
            name text NOT NULL,
            email text NOT NULL,
            phone_no text NOT NULL,
            is_deleted int DEFAULT 0
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

    function update_employee()
    {
        if (isset($_POST['updatebtn'])) {
            global $wpdb;
            global $successmessage;
            global $errormessage;

            $successmessage = false;
            $errormessage = false;


            $new_employee_data = [
                'name' => $_POST['nameUpdated'],
                'email' => $_POST['emailUpdated'],
                'phone_no' => $_POST['phone_noUpdated'],
            ];

            $table = $wpdb->prefix . 'employees';

            $employee_email = $_GET['employee_email'];
            $condition = ['email' => $employee_email];

            $result = $wpdb->update($table, $new_employee_data, $condition);

            if ($result) {
                $successmessage = true;
            } else {
                $errormessage == true;
            }
        }
    }
}