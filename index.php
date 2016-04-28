<?php
include("dbconnect.php");
	session_start();
	if (isset($_SESSION['user_Id']))
		include("header.php");
	else
		include("login.php");
?>

