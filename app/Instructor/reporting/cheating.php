<?php include '../../config.php'; ?>
<?php
$belowRoot = true;
$isLoggedIn = true;
$isTeacher = false;
$isStudent = true;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown
include '../../header.php';
?>
<html><head><style>
.ta1
{

padding:5px;

border-collapse:collapse;

color:black;

text-align:center;

height:25px;

}

table {
    border-collapse: collapse;
    width: 20%;
}

th, td {
    text-align: left;
    padding: 4px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<vody>

  <a id='head-links' href='index.php'>back</a>
<form method='post' action='cheating_report.php'>
<input type='submit' name='export_excel' id='head-links' value='Download Report'>
</form>
  <h2> Following students are involved in cheating in corresponding assignment </h2>
<?php
$result= mysqli_query($conn,"select * from submission where ischeated='TRUE'");

if ($result->num_rows > 0) {
     // output data of each row
echo"<table align='center'>";
echo"<tr><td class='ta1'><b> Assignment ID </b></td> <td class='ta1'><b> Student ID</b> </td> <td class='ta1'><b> Cheated From</b> </td>";
     while($row = $result->fetch_assoc()) {

         echo  "<tr><td class='ta1'> ". $row["assignmentID"]. " </td><td class='ta1'> ". $row["userID"]. "</td><td class='ta1'> " . $row["cheatedFrom"] . "</td></tr>";
     }
		 echo"</table>";
	 }
	 else {
	echo "<table align='center' border='1'><tr><td> Error</td></tr></table>";
  echo mysqli_error($conn);
}
?>
<?php
include '../../footer.php';

?>
