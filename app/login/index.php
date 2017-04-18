<?php
//logic for login?

$db = mysqli_connect("localhost","root","","red-velvet");
   session_start();

   if(isset($_SESSION['login_user'])){
    header("location: index.php");
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
    
       //$error 
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login_userID'] = $row['userID'];
         $_SESSION['login_role'] = $row['role'];
         $_SESSION['login_fName'] = $row['firstName'];
          
         header("location: index.php");
      }else {
         $error= "Your Username or Password is invalid"; 
      }
   }




$thisPage="logInIndex";
$isLoggedIn=false;
$belowRoot = true;

$displayClass=false;
$showNav=false;

include("../header.php");
?>

<html>
<body>
    <!-- log in form -->
<center>
    <!-- navigate to appropriate folder depending on login credentials-->
      <p><br>Enter your Pace username and password.</p> 
                    
<div class="login-form">
    <form>
        <input type="text" class="form-input" placeholder="Pace ID"><br>
        
        <input type="password" class="form-input" placeholder="Password">
        <br>
        <input type="submit" name="submit" id="form-button">
    </form>

        <!-- registration form -->
    <!-- not keeping registration form on the same page as log in --
<br>
    <button id="sub">Log In</button> <button id="sub" class="reg-btn">Register</button>

    <br>
<div class="reg">
    <form>
        <input type="text" class="form-input" placeholder="First Name">    

        <input type="text" class="form-input" placeholder="Last Name">

        <input type="text" class="form-input" placeholder="Pace ID">

        <input type="password" class="form-input" placeholder="Password">

        <input type="password" class="form-input" placeholder="Confirm password"><br>

        <input type="radio" name="role" value="prof"> Professor &nbsp;&nbsp;
        
        <input type="radio" name="role" value="student"> Student<br>

        <button id="sub">Submit</button>
    </form> 
</div> -->

        <a href="">Forgot password?</a><br>
        <a href="../activation.php">Haven't activated your account yet?</a>

</div>       
</center>
    
<script>
    //not keeping registration form on same page as log-in
//toggle registration form.

    /** $(document).ready(function(){
    $( ".reg" ).hide();
    $(".reg-btn").click(function(){
$(".reg").slideToggle("slow");
    });
}); **/
</script>
    
</body>

</html>

<?php
include("../footer.php")
?>