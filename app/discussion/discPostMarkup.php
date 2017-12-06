<!-- <div class='forum-post-group'>
  <div class='forum-title-group'>
    <a 
       href='discussionBoard.php?disc=<?= $row['discussionID'] ?>' 
       class='forum-title'> 
        <?= $row['discussionTitle'] ?> 
    </a>
    <div class='forum-author'> <?= $row['firstName'] . ' ' . $row['lastName'] ?> </div>
    <div class='forum-date'> <?= (new DateTime($row['postDate']))->format('F j, Y') ?> </div>
  </div>
  <div class='forum-preview'> <?= $row['discussionText'] ?> </div>
  <div class='forum-replies'> <?= $replies->num_rows . ' Replies' ?> </div>
</div>
 -->

<div class="all-announcements">
  <div class="discussion-post-preview">
    <a 
       href='discussionBoard.php?disc=<?= $row['discussionID'] ?>'> 
        
      
      <span class="discussion-preview-title"><?= $row['discussionTitle'] ?></span>

    <span class="discussion-preview-author"><?= $row['firstName'] . ' ' . $row['lastName'] ?></span>

    <span class="discussion-preview-date"><?= (new DateTime($row['postDate']))->format('m/d/Y') ?> </span>

    </a>

  </div>

</div>