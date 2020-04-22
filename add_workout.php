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
			
		//now we need to find the auto created workout_count nubmer so we can related the workout entry to user and types of workouts
				
			$query = "SELECT workout_count FROM workout ORDER BY workout_count DESC LIMIT 1;";
			if(!($statement = $connection->prepare($query))){
				
                        	$message = "Prepare for find workoutID: (" . $connection->errno . ") " . $connection->error;
                	}else{
				$statement->execute();
				$results = $statement->get_result();
				$results = $results->fetch_array();
				$workoutID =($results[0]);
				$message = $workoutID; 
				
				//now have to get the user id so we can related the workout to the user
				$query = "SELECT user_id FROM user WHERE username=?;";
				if(!($statement = $connection->prepare($query))){
                                	$message = "Prepare failed for finding userID: (" . $connection->errno . ") " . $connection->error;
				}else{
					$statement->bind_param('s',$_SESSION['username']);
                	                $statement->execute();
	                                $results = $statement->get_result();
                        	        $results = $results->fetch_array();
                               		$userID =($results[0]);
                                	$message = $userID;
					//now we need to combined the user id and the workout_count together so they are linked

					$query = "INSERT INTO user_work (user_id, workout_count) VALUES (?,?);";
					if(!($statement = $connection->prepare($query))){
                                        	$message = "Prepare failed for combineding userid and workoutoutcont: (" . $connection->errno . ") " . $connection->error;
                                	}else{
						$statement->bind_param('ss', $userID, $workoutID);
						$statement->execute();
						
						//and now we can finally finish out linking the rest of the workout to the workout through the id
					
					
						if($type == 'speed'){
							$query = "INSERT INTO speed (workout_count, speedTime, attempts) VALUES (?, ?, ?);";
							if(!($statement = $connection->prepare($query))){
                                               	 		$message = "Prepare failed speed: (" . $connection->errno . ") " . $connection->error;
							}else{
								$statement->bind_param('sss', $workoutID, $_POST['speedTime'], $_POST['attempts']);
								$statement->execute();
								$message = "";
			
							}
						}	
						else if($type == 'sport'){
							$query = "INSERT INTO sport (workout_count, timeARC, arcGrade, highestGrade) VALUES (?, ?, ?, ?);";
                                                        if(!($statement = $connection->prepare($query))){
                                                                $message = "Prepare failed sport: (" . $connection->errno . ") " . $connection->error;
                                                        }else{
                                                                $statement->bind_param('ssss', $workoutID, $_POST['timeARC'], $_POST['highestARCgrade'],$_POST['highestGrade']);
                                                                $statement->execute();
                                                                $message = "";
	
							}
						}
						else if($type == 'boulder'){
							 $query = "INSERT INTO boulder (workout_count, typeOfGrade, bgrade) VALUES (?, ?, ?);";
                                                        if(!($statement = $connection->prepare($query))){
                                                                $message = "Prepare failed boulder: (" . $connection->errno . ") " . $connection->error;
                                                        }else{
                                                                $statement->bind_param('sss', $workoutID, $_POST['typeOfGrade'], $_POST['boulderGrade']);
                                                                $statement->execute();
                                                                $message = "";
                                                        }
	
				
						}	
					
}
				}	
			}	
		}
	}
}

?>
