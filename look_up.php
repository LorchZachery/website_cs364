<?php
include 'authenticate.php';
include 'workout_find.php';
$message = "'display: none'";
if(isset($_POST['submit'])){
	$message = "'display: block'";
}
?>
<!DOCTYPE html>
<html>
        <head>
                <title>Rock Climbing Progress Report</title>
                <link href="format.css" rel="stylesheet" type="text/css">
		<script src="script.js"></script>
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
		<input type="submit" id="submit" value="Find Workout" name="submit">
		</form>
		<div class="center" id="tableDivSport"  style=<?php echo $message; ?>>
		<table style="width:17%">
			<tr>
				<th>Type</th>
                                <th>Date</th>
                                <th>Time </th>
				<th>Duration</th>
				<th>Comments</th>
				<th>Time ARCed</th>
				<th>Highest Grade in ARC</th>
				<th>Highest Grade of the Day</th>
			</tr>	
			<?php
			foreach($data as $works){	
				if($works[0] == 'sport'){
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
			<?php } }?>
		
		</table>
		</div>	
			<div class="center" id="tableDivBoulder" style=<?php echo $message; ?>>
                	<table style="width:17%">
                        <tr>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Time </th>
                                <th>Duration</th>
                                <th>Comments</th>
                                <th>Top Boulder Grade</th>
				<th>Type of Climb  </th>
				<th>_______</th>
                        </tr>   
                        <?php
                        foreach($data as $works){
                                if($works[0] == 'boulder'){
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
                        <?php } }?>
                
                </table>
		</div>
			<div class="center" id="tableDivSpeed" style=<?php echo $message; ?>>
                        <table style="width:17%">
                        <tr>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Time </th>
                                <th>Duration</th>
                                <th>Comments</th>
                                <th>Fastest Time</th>
                                <th>Attempts</th>
                                <th>_______</th>
                        </tr> 
                        <?php
                        foreach($data as $works){
                                if($works[0] == 'speed'){
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
                        <?php } }?>

                </table>
                </div>

		</div>	
		
	</body>
</html>

