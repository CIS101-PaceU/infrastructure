<?php

$activePage = 'excel';
$isInstructor = true;
$thisPage="Post Excel Assignment";
include('../../session.php');
include('../../config.php');
include('../../header.php');
include('../../mobile-nav.php');
include ('readExcel.php');
$userID =$_SESSION['login_userID'];
$assignTitle =$_POST['assignmentTitle'];
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
max-height: 600px; overflow: auto;
border: 1px solid #01508d;
margin-left: 30%;
max-width :600px;
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
	?>

<div class="main-content">
<div class="dashboard-container">
  <div class="section-heading"><h2><?php echo $_SESSION[arrayObject][1] . '|' . $_SESSION[arrayObject][2]; ?></h2></div>
       </br>
	   <div class="announcements-container">
    
    <h1><i class="fa fa-file-excel-o" aria-hidden="true"></i><?php echo ' '.  $assignTitle . " Submitted Succeffully"?></h1>

<?php
	$userID =$_SESSION['login_userID'];
	$CRN = $_SESSION['crnSes'];
	date_default_timezone_set("America/New_York");	
	$currentDateTime = date("Y-m-d h:i:sa");
	$currentDate = date("Y-m-d");
	
				$fileName =$_FILES['excelFile']["name"];
				$filePath = $_FILES['excelFile']['tmp_name'];
				$subfileName = $_FILES['submittedFile']["name"];
				$subfilePath = $_FILES['submittedFile']['tmp_name'];
				
				$keyCell ='C100';
				$keyFileExt = pathinfo($fileName, PATHINFO_EXTENSION);
				$promptFileExt = pathinfo($subfileName, PATHINFO_EXTENSION);
		
				$result = mysqli_query($conn, "SELECT * FROM `course_schedule` WHERE CRN='$CRN' ");
				while ($row = $result->fetch_assoc()) {
										$courseID=  $row['courseID'];
										}               
                    		


	$sql ="insert into assignment (courseID,assignmentTitle,assignmentDescription,assignmentInstructor,dueDate,availableDate,endAvailableDate,gradeAttempt,assignmentType)
	values ('$courseID','$assignTitle','$assignTitle','$userID', '".$_POST["dueDate"]."','".$_POST["postedDate"]."','".$_POST["endDate"]."','NA','Excel')";
	
 	if($conn->query($sql) === TRUE)
	{
		$result = $conn->query("SELECT assignmentID FROM assignment where assignmentTitle = '$assignTitle'");
	    						while ($row = $result->fetch_assoc()) {
	    							$assignmentID=  $row['assignmentID'];
									}
		$keyfileData = mysqli_real_escape_string($conn,file_get_contents($_FILES["excelFile"]["tmp_name"]));
		
		$promptfileData = mysqli_real_escape_string($conn,file_get_contents($_FILES["submittedFile"]["tmp_name"]));
		$prmptfileType = mysqli_real_escape_string($conn,$_FILES["submittedFile"]["type"]);
		$promptfileSize = mysqli_real_escape_string($conn,$_FILES['submittedFile']['size']);
		$keydata =array();
		$keydata =readExcel($filePath);
		$promptData =array();
		$promptData=readExcel($subfilePath);
		$rootPath = dirname(__FILE__);
		$target_file = $rootPath . "/" . basename($_FILES["submittedFile"]["name"]);
		move_uploaded_file($_FILES["submittedFile"]["tmp_name"], $target_file);
		
			$query ="insert into excel_assignment(assignmentID,promptFile,keyFile,userVariableCell,acceptableExt,promptFileType,promptFileSize,promptFilePath) values ('$assignmentID','$promptfileData','$keyfileData','$keyCell', '.xlsx','" . mysqli_real_escape_string($conn,$_FILES["submittedFile"]["type"]) . "','$promptfileSize','" . mysqli_real_escape_string($conn,$target_file) . "')";

			if($conn->query($query) === TRUE)
	{
	
	$r1 =count($keydata);
			$d= 0;$c = 0;$diffCount =0;
			$diffData =array();	
			echo '<div class="prev-update" >';
			echo '<center>';
			echo '<fieldset>';
			echo '<h1 id="add-h1">Differences Saved  :</h1>';
			echo '</br>';
			echo '<table>' . "\n";
			echo '<tr>' ;	
			echo '<td>' . "S. No" . '</td>' .'<td>' . "Cell" . '</td>' .'<td>' . "Value" . '</td>' .'<td>' . "Formula" . '</td>'  . "\n";
			for ( $i = 0; $i < $r1; $i++)
			{	
				$c1 =count($keydata[$i]);


				$d =0;
				for ( $j= 0; $j< $c1; $j++)
				{	
					if(isset($keydata[$i][$j]))
					{
						if($keydata[$i][$j] != '')
						{
							if( $keydata[$i][$j] == $promptData[$i][$j])
							{
									
							}
							else
							{
								echo '<tr>' ;	
								$diffData[$c][$d] = [
								'Value' => $keydata[$i][$j]['Value'],
								'Index' => $keydata[$i][$j]['Index'],
								'CalculateValue' => $keydata[$i][$j]['CalculateValue']
								];
								$query = "insert into excel_difference(assignmentID,Cell,KeyFormula,Status,PotentialPoints,Type,Value) values('$assignmentID','{$diffData[$c][$d]['Index']}','{$diffData[$c][$d]['Value']}','A',0.2,'.xlsx','{$diffData[$c][$d]['CalculateValue']}')";
								$conn->query($query);
								echo '<td>' . ($diffCount+1) . '</td>' .'<td>' . $diffData[$c][$d]['Index'] . '</td>' .'<td>' . $diffData[$c][$d]['CalculateValue'] . '</td>'.'<td>' . $diffData[$c][$d]['Value'] . '</td>'  . "\n";			
								$d++;$diffCount++;
							}
						}	
					}
					
				}
				echo '</tr>' ;
				$c++;
			}
			?>
			
 </table>  <br/>
 			 </fieldset>
			 </center>
			 </div>
			 </div>
			 <br/>
			 </div>
			 <?php echo "Your assignment was uploaded successfully. Go <a href='../excel/'>back</a>."; ?>
			 </div></div>
</body>
</html>
<?php
			$message = "Total of " . $diffCount . " differences saved in database" ;
			//echo "<script type='text/javascript'>alert('$message');</script>";
				}
	
	else {
	    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
	}
	}								
	else {
	    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
	}

	$conn->close();
	
	
	?>