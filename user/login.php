<?php
session_start();
$email=$_POST['email'];
$pass=$_POST['password'];

require_once('../includes/dynamicquery.php');

$res=$query->select('user','Email',$email);
$row=mysqli_fetch_assoc($res);
$username=$row['Username'];
$uid=$row['UserID'];


if($pass==$row['Password'])
{	$_SESSION['Username']=$username;
	$_SESSION['uid']=$uid;
	$_SESSION['islogin']='true';
	header('Location:index2.php');
}


else
{	$_SESSION['error']='Invalid email or password';
	header('Location:userloginform.php');
}

?>