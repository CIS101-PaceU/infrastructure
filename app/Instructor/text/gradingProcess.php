<?php

$activePage = 'text';
$isInstructor = true;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Submission Gradded</title>
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
$getNote = $_GET["notes"];
$getRemark = $_GET["remark"];
$getGrade = $_GET["grade"];
$getSubId = $_GET["subId"];
$getAssId = $_GET["assId"];
$getStudId = $_GET["studId"];

$sql = "INSERT into text_grades (studId,assId,grade,subId,remark,notes)
VALUES
('" . $getStudId . "','" . $getAssId . "','" . $getGrade . "','" . $getSubId . "','" . $getRemark . "','" . $getNote . "')";

if ($conn->query($sql) === true) {
    echo "Your post was submitted. Go <a href='textSubmissions.php?assId=" . $getAssId . "'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}
$conn->close();
?>



  </div>

</div>

</body>
</html>