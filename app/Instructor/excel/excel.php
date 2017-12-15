<?php 

 $activePage = 'excel';
 $isInstructor = true;

?>
<?php
$thisPage = "Instructor Excel Assignments";

include('../../session.php');
include '../../config.php';

//for new posts

date_default_timezone_set("America/New_York");
$currentDate = date("Y/m/d");

// . " " . date("G:i:s")

?>
<!DOCTYPE html>
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
       h2{
	text-align: left;    
}
   </script>
     </head
     <body> 
 
  

<div class="dashboard-container">
  <div class="section-heading"><h2><?php echo $_SESSION[arrayObject][1] . '|' . $_SESSION[arrayObject][2]; ?></h2></div>
      
        <div class="announcements-container">
        
        <h1><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel Assignments</h1>

    <div class="all-announcements">
    <div class="prof-create">
    <h2 >Add new Excel Assignment</h2>

        <div class="create-controls">
   
                    <form action="postExcelAssignments.php" method="post" id="add-new-assn" enctype="multipart/form-data">
                        
                    <input type="text" name="assignmentTitle" placeholder="Title of Assignment" required><br>
                    Posting Date: <?php echo $currentDate; ?> <br>
                    Due Date: <input type="text" name="dueDate" class="datepicker" required> 
                    End Available Date: <input type="text" name="endDate" class="datepicker">
                    <input type="hidden" name="postedDate" value="<?php echo $currentDate; ?>">
                    Select Key File:
							<input type="file" 	 name="excelFile" required/><br/>
						Select Prompt File:
							<input type="file" 	 name="submittedFile" required/><br/>
                        <br>
                        <input type="submit" value="Submit" />
                    </form>
                    </div>
                    </div>


            <?php 
                        //$conn = new mysqli("localhost","root","", "Red-Velvet");
                        if(!$conn) {echo "error";}
                        
                        $latestPostSQL ="SELECT * from assignment where assignmentType ='Excel' ORDER BY dueDate DESC LIMIT 1";
                    
                        $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update entry announcement-entry'><h2>" . $row["assignmentTitle"] . "</h2>" . "<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>" . "<br>" . $row["assignmentDescription"] . "<br><a href='EditAssignments.php?assignmentID=" . $row["assignmentID"] ."'>Edit Assignment</a> | <a href='assignmentSubmissions.php?assignmentID=" . $row["assignmentID"] ."'>View Submissions</a></div>";
                        }
                    } else {
                    echo "";
                        }
        
        
                    //contains older announcements   
                    $earlierPostsSQL="SELECT * FROM assignment where assignmentType ='Excel' ORDER BY dueDate DESC LIMIT 10000 OFFSET 1";
                    
                    $result = $conn->query($earlierPostsSQL);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='prev-update entry announcement-entry'><h2>" . $row["assignmentTitle"] . "</h2>" ."<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>" . "<br>" . $row["assignmentDescription"] . "<br><a href='EditAssignments.php?assignmentID=" . $row["assignmentID"] ."'>Edit Assignment</a> | <a href='assignmentSubmissions.php?assignmentID=" . $row["assignmentID"] ."'>View Submissions</a></div>";
                        }
                    } else {
                    echo "";
                        }

                ?>         
</div></div>
</div>
</html>
