<div class="table-responsive text-nowrap">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Author</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Image</th>
                <th scope="col">Tags</th>
                <th scope="col">Comments</th>
                <th scope="col">Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php 
                $query = "SELECT * FROM posts";
                $select_posts = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_posts)) {
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
                    echo '<tr scope="row">';?>
                        <td><?php echo $post_id ?></td>
                        <td><?php echo $post_author ?></td>
                        <td><?php echo $post_title ?></td>
                        <?php 
                            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                            $select_categories_id = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_categories_id)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<td>$cat_title</td>";
                            }
                        ?>
                        <td><?php echo $post_status?></td>
                        <td><img src="<?php echo "../images/$post_image"?>" alt="post image" width="200px"></td>
                        <td><?php echo $post_tags?></td>
                        <td><?php echo $post_comment_count?></td>
                        <td><?php echo $post_date?></td>
                        <td><a href='posts.php?source=edit_post&p_id=<?=$post_id?>'>Edit</a></td>
                        <td><a href='posts.php?delete=<?=$post_id?>'>Delete</a></td>
                        
                    <?php echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<?php

if(isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: posts.php");
}

?>
