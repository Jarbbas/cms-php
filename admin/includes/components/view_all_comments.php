<table class="table table-bordered table-hover">
   <thead>
       <tr>
           <th>Id</th>
           <th>Date</th>
           <th>Author</th>
           <th>Comments</th>
           <th>Email</th>
           <th>Status</th>
           <th>In Response to</th>
      </tr>
   </thead>
   <tbody>

<?php
queyAllComments();

while ($row = mysqli_fetch_assoc($resultAllComments)) {

        $comment_id = $row['comment_id'];
        $comment_author = $row['comment_author'];
        $comment_post_id = $row['comment_post_id'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_content = $row['comment_content'];
        $comment_date = $row['comment_date'];

        $query = "SELECT * FROM `posts` WHERE `post_id` = $comment_post_id ";
        $resultPost = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($resultPost)) {
          $post_title = $row['post_title'];
        }

    echo "<tr>
    <td>{$comment_id}</td>
    <td>{$comment_date}</td>
    <td>{$comment_author}</td>
    <td>{$comment_content}</td>
    <td>{$comment_email}</td>
    <td>{$comment_status}</td>
    <td><a href='../post.php?post_id={$comment_post_id}'>{$post_title}</a></td>
    <td><a href='comments.php?update={$comment_id}&status=approved'>Approve</a></td>
    <td><a href='comments.php?update={$comment_id}&status=unapproved'>Unapprove</a></td>
    <td><a href='comments.php?delete={$comment_id}'>Delete</a></td>
    </tr>";

}

if(isset($_GET['delete'])) {

    deleteComment();
}

if(isset($_GET['update'])) {

    Updatecomment();
}
?>
</tbody>
</table>
