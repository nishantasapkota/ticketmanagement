<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
$oid=$_GET['oid'];
require_once('includes/dynamicquery.php');
$res=$query->select('bus_owner','oid',$oid);
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
                             Update Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Owner Registeration  Update Form</h3>
                                    <form action="update.php" method="POST">
                                
                                            <input type="number" name="oid"value="<?=$row['oid']?>"hidden/>
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input class="form-control"type="text" name="firstname" placeholder= "Firstname" size="15" required value="<?=$row['firstname']?>"  />
                                        </div>
                                        <div class="form-group">
                                            <label>LastName</label>
                                            <input class="form-control"type="text" name="lastname" placeholder="Lastname" size="15"required value="<?=$row['lastname']?>"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Phone no</label>
                                            <input class="form-control"type="text" name="phone" placeholder="phone no." size="10" required value="<?=$row['phone']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"type="text" placeholder="Enter Email" name="email" required value="<?=$row['email']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control"type="text" name="username" placeholder= "Username" size="15" required value="<?=$row['username']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>No OF Buses</label>
                                            <input class="form-control"type="number" name="noof_vechile" placeholder="NO OF BUSES"required value="<?=$row['noof_vechile']?>" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Account No</label>
                                            <input class="form-control"type="text" name="account_no" placeholder="Account No" required value="<?=$row['account_no']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input class="form-control"type="text" name="account_name" placeholder="Account Name" required value="<?=$row['account_name']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input class="form-control"type="text" name="bank_name" placeholder="Bank Name" required value="<?=$row['bank_name']?>" />
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
