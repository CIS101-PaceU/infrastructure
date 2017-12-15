<?php

//Configures database
  $servername = "localhost";
  $username = "portal";
  $password = "";
  $dbname = "portal-db";
  $port = 3316;

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname, $port);

if (!$conn) {
    echo "Error: Cannot connect to database." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>
