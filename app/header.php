<html>
<head>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({ selector:'textarea' });
        </script>    
</head>

</html>

<?php




//variables for user roles
//if user is logged in and isRole --> display a certain header

//common for everyone using the system
$greeting = "Welcome, xxx!";

//specific to teacher and admin
$crn = "1000"; //grabbed from db
$courseID = 1; //grabbed from db
$courseNo = 100; //grabbed from db
$courseName = "CIS"; //grabbed from db
$courseDay = "MON"; /** should be grabbed from db, courseDay is not in db **/
$courseTime = "6:15pm - 9pm"; /** should be grabbed from db, courseTime is not in db **/
$section = $courseDay . " | " . $courseName . " " . $courseNo . " " . $courseTime;

//for pages below root
$isBelowRoot="../";


//navigation links
$home = "<a id='head-links' href='classHome.php'>Home</a>";
$ann = "<a id='head-links' href='announcements.php'>Announcements</a>";
$assn = "<a id='head-links' href='assignments.php'>Assignments</a>";
//$students = "<a id='head-links' href='students.php'>Students</a>";
$grade = "<a id='head-links' href='grades.php'>Grades/Attendance</a>";
$material = "<a id='head-links' href='courseMaterial.php'>Course Material</a>";
$disc = "<a id='head-links' href='discussionBoard.php'>Discussion Board</a>";
$diffSect = "<a href='home.php'><li>Choose a Different Section</li></a>";
//$group = "<a id='head-links' href='group.php'>Group Project</a>";


//use db throughout app
include('config.php');

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel='stylesheet' type='text/css' href="
    <?php //checks if file is below root to link to resource
    if($belowRoot == true){
        echo "$isBelowRoot";
    } ?>stylesheets/screen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    
<div class="notLoggedIn" style="display:<?php if($isLoggedIn==true) {echo 'none';}?>;">
    <!--header for index page/login -->
    <div class="head-container">
        <div class="nav-title">
            <center>
                <!--need to check logic for link on button -->
                <a href="/"><img src="
                <?php if($belowRoot == true){
                echo "$isBelowRoot";
            } ?>assets/img/Pace_logo.png" id="logo"></a>
                <h1>CIS 101 PORTAL</h1>
            </center>
        </div>
    </div>
</div>

<!--header for teacher -->
<div class="LoggedIn" style="display:<?php if($isLoggedIn==false){echo 'none;';} ?>">
    <div class="head-container">
        <div class="welcome">
       <!-- only show if user is logged in -->
        <div class="logged-in"><span style="float:right;">
    <?php echo "$greeting"; ?><br>
    <a href="#">Help</a> <a href="#">Logout</a> 
        </span>
    </div>

            <div class="nav-title" alight="left">
            <!--need to check logic for link on button -->
                <a href="/"><img src="
                    <?php if($belowRoot == true){
                    echo "$isBelowRoot";
                } ?>assets/img/Pace_logo.png" id="logo"></a>
               <h1>CIS 101 PORTAL</h1>

               <?php 
                if($displayClass == true) {
                    echo "<h1 id='class-name'>$section</h1>";
                }
               ?>
            </div>
        </div>
    </div>
    
