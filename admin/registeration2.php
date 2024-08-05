<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
$con=mysqli_connect('localhost','root','','bus_booking_system');
$oid=$_POST['oid'];
$origin=$_POST['origin'];
$destination=$_POST['destination'];
$bus_name=$_POST['bus_name'];
$bus_no=$_POST['bus_no'];
$count=0;
require_once('includes/dynamicquery.php');
$res=$query->select('bus_registeration','oid',$oid);
 while($row=mysqli_fetch_assoc($res))
 {
 	$count=$count+1;
 }
 $res2=$query->select('bus_owner');
 $row2=mysqli_fetch_assoc($res2);
if ($row2['noof_vechile']>=$count) {
	$query->insert("bus_registeration",$_POST);
	$sql="INSERT INTO bus_registeration(`oid`,`bus_name`,`bus_no`,`origin`,`destination`) VALUES('$oid','$bus_name','$bus_no','$destination','$origin')";
	mysqli_query($con,$sql);
	$_SESSION['reg'] = 'Registered succesfully';
	header('location: busregisteration.php');
}
else
{   $_SESSION['reg_error'] = 'Quota of bus is full pay to add more routes';

	header('location: busregisteration.php');

}
?>