<?php include "includes/db.php"?>
<?php include "includes/header.php"?>
<?php include "includes/navigation.php"?>

    <!-- Page Content -->

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 px-5">
            <h1 class="page-header bg-light p-4 rounded text-center">
                News
            </h1>

            <p class="pb-2"></p>
                <?php

                if(isset($_GET['category'])) {

                    $post_category_id = $_GET['category'];
                }

                $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ORDER BY post_id DESC";
                $select_all_posts_query = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'],0,150);

                            ?>

                           <!-- Posts -->
                            <?php include "news.php" ?>

                <?php } ?>


            </div>
            
            <?php include "includes/sidebar.php"?>

        </div>

        <hr>

<?php include "includes/footer.php"?>
