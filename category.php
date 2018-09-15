<?php 
    include './includes/header.php';
?>
<!-- In beatae et dolore minima quibusdam voluptatem et. Qui et voluptatem. Fugit qui vel velit animi doloribus error beatae. Quo a non amet eum dolores dolorem.
 
Et reiciendis voluptate. In ut reprehenderit dolor qui animi architecto totam cupiditate. Voluptatem et optio et doloremque optio nobis pariatur voluptatem a. Aut dolore ut. Et nostrum amet minima. Quibusdam est optio corrupti magnam dolore rem atque qui.
 
Blanditiis rerum qui culpa voluptatem perferendis accusamus maxime voluptate. Ipsum ipsam dolorem dolores aut consequatur dolorem eaque. Est consequatur nemo quis. Delectus ea ipsum consequuntur voluptas rerum ex. Qui magni sit ea et. -->

<?php 
    include './includes/navigation.php';
?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php 
            if(isset($_GET['category'])) {
                $post_category_id = $_GET['category'];
            }

                $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ";
                $select_all_posts_query = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $postTitle = $row['post_title'];
                    $post_id = $row['post_id'];
                    $postAuthor = $row['post_author'];
                    $postDate = $row['post_date'];
                    $postImage = $row['post_image'];
                    $postContent = substr($row['post_content'], 0 , 200) . '...';
                    // echo "<li><a href='#'>{$postTitle}</a></li>";
                ?>
                <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <h2>
                    <a href="./post.php?p_id=<?=$post_id?>"><?= $postTitle?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?= $postAuthor?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $postDate?></p>
                <hr>
                <a href="./post.php?p_id=<?=$post_id?>">
                    <img class="img-responsive" src="./images/<?= $postImage; ?>" alt="">
                </a>
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