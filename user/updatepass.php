<?php
session_start();
require_once('../includes/dynamicquery.php');
$con=$query->connection();
$email=$_POST['email'];
$password=$_POST['password'];
$res=$query->select('user','Email',$email);
$row=mysqli_fetch_assoc($res);
$security=$row['Security'];
$uid=$row['UserID'];
if($_POST['security']==$row['Security'])
{
	$upd="UPDATE user SET Password=$password WHERE UserID='$uid'";
	mysqli_query($con,$upd);
	$_SESSION['msg'] = 'password changed successfully!!!';
	header('Location:loginform.php');
}
else{
	$_SESSION['msg'] = 'password changed failed!!!';
	header('Location:forgotpass.php');

}
?>