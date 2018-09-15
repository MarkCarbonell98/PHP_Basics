<div class="table-responsive text-wrap">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Author</th>
                <th scope="col">Comment</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">In Response to</th>
                <th scope="col">Approve</th>
                <th scope="col">Unapprove</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php 
                $query = "SELECT * FROM comments";
                $select_comments = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_comments)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_email = $row['comment_email'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                    echo '<tr scope="row">';?>
                        <td><?php echo $comment_id ?></td>
                        <td><?php echo $comment_author ?></td>
                        <td><?php echo $comment_content ?></td>
                        <td><?php echo $comment_email?></td>
                        <td><?php echo $comment_date?></td>
                        <td><?php echo $comment_status?></td>
                        <?php 
                            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                            $select_post_id_query = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_assoc($select_post_id_query)) {
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];
                                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                }
                        ?>
                        <td><a href='comments.php?approve=<?=$comment_id?>'>Approve</a></td>
                        <td><a href='comments.php?unapprove=<?=$comment_id?>'>Unapprove</a></td>
                        <td><a href='posts.php?source=edit_comment&p_id=<?=$comment_id?>'>Edit</a></td>
                        <td><a href='comments.php?delete=<?=$comment_id?>'>Delete</a></td>
                    <?php echo '</tr>';
                }
                ?>
        </tbody>
    </table>
</div>

<?php

if(isset($_GET['delete'])) {
    $query = "DELETE FROM comments WHERE comment_id = $comment_id ";
    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    header("Location: ./comments.php");
}

if(isset($_GET['unapprove'])) {
        $the_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
        $unapprove_comment_query = mysqli_query($connection, $query);
        confirm($unapprove_comment_query);
        header("Location: comments.php");
    }
    
    if(isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id  ";
        $approve_comment_query = mysqli_query($connection, $query);
        confirm($approve_comment_query);
        header("Location: comments.php");
}

?>
