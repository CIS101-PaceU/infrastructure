<?php
    // Get the fields from the http post request
    include('../config.php');
    include('../session.php');
    $pTitle = $_POST['forum_title'];
    $pText = mysql_real_escape_string($_POST['forum_text']);
    $pDate = (new DateTime())->format('Y-m-d');

    // Insert the new post
    $sql = 'INSERT INTO discussion_board_posts(discussionTitle, discussionText, postDate, userID)
        VALUES("' . $pTitle . '","' . $pText . '","' . $pDate . '","' . $_SESSION['login_userID'] . '")';
    $result = $conn->query($sql);

    if(!$result) // Something went wrong, display the error
    {
        include('../header.php');
        echo 'Oops, something went wrong! <br/>';
        echo 'Error: ' . $sql . '<br/>' . $conn->error;
        include('../footer.php');
    }
    else // Insert succesfull, redirect to discussion board
    {
        header('Location: ../' . $_SESSION['login_role'] . '/discussionBoard.php');
    }
    $conn->close();
?>
