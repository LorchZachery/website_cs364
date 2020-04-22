<!DOCTYPE html>
<html>
        <head>
                <title>Sign In</title>
                <link href="format.css" rel="stylesheet" type="text/css">
	</head>
        <body>
                <ul>
                        <li><a href="index.html">INTRO</a></li>
                        <li><a href="submit_data.html">Add Workout</a></li>
                        <li><a href="progress_report.html">Progress Report</a></li>
                        <li style="float:right"><a href="sign_in.php">Sign In</a></li>
                        <li style="float:right"><a href="create_account.html">Create Account</a></li>
                </ul>
                <h1>Login</h1>
		<form  method="post" action="">
		
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username" placeholder="couger" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" required>
			</div>
		 <input type="submit" value="submit" id="submit" name="submit">
		 <?php require 'login.php'; 
		 echo $message; ?>
		</form>	
        </body>
</html>

