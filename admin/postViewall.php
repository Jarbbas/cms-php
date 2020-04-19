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
    View all Post Page
    <small>Author</small>
    </h1>
        
         <table class="table table-bordered table-hover">    
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                </tr>
            </thead>  
            <tbody>

<?php 

if (isset($_GET['source'])) {
    
    $source = $_GET['source'];
} else {
    $source = "";
}

    switch ($source) {
        case '404':
            echo "PAGE NOT FOUND";
            break;
        
        default:
           include "includes/components/view_all_posts.php";
            break;
    }


?>
            
            </tbody>
        </table>
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include_once($path_to_footer_admin); ?>
