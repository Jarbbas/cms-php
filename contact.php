<?php

$path_to_header = $_SERVER['DOCUMENT_ROOT'];
$path_to_header .= "/cms-php/includes/components/header.php";

// <!-- Header component -->
include_once($path_to_header);


  if (isset($_POST['submit'])) {

      if (!empty($_POST['subject']) && !empty($_POST['email'])) {
           contactUs();
      } else {
          echo "<script>alert('Fields cannot be empty!')</script>";
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
                <h1>Contact Us</h1>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                       </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Submit">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include_once($path_to_footer);?>
