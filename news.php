<?php ;?>

<div class="bg-light rounded p-5 my-4">
    <h2 class="py-3">
        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
    </h2>
    <hr>
    <p>
        by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ;?></a>
    </p>
    <h5><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></h5>
                       
    <a href="post.php?p_id=<?php echo $post_id; ?>">
        <img class="img-responsive p-4" src="images/<?php echo $post_image; ?>" alt="Zdjecie - Post" width="100%">
    </a>
                        
    <p class="p-4"><?php echo $post_content ?></p>
    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<?php ;?>
                    