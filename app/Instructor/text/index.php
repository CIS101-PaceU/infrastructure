<?php 

 $activePage = 'text';
 $isInstructor = true;

?>

<!DOCTYPE html>
<html>
<head>
  <title>instructor -- text</title>
  <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <?php 
  include('../../header.php');
  include('../../mobile-nav.php');
?>


<div class="main-page">
  
     <?php 
       include("../../navigation.php");
      ?>
    

  <div class="main-content">
    <?php 
    include('text.php');
  ?>

  </div>

</div>

</body>
</html>