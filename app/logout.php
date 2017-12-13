<?php
   include ('config.php');
   session_start();
   $path = session_save_path();
   $sql="UPDATE sessions SET logout=now(),flag= 1, activity = TIMESTAMPDIFF(MICROSECOND,login,logout) DIV 1000000 where flag = 0";
   $result=mysqli_query($conn,$sql);
$files = glob($path.'/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
   ini_set('session.gc_max_lifetime', 0);
   ini_set('session.gc_probability', 1);
   ini_set('session.gc_divisor', 1);
   session_destroy();
   header("Location: login.php");
?>