<?php
//root pathsand DB
$path_to_db = $_SERVER['DOCUMENT_ROOT'];
$path_to_db .= "/projeto-cms-php/includes/db.php";
$path_to_functions = $_SERVER['DOCUMENT_ROOT'];
$path_to_functions .= "/projeto-cms-php/includes/functions.php";
$path_to_messages = $_SERVER['DOCUMENT_ROOT'];
$path_to_messages .= "/projeto-cms-php/includes/messages.php";


$path_to_header_admin = $_SERVER['DOCUMENT_ROOT'];
$path_to_header_admin .= "/projeto-cms-php/admin/includes/components/header.php";
$path_to_navigation_admin = $_SERVER['DOCUMENT_ROOT'];
$path_to_navigation_admin .= "/projeto-cms-php/admin/includes/components/navigation.php";
$path_to_footer_admin = $_SERVER['DOCUMENT_ROOT'];
$path_to_footer_admin .= "/projeto-cms-php/admin/includes/components/footer.php";

include_once($path_to_db);
include_once($path_to_functions);
include_once($path_to_messages);

//header component
include_once($path_to_header_admin);



?>
    <div id="wrapper">

        <!-- Navigation -->

<?php 
    include_once($path_to_navigation_admin); 
?>

        <div id="page-wrapper"> 

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                        <form action="">
                            <div class="form-group">
                            <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat-title">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add Categorie">
                            </div>


                        </form>                     
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <tr>
                                            <td>A</td>
                                            <td>B</td>
                                        </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
<?php 
    include_once($path_to_footer_admin); 
?>
