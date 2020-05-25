<table class="table table-bordered table-hover">
   <thead>
       <tr>
           <th>user_id</th>
           <th>username</th>
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

while ($row = mysqli_fetch_assoc($resultAllUsers)) {

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
    <td>{$user_fristname}</td>
    <td>{$user_lastname}</td>
    <td>{$user_email}</td>
    <td><img width='100' src='../includes/images/{$user_image}'</img></td>
    <td>{$user_role}</td>
    <td><a href='users.php?source=edit&user_id={$user_id}'>Edit</a></td>
    <td><a onClick=\" javascript: return confirm('Are you sure you want to Delete ?'); \" href='users.php?delete={$user_id}'>Delete</a></td>
    </tr>";

}

if(isset($_GET['delete'])) {
  //validation if the user has authorization to delete user's
  if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'administrator') {  
    deleteUser();
  }
}

?>
</tbody>
</table>
