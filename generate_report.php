<?php
$speedTime = "";
$timeARC = "";
$bGrade = "";
$sport = "";

$message = "test1";
$connection = new mysqli("localhost","student","CompSci364","rockclimb");

if($connection->connect_error){
        $message = "Cannot Connect";
        die("Connection Fail: " . $connection->connect_error);
}
$message = "test1.1";
	
			$query = "SELECT s.user_id as user_id, s.speedTime as speedTime, d.timeARC as timeARC, c.bGrade as bGrade, h.highestGrade as highestGrade FROM user, (SELECT min(s.speedTime) as speedTime, w.user_id FROM user_work w left outer join speed s on w.workout_count = s.workout_count WHERE(s.workout_count = w.workout_count or s.workout_count is NULL) GROUP BY w.user_id)s, (SELECT max(s.timeARC) as timeARC, w.user_id FROM user_work w left outer join sport s on w.workout_count = s.workout_count WHERE(s.workout_count = w.workout_count or s.workout_count is NULL) GROUP BY w.user_id)d, (SELECT max(s.bGrade) as bGrade, w.user_id FROM user_work w left outer join boulder s on w.workout_count = s.workout_count WHERE(s.workout_count = w.workout_count or s.workout_count is NULL) GROUP BY w.user_id)c, (SELECT max(s.highestGrade) as highestGrade, w.user_id FROM user_work w left outer join sport s on w.workout_count = s.workout_count WHERE(s.workout_count = w.workout_count or s.workout_count is NULL) GROUP BY w.user_id)h WHERE user.username=? AND user.user_id = s.user_id  AND s.user_id = d.user_id AND d.user_id = c.user_id AND c.user_id = h.user_id;";


			if(!($statement = $connection->prepare($query))){
                        	$message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
			}else{
				$statement->bind_param('s', $_SESSION['username']);
				if(!($statement->execute())){
					$message = "execute fail: (" .$connection->errno . ") " .$connection->error;
				}
				$result = $statement->get_result();
				$row = $result->fetch_assoc();
				$speedTime = $row['speedTime'];
				$timeARC = $row['timeARC'];
				$bGrade = $row['bGrade'];
				$sport = $row['highestGrade'];
				$message = "success";	
			}
				
	 	
			
		
?>	

