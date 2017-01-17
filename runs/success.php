<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Fun Run - Success</title>
<?php include '../_includes/config.php';?>
<?php echo '<link rel="stylesheet" type="text/css" href="' . URL_ROOT .'/main.css"/>'?>
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Open+Sans+Condensed:300" rel="stylesheet">

</head>

<body>

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
			Event Registration Success!
		</h2>
		<?php
			if(isset($_COOKIE['eventID'])) {
				echo "<b style='color: #228B22' > Event Registration #: " . $_COOKIE['eventID'] . "</b>.<br>";
				setcookie("eventID", "", time() - 3600, "/");
			}
			else{
				echo "";
			}
				echo '<a href="'.URL_ROOT.'/runs/index.php">Click here to register for more runs!</a>';
		?>
	
	</div>
	<div id="footer">
		<?php
			include ABSOLUTE_PATH . '/_includes/footer.inc.php';
		?>
	</div>
</div>

</body>
</html>