<?php
require_once("../_includes/config.php");

// COLLECT INFORMATION FROM THE FORM
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
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
// Query: Insert Form Data into Users table

$sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES (:firstname, :lastname, :username, :email, :password)";


// EXECUTE QUERY AND RECEIVE RESULTS
$pdoQuery = $conn->prepare($sql);

// Set the values of :username & :password to the username from the form
// and the salted password
$pdoQuery->bindValue(":firstname", $firstname, PDO::PARAM_STR);
$pdoQuery->bindValue(":lastname", $lastname, PDO::PARAM_STR);
$pdoQuery->bindValue(":email", $email, PDO::PARAM_STR);
$pdoQuery->bindValue(":username", $username, PDO::PARAM_STR);
$pdoQuery->bindValue(":password", $crypted_password, PDO::PARAM_STR);

// EXECUTE THE QUERY
$pdoQuery->execute();

// GET THE LAST INSERTED ID - this is the ID of the new user

$userID = $conn->lastInsertId();

// IF THE RETURNED ID IS > 0 (meaning: we inserted a user record)
if ($userID > 0)
{
	// SET A COOKIE THAT CONTAINS THE USER'S ID
	setcookie("userID", $userID, 0, "/");
	setcookie("currentUser", $username, 0, "/");

	// REDIRECT THE BROWSER TO success.php
	header( "Location: success.php");
}

// ELSE (an error occurred while creating the record)
else
{

		// SET AN ERROR COOKIE
		setcookie("registrationError", "Your registration failed. Please try again.", 0, "/");

		// REDIRECT BROWSER TO index.php
		header( "Location: index.php");
}

 ?>