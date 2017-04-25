<?php

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;
$isStudent = true;
$displayClass=false; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Announcements";

include('../header.php');
?>


<html>
    
<body>

<div class="main-container">
<center>
    <div class="all-updates">
        
        <h1>Announcements</h1><br>
                <!-- current announcement -->
                
                    
                    <?php 
                        $conn = new mysqli("localhost","root","", "Red-Velvet");
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
            
            //logic to submit announcement
            
            <?php 
            
            $sql = "INSERT INTO `Announcements` (`announcementID`, `roleID`, `message`, `announcementTitle`, `ID`) VALUES (\'823\', \'342\', \'dsfgfdfsa\', \'hii\', \'sfsw\')";
            
            ?>
        
        </script> 
    
</body>


</html>
    
</html>

<?php

include('../footer.php');
?>