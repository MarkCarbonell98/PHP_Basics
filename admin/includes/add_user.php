
        <?php 
            if(isset($_POST['create_post'])) {
                // echo print_r($_POST);
                $post_title = $_POST['title'];
                $post_author = $_POST['author'];
                $post_category_id = $_POST['category_id'];
                $post_status = $_POST['status'];
                $post_image = $_FILES['post_image']['name'];
                $post_image_temp = $_FILES['post_image']['tmp_name'];
                $post_tags = $_POST['post_tags'];
                $post_content = $_POST['post_content'];
                $post_date = date('d-m-y');
                // $post_comment_count = 4;
                move_uploaded_file($post_image_temp, "../images/$post_image");
                
                $query = "INSERT INTO posts (post_category_id, post_title,post_author, post_date, post_image, post_content, post_tags, post_status) ";
                $query .= "VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
                $create_new_post_query = mysqli_query($connection, $query);
                confirm($create_new_post_query);
                header('location: ./posts.php');
            }
        ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Post Title</label>
                <input class="form-control" name="title" type="text">
            </div>
            <div class="form-group">
                <label for="post_author">Post Author</label>
                <input class="form-control" name="author" type="text">
            </div>
            <label for="post_cat" class="control-label">Post Category</label>
                <select name="category_id" id="post_cat" class="form-control">
                <?php    
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection, $query);
                    confirm($select_categories);
                    while($row = mysqli_fetch_assoc($select_categories)) {
                        $catTitle = $row['cat_title'];
                        $catId = $row['cat_id'];
                        echo "<option value='{$catId}'>";
                        echo $catTitle;
                        echo '</option>';
                    }
                ?>
                </select>         
            <div class="form-group">
                <label for="post_status">Post Status</label>
                <input class="form-control" name="status" type="text">
            </div>
            <div class="form-group">
                <label for="post_image">Post Image</label>
                <input name="post_image" type="file" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="post_tags">Post Tags</label>
                <input class="form-control" name="post_tags">
            </div>
            <div class="form-group">
                <laber for="post_content"></laber>
                <textarea name="post_content" id="" cols="30" rows="10" id="" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
            </div>

        </form>

