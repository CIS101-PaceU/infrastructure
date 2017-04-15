<?php
  
//all content here depends on who is logged in
    
    $thisPage="Home";
    include('header.php');
    //echo "<br><br>Hello! Index page!<br><br>";


    $fillerText = "<!-- this will NOT be hard coded -->
    
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        
                        <br> ";

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="stylesheets/screen.css">
        <title>CIS 101 Portal</title>
        
    </head>
    <body>
        
        <div class="main-container">
            
            <div class="class-content">
                
                <div class = "box" id="ann-box">
                    <h2>announcement</h2>
                    <h3 id="main-ann">Title of Update</h3>
                    <p id="main-ann-date">03/06/2017</p>
                    
                    <p id="main-ann-desc"> <?php echo $fillerText; ?> </p>
                    <a href='ann.php'>View More...</a>
                    
                    
                </div>
                
                <div class = "box" id="assn-box">
                    <h2>assignment</h2>
                    <h3 id="main-assn">Title of Update</h3>
                    <p id="main-assn-date">03/06/2017</p>
                    
                    <p id="main-assn-desc"> <?php echo $fillerText; ?></p>
                    <a href='assn.php'>View More...</a>
                    
                </div>
                
                <div class = "box" id="grades-box">
                    <h2>Grades/Attendance</h2>
                    <h3 id="main-grades">Title of Update</h3>
                    <p id="main-grades-date">03/06/2017</p>
                    
                    <p id="main-grades-desc"> <?php echo $fillerText; ?></p>
                    <a href='grades.php'>View More...</a>
                    
                    
                </div>
                
                <div class = "box" id="material-box">
                    <h2>course material</h2>
                    <h3 id="main-mat">Title of Update</h3>
                    <p id="main-mat-date">03/06/2017</p>
                    
                    <p id="main-mat-desc"> <?php echo $fillerText; ?></p>
                    <a href='material.php'>View More...</a>
                    
                </div>
                
                <div class = "box" id="disc-box">
                    <h2>discussion board</h2>
                    <h3  id="main-disc">Title of Update</h3>
                    <p id="main-disc-date">03/06/2017</p>
                    
                    <p id="main-disc-desc"> <?php echo $fillerText; ?></p>
                    <a href='disc.php'>View More...</a>
                    
                </div>
                
                <div class = "box" id="group-box">
                    <h2>group project</h2>
                    <h3 id="main-group">Title of Update</h3>
                    <p id="main-group-date">03/06/2017</p>
                    
                    <p id="main-group-desc"> <?php echo $fillerText; ?></p>
                        <a href='group.php'>View More...</a>
                    
                </div>
            

            </div>
    
    </body>
    
    <?php
        include('footer.php');
    ?>
