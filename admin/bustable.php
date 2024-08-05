<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}
require_once('includes/dynamicquery.php');
$oid=$_GET['oid'];
$res=$query->select('bus_registeration','oid',$oid);

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
                     <h2>Registered BUS Table</h2>   
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
                                            <th>bid</th>
                                            <th>BusName</th>
                                            <th>BusNO</th>
                                            <th>Origin</th>
                                            <th>Destination</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row=mysqli_fetch_array($res))
                                            {
                                            echo "<tr>";
                                            echo "<td>".$row['bid']."</td>";
                                            echo "<td>".$row['bus_name']."</td>";
                                            echo "<td>".$row['bus_no']."</td>";
                                            echo "<td>".$row['origin']."</td>";
                                            echo "<td>".$row['destination']."</td>";
                                            
                                            ?>
                                            <td><a href="busedit.php?bid=<?= $row['bid']?>&oid=<?=$_GET['oid']?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a><a href="busdelete.php?bid=<?=$row['bid']?>&oid=<?=$_GET['oid']?>"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Delete</a></td>
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
    include('includes/js.php');
    ?>
    
   
</body>
</html>