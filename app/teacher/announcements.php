<?php

//logic for login

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;
$isStudent = false;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Announcements";

//for new posts
date_default_timezone_set("America/New_York");
$currentDate = date("m/d/Y") . " " . date("G:i:s");

//for older and latest posts - will be programmatically added in

$oldAssnDesc = "Integer aliquam ornare augue, vitae placerat sem tristique eu. Maecenas molestie ut mi non rhoncus.";

$assnTitle = "Assignment Title";
$assnDesc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    
    <br>
    <p class='dload'><a href='#'><img src='../assets/img/download.png'>Document_File_32364.docx</a></p>
    <p class='dload'><a href='#'><img src='../assets/img/excel.png'>Excel_File_48283.xlsx</a></p>
    <p class='dload'><a href='#'><img src='../assets/img/html.png'>Homework_File_12345.html</a></p>
    <p class='dload'><a href='#'><img src='../assets/img/video.png'>Video_File_85684.mov</a></p>
    ";


include('../header.php');
?>

<html>
    
<body>

<div class="main-container">
<center>
    <div class="all-updates">
        <!-- ADD A NEW ANNOUNCEMENT -->
            <div class="prev-update"><h1 id="add-h1">Add a new Announcement</h1>
                <div class="add-new-update">
                    
                    <form action="postAnnouncement.php" id="add-new-assn" method="post">
                        
                    <input type="text" placeholder="Title of Announcement" name="announcementTitle" required><br>
                    Posting Date: <?php echo $currentDate; ?>
                        
                    <input type="hidden" name="annDate" value="<?php echo $currentDate; ?>">

                        <br>
                        <textarea id="textarea" method="post" type="submit" name="message"></textarea>
                        <br>

                        <div class="dload">

                            <!--Programmatically add files -->
                            <input type="checkbox" name="file" value="file">
                            <img src="../assets/img/download.png">File.file<br></div>

                        <button>Attach files</button>
                        <button>Delete files</button>
                        <button>Save Draft</button>
                        <br>
                        <input type="submit" value="Submit" />
                    </form>
                        
                        
                        
                        
                    
                    
                    </div>
                    
                    </div> 

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

<?php
include('../footer.php');
?>