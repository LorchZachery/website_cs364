<?php
session_start();
$message = "";
$connection = new mysqli("localhost","student","CompSci364", "rockclimb");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM user;";
$statement = $connection->prepare($query);
$statement->execute();

$data = array();
$result = $statement->get_result();
while($row = $result->fetch_assoc()){
	echo $row['username'];
	echo "<br>";
}
session_destroy();

?>
