<?php
 include '../../config.php';
      //export.php
 if(isset($_POST["export_excel"]))
 {

      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=Attendance.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('Student ID', 'Present Classes', 'Marks'));

      $result= mysqli_query($conn,"select userID,present_classes,grades from attendance order by present_classes ASC");
     
      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);
      }
      fclose($output);
 }
 ?>
