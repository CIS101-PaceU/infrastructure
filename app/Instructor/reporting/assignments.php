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
  <h2> Select the Assignment </h2>
<?php
$result= mysqli_query($conn,"select * from assignment");
echo "<table>";
if ($result->num_rows > 0) {
    // $i = 0;
    // output data of each row
    echo "<tr><th class='ta1'>";
      echo '<form method="post" action="assignResult.php">';
      echo "Assignment : </th><td class='ta1'>";
      echo '<select name="a">';
     while($row = $result->fetch_assoc()) {
      echo "<option value='{$row['assignmentID']}'>{$row['assignmentType']}</option>";
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
</div>
