<?php
    
$isLoggedIn = true;
$isTeacher = false;

$isStudent = true;
$displayClass = false;

$showNav = true;

$thisPage = "Announcements";

include('../header.php');
include('../config.php');

?>

<html>
    
<body>

<div class="main-container">
<center>
    <div class="all-updates">
<h1 id="add-h1">Announcements</h1> <br>

                <!-- current announcement -->
                
                    
                    <?php 
                        
                        if(!$conn) {echo "error";}
                    
                        $latestPostSQL ="SELECT * from Announcements ORDER BY announcementID DESC LIMIT 1";
                    
                        $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update'><h2>" . $row["announcementTitle"] . "</h2>" . "Date Posted: " . $row["datePosted"] . "<br>" . $row["message"] . "</div>";
                        }
                    } else {
                    echo "";
                        }
         
                 //contains older announcements
                        
                    $earlierPostsSQL="SELECT * FROM Announcements ORDER BY announcementID DESC LIMIT 10000 OFFSET 1";
                    
                    $result = $conn->query($earlierPostsSQL);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='prev-update'><h2>" . $row["announcementTitle"] . "</h2>" . "Date Posted: " . $row["datePosted"] . "<br>" . $row["message"] . "</div>";
                        }
                    } else {
                    echo "";
                        }
                    
                    ?>
              
                
            </div>
        
        </center>
        
        </div>
        
        <script>
            //toggle announcement module
            $(document).ready(function(){
                $(".add-new-update").hide();
                
                $("#add-h1").click(function() {
                    $(".add-new-update").slideToggle("fast");
                });
            });
        
        </script> 
    
</body>


</html>

<?php

include('../footer.php');

?>