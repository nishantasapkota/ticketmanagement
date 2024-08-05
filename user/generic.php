<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:../index.php');
}
require_once('../includes/dynamicquery.php');
$con=$query->connection();
$sql="SELECT DISTINCT origin,destination FROM bus_registeration";
$res=mysqli_query($con,$sql);
$count = mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html>
<head>
      <?php
      include('../includes/head.php');
      ?>
</head>
<body>
    
            <?php
            include('../includes/dashboard2.php');
            ?>
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
            echo '<p class="message"> <font size="5" color="BLACK"> <center><i>';
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
                    <div class="panel panel-default" id="busDetails">
                        <div class="panel-heading">                            
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Bus Search Form</h3>
                                    <form action="" id="busDetailsForm" method="POST"> 
                                        <label>Origin</label>
                                            <select name='origin' class="form-control">
                                              <option value="0">select origin</option>
                                                <?php
                                                if($count > 0){
                                                    foreach ($res as $d)
                                                    {
                                                        echo "<option  value='". $d['origin'] ."'>" .$d['origin'] ."</option>";
                                                    } 
                                                }
                                                ?>  
                                              
                                            </select> 
                                         <label>Destination</label>
                                            <select name='destination' class="form-control">
                                              <option value="0">select destination</option>
                                                <?php
                                                    if($count > 0){
                                                    foreach ($res as $d)
                                                    {
                                                        echo "<option  value='". $d['destination'] ."'>" .$d['destination'] ."</option>";
                                                    } 
                                                }
                                                ?>
                                            </select> 
                                         <div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control"type="date" placeholder="Date" name="date" required/>
                                        </div>
                                         <div class="form-group">
                                            <label>Required no of seats</label>
                                            <input class="form-control"type="number" placeholder="no of seats required" name="no_of seats" required/>
                                        </div>
                                       <button type="submit" class="btn btn-default">Search</button>
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
    

    <script>
            $('#busDetailsForm').on('submit',function(e){
        var postData = $(this).serialize();
        // alert(data);
        $.ajax({
            type:'POST',
            url:'busdetail.php',
            data:postData,
            success:function(response){
                $('#busDetails').html(response);
            }
        })
        e.preventDefault();
       });
        
    </script>
   
</body>
</html>

