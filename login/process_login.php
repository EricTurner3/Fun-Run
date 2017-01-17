<?php
require_once("../_includes/config.php");

// COLLECT INFORMATION FROM THE FORM
$username = $_POST["username"];
$password = $_POST["password"];

// This uses a salt of 21500 to encrypt the password from the form
$crypted_password = crypt($password, "21500");

// Connect to the Funrun Database 
// Connection Variables are set in Config.php
try {

	$conn = new PDO(dsn, DBusername, DBpassword);

}
catch(PDOException $e) {

}
// Query: Select 1 row from table users where username and password match

$sql = "SELECT * FROM users WHERE username=:username AND password=:password LIMIT 1";


// EXECUTE QUERY AND RECEIVE RESULTS
$pdoQuery = $conn->prepare($sql);

// Set the values of :username & :password to the username from the form
// and the salted password
$pdoQuery->bindValue(":username", $username, PDO::PARAM_STR);
$pdoQuery->bindValue(":password", $crypted_password, PDO::PARAM_STR);

// EXECUTE THE QUERY
$pdoQuery->execute();

// FETCH THE ROW FROM THE QUERY
$row = $pdoQuery->fetch(PDO::FETCH_ASSOC);

// IF RETURNED VALUE IS AN ARRAY (meaning: we have a user)
if (is_array($row))
{
		// SET A COOKIE THAT CONTAINS THE USER'S ID
		setcookie("userID", $row["id"], 0, "/");
		setcookie("currentUser", $row["username"], 0, "/");

		// REDIRECT THE BROWSER TO success.php
		header( "Location: success.php");
}

// ELSE (a user was not found in the DB)
else
{
		// SET AN ERROR COOKIE
		setcookie("loginError", "Your username or password was invalid.", 0, "/");

		// REDIRECT BROWSER TO index.php
		header( "Location: index.php");
}
 ?>