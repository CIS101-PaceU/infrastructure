<!DOCTYPE html>
<html>
	<?php include 'Config.php'; ?>

<head>
	<title>Attendance</title>
	<meta charset="utf-8">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
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
	<div id="contents"style="padding: 70px; border: 1px solid #000000; margin: 25px; ">
		<h1>ATTENDANCE</h1>
		
		<form name="Attendance" style="align-content: center;" action='qrpage.php' method='post' onsubmit="return validateForm()">
			<table style="align-content: centre;" >
				<TR>
					<TD> <label>Date: </label></TD>
					<TD><input type='text' style="height: 20px; width: 200px;" name='date' id='datepicker' readonly="readonly" required></td>
				</TR>
				
				<TR>
					<TD><label>Event Name: </label></TD>
          			<TD>
						<select type='text' name='text' id='text' required style="height: 25px; width: 205px;">
          			  	<?php
             				 do
              				{
           			 	?>
								<option value="<?php echo $row['Event_id'];?>"><?php echo $row['Event_name']; ?></option>";
						 <?php
						 	}while($row = mysqli_fetch_array($result))
						 ?>
						 </select>
					</TD> 
				</TR>
				 <TR>
				 	<TD><label>Active Time: </label> <div id='slider' style="width:160px;"></div></TD>
					<TD><input name='time' id='amount' maxlength="2" size="2" readonly="readonly" required style="height: 20px; width: 200px;"><label>min</label></TD>
				</TR>
				<br>
				<TR>
					
					<TD> <BR> <input type='submit' value='Submit' readonly="readonly"></TD>
				</TR>
			</TABLE>
      </form>
	 </div>
</body>

</html>
