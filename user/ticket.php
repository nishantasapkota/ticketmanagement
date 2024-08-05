<?php
   session_start();
if(!isset($_SESSION['islogin'])){
    header('location:../index.php');
}
   require_once('../includes/dynamicquery.php');
   $uid=$_SESSION['uid'];
   $bdate=$_GET['bdate'];
   $id=$_GET['id'];
   $con=$query->connection();
   $sel="SELECT * FROM booking INNER JOIN user ON booking.UserId=user.UserId INNER JOIN bus_schedule ON bus_schedule.Id=booking.Id INNER JOIN bus_registeration ON bus_schedule.bid=bus_registeration.bid INNER JOIN bus_owner ON bus_owner.oid=bus_registeration.oid Where booking.UserId='$uid'AND booking_date='$bdate' AND booking.Id=$id";
   $res=mysqli_query($con,$sel);
   $row=mysqli_fetch_assoc($res);
   ?>
<!DOCTYPE html>
<html>
<head>
      <?php
      include('../includes/head.php');
      ?>
</head>
<body>
             <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>BUS Ticket</h2>   
                        <h5>Welcome <?=$_SESSION['Username']?> , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Ticket
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <table border="1">
                                            <thead>
                                                <tr>
                                                  <td colspan="6">Full Name:</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                 <td colspan="2">Bus Name: <?=$row['bus_name']?></td>
                                                <td colspan="2">Date: <?=$row['date']?></td>
                                                <td colspan="2">NO of Seats: <?=$row['No_of_seats']?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Origin: <?=$row['origin']?></td>
                                                <td colspan="3">Destination: <?=$row['destination']?></td>
                                            </tr>
                                            <tr>
                                                
                                                <td colspan="2">Arrival Time: <?=$row['arrival_time']?></td>
                                                <td colspan="2">Departure Time: <?=$row['departure_time']?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Cost:<?=$row['Total_fare']?></td>
                                                <td colspan="3">Bus no:<?=$row['bus_no']?></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3">E-mail:<?=$row['email']?></td>
                                              <td colspan="3">Contactno:<?=$row['phone']?></td>
                                            </tr>

                                            <tr>
                                                <td colspan="6"> Note *please arrive at the bus-station on given Depaertrure  Time and bring the screenshot of ticket while travelling*</td>
                                            </tr>
                                            </tbody>
                                            
                                        </table>
                                        
                                   
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
                      <!-- /. ROW  -->
        </div>

  <?php
    include('../includes/js.php');
    ?>
    
   
</body>
</html>