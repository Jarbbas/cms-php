<?php
    ob_start();

?>
<div class="col-md-4">

                <!-- Blog Search Well -->

                <?php

                if(isset($_POST['submit'])) {

                    $search = $_POST['search'];

                    if($search == "" || empty($search)) {
                        echo "<h4 class='page-header'>" . NOTEMPTY . "</h4>";
                        } else {
                            search();
                        }
                }
                ?>

                 <div class='well'>
                    <h4>Post Search</h4>
                    <form action='search.php' method='post'>
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
                </div>
<?php

if (isset($_SESSION['first_name'])) {
?>
                <div class='well'>
                   <h3>Welcome</h3>
                   <smal><?php echo $_SESSION['first_name']?></smal>
                   <span class='input-group-btn'>
                       <a style="margin-top: 1em;" href="logout.php" class='btn btn-primary'>Log out</a>
                   </span>
                </div>

<?php } else { ?>

                <div class='well'>
                   <h4>Login</h4>
                   <form action='login.php' method='post'>
                   <div class='form-group'>
                       <input name='username' type='text' class='form-control' placeholder="Enter username">
                   </div>
                   <div class='input-group'>
                       <input name='password' type='password' class='form-control' placeholder="password">
                       <span class='input-group-btn'>
                           <button name='login' class='btn btn-primary' type='submit'>Enter</button>
                       </span>
                   </div>
                   <span class='input-group-btn'>
                       <a style="margin-top: 1em;" href="registration.php" class='btn btn-success'>Register</a>
                   </span>
                   </form>
                   <!-- /.input-group -->
                </div>
<?php } ?>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                              <?php
                               queryAllCategories(5);

                               if (!$resultAllCategories) {
                                die('query failed ' . mysqli_error($connection));
                                    } else {
                                    while ($row = mysqli_fetch_assoc($resultAllCategories)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo "<li><a href='category.php?cat_id={$cat_id}'>{$cat_title}</a></li>";
                                    }
                                }

                               ?>
                            </ul>
                        </div>

                        <!-- /.col-lg-6 -->
                        <!-- <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
