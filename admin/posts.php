    <?php
     //header component
    $path_to_header_admin = $_SERVER['DOCUMENT_ROOT'];
    $path_to_header_admin .= "/cms-php/admin/includes/components/header.php";
    include_once($path_to_header_admin);
    ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php  include_once($path_to_navigation_admin); ?>

    <div id="page-wrapper">
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">

    <div class="col-lg-12">

    <h1 class="page-header">
    Posts
    <small><?php echo $_SESSION['user_role']?> page</small>
    </h1>



<?php

if (isset($_GET['source'])) {

    $source = $_GET['source'];
} else {
    $source = "";
}

    switch ($source) {

        case 'add':
            include "includes/components/add_post.php";
            break;

        case 'edit':
            include "includes/components/edit_post.php";
            break;

        case 'view':
            include "includes/components/view_all_posts.php";
            break;

        case 'comment':
            include "includes/components/post_comment.php";
            break;

        default:
          include "includes/components/view_all_posts.php";
            break;
    }

?>

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include_once($path_to_footer_admin); ?>
