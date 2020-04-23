<?php
 
$message = "";
$connection = new mysqli("localhost","student","CompSci364", "rockclimb");

if ($connection->connect_error) {
	$message = "Cannot connect";
	die("Connection failed: " . $connection->connect_error);
}

if ( isset($_POST['submit'])){
	$query = "SELECT COUNT(1) FROM user WHERE username=?;";
	if(!($statement = $connection->prepare($query))){
		$row =0;
		$message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
    	}else{
		$statement->bind_param('s', $_POST['username']);
		$statement->execute();
		$results = $statement->get_result();
		$results = $results->fetch_array();
		$results = intval($results[0]);
	}
	if($results){
		$message = "Username already taken";
	}else{
		$message = "";
		$query = "INSERT INTO user (username, weight, height, birthdate, password) VALUES (?, ?, ?, ?, (SELECT SHA1(?)));";
					
  		if(!($statement = $connection->prepare($query))){
	  		$message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
  		}else{
   
  			$statement->bind_param('sssss', $_POST['username'], $_POST['weight'], $_POST['height'],
                        $_POST['birthDate'], $_POST['password']);
 			$statement->execute();
  	
		}
	header("Location: sign_in.php");	
	}
}


?>

