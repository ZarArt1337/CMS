<?php include "includes/db.php"; ?>
<?php include "admin/functions.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"?>

<?php if($_SESSION['user_role'] == ''): ?>
    <?php header("Location: index.php") ?>

<?php else: ?>



    <?php 

        if(isset($_SESSION['username'])) {

            $username = $_SESSION['username'];
            $query = "SELECT * FROM users WHERE username = '{$username}' ";
            $select_user_profile_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_user_profile_query)) {

                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
            }
        }
    ?>

    <?php

    if (isset($_POST['edit_user'])) {

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if(!empty($user_password)) { 

            $query_password = "SELECT user_password FROM users WHERE username = '{$username}' ";
            $get_user_query = mysqli_query($connection, $query_password);
            confirm($get_user_query);
  
            $row = mysqli_fetch_array($get_user_query);
  
            $db_user_password = $row['user_password'];
  
  
          if($db_user_password != $user_password) {
  
              $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
  
            }
    
        $query = "UPDATE users SET ";
        $query .="user_firstname  = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="username = '{$username}', ";
        $query .="user_email = '{$user_email}', ";
        $query .="user_password   = '{$hashed_password}' ";
        $query .= "WHERE username = '{$username}' ";

        $edit_user_query = mysqli_query($connection,$query);
        confirm($edit_user_query);

        if($_SESSION['user_role'] == 'Admin' or 'Subscriber') {
            
            header("Location: index.php");
        }
        
        }
    }

    ?>
        <div id="page-wrapper">

            <div class="container rounded bg-light p-4">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-12">
                        <h1 class="page-header py-5">
                            Profile:
                            <span class="text-success"><?php echo $_SESSION['username'] ;?></span>
                        </h1>

                        
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group py-2 px-3">
                                <label for="user_firstname">First name</label>
                                <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ;?>">
                            </div>

                            <div class="form-group py-2 px-3">
                                <label for="user_lastname">Last name</label>
                                <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ;?>">
                            </div>
                            
                            <div class="form-group py-2 px-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $username ;?>">
                            </div>
                            
                            <div class="form-group py-2 px-3">
                                <label for="user_email">Email</label>
                                <input type="text" class="form-control" name="user_email" value="<?php echo $user_email ;?>">
                            </div>
                            
                            <div class="form-group py-2 px-3">
                                <label for="user_password">Password</label>
                                <input autocomplete="off" type="password" class="form-control" name="user_password" value="">
                            </div>
                            
                            <div class="form-group py-4 px-3">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                            </div>
                            
                        </form>
                    </div>
                </div>

            </div>

        </div>

</body>

</html>

<?php endif;?>