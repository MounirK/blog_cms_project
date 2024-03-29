<?php
     
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }
    $query = "SELECT * FROM posts WHERE post_id={$the_post_id}";
    $select_posts_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts_by_id )){
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }

    //update posts 
    if(isset($_POST['update_post'])){

        $post_author = $_POST['post_author'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
        $post_tags = $_POST['post_tags'];
        move_uploaded_file($post_image_temp, "../images/$post_image");
        //test image umpty
        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_array($select_image)){
                $post_image = $row['post_image'];
            }
        }

        //update sql query
        $query = "UPDATE posts SET post_category_id = '{$post_category_id}', post_title = '{$post_title}', 
        post_author = '{$post_author}', post_date = now(), post_image = '{$post_image}' , post_content = '{$post_content}', 
        post_tags = '{$post_tags}', post_status = '{$post_status}' WHERE post_id = {$the_post_id}";

        $update_post = mysqli_query($connection, $query);
        confirmQuery($update_post);
        echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post</a> Or 
            <a href='posts.php'>Edit More Posts</a> </p>";
    }
?>

<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label>Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label>Post Category Id</label><br>
        <select name="post_category" id="" >
            <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);
                confirmQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
            
        </select>
        
    </div>
    <div class="form-group">
        <label>Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <select name="post_status" id="">
            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
            
            <?php
                if($post_status == 'published'){
                    echo "<option value='draft'>Draft</option>";
                }else{
                    echo "<option value='published'>Publish</option>";
                }
            ?>

        </select>
    </div>


    <div class="form-group">
        <img src="../images/<?php echo $post_image; ?>" alt="" width="100">
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label>Post Content</label>
        <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>

