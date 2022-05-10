<?php
setcookie("userID", null, time() - 3600, "/");
header("Location: http://localhost/login.php");
?>