<?php
session_start();
require_once('../includes/dynamicquery.php');
$con=$query->connection();
$email=$_POST['email'];
$password=$_POST['password'];
$res=$query->select('bus_owner','email',$email);
$row=mysqli_fetch_assoc($res);
$security=$row['security'];
$oid=$row['oid'];
if($_POST['security']==$row['security'])
{
	$upd="UPDATE bus_owner SET password=$password WHERE oid=$oid";
	mysqli_query($con,$upd);
	$_SESSION['msg'] = 'password changed successfully!!!';
	header('Location:loginform.php');
}
else{
	$_SESSION['msg'] = 'password changed failed!!!';
	header('Location:forgotpassword.php');

}
?>