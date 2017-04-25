<?php

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = false;

$isStudent = true;
$displayClass = false;

$showNav = true;

$thisPage = "Grades";

include '../header.php';
include '../config.php';

?>

<html>
<body>
    <div class="main-container">
        
        <center>
            
            <h1>Grades</h1>
            <div class="all-updates">
            
            <?php
        
        $earlierPostsSQL="SELECT * FROM Assignment ORDER BY dueDate ASC LIMIT 10000";
        
        $result = $conn->query($earlierPostsSQL);
        
        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='prev-update'><h2>" . $row["assignmentTitle"] . "</h2>" ."<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>
                        
                        <span class='bold-text'>Grade:</span> xx
                        <br><span class='bold-text'>Grader Comments: xxx
                        
                        </div>";
                        }
                    } else {
                    echo "";
                        }
        ?>
                
            </div>
        
        </center>
    
    </div>
</body>
</html>


<?php
include '../footer.php';
?>