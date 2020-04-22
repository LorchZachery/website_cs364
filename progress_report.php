<?php
include 'authenticate.php';

?>	
<!DOCTYPE html>
<html>
        <head>
                <title>Rock Climbing Progress Report</title>
                <link href="format.css" rel="stylesheet" type="text/css">
        </head>
        <body>
                <ul>
                        <li><a href="index.php">INTRO</a></li>
                        <li><a href="submit_data.php">Add Workout</a></li>
                        <li><a href="progress_report.php">Progress Report</a></li>
                        <li style="float:right"><a href="about">About</a></li>
			<li style="float:right"><a href="log_out.php">Log Out</a></li>   
                </ul>
		<h1>Progress Report for <?php echo $_SESSION["username"] ?></h1>
		
		<div id="chart-container">FusionCharts will render here</div>
    		<script src="js/jquery-2.1.4.js"></script>
    		<script src="js/fusioncharts.js"></script>
    		<script src="js/fusioncharts.charts.js"></script>
    		<script src="js/themes/fusioncharts.theme.zune.js"></script>
		<script src="js/speed_graphs.js"></script>
				
		<div id="chart2">FusionChart</div>
		<script src="js/boulder_graphs.js"></script>
</body>
</html>

