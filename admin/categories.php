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

<?php  include_once($path_to_navigation_admin); ?>

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

                        <?php 
                            if(isset($_POST['submit'])){
                                   
                                $cat_title = $_POST['cat_title'];

                                if($cat_title == "" || empty($cat_title)) { 
                                         echo "<h4 class='page-header'>" . NOTEMPTY . "</h4>";
                                    } else {   
                                          insertCategories();
                                    }
                            } 
                            
                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                            <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
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
                                        <th>Category Title</th>
                                        <th colspan="2">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php 
                                            queryCountCategories(); //outputs $count so we can list all the categories from MYSQL
                                            queryAllCategories($count); 

                                            if (!$result) {
                                                die('query failed ' . mysqli_error($connection));
                                                    } else {      
                                                    while ($row = mysqli_fetch_assoc($result)) {                            
                                                    $cat_title = $row['cat_title']; 
                                                    $cat_id = $row['cat_id'];             
                                                    echo "<tr>
                                                        <td>{$cat_title}</td>
                                                        <td><a href='categories.php?update={$cat_id}'>Update</a></td>
                                                        <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                                                        </tr>";
                                                    } 
                                                }
                                                
                                                //delete query
                                                if(isset($_GET['delete'])) {
                                                    deleteCategories();
                                                }
                                                if(isset($_GET['update'])) {
                                                    updateCategories($cat_id);
                                                }      
                                        ?>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
<?php include_once($path_to_footer_admin); ?>
