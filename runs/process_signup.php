<?php
require_once("../_includes/config.php");

// COLLECT INFORMATION FROM THE URL & FOR QUERY
$raceID = $_GET["raceID"];
$userID = $_GET["userID"];


// Connect to the Funrun Database 
// Connection Variables are set in Config.php
try {

	$conn = new PDO(dsn, DBusername, DBpassword);

}
catch(PDOException $e) {

}
// Query

$sql = "INSERT INTO signups (userid, raceid, registrationdate) VALUES (:userid, :raceid, NOW())";


// EXECUTE QUERY AND RECEIVE RESULTS
$pdoQuery = $conn->prepare($sql);

// Set the values of :username & :password to the username from the form
// and the salted password
$pdoQuery->bindValue(":userid", $userID, PDO::PARAM_STR);
$pdoQuery->bindValue(":raceid", $raceID, PDO::PARAM_STR);

// EXECUTE THE QUERY
$pdoQuery->execute();

// FETCH THE ROW FROM THE QUERY
$eventID = $conn->lastInsertId();

// IF THE RETURNED ID IS > 0 (meaning: we inserted a user record)
if ($eventID > 0)
{
	// SET A COOKIE THAT CONTAINS THE USER'S ID
	setcookie("eventID", $eventID, 0, "/");

	// REDIRECT THE BROWSER TO success.php
	header( "Location: success.php");
}

// ELSE (a user was not found in the DB)
else
{
		// SET AN ERROR COOKIE
		setcookie("signupError", "Error Signing Up", 0, "/");

		// REDIRECT BROWSER TO index.php
		header( "Location: index.php");
}
 ?>