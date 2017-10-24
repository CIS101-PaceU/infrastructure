<!DOCTYPE html>
<html>
<head>
  <title>testing new styles</title>
  <link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
  <link rel="stylesheet" type="text/css" href="/stylesheets/font-awesome/css/font-awesome.min.css">
</head>
<body>

    <div class="top-nav">
     <div>
        <img src="/assets/Pace_logo.png">
        <h2>Introduction to <br />Computing</h2>
    </div>

  <!-- enable if logged in -->
<!--   <div class="top-nav__signedin">
     <div>
      <img src="/assets/Pace_logo.png">
      <div class="top-nav--light"><div class="light"></div><h4>Professor Name</h4></div>
    </div>
  </div> -->

  </div>

<div class="main-page">
   <div class="side-nav"><?php 
      include("header.php");
  ?>
</div>
    

  <div class="main-content">
    <?php 
    include("login.php");
    //include("dashboard.php");
  ?>

  </div>



</div>

</body>
</html>