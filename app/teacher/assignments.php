<?php

//logic for login

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;

$isStudent = false;
$displayClass = true;

$showNav = true;

$thisPage = "Assignments";

include '../header.php';
include '../config.php';

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
               $(".datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
   </script>
    </head>
    
<body>

<div class="main-container">
<center>
    <div class="all-updates">
        <!-- ADD A NEW ASSIGNMENT -->
            <div class="prev-update"><h1 id="add-h1">Add a new Assignment</h1>
                <div class="add-new-update">
                    <form action="postAssignment.php" method="post" id="add-new-assn">
                        
                    <input type="text" name="assignmentTitle" placeholder="Title of Assignment" required><br>
                    Posting Date: <?php echo $currentDate; ?> <br>
                    <p>Due Date: <input type="text" name="dueDate" class="datepicker" required></p>
                    <p>End Available Date: <input type="text" name="endDate" class="datepicker"></p><br>

                        <input type="hidden" name="postedDate" value="<?php echo $currentDate; ?>">
                        
                        <br>
                        <textarea id="textarea" method="post" type="submit" name="assnDesc"></textarea>
                        <br>

                        <div class="dload">

                            <!--Programmatically add files -->
                            <input type="checkbox" name="file" value="file">
                            <img src="../assets/img/download.png">File.file<br></div>

                        <button>Attach files</button>
                        <button>Delete files</button>
                        <button>Save Draft</button><br>
                        <input type="submit" value="Submit" />
                    </form>
                        
                        
                        
                    
                    
                    </div>
                    
                    </div> 

                <!-- current announcement -->
                <?php 
                        //$conn = new mysqli("localhost","root","", "Red-Velvet");
                        if(!$conn) {echo "error";}
                    
                        $latestPostSQL ="SELECT * from Assignment ORDER BY dueDate ASC LIMIT 1";
                    
                        $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update'><h2>" . $row["assignmentTitle"] . "</h2>" . "<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>" . "<br>" . $row["assignmentDescription"] . "<br><a href=''>Edit Assignment</a> | <a href='assignmentSubmissions.php'>View and/or Grade Submissions</a></div>";
                        }
                    } else {
                    echo "";
                        }
        
        
                    //contains older announcements   
                    $earlierPostsSQL="SELECT * FROM Assignment ORDER BY dueDate ASC LIMIT 10000 OFFSET 1";
                    
                    $result = $conn->query($earlierPostsSQL);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='prev-update'><h2>" . $row["assignmentTitle"] . "</h2>" ."<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . $row["assignmentDescription"] . "<br><a href=''>Edit Assignment</a> | <a href='assignmentSubmissions.php'>View and/or Grade Submissions</a></div>";
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

include '../footer.php';

?>