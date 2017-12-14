<?php
   include ('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select username from user where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:/login.php");
   }

   if(isset($_SESSION['timeout']))
   {
    $diff=time()-$_SESSION['timeout'];
    if($diff>1800)
    {
     $sql="UPDATE sessions SET logout=now(),flag= 1, activity = TIMESTAMPDIFF(MICROSECOND,login,logout) DIV 1000000 where flag = 0";
      $result=mysqli_query($conn,$sql);
      
      session_destroy();
      header("location:/login.php");  
    }   

    }
    $_SESSION['timeout']=time();

?>