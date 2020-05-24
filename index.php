<?php

    $path_to_header = $_SERVER['DOCUMENT_ROOT'];
    $path_to_header .= "/cms-php/includes/components/header.php";

    // <!-- Header component -->
    include_once($path_to_header);

    // <!-- Navigation component-->
    include_once($path_to_navigation);

?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <h1 class='page-header'>
                    Welcome
<?php
    if (isset($_SESSION['first_name'])) {
    echo "<small>{$_SESSION['first_name']}</small>";
  } else {
    echo "<small>Reader</small>";
  }
?>
              </h1>
<?php
        $per_page = 5;

        if (isset($_GET['page'])) {
           $page = $_GET['page'];
        } else {
          $page ="";
        }

        if ($page = "" || $page == 1) {
          $page_1 = 0;
        } else {
          $page_1 = ($page * $per_page) - $per_page;
        }

            queryAllPosts();
            $countPages = ceil($countAllPosts / $per_page);

            queryLimitPosts(abs($page_1));
            if (!$resultLimitPosts) {
                die('query failed ' . mysqli_error($connection));
                } else {
                        while ($row = mysqli_fetch_assoc($resultLimitPosts)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_status = $row['post_status'];
                        $post_content = substr($row['post_content'],0, 150);
                        
                        $authorName = searchAuthorId($post_author);

                        if ($post_status !== 'published') {
                          // echo "<h1>No more posts available</h1>";

                        } else {

                        

                      echo " <!-- First Blog Post -->
                                <h2>
                                    <a href='post.php?post_id={$post_id}'>{$post_title}</a>
                                </h2>
                                <p class='lead'>by <a href='author_post.php?author={$post_author}&post_id={$post_id}'>{$authorName}</a></p>
                                <p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
                                <hr>
                                <a href='post.php?post_id={$post_id}'>
                                    <img class='img-responsive' src='includes/images/{$post_image}' alt=''>
                                    </a>
                                <hr>
                                <p>{$post_content}</p>
                                <a class='btn btn-primary' href='post.php?post_id={$post_id}'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
                                <hr>";
                            }
                          }
                        }
            ?>

        </div>

<?php
    // <!-- Blog Sidebar Widgets Column component-->
    include_once($path_to_sidebar);
?>

        </div>
        <!-- /.row -->

        <hr>

          <ul class="pager">
            <?php

              for ($i=1; $i < $countPages; $i++) {

                if ($i == $page) {
                    echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                } else {
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
            }

            ?>
          </ul>



        <!-- Footer component-->
<?php
    include_once($path_to_footer);
?>
