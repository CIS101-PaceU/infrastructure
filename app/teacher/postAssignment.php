<?php

$belowRoot = true;
$isLoggedIn = true;
$showNav = true;
$displayClass =true;
$isTeacher = true;

$thisPage="Post Assignment";

include('../header.php');

//Configures database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Red-Velvet";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

//$link = new MySQLi('localhost', 'root','','Red-Velvet'); //is this outdated?

if (!$conn) {
    echo "Error: Cannot connect to database." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$sql="INSERT into Assignment (assignmentTitle, assignmentDescription,dueDate,availableDate,endAvailableDate)
VALUES
('".$_POST["assignmentTitle"]."','".$_POST["assnDesc"]."','".$_POST["dueDate"]."','".$_POST["postedDate"]."','".$_POST["endDate"]."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='assignments.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

include('../footer.php');
?>