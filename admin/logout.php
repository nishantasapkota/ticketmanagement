<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
	$_SESSION['msg'] = 'Logged out succesfully';
	unset($_SESSION['Username']);
	unset($_SESSION['islogin']);
	session_destroy();
header('Location: adminloginform.php');
?>