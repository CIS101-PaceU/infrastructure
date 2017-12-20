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

         echo  "<tr><td class='ta1'> ". $row["userID"]. " </td><td class='ta1'> ". $row["present_classes"]. "</td><td class='ta1'> " . $row["present_classes"]*10 . "</td></tr>";
     }
		 echo"</table>";
	 }
	 else {
	echo "<table align='center' border='1'><tr><td> Error</td></tr></table>";
  echo mysqli_error($conn);
}
?>
</div>
