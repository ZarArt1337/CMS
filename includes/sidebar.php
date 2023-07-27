<div class="col-md-4 px-5">

    <!-- LOGGED PANEL -->
                

    <?php if(isset($_SESSION['user_role'])): ?>
    <div class="bg-light p-3 rounded">
        <h4 class="py-3">Logged in as <span class="text-success">[<?php echo $_SESSION['username'] ?>]</span></h4>
                        
        <?php if($_SESSION['user_role'] == 'Admin') {
            echo "<p><a href='admin' class='fw-bolder text-success'>Admin Panel</a></p>";
                            
            if(isset($_GET['p_id'])) {
    
                $the_post_id = $_GET['p_id'];
                echo "<p><a class='btn btn-success' href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post : {$post_title}</a></p>";
                                
            }

        } ?>

        <a href='profile.php' class='btn btn-primary'>My Profile</a>
        <a href="includes/logout.php" class="btn btn-primary">Logout</a>
    </div>
                
    <!--/LOGGED PANEL-->

    <?php else: ?>

    <!--LOGIN PANEL-->
    <div class="bg-light p-3 rounded">
        <h4 class="py-2 text-center">Login panel</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group px-4 py-2">
                <input name="username" type="text" class="form-control" placeholder="Enter username">  
            </div>
            <div class="input-group px-4 py-2">
                <input name="password" type="password" class="form-control" placeholder="Enter password"> 
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Log in</button>
                </span> 
            </div>
            <div class="form-group px-4 pt-4">
                <h4 class="py-2">Doesn't have account yet?</h4>
                <a class="btn btn-primary px-4 py-2" href='registration.php'>Register</a>
            </div>
        </form> 
    </div>
                
    <!--/LOGIN PANEL-->
                        
    <?php endif; ?>
                
    <!-- Blog Categories -->
                
    <div class="cat py-5 bg-light p-3 rounded my-5">

        <?php

            $query = "SELECT * FROM categories LIMIT 5";
            $select_categories_sidebar = mysqli_query($connection,$query);
   
        ?>

        <h4 class="text-center">Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <?php

                        while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}<a></li>";

                        }

                    ?>
                </ul>
            </div>      
        </div>
    </div>

    <!--FORM and Conctacts-->
    <div class="mail-form p-3 bg-light rounded">
        <h4 class="text-center py-2">Contact me</h4>
        <div class="text-center">

            <form method="post" action="./send.php">
                <div class="text-center">
                    <div class="input-group px-4 py-2">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Name" required >
                    </div>
                    <div class="input-group px-4 py-2">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="input-group px-4 py-2">
                        <textarea class="form-control" rows="4" name="message" id="message" placeholder="Write message here..." required style="height:100%"></textarea>
                    </div>
                    <div class="input-group px-4 py-2">
                        <input type="submit" name="submit" value="Wyślij" class="btn btn-primary px-4 py-2 submit-btn">
                    </div>
                </div>
            </form>

        </div> 
    </div>
    
</div>

            