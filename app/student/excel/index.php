<?php 

 $activePage = 'excel';
 $isInstructor = false;

?>

<!DOCTYPE html>
<html>
<head>
  <title>instructor -- excel</title>
  <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include ('../../header.php');
include('../../mobile-nav.php');
?>

<div class="main-page">
  
     <?php 
       include("../../navigation.php");
      ?>
    

  <div class="main-content">
    <?php 
    include('excel.php');
  ?>

  </div>

</div>

</body>
</html>