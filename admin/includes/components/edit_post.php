<?php

if (isset($_POST['edit_post'])) {

    updatePost();

}

searchPostById();

while ($row = mysqli_fetch_assoc($result)) {
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
        <select class="form-control" name="post_category" id="">
<?php
    queryCountCategories();
    queryAllCategories($count);

    //this will fetch categories ids and names
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<option value='{$cat_id}'>{$cat_title}</option>";

        }
?>
        </select>
        </div>
        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" class="form-control" name="post_author" value ="<?php echo $post_author; ?>">
        </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select class="form-control" name="post_status" value ="<?php echo $post_status; ?>">
              <option value="published">published</option>
              <option value="unpublished">unpublished</option>
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
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10" ><?php echo $post_content; ?></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_post" value="Update Post">
        </div>

</form>

<?php } ?>
