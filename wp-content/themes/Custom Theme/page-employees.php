<?php get_header();

/**
 * Template Name: Employee Page
 */

?>

<?php

//check if user is logged in
if (!is_user_logged_in()) {
    wp_redirect(site_url('/login'));
}

//get data
global $wpdb;

$table = $wpdb->prefix . 'employees';

$employees = $wpdb->get_results("SELECT * FROM wp_employees WHERE is_deleted=0");

//code for status
if (isset($_POST['btn'])) {
    echo '<div class="alert alert-success" role="alert">
        Task done successfully!
        </div>';
}

?>
<?php
if (!empty($employees)) {
?>
    <div class="bg-white m-0 p-0 w-100">
        <div class="w-75 shadow-sm p-4 m-auto mt-5 bg-light">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <?php foreach ($employees as $rowData) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $rowData->name ?></td>
                            <td><?php echo $rowData->email ?></td>
                            <td><?php echo $rowData->phone_no; ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
<?php } else {
    echo '<p>No data found.</p>';
} ?>
<?php get_footer(); ?>