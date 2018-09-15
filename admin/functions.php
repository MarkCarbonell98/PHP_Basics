<?php 
function confirm($result) {
    global $connection;
    if(!$result) {
        die('Query failed ' . mysqli_error($connection));
    }
}

function insert_categories() {
    global $connection;
    if(isset($_POST['submit'])) {
        $catTitle = $_POST['cat_title'];
        if($catTitle === "" || empty($catTitle)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUES ('{$catTitle}')";
            $create_category_query = mysqli_query($connection, $query);
            if(!$create_category_query) {
                die('Query failed' . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories() {
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_categories)) {
        $catTitle = $row['cat_title'];
        $catId = $row['cat_id'];
        echo "<tr><td>{$catId}</td>";
        echo "<td>{$catTitle}</td>";
        echo "<td><a href='categories.php?delete={$catId}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$catId}'>Edit</a></td>";
        echo "</tr>";
    }
}

function deleteCategories() {
    global $connection;
    //delete query 
    if(isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}