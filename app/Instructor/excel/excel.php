<?php

//logic for login

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;

$isStudent = false;
$displayClass = true;

$showNav = true;

$thisPage = "Excel Assignments";


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
    <div class="all-updates">
    <div class="prev-update"><h1 id="add-h1">Add new Excel Assignment</h1>
                <div class="add-new-update">
                    <form action="postExcelAssignments.php" method="post" id="add-new-assn" enctype="multipart/form-data">
                        
                    <input type="text" name="assignmentTitle" placeholder="Title of Assignment" required><br>
                    Posting Date: <?php echo $currentDate; ?> <br>
                    <p>Due Date: <input type="text" name="dueDate" class="datepicker" required></p>
                    <p>End Available Date: <input type="text" name="endDate" class="datepicker"></p><br>

                        <input type="hidden" name="postedDate" value="<?php echo $currentDate; ?>">
                        <!--<textarea id="textarea" method="post" type="submit" name="assnDesc"></textarea> <br>-->
                        
                        <p>Select Key File:</p> 
							<input type="file" 	 name="excelFile" required/><br/>
						<p>Select Prompt File:</p> 
							<input type="file" 	 name="submittedFile" required/><br/>
                        <br>
                        <div class="dload">
                        
                        <input type="submit" value="Submit" />
                        </div>
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
                        echo "<div class='current-update'><h2>" . $row["assignmentTitle"] . "</h2>" . "<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>" . "<br>" . $row["assignmentDescription"] . "<br><a href='EditAssignments.php?assignmentID=" . $row["assignmentID"] ."'>Edit Assignment</a> | <a href='assignmentSubmissions.php?assignmentID=" . $row["assignmentID"] ."'>View Submissions</a></div>";
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
                        echo "<div class='prev-update'><h2>" . $row["assignmentTitle"] . "</h2>" ."<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>" . "<br>" . $row["assignmentDescription"] . "<br><a href='EditAssignments.php?assignmentID=" . $row["assignmentID"] ."'>Edit Assignment</a> | <a href='assignmentSubmissions.php?assignmentID=" . $row["assignmentID"] ."'>View Submissions</a></div>";
                        }
                    } else {
                    echo "";
                        }

                ?>         
</div>

</center>
</div>
 <script>
        
    //toggle assignment module
        $(document).ready(function(){
            $(".add-new-update").hide();

            $("#add-h1").click(function() {
                $(".add-new-update").slideToggle("fast");
            });
        });
        
    
    </script>
   
</body>
</html>


<?php



?>