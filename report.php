<?php
include 'authenticate.php';
include 'generate_report.php';
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
                        <li><a href="metrics.php">Meterics</a></li>
			<li><a href="report.php">Progress Report</a></li>
			<li><a href="look_up.php">Look Up Past Workouts</a></li>
			<li style="float:right"><a href="about.php">About</a></li>
			<li style="float:right"><a href="user_settings.php">Account Settings</a></li>
			<li style="float:right"><a href="log_out.php">Log Out</a></li>   
                </ul>
		<h1>Progress Report for <?php echo $_SESSION["username"] ?></h1>
		<table style="width:17%">
			<tr>
				<td>Best Speed Time</td>
				<td><?php echo $speedTime; ?></td>
			</tr>
			<tr>
				<td>Longest Time ARC</td>
				<td><?php echo $timeARC; ?></td>
			</tr>
			<tr>
				<td>Highest Boulder</td>
				<td>V<?php echo $bGrade; ?></td>
			</tr>
			<tr>
				<td>Highest Sport Route</td>
				<td>5.<?php echo $sport ?></td>
			</tr>
		</table>	
</body>
		
</html>

