<?php
   include ('config.php');
   session_start();

   if(isset($_SESSION['login_user'])){
       if($_SESSION['login_role'] == "Student"){
             header("location: student/dashboard/");
         } else if($_SESSION['login_role'] == "Instructor"){
             //header("location: Instructor/home.php");
           header("location: instructor/home.php");
         }
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

      $sql = "SELECT u.userID, u.firstName, u.lastName, r.role FROM user u
        JOIN user_role r ON u.userID = r.userID
        WHERE u.username = '$myusername' and u.password = '$mypassword'";

      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login_userID'] = $row['userID'];
         $_SESSION['login_role'] = $row['role'];
         $_SESSION['login_fName'] = $row['firstName'];
         $_SESSION['login_lName'] = $row['lastName'];



         if($_SESSION['login_role'] == "Student"){
           $sql="INSERT INTO sessions(user,login,flag) VALUES ('$myusername',now(),0)";
          $result=mysqli_query($conn,$sql);
          $_SESSION['last_activity']=time();
             header("location: student/dashboard/");
         } else if($_SESSION['login_role'] == "Instructor"){
             // header("location: instructor/home.php");
           header("location: instructor/home.php");
         }

      }else {
         $error = "Your Username or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CIS 101 Portal: Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>

<body class="login-container">

   <div class="top-nav">
     <div>
        <img src="/assets/Pace_logo.png">
        <h2>Introduction to <br />Computing</h2>
    </div>
  </div>

  <div class="login-container--main">

    <div class="login-form">

        <div class="login-form--sign-links">
          <a class="login-button" href="#">Sign up</a>

          <a class="login-button active" href="#">Sign In</a>
        </div>

      <div class="login-form--content active">

        <h2>Log Into Your Account</h2>

        <form action = "" method = "post">

        <input type="text" placeholder="PACE UNIVERSITY ID" name="username" required>
        <input type="password" placeholder="PASSWORD" name="password" required>

        <br />

        <button id="sub" type="submit" class="button button--teal">Sign In</button>

      </form>

        <br />
        <p><a class="teal-link" href="#">Forgot your password?</a></p>

        <hr />

        <p>Or sign in using one of these other services:</p>

        <div class="login-form--social">

          <div class="login-form--social__button">
            <a href="#">
              <img src="/assets/signin/google-logo.png"> Continue with Google
          </a>
          </div>

        </div>

      </div>
      </div>
    </div>

</body>

</html>
