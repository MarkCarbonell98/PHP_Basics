<?php include 'includes/header.php';?>
<?php include './includes/navigation.php';?>

    <div id="wrapper">

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">
                    <?php 
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
                    
                    ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Add Category" class="btn btn-info">
                            </div>
                        </form>       
                                <!-- edit form  -->
                                <?php
                                if(isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];
                                    include "includes/update_categories.php";
                                }
                                ?>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php 
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

                                    //delete query 
                                    if(isset($_GET['delete'])) {
                                        $the_cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                        $delete_query = mysqli_query($connection, $query);
                                        header("Location: categories.php");
                                    }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include './includes/footer.php';?>
