
<?php 

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
  <div class="section-heading"><h2>W | 03:30 - 05:30PM</h2></div>

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
            
            if(!$conn) {echo "error";}
        
            $latestPostSQL ="SELECT * from Announcements ORDER BY datePosted DESC LIMIT 10";
        
            $result = $conn->query($latestPostSQL);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<div class='entry announcement-entry'><h3>" . $row["announcementTitle"] . "</h3>" . "<p><span class='date'>" . $row["datePosted"] . "</span><br>" . $row["message"] . "</p><hr /></div>";
            }
        } else {
        echo "";
            }
        
        ?>
        
      </div>

    </div>

  </div>

</div>
