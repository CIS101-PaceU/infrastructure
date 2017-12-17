
<?php

$activePage = 'text';
$isInstructor = true;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Assignment Edit</title>
  <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
include '../../header.php';
include '../../mobile-nav.php';
?>

<div class="main-page">
<?php
include "../../navigation.php";
?>


  <div class="main-content">


<?php
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

//include('../../footer.php');
?>

</div>

</div>

</body>
</html>