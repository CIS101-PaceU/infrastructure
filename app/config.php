<?php

//Configures database
$link = myqli_connect("localhost", "root", "", "Red-Velvet");

//$link = new MySQLi('localhost', 'root','','Red-Velvet'); //is this outdated?

if (!$link) {
    echo "Error: Cannot connect to database." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//mysqli_close($link);

?>