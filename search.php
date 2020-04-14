<?php  
    include "includes/messages.php";
    include "includes/db.php";
    include "includes/functions.php";  
?>
    <!-- Header component -->
    <?php include "includes/components/header.php"; ?>

    <!-- Navigation component-->
    <?php include "includes/components/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 
            
            queySearchPosts();
            
            if (!$result) {
                die('query failed ' . mysqli_error($connection));
                } else {      
                        if($count < 1) {
                            echo "<h1 class='page-header'>
                                    Results not found
                                 </h1>";
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
            ?>

            </div>

    <!-- Blog Sidebar Widgets Column component-->
    <?php include "includes/components/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer component-->
    <?php include "includes/components/footer.php"; ?>
