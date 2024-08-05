<?php
session_start();
 if(!isset($_SESSION['islogin'])){
    header('location:busstaffloginformindex.php');
}
$oid=$_SESSION['oid'];
require_once('../includes/dynamicquery.php');
$con=$query->connection();
$sel="SELECT * FROM delete_booking INNER JOIN bus_schedule ON delete_booking.Id=bus_schedule.Id INNER JOIN bus_registeration ON bus_registeration.bid=bus_schedule.bid INNER JOIN bus_owner ON bus_owner.oid=bus_registeration.oid INNER JOIN user ON delete_booking.UserId=user.UserID WHERE bus_owner.oid='$oid'";
$res=mysqli_query($con,$sel);

?>
<!DOCTYPE html>
<html>
<head>
      <?php
      include('../includes/head2.php');
      ?>
       <script type="" src="../js/jquery.min.js"></script>
</head>
<body>
    
            <?php
            include('../includes/dashboard.php');
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
             <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>BOOKING LIST</h2>   
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
                             Bus Table
                             <input type="text" placeholder="Search.." id="search">
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <td>Name</td>
                                            <td>Bus No</td>
                                            <td>Date</td>
                                            <td>Date of booking</td>
                                            <td>No Of Seats</td>
                                            <td>Total Fare</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                            ?>
                                            <td><?=$row['Fname']?><?=$row['Lname']?></td>
                                            <td><?=$row['bus_no']?></td>
                                            <td><?=$row['date']?></td>
                                            <td><?=$row['booking_date']?></td>
                                            <td><?=$row['No_of_seats']?></td>
                                            <td><?=$row['Total_fare']?></td>
                                            <?php
                                            }
                                            ?>
                                    
                                        
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
         <script type="text/javascript">
       $("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});
   </script> 
  <?php
    include('../includes/js.php');
    ?>
</body>
</html>