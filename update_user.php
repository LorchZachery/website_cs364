<?php
$message1 = "";
$message2 = "";
$message3 = "";
$connection = new mysqli("localhost","student","CompSci364","rockclimb");

if($connection->connect_error){
        $message1 = "Cannot Connect";
        die("Connection Fail: " . $connection->connect_error);
}
	if(isset($_POST['update_password'])){
		if($_POST['newpass'] != $_POST['confpass']){
			$message1 = "passwords do not match";
		}else{
		$query =  "SELECT user.password FROM user  WHERE username = ?;";
                        if(!($statement = $connection->prepare($query))){
                                $message1 = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                        }else{
                                $statement->bind_param('s',$_SESSION['username']);
                                if(!($statement->execute())){
                                        $message1 = "execute fail: (" .$connection->errno . ") " .$connection->error;
                                }else{
					
					$result = $statement->get_result();
					$result = $result->fetch_array();
                                	$password =($result[0]);
					if($password == sha1($_POST['oldpass'])){

						 $query =  "UPDATE user SET password=(SELECT SHA1(?)) WHERE username = ?;";
                        			if(!($statement = $connection->prepare($query))){
                                		$message1 = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                        			}else{
                                			$statement->bind_param('ss',$_POST['newpass'], $_SESSION['username']);
                                			if(!($statement->execute())){
                                        			$message1 = "execute fail: (" .$connection->errno . ") " .$connection->error;
                                			}else{
                                        			$message1 = "Password Updated";
                                			}
                        			}


					}else{
						$message1 = "Incorrect Password";
					}
                                }
                        }
	
	}
	}
	if(isset($_POST['update_metrics'])){
                $query =  "UPDATE user SET height=?, weight=? WHERE username = ?;";
                if(!($statement = $connection->prepare($query))){
                          $message1 = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                }else{
                           $statement->bind_param('sss',$_POST['height'],$_POST['weight'], $_SESSION['username']);
                           if(!($statement->execute())){
                                  $message2 = "execute fail: (" .$connection->errno . ") " .$connection->error;
                           }else{
                                 $message2 = "Sucess";
                          }
		}
	}

		
		

	if(isset($_POST['delete'])){
                $query =  "SELECT user.password FROM user  WHERE username = ?;";
                        if(!($statement = $connection->prepare($query))){
                                $message3 =  "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                        }else{
                                $statement->bind_param('s',$_SESSION['username']);
                                if(!($statement->execute())){
                                        $message3 = "execute fail: (" .$connection->errno . ") " .$connection->error;
                                }else{
                                        
                                        $result = $statement->get_result();
                                        $result = $result->fetch_array();
                                        $password =($result[0]);
                                        if($password == sha1($_POST['vpass'])){

						
						$query = "SELECT user_id FROM user WHERE username=?;";
                                		if(!($statement = $connection->prepare($query))){
                                        		$message = "Prepare failed for finding userID: (" . $connection->errno . ") " . $connection->error;
                                		}else{
                                       	 		$statement->bind_param('s',$_SESSION['username']);
                                        		$statement->execute();
                                        		$results = $statement->get_result();
                                        		$results = $results->fetch_array();
                                        		$userid =($results[0]);
                                        		$message = $userid;

						}

						 $query =  "DELETE FROM user_work WHERE user_id = ?;";
                                                if(!($statement = $connection->prepare($query))){
                                                $message3 = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                                                }else{
                                                        $statement->bind_param('s', $userid);
                                                        if(!($statement->execute())){
                                                                $message3 = "execute fail: (" .$connection->errno . ") " .$connection->error;
                                                        }else{
                                                               //should log out but check header
                                                        }
                                                }



                                                 $query =  "DELETE FROM user WHERE username = ?;";
                                                if(!($statement = $connection->prepare($query))){
                                                $message3 = "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                                                }else{
                                                        $statement->bind_param('s', $_SESSION['username']);
                                                        if(!($statement->execute())){
                                                                $message3 = "execute fail: (" .$connection->errno . ") " .$connection->error;
                                                        }else{
                                                		 session_destroy();
								 header("Location: sign_in.php");
                                                        }
                                                }


                                        }else{
                                                $message3 = "Incorrect Password";
                                        }
                                }
                        }
        
        }
			
	 	
			
		
?>	

