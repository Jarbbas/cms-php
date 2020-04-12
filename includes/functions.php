    <?php

    function queryAllCategories() {
    global $connection;
    $query = "SELECT * FROM `categories`";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('query failed ' . mysqli_error($connection));
            } else {      
            while ($row = mysqli_fetch_assoc($result)) {                            
            $cat_title = $row['cat_title'];              
            echo "<li><a href='#'>{$cat_title}</a></li>";
            } 
        }
    }

    function queyAllPosts() {
    global $connection;
    $query = "SELECT * FROM `post`";
    $result = mysqli_query($connection, $query);

    if (!$result) {
    die('query failed ' . mysqli_error($connection));
    } else {      
            while ($row = mysqli_fetch_assoc($result)) {                            
            $post_title = $row['post_title'];              
            $post_author = $row['post_author'];              
            $post_date = $row['post_date'];              
            $post_image = $row['post_image'];              
            $post_content = $row['post_content'];              

            echo " <h1 class='page-header'>
            Page Heading
            <small>Secondary Text</small>
            </h1>
            <!-- First Blog Post -->
            <h2>
            <a href='#'>{$post_title}</a>
            </h2>
            <p class='lead'>by <a href='index.php'>Start Bootstrap</a></p>
            <p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
            <hr>
            <img class='img-responsive' src='http://placehold.it/900x300' alt=''>
            <hr>
            <p>{$post_content}</p>
            <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
            <hr>";
            } 
        }
    }