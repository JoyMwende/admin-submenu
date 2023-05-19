<?php
global $wpdb;

$table = $wpdb->prefix . 'employees';

//to delete a employee of a given id
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];


    $result = $wpdb->query("UPDATE $table SET is_deleted=1 WHERE id=$id");

    if (!$result) {
        $error = "Error deleting employee";
    }
}

$employees = $wpdb->get_results("SELECT * FROM wp_employees WHERE is_deleted=0");
?>

<h3>Active Tickets</h3>
<div>

    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <?php
        foreach ($employees as $employee) {
        ?>

            <tr>
                <td><?php echo $employee->name ?></td>
                <td><?php echo $employee->email ?></td>
                <td><?php echo $employee->phone_ni ?></td>
                <td>
                    <form action="" method="post">
                        <a class="btn btn-success" role="button" href="<?php echo esc_url(admin_url('admin.php?page=employees_menu&employee_email=' . $employee->email)); ?>">Edit</a>
                    </form>
                </td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $employee->id; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>

