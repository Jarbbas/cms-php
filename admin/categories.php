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
    Categories Page
    <small>Author</small>
    </h1>

    <?php 
    
    if(isset($_POST['submitAdd'])){

    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)) { 
    echo "<h4 class='page-header'>" . NOTEMPTY . "</h4>";
    } else {   
    insertCategories();
    }
    } 

    //delete query
    if(isset($_GET['delete'])) {
    deleteCategories();
    }

    if(isset($_POST['submitUpdate'])){ 
        $cat_title =$_POST['cat_title'];
        updateCategories();
    }
    ?>

    <div class="col-xs-6">

        <form action="" method="post">
            <div class="form-group">
            <label for="cat_title">Add Category</label>
            <input type="text" class="form-control" name="cat_title">
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submitAdd" value="Add Categorie">
            </div>
        </form>  

    </div><!--Add Category Form-->
                    
    <div class="col-xs-6">
    <table class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>Category Title</th>
    <th colspan="2">Options</th>
    </tr>
    </thead>
    <tbody>

    <?php 
    queryCountCategories(); //outputs $count so we can list all the categories from MYSQL
    queryAllCategories($count); 

    while ($row = mysqli_fetch_assoc($result)) {                            
    $cat_title = $row['cat_title']; 
    $cat_id = $row['cat_id'];

    echo "<tr>
    <td>{$cat_title}</td>
    <td><a href='categories.php?update={$cat_id}'>Edit</a></td>
    <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
    </tr>";
    } 
                                               
    ?> 

    </tbody>
    </table>
    </div>

    <?php

    if(isset($_GET['update'])) {

    selectCategories(); 
    ?>

   <div class="col-xs-6">
    <form action="" method="post">
    <div class="form-group">
    <label for="cat_title">Update Category</label>

    <?php


    while ($row = mysqli_fetch_assoc($result)) {                            
    $cat_title = $row['cat_title'];              

    ?>  

    <input value="<?php if (isset($cat_title)) { echo $cat_title; } ?>" type="text" class="form-control" name="cat_title">
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submitUpdate" value="Update Categorie">
    </div>
    </form>
    <?php 

    } 
  }

    ?>
    <!-- /.col-lg-12 -->
     </div> 
    <!-- /.row -->
    </div> 
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include_once($path_to_footer_admin); ?>
