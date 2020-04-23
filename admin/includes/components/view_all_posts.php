<?php queyAllPosts(); 

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

    echo "<tr>
    <td>{$post_id}</td>
    <td>{$post_author}</td>
    <td>{$post_title}</td>
    <td>{$post_category_id}</td>
    <td>{$post_status}</td>
    <td><img width='100' src='../includes/images/{$post_image}'</img></td>
    <td>{$post_tags}</td>
    <td>{$post_comment_count}</td>
    <td>{$post_date}</td>
    <td><a href='view_all_posts.php?deletePost?={$post_id}'>Delete</a></td>
    </tr>";


    if(isset($_GET['deletePost'])) 

        $post_id = $_GET['deletePost'];

        deletePost();
    }
} 


