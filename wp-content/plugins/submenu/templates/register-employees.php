<div class="w-75 m-auto mt-5">
<?php
    global $successmessage;
    $successmessage;

    global $errormessage;
    ?>
    <div>
        <!-- success message -->
        <?php
        echo '<div class="alert alert-success" role="alert" id="successmsg">
               Employee registered Successfully
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
            An error occured while registering employee. Please try again
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
    <h3>Register Employee</h3>
    <form>
  <div class="form-group mb-3">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter your full name here">
  </div>
  <div class="form-group mb-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Enter your email here">
  </div>
  <div class="form-group mb-4">
    <label for="phone_no">Phone Number</label>
    <input type="text" class="form-control" id="phone_no" placeholder="Enter your phone number here">
  </div>
  <div>
    <form action="" method="post">
        <button class="btn btn-primary" name="registerbtn" type="submit">Register</button>
    </form>
  </div>
</form>
    </div>
</div>