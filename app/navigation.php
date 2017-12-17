<?php 
  include('config.php');
  include('session.php');
  
  $user_check = $_SESSION['login_user'];
  $user_fName = $_SESSION['login_fName'];
  $user_id = $_SESSION['login_userID'];
  $role = $_SESSION['login_role'];

  if(isset($_SESSION['crnSes'])){
    $crnNo = $_SESSION['crnSes'];
    $classDay = $_SESSION['daySes'];
    $classTime = $_SESSION['timeSes'];
    $section = "<h1 id='class-name'><span class='bold'> " . $classDay . " | " . $classTime . "</span></h1>";
}

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

   <div class="side-nav-disabled side-nav">
    <div class="side-nav--bio">
      <div class="logo">
        <img src="/assets/Pace_logo.png">
      </div>
      <h3>Welcome, <?php echo $user_fName; ?></h3>
      <p class="side-nav--bio--userid"><i class="fa fa-user" aria-hidden="true"></i> U<?php echo $user_id; ?></p>
      <p class="side-nav--bio--username"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $user_check; ?>@pace.edu</p>
      <p style="<?php if($role == "Student") { echo 'display: none'; } ?>" class="side-nav--bio__section"><i class="fa fa-star" aria-hidden="true"></i> <?php echo $_SESSION['daySes'] . '|' . $_SESSION['timeSes']; ?></p>
    </div>

    <div class="side-nav--links">
      <h2>NAVIGATION</h2>

      <div style="<?php if($role == "Student") { echo 'display: none'; } ?>" class="side-nav--nav__section">


        <div class="selected-course">
          <a href="../home.php"><?php echo $_SESSION['daySes'] . '|' . $_SESSION['timeSes']; ?></a>
        </div>

      </div>

      <ul>
         <li><a class="nav-button <?php if ($activePage == 'dashboard') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../dashboard/"><i class="fa fa-home" aria-hidden="true"></i> DASHBOARD</a></li>
         <li style="<?php if($role == "Student") { echo 'display: none'; } ?>"><a class="nav-button <?php if ($activePage == 'attendance') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../attendance/"><i class="fa fa-check-square-o" aria-hidden="true"></i> ATTENDANCE</a></li>
         
         <li class="assn-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ASSIGNMENTS</li>

           <li class="sub-class"><a class="nav-button <?php if ($activePage == 'excel') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../excel/">EXCEL ASSIGNMENTS</a></li>
           <li class="sub-class"><a class="nav-button <?php if ($activePage == 'html') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../html/">HTML ASSIGNMENTS</a></li>
           <li class="sub-class"><a class="nav-button <?php if ($activePage == 'text') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../text/">TEXT ASSIGNMENTS</a></li>

           <li style="<?php if($role == "Student") { echo 'display: none'; } ?>"><a class="nav-button <?php if ($activePage == 'reporting') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../reporting/"><i class="fa fa-area-chart" aria-hidden="true"></i> REPORTING</a></li>
         
         <li><a class="nav-button <?php if ($activePage == 'discussion board') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../discussion-board"><i class="fa fa-quote-left" aria-hidden="true"></i> DISCUSSION BOARD</a></li>
        
      </ul>

      <ul>
        <!-- <li><a class="nav-button" href="#"><i class="fa fa-cog" aria-hidden="true"></i> SETTINGS</a></li> -->
        <li><a class="nav-button" href="/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

      </ul>
    </div>
</div>
  

</body>
</html>
