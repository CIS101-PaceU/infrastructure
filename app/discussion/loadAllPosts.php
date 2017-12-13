<?php
    // Select all of the posts from the database
    $sql = 'SELECT discussionID, discussionTitle, discussionText, postDate, firstName, lastName 
        FROM discussion_board_posts d
        JOIN user u ON u.userID = d.userID
        ORDER BY d.postDate DESC';
    $result = $conn->query($sql);

    // Display the form to add a post
        include('newPostMarkup.php');

    if ($result->num_rows > 0) // There are some posts, display them
    {
        // Loop through all of the selected posts
        while($row = $result->fetch_assoc()) {
            $replySql = 'SELECT discussionID, replyText, replyDate 
              FROM discussion_board_replies
              WHERE discussionID = ' . $row['discussionID'] . '
              ORDER BY replyDate';
            $replies = $conn->query($replySql);
            include('discPostMarkup.php');
        }
        
    } 
    else // There are no posts
    {
        echo '0 results';
        include('newPostMarkup.php');  
    }
    $conn->close();
?>
