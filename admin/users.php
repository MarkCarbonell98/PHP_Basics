<?php include 'includes/header.php';?>
<?php include './includes/navigation.php';?>


    <div id="wrapper">

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="col-lg-12 table-responsive">
                    <h1 class="page-header">Welcome to Admin
                        <small>Author</small></h1>
                        <?php if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = null;
                        }
                        switch($source) {
                            case 'add_user';
                            include './includes/add_user.php';
                            break;
                            case 'edit_user';
                            include './includes/edit_user.php';
                            break;
                            default;
                            include "./includes/view_all_users.php";
                            break;
                        }

                        ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include './includes/footer.php';?>
