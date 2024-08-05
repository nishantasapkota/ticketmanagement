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
      <script type="" src="../js/jquery.min.js"></script>
</head>
<body>
    
            <?php
            include('includes/dashboard.php');
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
                     <h2>Registered Owner Table</h2>   
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
                             Owner Table
                             <input type="text" placeholder="Search.." id="search">
                        </div>
                        <div class="panel-body" >
                            <div class="table-responsive">
                                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>oid</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>No of Routes</th>
                                            <th>Bank Account No</th>
                                            <th>Bank Account Name </th>
                                            <th>Bank Name</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row=mysqli_fetch_array($res))
                                            {
                                            echo "<tr>";
                                            echo "<td>".$row['oid']."</td>";
                                            echo "<td>".$row['firstname']."</td>";
                                            echo "<td>".$row['lastname']."</td>";
                                            echo "<td>".$row['phone']."</td>";
                                            echo "<td>".$row['email']."</td>";
                                            echo "<td>".$row['username']."</td>";
                                            ?>
                                            
                                            <td><a href="bustable.php?oid=<?=$row['oid']?>"><?=$row['noof_vechile']?></a></td>;
                                            <td><?=$row['account_no']?></td>
                                            <td ><?=$row['account_name']?></td>
                                            <td><?=$row['bank_name']?></td>

                                            <td><a href="owneredit.php?oid=<?=$row['oid']?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a> <a href="ownerdelete.php?oid=<?=$row['oid']?>" class="btn btn-sm btn-danger"> Delete</a></td>
                                            <?php
                                            echo "</tr>";
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
    include('includes/js.php');
    ?>
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
 <style>
     .table-responsive{max-width: 100%;overflow-x: scroll;}
 </style>  
</body>
</html>