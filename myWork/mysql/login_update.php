<?php
include 'functions.php';
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('connection with the server failed ' . mysqli_error($connection));
    }
}
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <title>PHP Course</title>
</head>
<body>
    <div class="container">
    <h1 class="jumbotron jumbotron-fluid">This is the Login_Update</h1>
        <div class="col-sm-6">
            <form action="login_update.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <select name="id" id="">
                    <?php
                        showAllData();
                    ?>
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Update">
            </form>
        </div>


    </div>
    
</body>
</html>