<?php
    // Get the fields from the http post request
    include('../config.php');
    include('../session.php');
    $pText = $_POST['reply_text'];
    $pDate = (new DateTime())->format('Y-m-d');
    $pID = $_POST['disc'];

    // Insert the new reply
    $sql = 'INSERT INTO discussion_board_replies(replyText, replyDate, userID, discussionID)
       VALUES("' . $pText . '","' . $pDate . '","' . $_SESSION['login_userID'] . '","' . $pID . '")';
    $result = $conn->query($sql);

    if(!$result) // Something went wrong, display the error
    {
        include($_SERVER['DOCUMENT_ROOT'] . '/header.php');
        echo 'Oops, something went wrong! <br/>';
        echo 'Error: ' . $sql . '<br/>' . $conn->error;
        include('../footer.php');
    }
    else // Insert successful, redirect to specific discussion board post
    {
        $role = strtolower($_SESSION['login_role']) == 'instructor' ? 'teacher' : 'student';
        header('Location: ../' . $role . '/discussionBoard.php?disc=' . $pID);
    }
    $conn->close();
?>
