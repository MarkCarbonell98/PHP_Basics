<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php 
            if(isset($_GET['edit'])) {
                $catId = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id = {$catId}";
                $select_categories = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_categories)) {
                    $catId = $row['cat_id'];
                    $catTitle = $row['cat_title'];
                    ?>
                        <input value="<?php if(isset($catTitle)) {echo $catTitle;} ?>" type="text" class="form-control" name="cat_title">
                    <?php 
                    
                }
            }
        ?>
            <!-- update query -->
        <?php
            if(isset($_POST['update_category'])) {
                $the_cat_title = $_POST['cat_title'];
                $query_to_update = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$catId}'";
                $update_query = mysqli_query($connection, $query_to_update);
                confirm($update_query);
            }
        ?>
    </div>
    <div class="form-group">
        <input type="submit" name="update_category" value="Update Category" class="btn btn-primary">
    </div>
</form> 