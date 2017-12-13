<?php
## Reporting Team:
## Please DO NOT MODIFY this page
## Begin your work on reporting.php
?>

<?php

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = false;
$isStudent = true;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Reporting";

include '../../header.php';
?>


<?php 
include 'reporting.php';


include '../../footer.php';

?>

