<?php 

    //root paths to components and DB
    $path_to_functions = $_SERVER['DOCUMENT_ROOT'];
    $path_to_functions .= "/projeto-cms-php/includes/functions.php";
    $path_to_db = $_SERVER['DOCUMENT_ROOT'];
    $path_to_db .= "/projeto-cms-php/includes/db.php";
    $path_to_messages = $_SERVER['DOCUMENT_ROOT'];
    $path_to_messages .= "/projeto-cms-php/includes/messages.php";
    $path_to_header = $_SERVER['DOCUMENT_ROOT'];
    $path_to_header .= "/projeto-cms-php/includes/components/header.php";
    $path_to_navigation = $_SERVER['DOCUMENT_ROOT'];
    $path_to_navigation .= "/projeto-cms-php/includes/components/navigation.php";
    $path_to_sidebar = $_SERVER['DOCUMENT_ROOT'];
    $path_to_sidebar .= "/projeto-cms-php/includes/components/sidebar.php";
    $path_to_footer = $_SERVER['DOCUMENT_ROOT'];
    $path_to_footer .= "/projeto-cms-php/includes/components/footer.php";

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

            <?php queyAllPosts(); ?>

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
