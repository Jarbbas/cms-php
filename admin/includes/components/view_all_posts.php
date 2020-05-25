<?php

  if (isset($_POST['checkBoxesArray'])) {

        foreach ($_POST['checkBoxesArray'] as $checkBoxValue) {

              bulkOptions($checkBoxValue);
          }
    }


?>
<form class="" action="" method="post">

  <div id="bulkOptionsContainer" class="col-xs-4">
    <select class="form-control" name="bulkOptions" id="">
        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">Clone</option>
    </select>
  </div>

  <div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a href="posts.php?source=add" class="btn btn-primary">Add New</a>
  </div>

<table class="table table-bordered table-hover">
   <thead>
       <tr>
           <th><input type="checkbox" id="selectAllBoxes"></th>
           <th>Id</th>
           <th>Author</th>
           <th>Title</th>
           <th>Category</th>
           <th>Status</th>
           <th>Image</th>
           <th>Tags</th>
           <th>Comments</th>
           <th>Visualizations</th>
           <th>Date</th>
       </tr>
   </thead>
   <tbody>

<?php

queryAllPosts();

while ($row = mysqli_fetch_assoc($resultAllPosts)) {

        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_views_count = $row['post_views_count'];

        $authorName = searchAuthorId($post_author);
        $categoryName = selectCategories($post_category_id);

?>

      <tr>
      <td><input type="checkbox" class="checkBoxes" name="checkBoxesArray[]" value="<?php echo $post_id; ?>"></td>

<?php

    echo "<td>{$post_id}</td>
          <td>{$authorName}</td>
          <td><a href='../post.php?post_id={$post_id}'>{$post_title}</td>
          <td>{$categoryName}</td>
          <td>{$post_status}</td>
          <td><img width='100' src='../includes/images/{$post_image}'</img></td>
          <td>{$post_tags}</td>
          <td><a href='posts.php?source=comment&post_id={$post_id}'>{$post_comment_count}</td>
          <td>{$post_views_count}</td>
          <td>{$post_date}</td>
          <td><a href='posts.php?source=edit&post_id={$post_id}'>Edit</a></td>
          <td><a onClick=\" javascript: return confirm('Are you sure you want to Delete ?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>
          </tr>";
}

if(isset($_GET['delete'])) {

    //validation if the user has authorization to delete user's
    if (isset($_SESSION['user_role']) && $_SESSION['user_role' == 'administrator']) {
      
      deletePost();
 
  }
}

?>

</tbody>
</table>
</form>
