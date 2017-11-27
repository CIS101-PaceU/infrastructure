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


*/

$getGrade = $_GET["grade"];
$getSubId = $_GET["subId"];
$getAssId = $_GET["assId"];
$getStudId = $_GET["studId"];



$sql="UPDATE text_grades SET grade='".$getGrade."' where subId='". $getSubId ."'";
//VALUES ('".$getStudId."','".$getAssId."','".$getGrade."','".$getSubId."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='textSubmissions.php?assId=".$getAssId."'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();


//echo $_POST["studId"],$_POST["assId"],$_POST["grade"],$_POST["subId"];

include('../../footer.php');


?>