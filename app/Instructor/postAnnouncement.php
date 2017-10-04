<?php

$belowRoot = true;
$isLoggedIn = true;
$showNav = true;
$displayClass =true;
$isTeacher = true;

$thisPage="Post Announcement";

include('../header.php');
include('../config.php');



$sql="INSERT into Announcements (announcementTitle, message, datePosted)
VALUES
('".$_POST["announcementTitle"]."','".$_POST["message"]."','".$_POST["annDate"]."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='announcements.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

include('../footer.php');
?>