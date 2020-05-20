<?php
include 'authenticate.php';
include 'workout_find.php';
$message = "'display: none'";
if(isset($_POST['submit']) || isset($_POST['all']) ){
	$message = "'display: block'";
}
?>
<!DOCTYPE html>
<html>
<style>
body {

	background-image: url('images/lookUp.jpg');
	/* Full height */
  	height: 100%;

  	/* Center and scale the image nicely */
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
  	background-size: cover;

}

div, h1 {

	color: white;

}

</style>
        <head>
                <title>Rock Climbing Progress Report</title>
                <link href="format.css" rel="stylesheet" type="text/css">
		<script src="script.js"></script>
	</head>
        <body>
                <ul style="background-color: #ba9070;">
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
		<input type="submit" id="all" value="Show All Workouts" name="all">
		</form>
		
		<div class="report">
		<div  id="tableDivSport"  style=<?php echo $message; ?>>
		<h2>SPORT</h2>
		<table style="width:17%">
			<tr>
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
					if($work != 'sport'){	      	
			?>
                                 <td><?php echo $work ?></td>
			<?php
					}
				}
			?>
			</tr>
			<?php } }?>
		
		</table>
		</div>	
			<div  id="tableDivBoulder" style=<?php echo $message; ?>>
			<h2>BOULDER</h2>
			<table style="width:17%">
                        <tr>
                                
                                <th>Date</th>
                                <th>Time </th>
                                <th>Duration</th>
                                <th>Comments</th>
                                <th>Top Boulder Grade</th>
				<th>Type of Climb  </th>
			
                        </tr>   
                        <?php
                        foreach($data as $works){
                                if($works[0] == 'boulder'){
                        ?>
                        <tr>
                        <?php
                                foreach($works as $work){
                        		if($work != 'boulder'){                                        
                        ?>
                                 <td><?php echo $work ?></td>
                        <?php
					}
                                }
                        ?>
                        </tr>
                        <?php } }?>
                
                </table>
		</div>
			<div id="tableDivSpeed" style=<?php echo $message; ?>>
			<h2>SPEED</h2>
			<table style="width:17%">
                        <tr>
                               
                                <th>Date</th>
                                <th>Time </th>
                                <th>Duration</th>
                                <th>Comments</th>
                                <th>Fastest Time</th>
                                <th>Attempts</th>
                                
                        </tr> 
                        <?php
                        foreach($data as $works){
                                if($works[0] == 'speed'){
                        ?>
                        <tr>
                        <?php
                                foreach($works as $work){
					if($work != 'speed'){
                        ?>
                                 <td><?php echo $work ?></td>
                        <?php
					}
                                }
                        ?>
                        </tr>
                        <?php } }?>

                </table>
                </div>
		
		</div>	
		
	</body>
</html>

