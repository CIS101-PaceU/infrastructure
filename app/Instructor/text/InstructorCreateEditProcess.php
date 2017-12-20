
<?php 

$activePage = 'text';
$isInstructor = true;

?>

<!DOCTYPE html>
<html>
<head>
 <title>New Assignment Created</title>
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
$belowRoot = true;
$isLoggedIn = true;
$showNav = true;
$displayClass =true;
$isTeacher = true;

$thisPage="Post Text Assignment";

$sql="INSERT into text_assignment (assName,Instructions,dueDate)
VALUES
('".$_POST["assName"]."','".$_POST["Instructions"]."','".$_POST["dueDate"]."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='index.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

?>

</div>

</div>

</body>
</html>