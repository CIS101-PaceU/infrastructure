<?php
// Attendance Team:
// Please do not modify this page
// Begin your work on attendance.php
?>

<?php

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;
$isStudent = false;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Attendance";

include '../../header.php';
?>


<?php 
include 'attendance.php';
include 'qr_img.php';
include '../../footer.php';

?>


