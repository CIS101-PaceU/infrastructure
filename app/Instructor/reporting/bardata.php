<?php include '../../config.php'; ?>
<?php
header('Content-Type: application/json');

//query to get data from the table

//execute query
$result= mysqli_query($conn,"SELECT userID,present_classes FROM attendance");

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
?>
