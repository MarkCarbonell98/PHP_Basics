<div class="table-responsive text-wrap">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Role</th>
                <th scope="col">Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php 
                $query = "SELECT * FROM users";
                $select_users = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_users)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];
                    $user_date_created = $row['user_date_created'];
                    echo '<tr scope="row">';?>
                        <td><?php echo $user_id ?></td>
                        <td><?php echo $username ?></td>
                        <td><?php echo $user_firstname ?></td>
                        <td><?php echo $user_lastname ?></td>
                        <td><?php echo $user_email?></td>
                        <td><?php echo "<img src='../images/$user_image' alt='user image'>"?></td>
                        <td><?php echo $user_role?></td>
                        <td><?php echo $user_date_created?></td>
                        <?php 
                            // $query = "SELECT * FROM posts WHERE post_id = $username";
                            // $select_post_id_query = mysqli_query($connection, $query);
                            //     while($row = mysqli_fetch_assoc($select_post_id_query)) {
                            //         $post_id = $row['post_id'];
                            //         $post_title = $row['post_title'];
                            //         echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                            //     }
                        ?>
                        <td><a href='users.php?source=edit_user&user_id=<?=$user_id?>'>Edit</a></td>
                        <td><a href='users.php?delete=<?=$user_id?>'>Delete</a></td>
                    <?php echo '</tr>';
                }
                ?>
        </tbody>
    </table>
</div>

<?php

if(isset($_GET['delete'])) {
    $query = "DELETE FROM comments WHERE comment_id = $user_id ";
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
