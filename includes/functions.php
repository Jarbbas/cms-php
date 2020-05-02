<?php
////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////USERS FUNCTIONS
////////////////////////////////////////////////////////////////////////////////////////////////

function queyAllUsers() {

  global $connection;
  global $result;
  $query = "SELECT * FROM `users` ";
  $result = mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);

  if (!$result) {
      die('Query' . FAIL . mysqli_error($connection));
      }

  }

  function searchUserById() {

      global $connection;
      global $result;

      $user_id = $_GET['user_id'];

      $query = "SELECT * FROM `users` WHERE `user_id` = {$user_id} ";
      $result = mysqli_query($connection, $query);

      if (!$result) {
          die('Query' . FAIL . mysqli_error($connection));
          }

  }
  //CRUD FUNCTIONS FOR POST
  function insertUser(){

      global $connection;
      global $result;

      $user_id= $_POST['user_id'];
      $username = $_POST['username'];
      $user_password= $_POST['user_password'];
      $user_fristname = $_POST['user_fristname'];
      $user_lastname = $_POST['user_lastname'];
      $user_email = $_POST['user_email'];
      $user_image = $_POST['user_image'];
      $user_role = $_POST['user_role'];
      $user_image = $_FILES['user_image']['name'];
      $user_image_tmp = $_FILES['user_image']['tmp_name'];

      move_uploaded_file($user_image_tmp, "../includes/images/$user_image");

      // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
      // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
      $username = mysqli_real_escape_string($connection, $username);
      $user_password = mysqli_real_escape_string($connection, $user_password);
      $user_fristname = mysqli_real_escape_string($connection, $user_fristname);
      $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
      $user_email = mysqli_real_escape_string($connection, $user_email);

      $query = "INSERT INTO `users` ";
      $query .= "(`username`, ";
      $query .= "`user_password`, ";
      $query .= "`user_fristname`, ";
      $query .= "`user_lastname`, ";
      $query .= "`user_email`, ";
      $query .= "`user_image`, ";
      $query .= "`user_role`) ";
      $query .= "VALUES('{$username}', ";
      $query .= "'{$user_password}', ";
      $query .= "'{$user_fristname}', ";
      $query .= "'{$user_lastname}', ";
      $query .= "'{$user_email}', ";
      $query .= "'{$user_image}', ";
      $query .= "'{$user_role}') ";
      $result = mysqli_query($connection, $query);

      if (!$result) {
          die('Query' . FAIL . mysqli_error($connection));
      } else {
          echo SUCESS . "a new user was added";
      }
  }

  function updateUser(){

      global $connection;
      global $result;

      $user_id= $_GET['user_id'];
      $username = $_POST['username'];
      $user_password= $_POST['user_password'];
      $user_fristname = $_POST['user_fristname'];
      $user_lastname = $_POST['user_lastname'];
      $user_email = $_POST['user_email'];
      $user_image = $_POST['user_image'];
      $user_role = $_POST['user_role'];
      $user_image = $_FILES['user_image']['name'];
      $user_image_tmp = $_FILES['user_image']['tmp_name'];

      move_uploaded_file($user_image_tmp, "../includes/images/$user_image");

          if(empty($user_image)) {
          $query = "SELECT * FROM `users` WHERE `user_id` = '{$user_id}' ";
          $result = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($result)) {
                  $user_image = $row['user_image'];
          }
      }
      // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
      // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
      $username = mysqli_real_escape_string($connection, $username);
      $user_password = mysqli_real_escape_string($connection, $user_password);
      $user_fristname = mysqli_real_escape_string($connection, $user_fristname);
      $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
      $user_email = mysqli_real_escape_string($connection, $user_email);

      $query = "UPDATE `users` SET ";
      $query .= "`username` = '{$username}', ";
      $query .= "`user_password` = '{$user_password}', ";
      $query .= "`user_fristname` = '{$user_fristname}', ";
      $query .= "`user_lastname` = '{$user_lastname}', ";
      $query .= "`user_email` = '{$user_email}', ";
      $query .= "`user_image` = '{$user_image}', ";
      $query .= "`user_role` = '{$user_role}' ";
      $query .= "WHERE `user_id` = '{$user_id}' ";
      $result = mysqli_query($connection, $query);

      if (!$result) {
          die('Query' . FAIL . mysqli_error($connection));
      } else {
          echo SUCESS . "the User was updated";
      }
  }

  function deleteUser() {

      global $connection;
      global $result;

      $user_id =$_GET['delete'];

      $query = "DELETE FROM `users` WHERE `user_id` = '{$user_id}' ";
      $result = mysqli_query($connection, $query);

      if (!$result) {
          die('Query' . FAIL . mysqli_error($connection));
      } else {
          header("Location: users.php");
      }

  }
////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////POSTS FUNCTIONS
////////////////////////////////////////////////////////////////////////////////////////////////

