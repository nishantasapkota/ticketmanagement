<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
$bid=$_GET['bid'];
$oid=$_GET['oid'];
require_once('includes/dynamicquery.php');
$query->delete('bus_registeration','bid',$bid);
$_SESSION['change'] = " Deleted succesfully";
header('location:bustable.php?oid='.$oid);
?>