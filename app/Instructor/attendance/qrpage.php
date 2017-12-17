<!DOCTYPE html>

<?php include 'Config.php'; ?>

<html>

<head>
	<title>Generated QR code</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
	<script type="text/javascript">
		var seconds = <?php echo $_POST['time'] ?>*60; //converting min to sec
      		function secondPassed() 
      		{
          		var minutes = Math.round((seconds - 30)/60),
              	remainingSeconds = seconds % 60;
              	if (remainingSeconds < 10) 
              	{
              		remainingSeconds = "0" + remainingSeconds;
              		time =1;
          		}
          		document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
          		if (seconds == 0) 
          		{
              		document.getElementById('countdown').innerHTML = "Times Up!!";
              		document.getElementById('image').innerHTML = "<br> <br> <img src=\'Late_0.png\' height='500' width='500' align='center'>" ;
              	} 
              	else 
              	{
              		seconds--;
          		}
      		}
      	var countdownTimer = setInterval('secondPassed()', 1000);
	</script>
</head>

<body>


	<div id="contents_qrpage">
		<div id="timer">
			<h1><time id="countdown"><?php echo $_POST['time']?>:00</time></h1>
		</div>
		<div id="image">
			<?php
				
				$input_text = $_POST['text'];
				$input_date = $_POST['date'];
				$minutes = $_POST['time'];
				$seconds = time() + $minutes*60;
				
				date_default_timezone_set("America/New_York");
				$startTime = date("Y-m-d H:i:s");
				$endTime = date('Y-m-d H:i:s', $seconds);
				
				echo "<img src='qr_img.php?d=$input_text' height='500' width='500' align='center'>";
          		
          		$sql_id = mysqli_real_escape_string($conn,$_POST["text"]);
          		$sql_time_start = mysqli_real_escape_string($conn, $start_time);
          		$sql_active_time = mysqli_real_escape_string($conn, $minutes);
          		
          		$query_y = " UPDATE events 
          					 SET Active = 'Y', Active_Time = $sql_active_time, Start_Time = '$startTime', End_Time = '$endTime'
          					 WHERE Event_id = $sql_id ";
          		mysqli_query($conn, $query_y) or die(' error 1 querrring the datbase');
          		
          		do
          		{
            		$query_n = " UPDATE events 
            					 SET Active = 'N', Active_Time = 0, Start_Time = 0, End_Time = 0
            					 WHERE Event_id <> $sql_id ";
            		
            		mysqli_query($conn, $query_n) or die(' error 2 querrring the datbase');
          		}while($row = mysqli_fetch_array($result))
			?>
		</div>
	</div>
</body>
</html>





