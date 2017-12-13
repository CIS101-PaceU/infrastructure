	<?php

	$thisPage="Post Excel Assignment";
	include ('readExcel.php');
	
	include '../../header.php';
	include('../../config.php');
	//include('../../session.php');
	?>

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
	$userID =$_SESSION['login_userID'];
	
	date_default_timezone_set("America/New_York");	
	$currentDateTime = date("Y-m-d h:i:sa");
	$currentDate = date("Y-m-d");
	$assignTitle =$_POST['assignmentTitle'];
				$fileName =$_FILES['excelFile']["name"];
				$filePath = $_FILES['excelFile']['tmp_name'];
				$subfileName = $_FILES['submittedFile']["name"];
				$subfilePath = $_FILES['submittedFile']['tmp_name'];
				
				$keyCell ='C100';
				$keyFileExt = pathinfo($fileName, PATHINFO_EXTENSION);
				$promptFileExt = pathinfo($subfileName, PATHINFO_EXTENSION);
		
	$query =("SELECT assignmentID FROM assignment where assignmentTitle = '$assignTitle'");
	    						$result = $conn->query($query);
                    
                    if ($result->num_rows > 0) {
					}		


	$sql ="insert into assignment (courseID,assignmentTitle,assignmentDescription,assignmentInstructor,possibleGrade,dueDate,availableDate,endAvailableDate,submissionNum,gradeAttempt,assignmentType)
	values ('CS101','$assignTitle','$assignTitle','$userID','A', '".$_POST["dueDate"]."','".$_POST["postedDate"]."','".$_POST["endDate"]."','0','NA','Excel')";
	
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
		
			$query ="insert into excelassignments(assignmentID,promptFile,keyFile,userVariableCell,acceptableExt,promptFileType,promptFileSize,promptFilePath) values ('$assignmentID','$promptfileData','$keyfileData','$keyCell', '.xlsx','" . mysqli_real_escape_string($conn,$_FILES["submittedFile"]["type"]) . "','$promptfileSize','" . mysqli_real_escape_string($conn,$target_file) . "')";

			if($conn->query($query) === TRUE)
	{
	
	$r1 =count($keydata);
			$d= 0;$c = 0;$diffCount =0;
			$diffData =array();	
			echo '<div class="prev-update" >';
			echo '<center>';
			echo '<fieldset>';
			echo '<h1 id="add-h1">Differnce found :</h1>';
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
								$query = "insert into differences(assignmentID,Cell,KeyFormula,Status,PotentialPoints,Type,Value) values('$assignmentID','{$diffData[$c][$d]['Index']}','{$diffData[$c][$d]['Value']}','A',0.2,'.xlsx','{$diffData[$c][$d]['CalculateValue']}')";
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
			 <br/>
			 </center>
			 </div>
</body>
</html>
<?php
			$message = "Total of " . $diffCount . " differences saved in database" ;
			echo "<script type='text/javascript'>alert('$message');</script>";
				}
	
	else {
	    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
	}
	}								
	else {
	    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
	}

	$conn->close();
	include '../../footer.php';
	
	?>