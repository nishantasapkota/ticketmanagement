<?php
session_start();
 if(!isset($_SESSION['islogin'])){
    header('location:busstaffloginform.php');
  }
require_once('../includes/dynamicquery.php');
$oid=$_SESSION['oid'];
$res2=$query->select('bus_registeration','oid',$oid);
?>
<!DOCTYPE html>
<html>
<head>
      <?php
      include('../includes/head2.php');
      ?>
</head>
<body>
    
            <?php
            include('../includes/dashboard.php');
            ?>
             <?php
             if(isset($_SESSION['msg']))
        {
            echo '<p class="message"> <font size="3" color="WHITE"> <center> <i>';
            echo $_SESSION['msg'];
            echo "</i></center></font></p>";
            unset($_SESSION['msg']);
        }
        if(isset($_SESSION['error']))
        {
            echo '<p class="error-message"> <font size="3" color="WHITE"> <center><i>';
            echo $_SESSION['error'];
            echo "</i> </center></font></p>";
            unset($_SESSION['error']);
        }
         if(isset($_SESSION['reg']))
        {
            echo '<p class="message"> <font size="3" color="WHITE"><center> <i>';
            echo $_SESSION['reg'];
            echo "</i> <center></font></p>";
            unset($_SESSION['reg']);
        }
        if(isset($_SESSION['reg_error']))
        {
            echo '<p class="message"> <font size="3" color="WHITE"> <center><i>';
            echo $_SESSION['reg_error'];
            echo "</i> </center></font></p>";
            unset($_SESSION['reg_error']);
        }
        if(isset($_SESSION['change']))
        {
            echo '<p class="message"> <font size="3" color="White"> <center><i>';
            echo $_SESSION['change'];
            echo "</i> </center></font></p>";
            unset($_SESSION['change']);
        }
            ?>
        <!-- /. NAV SIDE  -->
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Bus Schedule Registeration Form</h3>
                                    <form action="registeration.php" method="POST">
                                         <label>Bus</label>
                                            <select name='bid' class="form-control">
                                              <option disabled="selected" >select bus</option>
                                                <?php
                                                    while($data = mysqli_fetch_assoc($res2))
                                                    {
                                                        echo "<option  value='". $data['bid'] ."'>" .$data['bus_no'] ."</option>";
                                                    } 
                                                ?>  
                                              
                                            </select> 
                                            <?php
                                                $oid=$_SESSION['oid'];
                                                $res2=$query->select('bus_registeration','oid',$oid);
                                            ?>
                                            <label>Origin</label>
                                            <select name='origin' class="form-control">
                                              <option disabled="selected">Select Origin</option>
                                              <?php
                                                    while($data = mysqli_fetch_assoc($res2))
                                                    {
                                                        echo "<option  value='". $data['origin'] ."'>" .$data['origin'] ."</option>";
                                                    } 
                                                ?>  
                                                
                                              
                                            </select> 
                                             <?php
                                                $oid=$_SESSION['oid'];
                                                $res2=$query->select('bus_registeration','oid',$oid);
                                            ?>
                                            <label>Destination</label>
                                            <select name='destination' class="form-control">
                                              <option disabled="selected">Select route</option>
                                              <?php
                                                    while($data = mysqli_fetch_array($res2))
                                                    {
                                                        echo "<option  value='". $data['destination'] ."'>" .$data['destination'] ."</option>";
                                                    } 
                                                ?>  
                                                
                                              
                                            </select> 
                                        <div class="form-group">
                                            <label>Seats</label>
                                            <input class="form-control"type="number" name="no_of_seats" placeholder= "No of seats" size="15" required />
                                        </div>
                                         <div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control"type="date" name="date" placeholder="Date" size="10"/ required />
                                        </div>
                                         <div class="form-group">
                                            <label>Fare</label>
                                            <input class="form-control"type="number" placeholder="Bus fare" name="fare" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Arrival Time</label>
                                            <input class="form-control"type="time" name="arrival_time" placeholder="Arrival Time" size="15"required  />
                                        </div>
                                         <div class="form-group">
                                            <label>Departure time</label>
                                            <input class="form-control"type="time" name="departure_time" placeholder="Departure Time" required />
                                        </div>
                                       
                                       
                                        
                                                                                    
                                        <button type="submit" class="btn btn-default">Register</button>
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
    include('../includes/js.php');
    ?>
    
   
</body>
</html>
