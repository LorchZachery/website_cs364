<?php
	include 'authenticate.php';
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
			<li><a href="progress_report.php">Progress Report</a></li>
			<li style="float:right"><a href="about">About</a></li>
			<li style="float:right"><a href="log_out.php">Log Out</a></li>
		</ul>
		<h1>Submit Workout</h1>
		<form class="p-3">
		<div class="form-group">
			<label for="userName">Username</label>
			<input type="text" class="form-conrol" id="userName" placeholder="Couger" required>
		</div>
		<div class="form-group">
			<label for="date">Date</label>
			<input type="date" class="form-control" id="date" required>
		</div>
		<div class="form-group">
			<label for="startTime">Start Time</label>
			<input type="time" class="form-control" id="startTime" required>
		</div>
		<div class="col-6">
			<label for="duration">Duration of Workout</label>
			<input type="text" id="duration" placeholder="minutes" onchange="timeCheck();" required>
		</div>
		<div class="form-group">
			<label for="typeWorkout">Type of Workout</label>
			<select class="form-control" id="typeWorkout" onchange="showExtra(this.value);" required>
				<option value="speed"></option>
				<option value="sport">Sport</option>
				<option value="boulder">Boulder</option>
				<option value="speed">Speed</option>
			</select>
		</div>
		
		<div class="form-group" id="boulderDiv">
			<div class="row">
				<div class="col-6">
					<label for="boulderGrade">Grade</label>
					<select class="form-group" id="boulderGrade">
						<option value="vZero">V0</option>
						<option value="vOne">V1</option>
						<option value="vTwo">V2</option>
						<option value="vThree">V3</option>
					</select>
				</div>
				<div class="col-6">
					<label for="typeOfGrade">Type of Climb</label>
					<select class="form-group" id="typeOfGrade">
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
                                	<label for="length">Duration</label>
					<input type="text" id="length" name="lenght">
                                </div>
                       		<div class="col-6">
                                        <label for="grade">How many 5.6</label>
                                        <select class="form-group" id="sportGrade">
                                                <option value="sixZero"></option>
                                        	<option value="sixOne">1</option>
                                	        <option value="sixTwo">2</option>
                        	                <option value="sixThree">3</option>
						<option value="sixFour">4</option>
						<option value="sixFive">5</option>
						<option value="sixSix">6</option>
						<option value="sixSeven">7</option>
						<option value="sixEight">8</option>
						<option value="sixNine">9</option>
						<option value="sixTen">10</option>
						<option value="sixPlus">10+</option>
                	                </select>
        	                 </div>
				 <div class ="col-6">
				 <label for="grade">How many 5.7</label>
                                        <select class="form-group" id="sportGrade">
                                                <option value="sevenZero"></option>
                                                <option value="sevenOne">1</option>
                                                <option value="sevenTwo">2</option>
                                                <option value="sevenThree">3</option>
                                                <option value="sevenFour">4</option>
                                                <option value="sevenFive">5</option>
                                                <option value="sevenSix">6</option>
                                                <option value="sevenSeven">7</option>
                                                <option value="sevenEight">8</option>
                                                <option value="sevenNine">9</option>
                                                <option value="sevenTen">10</option>
                                                <option value="sevenPlus">10+</option>
                                        </select>
				</div>
				<div class="col-6">
				<label for="grade">How many 5.8</label>
                                        <select class="form-group" id="sportGrade">
                                                <option value="eightZero"></option>
                                                <option value="eightOne">1</option>
                                                <option value="eightTwo">2</option>
                                                <option value="eightThree">3</option>
                                                <option value="eightFour">4</option>
                                                <option value="eightFive">5</option>
                                                <option value="eightSix">6</option>
                                                <option value="eightSeven">7</option>
                                                <option value="eightEight">8</option>
                                                <option value="eightNine">9</option>
                                                <option value="eightTen">10</option>
                                                <option value="eightPlus">10+</option>
                                        </select>
				</div>
				<div class="col-6">
				<label for="grade">How many 5.9</label>
                                        <select class="form-group" id="sportGrade">
                                                <option value="nineZero"></option>
                                                <option value="nineOne">1</option>
                                                <option value="nineTwo">2</option>
                                                <option value="nineThree">3</option>
                                                <option value="nineFour">4</option>
                                                <option value="nineFive">5</option>
                                                <option value="nineSix">6</option>
                                                <option value="nineSeven">7</option>
                                                <option value="nineEight">8</option>
                                                <option value="nineNine">9</option>
                                                <option value="nineTen">10</option>
                                                <option value="ninePlus">10+</option>
                                        </select>
				</div>
				<div class="col-6">
				<label for="grade">How many 5.10</label>
                                        <select class="form-group" id="sportGrade">
                                                <option value="tenZero"></option>
                                                <option value="tenOne">1</option>
                                                <option value="tenTwo">2</option>
                                                <option value="tenThree">3</option>
                                                <option value="tenFour">4</option>
                                                <option value="tenFive">5</option>
                                                <option value="tenSix">6</option>
                                                <option value="tenSeven">7</option>
                                                <option value="tenEight">8</option>
                                                <option value="tenNine">9</option>
                                                <option value="tenTen">10</option>
                                                <option value="tenPlus">10+</option>
                                        </select>
				</div>
				<div class="col-6">
				<label for="grade">How many 5.11</label>
                                        <select class="form-group" id="sportGrade">
                                                <option value="elevenZero"></option>
                                                <option value="elevenOne">1</option>
                                                <option value="elevenTwo">2</option>
                                                <option value="elevenThree">3</option>
                                                <option value="elevenFour">4</option>
                                                <option value="elevenFive">5</option>
                                                <option value="elevenSix">6</option>
                                                <option value="elevenSeven">7</option>
                                                <option value="elevenEight">8</option>
                                                <option value="elevenNine">9</option>
                                                <option value="elevenTen">10</option>
                                                <option value="elevenPlus">10+</option>
                                        </select>
				</div>
				<div class="col-6">
				<label for="grade">How many 5.12</label>
                                        <select class="form-group" id="sportGrade">
                                                <option value="twelveZero"></option>
                                                <option value="twelveOne">1</option>
                                                <option value="twelveTwo">2</option>
                                                <option value="twelveThree">3</option>
                                                <option value="twelveFour">4</option>
                                                <option value="twelveFive">5</option>
                                                <option value="twelveSix">6</option>
                                                <option value="twelveSeven">7</option>
                                                <option value="twelveEight">8</option>
                                                <option value="twelveNine">9</option>
                                                <option value="twelveTen">10</option>
                                                <option value="twelvePlus">10+</option>
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
			<textarea class="form-control" id="comments" rows="1" cols="33"></textarea>
		</div>
		<input type="submit" value="Submit">	
	</form>
	</body>
       	<script src="script.js"></script>

</html>
