<link rel="stylesheet" type="text/css" href="../stylesheets/discussion-board.css">

<?php

    //logic for login
    $belowRoot = true;
    $isLoggedIn = true;
    $isStudent = false;
    $showNav = true;
    $displayClass = true;
    $isTeacher=true;
    $thisPage="Discussion Board";

    include('../header.php');

    if (array_key_exists('disc', $_GET)) // User has asked for a specific post
    {
        include '../discussion/loadSinglePost.php';
    } 
    else // Show all the posts
    {
        include '../discussion/loadAllPosts.php';
    }

    include('../footer.php');
?>
