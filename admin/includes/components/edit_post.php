<?php

if (isset($_POST['edit_post'])) {

    updatePost();

}
$postValueId = $_GET['post_id'];
searchPostById($postValueId);

while ($row = mysqli_fetch_assoc($resultPostById)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_content = $row['post_content'];

?>
<form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" name="post_title" value ="<?php echo $post_title; ?>">
        </div>
        <div class="form-group">
        <select class="form-control" name="post_category_id" id="">
<?php
    queryCountCategories();
    queryAllCategories($countCountCategories);

    //this will fetch categories ids and names
    while ($row = mysqli_fetch_assoc($resultAllCategories)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<option value='{$cat_id}'>{$cat_title}</option>";

        }
?>
        </select>
        </div>
        <div class="form-group">
            <label for="post_author">Post Author</label>
            <select class="form-control" name="post_author">

            <?php
                //these functions will fetch users ids and names
                echo "<option value='default'>" . searchAuthorId($post_author) . "</option>";
                queyAllUsers();

                while ($row = mysqli_fetch_assoc($resultAllUsers)) {
                    $user_id = $row['user_id'];
                    $user_fristname = $row['user_fristname'];
                    $user_lastname = $row['user_lastname'];
                    $fullName = $user_fristname . " " . $user_lastname;

                    echo "<option value='{$user_id}'>{$fullName}</option>";

                    }
            ?>
                    </select>
                    </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select class="form-control" name="post_status">

<?php
  echo "<option value='{$post_status}'>{$post_status}</option>";

  if($post_status == 'published') {
    echo "<option value='draft'>draft</option>";
  } else {
      echo "<option value='published'>published</option>";
  }

?>

            </select>
        </div>
        <div class="form-group">
            <img width="100" src="../includes/images/<?php echo $post_image;?>" alt="">
            <input type="file"  name="post_image">
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text"  class="form-control" name="post_tags" value ="<?php echo $post_tags; ?>">
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="body" cols="30" rows="10" ><?php echo $post_content; ?></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_post" value="Update Post">
        </div>

</form>

<?php } ?>
