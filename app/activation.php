<?php

$thisPage ="registrationPage";
$isLoggedIn=false;

$belowRoot = false;

$displayClass=false;
$showNav=false;

include("header.php");
?>

<html>
<body>

    <center>
    <h1>Account Activation</h1>
    <p>Before you can use the CIS 101 Portal, you must activate your account first. Enter your information in the form below to activate your account.</p>
        
<div class="login-form">     
    <div class="reg">
        <form>
            <input type="text" class="form-input" placeholder="First Name">    

            <input type="text" class="form-input" placeholder="Last Name">

            <input type="text" class="form-input" placeholder="Pace ID">

            <input type="password" class="form-input" placeholder="Password">

            <input type="password" class="form-input" placeholder="Confirm password"><br>

            <input type="radio" name="role" value="prof"> Professor &nbsp;&nbsp;

            <input type="radio" name="role" value="student"> Student<br>

            <input type="submit" name="submit" id="form-button">
        </form> 
    </div>
</div>
        
    </center>
    
</body>

</html>

<?php

include("footer.php");

?>