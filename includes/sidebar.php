<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

<!-- Blog Search Well -->

<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    <!-- /.input-group -->
    </form>
</div>
<!-- Blog Categories Well -->
<div class="well">
    <?php 
        $query = "SELECT * FROM categories LIMIT 10";
        $select_all_categories_sidebar = mysqli_query($connection, $query);
        ?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php
                while($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
                    $catTitle = $row['cat_title'];
                    $catId = $row['cat_id'];
                    echo "<li><a href='category.php?category={$catId}'>{$catTitle}</a></li>";
                }
            ?>
            </ul>
        </div>
    </div>
</div>
    <!-- side widget  -->
    <?php include 'widget.php';?>