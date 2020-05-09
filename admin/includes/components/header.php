<?php
/* This function will turn output buffering on.
While output buffering is active no output is sent from the script (other than headers),
instead the output is stored in an internal buffer.
The contents of this internal buffer may be copied into a string variable using ob_get_contents().
To output what is stored in the internal buffer, use ob_end_flush(). Alternatively, ob_end_clean()
will silently discard the buffer contents.*/
  ob_start();
  //sesstion method start
  session_start();
  //root pathsand DB
  $path_to_db = $_SERVER['DOCUMENT_ROOT'];
  $path_to_db .= "/cms-php/includes/db.php";
  $path_to_functions = $_SERVER['DOCUMENT_ROOT'];
  $path_to_functions .= "/cms-php/includes/functions.php";
  $path_to_messages = $_SERVER['DOCUMENT_ROOT'];
  $path_to_messages .= "/cms-php/includes/messages.php";
  $path_to_navigation_admin = $_SERVER['DOCUMENT_ROOT'];
  $path_to_navigation_admin .= "/cms-php/admin/includes/components/navigation.php";
  $path_to_footer_admin = $_SERVER['DOCUMENT_ROOT'];
  $path_to_footer_admin .= "/cms-php/admin/includes/components/footer.php";

  include_once($path_to_db);
  include_once($path_to_functions);
  include_once($path_to_messages);

if (!isset($_SESSION['user_role'])) {

  header ("Location: /cms-php/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
