<?php

$belowRoot = true;
$isLoggedIn = true;
$showNav = true;
$displayClass =true;
$isTeacher = true;

$thisPage="Post Assignment";

include('../header.php');
include('../config.php');



$sql="INSERT into assignment (assignmentTitle, assignmentDescription,dueDate,availableDate,endAvailableDate)
VALUES
('".$_POST["assignmentTitle"]."','".$_POST["assnDesc"]."','".$_POST["dueDate"]."','".$_POST["postedDate"]."','".$_POST["endDate"]."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='assignments.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

include('../footer.php');
?>