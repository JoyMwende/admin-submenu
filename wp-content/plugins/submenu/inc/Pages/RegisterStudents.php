<?php
/**
 * @package Submenu Plugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;

class RegisterStudents{
    public function register(){
        $this->create_table_to_db();
        $this->add_student_to_db();
        $this->update_student();
    }

    function create_table_to_db(){
        global $wpdb;

        $table = $wpdb->prefix.'students';

        $student_data = "CREATE TABLE IF NOT EXISTS ".$table."(
            name text NOT NULL,
            email text NOT NULL,
            phone_no text NOT NULL,
            is_deleted int DEFAULT 0
        );";

        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta($student_data);
    }

    function add_student_to_db(){
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

            $table = $wpdb->prefix.'students';

            $result = $wpdb->insert($table, $info, $format=NULL);

            if($result == true){
                $successmessage = true;
            }else{
                $errormessage = true;
            }
        }
    }

    function update_student()
    {
        if (isset($_POST['updatebtn'])) {
            global $wpdb;
            global $successmessage;
            global $errormessage;

            $successmessage = false;
            $errormessage = false;


            $new_student_data = [
                'name' => $_POST['nameUpdated'],
                'email' => $_POST['emailUpdated'],
                'phone_no' => $_POST['phone_noUpdated'],
            ];

            $table = $wpdb->prefix . 'students';

            $student_email = $_GET['student_email'];
            $condition = ['email' => $student_email];

            $result = $wpdb->update($table, $new_student_data, $condition);

            if ($result) {
                $successmessage = true;
            } else {
                $errormessage == true;
            }
        }
    }
}