function search() {

    global $connection;
    global $result;
    $search = $_POST['search'];
    $query = "SELECT * FROM `posts` WHERE `post_tags` LIKE '%$search%' AND `post_status` = 'published' ";
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
    $count = mysqli_num_rows($result);

    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
        }

    }

    function querySearchPosts() {

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

    function queryPostsByCategory() {

        global $connection;
        global $result;

        $cat_id = $_GET['cat_id'];

        $query = "SELECT * FROM `posts` WHERE `post_category_id` = '{$cat_id}' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Query' . FAIL . mysqli_error($connection));
            }

    }

    function searchPostById() {

        global $connection;
        global $result;

        $post_id = $_GET['post_id'];

        $query = "SELECT * FROM `posts` WHERE `post_id` = {$post_id} ";
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
    $query .= "`post_status`) ";
    $query .= "VALUES('{$post_category_id}', ";
    $query .= "'{$post_title}', ";
    $query .= "'{$post_author}', ";
    $query .= "now(), ";
    $query .= "'{$post_image}', ";
    $query .= "'{$post_content}', ";
    $query .= "'{$post_tags}', ";
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
    $query .= "`post_status` = '{$post_status}' ";
    $query .= "WHERE `post_id` = '{$post_id}' ";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
    } else {
        echo SUCESS . "the Post is updated";
    }
}

function deletePost() {

    global $connection;function deletePost() {

    global $connection;
    global $result;

    $post_id =$_GET['delete'];

    $query = "DELETE FROM `posts` WHERE `post_id` = '{$post_id}' ";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query' . FAIL . mysqli_error($connection));
    } else {
        header("Location: posts.php");
    }

}
    global $result;

    $post_id =$_GET['delete'];

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

    function selectCategories(){

        global $connection;
        global $resultselectCategories;

        $cat_id =$_GET['update'];

        $query = "SELECT * FROM `categories` WHERE `cat_id` = '{$cat_id}' ";
        $resultselectCategories = mysqli_query($connection, $query);

        // while ($row = mysqli_fetch_assoc($resultselectCategories)) {
        //     $category_name = $row['cat_title'];
        // }
        if (!$resultselectCategories) {
            die('Query' . FAIL . mysqli_error($connection));
            }
    }

    function selectCatName($post_category_id){

        global $connection;
        global $resultCatName;

        $cat_id = $post_category_id;

        $query = "SELECT * FROM `categories` WHERE `cat_id` = '{$cat_id}' ";
        $resultCatId = mysqli_query($connection, $query);

      if (!$resultCatId) {
            die('Query' . FAIL . mysqli_error($connection));
          }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////CRUD FUNCTIONS FOR CATEGORIES /////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

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
        $cat_id = $_GET['delete'];

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

////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////COMMENTS FUNCTIONS ///////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

function queyAllComments() {

  global $connection;
  global $result;

  $query = "SELECT * FROM `comments` ";
  $result = mysqli_query($connection, $query);

  if (!$result) {
      die('Query' . FAIL . mysqli_error($connection));
      }

  }

  function queryAprovedComments() {

    global $connection;
    global $resultAprovedComments;

    $comment_post_id  = $_GET['post_id'];

    $query = "SELECT * FROM `comments` WHERE `comment_post_id` = {$comment_post_id} AND `comment_status` = 'approved' ORDER BY `comment_date` DESC ";
    $resultAprovedComments = mysqli_query($connection, $query);

    if (!$resultAprovedComments) {
        die('Query' . FAIL . mysqli_error($connection));
      }

  }

  //////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////CRUD FUNCTIONS FOR COMMENTS //////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////

  function createComment(){

      global $connection;
      global $result;

      $comment_post_id  = $_GET['post_id'];
      $comment_author = $_POST['comment_author'];
      $comment_email = $_POST['comment_email'];
      $comment_content = $_POST['comment_content'];
      $comment_status = "unapproved";

      // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
      // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
      $comment_author = mysqli_real_escape_string($connection, $comment_author);
      $comment_email = mysqli_real_escape_string($connection, $comment_email);
      $comment_content = mysqli_real_escape_string($connection, $comment_content);
      $comment_status = mysqli_real_escape_string($connection, $comment_status);

      $query = "INSERT INTO `comments` ";
      $query .= "(`comment_post_id`, ";
      $query .= "`comment_author`, ";
      $query .= "`comment_email`, ";
      $query .= "`comment_content`, ";
      $query .= "`comment_status`)";
      $query .= "VALUES('{$comment_post_id}', ";
      $query .= "'{$comment_author}', ";
      $query .= "'{$comment_email}', ";
      $query .= "'{$comment_content}', ";
      $query .= "'{$comment_status}')";
      $resultCreatComment = mysqli_query($connection, $query);

      if (!$resultCreatComment) {
          die('Query' . FAIL . mysqli_error($connection));
      } else {
        $query2 = "UPDATE `posts` SET `post_comment_count` = `post_comment_count` + 1 WHERE `post_id` = {$comment_post_id} ";
        $resultUpdateCommentCount = mysqli_query($connection, $query2);
        echo SUCESS . "you Commented this post";
      }
  }

  function deleteComment(){

      global $connection;
      global $result;

      $comment_id = $_GET['delete'];

      $query = "DELETE FROM `comments` WHERE `comment_id` = '{$comment_id}' ";
      $result = mysqli_query($connection, $query);

      if (!$result) {
          die('Query' . FAIL . mysqli_error($connection));
      } else {
          header("Location: comments.php");
      }

  }

  function updateComment(){

      global $connection;
      global $result;

      $comment_id = $_GET['update'];
      $comment_status = $_GET['status'];

      $query = "UPDATE `comments` SET `comment_status` = '{$comment_status}' WHERE `comment_id` = {$comment_id} ";
      $result = mysqli_query($connection, $query);

      if (!$result) {
          die('Query' . FAIL . mysqli_error($connection));
      } else {
          header("Location: comments.php");
      }

  }
