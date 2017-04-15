
<?php
   //$db = mysqli_connect("localhost","root","","red-velvet");
   //connect to mysql database
 $connection = mysqli_connect("localhost","root","","red-velvet") or die("Error " . mysqli_error($connection));
 include('session.php');
 $user_check = $_SESSION['login_user'];
 $user_fName = $_SESSION['login_fName'];

?>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheets/screen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    <?php
    $title = "CIS 101 Portal";
    $studentName = "Student" . "!"; //link to user name in database
    $welcome = "Welcome " . $user_fName;
    
    
    //navigation links
    $home = "<a id='head-links' href='\'>Home</a>";
    $ann = "<a id='head-links' href='ann.php'>Announcements</a>";
    $assn = "<a id='head-links' href='assn.php'>Assignments</a>";
    $grade = "<a id='head-links' href='grades.php'>Grades/Attendance</a>";
    $material = "<a id='head-links' href='material.php'>Course Material</a>";
    $disc = "<a id='head-links' href='disc.php'>Discussion Board</a>";
    $group = "<a id='head-links' href='group.php'>Group Project</a>";
    
    $help = "<a id='thin-link' href='#'>Help</a>";
    $logout = "<a id='thin-link' href='logout.php'>Logout</a>";

    ?>
        
    </head>

    <body>
        
        <div class="head-container">
        
            <div class="welcome">
                   <!-- only show if user is logged in -->
                <div class="logged-in"><span style="float:right;">
                <?php echo "$welcome"; ?><br>
                <a href="#">Help</a> <a href="logout.php">Logout</a> 
                    </span>
                </div>
                
                <div class="nav-title" alight="left">
                   <div>
                        <a href="/"><img src="img/Pace_logo.png" id="logo"></a>
                       <h1>CIS 101 PORTAL</h1>
                    </div>
                </div>         
            </div>

            <div id="nav">

                <center>
                <!-- change color based on link selection -->    
                   <!-- <br><br><br><br><br> -->
                <div class="nav-links">
                <!--    <hr> -->
                    <br>
                    <ul>
                        <li id="nav-home"><?php 
                            
                            if ($thisPage == "Home") {
                            $home = "<a id='this-link' href='\'>Home</a>"; }
                        echo $home; ?></li>
                        
                        <li id="nav-ann"><?php 
                            
                            if ($thisPage == "Announcements") {
                            $ann = "<a id='this-link' href='ann.php'>Announcements</a>"; }
                            
                            echo $ann; ?></li>
                        
                        
                        <li id="nav-assn"><?php 
                            
                            if ($thisPage == "Assignments") {
                            $assn = "<a id='this-link' href='assn.php'>Assignments</a>"; }
                            
                            echo $assn; ?></li>
                        
                        <li id="nav-grade"><?php 
                            
                            if ($thisPage == "Grades") {
                            $grade = "<a id='this-link' href='grades.php'>Grades/Attendance</a>"; }
                            
                            echo $grade; ?></li>
                        
                        
                        <li id="nav-mat"><?php 
                            
                            if ($thisPage == "Course Material") {
                            $material = "<a id='this-link' href='material.php'>Course Material</a>"; }
                            
                            echo $material; ?></li>
                        
                        
                        <li id="nav-disc"><?php 
                            
                            if ($thisPage == "Discussion Board") {
                            $disc = "<a id='this-link' href='disc.php'>Discussion Board</a>"; }
                            
                            echo $disc; ?></li>
                        
                        <li id="nav-group"><?php 
                            
                            if ($thisPage == "Group Project") {
                            $group = "<a id='this-link' href='group.php'>Group Project</a>"; }
                            
                            echo $group; ?></li>
                    </ul>
                    <br>
                    
                    <br>
                </div>
                </center>

            
            </div>
        
            <button class="hamburger">&#9776;</button>
            <button class="cross">x</button>
            <div class="menu">

                
              <ul>
                <a href="\"><?
                    if($thisPage=="Home") {
                        echo "<li class='this-menu'>Home</li>";
                    } else {
                        echo "<li>Home</li>";
                    }
                    ?>
                    </li>
                  
                  </a>
                  
                <a href="ann.php">
                    <?
                    if($thisPage=="Announcements") {
                        echo "<li class='this-menu'>Announcements</li>";
                    } else {
                        echo "<li>Announcements</li>";
                    }
                    ?>
                    </a>
                
                <a href="assn.php">
                    <?
                    if($thisPage=="Assignments") {
                        echo "<li class='this-menu'>Assignments</li>";
                    } else {
                        echo "<li>Assignments</li>";
                    }
                    ?>
                    </a>
                
                <a href="grades.php">
                    <?
                    if($thisPage=="Grades") {
                        echo "<li class='this-menu'>Grades/Attendance</li>";
                    } else {
                        echo "<li>Grades/Attendance</li>";
                    }
                    ?>
                    </a>
                
                <a href="material.php">
                    <?
                    if($thisPage=="Course Material") {
                        echo "<li class='this-menu'>Course Material</li>";
                    } else {
                        echo "<li>Course Material</li>";
                    }
                    ?></a>
                
                <a href="disc.php">
                    <?
                    if($thisPage=="Discussion Board") {
                        echo "<li class='this-menu'>Discussion Board</li>";
                    } else {
                        echo "<li>Discussion Board</li>";
                    }
                    ?></a>
                
                <a href="group.php">
                    <?
                    if($thisPage=="Group Project") {
                        echo "<li class='this-menu'>Group Project</li>";
                    } else {
                        echo "<li>Group Project</li>";
                    }
                    ?></a>
              </ul>
            </div>     
        
        </div>

    </body>


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
