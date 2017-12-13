
<?php 
  include('session.php');

  if(isset($_SESSION['crnSes'])){
    $crnNo = $_SESSION['crnSes'];
    $classDay = $_SESSION['daySes'];
    $classTime = $_SESSION['timeSes'];
    $section = "<h1 id='class-name'><span class='bold'> " . $classDay . " | " . $classTime . "</span></h1>";
}

  //for new posts
date_default_timezone_set("America/New_York");
$date = date("m/d/Y");
$time = date("G:i:s");

$currentDate = $date . ' ' . $time;

?>

  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({ selector:'textarea', statusbar: false, branding: false });
        </script>  

<div class="dashboard-container">
  <div class="section-heading"><h2><?php echo $_SESSION['daySes'] . '|' . $_SESSION['timeSes']; ?></h2></div>

  <div class="announcements-container">
    
    <h1><i class="fa fa-bullhorn" aria-hidden="true"></i> Announcements</h1>

    <div class="all-announcements">

      <div class="prof-create">
        <h2>Create new announcement</h2>

        <div class="create-controls">
          
          <form action="postAnnouncement.php" id="add-new-assn" method="post">
              
          <input type="text" placeholder="Title of Announcement" name="announcementTitle" required><br>
          Posting Date: <?php echo $date; ?>
              
          <input type="hidden" name="annDate" value="<?php echo $currentDate; ?>">

              <br>
              <textarea id="textarea" method="post" type="submit" name="message"></textarea>
              <br>

            
              <input type="submit" value="Submit" />
          </form>

        </div>

      </div>

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
