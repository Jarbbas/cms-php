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

            <?php

            searchPostById();

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
            ?>
 <!-- Blog Comments -->
<?php

    if(isset($_POST['create_comment'])) {
      createComment();
    }

 ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">

                      <div class="form-group">
                          <label for="author">Author</label>
                          <input type="text" class="form-control" name="comment_author" value="">
                      </div>

                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="comment_email" value="">
                      </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>
        </div>

<?php
    // <!-- Blog Sidebar Widgets Column component-->
    include_once($path_to_sidebar);
?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer component-->
<?php
    include_once($path_to_footer);
?>
