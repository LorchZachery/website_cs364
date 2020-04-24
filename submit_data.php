<?php
	include 'authenticate.php';
	include 'add_workout.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Submit Data</title>
		<link href="format.css" rel="stylesheet" type="text/css">
	</head>
	<body onload="showExtra(0);">
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
		<h1>Submit Workout</h1>
		<form method= "post">
		<div class="form-group">
			<label for="date">Date</label>
			<input type="date" class="form-control" name="date" id="date" required>
		</div>
		<div class="form-group">
			<label for="startTime">Start Time</label>
			<input type="time" class="form-control" name="startTime" id="startTime" required>
		</div>
		<div class="col-6">
			<label for="duration">Duration of Workout</label>
			<input type="text" id="duration" name="duration" placeholder="minutes" onchange="timeCheck();" required>
		</div>
		<div class="form-group">
			<label for="typeWorkout">Type of Workout</label>
			<select class="form-control" id="typeWorkout" name="typeWorkout" onchange="showExtra(this.value);" required>
				<option value="none"></option>
				<option value="sport">Sport</option>
				<option value="boulder">Boulder</option>
				<option value="speed">Speed</option>
			</select>
		</div>
		
		<div class="form-group" id="boulderDiv">
			<div class="row">
				<div class="col-6">
					<label for="boulderGrade">Grade</label>
					<select class="form-group" id="boulderGrade" name="boulderGrade">
						<option value="0">V0</option>
						<option value="1">V1</option>
						<option value="2">V2</option>
						<option value="3">V3</option>
						<option value="4">V4</option>
						<option value="5">V5</option>
						<option value="6">V6</option>
						<option value="7">V7</option>
						<option value="8">V8</option>
						<option value="9">V9</option>
						<option value="10">V10</option>
						<option value="11">V11</option>
						<option value="12">V12</option>
						<option value="13">V13</option>
					</select>
				</div>
				<div class="col-6">
					<label for="typeOfGrade">Type of Climb</label>
					<select class="form-group" name= typeOfGrade id="typeOfGrade">
						<option value="crimp">Crimp</option>
						<option value="power">Power</option>
						<option value="dyno">Dyno</option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="form-group" id="sportDiv">
			<div class="row">
				<div class="col-6">
					<label for-"timeARC">Time ARCed</label>
		                        <input type="text" id="timeARC" name="timeARC" placeholder="minutes" onchange="timeCheck();">
				</div>
                       		<div class="col-6">
                                        <label for="highestARCgrade">Highest Grade During ARC</label>
                                        <select class="form-group" id="highestARCgrade" name="highestARCgrade">
						<option value="6">5.6</option>
						<option value="7">5.7</option>
						<option value="8">5.8</option>
						<option value="9">5.9</option>
						<option value="10">5.10</option>
						<option value="11">5.11</option>
						<option value="12">5.12</option>
						<option value="13">5.13</option>
						<option value="14">5.14</option>
					</select>
				 </div>
				<div class="col-6">
                                        <label for="highestGrade">Highest Grade For the Workout</label>
                                        <select class="form-group" id="highestGrade" name="highestGrade">
                                                <option value="6">5.6</option>
                                                <option value="7">5.7</option>
                                                <option value="8">5.8</option>
                                                <option value="9">5.9</option>
                                                <option value="10">5.10</option>
                                                <option value="11">5.11</option>
                                                <option value="12">5.12</option>
                                                <option value="13">5.13</option>
                                                <option value="14">5.14</option>
                                        </select>
                                 </div>

			</div>
		</div>
        	 <div class="form-group" id="speedDiv">
                        <div class="row">
                                <div class="col-6">
                                        <label for="speedTime">Time</label>
                                        <input type="text" id="speedTime" name="speedTime" onchange="timeCheck();" placeholder="10.00">
                                </div>
				<div class="col-6">
					<label for="attempts">Attempts</label>
					<input type="number" id="attempts" name="attempts" min="1">
				</div>
                        </div>
                </div>
		<div class="form-group">
			<label for="comments">Comments/Notes</label>
			<textarea class="form-control" name="comments" id="comments" rows="1" cols="33"></textarea>
		</div>
		<input type="submit" value="Submit" name="submit" id="submit">
		<?php echo $message; ?>	
	</form>
	</body>
       	<script src="script.js"></script>

</html>
