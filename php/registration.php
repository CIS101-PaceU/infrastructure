<?php
   $db = mysqli_connect("localhost","root","","red-velvet");
   //session_start();

   if(isset($_SESSION['login_user'])){
    header("location: index.php");
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $fname = mysqli_real_escape_string($db,$_POST['fname']);
      $lname = mysqli_real_escape_string($db,$_POST['lname']); 
      $myusername = mysqli_real_escape_string($db,$_POST['id']); 
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $role = mysqli_real_escape_string($db,$_POST['role']); 
       
      if($_POST['confirmPass'] == $mypassword){
          $sql = "UPDATE user SET firstName = '$fname', lastName ='$lname', role='$role' and password = '$mypassword' WHERE userName = '$myusername'";
          //$sql = "INSERT INTO user (firstName, lastName, role, password, userName) VALUES ('$fname', '$lname', '$role', '$mypassword', '$myusername')";
          $result = mysqli_query($db,$sql);

          // If result matched $myusername and $mypassword, table row must be 1 row

          if($result) {
            // echo "User Register Successfully. Please login to continue."
             header("location: login.php");
          }else {
             $error = "Unable to register user";
          }
      } else {
           $error = "Your Password or Confirm Password does not match";
      }
      
   }
?>
<html>
    <head>
        <title>CIS 101 Portal: Registration</title>
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
                       <h1>ACCOUNT ACTIVATION</h1>
                           </center>
                    </div>
                </div>
        
           <!-- log in form -->
            <br>
                <center>
                    <p>Please provide the following details to activate your account</p> 
                    <div class="login-form">
                        <form action = "" method = "post">
                            <input type="text" name="fname" class="form-input" placeholder="First Name" >    
                            <input type="text" name="lname" class="form-input" placeholder="Last Name" >
                            <input type="text" name="id" class="form-input" placeholder="Pace ID" >
                            <input type="password" name="password" class="form-input" placeholder="Password" >  
                            <input type="password" name="confirmPass" class="form-input" placeholder="Confirm password" ><br>  
                            <input type="radio" name="professor" name="role" value="prof"> Professor &nbsp;&nbsp;
                            <input type="radio" name="student" name="role" value="student" checked="checked"> Student<br>   
                            
                            <br>
                            <button id="sub" type = "submit" value = " Submit" >Register</button>
                            <br>
                        </form>
                    </div>       
                </center>
    </body>
        <?php
    include('footer.php');
?>

</html>