<!-- teacher and student top navigation -->
<div id="nav">
    <center>
    <!-- change color based on link selection -->    
        <div class="nav-links" <?php if($showNav==false){
                    echo 'style="display:none"'; } ?>>
        <br>
            <ul>
               <li id="nav-ann"><?php 
                    if ($thisPage == "Home") {
                        $home = "<a id='this-link' href='classHome.php'>Home</a>"; }
                        echo $home; ?>
                </li>

                <li id="nav-ann"><?php 
                    if ($thisPage == "Announcements") {
                        $ann = "<a id='this-link' href='announcements.php'>Announcements</a>"; }
                        echo $ann; ?>
                </li>

                <li id="nav-assn"><?php 
                    if ($thisPage == "Assignments") {
                        $assn = "<a id='this-link' href='assignments.php'>Assignments</a>"; }

                        echo $assn; ?>
                </li>

                <li id="nav-grade"><?php 
                    if ($thisPage == "Grades") {
                    $grade = "<a id='this-link' href='grades.php'>Grades/Attendance</a>"; }

                    echo $grade; ?>
                </li>

                <li id="nav-mat"><?php 
                    if ($thisPage == "Course Material") {
                    $material = "<a id='this-link' href='courseMaterial.php'>Course Material</a>"; }

                    echo $material; ?>
                </li>

                <li id="nav-disc"><?php 
                    if ($thisPage == "Discussion Board") {
                    $disc = "<a id='this-link' href='discussionBoard.php'>Discussion Board</a>"; }

                    echo $disc; ?>
                </li>

            
                <?php
                    if($isTeacher==true) {
                        echo "<li id='nav-disc'><a id='head-links' href='home.php'>Choose Another Section</a></li>";
                    
                    }
                ?>
               <!-- <li id="nav-group"><?php 
                    //if ($thisPage == "Group Project") {
                    //$group = "<a id='this-link' href='group.php'>Group Project</a>"; }

                    //echo $group; ?>
                </li> -->
            </ul>
            <br>
        </div>
    </center>
</div>
    
<!-- teacher and student mobile navigation -->
 <button class="hamburger" 
    <?php if($showNav==false){
        echo 'style="display:none"';
    } ?>>&#9776;
</button>

<button class="cross">x</button>
    
<div class="menu">
    <ul>
        
        
        <a href="classHome.php">
                <?
                if($thisPage=="Home") {
                    echo "<li class='this-menu'>Home</li>";
                } else {
                    echo "<li>Home</li>";
                }
                ?>
                </a>
        

                  
            <a href="announcements.php">
                <?
                if($thisPage=="Announcements") {
                    echo "<li class='this-menu'>Announcements</li>";
                } else {
                    echo "<li>Announcements</li>";
                }
                ?>
                </a>

            <a href="assignments.php">
                <?
                if($thisPage=="Assignments") {
                    echo "<li class='this-menu'>Assignments</li>";
                } else {
                    echo "<li>Assignments</li>";
                }
                ?>
                </a>

<!--            <a href="students.php">
                <?
                /**if($thisPage=="Students") {
                    echo "<li class='this-menu'>Students</li>";
                } else {
                    echo "<li>Students</li>";
                }**/
                ?>
                </a> -->

            <a href="grades.php">
                <?
                if($thisPage=="Grades") {
                    echo "<li class='this-menu'>Grades/Attendance</li>";
                } else {
                    echo "<li>Grades/Attendance</li>";
                }
                ?>
                </a>

            <a href="courseMaterial.php">
                <?
                if($thisPage=="Course Material") {
                    echo "<li class='this-menu'>Course Material</li>";
                } else {
                    echo "<li>Course Material</li>";
                }
                ?></a>

            <a href="discussionBoard.php">
                <?
                if($thisPage=="Discussion Board") {
                    echo "<li class='this-menu'>Discussion Board</li>";
                } else {
                    echo "<li>Discussion Board</li>";
                }
                ?></a>
        
            <?php if($isTeacher==true){
                echo $diffSect;
            } ?>
<!--            <a href="group.php">
                <?/**
                if($thisPage=="Group Project") {
                    echo "<li class='this-menu'>Group Project</li>";
                } else {
                    echo "<li>Group Project</li>";
                } **/
                ?></a> -->
    </ul>
</div> <!--end of hamburger menu -->    
        
</div> <!--end of loggedIn-->   
    
    


<!-- SCRIPT FOR HAMBURGER MENU -->
<script>
//hamburger menu jquery
$( ".cross" ).hide();
$( ".menu" ).hide();

$( ".hamburger" ).click(function() {
    $( ".menu" ).slideToggle( "slow", function() {
        $( ".hamburger" ).hide();
    $( ".cross" ).show();
    });
});

$( ".cross" ).click(function() {
    $( ".menu" ).slideToggle( "slow", function() {
        $( ".cross" ).hide();
        $( ".hamburger" ).show();
    });
});
        
        
    </script>

</body>


</html>
