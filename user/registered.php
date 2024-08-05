<?php
session_start();
$email=$_POST['Email'];
require_once('../includes/dynamicquery.php');
$res=$query->select('user','Email',$email);
if(mysqli_num_rows($res)==0)
{
	$res=$query->insert('user',$_POST);
	$_SESSION['reg']='REGISTERED SUCCESFULLY';
	header('location:usersloginform.php');
}
else{
	$_SESSION['reg_error']='Email already in use';
	header('location:register.php');
}


?>