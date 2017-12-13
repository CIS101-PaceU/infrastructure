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
<vody>

  <a id='head-links' href='index.php'>back</a>
  <h2> Select the Assignment </h2>
<?php
$result= mysqli_query($conn,"select * from assignment");
echo "<table>";
if ($result->num_rows > 0) {
    // $i = 0;
    // output data of each row
    echo "<tr><th class='ta1'>";
      echo '<form method="post" action="assignResult.php">';
      echo "Assignment ID: </th><td class='ta1'>";
      echo '<select name="a">';
     while($row = $result->fetch_assoc()) {
      echo "<option value='{$row['assignmentID']}'>{$row['assignmentID']}</option>";
    //   $a[$i] = $row['assignmentID'];
    //  echo "$i";
      // echo '<input type="hidden" name="a" value="'.$row['assignmentID'].'" />';
       //echo '<input id="head-links" type="submit" value="Assignment ID: '.$row['assignmentID'].'"/>';
          //echo  "<tr><td class='ta1'><a id='head-links' href='assignResult.php $_POST $a[$i]'> Assignment $i </td></tr>";
  //  $i++;
     }
     echo "</td><td class='ta1'>";
     echo "<input type='submit' value='View Grades' >";
     echo "</form>";
     echo "</td></tr>";
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
