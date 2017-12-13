<?php
    // Get the fields from the http post request
    include('../config.php');
    include('../session.php');
    $pTitle = $_POST['forum_title'];
    $pText = $_POST['forum_text'];
//    $pText = mysqli_escape_string($_POST['forum_text']);
    $pDate = (new DateTime())->format('Y-m-d H:i:s');

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
    else // Insert succesful, redirect to discussion board
    {
        $role = strtolower($_SESSION['login_role']) == 'instructor' ? 'instructor' : 'student';
        header('Location: ../' . $role . '/discussion-board/index.php');
    }
    $conn->close();
?>
