

<center><h1>Text Assignments</h1></center>
<center><p>View, write, submit and manage your text assignments.</p></center>

<?php
date_default_timezone_set("America/New_York");
$currentDate = date("Y/m/d");
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
        <!-- ADD A NEW ASSIGNMENT
            <div class="prev-update"><h1 id="add-h1">New Assignment</h1>
                <div class="add-new-update"></div>

                     <!
                    <form action="InstructorCreateEditProcess.php" method="post" id="add-new-assn">
                    
                    <input type="text" name="assName" placeholder="Title of Assignment" required><br>
                    Posting Date: <?php echo $currentDate; ?> <br>
                    <p>Due Date: <input type="text" name="dueDate" class="datepicker" required></p>                        
                        <br>
                        <textarea id="textarea" method="post" type="submit" name="Instructions"></textarea>
                        <br>

                        <div class="dload">
                            <input type="checkbox" name="file" value="file">
                            <img src="../assets/img/download.png">File.file<br></div>

                        <button>Attach files</button>
                        <button>Delete files</button>
                        <button>Save Draft</button><br>
                        <input type="submit" value="Submit" />
                    </form>
                                            
                    </div>  current-update -->

                <?php 
                        //$conn = new mysqli("localhost","root","", "Red-Velvet");
                        if(!$conn) {echo "error";}
                    
                        $latestPostSQL ="SELECT * from text_assignment ORDER BY dueDate DESC LIMIT 1";
                    
                        $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update'> <form action='StudentSubmission.php' method='post' id='add-new-assn'> <h2 id='add-h". $row['assId'] ."' onClick='displayAssignment(". $row['assId'] .")' >" . $row["assName"] . "</h2>" . "<div class='add-new-update". $row['assId'] ."' style='display: none;'> <input type='text' name='assId' value='" . $row['assId'] ."' style='display: none;'>  <span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Instructions: " . $row["Instructions"] . "<br></br> <input type='text' name='studId' placeholder='Enter Student ID' required> <br></br>" . " 
                        <textarea id='textarea' method='post' type='submit' name='assText'> </textarea> </br> <input type='submit' value='Submit'/> </form> </div></div>";
                        }
                    } else {
                    echo "";
                        }
        
        
                    //contains older announcements   
                    $earlierPostsSQL="SELECT * FROM text_assignment ORDER BY dueDate DESC LIMIT 10000 OFFSET 1";
                    
                    $result = $conn->query($earlierPostsSQL);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='prev-update'> <form action='StudentSubmission.php' method='post' id='add-new-assn'> <h2 id='add-h". $row['assId'] ."' onClick='displayAssignment(". $row['assId'] .")' >" . $row["assName"] . "</h2>" ."<div class='add-new-update". $row['assId'] ."' style='display: none;'> <input type='text' name='assId' value='" . $row['assId'] ."' style='display: none;'> <span class='bold-text'>Due Date: " . $row["dueDate"] . "</span> <br> Instructions: " . $row["Instructions"] . "<br></br> <input type='text' name='studId' placeholder='Enter Student ID' required> <br></br>" . "
                        <textarea id='textarea' method='post' type='submit' name='assText'> </textarea> </br> <input type='submit' value='Submit'/> </form> </div> </div>";
                        }
                    } else {
                    echo "";
                        }

                ?>
                


</center>
</div>
</div>
    <script>
        
    //toggle assignment module
    function displayAssignment(assId){
                //alert(assId);
                $(".add-new-update"+assId).slideToggle("fast");
    }

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