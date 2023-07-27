<?php include "includes/db.php"?>
<?php include "includes/header.php"?>
<?php include "includes/navigation.php"?>


<!-- Page Content -->

<div class="container">

    <div class="row">

    
        <!-- Blog Entries Column -->
        <div class="col-md-8 px-5 mb-2">

            <h1 class="page-header bg-light p-4 rounded text-center">
                News
            </h1>
            <?php

            //SETTING NUMBER OF POSTS PER PAGE
            $per_page = 4;

            if(isset($_GET['page'])) {

                $page = $_GET['page'];

            } else {

                $page ="";

            }

            if($page == "" || $page == 1) {

                $page_1 = 0;

            } else {

                $page_1 = ($page * $per_page) -$per_page;

            }

            //COUNTING POSTS
            $post_query_count = "SELECT * FROM posts";
            $find_count = mysqli_query($connection, $post_query_count);
            $count = mysqli_num_rows($find_count);

            $count = ceil($count / 4);

            //DISPLAYING POSTS
            $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1, $per_page ";
            $select_all_posts_query = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = escape($row['post_id']);
                    $post_title = escape($row['post_title']);
                    $post_author = escape($row['post_author']);
                    $post_date = escape($row['post_date']);
                    $post_image = escape($row['post_image']);
                    $post_content = escape(substr($row['post_content'],0,150));
                    $post_status = escape($row['post_status']);

                    if($post_status == 'published') {

                        ?>

                        <!-- Posts -->
                        <?php include "news.php" ?>

            <?php } }?>

            <ul class="pagination justify-content-center">
            
            <?php

                //CREATING PAGINATION
                for($i =1; $i <= $count; $i++) {

                    if($i == $page) {

                        echo "<li class='page-item'><a class='active_link page-link p-3' href='index.php?page={$i}'>{$i}</a></li>"; 

                    } else {

                        echo "<li class='page-item'><a class='page-link p-3' href='index.php?page={$i}'>{$i}</a></li>";

                    }
  
                }

            ?>

        </ul>

        </div>

        <?php include "includes/sidebar.php"?>

    </div>
    
    <footer class="my-2 py-3 mt-4 bg-gold">
        <div class="container text-center py-3 text-dark">
                <div class="m-3"><p>2023 <span>&copy;</span><a href="https://zarart.pl" class="text-decoration-none contact-info text-dark"> ZarArt</a></p></div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>