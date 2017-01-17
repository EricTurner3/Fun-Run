<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Fun Run - Login</title>
<?php include '../_includes/config.php';?>
<?php echo '<link rel="stylesheet" type="text/css" href="' . URL_ROOT .'/main.css"/>'?>

<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Open+Sans+Condensed:300" rel="stylesheet">

</head>

<body>
<style>
.errorMessage {
  color: red;
  font-weight: bold;
}
</style>

<div id="container">
	<div id="header">
		<?php
			include ABSOLUTE_PATH .'/_includes/header.inc.php';
		?>
	</div>
	<div id="navigation">
		<?php
			include ABSOLUTE_PATH . '/_includes/nav.inc.php';
		?>
	</div>
	<div id="currentUser">
		<?php include ABSOLUTE_PATH . '/_includes/currentUser.inc.php';?>
	</div>
	<div id="content">
		<h2>
			Account Registration
		</h2>
		<p> ALL FIELDS ARE REQUIRED </p>
		<form action="process_registration.php" method="post">
			<label for="firstname" id="fNameLabel">*First Name: <label><br>
			<input type="text" name="firstname" id="firstname" required>
			<div id="fNameError" class="errorMessage"></div>
			
			<label for="lastname" id="lNameLabel">*Last Name: <label><br>
			<input type="text" name="lastname" id="lastname" required>
			<div id="lNameError" class="errorMessage"></div>
				
			<label for="email" id="emailLabel">*Email: <label><br>
			<input type="email" name="email" id="email" required>
			<div id="emailError" class="errorMessage"></div>
			
			<label for="username" id="userLabel">*Username: <label><br>
			<input type="text" name="username" id="username" required>
			<div id="usernameError" class="errorMessage"></div>
			
			<label for="password" id="passLabel">*Password: <label><br>
			<input type="password" name="password" id="password" required>
			<div id="passError" class="errorMessage"></div>
			
			<label for="passwordConfirm" id="passConfirmLabel">*Confirm Password: <label><br>
			<input type="password" name="passwordConfirm" id="passwordConfirm" required>
			<div id="passConfirmError" class="errorMessage"></div>
			
			<br><br>
			<input type="submit" id="submit" value="Register"> <br>
			<?php 
			if(isset($_COOKIE['registrationError'])) {
				echo "<b style='color: #8B0000'>" . $_COOKIE['registrationError'] . "</b>";
				setcookie("registrationError", "", time() - 3600, "/");
			}
			else{
				echo "";
			}
				
				
			?>
</form>
	
	</div>
	<div id="footer">
		<?php
			include ABSOLUTE_PATH . '/_includes/footer.inc.php';
		?>
	</div>
	
	
</div>

</body>
<script src="index.js"></script>
</html>