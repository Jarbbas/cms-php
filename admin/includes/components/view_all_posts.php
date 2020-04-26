<table class="table table-bordered table-hover">
   <thead>
       <tr>
           <th>Id</th>
           <th>Author</th>
           <th>Title</th>
           <th>Category</th>
           <th>Status</th>
           <th>Image</th>
           <th>Tags</th>
           <th>Comments</th>
           <th>Date</th>
       </tr>
   </thead>
   <tbody>

<?php

queyAllPosts();

while ($row = mysqli_fetch_assoc($result)) {

        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

        selectCategories($post_category_id);

        while ($row = mysqli_fetch_assoc($resultselectCategories)) {
            $category_name = $row['cat_title'];
        }

    echo "<tr>
    <td>{$post_id}</td>
    <td>{$post_author}</td>
    <td>{$post_title}</td>
    <td>{$category_name}</td>
    <td>{$post_status}</td>
    <td><img width='100' src='../includes/images/{$post_image}'</img></td>
    <td>{$post_tags}</td>
    <td>{$post_comment_count}</td>
    <td>{$post_date}</td>
    <td><a href='posts.php?source=edit&post_id={$post_id}'>Edit</a></td>
    <td><a href='posts.php?deletePost={$post_id}'>Delete</a></td>
    </tr>";

}


if(isset($_GET['deletePost'])) {

    $post_id = $_GET['deletePost'];
    deletePost();
}
?>
</tbody>
</table>
