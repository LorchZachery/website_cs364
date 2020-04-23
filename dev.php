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
        echo print_r($row);
        echo "<br>";
}
echo "<br>";

$query = "SELECT * FROM workout;";
$statement = $connection->prepare($query);
$statement->execute();

$data = array();
$result = $statement->get_result();
while($row = $result->fetch_assoc()){
        echo print_r($row);
        echo "<br>";
}


$query = "SELECT * FROM progress_report;";
$statement = $connection->prepare($query);
$statement->execute();

$data = array();
$result = $statement->get_result();
while($row = $result->fetch_assoc()){
	echo print_r($row);
	echo "<br>";
}


?>
