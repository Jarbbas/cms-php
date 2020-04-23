<?php

////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////POSTS FUNCTIONS
////////////////////////////////////////////////////////////////////////////////////////////////

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

//CRUD FUNCTIONS FOR POST
function insertPost(){

    global $connection;
    global $result;
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];

    // $post_date = date('d-m-y');
    $post_comment_count = 1;

    move_uploaded_file($post_image_tmp, "../includes/images/$post_image");

    // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
    // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
    $post_title = mysqli_real_escape_string($connection, $post_title);
    $post_tags = mysqli_real_escape_string($connection, $post_tags);
    $post_author = mysqli_real_escape_string($connection, $post_author);
    $post_status = mysqli_real_escape_string($connection, $post_status);
    $post_content = mysqli_real_escape_string($connection, $post_content);

    $query = "INSERT INTO `post` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) ";
    $query .= "VALUES('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
    } else {
        echo SUCESS . "a new Post is added";
    }
}

function deletePost() {

    global $connection;
    global $result;
    $cat_id =$_GET['delete'];

    $query = "DELETE FROM `posts` WHERE `cat_id` = '{$cat_id}' ";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
    } else {
        header("Location: categories.php");
    }

}

////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////CATEGORIES FUNCTIONS
////////////////////////////////////////////////////////////////////////////////////////////////

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


    // CRUD FUNCTIONS FOR CATEGORIES

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