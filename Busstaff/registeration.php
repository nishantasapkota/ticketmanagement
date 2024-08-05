<?php
session_start();
 if(!isset($_SESSION['islogin'])){
    header('location:busstaffloginform.php');
  }
$bid=$_POST['bid'];
$date=$_POST['date'];
require_once('../includes/dynamicquery.php');
$res=$query->select("bus_schedule",'bid',$bid,'date',$date);
if(mysqli_num_rows($res) == 0)
{
	echo "string"; 
	$query->insert("bus_schedule",$_POST);
$_SESSION['reg'] = 'Registered succesfully';
	header('location: scheduleregisteration.php');
}
	else
{

	$_SESSION['reg_error'] = ' Cannot Insert Already registered';
	header('location: scheduleregisteration.php');
}

?>