<?php
// Excel Grading Team:
// Please do not modify this page
// Begin your work on excel.php
?>

<?php

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = false;
$isStudent = true;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Excel";

include '../../header.php';
?>
<html>
    
    <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
       $(function() {
               $(".datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
   </script>
    </head>
    
<body>

<div class="main-container">
<center>
    <div class="all-updates">
        <!-- ADD A NEW ASSIGNMENT -->
            <h1 id="add-h1">Assignments</h1>
 

                <!-- current announcement -->
                <?php 
                        //$conn = new mysqli("localhost","root","", "Red-Velvet");
                        if(!$conn) {echo "error";}
                    
                        $latestPostSQL ="SELECT * from assignment where assignmentType='Excel' ORDER BY assignmentID DESC LIMIT 1";
                    
                        $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update'><h2>" . $row["assignmentTitle"] . "</h2>" . "<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>" . "<br>" . $row["assignmentDescription"] . "<br><a href='studenthomepage.php?assignmentID=" . $row["assignmentID"] . "'>Submit Assignment</a> | <a id='toggleGrade'>View Grade</a><br><div class='showGrade'>Grade: 98% <br> Professor Comments: Too much.</div></div>";
                        }
                    } else {
                    echo "";
                        }
        
        
                    //contains older announcements   
                    $earlierPostsSQL="SELECT * FROM assignment where assignmentType='Excel' ORDER BY assignmentID DESC LIMIT 10000 OFFSET 1";
        
                    //combine submission and assignment tables
                    
                    $result = $conn->query($earlierPostsSQL);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='prev-update'><h2>" . $row["assignmentTitle"] . "</h2>" ."<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>" . "<br>" . $row["assignmentDescription"] . "<br><a href='studenthomepage.php?assignmentID=" . $row["assignmentID"] . "'>Submit Assignment</a> | <a id='toggleGrade'>View Grade</a><br><div class='showGrade'>Example Grade: 68% <br> Professor Comments: Not enough.</div></div>";
                        }
                    } else {
                    echo "";
                        }

                ?>
                
        
    </div>

</center>
</div>
    
<script>
        
    //toggle assignment module
    //toggles all at once, need to change
        $(document).ready(function(){
            $(".showGrade").hide();

            $("#toggleGrade").click(function() {
                $(".showGrade").slideToggle.hide();
                
                
            });
        });
    
    </script>
    
</body>
</html>

<?php
include '../../footer.php';
?>



