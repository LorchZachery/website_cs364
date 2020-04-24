<?php
session_start(); // start (or resume) session

// create database connection ($connection)
$connection = new mysqli("localhost", "student", "CompSci364",
	"rockclimb");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$error = false;
if (! isset($_SESSION["username"]) // already authenticated
    && isset($_POST["username"], $_POST["password"])) {
  // query database for account information
  $statement = $connection->prepare("SELECT password FROM user WHERE username = ?;");
  $statement->bind_param("s", $_POST["username"]);

  $statement->execute();
  $statement->bind_result($password_hash);
  // username present in database
  if ($statement->fetch()) {
    // verify that the password matches stored password hash
    if (sha1($_POST["password"]) ==  $password_hash) {
      // store the username to indicate authentication
      $_SESSION["username"] = $_POST["username"];
    }
  }

  $error = true;
}

if (isset($_SESSION["username"])) { // authenticated
  $location = dirname($_SERVER["PHP_SELF"]);
  if (isset($_REQUEST["redirect"])) {
    $location = $_REQUEST["redirect"];
  }

  // redirect to requested page
  header("Location: ".$location);
}

 ?>
<!DOCTYPE html>
<html>
	<head>
                <title>Sign In</title>
                <link href="format.css" rel="stylesheet" type="text/css">
        </head>
 <body>
<div class="bg">
 <div id="sign_in">
<div id="log_in">
    <form action="<?php echo $_SERVER["PHP_SELF"].
                             "?".$_SERVER["QUERY_STRING"]; ?>"
          method="post">
 	   <div id="username_input"> 
 		<label for="username">Username</label>
      		<input name="username" type="text"
             		value="<?php if (isset($_POST["username"]))
                            echo $_POST["username"]; ?>" />
	</div>
	<div id ="password_input">      
		<label for="password">Password</label>
      	<input name="password" type="password" />
	</div>
      <input type="submit" value="Log in" />
    </form>
</div>
	<div id="create_account">
		<a href='create_account.php'>Create Account</a>		  
	</div>
	<div id="log_in_message">
	<?php
      if ($error) {
              echo "Invalid username or password.";

      }
?>
</div>

</div>
</div>
</body>
</html>
