<?php

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;
$isStudent = false;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Home";


include('../header.php');

if(!isset($_SESSION['crnSes'])){
?>
   <script>
       window.location = ('home.php');
</script>
<?php }

include('dashboard.php');

include('../footer.php');
?>
