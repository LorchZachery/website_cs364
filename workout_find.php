<?php
$message = "";
$duration = "";
$comments = "";
$date = "";
$time = "";
$data = array();
$connection = new mysqli("localhost","student","CompSci364","rockclimb");

if($connection->connect_error){
        $message = "Cannot Connect";
        die("Connection Fail: " . $connection->connect_error);
}
if( isset($_POST['submit']))
{
	$query = "SELECT * FROM workout, user_work, user WHERE user.username=? AND user.user_id = user_work.user_id AND user_work.workout_count = workout.workout_count AND (date BETWEEN ? AND ?) ;";
	if(!($statement = $connection->prepare($query))){
                        $message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                }else{
			$statement->bind_param('sss',$_SESSION['username'],$_POST['startDate'], $_POST['endDate']);
			$statement->execute();
			$results = $statement->get_result();


			$index = 0;
			while($row = $results->fetch_assoc()){
				$query = "SELECT speed.workout_count FROM speed, user_work WHERE speed.workout_count = user_work.workout_count AND user_work.workout_count =?;";
				if(!($statement = $connection->prepare($query))){
                        		$message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                		}else{
                        		$statement->bind_param('s',$row['workout_count']);
                       			$statement->execute();
					$stuff = $statement->get_result();
					$stuff = $stuff->fetch_assoc();				
					if($stuff == NULL){
						$query = "SELECT boulder.workout_count FROM boulder, user_work WHERE boulder.workout_count = user_work.workout_count AND user_work.workout_count =?;";
                                		if(!($statement = $connection->prepare($query))){
                                        		$message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                                		}else{
                                        		$statement->bind_param('s',$row['workout_count']);
                                        		$statement->execute();
                                        		$stuff = $statement->get_result();
                                        		$stuff = $stuff->fetch_assoc();
                                        		 
							if($stuff == NULL){
								$query = "SELECT sport.workout_count FROM sport, user_work WHERE sport.workout_count = user_work.workout_count AND user_work.workout_count =?;";
                               					 if(!($statement = $connection->prepare($query))){
                                        				$message = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                                				}else{
                                        				$statement->bind_param('s',$row['workout_count']);
                                        				$statement->execute();
                                        				$stuff = $statement->get_result();
                                        				$stuff = $stuff->fetch_assoc();
                                        				
									if($stuff == NULL){
										$message = "error";
									}
									else{
										//here sport
										$query = "SELECT * from sport WHERE workout_count = ?;";
										if(!($statement = $connection->prepare($query))){
											$message = "prepare failed: (" . $connection->errno .")" . $connection->error;
										}else{
											$statement->bind_param('s', $row['workout_count']);
											$statement->execute();
											$info = $statement->get_result();
											$entry = $info->fetch_assoc();
											$workout = array(
												'sport',
                                        							$row['date'],
                                        							$row['time'],
                                        							$row['duration'],
												$row['comments'],
												$entry['timeARC'],
												$entry['arcGrade'],
												$entry['highestGrade']
                                						);
										}
									}
								}
							}else{
							//here boulder
								$query = "SELECT * from boulder WHERE workout_count = ?;";
                                                                                if(!($statement = $connection->prepare($query))){
                                                                                        $message = "prepare failed: (" . $connection->errno .")" . $connection->error;
                                                                                }else{
                                                                                        $statement->bind_param('s', $row['workout_count']);
                                                                                        $statement->execute();
                                                                                        $info = $statement->get_result();
                                                                                        $entry = $info->fetch_assoc();
											$workout = array(
												'boulder',
                                                                                        	$row['date'],
                                                                                        	$row['time'],
                                                                                        	$row['duration'],
                                                                                        	$row['comments'],
                                                                                        	$entry['bGrade'],
                                                                                        	$entry['typeOfGrade']
                                                                                     
                                                                                );
                                                                                }
	
							}
						}
						
					}else{		
						//here speed
						 $query = "SELECT * from speed WHERE workout_count = ?;";
                                                                                if(!($statement = $connection->prepare($query))){
                                                                                        $message = "prepare failed: (" . $connection->errno .")" . $connection->error;
                                                                                }else{
                                                                                        $statement->bind_param('s', $row['workout_count']);
                                                                                        $statement->execute();
                                                                                        $info = $statement->get_result();
                                                                                        $entry = $info->fetch_assoc();
											$workout = array(
												'speed',
                                                                                        	$row['date'],
                                                                                        	$row['time'],
                                                                                        	$row['duration'],
                                                                                        	$row['comments'],
                                                                                        	$entry['speedTime'],
                                                                                        	$entry['attempts']

                                                                                );
                                                                                }


					}	
		
		
				$data[$index] =$workout;
				$index = $index + 1;
			}
		}
}
}




