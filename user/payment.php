<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:../index.php');
}
$date=$_GET['Date'];
$no_of_seat=$_GET['no_of_seat'];
$busno=$_GET['busno'];
$busid=$_GET['busid'];
$_SESSION['date']=$date;
$_SESSION['no_of_seat']=$no_of_seat;
$_SESSION['busno']=$busno;
$_SESSION['busid']=$busid;
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	include('../includes/head.php');
	
	?>
</head>
<body>
	<?php
		include('../includes/dashboard2.php');
	?>
	<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">  
                        <h5>Welcome <?=$_SESSION['Username'];?>, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default" id="busDetails">
                        <div class="panel-heading">                            
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Booking CONFORMATION FORM</h3>
                                    <form action="booking.php"method="POST"> 
                   
                                         <div class="form-group">
                                            <label>Total Fare</label>
                                            <input class="form-control"type="number" name="totalfare" required value="<?=$_GET['Total_fare']?>" />
                                        </div>
                                        
                                       <button type="submit" class="btn btn-default">BOOK</button>
                                        
                                    </form>
                                </div>
<!-- /. ROW  -->
                    </div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->


</body>
</html>