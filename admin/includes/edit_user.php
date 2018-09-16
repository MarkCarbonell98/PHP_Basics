
        <?php 
            if(isset($_GET['source']) && $_GET['source'] == 'edit_user') {
                $user_id = $_GET['user_id'];
                $query = "SELECT * FROM users WHERE user_id = $user_id";
                $select_all_user_info_query = mysqli_query($connection, $query);
                confirm($select_all_user_info_query);
                while($row = mysqli_fetch_assoc($select_all_user_info_query)) {
                    $username = $row['username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_password = $row['user_password'];
                    $user_role = $row['user_role'];
                    $user_image = $row['user_image'];
                }
                
            }
            
            if(isset($_POST['update_user'])) {
                $username = $_POST['username'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];
                $user_image = $_FILES['user_image']['name'];
                $user_image_template = $_FILES['user_image']['tmp_name'];
                $user_role = $_POST['user_role'];
                move_uploaded_file($user_image_template, "../images/user_images/$user_image");
                
                if(empty($user_image)) {
                    $query = "SELECT * FROM users WHERE user_id = $user_id";
                    $select_image_update_user = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_array($select_image_update_user)) {
                        $user_image = $row['user_image'];
                    }
                }
                $query = "UPDATE users SET username = '$username', user_password = '$user_password', user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_email = '$user_email', user_image = '$user_image', user_role = '$user_role' ";
                $query .= "WHERE user_id = $user_id ";
                $update_user_query = mysqli_query($connection, $query);
                confirm($update_user_query);
                header('location: users.php');
            }
            ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" name="username" type="text" value="<?=$username?>">
            </div>
            <div class="form-group">
                <label for="user_firstname">First Name</label>
                <input class="form-control" name="user_firstname" type="text" value="<?=$user_firstname?>">
            </div>
            <div class="form-group">
                <label for="user_lastname" class="control-label">Last Name</label>
                <input class="form-control" name="user_lastname" type="text" value="<?=$user_lastname?>">
            </div>
            <div class="form-group">
                <label for="user_role">User Role</label>
                <select name="user_role" id="" class="form-control">
                    <option value="<?=$user_role?>"><?=$user_role?></option>
                    <?php
                        if($user_role == 'Admin') {
                            echo '<option value="Subscriber">Subscriber</option>';
                        } else {
                            echo '<option value="Admin">Admin</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="user_email">Email</label>
                <input class="form-control" name="user_email" type="text" value="<?= $user_email?>">
            </div>
            <div class="form-group">
                <label for="user_password">Password</label>
                <input class="form-control" name="user_password" type="password" value="<?= $user_password?>">
            </div>
            <div class="form-group">
                <label for="user_image" style="display:block;">User Image</label>
                <img src="../images/<?=$user_image?>" alt="" width="200px" height="200px">
                <input name="user_image" type="file" class="form-control-file">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
            </div>

        </form>

