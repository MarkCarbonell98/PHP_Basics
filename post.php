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
                if(isset($_GET['p_id'])) {
                    $post_id = $_GET['p_id'];
                }
            ?>

            <?php 
                $query = "SELECT * FROM posts WHERE post_id = $post_id";
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
                <!-- Comments Form -->
                <?php 
                    include './admin/functions.php';
                    if(isset($_POST['create_comment'])) {
                        $the_post_id = $_GET['p_id'];
                        $comment_content = $_POST['comment_content'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];

                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES ('$the_post_id', '$comment_author', '$comment_email', '$comment_content', 'unapproved', now()) ";
                        $comment_query = mysqli_query($connection, $query);
                        confirm($comment_query);
                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id ";
                        $update_comment_count_query = mysqli_query($connection, $query);
                        confirm($update_comment_count_query);
                    }


                ?>

                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label for="comment_content">Your Name</label>
                            <input class="form-control" type="text" name="comment_author" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Your Email</label>
                            <input class="form-control" type="email" name="comment_email" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content" placeholder="Your Comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Create Comment</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                    // $the_post_id = $_GET['p_id'];
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC";
                    $post_comment_query = mysqli_query($connection, $query);
                    confirm($post_comment_query);
                    while($row = mysqli_fetch_assoc($post_comment_query)) {
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                        $comment_author = $row['comment_author'];
                    ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?=$comment_author?>
                                    <small><?=$comment_date?></small>
                                </h4>
                                <p><?=$comment_content?></p>
                            </div>
                        </div>

                    <?php
                    }
                ?>

                <!-- Comment -->
                <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div> -->
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