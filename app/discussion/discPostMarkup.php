<div class='forum-post-group'>
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
