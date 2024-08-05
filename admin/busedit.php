<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
require_once('includes/dynamicquery.php');
$bid=$_GET['bid'];
$oid=$_GET['oid'];
$res=$query->select('bus_registeration','bid',$bid);
$row=mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html>
<head>
      <?php
      include('includes/head.php');
      ?>
</head>
<body>
    
            <?php
            include('includes/dashboard.php');
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">  
                        <h5>Welcome <?=$_SESSION['Username']?>, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Bus Registeration Form</h3>
                                    <form action="update2.php?oid=<?=$oid;?>" method="POST">
                                       <input type="number" name="bid" value="<?=$row['bid']?>" hidden>
                                        <div class="form-group">
                                            <label>Bus Name</label>
                                            <input class="form-control"type="text" name="bus_name" placeholder= "Busname" size="15" required  value="<?=$row['bus_name']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Bus NO</label>
                                            <input class="form-control"type="text" name="bus_no" placeholder="Busno" size="15"required value="<?=$row['bus_no']?>"  />
                                        </div>
                                         <div class="form-group">
                                            <label>Origin</label>
                                            <input class="form-control"type="text" name="origin" placeholder="BusOrigin" required value="<?=$row['origin']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <input class="form-control"type="text" name="destination" placeholder="BusDestination"required value="<?=$row['destination']?>"/>
                                        </div>
                                        
                                                                                    
                                        <button type="submit" class="btn btn-default">Update</button>
                                        <button type="reset" class="btn btn-primary">Reset Button</button>

                                    </form>
                                </div>
<!-- /. ROW  -->
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
    <?php
    include('includes/js.php');
    ?>
    
   
</body>
</html>
