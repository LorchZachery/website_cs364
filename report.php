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
		<div class="boldtable" id="progress_report">
		<table>
			<tr>
				<td>Best Speed Time</td>
				<td align="center"><img src="images/speed.png"></td>
				<td align="center"><?php echo $speedTime; ?> s</td>
			</tr>
			<tr>
				<td>Longest Time ARC</td>
				<td align="center"><img src="images/arc.png" ></td>
				<td align="center"><?php echo $timeARC; ?> minutes</td>
			</tr>
			<tr>
				<td>Highest Boulder</td>
				<td align="center"><img src="images/boulder.png"</td>
				<td align="center">V<?php echo $bGrade; ?></td>
			</tr>
			<tr>
				<td>Highest Sport Route</td>
				<td align="center"><img src="images/sport.png" ></td>
				<td align="center" >5.<?php echo $sport ?></td>
			</tr>
		</table>
		</div>	
</body>
		
</html>

