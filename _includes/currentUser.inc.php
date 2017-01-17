<?php 
			if(isset($_COOKIE['currentUser'])) {
				echo "<p>Logged in as: " . $_COOKIE['currentUser'] . "</p>";
				echo '<a href="'.URL_ROOT.'/login/logout.php">Logout</a>';
			}
			else{
				echo "<p>Not Logged In</p>";
				echo '<a href="'.URL_ROOT.'/login/index.php">Login</a>';
			}
							
?>