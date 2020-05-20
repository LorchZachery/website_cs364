<?php

include('authenticate.php')

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Rock Climbing Workouts</title>
		<link href="format.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
		.slides {display:none;}
		</style>
		
	</head>
	<body>
		<ul style="background-color: #ba9070;">
			<li><a href="index.php">INTRO</a></li>
			<li><a href="submit_data.php">Add Workout</a></li>
			<li><a href="metrics.php">Metrics</a></li>
			<li><a href="report.php">Progress Report</a></li>
			<li><a href="look_up.php">Look Up Past Workouts</a></li>
			<li style="float:right"><a href="about.php">About</a></li>
			<li style="float:right"><a href="user_settings.php">Account Settings</a></li>
			<li style="float:right"><a href="log_out.php">Log Out</a></li>	
		</ul>
	
		<div style="max-width:100%; " class="center_slide" >	
		<img class="slides w3-animate-fading" src="images/img1.png" style="width:100%; height:700px">
		<img class="slides w3-animate-fading" src="images/img2.png" style="width:100%;" height=700>
		<img class="slides w3-animate-fading" src="images/img3.png" style="width:100%;" height=700>
		<img class="slides w3-animate-fading" src="images/img4.png" style="width:100%;" height=700>
		</div>
		<script src="slideshow.js"></script>
		<h1>Rock Climbing Workouts 101</h1>	
	<p style="text-align: center">This website is made so you can log your climbing workouts and see how you progress overtime.
<br> The goal is that this will motivate you to keep training and work as hard as you can to become the best climber you can be</p>
	<div class="center_div">	
	<div class="zoom" style="background-image:url('images/dumbbell-solid.svg');" ><a href="submit_data.php"></a>
	</div>
	<div class="zoom" style="background-image:url('images/chart.svg');"><a href="metrics.php"></a>
	</div>
	<div class="zoom" style="background-image:url('images/folder.svg');"><a href="report.php"></a>
        </div>
 	<div class="zoom" style="background-image:url('images/search-solid.svg');"><a href="look_up.php"></a>
	</div>	
	</div>

</body>
</html>
