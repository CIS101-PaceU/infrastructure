<?php

//logic for login

//CLASS SECTION MUST BE PROGRAMMATICALLY BROUGHT IN!!!

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;
$isStudent = false;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Home";


include('../header.php');

include('dashboard.php');

include('../footer.php');
?>
