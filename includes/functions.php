<?php

function users_online() {

    if(isset($_GET['onlineusers'])) {
        global $connection;
      if (!$connection) {

        session_start();
        include ("db.php");
        $session = session_id();
        $time = time();
        $time_out_in_seconds = 60;
        $time_out = $time - $time_out_in_seconds;

        $query = "SELECT * FROM `users_online` WHERE `session` = '$session'";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);

            if ($count == null) {
              mysqli_query($connection, "INSERT INTO `users_online`(`session`, `time`) VALUES ('$session', '$time')");
            } else {
              mysqli_query($connection, "UPDATE `users_online` SET `time` = '$time' WHERE `session` = '$session'");
            }

        $users_online_query = mysqli_query($connection, "SELECT * FROM `users_online` WHERE `time` > '$time_out'");
        echo $countUsersOnline = mysqli_num_rows($users_online_query);

    }
  }//GET REQUEST
}
users_online();

function userRegistration() {

    global $connection;
    global $resultRegistration;

    $username = $_POST['username'];
    $user_fristname = $_POST['user_fristname'];
    $user_lastname = $_POST['user_lastname'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $user_role = "subscriber";

    // mysqli_real_escape_string function is a MUST! it will protect your DataBase, from mysql injection
    // Bascicly it will sanitize all you string inputs, so it can receive special characters like ()|\/'",. etc
    $username = mysqli_real_escape_string($connection, $username);
    $user_fristname = mysqli_real_escape_string($connection, $user_fristname);
    $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    $user_email = mysqli_real_escape_string($connection, $user_email);

    //New Method

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost '=> 12));

    //Old Method, functional, but not pratical!

    // $queryRandSalt = "SELECT `randSalt` FROM `users` ";
    // $resultRandSalt = mysqli_query($connection, $queryRandSalt);
    // $row = mysqli_fetch_array($resultRandSalt);
    // $randSaltpassword = $row['randSalt'];

    // $user_password = crypt($user_password, $randSaltpassword);

    $query = "INSERT INTO `users` ";
    $query .= "(`username`, ";
    $query .= "`user_fristname`, ";
    $query .= "`user_lastname`, ";
    $query .= "`user_password`, ";
    $query .= "`user_email`, ";
    $query .= "`user_role`) ";
    $query .= "VALUES('{$username}', ";
    $query .= "'{$user_fristname}', ";
    $query .= "'{$user_lastname}', ";
    $query .= "'{$user_password}', ";
    $query .= "'{$user_email}', ";
    $query .= "'{$user_role}') ";
    $resultRegistration = mysqli_query($connection, $query);

    if (!$resultRegistration) {
        die('Query' . FAIL . mysqli_error($connection));
    } else {
        echo "<script>alert('thank you\nfor your registration\nGo back and try log in')</script>";
    }
}


function userValidationLogin() {

  global $connection;
  global $resultLoginUser;

  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  // $user_password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM `users` WHERE `username` = '{$username}' ";
  $resultLoginUser = mysqli_query($connection, $query);

  if (!$resultLoginUser) {
      die('Query' . FAIL . mysqli_error($connection));
      }
}


////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////USERS FUNCTIONS
////////////////////////////////////////////////////////////////////////////////////////////////

function queyAllUsers() {

  global $connection;
  global $resultAllUsers;
  global $countAllUsers;

  $query = "SELECT * FROM `users` ";
  $resultAllUsers = mysqli_query($connection, $query);
  $countAllUsers = mysqli_num_rows($resultAllUsers);

  if (!$resultAllUsers) {
      die('Query' . FAIL . mysqli_error($connection));
      }

  }

  function querySubscribers() {

    global $connection;
    global $resultSubscribers;
    global $countSubscribers;

    $query = "SELECT * FROM `users` WHERE `user_role` = 'subscriber' ";
    $resultSubscribers = mysqli_query($connection, $query);
    $countSubscribers = mysqli_num_rows($resultSubscribers);

    if (!$resultSubscribers) {
        die('Query' . FAIL . mysqli_error($connection));
        }

    }

  function searchUserById() {

      global $connection;
      global $result;

      if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
      } else {
        $user_id = $_SESSION['user_id'];
      }

      $query = "SELECT * FROM `users` WHERE `user_id` = {$user_id} ";
      $result = mysqli_query($connection, $query);

      if (!$result) {
          die('Query' . FAIL . mysqli_error($connection));
          }

  }
  //CRUD FUNCTIONS FOR USERS
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

      $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost '=> 12));

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
          echo SUCESS . "a new user was added" . " " . "<a href='users.php'>View Users</a>";
      }
  }

  function updateUser(){

      global $connection;
      global $result;

      if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
      } else {
        $user_id = $_SESSION['user_id'];
      }

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

      $querycheckUser = "SELECT * FROM `users` ";
      $resultcheckUser = mysqli_query($connection, $querycheckUser);
      $row = mysqli_fetch_array($resultcheckUser);
      // $randSaltpassword = $row['randSalt'];
      $userPasswordValidation = $row['user_password'];

      if ($user_password === $userPasswordValidation) {

        $query = "UPDATE `users` SET ";
        $query .= "`username` = '{$username}', ";
        $query .= "`user_fristname` = '{$user_fristname}', ";
        $query .= "`user_lastname` = '{$user_lastname}', ";
        $query .= "`user_email` = '{$user_email}', ";
        $query .= "`user_image` = '{$user_image}', ";
        $query .= "`user_role` = '{$user_role}' ";
        $query .= "WHERE `user_id` = '{$user_id}' ";
        $result = mysqli_query($connection, $query);

      } else {

        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost '=> 12));
        // $user_password = crypt($user_password, $randSaltpassword);

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

      }

      if (!$result) {
          die('Query' . FAIL . mysqli_error($connection));
      } else {
          echo SUCESS . "the User was updated" . " " . "<a href='users.php'>View Users</a>";
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

function queryDraftPosts() {

    global $connection;
    global $resultDraftPosts;
    global $countDraftPosts;

    $query = "SELECT * FROM `posts` WHERE  `post_status` != 'published' ";
    $resultDraftPosts = mysqli_query($connection, $query);
    $countDraftPosts = mysqli_num_rows($resultDraftPosts);

    if (!$resultDraftPosts) {
        die('Query' . FAIL . mysqli_error($connection));
        }
}

function queryPublishedPosts() {

    global $connection;
    global $resultPublishedPosts;
    global $countPublishedPosts;

    $query = "SELECT * FROM `posts` WHERE  `post_status` = 'published' ";
    $resultPublishedPosts = mysqli_query($connection, $query);
    $countPublishedPosts = mysqli_num_rows($resultPublishedPosts);

    if (!$resultPublishedPosts) {
        die('Query' . FAIL . mysqli_error($connection));
        }
}

  function queryAllPosts() {

    global $connection;
    global $resultAllPosts;
    global $countAllPosts;

    $query = "SELECT * FROM `posts` ORDER BY `post_id` DESC";
    $resultAllPosts = mysqli_query($connection, $query);
    $countAllPosts = mysqli_num_rows($resultAllPosts);

    if (!$resultAllPosts) {
        die('Query' . FAIL . mysqli_error($connection));
        }
    }

    function queryLimitPosts($page_1) {

      global $connection;
      global $resultLimitPosts;
      global $countLimitPosts;

      $pageNumber = $page_1;

      $query = "SELECT * FROM `posts` ORDER BY `post_id` DESC LIMIT $pageNumber";
      $resultLimitPosts = mysqli_query($connection, $query);
      $countLimitPosts = mysqli_num_rows($resultLimitPosts);

      if (!$resultLimitPosts) {
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

    function querySearchPostsByAuthor() {

        global $connection;
        global $resultPostsByAuthor;
        global $countPostsByAuthor;

        $author = $_GET['author'];

        $query = "SELECT * FROM `posts` WHERE `post_author` = '$author' ";
        $resultPostsByAuthor = mysqli_query($connection, $query);
        $countPostsByAuthor = mysqli_num_rows($resultPostsByAuthor);

        if (!$resultPostsByAuthor) {
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

    function searchPostById($postValueId) {

        global $connection;
        global $resultPostById;
        $post_id = $postValueId;

        $query = "SELECT * FROM `posts` WHERE `post_id` = {$post_id} ";
        $resultPostById = mysqli_query($connection, $query);


        if (!$resultPostById) {
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
        $the_post_id = mysqli_insert_id($connection);
        echo SUCESS . "<p class='bg-success'>Post was Created. <a href='../post.php?post_id={$the_post_id}'> View Post</a> or <a href='posts.php?source=edit&post_id={$the_post_id}'> Edit Post</a></p>";
    }
}

function updatePostViewCount(){

    global $connection;
    global $resultupdatePostViewCount;

    $post_id = $_GET['post_id'];

    $query = "UPDATE `posts` SET `post_views_count` = post_views_count + 1 WHERE `post_id` = '{$post_id}' ";
    $resultupdatePostViewCount = mysqli_query($connection, $query);

    if (!$resultupdatePostViewCount) {
        die('Query' . FAIL . mysqli_error($connection));
    }
}


function deletePost() {

    global $connection;

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

function bulkOptions($checkBoxValue) {

    global $connection;
    global $resultBulkOptions;
    global $resultPostById;

     $bulk_options = $_POST['bulkOptions'];
     $postValueId = $checkBoxValue;

      switch ($bulk_options) {
          case 'published':
              $query = "UPDATE `posts` SET `post_status` = '{$bulk_options}' WHERE `post_id` = {$postValueId} ";
              $resultBulkOptions = mysqli_query($connection, $query);
          break;
          case 'draft':
              $query = "UPDATE `posts` SET `post_status` = '{$bulk_options}' WHERE `post_id` = {$postValueId} ";
              $resultBulkOptions = mysqli_query($connection, $query);
          break;
          case 'delete':
              $query = "DELETE FROM `posts` WHERE `post_id` = '{$postValueId}' ";
              $resultBulkOptions = mysqli_query($connection, $query);
          break;
          case 'clone':
            searchPostById($postValueId);

            while ($row = mysqli_fetch_assoc($resultPostById)) {

              $post_id = $row['post_id'];
              $post_author = $row['post_author'];
              $post_title = $row['post_title'];
              $post_category_id = $row['post_category_id'];
              $post_status = $row['post_status'];
              $post_image = $row['post_image'];
              $post_tags = $row['post_tags'];
              $post_content = $row['post_content'];

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
              $resultBulkOptions = mysqli_query($connection, $query);
            }
          break;
  }

    if (!$resultBulkOptions) {
        die('Query' . FAIL . mysqli_error($connection));
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////CATEGORIES FUNCTIONS
////////////////////////////////////////////////////////////////////////////////////////////////

    function queryCountCategories() {

        global $connection;
        global $resultCountCategories;
        global $countCountCategories;

        $query = "SELECT * FROM `categories`";
        $resultCountCategories = mysqli_query($connection, $query);
        $countCountCategories = mysqli_num_rows($resultCountCategories);

        if (!$resultCountCategories) {
            die('Query' . FAIL . mysqli_error($connection));
            }

        }

    function queryAllCategories($limit) {

    global $connection;
    global $resultAllCategories;

    $cat_limit = (isset($limit)) ? $cat_limit = $limit : $cat_limit = 5;
    $query = "SELECT * FROM `categories` ORDER BY `cat_id` ASC LIMIT $cat_limit ";
    $resultAllCategories = mysqli_query($connection, $query);

    if (!$resultAllCategories) {
        die('Query' . FAIL . mysqli_error($connection));
        }

    }

    function selectCategories(){

        global $connection;
        global $resultselectCategories;

        $cat_id =$_GET['update'];

        $query = "SELECT * FROM `categories` WHERE `cat_id` = '{$cat_id}' ";
        $resultselectCategories = mysqli_query($connection, $query);

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

function queryAllComments() {

  global $connection;
  global $resultAllComments;
  global $countAllComments;

  $query = "SELECT * FROM `comments` ";
  $resultAllComments = mysqli_query($connection, $query);
  $countAllComments = mysqli_num_rows($resultAllComments);

  if (!$resultAllComments) {
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

  function queryPendingComments() {

    global $connection;
    global $resultPendingComments;
    global $countPendingComments;

    $query = "SELECT * FROM `comments` WHERE `comment_status` != 'approved'";
    $resultPendingComments = mysqli_query($connection, $query);
    $countPendingComments = mysqli_num_rows($resultPendingComments);

    if (!$resultPendingComments) {
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
