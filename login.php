
<?php

$message = "";
if( isset($_POST['submit'])){
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = sha1(filter_var($_POST['password'], FILTER_SANITIZE_STRING));



$con=mysqli_connect("localhost","student","CompSci364","rockclimb");
// check connection
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL:" . mysqli_connect_error();
}
$qz = "SELECT user_id FROM user WHERE username='".$username."' and password='".$password."'" ; 
$qz = str_replace("\'","",$qz);

$result = mysqli_query($con,$qz);
if($row = mysqli_fetch_array($result)){
	//$message = "user id ". $row['user_id'];
	header("Location: index.html");
}else{
	$message =  'incorrect password';
}

mysqli_close($con);
}
?>

