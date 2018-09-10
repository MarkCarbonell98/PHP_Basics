<?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username && $password) {
            echo $username . ' ' . $password;
        }

        $connection = mysqli_connect('localhost', 'root', '', 'loginapp');
        if($connection) {
            echo ' we are connected';
        } else {
            die('DATABASE connection failed');
        };

        // $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die('query failed' . mysqli_error());
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
    <h1 class="jumbotron jumbotron-fluid">This is the Login_Read</h1>
        <div class="col-sm-6">
            <form action="login_read.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </form>

            <?php 
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <pre>
                        <?php
                            print_r($row);
                        ?>
                    </pre>
                    <?php
                }
            ?>
        </div>


    </div>
    
</body>
</html>