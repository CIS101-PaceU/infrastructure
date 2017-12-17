<?php
  $servername = "phpmyadmin.cw74xrxhh0s2.us-east-1.rds.amazonaws.com";
  $username = "phpmyadmin";
  $password = "CIS101portal-db";
  $dbname = "portal-db";
  $port = 3306;

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname, $port);

  // Check connection
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  } 

  $query = "SELECT * FROM events";
  mysqli_query($conn, $query) or die(' error querrring the datbase');

  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
?>