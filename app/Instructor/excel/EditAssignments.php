<?php

$activePage = 'excel';
$isInstructor = true;
$thisPage = "Edit Assignments";

include('../../config.php');
include('../../header.php');
include('../../mobile-nav.php');
date_default_timezone_set("America/New_York");
$currentDate = date("Y/m/d");
?>
!DOCTYPE html>
<html>
  <head>
    <title>instructor excel</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
       $(function() {
               $(".datepicker").datepicker({minDate: 0 , dateFormat: "yy-mm-dd" }).val()
       });
       <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({ selector:'textarea', statusbar: false, branding: false });
        </script>  

   </script>
   </head>
   <body>
     <div class="main-page">
    <br/>
      <?php 
          include("../../navigation.php");
          
          $assignmentID=$_GET['assignmentID'];
          $result = $conn->query("SELECT * FROM assignment where assignmentID = '$assignmentID'");

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $assignmentTitle =$row["assignmentTitle"];
                  $postingDate =$row["availableDate"];
                  $dueDate =$row["dueDate"];
                  $endDate =$row["endAvailableDate"];
              }
          }
          
          ?> 
<div class="main-content">
    <div class="dashboard-container">
  <div class="section-heading"><h2><?php echo $assignmentTitle; ?></h2></div>
       </br>
       <div class="announcements-container">
       <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>   Edit <?php echo  $assignmentTitle ?> </h1>
       <div class ="prof-create">
        
            
    <div class="prof-create">
    

        <div class="create-controls">
                    <form action="UpdateAssignment.php" method="post" id="add-new-assn" enctype="multipart/form-data">
                    
                    AssignmentTitle: <input type="text" name="assignmentTitle" placeholder="Title of Assignment" value ='<?php echo $assignmentTitle; ?>'><br>
                    Posting Date: <input type="text" name="postedDateDate" class="datepicker" value ='<?php echo $postingDate; ?>' disabled="disabled"><br>
                    Due Date: <input type="text" name="dueDate" class="datepicker" value ='<?php echo $dueDate; ?>' >
                    End Available Date: <input type="text" name="endDate" class="datepicker" value ='<?php echo $endDate; ?>'><br>

                        <input type="hidden" name="assignmentID" value="<?php echo $assignmentID; ?>">
                        <br>
                       <input type="submit" value="Update" />
                        
                    </form>
                    </div>
                    </div>

</div>
</div>
</div></div>
</body>
    

</html>
