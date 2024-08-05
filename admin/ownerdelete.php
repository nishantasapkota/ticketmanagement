<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
$oid=$_GET['oid'];
require_once('includes/dynamicquery.php');
 $res=$query->delete('bus_owner','oid',$oid);
$_SESSION['change'] = 'Deleted succesfully';
header('location:ownerstable.php');
?>