<?php

////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////POSTS FUNCTIONS
////////////////////////////////////////////////////////////////////////////////////////////////

function search() {

    global $connection;
    global $result;
    $search = $_POST['search'];
    $query = "SELECT * FROM `posts` WHERE `post_tags` LIKE '%$search%' ";
    $result = mysqli_query($connection, $query);  
    
    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
        }                         
} 

  function queyAllPosts() {

    global $connection;
    global $result;
    $query = "SELECT * FROM `posts` ";
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

        $query = "SELECT * FROM `posts` WHERE `post_tags` LIKE '%$search%' ";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        if (!$result) {
            die('Query' . FAIL . mysqli_error($connection));
            }
    
    }

    function searchPostById() {

        global $connection;
        global $result;
        $post_id = $_GET['post_id'];

        $query = "SELECT * FROM `posts` WHERE `post_id` = $post_id ";
        $result = mysqli_query($connection, $query);
       

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
    $post_comment_count = 1;

    move_uploaded_file($post_image_tmp, "../includes/images/$post_image");

    // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
    // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
    $post_title = mysqli_real_escape_string($connection, $post_title);
    $post_tags = mysqli_real_escape_string($connection, $post_tags);
    $post_author = mysqli_real_escape_string($connection, $post_author);
    $post_status = mysqli_real_escape_string($connection, $post_status);
    $post_content = mysqli_real_escape_string($connection, $post_content);

    $query = "INSERT INTO `posts` ";
    $query .= "(`post_category_id`, ";
    $query .= "`post_title`, ";
    $query .= "`post_author`, ";
    $query .= "`post_date`, ";
    $query .= "`post_image`, ";
    $query .= "`post_content`, ";
    $query .= "`post_tags`, ";
    $query .= "`post_comment_count`, ";
    $query .= "`post_status`) ";
    $query .= "VALUES('{$post_category_id}', ";
    $query .= "'{$post_title}', ";
    $query .= "'{$post_author}', ";
    $query .= "now(), ";
    $query .= "'{$post_image}', ";
    $query .= "'{$post_content}', ";
    $query .= "'{$post_tags}', ";
    $query .= "'{$post_comment_count}', ";
    $query .= "'{$post_status}')";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
    } else {
        echo SUCESS . "a new Post is added";
    }
}

function updatePost(){

    global $connection;
    global $result;

    $post_id = $_GET['post_id'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];
    $post_comment_count = 1;

    move_uploaded_file($post_image_tmp, "../includes/images/$post_image");

        if(empty($post_image)) { 
        $query = "SELECT * FROM `posts` WHERE `post_id` = '{$post_id}' ";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) { 
                $post_image = $row['post_image'];
        }
    }
    // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
    // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
    $post_title = mysqli_real_escape_string($connection, $post_title);
    $post_tags = mysqli_real_escape_string($connection, $post_tags);
    $post_author = mysqli_real_escape_string($connection, $post_author);
    $post_status = mysqli_real_escape_string($connection, $post_status);
    $post_content = mysqli_real_escape_string($connection, $post_content);

    $query = "UPDATE `posts` SET ";
    $query .= "`post_category_id` = '{$post_category_id}', ";
    $query .= "`post_title` = '{$post_title}', ";
    $query .= "`post_author` = '{$post_author}', ";
    $query .= "`post_image` = '{$post_image}', ";
    $query .= "`post_date` = now(), ";
    $query .= "`post_content` = '{$post_content}', ";
    $query .= "`post_tags` = '{$post_tags}', ";
    $query .= "`post_comment_count` = '{$post_comment_count}',  ";
    $query .= "`post_status` = 'Updated' ";
    $query .= "WHERE `post_id` = '{$post_id}' ";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
    } else {
        echo SUCESS . "the Post is updated";
    }
}

function deletePost() {

    global $connection;
    global $result;
    $post_id =$_GET['deletePost'];

    $query = "DELETE FROM `posts` WHERE `post_id` = '{$post_id}' ";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
    } else {
        header("Location: posts.php");
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

    function selectCategories($post_category_id){

        global $connection;
        global $resultselectCategories;

        if(empty($post_category_id)) {
            $cat_id =$_GET['update'];
        } else {
            $cat_id = $post_category_id;
        }
        
        $query = "SELECT * FROM `categories` WHERE `cat_id` = '{$cat_id}' ";
        $resultselectCategories = mysqli_query($connection, $query);

        if (!$resultselectCategories) {
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