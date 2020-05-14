
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Front End</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                  <?php
                    queryAllCategories(3);

                    if (!$resultAllCategories) {
                        die('query failed ' . mysqli_error($connection));
                            } else {
                            while ($row = mysqli_fetch_assoc($resultAllCategories)) {
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='#'>{$cat_title}</a></li>";
                            }
                        }
                          if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "administrator") {
                            echo "<li><a href='admin'>CMS Admin Page</a></li>";
                          } else {
                          echo "";
                        }

                  ?>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
