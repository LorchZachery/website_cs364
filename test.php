
<?php
$message = "";
$connection = new mysqli("localhost","student","CompSci364","rockclimb");

if($connection->connect_error){
        $message = "Cannot Connect";
        die("Connection Fail: " . $connection->connect_error);
}
if( isset($_POST['submit']))
{
        $type = $_POST['typeWorkout'];
        if($type == "none"){
                $message = "please select a workout type";
        }
        else{
                //this is adding the basic part of the workout in 
                $query = "INSERT INTO workout (date, time, duration, comments) VALUES (?, ?, ?, ?);";
                if(!($statement = $connection->prepare($query))){
                        $message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                }else{
                        $statement->bind_param('ssss', $_POST['date'], $_POST['startTime'],$_POST['duration'], $_POST['comments']);
                        $statement->execute();
			$message = $_POST['startTime'];
		}
	}
}
?>
