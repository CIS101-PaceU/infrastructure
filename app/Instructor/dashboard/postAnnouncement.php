<!DOCTYPE html>
<html>
<head>
  <title>instructor -- dashboard announcements</title>
  <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php 
  include('../../config.php');
  include('../../topnav-logged.php');
  include('../../mobile-nav.php');

  $sql="INSERT into Announcements (announcementTitle, message, datePosted)
VALUES
('".$_POST["announcementTitle"]."','".$_POST["message"]."','".$_POST["annDate"]."')";

?>

<div class="main-page">
  
     <?php 
        include("../../navigation.php");
      ?>
    
  <div class="main-content">
    <?php 

    
if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='../dashboard/'>back</a>.";
} else {
    echo "Sorry, there was an error with posting. Please try again. If the problem persists, contact the adminstrator.";
}

$conn->close();

        
  ?>

  </div>

</div>

</body>
</html>
