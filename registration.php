<?php include "includes/db.php"?>
<?php include "includes/header.php"?>
<?php include "includes/navigation.php"?>

<?php 

    if(isset($_POST['submit'])) {

        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($email) && !empty($password)) {

            $username = mysqli_real_escape_string($connection, $username);
            $email    = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);
    
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
    
            $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
            $query .= "VALUES('{$username}','{$email}','{$password}','Subscriber' )";
            $register_user_query = mysqli_query($connection, $query);
    
            if(!$register_user_query) {
    
                die("Query failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection)); 
            }
    
            $message = "<p class='bg-success h4'>Your Registration has been submitted</p>";
        
        } else {

            $message = "<p class='bg-warning h4'>Fields cannot be empty</p>";

        }

        } else {
            $message = "";
        }
?>

    <!-- Page Content -->
    <div class="container bg-light p-4 rounded">
    
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div>
                        <h1 class="p-5 text-center">Register</h1>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <h6 class="text-center"><?php echo $message; ?></h6>
                                <div class="form-group py-2">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                                </div>
                                 <div class="form-group py-2">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                </div>
                                 <div class="form-group py-2">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                </div>

                                <div class="py-2 text-center">
                                    <input type="submit" name="submit" id="btn-login" class="btn btn-primary" value="Register">
                                </div>
                                
                            </form>

                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


