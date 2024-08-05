<?php
session_start();
 if(!isset($_SESSION['islogin'])){
    header('location:busstaffloginform.php');
  }
$id=$_GET['id'];
require_once('../includes/dynamicquery.php');
$query->delete('bus_schedule','Id',$id);
$_SESSION['change'] = 'Deleted succesfully';
header('Location:schedulelist.php');
?>