<?php 

 $activePage = 'html';
 $isInstructor = true;

?>

<!DOCTYPE html>
<html>
<head>
  <title>instructor -- html</title>
  <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <?php 
  include('../../topnav-logged.php');
  include('../../mobile-nav.php');
?>


<div class="main-page">
  
     <?php 
       include("../../navigation.php");
      ?>
    

  <div class="main-content">
    <?php 
    include('html_grading.php');
  ?>

  </div>

</div>

</body>
</html>