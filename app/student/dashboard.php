<?php

//WILL BE PULLED FROM DATABASE
$fillerText ="Morbi et tellus sapien. Phasellus volutpat neque ut nunc semper, in dictum ipsum cursus. Vivamus imperdiet vulputate ipsum at consectetur. Curabitur dignissim tristique massa nec rutrum. Phasellus tincidunt, dolor et ornare varius, purus justo faucibus nunc, at mollis sem libero ut risus.";

$datePosted = "03/06/2017"; //This will be pulled from the DB
$announcementTitle ="Title of Update";//WILL BE PULLED FROM DATABASE
$assignmentTitle ="Title of Update";//WILL BE PULLED FROM DATABASE
$discussionBoardTitle ="Title of Update";//WILL BE PULLED FROM DATABASE
   
include('../config.php')
?>


<html>
<body>
    <div class="main-container">
        <div class="class-content">
            
            <div class = "box" id="ann-box">
                <h2>announcement</h2>
                <?php 
                
            
                $latestPostSQL ="SELECT * from Announcements ORDER BY datePosted DESC LIMIT 1";
            
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
                <h3 id="main-assn">Title of Update</h3>
                <p id="main-assn-date">03/06/2017</p>
                <p id="main-assn-desc"> <?php echo $fillerText; ?></p>
                <a href='assignments.php'>View More...</a>
            </div>

            <div class = "box" id="disc-box">
                <h2>discussion board</h2>
                <h3  id="main-disc">The Road Not Taken</h3>
                <p id="main-disc-date">03/06/2017</p>
                <p id="main-disc-desc"> <?php echo "Two roads diverged in a yellow wood, and sorry I could not travel both and be one traveler, long I stood and looked down one as far as I could to where it bent in the undergrowth..." ?></p>
                <a href='discussionBoard.php'><i>View More</i></a>
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