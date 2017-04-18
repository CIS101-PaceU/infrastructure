<?php
//needs logic for login

$thisPage="rootIndex";
$belowRoot=false;
$showNav=false;
$displayClass=false;
$isLoggedIn = false;

include('header.php');
?>

<html>
<head>
    <title>Welcome to the CIS 101 Portal</title>
</head>
    <body>
        <div class="welcome">
            <center>
            <h1>Welcome to the CIS 101 Portal!</h1>
            <h2>Log In with a Pace ID</h2>
            <a href="login/"><button>Log in to CIS 101 Portal</button></a>
            </center>
            
            <br><br><br>

            <p>Is this your first time logging in to the Portal?
            <ul>
                <li><a href="">Have you activated your account yet?</a></li>
                <li><a href="">Don't know your username?</a></li>
                <li><a href="">Don't know your password?</a></li>
            </ul>
            </p>
        </div>

    </body>

</html>

<?php
include('footer.php');
?>