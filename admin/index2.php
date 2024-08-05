<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
?>
<!DOCTYPE html>
<html>
<head>
      <?php
      include('includes/head.php');
      include('includes/include.php');

      ?>
<body> 
  <?php
       include('includes/dashboard.php');
       ?>
         <div id="page-wrapper" >
                <?php
                  include('home.php');
                ?>
                   
            
          </div>
                         
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

        <?php
       include('includes/js.php')
       ?>
    
    
   
</body>
</html>
