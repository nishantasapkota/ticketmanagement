<?php
session_start();
 if(!isset($_SESSION['islogin'])){
    header('location:busstaffloginform.php');
  }
	$_SESSION['msg'] = 'Logged out succesfully';
	unset($_SESSION['Username']);
	session_destroy();
header('Location: busstaffloginform.php');
?>