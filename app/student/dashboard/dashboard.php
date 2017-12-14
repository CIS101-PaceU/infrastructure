
<?php 

include('../config.php');

  //for new posts
date_default_timezone_set("America/New_York");
$currentDate = date("m.d.Y") . " " . date("G:i:s");

?>

  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({ selector:'textarea', statusbar: false, branding: false });
        </script>  

<div class="dashboard-container">

  <div class="announcements-container">
    
    <h1><i class="fa fa-bullhorn" aria-hidden="true"></i> Announcements</h1>

    <div class="all-announcements">

    <div class="announcement-content content">
    
            <?php 
                
                if(!$conn) { echo "error"; }
            
                $latestPostSQL ="SELECT * from Announcements ORDER BY datePosted DESC LIMIT 1";
            
                $result = $conn->query($latestPostSQL);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<div class='current-update entry announcement-entry'><h3>" . $row["announcementTitle"] . "</h3>" . "<p><span class='date'>" . $row["datePosted"] . "</span><br>" . $row["message"] . "</p></div>";
                }
            } else {
            echo "";
                }
    
                $earlierPostsSQL="SELECT * FROM Announcements ORDER BY datePosted DESC LIMIT 300 OFFSET 1";
    
                $result = $conn->query($earlierPostsSQL);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<div class='prev-update entry announcement-entry'><h3>" . $row["announcementTitle"] . "</h3>" . "<p><span class='date'>" . $row["datePosted"] . "</span><br>" . $row["message"] . "<hr /></div>";
                    }
                } else {
                echo "";
                    }
            
            ?>
            
          </div>
    </div>
  </div>
</div>
