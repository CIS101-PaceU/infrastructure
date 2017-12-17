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
<html>
<style>
.topright {
  position: fixed;
   top: 40%;
   right: 0;
   width: 300px;
   border: 3px solid #73AD21;
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

<!--<a id='head-links' href='bargraph.php'>Graph</a>-->

<?php

$a = (int)$_POST['a'];
//  echo "$a";
echo "<a id='head-links' href='assignments.php'>back</a>";
echo "<form method='post' action='assignment_report.php'>";
echo "<input type='hidden' name='a' value='$a'>";
echo "<input type='submit' name='export_excel' id='head-links' value='Download Report'>";
echo "</form>";
/*echo "<form action='bardata1.php' method='post'>";
echo "<input type='hidden' name='a' value='$a'>";
echo "<input  id='head-links' type='submit' value='Graph'>";
echo "</form>";*/
$result= mysqli_query($conn,"select * from assignment where assignmentID='$a'");


if ($result->num_rows > 0) {
    // output data of each row
     while($row = $result->fetch_assoc()) {
       echo "<table class='topright'>";
      echo  "<tr><td class='ta1'> Assignment ID:</td><td class='ta1'> ". $row["assignmentID"]. " </td></tr>";
      echo "<tr><td class='ta1'> Assignment Title: </td><td class='ta1'>". $row["assignmentTitle"]. "</td></tr>";
      echo "<td class='ta1'> Available date:</td><td class='ta1'> " . $row["availableDate"] . "</td></tr>";
      echo "<td class='ta1'> Due date:</td><td class='ta1'> " . $row["dueDate"] . "</td></tr>";
      echo"</table>";
    }
 }
 else {
echo "<table align='center' border='1'><tr><td> Error</td></tr></table>";
echo mysqli_error($conn);
}
 $result1= mysqli_query($conn,"select * from assignment_grade where assignmentID='$a' ORDER BY grade ASC");
 if ($result1->num_rows > 0) {
 echo"<table align='center'>";
echo  "<tr><td class='ta1'> Student ID</td><td class='ta1'> Grade </td></tr>";
while($row = $result1->fetch_assoc()) {
  echo  "<tr><td class='ta1'>" .$row["userID"]. "</td><td class='ta1'> ". $row["grade"]. " </td></tr>";
}
 echo "</table>";
 }
 else {
echo "<table align='center' border='1'><tr><td> Error</td></tr></table>";
echo mysqli_error($conn);
}

?>
<?php
include '../../footer.php';

?>
