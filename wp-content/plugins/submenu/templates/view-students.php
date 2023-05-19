<?php
global $wpdb;

$table = $wpdb->prefix . 'students';

//to delete a student of a given id
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];


    $result = $wpdb->query("UPDATE $table SET is_deleted=1 WHERE id=$id");

    if (!$result) {
        $error = "Error deleting student";
    }
}

$students = $wpdb->get_results("SELECT * FROM wp_students WHERE is_deleted=0");
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
        foreach ($students as $student) {
        ?>

            <tr>
                <td><?php echo $student->name ?></td>
                <td><?php echo $student->email ?></td>
                <td><?php echo $student->phone_ni ?></td>
                <td>
                    <form action="" method="post">
                        <a class="btn btn-success" role="button" href="<?php echo esc_url(admin_url('admin.php?page=students_menu&student_email=' . $student->email)); ?>">Edit</a>
                    </form>
                </td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $student->id; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>

