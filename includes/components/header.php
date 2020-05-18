<!DOCTYPE html>
<html lang="en">
<?php
    ob_start();
    //sesstion method start
    session_start();
    //root paths to components and DB
    $path_to_functions = $_SERVER['DOCUMENT_ROOT'];
    $path_to_functions .= "/cms-php/includes/functions.php";
    $path_to_db = $_SERVER['DOCUMENT_ROOT'];
    $path_to_db .= "/cms-php/includes/db.php";
    $path_to_messages = $_SERVER['DOCUMENT_ROOT'];
    $path_to_messages .= "/cms-php/includes/messages.php";
    $path_to_header = $_SERVER['DOCUMENT_ROOT'];
    $path_to_header .= "/cms-php/includes/components/header.php";
    $path_to_navigation = $_SERVER['DOCUMENT_ROOT'];
    $path_to_navigation .= "/cms-php/includes/components/navigation.php";
    $path_to_sidebar = $_SERVER['DOCUMENT_ROOT'];
    $path_to_sidebar .= "/cms-php/includes/components/sidebar.php";
    $path_to_footer = $_SERVER['DOCUMENT_ROOT'];
    $path_to_footer .= "/cms-php/includes/components/footer.php";

    include_once($path_to_db);
    include_once($path_to_functions);
    include_once($path_to_messages);

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CMS aplication">
    <meta name="author" content="Emanuel">

    <title>CMS PHP Project</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/cms-php/includes/scripts.js"></script>
</head>

<body>
