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
      if (isset($_GET['post_id'])) {

            $postValueId = $_GET['post_id'];

            updatePostViewCount();
            searchPostById($postValueId);

            if (!$resultPostById) {
                die('query failed ' . mysqli_error($connection));
                } else {
                        while ($row = mysqli_fetch_assoc($resultPostById)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];

                        $authorName = searchAuthorId($post_author);

                        echo " <h1 class='page-header'>
                                {$post_title}
                              </h1>
                        <!-- First Blog Post -->
                                <p class='lead'>by <a href='index.php'>{$authorName}</a></p>
                                <p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
                                <hr>
                                <img class='img-responsive' src='includes/images/{$post_image}' alt=''>
                                <hr>
                                <p>{$post_content}</p>
                                <hr>";
                            }
                        }
            ?>
 <!-- Blog Comments -->
<?php

    if(isset($_POST['create_comment'])) {

        if (!empty($_POST['comment_author']) && !empty($_POST['comment_email']) && !empty($_POST['comment_content']) ) {
            createComment();
        } else {
            echo "<script>alert('Fields cannot be empty!')</script>";
        }

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
                            <textarea name="comment_content" id="body" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
<?php

    queryAprovedComments();
    while ($row = mysqli_fetch_assoc($resultAprovedComments)) {
    $comment_author = $row['comment_author'];
    $comment_content = $row['comment_content'];
    $comment_date = $row['comment_date'];

?>
              <!-- Comment -->
              <div class="media">
                  <a class="pull-left" href="#">
                      <img class="media-object" src="http://placehold.it/64x64" alt="">
                  </a>
                  <div class="media-body">
                      <h4 class="media-heading"><?php echo $comment_author; ?>
                          <small><?php echo $comment_date; ?></small>
                      </h4>
                        <?php echo $comment_content; ?>
                  </div>
              </div>
<?php
    }
  } else {
     header("Location: index.php");
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

        <!-- Footer component-->
<?php
    include_once($path_to_footer);
?>
