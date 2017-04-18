<?php
   $db = mysqli_connect("localhost","root","","red-velvet");
   session_start();

   if(isset($_SESSION['login_user'])){
    //header("location: index.php");
       header("location: teacher/home.php");
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
       
      $sql = "SELECT userID, role, firstName FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login_userID'] = $row['userID'];
         $_SESSION['login_role'] = $row['role'];
         $_SESSION['login_fName'] = $row['firstName'];
          
         header("location: teacher/home.php");
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
                        <a href="/"><img src="img/Pace_logo.png" id="logo"></a>
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
                            <a href="regist">Register?</a> <span> | </span> <a href="">Forgot password?</a>
                           <!-- <span><?php echo $error; ?></span>-->
                        </form>
                    </div>       
                </center>
        
        <!-- php logic -->
        
    <script>
        //toggle registration form.
        $(document).ready(function(){
            $( ".reg" ).hide();
            $(".reg-btn").click(function(){
        $(".reg").slideToggle("slow");
            });
        });
      
    </script>
    
    </body>

        <?php
    include('footer.php');
?>

</html>
    
    