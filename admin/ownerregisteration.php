<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
?><!DOCTYPE html>
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
                                    <h3>Owner Registeration Form</h3>
                                    <form action="registration.php" method="POST">
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input class="form-control"type="text" name="firstname" placeholder= "Firstname" size="15" required />
                                        </div>
                                        <div class="form-group">
                                            <label>LastName</label>
                                            <input class="form-control"type="text" name="lastname" placeholder="Lastname" size="15"required  />
                                        </div>
                                         <div class="form-group">
                                            <label>Country Code</label>
                                            <input class="form-control"type="text" name="country code" placeholder="Country Code" value="+977" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Phone no</label>
                                            <input class="form-control"type="text" name="phone" placeholder="phone no." size="10"/ required />
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"type="text" placeholder="Enter Email" name="email" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control"type="text" name="username" placeholder= "Username" size="15" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control"type="password" placeholder="Enter Password" name="password" required />

                                        <div class="form-group">
                                            <label>No OF Routes</label>
                                            <input class="form-control"type="number" name="noof_vechile" placeholder="NO OF Routes"required/>
                                        </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label>Account No</label>
                                            <input class="form-control"type="number" name="account_no" placeholder="Account No" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input class="form-control"type="text" name="account_name" placeholder="Account Name" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input class="form-control"type="text" name="bank_name" placeholder="Bank Name" required />
                                        </div>
                                        <div class="form-group">
                                            <label>What is your favourite movie?</label>
                                            <input class="form-control"type="text" name="security" placeholder="secutity question" required />
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
