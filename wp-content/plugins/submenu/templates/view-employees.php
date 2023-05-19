<?php
global $wpdb;

$table = $wpdb->prefix . 'employees';

//to delete a employee of a given id
// if (isset($_POST['delete_btn'])) {
//     $id = $_POST['delete_id'];


//     $result = $wpdb->query("UPDATE $table SET is_deleted=1 WHERE id=$id");

//     if (!$result) {
//         $error = "Error deleting employee";
//     }
// }

$employees = $wpdb->get_results("SELECT * FROM wp_employees");
?>

<h3>Active Tickets</h3>
<div>

    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>

        </tr>
        <?php
        foreach ($employees as $employee) {
        ?>

            <tr>
                <td><?php echo $employee->name ?></td>
                <td><?php echo $employee->email ?></td>
                <td><?php echo $employee->phone_no ?></td>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>

