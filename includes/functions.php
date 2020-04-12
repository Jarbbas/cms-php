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
                    <img class='img-responsive' src='includes/images/{$post_image}' alt=''>
            <hr>
                    <p>{$post_content}</p>
                    <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
            <hr>";
            } 
        }
    }

    function search() {

        if(isset($_POST['submit'])) {

            echo $search = $_POST['search'];
          
        }

       echo"<div class='well'>
                    <h4>Blog Search</h4>
                    <form action='' method='post'>
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