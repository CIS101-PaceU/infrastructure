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

    <!-- GENERATE DIVS BASED ON SUBMISSION TABLE 
    <div class="prev-update">
    <h2>Student Name</h2>
        <p>Student notes if they have added them.</p>
        <p><a href="">AssignmentFile.xlxs</a></p>
        
        <div class="auto-grade">
            automated grades pulled from grading tool
        </div>  
    </div>
    
        <div class="prev-update">
    <h2>Student Name</h2>
        <p>Student notes if they have added them.</p>
        <p><a href="">AssignmentFile.xlxs</a></p>
        
        <div class="auto-grade">
            automated grades pulled from grading tool
        </div>  
    </div> -->
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
    $latestPostSQL ="SELECT * from text_submission where assId=".$assignId;
                    
    $result = $conn->query($latestPostSQL);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<div class='prev-update'><h2>" . $row["studId"] . "</h2>" . "<span class='bold-text'>Submission Date: " . $row["subDate"] . "</span><br>Text Submission: " . $row["assText"] . "<br><a href='textSubmissions.php'>Grade</a><form action='/action_page.php'>
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
    <input type='submit'>
  </form></div>";
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