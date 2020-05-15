<?php

$path_to_header = $_SERVER['DOCUMENT_ROOT'];
$path_to_header .= "/cms-php/includes/components/header.php";

// <!-- Header component -->
include_once($path_to_header);


  if (isset($_POST['submit'])) {

    if ($_POST['user_password'] === $_POST['password_validation']) {

      if (!empty($_POST['username']) && !empty($_POST['user_password']) && !empty($_POST['user_email'])) {
           userRegistration();
      } else {
          echo "<script>alert('Fields cannot be empty!')</script>";
      }

    } else {

      echo "<script>alert('Your passwords dont match!')</script>";
    }

  }

// <!-- Navigation component-->
include_once($path_to_navigation);
?>

    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">user_fristname</label>
                            <input type="text" name="user_fristname" id="user_fristname" class="form-control" placeholder="Enter your Frist Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">user_lastname</label>
                            <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="Enter your Last Name">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Desired Password">
                        </div>
                        <div class="form-group">
                           <label for="password" class="sr-only">confirm password</label>
                           <input type="password" name="password_validation" id="password_validation" class="form-control" placeholder="Confirm Password">
                       </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Register">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include_once($path_to_footer);?>
