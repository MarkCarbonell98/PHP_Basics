<?php
include 'db.php';
function showAllData() {
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query failed' . mysqli_error());
    }
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
};

function updateTable() {
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('connection with the server failed ' . mysqli_error($connection));
    }
    echo 'record Updated!';
};

function deleteRows() {
    global $connection;
    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id = $id ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('connection with the server failed ' . mysqli_error($connection));
    }
    echo 'the record was succesfully deleted';
};

function createData() {
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $hash_format = "$2y$10$";
    $salt = "iusesomecrazystrings69";
    $hash_and_salt = $hash_format . $salt;
    $password = crypt($password, $hash_and_salt);
    $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('query failed' . mysqli_error($connection));
    } else {
        echo 'Your Record was succesfully created';
    }
};

function readRows() {
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('query failed' . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
}
