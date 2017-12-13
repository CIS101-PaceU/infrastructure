<?php include '../../config.php'; ?>
<?php
$belowRoot = true;
$isLoggedIn = true;
$isTeacher = false;
$isStudent = true;
$displayClass=true; //display the class name after the prof selects section from dropdown
$showNav = true; //don't display navigation if teacher hasn't selected class from drowpdown
include '../../header.php';
?>
<html>
	<head>
		<title>ChartJS - BarGraph</title>
		<style type="text/css">
			#chart-container {
				width: 800px;
				height: auto;
			}
		</style>
	</head>
	<body>

<div style="margin-left:25%;padding:1px 16px;">
		<div id="chart-container">
			<canvas id="mycanvas"></canvas>
		</div>
<a id='head-links' href='process.php'>back</a>
</div>

		<!-- javascript -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/Chart.min.js"></script>
		<script type="text/javascript" src="js/barapp.js"></script>
	</body>
</html>

<?php
include '../../footer.php';

?>
