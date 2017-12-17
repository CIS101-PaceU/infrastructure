
<?php 

$activePage = 'text';
$isInstructor = true;

?>

<!DOCTYPE html>
<html>
<head>
 <title>Submissions</title>
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
    <div class="main-container">
    <center>
    <div class="all-updates">
    <?php 
    $assignId = $_GET["assId"];
    echo "<h2>Student Submissions for Assignment ". $assignId ." </h2>";
    ?>
    
    <?php 
    //$conn = new mysqli("localhost","root","", "Red-Velvet");
    $assignId = $_GET["assId"];
                        if(!$conn) {echo "error";}                    
    $latestPostSQL ="SELECT t1.assId,t1.studId,t1.subDate,t2.grade,t1.assText,t1.subId,t2.remark,t2.notes from text_submission t1 LEFT JOIN text_grades t2 on t1.subId=t2.subId where t1.assId=".$assignId;
    //SELECT * from text_submission t1 LEFT JOIN text_grades t2 on t1.subId=t2.subId where t1.assId=1      
    //SELECT * from text_submission where assId=".$assignId  
    $result = $conn->query($latestPostSQL);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<div class='current-update' style='text-align: left;'><h2>" . $row["studId"] . "</h2>" . "<span class='bold-text'>Submission Date: " . $row["subDate"] . "</span><br>Text Submission: " . $row["assText"];
    if($row["grade"]==null){
    echo "</br><label for='grades'>Grade:</label><form action='gradingProcess.php'>
    <input list='grades' style='font-size: 150%;' name='grade'>
    </br></br><label for='remark'>Remark for student:</label>
    <br><input type='text' name='remark'>
    <br><label for='notes'>Notes:</label>
    <br><input type='text' name='notes' value='". $row['notes'] ."'>
    <input type='text' name='subId' value='" . $row['subId'] ."' style='display: none;'>
    <input type='text' name='studId' value='" . $row['studId'] ."' style='display: none;'>
    <input type='text' name='assId' value='" . $assignId ."' style='display: none;'>
    <button type='submit'>Add</button>
  </form>";} else {
      echo "</br><label for='grades'>Grade Assigned:</label><form action='gradingEditProcess.php'>
      <input list='grades' style='font-size: 150%;' name='grade' value='". $row['grade'] ."'>
      <br><label for='remark'>Remark for student:</label>
      <br><input type='text' name='remark' value='". $row['remark'] ."'>
      <br><label for='notes'>Notes:</label>
      <br><input type='text' name='notes'  value='". $row['notes'] ."'>
      <input type='text' name='subId' value='" . $row['subId'] ."' style='display: none;'>
      <input type='text' name='studId' value='" . $row['studId'] ."' style='display: none;'>
      <input type='text' name='assId' value='" . $assignId ."' style='display: none;'>
      <button type='submit'>Edit</button>
    </form>";
  }
  echo "</div>";
        }
    } else {
    echo "";
        }
    ?>
    </div>
    </center>
    </div>


    </div>

</div>

</body>
</html>