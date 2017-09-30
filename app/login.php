<?php
   include ('config.php');
   session_start();

   if(isset($_SESSION['login_user'])){
       if($_SESSION['login_role'] == "Student"){
             header("location: student/classHome.php");
         } else if($_SESSION['login_role'] == "Instructor"){
             header("location: teacher/home.php");
         }
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
       
      $sql = "SELECT u.userID, u.firstName, r.role FROM user u
        JOIN User_Role r ON u.userID = r.userID
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
         
         if($_SESSION['login_role'] == "Student"){
             header("location: student/classHome.php");
         } else if($_SESSION['login_role'] == "Instructor"){
             header("location: teacher/home.php");
         }
         
      }else {
         $error = "Your Username or Password is invalid";
      }
   }
?>
<html>
    <head>
        <title>CIS 101 Portal: Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheets/screen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    
    <body>
        <div class="head-container">
            
            <div class="nav-title" alight="left">
                   <div>
                       <center>
                        <a href="/"><img src="/assets/img/Pace_logo.png" id="logo"></a>
                       <h1>LOG IN</h1>
                           </center>
                    </div>
                </div>
        
           <!-- log in form -->
            <br>
                <center>
                    <p>Enter your Pace username and password.</p> 
                    <div class="login-form">
                        <form action = "" method = "post">
                            <input type="text" name = "username" class="form-input" placeholder="Pace ID"><br>
                            <input type="password" name = "password" class="form-input" placeholder="Password">

                            <br>
                            <button id="sub" type = "submit" value = " Submit" >Log In</button>
                            <br>
                            <a href="">Forgot password?</a>
                           <!-- <span><?php echo $error; ?></span>-->
                        </form>
                    </div>       
                </center>
        
        <!-- php logic -->

    </body>

        <?php
    include('footer.php');
?>

</html>
    
    