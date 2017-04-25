<?php

//WILL BE PULLED FROM DATABASE
$fillerText ="Morbi et tellus sapien. Phasellus volutpat neque ut nunc semper, in dictum ipsum cursus. Vivamus imperdiet vulputate ipsum at consectetur. Curabitur dignissim tristique massa nec rutrum. Phasellus tincidunt, dolor et ornare varius, purus justo faucibus nunc, at mollis sem libero ut risus.";

$datePosted = "03/06/2017"; //WILL BE PULLED FROM DATABASE
$announcementTitle ="Title of Update";//WILL BE PULLED FROM DATABASE
$assignmentTitle ="Title of Update";//WILL BE PULLED FROM DATABASE
$gradesTitle ="Title of Update";//WILL BE PULLED FROM DATABASE
$courseMaterialTitle ="Title of Update";//WILL BE PULLED FROM DATABASE
$discussionBoardTitle ="Title of Update";//WILL BE PULLED FROM DATABASE
        
?>


<html>
<body>
    <div class="main-container">
        <div class="class-content">
            
            <div class = "box" id="ann-box">
                <h2>announcement</h2>
                <?php 
                
            
                $latestPostSQL ="SELECT * from Announcements ORDER BY announcementID DESC LIMIT 1";
            
                $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<h3>" . $row["announcementTitle"] . "</h3><p id='main-ann-date'>" . "Date Posted: " . $row["datePosted"] . "</p><p id='main-ann-desc'>" . 
                            substr($row["message"], 0, 225) . "...</p>";
                        }
                    } else {
                    echo "";
                        }
            ?>
                <a href='announcements.php'>View More...</a>
            </div>

            <div class = "box" id="assn-box">
                <h2>assignment</h2>
                
                <?php
                $latestPostSQL ="SELECT * from Assignment ORDER BY assignmentID DESC LIMIT 1";
                
                $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<h3>" . $row["assignmentTitle"] . "</h3><p id='main-ann-date'><span class='bold-text'>" . "Due Date: " . $row["dueDate"] . "</span></p><p id='main-ann-desc'>" . 
                            substr($row["assignmentDescription"], 0, 225) . "...</p>";
                        }
                    } else {
                    echo "";
                        }
            ?>

                
                <a href='assignments.php'>View More...</a>
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
                <a href='courseMaterial.php'>View More...</a>
            </div>

            <div class = "box" id="disc-box">
                <h2>discussion board</h2>
                <h3  id="main-disc">Title of Update</h3>
                <p id="main-disc-date">03/06/2017</p>
                <p id="main-disc-desc"> <?php echo $fillerText; ?></p>
                <a href='discussionBoard.php'>View More...</a>
            </div>

<!--              <div class = "box" id="group-box">
                <h2>group project</h2>
                <h3 id="main-group">Title of Update</h3>
                <p id="main-group-date">03/06/2017</p>

                <p id="main-group-desc"> <?php //echo $fillerText; ?></p>
                    <a href='group.php'>View More...</a>
                </div>-->
        </div>
    </div>

</body>
</html>