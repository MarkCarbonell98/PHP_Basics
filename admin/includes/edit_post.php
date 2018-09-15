
        <?php 
            if(isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
                $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                $select_post_by_id = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_post_by_id)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                }
            }

            if(isset($_POST['update_post'])) {
                $post_title = $_POST['title'];
                $post_author = $_POST['author'];
                $post_category_id = $_POST['category_id'];
                $post_status = $_POST['status'];
                $post_image = $_FILES['post_image']['name'];
                $post_image_temp = $_FILES['post_image']['tmp_name'];
                $post_tags = $_POST['post_tags'];
                $post_content = $_POST['post_content'];
                move_uploaded_file($post_image_temp, "../images/$post_image");

                if(empty($post_image)) {
                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                    $select_image = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_array($select_image)) {
                        $post_image = $row['post_image'];
                    }
                }

                $query = "UPDATE posts SET post_title = '$post_title', ";
                $query .= "post_category_id = '$post_category_id', "; 
                $query .= "post_date = now(), "; 
                $query .= "post_author = '$post_author', "; 
                $query .= "post_status = '$post_status', "; 
                $query .= "post_content = '$post_content', "; 
                $query .= "post_tags = '$post_tags', "; 
                $query .= "post_image = '$post_image' "; 
                $query .= "WHERE post_id = $the_post_id ";
                $query_upload_post = mysqli_query($connection, $query);
                confirm($query_upload_post);
                header('location: posts.php');
            }
        ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Post Title</label>
                <input class="form-control" name="title" type="text" value="<?= $post_title?>">
            </div>
            <div class="form-group">
                <label for="post_author">Post Author</label>
                <input class="form-control" name="author" type="text" value="<?= $post_author?>">
            </div>
            <div class="form-group">
                <label for="post_cat" style="display:block;">Post Category</label>
                <select name="category_id" id="post_cat">
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
            </div>
            <div class="form-group">
                <label for="post_status">Post Status</label>
                <input class="form-control" name="status" type="text" value="<?= $post_status?>">
            </div>
            <div class="form-group">
                <label for="post_image">Post Image</label>
                <img src="../images/<?= $post_image?>" alt="" class="img-thumbnail">
                <input name="post_image" type="file" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="post_tags">Post Tags</label>
                <input class="form-control" name="post_tags" value="<?= $post_tags?>">
            </div>
            <div class="form-group">
                <laber for="post_content"></laber>
                <textarea name="post_content" id="" cols="30" rows="10" id="" class="form-control"><?= $post_content;?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
            </div>
        </form>
