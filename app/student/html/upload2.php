<?php
include('../../config.php');
?>

<?php
  $fileExistsFlag = 0;
	$file = $_FILES['Filename']['name'];
	$fileName = $_FILES['Filename']['name'];

	if($fileExistsFlag == 0) {
		$target = "files/";
		$fileTarget = $target.$fileName;
		$tempFileName = $_FILES["Filename"]["tmp_name"];
		$result = move_uploaded_file($tempFileName,$fileTarget);
		/*
		*	If file was successfully uploaded in the destination folder
		*/
		if($result) {
      $abc = "Your file ".$fileName." has been successfully uploaded";
     echo "<script type='text/javascript'>alert('$abc');window.open('index.php','_self',false);</script>";
    //  echo "Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded";
			$query = "INSERT INTO html_assignment(assignment_file) VALUES ('$file')";
			$link->query($query) or die("Error : ".mysqli_error($link));
		}
		else {
      $emfe = "Sorry !!! There was an error in uploading your file";
			 echo "<script type='text/javascript'>alert('$emfe');window.open('index.php','_self',false);</script>";
		}
		mysqli_close($link);
	}
	/*
	* 	If file is already present in the destination folder
	*/
	else {
		echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
		mysqli_close($link);
	}
?>
