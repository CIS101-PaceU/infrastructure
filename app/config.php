<?php

//Configures database
 $servername = "phpmyadmin.cw74xrxhh0s2.us-east-1.rds.amazonaws.com";

$username = "phpmyadmin";

$password = "CIS101portal-db";

$dbname = "portal-db";

$port = 3306;

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname,$port);

//$link = new MySQLi('localhost', 'root','','Red-Velvet'); //is this outdated?

if (!$conn) {
    echo "Error: Cannot connect to database." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//configuration for discussion board:


//mysqli_close($link);

?>