	<?php
	$belowRoot = true;
	$isLoggedIn = true;
	$isTeacher = true;
	$isStudent = false;
	$displayClass=true; //display the class name after the prof selects section from dropdown
	$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown
	
	$thisPage = "Excel Ass Submission";

	include('../../header.php');
	include('../../mobile-nav.php');
	
	?>
	<?php
	include 'PHPExcel.php';            // External plugin..
	?>

	<html>
    
    <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  </head>
    <style>
table {
    border: 1px solid black;
    border-collapse: collapse;
	
	overflow : auto;
	width: 50%;
}
th, td {
	border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
    text-align: left;    
}
.main-container{

  }
.prev-update{
max-height: 40%; overflow: auto;
border: 1px solid #01508d;
  border-radius: 5px;
  padding: 3px;
  color: #01508d;
  background-color: white;
  text-decoration: none;
}
</style>
<body>
<div class="main-page">
<?php include('../../navigation.php');
?>

<div class="main-content">
    <div class="dashboard-container">
<?php
$assignmentID=$_GET['assignmentID'];
$userid= $_SESSION["login_userID"];
 $sql= "SELECT assignmentTitle  FROM assignment where assignmentID='$assignmentID'";
 						$result= mysqli_query($conn,$sql);
 						$row = mysqli_fetch_assoc($result);
 						$assignmentTitle = $row['assignmentTitle'];
						


// $userid= $_SESSION["login_userID"];
// $query="select userName from user where userID='$userid'";
// $result= mysqli_query($conn,$query);
// $row1 = mysqli_fetch_assoc($result);
// $userName = $row1['userName'];
 
$sql ="Select  u.firstName,u.lastName, s.* from submission s INNER JOIN (
	SELECT userID,Max(submissionOrder) as maxSubmissionOrder FROM `submission` WHERE assignmentID='$assignmentID' and userID='$userid' group by assignmentID) sdd
	on s.userID =sdd.userID and s.submissionOrder =sdd.maxSubmissionOrder INNER JOIN user u 
on s.userID =u.userID WHERE assignmentID='$assignmentID' ";


//$sql ="Select u.firstName, u.lastName,s.assignmentID, s.grade,s.userID from submission s INNER JOIN user u on s.userID= u.userID where assignmentID='$assignmentID' and submissionOrder='$maximum' and userID='$userid'";
	$result = $conn->query($sql);
	$r = mysqli_num_rows($result);
   if($r > 0){
	        echo '<div class="prev-update" >';
			echo '<center>';
			echo '<fieldset>';
			echo '<h1 id="add-h1">Grades </h1>';
			echo '</br>';
			echo '<table>' . "\n";
			echo '<tr>' ;	
			echo '<td>' . "First Name" . '</td>'.'<td>' . "Last Name" . '</td>'.'<td>' . "Assignment Title" . '</td>'.'<td>' . "Points Earned" . '</td>' . "\n";
         
        	while ($row = $result->fetch_assoc()) {
            echo '<tr>' ;
            echo '<td>' .  $row['firstName'] . '</td>' .'<td>' .  $row['lastName'] . '</td>' .'<td>' .  $assignmentTitle . '</td>'.'<td>' .  $row['grade'] . '</td>' . "\n";			
			echo '</tr>' ;
     }
	 }
	 else
	 {
		 echo '<h1 id="add-h1">You have no grades for this assignment yet.</h1>';
	 }
	 
?>
</table>
</fieldset>
</div>
		</div>
		<?php echo "Go <a href='../excel/'>back</a>.";?>
		</div>
</div>
    
</body>
</html>
