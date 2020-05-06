<?php

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

      $db_username_id = $row['user_header("Location: {$path_to_admin}")id'];
      $db_username = $row['username'];
      $db_user_password = $row['user_password'];
      $db_user_fristname = $row['user_fristname'];
      $db_user_lastname = $row['user_lastname'];
      $db_user_email = $row['user_email'];
      $db_user_role = $row['user_role'];
      $db_urandSalt = $row['randSalt'];
}

  echo $db_username; echo"<br>";
  echo $db_user_password; echo"<br>";
  echo $username; echo"<br>";
  echo $password; echo"<br>";

  if ($username === $db_username && $password === $db_user_password) {
    header("Location: ../../admin/");
  } else {
    header("Location: ../../index.php");
  }

}
