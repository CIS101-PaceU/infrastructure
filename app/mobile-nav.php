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


<!-- <div class="enable-mobile"><i class="fa fa-bars" aria-hidden="true"></i>
</div> -->

<!--    Made by Erik Terwan    -->
<!--   24th of November 2015   -->
<!--    All rights reserved    -->
<nav role="navigation">
  <div id="menuToggle">
    <!--
    A fake / hidden checkbox is used as click reciever,
    so you can use the :checked selector on it.
    -->
    <input type="checkbox" />
    
    <!--
    Some spans to act as a hamburger.
    
    They are acting like a real hamburger,
    not that McDonalds stuff.
    -->
    <span></span>
    <span></span>
    <span></span>
    
    <!--
    Too bad the menu has to be inside of the button
    but hey, it's pure CSS magic.
    -->
    <ul id="menu">

      <li class="nav-bio">
        <div class="side-nav--bio">
          <div class="logo">
            <!-- <img src="/assets/Pace_logo.png"> -->
          </div>
          <h3>Welcome, <?php echo $user_fName; ?></h3>

          <p class="side-nav--bio--userid"><i class="fa fa-user" aria-hidden="true"></i> U<?php echo $user_id; ?></p>
          <p class="side-nav--bio--username"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $user_check; ?>@pace.edu</p>
          <p class="side-nav--bio__section"><i class="fa fa-star" aria-hidden="true"></i> W | 03:30 PM - 05:30PM</p>
        </div>
      </li>

      <li>
        
      <div class="side-nav--links">

      <div style="<?php if($role == "Student") { echo 'display: none'; } ?>" class="side-nav--nav__section">

        <form id="chooseclass-form" action ="" method = "post">
          <div class="styled-select">
          <select name="chooseclass-select" class="chooseclass-select_class">

        <optgroup>
          <option>W | 03:30 PM - 05:30PM</option>
          <option>T | 12:30 PM - 2:30PM</option>

        </optgroup>
      </select>
    </div>
    </form>

      </div>

      <ul>
         <li><a class="nav-button <?php if ($activePage == 'dashboard') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../dashboard/"><i class="fa fa-home" aria-hidden="true"></i> DASHBOARD</a></li>
         
         <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ASSIGNMENTS</li>

           <li class="sub-class"><a class="nav-button <?php if ($activePage == 'excel') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../excel/">EXCEL ASSIGNMENTS</a></li>
           <li class="sub-class"><a class="nav-button <?php if ($activePage == 'html') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../html/">HTML ASSIGNMENTS</a></li>
           <li class="sub-class"><a class="nav-button <?php if ($activePage == 'text') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../text/">TEXT ASSIGNMENTS</a></li>

         
         <li><a class="nav-button <?php if ($activePage == 'discussion board') { echo 'nav-active'; } else { echo 'nav-button'; } ?>" href="../discussion-board/"><i class="fa fa-quote-left" aria-hidden="true"></i> DISCUSSION BOARD</a></li>
      </ul>

      <ul>
        <li><a class="nav-button" href="#"><i class="fa fa-cog" aria-hidden="true"></i> SETTINGS</a></li>
        <li><a class="nav-button" href="/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

      </ul>
    </div>


      </li>
    </ul>

  </div>
</nav>

