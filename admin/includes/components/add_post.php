<?php

if (isset($_POST['create_post'])) {

    insertPost();
}

?>

<form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" name="post_title">
        </div>
        <div class="form-group">
            <label for="post_category_id">Post Category</label>
            <select class="form-control" name="post_category_id">
            <option value='default'>Select an option...</option>
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
            <option value='default'>Select an option...</option>
            <?php
                //this will fetch users ids and names
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
            <select class="form-control" name="post_status" >
              <option value="published">published</option>
              <option value="draft">draft</option>
            </select>
        </div>
        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file"  name="post_image">
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text"  class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
        </div>

</form>
