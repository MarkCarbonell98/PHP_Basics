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
                    <?php insert_categories();?>
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
                                    findAllCategories();
                                    deleteCategories();
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
