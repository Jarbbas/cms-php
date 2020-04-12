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

            <?php queyAllPosts(); ?>

            </div>

    <!-- Blog Sidebar Widgets Column component-->
    <?php include "includes/components/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer component-->
    <?php include "includes/components/footer.php"; ?>
