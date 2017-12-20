<?php

 $activePage = 'html';
 $isInstructor = false;

?>
<html>
<head>
  <title>HTML- Submit</title>
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
<div id="foo">
<form action="create_upload.php" method="post" enctype="multipart/form-data">
<h2>Assignment Name: </h2>
<input type="text" name="aname" id="assignmentname"><br>
 <h2> Due Date: </h2>
 <input type="date" name="datedue" id="duedate"><br>
 <h2> Description: </h2>
 <input type="text" name=desc"" id="assignmentname"><br>
<br/><br/>
    <input type="submit" value="Add Assignment" name="submit">
</form>
</div>
</center>
</div>
</div>
</body>
</html>
<?php
include('../../footer.php');
 ?>
