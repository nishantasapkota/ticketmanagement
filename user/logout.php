<?php
session_start();
unset($_SESSION['Username']);
unset($_SESSION['uid']);
	$_SESSION['msg'] = 'Logged out succesfully';
	session_destroy();
header('Location: userloginform.php');
?>