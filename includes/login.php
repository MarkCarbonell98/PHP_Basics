<?php 
    include './db.php';
    include '../admin/functions.php';
    session_start();
    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
        $query = "SELECT * FROM users WHERE username = '$username' ";
        $select_user_query = mysqli_query($connection, $query);
        confirm($select_user_query);
        while($row = mysqli_fetch_assoc($select_user_query)) {
            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_role = $row['user_role'];
            $db_user_password = $row['user_password'];
        }

        if($username === $db_username && $user_password === $db_user_password) {
            $_SESSION['username'] = $db_username;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
            $_SESSION['user_password'] = $db_user_password;
            header("location: ../admin/index.php");
        } else {
            header("location: ../index.php");
        }
    }
    ?>