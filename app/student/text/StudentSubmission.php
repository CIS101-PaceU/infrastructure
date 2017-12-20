<?php 

$activePage = 'text';
$isStudent = true;

?>

<!DOCTYPE html>
<html>
<head>
 <title>Student Submission</title>
 <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

 <?php 
 include('../../header.php');
 include('../../mobile-nav.php');
?>



<div class="main-page">
 
    <?php 
      include("../../navigation.php");
     ?>
   
   <div class="main-content">
<?php

$wordCount = str_word_count($_POST['assText']);
$subDate = (new \DateTime())->format('Y-m-d H:i:s');



$sql="INSERT into text_submission (assId,studId,subDate,assText,wordCount)
VALUES
('".$_POST["assId"]."','".$_POST["studId"]."','". $subDate ."','".$_POST["assText"]."','". $wordCount ."')";


if($conn->query($sql) === TRUE)
{
echo "Your post was submitted. Go <a href='index.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
echo $conn;
}

$conn->close();


?>


</div>

</div>

</body>
</html>