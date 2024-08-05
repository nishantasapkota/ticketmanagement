<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:../index.php');
}
require_once('../includes/dynamicquery.php');
$con=$query->connection();
$uid=$_SESSION['uid'];
$sel="SELECT * FROM booking INNER JOIN bus_schedule ON booking.Id=bus_schedule.Id INNER JOIN bus_registeration ON bus_schedule.bid=bus_registeration.bid WHERE UserId='$uid'";
$res=mysqli_query($con,$sel);
?>

<!DOCTYPE html>
<html>
<head>
      <?php
      include('../includes/head.php');
      ?>
      <script type="" src="../js/jquery.min.js"></script>
      <style type="text/css">
 .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
      </style>
</head>
<body>
    
            <?php
            include('../includes/dashboard2.php');
            ?>
             <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Booked Bus Table</h2>   
                        <h5>Welcome <?=$_SESSION['Username']?> , Love to see you back. </h5>
                       
                    </div>
                    <?php
                     if(isset($_SESSION['msg']))
        {
            echo '<p class="message"> <font size="5" color="BLACK"> <center> <i>';
            echo $_SESSION['msg'];
            echo "</i></center></font></p>";
            unset($_SESSION['msg']);
        }
        if(isset($_SESSION['error']))
        {
            echo '<p class="error-message"> <font size="6" color="BLACK"> <center><i>';
            echo $_SESSION['error'];
            echo "</i> </center></font></p>";
            unset($_SESSION['error']);
        }
         if(isset($_SESSION['reg']))
        {
            echo '<p class="message"> <font size="5" color="WHITE"><center> <i>';
            echo $_SESSION['reg'];
            echo "</i> <center></font></p>";
            unset($_SESSION['reg']);
        }
        if(isset($_SESSION['reg_error']))
        {
            echo '<p class="message"> <font size="5" color="WHITE"> <center><i>';
            echo $_SESSION['reg_error'];
            echo "</i> </center></font></p>";
            unset($_SESSION['reg_error']);
        }
        if(isset($_SESSION['change']))
        {
            echo '<p class="message"> <font size="5" color="White"> <center><i>';
            echo $_SESSION['change'];
            echo "</i> </center></font></p>";
            unset($_SESSION['change']);
        }
                    ?>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                              Booked Bus Table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Bus no</th>
                                            <th>No of Seats</th>
                                            <th>Booked For Date</th>
                                            <th>Date of booking</th>
                                            <th>payment details</th>
                                            <th>View Ticket</th>
                                            <th>Cancel Booking</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row=mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                                <td><?=$_SESSION['Username']?></td>
                                                <td><?=$row['bus_no']?></td>
                                                <td><?=$row['No_of_seats']?></td>
                                                <td><?=$row['date']?></td>
                                                <td><?=$row['booking_date']?></td>
                                                <td><button data-toggle="modal" data-target="#myModal<?=$row['bid']?>">payment details</button></td>
                                                <td><button><a href="ticket.php?date=<?=$row['date']?>&busno=<?=$row['bus_no']?>&bdate=<?=$row['booking_date']?>&id=<?=$row['Id']?>">view ticket</a></button></td>
                                                <td><button>
                                                  <a href="cancelbooking.php?bdate=<?=$row['booking_date']?>&id=<?=$row['Id']?>&noofseats=<?=$row['No_of_seats']?>&fare=<?=$row['Total_fare']?>">Cancel Booking</a>
                                                </button></td>
                                          </tr>
                                   <?php
                                    }
                                   ?>

                                        
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
$con=$query->connection();
$uid=$_SESSION['uid'];
$sel="SELECT * FROM booking INNER JOIN bus_schedule ON booking.Id=bus_schedule.Id INNER JOIN bus_registeration ON bus_schedule.bid=bus_registeration.bid WHERE UserId='$uid'";
$res2=mysqli_query($con,$sel);
while ($data=mysqli_fetch_assoc($res2)) {
?>

   <div id="myModal<?=$data['bid']?>" class="modal" tabindex="-1">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" data-dismiss="modal">&times;</span>
    <p>Payment Details</p>
    <h4>You can pay directly by cash to the staff in Bus.But,if you want to pay the money through mobile banking the banking details are given below </h4>
        <h4>Note* While payment please include your Name and Bus-No in remarks section And please bring the screenshot  or download the receipt of payment while travelling*</h4>
  </div>
</div>
<?php } ?>

  <?php
    include('../includes/js.php');
    ?>
    </body>
</html>