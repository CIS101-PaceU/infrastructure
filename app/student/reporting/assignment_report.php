<?php
 include '../../config.php';
      //export.php
      $a = (int)$_POST['a'];
 if(isset($_POST["export_excel"]))
 {

      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=Assignment.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('Student ID', 'grade'));

      $result= mysqli_query($conn,"select userID,grade from assignment_grade where assignmentID='$a' ORDER BY grade ASC");


      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);
      }
      fclose($output);
 }
 ?>
