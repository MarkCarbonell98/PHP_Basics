<?php 
    include './includes/header.php';
?>

<?php 
    include './includes/navigation.php';
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php 
                $query = "SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $postTitle = $row['post_title'];
                    $postAuthor = $row['post_author'];
                    $postDate = $row['post_date'];
                    $postImage = $row['post_image'];
                    $postContent = $row['post_content'];
                    // echo "<li><a href='#'>{$postTitle}</a></li>";
                ?>
                <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?= $postTitle?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?= $postAuthor?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $postDate?></p>
                <hr>
                <img class="img-responsive" src="./images/<?= $postImage; ?>" alt="">
                <hr>
                <p><?= $postContent?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <?php }?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <?php include './includes/sidebar.php';?>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <?php include './includes/footer.php';?>