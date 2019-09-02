<?php
    if(isset($_POST['create_user'])){


        // $user_id = $_POST['user_id'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        //php catch image this way 
        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];

        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // $post_date = date('Y-m-d');
        

        // move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
        
        $query .= "VALUES('$user_firstname','$user_lastname','$user_role','$username', '$user_email','$user_password')";
        $create_user_query = mysqli_query($connection, $query);
        confirmQuery($create_user_query);

        echo "User Created: " . " " . "<a href='users.php'>view users</a>";
        
    }
?>
<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label>FirstName</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label>LastName</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
    
        <select name="user_role" id="">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>  
        </select>
        
    </div>

    <!-- <div class="post_status">
        <label>Post Image</label>
        <input type="file" name="image">
    </div> -->


    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="eamil" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="eamil" class="form-control" name="user_password">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>