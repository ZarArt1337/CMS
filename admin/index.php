<?php include "includes/admin_header.php" ?> 

<body class="bg-dark">
    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper" class="p-4">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row py-4 px-3">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel
                            <small class="text-success">[<?php echo $_SESSION['username']; ?>]</small>
                        </h1>
                        
                    </div>
                </div>
                       
                <!-- /.row -->
                
                <div class="row py-3">
                    
                    <div class="col-lg-3 col-md-6 pb-4">
                        <div class="panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col text-right">

                                        <?php 

                                        $query = "SELECT * FROM posts";
                                        $select_all_posts = mysqli_query($connection, $query);
                                        $posts_counts = mysqli_num_rows($select_all_posts);

                                        echo "<div class='huge text-center'>{$posts_counts}</div>"

                                        ?>

                                        <div class="text-center">Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View All Posts</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 pb-4">
                        <div class="panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col text-right">

                                        <?php 

                                            $query = "SELECT * FROM comments";
                                            $select_all_comments = mysqli_query($connection, $query);
                                            $comments_counts = mysqli_num_rows($select_all_comments);

                                            echo "<div class='huge text-center'>{$comments_counts}</div>"

                                        ?>
                            
                                      <div class="text-center">Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View All Comments</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 pb-4">
                        <div class="panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col text-right">

                                    <?php 

                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($connection, $query);
                                        $users_counts = mysqli_num_rows($select_all_users);

                                        echo "<div class='huge text-center'>{$users_counts}</div>"

                                    ?>

                                        <div class="text-center"> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View All Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 pb-4">
                        <div class="panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col text-right">

                                        <?php 

                                            $query = "SELECT * FROM categories";
                                            $select_all_categories = mysqli_query($connection, $query);
                                            $categories_counts = mysqli_num_rows($select_all_categories);

                                            echo "<div class='huge text-center'>{$categories_counts}</div>"

                                        ?>
                                        
                                         <div class="text-center">Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View All Categories</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!--LAST REGISTERED USERS -->
                <div class="row">
                    <div class="col-12 col-md-5 table-responsive py-3">
                    <h5 class="py-3 text-center bg-dark text-light" scope="col" colspan="4">Last Registered Users</h5>
                        <table class="table border">
                            <thead class="table-light">
                                <tr >
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $query = "SELECT * FROM users LIMIT 5";
                                $select_users = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_users)) {
                                    $username = $row['username'];
                                    $user_email = $row['user_email'];
                                
                                    echo "<tr>";
                                    echo "<td>$username</td>";
                                    echo "<td>$user_email</td>";
                                    
                                    }
                                ?>
                            </tbody>    
                        </table>
                    </div>
                    <div class="col-12 col-md-7 py-3">
                        <h5 class="py-3 text-center bg-dark text-light" scope="col" colspan="4">Last Posts</h5>
                            <?php

                                $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 2";
                                $select_posts = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_posts)) {
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_image = $row['post_image'];
                                    $post_content = substr($row['post_content'],0,150));
  
                                    echo "<div class='border'>";
                                    echo "<p class='p-2'>Author: $post_author</p>";
                                    echo "<p class='p-2'>Title: <a href='../post.php?p_id=$post_id'>$post_title</a></p>";
                                    echo "<p class='pb-3 p-2'>$post_content...</p>";
                                    echo "</div>";
                                
                                }
                            ?>
                    </div>

                </div>

            </div>

        </div>

<?php include "includes/admin_footer.php" ?>
