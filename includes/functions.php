<?php

    function queryCountCategories() {

        global $connection;
        global $result;
        global $count;
        $query = "SELECT * FROM `categories`";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        if (!$result) {
            die('Query' . FAIL . mysqli_error($connection));
            }

        }

    function queryAllCategories($limit) {

    global $connection;
    global $result;
    $cat_limit = (isset($limit)) ? $cat_limit = $limit : $cat_limit = 5;
    $query = "SELECT * FROM `categories` ORDER BY `cat_id` ASC LIMIT $cat_limit ";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
        }

    }

    function queyAllPosts() {

    global $connection;
    global $result;
    $query = "SELECT * FROM `post`";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
        }
   
    }

    function queySearchPosts() {

        global $connection;
        global $result;
        global $count;

        $search = $_POST['search'];

        $query = "SELECT * FROM `post` WHERE `post_tags` LIKE '%$search%' ";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        if (!$result) {
            die('Query' . FAIL . mysqli_error($connection));
            }
    
    }

    function search() {

            global $connection;
            global $result;
            $search = $_POST['search'];
            $query = "SELECT * FROM `post` WHERE `post_tags` LIKE '%$search%' ";
            $result = mysqli_query($connection, $query);  
            
            if (!$result) {
                die('Query' . FAIL . mysqli_error($connection));
                }                         
    } 

    function insertCategories(){

        global $connection;
        global $result;
        $cat_title =$_POST['cat_title'];

        // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
        // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
        $cat_title = mysqli_real_escape_string($connection, $cat_title);

        $query = "INSERT INTO `categories` (`cat_title`) ";
        $query .= "VALUES('{$cat_title}')";
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
            die('Query' . FAIL . mysqli_error($connection));
        } else {
            echo SUCESS . "a new categorie added";
        }
}   

    function deleteCategories() {

        global $connection;
        global $result;
        $cat_id =$_GET['delete'];

        $query = "DELETE FROM `categories` WHERE `cat_id` = '{$cat_id}' ";
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
            die('Query' . FAIL . mysqli_error($connection));
        } else {
            header("Location: categories.php");
        }

    }

    function selectCategories(){

        global $connection;
        global $result;
        $cat_id =$_GET['update'];

        $query = "SELECT * FROM `categories` WHERE `cat_id` = '{$cat_id}' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Query' . FAIL . mysqli_error($connection));
            }      
    }

    function updateCategories(){

        global $connection;
        global $result;
        $cat_id =$_GET['update'];
        $cat_title =$_POST['cat_title'];

        // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
        // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
        $cat_title = mysqli_real_escape_string($connection, $cat_title);

        $query = "UPDATE `categories` SET `cat_title` = '{$cat_title}' ";
        $query .= "WHERE `cat_id` = '{$cat_id}'";
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
            die('Query' . FAIL . mysqli_error($connection));
        } else {
            header("Location: categories.php");
        }
}