$test = "";
if( isset($_POST['all']))
{
	$query = "SELECT * FROM workout, user_work, user WHERE user.username=? AND user.user_id = user_work.user_id AND user_work.workout_count = workout.workout_count;";
	if(!($statement = $connection->prepare($query))){
                        $test = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                }else{
			$statement->bind_param('s',$_SESSION['username']);
			$statement->execute();
			$results = $statement->get_result();


			$index = 0;
			while($row = $results->fetch_assoc()){
				$query = "SELECT speed.workout_count FROM speed, user_work WHERE speed.workout_count = user_work.workout_count AND user_work.workout_count =?;";
				if(!($statement = $connection->prepare($query))){
                        		$test = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                		}else{
                        		$statement->bind_param('s',$row['workout_count']);
                       			$statement->execute();
					$stuff = $statement->get_result();
					$stuff = $stuff->fetch_assoc();				
					if($stuff == NULL){
						$query = "SELECT boulder.workout_count FROM boulder, user_work WHERE boulder.workout_count = user_work.workout_count AND user_work.workout_count =?;";
                                		if(!($statement = $connection->prepare($query))){
                                        		$test = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                                		}else{
                                        		$statement->bind_param('s',$row['workout_count']);
                                        		$statement->execute();
                                        		$stuff = $statement->get_result();
                                        		$stuff = $stuff->fetch_assoc();
                                        		 
							if($stuff == NULL){
								$query = "SELECT sport.workout_count FROM sport, user_work WHERE sport.workout_count = user_work.workout_count AND user_work.workout_count =?;";
                               					 if(!($statement = $connection->prepare($query))){
                                        				$test = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                                				}else{
                                        				$statement->bind_param('s',$row['workout_count']);
                                        				$statement->execute();
                                        				$stuff = $statement->get_result();
                                        				$stuff = $stuff->fetch_assoc();
                                        				
									if($stuff == NULL){
										$test = "error";
									}
									else{
										//here sport
										$query = "SELECT * from sport WHERE workout_count = ?;";
										if(!($statement = $connection->prepare($query))){
											$test = "prepare failed: (" . $connection->errno .")" . $connection->error;
										}else{
											$statement->bind_param('s', $row['workout_count']);
											$statement->execute();
											$info = $statement->get_result();
											$entry = $info->fetch_assoc();
											$workout = array(
												'sport',
                                        							$row['date'],
                                        							$row['time'],
                                        							$row['duration'],
												$row['comments'],
												$entry['timeARC'],
												$entry['arcGrade'],
												$entry['highestGrade']
                                						);
										}
									}
								}
							}else{
							//here boulder
								$query = "SELECT * from boulder WHERE workout_count = ?;";
                                                                                if(!($statement = $connection->prepare($query))){
                                                                                        $test = "prepare failed: (" . $connection->errno .")" . $connection->error;
                                                                                }else{
                                                                                        $statement->bind_param('s', $row['workout_count']);
                                                                                        $statement->execute();
                                                                                        $info = $statement->get_result();
                                                                                        $entry = $info->fetch_assoc();
											$workout = array(
												'boulder',
                                                                                        	$row['date'],
                                                                                        	$row['time'],
                                                                                        	$row['duration'],
                                                                                        	$row['comments'],
                                                                                        	$entry['bGrade'],
                                                                                        	$entry['typeOfGrade']
                                                                                     
                                                                                );
                                                                                }
	
							}
						}
						
					}else{		
						//here speed
						 $query = "SELECT * from speed WHERE workout_count = ?;";
                                                                                if(!($statement = $connection->prepare($query))){
                                                                                        $test = "prepare failed: (" . $connection->errno .")" . $connection->error;
                                                                                }else{
                                                                                        $statement->bind_param('s', $row['workout_count']);
                                                                                        $statement->execute();
                                                                                        $info = $statement->get_result();
                                                                                        $entry = $info->fetch_assoc();
											$workout = array(
												'speed',
                                                                                        	$row['date'],
                                                                                        	$row['time'],
                                                                                        	$row['duration'],
                                                                                        	$row['comments'],
                                                                                        	$entry['speedTime'],
                                                                                        	$entry['attempts']

                                                                                );
                                                                                }


					}	
		
		
				$data[$index] =$workout;
				$index = $index + 1;
			}
		}
}
}
