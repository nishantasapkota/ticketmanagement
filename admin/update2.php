<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginformindex.php');
}
$oid=$_GET['oid'];
$bid=$_POST['bid'];
require_once('includes/dynamicquery.php');
$query->update('bus_registeration',$_POST,'bid',$bid);
$_SESSION['change'] = " Updated succesfully";
header('location:bustable.php?oid='.$oid);

?>