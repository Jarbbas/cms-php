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

            queyAllPosts(); 

            if (!$result) {
                die('query failed ' . mysqli_error($connection));
                } else {      
                        while ($row = mysqli_fetch_assoc($result)) {
                        $post_id = $row['post_id'];                            
                        $post_title = $row['post_title'];              
                        $post_author = $row['post_author'];              
                        $post_date = $row['post_date'];              
                        $post_image = $row['post_image'];              
                        $post_content = substr($row['post_content'],0, 150);             
            
                        echo " <h1 class='page-header'>
                                Page Heading
                                <small>Secondary Text</small>
                                </h1>
                        <!-- First Blog Post -->
                                <h2>
                                    <a href='post.php?post_id={$post_id}'>{$post_title}</a>
                                </h2>
                                <p class='lead'>by <a href='index.php'>Start Bootstrap</a></p>
                                <p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
                                <hr>
                                <a href='post.php?post_id={$post_id}'>
                                    <img class='img-responsive' src='includes/images/{$post_image}' alt=''>
                                    </a>
                                <hr>
                                <p>{$post_content}</p>
                                <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
                                <hr>";
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

        <!-- Footer component-->
<?php  
    include_once($path_to_footer); 
?>
