<?php

$belowRoot = true;
$isLoggedIn = true;
$showNav = true;
$displayClass =true;
$isTeacher = true;

$thisPage="Post Text Assignment";

include('../../header.php');
include('../../config.php');


/*
$sql="INSERT into text_assignment (assName,Instructions,dueDate)
VALUES
('".$_POST["assName"]."','".$_POST["Instructions"]."','".$_POST["dueDate"]."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='assignments.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

include('../footer.php');



echo $subDate;
echo $_POST["assId"],$_POST["studId"],$_POST["assText"];
echo $wordCount;


*/

$wordCount = str_word_count($_POST['assText']);
$subDate = (new \DateTime())->format('Y-m-d H:i:s');



$sql="INSERT into text_submission (assId,studId,subDate,assText,wordCount)
VALUES
('".$_POST["assId"]."','".$_POST["studId"]."','". $subDate ."','".$_POST["assText"]."','". $wordCount ."')";


if($conn->query($sql) === TRUE)
{
echo "Your post was submitted. Go <a href='text/index.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
echo $conn;
}

$conn->close();

include('../../footer.php');


?>