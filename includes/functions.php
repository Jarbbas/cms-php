<?php
    function queryCountCategories() {

        global $connection;
        global $result;
        global $count;
        $query = "SELECT * FROM `categories`";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        }

    function queryAllCategories($limit) {

    global $connection;
    global $result;
    $cat_limit = (isset($limit)) ? $cat_limit = $limit : $cat_limit = 5;
    $query = "SELECT * FROM `categories` ORDER BY `cat_id` ASC LIMIT $cat_limit ";
    $result = mysqli_query($connection, $query);

    }

    function queyAllPosts() {

    global $connection;
    global $result;
    $query = "SELECT * FROM `post`";
    $result = mysqli_query($connection, $query);
   
    }

    function queySearchPosts() {

        global $connection;
        global $result;
        global $count;
        $search = $_POST['search'];
        $query = "SELECT * FROM `post` WHERE `post_tags` LIKE '%$search%' ";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
    
    }

    function search() {

        if(isset($_POST['submit'])) {

            global $connection;
            $search = $_POST['search'];
            $query = "SELECT * FROM `post` WHERE `post_tags` LIKE '%$search%' ";
            $result = mysqli_query($connection, $query);

                if (!$result) {
                     die('query failed ' . mysqli_error($connection));
                    } 
            }        
             echo"<div class='well'>
                    <h4>Blog Search</h4>
                    <form action='search.php' method='post'>
                    <div class='input-group'>
                        <input name='search' type='text' class='form-control'>
                        <span class='input-group-btn'>
                            <button name='submit' class='btn btn-default' type='submit'>
                                <span class='glyphicon glyphicon-search'></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>";
        
    } 
