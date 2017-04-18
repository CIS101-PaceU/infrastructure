<?php

//logic for login

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;

$isStudent = false;
$displayClass = true;

$showNav = true;

$thisPage = "Grades";

include '../header.php';
?>

<html>
<head>
<title>Student Submissions for xxxx assignment</title>
</head>
    
<body>
    
    <h2>Student Submissions for xxxx assignment</h2>
    <!-- GENERATE DIVS BASED ON SUBMISSION TABLE -->
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
    </div>
    
</body>

</html>

<?php
include '../footer.php';
?>