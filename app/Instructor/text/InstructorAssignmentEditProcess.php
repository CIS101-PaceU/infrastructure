<?php

$belowRoot = true;
$isLoggedIn = true;
$showNav = true;
$displayClass =true;
$isTeacher = true;

$thisPage="Edit Text Grade";

include('../../header.php');
include('../../config.php');


/*

echo $_POST["assName"],$_POST["Instructions"],$_POST["dueDate"];

$sql="INSERT into text_assignment (assName,Instructions,dueDate)
VALUES
('".$_POST["assName"]."','".$_POST["Instructions"]."','".$_POST["dueDate"]."')";

echo $getGrade;
echo $getSubId;
echo $getAssId;
echo $getStudId;
echo $getAssName;
echo $getInstructions;
echo $getAssId;
echo $getDueDate;

*/

//include 'text.php';
$getAssName = $_POST["assName"];
$getInstructions = $_POST["Instructions"];
$getDueDate = $_POST["dueDate"];
$getAssId = $_POST["assId"];


$sql="UPDATE text_assignment SET assName='".$getAssName."',Instructions='".$getInstructions."',dueDate='".$getDueDate."' where assId='". $getAssId ."'";
//VALUES ('".$getStudId."','".$getAssId."','".$getGrade."','".$getSubId."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='index.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();


//echo $_POST["studId"],$_POST["assId"],$_POST["grade"],$_POST["subId"];

include('../../footer.php');


?>