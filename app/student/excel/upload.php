<?php
// Excel Grading Team:
// Please do not modify this page
// Begin your work on excel.php
?>
<?php
include '../../config.php';
?>
<?php

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = false;
$isStudent = true;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Excel";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOB</title>
</head>


<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="excelFile"><input type="submit" name="submit" value="Upload">
</form>

<?php


if(isset($_POST['submit']))
{
	
	

if(!$conn) {echo "error";}

	
	$fileName = mysqli_real_escape_string($conn,$_FILES["excelFile"]["name"]);
	echo $fileName;
	$fileData = mysqli_real_escape_string($conn,file_get_contents($_FILES["excelFile"]["tmp_name"]));
	
	//echo $fileData;
	$fileType = mysqli_real_escape_string($conn,$_FILES["excelFile"]["type"]);
	echo $fileType;
	$fileSize =  mysqli_real_escape_string($conn,$_FILES["excelFile"]["size"]);




	//echo $fileSize;
	$query = "INSERT INTO excelassignments(assignmentID,promptFile,promptFileType,promptFileSize,userVariableCell) VALUES('824708','$fileData','$fileType','$fileSize','C45')";
	$result = $conn->query($query);	
	
}

?>


</body>

</html>