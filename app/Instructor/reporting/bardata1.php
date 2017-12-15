
<?php
header('Content-Type: application/json');
$a = (int)$_POST['a'];

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'portal-db');
define('DB_PASSWORD', '');
define('DB_NAME', 'portal-db');
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, 3316);
if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT userID,grade FROM assignment_grade where assignmentID='$a' ");
//execute query
$result = $mysqli->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
//free memory associated with result
$result->close();
//close connection
$mysqli->close();
//now print the data
print json_encode($data);
//header("Location: http://localhost/Student/reporting/bargraph1.php");
?>
