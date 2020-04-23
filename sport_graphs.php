<?php
session_start(); 
$message = "";
$connection = new mysqli("localhost","student","CompSci364", "rockclimb");

if ($connection->connect_error) {
        $message = "Cannot connect";
        die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT sport.* FROM sport, user_work, user  WHERE sport.workout_count = user_work.workout_count AND user_work.user_id = user.user_id AND user.username=?;";
	if(!($statement = $connection->prepare($query))){
                $message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
        }else{
                $statement->bind_param('s', $_SESSION['username']);
                $statement->execute();
                $result = $statement->get_result();
	}
$jsonArray = array();
if($result->num_rows > 0){
	$index = 0;
	while($row = $result->fetch_assoc()){
		$jsonArrayItem = array();
		$jsonArrayItem['label'] = $index;
		$jsonArrayItem['value'] = $row['highestGrade'];
		$index = $index +1;
		array_push($jsonArray, $jsonArrayItem);
	}
}

$connection->close();
header('Content-type: application/json');

echo json_encode($jsonArray);
?>

