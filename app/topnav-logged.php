
<?php 
  include('config.php');
  include('session.php');
  
  $user_check = $_SESSION['login_user'];
  $user_fName = $_SESSION['login_fName'];
  $user_lName = $_SESSION['login_lName'];

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

   <div class="top-nav">
  <div class="top-nav__signedin">
     <div class="flex">
      <img src="/assets/Pace_logo.png">
    </div>
      <div class="flex top-nav--light"><div class="light"></div><h4><?php echo $user_fName . ' ' . $user_lName; ?></h4></div>
    </div>
  </div>

  </div>

</body>
</html>