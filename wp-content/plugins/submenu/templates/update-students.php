<?php

global $wpdb;
global $successmessage;
$successmessage;

global $errormessage;


$table = $wpdb->prefix . 'students';

$student_email = $_GET['student_email'];
var_dump($student_email);

// Retrieve the form data from the database
$student = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE email = '$student_email'"));

?>

<div class="w-75 m-auto mt-5">
    <div>
        <!-- success message -->
        <?php
        echo '<div class="alert alert-success" role="alert" id="successmsg">
               Student updated Successfully
             </div>';

        echo '<script> document.getElementById("successmsg").style.display = "none"; </script>';

        if ($successmessage == true) {
            echo '<script> document.getElementById("successmsg").style.display = "flex"; </script>';

            echo    '<script> 
                        setTimeout(function(){
                            document.getElementById("successmsg").style.display ="none";
                        }, 3000);
                    </script>';
        }

        ?>

<!-- error message -->
        <?php
        echo '<div class="alert alert-danger" role="alert" id="errormsg">
            An error occured while updating student. Please try again
             </div>';

        echo '<script> document.getElementById("errormsg").style.display = "none"; </script>';

        if($errormessage == true){
            echo '<script> document.getElementById("errormsg").style.display = "flex"; </script>';

            echo    '<script> 
                        setTimeout(function(){
                            document.getElementById("errormsg").style.display ="none";
                        }, 3000);
                    </script>';
        }
    ?>
    <h3>Update Ticket</h3>
    <form>
  <div class="form-group mb-3">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="nameUpdated" value="<?php echo $student->name ?>" placeholder="Enter your full name here">
  </div>
  <div class="form-group mb-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="emailUpdated" value="<?php echo $student->email ?>" placeholder="Enter your email here">
  </div>
  <div class="form-group mb-4">
    <label for="phone_no">Phone Number</label>
    <input type="text" class="form-control" id="phone_noUpdated" value="<?php echo $student->phone_no ?>" placeholder="Enter your phone number here">
  </div>
  <div>
    <form action="" method="post">
        <button class="btn btn-primary" name="updatebtn" type="submit">Update</button>
    </form>
  </div>
</form>
    </div>
</div>