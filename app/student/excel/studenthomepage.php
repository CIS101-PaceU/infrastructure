	<?php
	$thisPage = "Excel Ass Submission";

	include('../../header.php');
	include('../../mobile-nav.php');
	
	?>
	<?php
	include 'PHPExcel.php';            // External plugin..
	?>

	<!DOCTYPE html>
	<head>
	<title>
	Welcome Page
	</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	</head>

	<body>
	<div class="main-page">
	<?php
	include('../../navigation.php');	
	$assignmentID =$_GET['assignmentID'];
	$result = $conn->query("SELECT * FROM assignment where assignmentID = '$assignmentID'");
	
			  if ($result->num_rows > 0) {
				  while($row = $result->fetch_assoc()) {
					  $assignmentTitle =$row["assignmentTitle"];
					}
			  }
	?>
	<div class="main-content">
	
		<div class="dashboard-container">
				<h1 id="add-h1">Submit Assignment</h1>
				
				<div class='create-controls'>
					<form action="" method="post" class="myClass" enctype="multipart/form-data">
		<fieldset>
		<label>Assignment Title:</label> 
		<?php echo $assignmentTitle; ?> </br>
		<label>Download Prompt File:</label> 
		<a href='download.php?assignmentID=<?php echo $_GET['assignmentID']; ?>' class="active">Click Here</a>
		<br/>
		<label>Submit Assignment : </label> 
		<input type="file" 	 name="excelFile" /><br/>
		<input type="submit" name="btnImport" id="btn" value="Submit"/></br>
		</fieldset>
		
		<?php	
		date_default_timezone_set("America/New_York");
		$currentDateTime = date("Y-m-d h:i:sa");
		$currentDate = date("Y-m-d");
		$userID =$_SESSION['login_userID'];
		if(isset($_POST['btnImport']))
		{
				$assignmentID =$_GET['assignmentID'];
				$fileName = $_FILES["excelFile"]["name"];
				$filePath = $_FILES["excelFile"]["tmp_name"];
				$userid= $_SESSION["login_userID"];
			$result = mysqli_query($conn, "SELECT lastDownload FROM excel_promptFileInfo where assignmentID = '$assignmentID' and userID='$userid'");
			$r = mysqli_num_rows($result);
			if($r > 0){
			
			$result = mysqli_query($conn, "SELECT * FROM excel_difference where assignmentID = '$assignmentID'");
			
			$keyData = array(); $p =0;
			foreach($result as $row)
			{	
				$keyData[$p] = [
						'Value' => $row["keyFormula"],
						'Index' => $row["cell"],
						'CalculateValue' => $row["value"]
						];
				$p++;		
			}
			$subFileExt = pathinfo($fileName, PATHINFO_EXTENSION);
			if($subFileExt !='xlsx')
				{
					$message = "Please select xlsx format file" ;
			echo "<script type='text/javascript'>alert('$message');</script>";
			
				}
			else{	
			$fileData = mysqli_real_escape_string($conn,file_get_contents($_FILES["excelFile"]["tmp_name"]));
			$submissionOrder =0;
			$result = mysqli_query($conn, "SELECT Max(submissionOrder) FROM `submission` WHERE assignmentID='$assignmentID' and userID ='$userID' ");
			while ($row = $result->fetch_assoc()) {
				if($row['Max(submissionOrder)'] != null){
									$submissionOrder=  $row['Max(submissionOrder)'];
									if($submissionOrder>=0){
										$submissionOrder = $submissionOrder+1;	
									}
									}
							} 
			$result = mysqli_query($conn, "SELECT * FROM `excel_assignment` WHERE assignmentID='$assignmentID' ");
			while ($row = $result->fetch_assoc()) {
									$userVariableCell=  $row['userVariableCell'];
									}
			$result = mysqli_query($conn, "SELECT * FROM `excel_promptFileInfo` WHERE assignmentID='$assignmentID' and userID ='$userID' order by promptID desc limit 1");
			
			while ($row = $result->fetch_assoc()) {
									$uniqueVariable=  $row["uniqueVariable"];
									
									}						
			$query = "insert into submission(assignmentID,dateSubmitted,submittedFile,userID,submissionOrder,grade,submittedUserVariable,isCheated) values('$assignmentID','$currentDate','$fileData','$userID','$submissionOrder','NA','NA','NO')";
								if($conn->query($query) === TRUE)
		{
								
								$result = mysqli_query($conn, "SELECT MAX(submissionID) FROM submission where assignmentID = '$assignmentID'");
								while ($row = $result->fetch_assoc()) {
									$submissionID=  $row['MAX(submissionID)'];
									}
								
			$objPHPExcel = PHPExcel_IOFactory::load($filePath);
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$submittedData =array();  $x=0;$y=0;
			
			$userVariableSubmitted =$objPHPExcel->getActiveSheet()->getCell($userVariableCell)->getValue();
			foreach($objPHPExcel->getWorksheetIterator() as $worksheet)
			{
				
				foreach ($objWorksheet->getRowIterator() as $row) {
						
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false); // This loops all cells, even if it is not set. By default, only cells that are set will be iterated.
				$y=0;
				foreach ($cellIterator as $cell) {
				$submittedData[$x][$y] = [
						'Value' => $cell->getValue(),
						'Index' => $cell->getCoordinate(),
						'CalculateValue' => $cell->getCalculatedValue()
						];
				//echo '<td>' . $submittedData[$x][$y]['Value'] . '</td>' .'<td>' . $submittedData[$x][$y]['CalculateValue'] . '</td>' . "\n";
					$y++;
				}
				$x++;
				//echo '</tr>' . "\n";
				}
				//echo '</table>' . "\n";
			}	
			
			
			
			$r1 =count($submittedData);
			$d= 0;$c = 0;$diffCount =0; $earnPoints =0.0;$totalPoints =0;$sno=0;
			$diffFound =array();
			for ( $i = 0; $i < $r1; $i++)
			{	
				$c1 =count($submittedData[$i]);
				
				//$d =0;
				for ( $j= 0; $j< $c1; $j++)
				{
					for($k =0; $k < count($keyData) ;$k ++)
					{

						if($submittedData[$i][$j]['Index'] == $keyData[$k]['Index'])
						{
							$d++;
							if($submittedData[$i][$j]['Value'] != null && $keyData[$k]['Value']!= null)
							{

							if($submittedData[$i][$j]['Value'] == $keyData[$k]['Value'] && round($submittedData[$i][$j]['CalculateValue'],2) ==round($keyData[$k]['CalculateValue'],2) )
							{
								$earnPoints =0.2;
								$totalPoints =$totalPoints + $earnPoints;
								$query = "insert into excel_submissionDiff(submissionID,Cell,submittedFormula,submittedValue,pointsEarned) values('$submissionID','{$submittedData[$i][$j]['Index']}','{$submittedData[$i][$j]['Value']}','{$submittedData[$i][$j]['CalculateValue']}',0.2)";
								$query_run = mysqli_query($conn,$query);
							}
							else
							{
								$earnPoints =0.0;
								$query = "insert into excel_submissionDiff(submissionID,Cell,submittedFormula,submittedValue,pointsEarned) values('$submissionID','{$submittedData[$i][$j]['Index']}','{$submittedData[$i][$j]['Value']}','{$submittedData[$i][$j]['CalculateValue']}',0.0)";
								$query_run = mysqli_query($conn,$query);
							}
							}
						$sno++;	
						$diffFound[$i] = [
						'Key Value' => $keyData[$k]['Value'],
						'Index' => $submittedData[$i][$j]['Index'],
						'Key CalculateValue' => $keyData[$k]['CalculateValue'],
						'Submitted Value' => $submittedData[$i][$j]['Value'],
						'Submitted CalculateValue' => $submittedData[$i][$j]['CalculateValue']
						];
						}
					}
					
					
				}
				
			}
			$query = "update submission set submittedUserVariable = '$userVariableSubmitted' where submissionID = '$submissionID'"; 
			$query_run = mysqli_query($conn,$query);
			$result = mysqli_query($conn, "SELECT SUM(PotentialPoints) FROM `excel_difference` WHERE assignmentID ='$assignmentID'");
								while ($row = $result->fetch_assoc()) {
									$PotentialPoints=  $row['SUM(PotentialPoints)'];
									}
			$result = mysqli_query($conn, "SELECT SUM(pointsEarned) FROM excel_submissionDiff where submissionID = '$submissionID'");
								while ($row = $result->fetch_assoc()) {
									$pointsEarned=  $row['SUM(pointsEarned)'];
									}
			
				if($uniqueVariable !=$userVariableSubmitted){
					$isCheated ="TRUE";
					$pointsEarned =0;
					$result = mysqli_query($conn, "SELECT * FROM `excel_promptFileInfo` WHERE uniqueVariable ='$userVariableSubmitted'");
					while ($row = $result->fetch_assoc()) {
						$cheatedFrom  = $row['userID'];	
					}

				}
				else{
						$isCheated ="FALSE";
						$cheatedFrom  = '';	
					}
			
					
								
			$query = "update submission set grade = '$pointsEarned'  , isCheated ='$isCheated' , cheatedFrom ='$cheatedFrom' where submissionID = '$submissionID' "; 
			$query_run = mysqli_query($conn,$query);
								echo "<b>Potential Points/ Earned Points : $PotentialPoints / $pointsEarned   </b>" ;
			
			$message = "Total of " . $d . " differences verified and score is displayed" ;
			//echo "<script type='text/javascript'>alert('$message');</script>";
				}	
			
		}
		}else{
			 echo '<h4>You have not downloaded the prompt file.Please download the prompt file first.</h4>';
		}
		}
		?>
		
		</form> 
		
				</div>    
				<?php echo "Go <a href='../excel/'>back</a>.";?>    
		</div>

	</center>
	</div>
		
	</body>
	</html>

