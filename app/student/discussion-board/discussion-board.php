<div class="discussion-home-container">
  
  <div class="discussion-titles">
    <h1><i class="fa fa-quote-right" aria-hidden="true"></i> DISCUSSION BOARD</h1>

    <?php 
    if (array_key_exists('disc', $_GET)) // User has asked for a specific post
    {
        include '../../discussion/loadSinglePost.php';
    } 
    else // Show all the posts
    {
        include '../../discussion/loadAllPosts.php';
    }

    ?>
  </div>
</div>
