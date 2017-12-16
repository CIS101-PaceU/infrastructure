<div class="all-announcements">
<div class="discussion-post-complete">  
  <div class="discussion-post-preview">
      <a 
        href='index.php?disc=<?= $row['discussionID'] ?>'> 
          
        
        <span class="discussion-preview-title"><?= $row['discussionTitle'] ?></span>

      <span class="discussion-preview-author"><?= $row['firstName'] . ' ' . $row['lastName'] ?></span>

      <span class="discussion-preview-date"><?= (new DateTime($row['postDate']))->format('m/d/Y') ?> </span>
      </a>
    </div>
    <div class='forum-preview'> <?= $row['discussionText'] ?> </div>
    <div class='forum-replies'> <?= $replies->num_rows . ' Replies' ?> </div>
  </div>
</div>
