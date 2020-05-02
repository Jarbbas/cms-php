<table class="table table-bordered table-hover">
   <thead>
       <tr>
           <th>user_id</th>
           <th>username</th>
           <th>user_password</th>
           <th>user_fristname</th>
           <th>user_lastname</th>
           <th>user_email </th>
           <th>user_image</th>
           <th>user_role</th>
       </tr>
   </thead>
   <tbody>

<?php

queyAllUsers();

while ($row = mysqli_fetch_assoc($result)) {

        $user_id= $row['user_id'];
        $username = $row['username'];
        $user_password= $row['user_password'];
        $user_fristname = $row['user_fristname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

    echo "<tr>
    <td>{$user_id}</td>
    <td>{$username}</td>
    <td>{$user_password}</td>
    <td>{$user_fristname}</td>
    <td>{$user_lastname}</td>
    <td>{$user_email}</td>
    <td><img width='100' src='../includes/images/{$user_image}'</img></td>
    <td>{$user_role}</td>
    <td><a href='users.php?source=edit&post_id={$user_id}'>Edit</a></td>
    <td><a href='users.php?delete={$user_id}'>Delete</a></td>
    </tr>";


}

if(isset($_GET['delete'])) {

  deleteUser();

}

?>
</tbody>
</table>
