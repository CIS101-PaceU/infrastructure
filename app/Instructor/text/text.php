
<?php
date_default_timezone_set("America/New_York");
$currentDate = date("Y/m/d");
?>

<html>
    
    <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

    <div class="all-updates">
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({ selector:'textarea', statusbar: false, branding: false });
        </script>  
        <!-- ADD A NEW ASSIGNMENT -->
            <div style="border-radius: 25px; border: 2px solid #73AD21; padding: 20px;" onMouseOver="this.style.cursor='pointer';"><h2 id="add-h1">New Text Assignment</h2>
                <div class="add-new-update">
                    <form action="InstructorCreateEditProcess.php" method="post" id="add-new-assn">
                        
                    <input type="text" name="assName" placeholder="Title of Assignment" required><br>
                    Posting Date: <?php echo $currentDate; ?>
                    <p>Due Date: <input type="text" name="dueDate" class="datepicker" required></p>                        
                    Instructions:
                        <textarea id="textarea" method="post" type="submit" name="Instructions"></textarea>
                        <br>
                        <input type="submit" value="Submit" />
                    </form>
                        
                        
                        
                    
                    
                    </div>
                    
                    </div> 

                <?php 
                        //$conn = new mysqli("localhost","root","", "Red-Velvet");
                        if(!$conn) {echo "error";}
                    
                        $latestPostSQL ="SELECT * from text_assignment ORDER BY dueDate DESC LIMIT 1";
                    
                        $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update'><div id='divAss". $row["assId"] ."'><h2>" . $row["assName"] . "</h2>" . "<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Instructions: " . $row["Instructions"] ."</div>". 
                        "<div id='assDiv". $row["assId"] ."' style='display: none;'><form action='InstructorAssignmentEditProcess.php' method='post' id='add-new-assn'>
                        <input type='text' name='assId' value='". $row["assId"] ."' style='display: none;' required><br>
                        <input type='text' name='assName' value='". $row["assName"] ."' required><br>
                        <p>Due Date: <input type='text' name='dueDate' class='datepicker' value='" . $row["dueDate"] . "' required></p>                        
                            <br><textarea id='textarea' method='post' type='submit' name='Instructions'>" . $row["Instructions"] . "</textarea><br>
                            <input type='submit' value='Edit' />
                        </form></div>" .
                        "<br><span href='#' style='text-decoration: none; color: #01508d; font-weight: 700;' onclick='EditAssignmentToggle(".$row["assId"].");'>Edit Assignment</span> | <a href='textSubmissions.php?assId=". $row["assId"] . "'>View and/or Grade Submissions</a></div><hr />";
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
                        echo "<div class='current-update'><div id='divAss". $row["assId"] ."'><h2>" . $row["assName"] . "</h2>" ."<span class='bold-text'>Due Date: " . $row["dueDate"] . "</span><br>Instructions: " . $row["Instructions"] ."</div>"
                        ."<div id='assDiv". $row["assId"] ."' style='display: none;'><form action='InstructorAssignmentEditProcess.php' method='post' id='add-new-assn'>
                        <input type='text' name='assId' value='". $row["assId"] ."' style='display: none;' required><br> 
                    <input type='text' name='assName' value='". $row["assName"] ."' required><br>
                    <p>Due Date: <input type='text' name='dueDate' class='datepicker' value='" . $row["dueDate"] . "' required></p>                        
                        <br><textarea id='textarea' method='post' type='submit' name='Instructions'>" . $row["Instructions"] . "</textarea><br>
                        <input type='submit' value='Edit' />
                    </form></div>" .
                        "<br><span href='#' style='text-decoration: none; color: #01508d; font-weight: 700;' onclick='EditAssignmentToggle(".$row["assId"].");'>Edit Assignment</span> | <a href='textSubmissions.php?assId=". $row["assId"] . "'>View and/or Grade Submissions</a></div><hr />";
                        }
                    } else {
                    echo "";
                        }

                ?>
                
        
    </div>


</div>
    
    <script>
        
    //toggle assignment module
        $(document).ready(function(){
            $(".add-new-update").hide();

            $("#add-h1").click(function() {
                $(".add-new-update").slideToggle("fast");
            });
        });
    
    //toggle edit assignment module
        function EditAssignmentToggle(assId){
            if($("#assDiv"+assId).css('display') == 'none' ){
                $("#assDiv"+assId).show();
            } else{
                $("#assDiv"+assId).hide();
            }

            if($("#divAss"+assId).css('display') == 'none' ){
                $("#divAss"+assId).show();
            } else{
                $("#divAss"+assId).hide();
            }
            
        }

    
    </script>
    
</body>
</html>
