<?php

  session_start();
  $path_to_functions = $_SERVER['DOCUMENT_ROOT'];
  $path_to_functions .= "/cms-php/includes/functions.php";
  $path_to_db = $_SERVER['DOCUMENT_ROOT'];
  $path_to_db .= "/cms-php/includes/db.php";
  $path_to_messages = $_SERVER['DOCUMENT_ROOT'];
  $path_to_messages .= "/cms-php/includes/messages.php";


  include_once($path_to_db);
  include_once($path_to_functions);
  include_once($path_to_messages);

  if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    userValidationLogin();

    while($row = mysqli_fetch_assoc($resultLoginUser)) {

        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_fristname = $row['user_fristname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_email = $row['user_email'];
        $db_user_role = $row['user_role'];
        $db_urandSalt = $row['randSalt'];
  }

    $password = crypt($password, $db_user_password);

  if ($username === $db_username && $password === $db_user_password) {

    $_SESSION['username'] = $db_username;
    $_SESSION['first_name'] = $db_user_fristname;
    $_SESSION['last_name'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;
    $_SESSION['user_id'] = $db_user_id;

    
        if ($_SESSION['user_role'] == "administrator") {
          header("Location: admin/");
        } else {
          header("Location: index.php");
        }

  } else {
    header("Location: registration.php");
  }

}
