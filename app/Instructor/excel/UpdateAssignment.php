<?php

$activePage = 'excel';
$isInstructor = true;
$thisPage = "Edit Assignments";
include('../../session.php');
include('../../config.php');
include('../../header.php');
include('../../mobile-nav.php');

$userID =$_SESSION['login_userID'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>instructor -- dashboard announcements</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
<?php	
	date_default_timezone_set("America/New_York");	
    $assignmentID =$_POST["assignmentID"];
    $assignmentTitle =$_POST['assignmentTitle'];
	$currentDateTime = date("Y-m-d h:i:sa");
	$currentDate = date("Y-m-d");
	$assignTitle =$_POST['assignmentTitle'];
    $dueDate =$_POST["dueDate"];
    $endDate =$_POST["endDate"];

          $sql ="Update assignment set assignmentTitle ='$assignmentTitle' , dueDate ='$dueDate' , endAvailableDate ='$endDate' where assignmentID ='$assignmentID'";
    
?>
          
            <div class="main-page">
              
                <?php 
                    include("../../navigation.php");
                  ?>
          
              <div class="main-content">
    <?php           
 	if($conn->query($sql) === TRUE){
        echo "Your assignment was updated successfully. Go <a href='../excel/'>back</a>.";
    } else {
        echo "Sorry, there was an error with posting. Please try again. If the problem persists, contact the adminstrator.";
    }
         
?>  </div>

  </div>

  </body>
</html>
