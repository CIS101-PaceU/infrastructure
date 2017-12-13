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
</style>
</head>
<body>
  <!--<a id='head-links' href='bargraph.php'>Graph</a>-->
  <a id='head-links' href='index.php'>back</a>
<form method='post' action='attendance_report.php'>
<input type='submit' name='export_excel' id='head-links' value='Download Report'>

</form>
<?php
$result= mysqli_query($conn,"select * from attendance order by present_classes ASC");

if ($result->num_rows > 0) {
     // output data of each row
echo"<table align='center'>";
echo"<tr><td class='ta1'><b> Student ID </b></td> <td class='ta1'><b> Present Classes</b> </td>";
echo" <td class='ta1'><b> Marks </b></td></tr> ";
     while($row = $result->fetch_assoc()) {

         echo  "<tr><td class='ta1'> ". $row["userID"]. " </td><td class='ta1'> ". $row["present_classes"]. "</td><td class='ta1'> " . $row["grades"] . "</td></tr>";
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
