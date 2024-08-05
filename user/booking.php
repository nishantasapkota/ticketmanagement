<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:../index.php');
}
$date= date('Y-m-d H:i:s');
$no_of_seat=$_SESSION['no_of_seat'];
$busno=$_SESSION['busno'];
$busid=$_SESSION['busid'];
$totalfare=$_POST['totalfare'];
$uid=$_SESSION['uid'];
require_once('../includes/dynamicquery.php');
$con=$query->connection();
$ins="INSERT INTO booking(booking_date,No_of_seats,Total_fare,UserId,Id)VALUES('$date','$no_of_seat','$totalfare','$uid','$busid')";
mysqli_query($con,$ins);
$upd= "UPDATE bus_schedule SET no_of_seats=(no_of_seats-$no_of_seat) WHERE Id=$busid";
mysqli_query($con,$upd);
$_SESSION['reg']='Booked sucessfully';
unset($_SESSION['date']);
unset($_SESSION['no_of_seat']);
unset($_SESSION['busno']);
unset($_SESSION['busid']);
header('location:index2.php');
?>