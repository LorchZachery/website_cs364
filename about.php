<?php

include('authenticate.php')

 ?>
<!DOCTYPE html>
<html>
<style>
body {

	background-image: url('images/about.jpg');
	/* Full height */
  	height: 100%;

  	/* Center and scale the image nicely */
	background-position: center;
 	background-repeat: no-repeat;
  	background-size: cover;

}

div, h3, p {

	color: white;

}

</style>
	<head>
		<title>Rock Climbing Workouts</title>
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
		<h3>About</h3>
		<p>Website Developed By Zachery Lorch and Tom McCurdy</p>
		
		<p>Last Update: 5/20/2020</p>
		
		<p>Documentation: W3schools (probably all of it), Some code in this website is copied from Dr. Coffman's CS 364 class</p>
	</body>
</html>
