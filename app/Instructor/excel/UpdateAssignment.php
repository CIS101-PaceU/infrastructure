<?php
include '../../config.php';


$userID =$_SESSION['login_userID'];
	
	date_default_timezone_set("America/New_York");	
    $assignmentID =$_POST["assignmentID"];
    $assignmentTitle =$_POST['assignmentTitle'];
	$currentDateTime = date("Y-m-d h:i:sa");
	$currentDate = date("Y-m-d");
	$assignTitle =$_POST['assignmentTitle'];
    $dueDate =$_POST["dueDate"];
          $endDate =$_POST["endDate"];

          $sql ="Update assignment set assignmentTitle ='$assignmentTitle' , dueDate ='$dueDate' , endAvailableDate ='$endDate' where assignmentID ='$assignmentID'";
	
 	if($conn->query($sql) === TRUE){

        echo "Updated";
     }
          if($_POST['excelFile']!= null){
              $fileName =$_FILES['excelFile']["name"];
              $filePath = $_FILES['excelFile']['tmp_name'];
              $keyFileExt = pathinfo($fileName, PATHINFO_EXTENSION);
          }
          if($_FILES['submittedFile']!= null){
              $subfileName = $_FILES['submittedFile']["name"];
				$subfilePath = $_FILES['submittedFile']['tmp_name'];
                $promptFileExt = pathinfo($subfileName, PATHINFO_EXTENSION);
          }

				
				
				
				
				
				
				
?>