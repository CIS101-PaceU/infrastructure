<?php

//logic for login

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;
$isStudent = false;
$displayClass=false; //display the class name after the prof selects section from dropdown
$showNav = false; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Prof Class Home";


include('../header.php');
?>

<html>
<body>
    <div class="main-container">
        <h1>My CIS 101 Classes</h1>

            <div class="my-classes">
                <center>
                <div class="styled-select">
                    <select class="the-select">
                        <optgroup label="CIS 101">
                            
                            <!-- PROGRAMMATICALLY LOOP THROUGH SECTION TITLES FOR OPTIONS -->
                            
                            <!-- HOW TO MAKE THE FIRST OPTION UNSELECTABLE? -->
                            <option>Select your class: </option>
                            <option>MON | 6:15pm - 9pm</option>
                            <option>WEDS | 06:10pm-08:10pm</option>
                            <option>THURS | 07:55am-09:55am</option>
                        </optgroup>
                    </select>
                </div>
                </center>
            
            </div>
        </div>

<script>
//using options to navigate to the different pages
$('.styled-select').change(function(){
window.location = ('classHome.php');
});
    
</script>
    

</body>

</html>

<?php
include('../footer.php');
?>