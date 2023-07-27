<?php include "includes/admin_header.php" ?>

<body class="bg-dark">

    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper" class="p-4">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row p-3">
                    <div class="col-lg-12">
                        <h1 class="page-header py-4">
                            All Comments
                            <small class="text-success">[<?php echo $_SESSION['username'] ;?>]</small>
                        </h1>
                        
                        <?php

                            if(isset($_GET['source'])) {

                                $source = $_GET['source'];

                            } else {

                                $source = '';
                            }

                            switch ($source) {

                                case 'add_posts';

                                    include "includes/add_posts.php";
                                    break;

                                case "edit_post";

                                    include "includes/edit_post.php";
                                    break;

                                default:
                                include "includes/view_all_comments.php";
                            }

                        ?>
                       
                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php" ?>