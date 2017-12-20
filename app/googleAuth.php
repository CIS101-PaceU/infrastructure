<?php
session_start();
include ('config.php');

$email = mysqli_real_escape_string($conn,$_POST['email']);
$id = mysqli_real_escape_string($conn,$_POST['id']); 

$sql = "SELECT u.userName, u.userID, u.firstName, u.lastName, r.role FROM user u
JOIN user_role r ON u.userID = r.userID
WHERE u.googleGmailAddress = '$email' and u.googleUserID = '$id'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1) {
    
 $_SESSION['login_user'] = $row['userName'];
 $_SESSION['login_userID'] = $row['userID'];
 $_SESSION['login_role'] = $row['role'];
 $_SESSION['login_fName'] = $row['firstName'];
 $_SESSION['login_lName'] = $row['lastName'];
    
 if($_SESSION['login_role'] == "Student"){
     echo "Student";
 } else if($_SESSION['login_role'] == "Instructor"){
     echo "Instructor";
 }

}else {
 $error = "Your Username or Password is invalid";
}

?>