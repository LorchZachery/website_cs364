<?php
$message = "";
if( isset($_POST['submit'])){
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = sha1(filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$weight = $_POST['weight'];
	$birthDate = $_POST['birthDate'];
	$height = $_POST['height'];

	$con=mysqli_connect("localhost","student","CompSci364","rockclimb");
	//check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL:" . mysqli_connect_error();
	}
	
	$qz = "INSERT INTO user (username, weight, height, birthdate, password) VALUES
		(".$username."	

