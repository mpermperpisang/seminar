<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['login_member']);
	header("Location: home.php");
?>