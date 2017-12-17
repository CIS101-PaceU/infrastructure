<!DOCTYPE html>
<html>

<?php
  $servername = "phpmyadmin.cw74xrxhh0s2.us-east-1.rds.amazonaws.com";
  $username = "phpmyadmin";
  $password = "CIS101portal-db";
  $dbname = "portal-db";
  $port = 3306;

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname, $port);

  // Check connection
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  } 

  $query = "SELECT * FROM events";
  mysqli_query($conn, $query) or die(' error querrring the datbase');

  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
?>


<head>
  <title>Attendance</title>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
  
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <script>
      <!--date picker-->
      $( function() 
      {
       $( "#datepicker" ).datepicker({ minDate: 0 });
      });
    
      <!--slider-->
       $( function() 
       {
         $( "#slider" ).slider(
         {
           range: "min",
           min: 1,
           max: 20,
           value: 10,
            slide: function( event, ui ) 
            {
               $( "#amount" ).val( ui.value );
             }
         });
          $( "#amount" ).val($( "#slider" ).slider( "value" ));
       });

       <!--validate form-->
       function validateForm() 
       {
          var date = document.forms["Attendance"]["date"].value;
          if (date == "") 
          {
            alert("Date must be filled out");
            return false;
          }
      }


  </script>

</head>

<body>
  <div id="contents">
    <h1>Attendance</h1>
      <form name="Attendance" style="text-align: center;" action='qrpage.php' method='post' onsubmit="return validateForm()"><br>
        <label>Date:  <br><input type='text' name='date' id='datepicker' readonly="readonly" required><br></label>
        <label>Event Name: <br>
          <select type='text' name='text' id='text' required>
            <?php
              do
              {
            ?>
                <option value="<?php echo $row['Event_id'];?>"><?php echo $row['Event_name']; ?></option>";
            <?php
              }while($row = mysqli_fetch_array($result))
            ?>
            ?>
          </select>
          <br></label>
        <label>Active Time:<br>
            <input name='time' id='amount' maxlength="2" size="2" readonly="readonly" required><label>Minutes</label>
          <div id='slider' style="width:160px; text-align: center;""></div>
        </label>
        <br>
        <input type='submit' value='Submit' readonly="readonly">
      </form>
  </div>
</body>

</html>




