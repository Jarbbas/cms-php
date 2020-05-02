<?php

if (isset($_POST['edit_user'])) {

    updateUser();

}

searchUserById();

while ($row = mysqli_fetch_assoc($result)) {

        $user_id= $row['user_id'];
        $username = $row['username'];
        $user_password= $row['user_password'];
        $user_fristname = $row['user_fristname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

?>
<form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="post_title">Username</label>
            <input type="text" class="form-control" name="username" value ="<?php echo $username; ?>">
        </div>
        <div class="form-group">
            <label for="post_author">User password</label>
            <input type="password" class="form-control" name="user_password" value ="<?php echo $user_password; ?>">
        </div>
        <div class="form-group">
            <label for="post_title">User Frist Name</label>
            <input type="text" class="form-control" name="user_fristname" value ="<?php echo $user_fristname; ?>">
        </div>
        <div class="form-group">
            <label for="post_title">User Last Name</label>
            <input type="text" class="form-control" name="user_lastname" value ="<?php echo $user_lastname; ?>">
        </div>
        <div class="form-group">
            <label for="post_title">User email</label>
            <input type="email" class="form-control" name="user_email" value ="<?php echo $user_email; ?>">
        </div>
        <div class="form-group">
            <label for="post_status">User Role</label>
            <select class="form-control" name="user_role" >

<?php
  echo "<option value='{$user_role}'>{$user_role}</option>";

  if($user_role == 'administrator') {
    echo "<option value='subscriber'>subscriber</option>";
  } else {
      echo "<option value='administrator'>administrator</option>";
  }

?>
        </select>
        </div>
        <div class="form-group">
            <img width="100" src="../includes/images/<?php echo $user_image;?>" alt="">
            <input type="file"  name="user_image">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
        </div>

</form>
<?php

  }

 ?>
