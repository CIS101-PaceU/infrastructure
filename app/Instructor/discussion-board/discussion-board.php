<!-- <div class="back">Go back to Discussion</div> -->

<?php

    if (array_key_exists('disc', $_GET)) // User has asked for a specific post
    {
        include '../../discussion/loadSinglePost.php';
    } 
    else {
      // Show all the posts
        include '../../discussion/loadAllPosts.php';
    }

?>
