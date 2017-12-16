<?php
   $path = session_save_path();

$files = glob($path.'/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
   ini_set('session.gc_max_lifetime', 0);
   ini_set('session.gc_probability', 1);
   ini_set('session.gc_divisor', 1);
   session_destroy();
   header("Location: /");
?>
