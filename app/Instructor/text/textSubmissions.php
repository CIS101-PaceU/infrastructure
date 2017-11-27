<?php

//logic for login

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;

$isStudent = false;
$displayClass = true;

$showNav = true;

$thisPage = "SubmissionListing";
include('../../header.php');
include('../../config.php');
?>

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
    $latestPostSQL ="SELECT t1.assId,t1.studId,t1.subDate,t2.grade,t1.assText,t1.subId from text_submission t1 LEFT JOIN text_grades t2 on t1.subId=t2.subId where t1.assId=".$assignId;
    //SELECT * from text_submission t1 LEFT JOIN text_grades t2 on t1.subId=t2.subId where t1.assId=1      
    //SELECT * from text_submission where assId=".$assignId  
    $result = $conn->query($latestPostSQL);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<div class='prev-update'><h2>" . $row["studId"] . "</h2>" . "<span class='bold-text'>Submission Date: " . $row["subDate"] . "</span><br>Text Submission: " . $row["assText"];
    if($row["grade"]==null){
    echo "<br><a href='textSubmissions.php'>Grade</a><form action='gradingProcess.php'>
    <input list='grades' name='grade'>
    <datalist id='grades'>
      <option value='A+'>
      <option value='A'>
      <option value='A-'>   
      <option value='B+'>
      <option value='B'>
      <option value='B-'>
      <option value='C+'>
      <option value='C'>
      <option value='C-'>
      <option value='D+'>
      <option value='D'>
      <option value='D-'>
      <option value='F'>
    </datalist>
    <input type='text' name='subId' value='" . $row['subId'] ."' style='display: none;'>
    <input type='text' name='studId' value='" . $row['studId'] ."' style='display: none;'>
    <input type='text' name='assId' value='" . $assignId ."' style='display: none;'>
    <button type='submit'>Add</button>
  </form>";} else {
      echo "<br><a href='textSubmissionsEdit.php'>Grade</a><form action='gradingEditProcess.php'>
      <input list='grades' name='grade' value='". $row['grade'] ."'>
      <datalist id='grades'>
        <option value='A+'>
        <option value='A'>
        <option value='A-'>   
        <option value='B+'>
        <option value='B'>
        <option value='B-'>
        <option value='C+'>
        <option value='C'>
        <option value='C-'>
        <option value='D+'>
        <option value='D'>
        <option value='D-'>
        <option value='F'>
      </datalist>
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

<?php
include '../../footer.php';
?>