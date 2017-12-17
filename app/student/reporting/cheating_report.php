<?php
 include '../../config.php';
      //export.php
 if(isset($_POST["export_excel"]))
 {

      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=Cheating.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('Assignment ID', 'Student ID','Cheated From'));

      $result= mysqli_query($conn,"select assignmentID,isCheated,cheatedFrom from submission");

      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);
      }
      fclose($output);
 }
 ?>
