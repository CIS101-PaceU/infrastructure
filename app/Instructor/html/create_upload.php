<?php
$servername = "phpmyadmin.cw74xrxhh0s2.us-east-1.rds.amazonaws.com";
$username = "phpmyadmin";
$password = "CIS101portal-db";
$dbname = "portal-db";

$fileExistsFlag = 0;
//$target = "html";
$assignName = $_FILES['aname']['name'];
$date = $_FILES['datedue']['name'];
$desc = $_FILES['desc']['name'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO html_assignment (assignmentID, assignmentTitle, dueDate, assignmentDesc)
            VALUES ('HTML 2','To create a web page','2017/12/21','lorem ipsum');";
            if (mysqli_query($conn, $sql)) {
              $abc = "Your assignment has been successfully uploaded";
              echo "<script type='text/javascript'>alert('$abc');window.open('index.php','_self',false);</script>";
           } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
     mysqli_close($conn);
?>
