
        <?php 
            if(isset($_POST['create_user'])) {
                $username = $_POST['username'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];
                $repeat_user_password = $_POST['repeat_user_password'];
                $user_image = $_FILES['user_image']['name'];
                $user_image_template = $_FILES['user_image']['tmp_name'];
                $user_role = $_POST['user_role'];
                move_uploaded_file($user_image_template, "../images/$user_image");

                if ($user_password === $repeat_user_password ) {
                    $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_image, user_role, user_date_created) ";
                    $query .= "VALUES ('$username', '$user_password', '$user_firstname', '$user_lastname', '$user_email', '$user_image', '$user_role', now())";
                    $create_user_query = mysqli_query($connection, $query);
                    confirm($create_user_query);
                    header('location: users.php?source=add_user');

                }
            }
        ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" name="username" type="text">
            </div>
            <div class="form-group">
                <label for="user_firstname">First Name</label>
                <input class="form-control" name="user_firstname" type="text">
            </div>
            <div class="form-group">
                <label for="user_lastname" class="control-label">Last Name</label>
                <input class="form-control" name="user_lastname" type="text">
            </div>
            <div class="form-group">
                <label for="user_email">Email</label>
                <input class="form-control" name="user_email" type="text">
            </div>
            <div class="form-group">
                <label for="user_password">User Password</label>
                <input class="form-control" name="user_password" type="password">
            </div>
            <div class="form-group">
                <label for="repeat_user_password">Repeat User Password</label>
                <input class="form-control" name="repeat_user_password" type="password">
            </div>
            <div class="form-group">
                <label for="user_image">User Image</label>
                <input name="user_image" type="file" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="post_tags">User Role</label>
                <input class="form-control" name="user_role">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
            </div>

        </form>

