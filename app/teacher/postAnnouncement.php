<?php

$belowRoot = true;
$isLoggedIn = true;
$showNav = true;
$displayClass =true;
$isTeacher = true;

$thisPage="Post Announcement";

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


$sql="INSERT into Announcements (announcementTitle, message, datePosted)
VALUES
('".$_POST["announcementTitle"]."','".$_POST["message"]."','".$_POST["annDate"]."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='announcements.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

include('../footer.php');
?>