<?php

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = false;
$isStudent = true;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Text Grading";

include '../../header.php';
?>


<?php 
include 'text.php';

include '../../footer.php';

?>


