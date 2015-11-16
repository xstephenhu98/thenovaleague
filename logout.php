<?php
if (isset($_POST['logout'])) {
	setcookie("user",$_COOKIE['user'],time()-3600);
	header("location: index.php");
}
?>