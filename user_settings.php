<?php
include'authenticate.php';
include 'update_user.php';
?>
<!DOCTYPE html>
<html>
        <head>
                <title>Update Account</title>
                <link href="format.css" rel="stylesheet" type="text/css">
        </head>
	<body>
		<ul>
                        <li><a href="index.php">INTRO</a></li>
                        <li><a href="submit_data.php">Add Workout</a></li>
                        <li><a href="metrics.php">Metrics</a></li>
                        <li><a href="report.php">Progress Report</a></li>
                        <li><a href="look_up.php">Look Up Past Workouts</a></li>
                        <li style="float:right"><a href="about.php">About</a></li>
			<li style="float:right"><a href="user_settings.php">Account Settings</a></li>	                     <li style="float:right"><a href="log_out.php">Log Out</a></li>
                </ul>
		
		<h1>Update Account </h1>
		<h2>Change Password</h2>
		<form method="post" action="">	
			<div class="form-group">
				<label for="oldpass">Old Password</label>
				<input type="password" class="form-control" name="oldpass" id="oldpass" required>
			</div>
			<div class="form-group">
				<label for="newpass">New Password</label>
				<input type="password" class="form-control" name="newpass" id="newpass" required>
			</div>
			<div class="form-group">
				<label for="confpass">Confirm Password</label>
				<input type="password" class="form-control" name="confpass" id="confpass" required>	
			<input type="submit" value="Update Account" name="update_password" id="update_password">
		</form>
	<?php echo $message1 ?>
		<h2>Update Metrics</h2>
		<form method ="post">
			<div>
				<label for="height">Height</label>
				<input type="number" name="height" id="height">
			</div>
			<div>
				<label for="weight">Weight</label>
				<input type="number" name="weight" id="weight">
			</div>
			<input type="submit" value="Update Metrics" name="update_metrics" id="update_metrics">
		</form>
		<?php echo $message2; ?>
		<h2>Delete Account</h2>
		<form method ="post">
			<div>
				<label for="vpass">Verify Password</label>
				<input type="password" name="vpass" id="vpass">
			</div>
			<input type="submit" value="Delete Account" name="delete" id="delete">
		</form>
		<?php echo $message3; ?>
	</body>
</html>
