<?php

$activePage = 'excel';
$isInstructor = true;
include ('readExcel.php');
include('../../session.php');
include('../../config.php');
include('../../header.php');
include('../../mobile-nav.php');
$thisPage="Post Excel Assignment";
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

  <?php 
	  include("../../navigation.php");
	  $assignmentID=$_GET['assignmentID'];
	  $result = $conn->query("SELECT assignmentTitle FROM assignment where assignmentID = '$assignmentID'");
									  while ($row = $result->fetch_assoc()) {
										  $assignmentTitle=  $row['assignmentTitle'];
										  }
	?>

<div class="main-content">
<div class="dashboard-container">
  <div class="section-heading"><h2><?php echo $_SESSION[arrayObject][1] . '|' . $_SESSION[arrayObject][2]; ?></h2></div>
       </br>
	   <div class="announcements-container">
        
        <h1><i class="fa fa-file-excel-o" aria-hidden="true"></i><?php echo  $assignmentTitle ?> Submissions </h1>

<?php

$sql ="Select u.firstName,u.lastName, s.* from submission s INNER JOIN (
	SELECT userID,Max(submissionOrder) as maxSubmissionOrder FROM `submission` WHERE assignmentID='$assignmentID' group by userID) sdd
	on s.userID =sdd.userID and s.submissionOrder =sdd.maxSubmissionOrder INNER JOIN user u 
on s.userID =u.userID WHERE assignmentID='$assignmentID'
	";
	$result = $conn->query($sql);
	$r = mysqli_num_rows($result);
   if($r > 0){
   
    $Sno =1;
	        echo '<div class="prev-update" >';
			echo '<center>';
			echo '<fieldset>';
			echo '<h1 id="add-h1">List of Submissions:</h1>';
			echo '</br>';
			echo '<table>' . "\n";
			echo '<tr>' ;	
			echo '<td>' . "S. No" . '</td>'.'<td>' . "Assignment Title" . '</td>'.'<td>' . "First Name" . '</td>'.'<td>' . "Last Name" . '</td>' .'<td>' . "Submission Attempt" . '</td>' .'<td>' . "Points Earned" . '</td>' .'<td>' . "Plagiarised" . '</td>'.'<td>' . "Plagiarised From" . '</td>'  . "\n";
         
        	while ($row = $result->fetch_assoc()) {
            echo '<tr>' ;
            If($row['isCheated'] =='TRUE')
            {
				$isCheated ='YES';
				$points  = '0.0';
				
            }
            else
            {
				$isCheated ='NO';
				$points  = $row['grade'];
            }
            echo '<td>' . $Sno . '</td>' .'<td>' .  $assignmentTitle . '</td>'.'<td>' .  $row['firstName'] . '</td>'.'<td>' .  $row['lastName'] . '</td>'.'<td>' .  ($row['submissionOrder'] +1) . '</td>' .'<td>' .  $points . '</td>'.'<td>' .  $isCheated . '</td>' .'<td>' .  $row['cheatedFrom'] . '</td>' . "\n";			
			echo '</tr>' ;
            $Sno++;

     }
	 }
	 else
	 {
		 echo '<h1 id="add-h1">No Submissions Yet!!</h1>';
	 }
?>

     </table>  <br/>
 			 </fieldset>
</center>
</div>
 <br/>
			 </div></div><?php echo "Go <a href='../excel/'>back</a>."; ?>
			 </div>
			 </div>
</body>
</html>
