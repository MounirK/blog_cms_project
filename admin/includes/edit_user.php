<?php

    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];

        $query = "SELECT * FROM users WHERE user_id = $the_user_id";
        $select_users_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_users_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }

    }


    if(isset($_POST['edit_user'])){

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
        
        $query = "SELECT randSalt FROM users";
        $select_randsalt_query = mysqli_query($connection, $query);
        if(!$select_randsalt_query){
            die("Query Failed" . mysqli_error($connection));
        }
        
        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randSalt'];
        $hashed_password = crypt($user_password, $salt);



        //update sql query
        $query = "UPDATE users SET user_firstname = '{$user_firstname}',
         user_lastname= '{$user_lastname}', 
         user_role = '{$user_role}',
         username = '{$username}', 
         user_email = '{$user_email}' , 
         user_password = '{$hashed_password}'
         WHERE user_id = {$the_user_id}";

        $edit_user_query = mysqli_query($connection, $query);
        confirmQuery($edit_user_query);

        echo "<p class='bg-success'>user Updated. <a href='users.php'>View Users?</a> </p>";
    }
?>
<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label>FirstName</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname  ?>">
    </div>
    <div class="form-group">
        <label>LastName</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
    </div>

    <div class="form-group">
    
        <select name="user_role" id="">
            <option value="subscriber"><?php echo $user_role; ?></option>

            <?php 

                if($user_role == 'admin'){
                    echo "<option value='subscriber'>Subscriber</option>";
                }else{
                    echo "<option value='admin'>admin</option>";
                }

            ?>

        </select>
        
    </div>

    <!-- <div class="post_status">
        <label>Post Image</label>
        <input type="file" name="image">
    </div> -->


    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>
</form>