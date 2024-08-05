<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
$oid=$_POST['oid'];
require_once('includes/dynamicquery.php');
$query->update('bus_owner',$_POST,'oid',$oid);
$_SESSION['change'] = " Updated succesfully";
header('location:ownerstable.php');

?>