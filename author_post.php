<?php include "includes/db.php"?>
<?php include "includes/header.php"?>

    <!-- Navigation -->

    <?php include "includes/navigation.php"?>
    <!-- Page Content -->

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 px-5">

                <?php

                if(isset($_GET['p_id'])) {

                    $the_post_id = $_GET['p_id'];
                    $the_post_author = $_GET['author'];

                }
                
                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}'";
                $select_all_posts_query = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];

                            ?>

                            <!-- First Blog Post -->
                            <div class="bg-light rounded p-5">
                            <h2 class="py-3">
                                <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title ?></a>
                            </h2>
                            <hr>
                            <p>
                                All post by <?php echo $post_author ?>
                            </p>
                            <h5><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?><h5>
                            
                            <img class="img-responsive p-4" src="images/<?php echo $post_image; ?>" alt="Zdjecie - Post" width="100%">
                            
                            <p class="p-4"><?php echo $post_content ?></p>
                            </div>
                            <p class="py-2"></p>

                <?php } ?>

                <!-- Blog Comments -->

                <?php

                if(isset($_POST['create_comment'])) {

                    $the_post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                    $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";
                    $create_comment_query = mysqli_query($connection, $query);

                    if(!$create_comment_query) {
                        die('Query failed' . mysqli_error($connection));
                    }

                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id ";
                    $update_comment_count = mysqli_query($connection, $query);

                    } else {


                        echo "<script>alert('One or more fields where empty. Fill all the fields again to put a comment.')</script>";

                    }
                }

                ?>
                <hr> 
            </div>

            <?php include "includes/sidebar.php"?>

        </div>

        <hr>

<?php include "includes/footer.php"?>
