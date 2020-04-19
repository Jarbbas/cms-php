<?php
//header component
$path_to_header_admin = $_SERVER['DOCUMENT_ROOT'];
$path_to_header_admin .= "/projeto-cms-php/admin/includes/components/header.php";
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
                            Admin Page
                            <small>conteudo administrativo</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
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
