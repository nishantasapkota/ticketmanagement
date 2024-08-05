<?php
session_start();
$email=$_POST['email'];
$pass=$_POST['password'];

require_once('../includes/dynamicquery.php');

$res=$query->select('bus_owner','email',$email);
$row=mysqli_fetch_assoc($res);
$username=$row['username'];
$oid=$row['oid'];



if($pass==$row['password'])
{	$_SESSION['Username']=$username;
	$_SESSION['oid']=$oid;
	$_SESSION['islogin']='true';
	header('Location:index2.php');
}


else
{	$_SESSION['error']='Invalid email or password';
	header('Location:busstaffloginform.php');
}
?>