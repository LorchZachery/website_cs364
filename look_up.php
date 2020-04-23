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
        <body>
                <ul>
                        <li><a href="index.php">INTRO</a></li>
                        <li><a href="submit_data.php">Add Workout</a></li>
                        <li><a href="metrics.php">Meterics</a></li>
                        <li><a href="report.php">Progress Report</a></li>
                        <li><a href="look_up.php">Look Up Past Workouts</a></li>
                        <li style="float:right"><a href="about">About</a></li>
                        <li style="float:right"><a href="log_out.php">Log Out</a></li>
                </ul>
		<h1>Workout Look Up</h1>
		<form method="post" action="">
			<div class="form-group">
				<label for="startDate">FROM</label>
				<input type="date" id="startDate" name="startDate">
			</div>
			<div class= "form-group">
				<label for="endDate">TO</label>
				<input type="date" id="endDate" name="endDate">
			</div>
		<input type="submit" value="Find Workout" name="submit">
		</form>
		<table style="width:17%">
                        <tr>
                                <td>Date</td>
                                <td><?php echo $date; ?></td>
                        </tr>
                        <tr>
                                <td>Time Started</td>
                                <td><?php echo $time; ?></td>
                        </tr>
                        <tr>
                                <td>Duration</td>
                                <td><?php echo $duration; ?></td>
                        </tr>
                        <tr>
                                <td>Comments</td>
                                <td><?php echo $comments ?></td>
                        </tr>
                </table>
	<?php echo print_r($data); ?>	
	</body>
</html>

