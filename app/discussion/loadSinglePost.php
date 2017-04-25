<?php
    $discId = htmlspecialchars($_GET['disc']);

    // Select the specific post the user requested
    $sql = 'SELECT discussionID, discussionTitle, discussionText, postDate, firstName, lastName 
      FROM discussion_board_posts d
      JOIN user u ON d.userID = u.userID
      WHERE discussionID=' . $discId;
    $result = $conn->query($sql);

    // Select the replies of the specific post
    $replySql = 'SELECT discussionID, replyText, firstName, lastName, replyDate 
      FROM discussion_board_replies d
      JOIN user u ON d.userID = u.userID
      WHERE discussionID = ' . $discId;
    $replies = $conn->query($replySql);

    // Display the specific post
    $row = $result->fetch_assoc();
    include('discPostMarkup.php');

    // Loop through the replies and display them
    while($row = $replies->fetch_assoc()) {
        include('discReplyMarkup.php');
    }

    // Display the form to add a new reply
    include('newReplyMarkup.php');
?>
