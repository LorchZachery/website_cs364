<?php
	include'add_user.php'
?>
<!DOCTYPE html>
<html>
        <head>
                <title>Submit Data</title>
                <link href="format.css" rel="stylesheet" type="text/css">
        </head>
        <body>
                <h1>Create Account </h1>
		<form method="post" action="">
                	<div class="form-group">
				<label for="username">Username </label>
                        	<input type="text" class="form-conrol" id="username" name="username" placeholder="Couger" required>
                	</div>
			<div class="form-group">
				<label for="weight">Weight</label>
				<input type="number" class="form-control" name="weight" id="weight" placeholder="kilograms" required>
			</div>
			<div class="form-group">
				<label for="height">Height</label>
				<input type="number" class="form-control" name="height" id="height" placeholder="centimeters" required>
			</div>
			<div class="form-group">
				<label for="birthDate">Birthdate</label>
				<input type="date" class="form-control" id="birthDate" name="birthDate" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" required>
			</div>	
			<input type="submit" value="Create Account" name="submit" id="submit">
		</form>
	<?php echo $message ?>
	<a href="sign_in.php">Sign In</a>
	</body>
</html>
