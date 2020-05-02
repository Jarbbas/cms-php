<?php

if (isset($_POST['create_user'])) {

    insertUser();
}

?>

<form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="post_title">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="post_author">User password</label>
            <input type="password" class="form-control" name="user_password">
        </div>
        <div class="form-group">
            <label for="post_title">User Frist Name</label>
            <input type="text" class="form-control" name="user_fristname">
        </div>
        <div class="form-group">
            <label for="post_title">User Last Name</label>
            <input type="text" class="form-control" name="user_lastname">
        </div>
        <div class="form-group">user_lastname
            <label for="post_title">User email</label>
            <input type="email" class="form-control" name="user_email">
        </div>
        <div class="form-group">
            <label for="post_status">User Role</label>
            <select class="form-control" name="user_role" >
              <option value="subscriber">subscriber</option>
              <option value="administrator">administrator</option>
            </select>
        </div>
        <div class="form-group">
            <label for="post_image">User Profile Picture</label>
            <input type="file"  name="user_image">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_user" value="Create user Acess">
        </div>

</form>
