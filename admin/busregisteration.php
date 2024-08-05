<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
require_once('includes/dynamicquery.php');

$res=$query->select('bus_owner');

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
                                    <form action="registeration2.php" method="POST">
                                        <div class="form-group">
                                            <label>Bus Owner</label>
                                            <select name='oid' class="form-control">
                                              <option disabled="selected" >select owner</option>
                                                <?php
                                                    while($data = mysqli_fetch_array($res))
                                                    {?>
                                                        <option value="<?=$data['oid']?>"><?=$data['firstname']?> <?=$data['lastname']?>(<?=$data['username']?>)</option>
                                                        <?php
                                                    } 
                                                ?>  
                                              
                                            </select>  
                                        </div>
                                        <div class="form-group">
                                            <label>Bus Name</label>
                                            <input class="form-control"type="text" name="bus_name" placeholder= "Busname" size="15" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Bus NO</label>
                                            <input class="form-control"type="text" name="bus_no" placeholder="Busno" size="15"required   />
                                        </div>
                                         <div class="form-group">
                                            <label>Origin</label>
                                            <input class="form-control"type="text" name="origin" placeholder="BusOrigin" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <input class="form-control"type="text" name="destination" placeholder="BusDestination"required />
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
    include('includes/js.php');
    ?>
    
   
</body>
</html>
