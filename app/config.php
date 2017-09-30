<?php

//Configures database
  $servername = "localhost";
  $username = "portal";
  $password = "";
  $dbname = "portal-db";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Error: Cannot connect to database." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//configuration for discussion board:


//mysqli_close($link);

?>