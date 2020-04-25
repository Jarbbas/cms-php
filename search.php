<?php  
   //root paths to components and DB
   $path_to_functions = $_SERVER['DOCUMENT_ROOT'];
   $path_to_functions .= "/cms-php/includes/functions.php";
   $path_to_db = $_SERVER['DOCUMENT_ROOT'];
   $path_to_db .= "/cms-php/includes/db.php";
   $path_to_messages = $_SERVER['DOCUMENT_ROOT'];
   $path_to_messages .= "/cms-php/includes/messages.php";
   $path_to_header = $_SERVER['DOCUMENT_ROOT'];
   $path_to_header .= "/cms-php/includes/components/header.php";
   $path_to_navigation = $_SERVER['DOCUMENT_ROOT'];
   $path_to_navigation .= "/cms-php/includes/components/navigation.php";
   $path_to_sidebar = $_SERVER['DOCUMENT_ROOT'];
   $path_to_sidebar .= "/cms-php/includes/components/sidebar.php";
   $path_to_footer = $_SERVER['DOCUMENT_ROOT'];
   $path_to_footer .= "/cms-php/includes/components/footer.php";

   include_once($path_to_db);
   include_once($path_to_functions);
   include_once($path_to_messages);

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
            
            querySearchPosts();

            if($count < 1) {
                echo "<h1 class='page-header'>" . NOTOFUND . "</h1>";
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

            </div>

    <!-- Blog Sidebar Widgets Column component-->
    <?php include "includes/components/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer component-->
    <?php include "includes/components/footer.php"; ?>
