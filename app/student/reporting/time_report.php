<?php
 include '../../config.php';
      //export.php
 if(isset($_POST["export_excel"]))
 {

      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=time.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('Student ID', 'Time(in min)'));

      $result= mysqli_query($conn,"select user, SUM(activity) DIV 60 AS 'time' from sessions GROUP BY user ORDER BY time");

      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);
      }
      fclose($output);
 }
 ?>
