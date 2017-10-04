<?php

//logic for login

$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;

$isStudent = false;
$displayClass = true;

$showNav = true;

$thisPage = "Grades";

include '../header.php';
include '../config.php';

?>

<html>

<body>
    
<div class="main-container">
<center>
    <div class="all-updates">
        
        <div class="current-update">
            
            <?php
            
            $latestPostSQL ="SELECT * from assignment ORDER BY dueDate ASC LIMIT 1";
            
            $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<h2>" . $row["assignmentTitle"] . "</h2>" . "<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Date Posted: " . $row["availableDate"] . "<br>" . "<br>" . $row["assignmentDescription"] . "<br><a href=''>Edit Assignment</a> | <a href='assignmentSubmissions.php'>View and/or Grade Submissions</a>";
                        }
                    } else {
                    echo "No assignments yet.";
                        }
            
            ?>
        </div>
        
        
        <?php
        
        $earlierPostsSQL="SELECT * FROM assignment ORDER BY dueDate ASC LIMIT 10000 OFFSET 1";
        
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
    
    
    
</body>


</html>

<?php

include '../footer.php';

?>