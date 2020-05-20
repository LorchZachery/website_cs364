<?php
include 'authenticate.php';

?>	
<!DOCTYPE html>
<html>
<style>
body {

	background-image: url('images/stats.jpg');
	/* Full height */
  	height: 100%;

  	/* Center and scale the image nicely */
	background-position: center;
 	background-repeat: no-repeat;
  	background-size: cover;

}

div, h1 {

	color: white;

}

</style>
        <head>
                <title>Rock Climbing Progress Report</title>
                <link href="format.css" rel="stylesheet" type="text/css">
        </head>
        <body>
                <ul style="background-color: #ba9070;">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="submit_data.php">Add Workout</a></li>
			<li><a href="metrics.php">Metrics</a></li>
			<li><a href="report.php">Progress Report</a></li>
			<li><a href="look_up.php">Look Up Past Workouts</a></li>
			<li style="float:right"><a href="about.php">About</a></li>
			<li style="float:right"><a href="user_settings.php">Account Settings</a></li>
			<li style="float:right"><a href="log_out.php">Log Out</a></li>   
                </ul>
		<h1>Metrics for <?php echo $_SESSION["username"] ?></h1>
		
		<div id="chart-container" class="table_form">FusionCharts will render here</div>
    		<script src="js/jquery-2.1.4.js"></script>
    		<script src="js/fusioncharts.js"></script>
    		<script src="js/fusioncharts.charts.js"></script>
    		<script src="js/themes/fusioncharts.theme.zune.js"></script>
		<script src="js/speed_graphs.js"></script>
				
		<div id="chart2" class="table_form">FusionChart</div>
		<script src="js/boulder_graphs.js"></script>
		
		<div id="chart3" class="table_form">Fusionchar</div>
		<script src="js/sport_graphs.js"></script>
		
		<div id="chart4" class="table_form">FusionChart</div>
		<script src="js/duration_graphs.js"></script>
</body>
</html>

