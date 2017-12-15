<?php

 $activePage = 'html';
 $isInstructor = true;

?>

<!DOCTYPE html>
<html>
<head>
  <title>instructor html</title>
  <link rel="stylesheet" type="text/css" href="../../stylesheets/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <?php
  include('../../header.php');
  include('../../mobile-nav.php');
?>

<div class="main-page">
     <?php
       include("../../navigation.php");
      ?>

  <div class="main-content">
  <center>
   <div class="all-updates">
        <!-- ADD A NEW ASSIGNMENT -->
            <h1 id="add-h1">Submissions</h1>
                <?php
                        //$conn = new mysqli("localhost","root","", "Red-Velvet");
                        if(!$conn) {echo "error";}
                        $latestPostSQL ="SELECT studID, studName, html_submission_date, assignmentTitle FROM html_assignment WHERE assignmentID = 'HTML3'";
                        $result = $conn->query($latestPostSQL);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='current-update'><h2>" . $row["assignmentTitle"] . "</h2>" ."<br><span class='bold-text'>Student Name: " . $row["studName"]."<br><span class='bold-text'>Student ID: " . $row["studID"]. "<br><span class='bold-text'>Submission Date: " . $row["html_submission_date"] ."<br><span class='bold-text'>Due Date: " . $row["dueDate"] . "<br><br><a href='#' onclick='myGrade()'>Grade</a></div>";
                        }
                    } else {
                    echo "";
                  }
  ?>
    </div>

</center>
</div>
</div>
<script>
function myGrade(){
  var totalmarks=100;
  var str = $("body").html();
  var n = str.match(/<+[^/]/g);
  var z = str.match(/<+['/]/g);
  n = n.length;
  z = z.length;
  var xyz;
  var total_valid_open=Math.abs(n);
 alert(total_valid_open);
  if(total_valid_open==z){
  xyz="Marks obtained:"+totalmarks;
  $("#demo").append(xyz);
  }
  else if(total_valid_open!=z){
    var x = Math.abs(total_valid_open-z);
    var total=x*2;
    totalmarks=totalmarks-total;
   xyz="You had "+ x +" number of mismatch tags. So you get: "+ totalmarks +" marks";
     $("#demo").append(xyz);
  }
}
</script>
</body>
</html>
