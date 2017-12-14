<?php include '../../config.php'; ?>
<?php

 $activePage = 'reporting';
 $isInstructor = true;

?>

<!DOCTYPE html>
<html>
<head>
  <title>instructor -- reporting</title>
  <style>
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

<link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
include('../../header.php');
include('../../mobile-nav.php');
?>


<div class="main-page">

   <?php
     include("../../navigation.php");
    ?>


<div class="main-content">

  <a id='head-links' href='index.php'>back</a>
<form method='post' action='time_report.php'>
<input type='submit' name='export_excel' id='head-links' value='Download Report'>

</form>
  <h2> Time spent by students on web-site </h2>
<?php
$result= mysqli_query($conn,"select user, SUM(activity) DIV 60 AS 'time' from sessions GROUP BY user ORDER BY time");

if ($result->num_rows > 0) {
     // output data of each row
echo"<table align='center'>";
echo"<tr><td class='ta1'><b> Student ID </b></td> <td class='ta1'><b> Time(in min) </b> </td>";
     while($row = $result->fetch_assoc()) {

         echo  "<tr><td class='ta1'> ". $row["user"]. "</td><td class='ta1'> " . $row["time"] . "</td></tr>";
     }
		 echo"</table>";
	 }
	 else {
	echo "<table align='center' border='1'><tr><td> Error</td></tr></table>";
  echo mysqli_error($conn);
}
?>
</div>
