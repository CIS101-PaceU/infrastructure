<?php

//logic for login

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;

$isStudent = false;
$displayClass = true;

$showNav = true;

$thisPage = "Edit Assignments";

include '../../header.php';
include '../../config.php';

//for new posts

date_default_timezone_set("America/New_York");
$currentDate = date("Y/m/d");

// . " " . date("G:i:s")

?>

<html>
    
    <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
       $(function() {
               $(".datepicker").datepicker({minDate: 0 , dateFormat: "yy-mm-dd" }).val()
       });
   </script>
    </head>
    
<body>

<div class="main-container">
<center>
<?php
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
$result = $conn->query("SELECT * FROM excelassignments where assignmentID = '$assignmentID'"); 
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        
    }
}
?>
<div class="prev-update"><h1 id="add-h1">Update Assignment:</h1><br>
   <div class="add-new-update">
                    <form action="UpdateAssignment.php" method="post" id="add-new-assn" enctype="multipart/form-data">
                    
                    <p>AssignmentTitle: <input type="text" name="assignmentTitle" placeholder="Title of Assignment" value ='<?php echo $assignmentTitle; ?>'><br>
                    <p>Posting Date: <input type="text" name="postedDateDate" class="datepicker" value ='<?php echo $postingDate; ?>' disabled="disabled"></p><br>
                    <p>Due Date: <input type="text" name="dueDate" class="datepicker" value ='<?php echo $dueDate; ?>' ></p>
                    <p>End Available Date: <input type="text" name="endDate" class="datepicker" value ='<?php echo $endDate; ?>'></p><br>

                        <input type="hidden" name="assignmentID" value="<?php echo $assignmentID; ?>">
                        <!--<textarea id="textarea" method="post" type="submit" name="assnDesc"></textarea> <br>-->
                        
                        <p>Select Key File:</p> 
							<input type="file" 	 name="excelFile" /><br/>
						<p>Select Prompt File:</p> 
							<input type="file" 	 name="submittedFile" /><br/>
                        <br>
                        <div class="dload">
                        
                        <input type="submit" value="Update" />
                        </div>
                    </form>
                        
                        
                        
                    
                    
                    </div>
                    </div>

</center>
</div>

   
</body>
</html>


<?php

include '../../footer.php';

?>