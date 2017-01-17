<?php
setcookie("currentUser", "", time() - 3600, "/");
setcookie("userID", "", time() - 3600, "/");
header( "Location: ../login/index.php");
?>