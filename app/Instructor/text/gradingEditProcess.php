

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
$getGrade = $_GET["grade"];
$getSubId = $_GET["subId"];
$getAssId = $_GET["assId"];
$getStudId = $_GET["studId"];
$getRemark = $_GET["remark"];
$getNotes = $_GET["notes"];

$sql="UPDATE text_grades SET grade='".$getGrade."', remark='".$getRemark."', notes='".$getNotes."' where subId='". $getSubId ."'";
//VALUES ('".$getStudId."','".$getAssId."','".$getGrade."','".$getSubId."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='textSubmissions.php?assId=".$getAssId."'>back</a> or go <a href='index.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

?>

</div>

</div>

</body>
</html>