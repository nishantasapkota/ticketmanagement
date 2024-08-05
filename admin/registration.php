<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
$email=$_POST['email'];
$username=$_POST['username'];
require_once('includes/dynamicquery.php');
$res=$query->select("bus_owner",'Email',$email,'Username',$username);
if(mysqli_num_rows($res) == 0)
{
	echo "string"; 
	$query->insert("bus_owner",$_POST);
$_SESSION['reg'] = 'Registered succesfully';
	header('location: ownerregisteration.php');
}
	else
{

	$_SESSION['reg_error'] = 'Invalid email!! or username';
	header('location: ownerregisteration.php');
}

?>