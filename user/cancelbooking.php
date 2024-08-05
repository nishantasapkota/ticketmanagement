<?php
session_start();
$uid=$_SESSION['uid'];
$bdate=$_GET['bdate'];
$id=$_GET['id'];
$total_fare=$_GET['fare'];
$No_of_seats=$_GET['noofseats'];
require_once('../includes/dynamicquery.php');
$con=$query->connection();
$ins="INSERT INTO delete_booking(booking_date,No_of_seats,Total_fare,UserId,Id) VALUES('$bdate','$No_of_seats','$total_fare','$uid','$id')";
mysqli_query($con,$ins);
$upd="UPDATE bus_schedule SET no_of_seats=(no_of_seats+$No_of_seats) WHERE Id='$id'";
mysqli_query($con,$upd);
$del="DELETE FROM booking WHERE booking_date='$bdate'AND UserId='$uid'AND Id='$id'";
mysqli_query($con,$del);
$_SESSION['reg']='Canceled successfully';
header('location:bookinghistory.php');
?>