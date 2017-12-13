<?php

<html>
    
    <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
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
<div class="main-container">
<center>

<?php
$assignmentID=$_GET['assignmentID'];
$result = $conn->query("SELECT assignmentTitle FROM assignment where assignmentID = '$assignmentID'");
	    						while ($row = $result->fetch_assoc()) {
	    							$assignmentTitle=  $row['assignmentTitle'];
									}
$sql ="SELECT DISTINCT(userID),assignmentID,Max(submissionOrder),gradesEarned,isCheated FROM `submissionsdata` WHERE assignmentID='$assignmentID' GROUP BY userID";
	$result = $conn->query("SELECT DISTINCT(userID),assignmentID,Max(submissionOrder),gradesEarned,isCheated FROM `submissionsdata` WHERE assignmentID='$assignmentID' GROUP BY userID");
	$r = mysqli_num_rows($result);
   if($r > 0){
   
    $Sno =1;
	        echo '<div class="prev-update" >';
			echo '<center>';
			echo '<fieldset>';
			echo '<h1 id="add-h1">Submissions:</h1>';
			echo '</br>';
			echo '<table>' . "\n";
			echo '<tr>' ;	
			echo '<td>' . "S. No" . '</td>'.'<td>' . "Assignment Title" . '</td>' .'<td>' . "Submission Attempt" . '</td>' .'<td>' . "Points Earned" . '</td>' .'<td>' . "Cheated" . '</td>'  . "\n";
         
        	while ($row = $result->fetch_assoc()) {
            echo '<tr>' ;
            If($row['isCheated'] =='TRUE')
            {
                $isCheated ='YES';
            }
            else
            {
                $isCheated ='NO';
            }
            echo '<td>' . $Sno . '</td>' .'<td>' .  $assignmentTitle . '</td>'.'<td>' .  ($row['Max(submissionOrder)'] +1) . '</td>' .'<td>' .  $row['gradesEarned'] . '</td>'.'<td>' .  $isCheated . '</td>'  . "\n";			
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
			 </center>
			 </div>
</body>
</html>
<?php
include '../../footer.php';
	
	?>