<?php
include('../../config.php');
?>

<html>

<body>

<div class="main-container">
<center>
   <div class="all-updates">
        <!-- ADD A NEW ASSIGNMENT -->
            <h1 id="add-h1">Assignments</h1>
                <?php
                        //$conn = new mysqli("localhost","root","", "Red-Velvet");
                        if(!$conn) {echo "error";}
                        $latestPostSQL1 ="SELECT * from html_assignment WHERE assignmentID = 'HTML1'";
                        $result = $conn->query($latestPostSQL1);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update'><h2>" . $row["assignmentTitle"] . "</h2>" . "<br><span class='bold-text'>Submission Date: " . $row["html_submission_date"] ."<br><span class='bold-text'>Due Date: " . $row["dueDate"] . "<br><br><a href='HTML1.php'>View Submissions</a></div>";
                        //echo "<div class='current-update'><input type="submit" class="btn btn-primary" value="Active"></div>";
                        }
                    } else {
                    echo "";
                        }

                        $latestPostSQL2 ="SELECT * from html_assignment WHERE assignmentID = 'HTML2'";
                        $result = $conn->query($latestPostSQL2);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update'><h2>" . $row["assignmentTitle"] . "</h2>" . "<br><span class='bold-text'>Submission Date: " . $row["html_submission_date"] ."<br><span class='bold-text'>Due Date: " . $row["dueDate"] . "<br><br><a href='HTML2.php'>View Submissions</a></div>";
                        //echo "<div class='current-update'><input type="submit" class="btn btn-primary" value="Active"></div>";
                        }
                    } else {
                    echo "";
                  }

                    $latestPostSQL3 ="SELECT * from html_assignment WHERE assignmentID = 'HTML3'";
                    $result = $conn->query($latestPostSQL3);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<div class='current-update'><h2>" . $row["assignmentTitle"] . "</h2>" . "<br><span class='bold-text'>Submission Date: " . $row["html_submission_date"] ."<br><span class='bold-text'>Due Date: " . $row["dueDate"] . "<br><br><a href='HTML3.php'>View Submissions</a></div>";
                    //echo "<div class='current-update'><input type="submit" class="btn btn-primary" value="Active"></div>";
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
    //toggles all at once, need to change
        $(document).ready(function(){
            $(".showGrade").hide();

            $("#toggleGrade").click(function() {
                $(".showGrade").slideToggle.hide();


            });
        });

    </script>

</body>
</html>


<?php

include('../footer.php');

?>
