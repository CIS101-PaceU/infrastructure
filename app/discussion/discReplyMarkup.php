<div class='forum-post-group'>
  <div class='forum-title-group'>
    <div class='forum-title'> <?= $row['firstName'] . ' ' . $row['lastName'] ?> </div>
    <div class='forum-date'> <?= (new DateTime($row['replyDate']))->format('F j, Y') ?> </div>
  </div>
  <div class='forum-preview'> <?= $row['replyText'] ?> </div>
</div>
