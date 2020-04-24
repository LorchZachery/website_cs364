<?php

include('authenticate.php')

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Rock Climbing Workouts</title>
		<link href="format.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<ul>
			<li><a href="index.php">INTRO</a></li>
			<li><a href="submit_data.php">Add Workout</a></li>
			<li><a href="metrics.php">Metrics</a></li>
			<li><a href="report.php">Progress Report</a></li>
			<li><a href="look_up.php">Look Up Past Workouts</a></li>
			<li style="float:right"><a href="about.php">About</a></li>
			<li style="float:right"><a href="user_settings.php">Account Settings</a></li>
			<li style="float:right"><a href="log_out.php">Log Out</a></li>	
		</ul>
		<h1>Rock Climbing Workouts 101</h1>
		<p style="text-align: center">This website is made so you can log your climbing workouts and see how you progress overtime.
<br> The goal is that this will motivate you to keep training and work as hard as you can to become the best climber you can be</p>
	<div class="center_div">	
	<div class="zoom" style="background-image:url('images/workout.jpg');" ><a href="submit_data.php"><h3 style="color: black">Submit Workout</h3></a>
	</div>
	<div class="zoom" style="background-image:url('images/met.png');"><a href="metrics.php"><h3 style="color: black">View Metrics</h3></a>
	</div>
	<div class="zoom" style="background-image:url('images/report.png');"><a href="report.php"><h3 style="color: navy">View Progress Report</h3></a>
        </div>
 	<div class="zoom" style="background-image:url('images/look.png');"><a href="look_up.php"><h3 style="color: red">Look up Workouts</h3></a>
	</div>	
	</div>
</body>
</html>
