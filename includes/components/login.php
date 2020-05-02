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

  echo "FOUND";
}

 ?>
