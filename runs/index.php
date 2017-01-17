<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Fun Run - Runs</title>
<?php include '../_includes/config.php';?>
<?php echo '<link rel="stylesheet" type="text/css" href="' . URL_ROOT .'/main.css"/>'?>
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Open+Sans+Condensed:300" rel="stylesheet">
</head>

<body>

<div id="container">
	<div id="header">
		<?php include ABSOLUTE_PATH .'/_includes/header.inc.php';?>
	</div>
	<div id="navigation">
		<?php include ABSOLUTE_PATH . '/_includes/nav.inc.php';?>
	</div>
	<div id="currentUser">
		<?php include ABSOLUTE_PATH . '/_includes/currentUser.inc.php';?>
	</div>
	<div id="content">
	
		
		<?php

						
						try {

							$conn = new PDO(dsn, DBusername, DBpassword);

							echo '<script>console.log( "Connection success!")</script>';

						}
						catch(PDOException $e) {

							echo '<script>console.log( "Connection FAILED!")</script>';

							echo '<script>console.log( "'.$e->getMessage().'")</script>';
						}

					?>
		<h2>
			Runs
		</h2>
		<?php 
			if(isset($_COOKIE['signupError'])) {
				echo "<b style='color: #8B0000'>" . $_COOKIE['signupError'] . "</b>";
				setcookie("signupError", "", time() - 3600, "/");
			}
			else{
				echo "";
			}
				
				
			?>
		<p>Below is a table of the currently available runs</p>
		<?php

						$sql = "SELECT id, name, startdate, enddate, price, maxregistrations FROM races ORDER BY startdate asc ";

						$rows = $conn->query($sql);

						echo "<table>";
						echo "<tr>";
							echo "<th> Race Name </th>";
							echo "<th> Start Date & Time </th>";
							echo "<th> End Date & Time </th>";
							echo "<th> Price </th>";
							echo "<th> Max Registrations </th>";
							if(isset($_COOKIE['userID'])) {
								echo "<th> Sign Up </th>";
							}
						echo "</tr>";
						foreach ($rows as $row) {
							echo "<tr>";
								echo "<td>" .$row["name"] . "</td>";
								echo "<td>" .$row["startdate"] . "</td>";
								echo "<td>" .$row["enddate"] . "</td>";
								echo "<td> $" .$row["price"] . "</td>";
								echo "<td>" .$row["maxregistrations"] . "</td>";
								if(isset($_COOKIE['userID'])) {
									echo "<td> <a href='process_signup.php?raceID=".$row["id"]."&userID=".$_COOKIE['userID']."'>Sign Up!</a></td>";
								}
							echo "</tr>";
						}
						
						echo "</table>";

			?>
	
	</div>
	<div id="footer">
		<?php include ABSOLUTE_PATH . '/_includes/footer.inc.php';?>
	</div>
</div>

</body>
</html>