<?php
session_start();
 if(!isset($_SESSION['islogin'])){
    header('location:busstaffloginform.php');
  }
$id=$_POST['id'];
require_once('../includes/dynamicquery.php');
$query->update('bus_schedule',$_POST,'Id',$id);
$_SESSION['change'] = " Updated succesfully";
header('location:schedulelist.php');

?>