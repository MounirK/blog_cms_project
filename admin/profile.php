<?php 
    include "includes/admin_header.php" ;

    if($_SESSION['username']){

        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$username' ";

        $select_user_profile_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_user_profile_query)){
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

?> 

<?php
        
    if(isset($_POST['edit_user'])){

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

        //update sql query
        $query = "UPDATE users SET 
         user_firstname = '{$user_firstname}',
         user_lastname= '{$user_lastname}', 
         user_role = '{$user_role}',
         username = '{$username}', 
         user_email = '{$user_email}' , 
         user_password = '{$user_password}'
         WHERE username = '{$username}' ";

        $edit_user_query = mysqli_query($connection, $query);
        confirmQuery($edit_user_query);

        header("Location: users.php");

    }

?>

    <div id="wrapper"> 
 
        <!-- Navigation -->
<?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">
 
            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                                Welcome to heading
                                <small>Author</small>
                        </h1> 

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
                                <input class="btn btn-primary" type="submit" name="edit_user" value="Update profile">
                            </div>
                        </form>
                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php"; ?> 