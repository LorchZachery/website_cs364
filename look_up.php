<?php
include 'authenticate.php';
include 'workout_find.php';
?>
<!DOCTYPE html>
<html>
        <head>
                <title>Rock Climbing Progress Report</title>
                <link href="format.css" rel="stylesheet" type="text/css">
        </head>
        <body onchange="showTable(true);" >
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
		<h1>Workout Look Up</h1>
		<form method="post" action="" >
			<div class="form-group">
				<label for="startDate">FROM</label>
				<input type="date" id="startDate" name="startDate">
			</div>
			<div class= "form-group">
				<label for="endDate">TO</label>
				<input type="date" id="endDate" name="endDate">
			</div>
		<input type="submit" id="submit" value="Find Workout" name="submit" onclick="showTable(true);">
		</form>
		<div class="center" id="tableDiv" >
		<table style="width:17%">
                        <tr>
                                <th>Date</th>
                                <th>Time </th>
				<th>Duration</th>
				<th>Comments</th>
			</tr>	
			<?php
			foreach($data as $works){	
			?>
			<tr>
			<?php
				foreach($works as $work){ 
			?>
                                 <td><?php echo $work ?></td>
			<?php
				}
			?>
			</tr>
			<?php } ?>
		
		</table>
		</div>	
	</body>
	<script src="script.js"></script>
</html>

