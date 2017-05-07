<?php
    // Select all of the posts from the database
    $sql = "SELECT discussionID, discussionTitle, discussionText, postDate, userName 
        FROM discussion_board_posts d
        JOIN user u ON u.userID = d.userID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) // There are some posts, display them
    {
        // Loop through all of the selected posts
        while($row = $result->fetch_assoc()) {
            $replySql = "SELECT discussionID, replyText, replyDate 
              FROM discussion_board_replies
              WHERE discussionID = " . $row["discussionID"];
            $replies = $conn->query($replySql);
            include('discPostMarkup.php');
        }
        // Display the form to add a post
        include('newPostMarkup.php');
    } 
    else // There are no posts
    {
        echo "0 results";
        include('newPostMarkup.php');  
    }
    $conn->close();
?>
