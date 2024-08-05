<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:../index.php');
}
// print_r($_POST);die;
	require_once('../includes/dynamicquery.php');
			$con=$query->connection();
		$no_seat=$_POST['no_of_seats'];
		$origin=$_POST['origin'];
		$destination=$_POST['destination'];
		$date=$_POST['date'];
		$sel="SELECT * FROM bus_schedule INNER JOIN bus_registeration ON bus_schedule.bid=bus_registeration.bid where bus_schedule.origin='$origin' and bus_schedule.destination='$destination' and Date='$date' and no_of_seats>= '$no_seat'";
		$str= mysqli_query($con,$sel);
		$rows= mysqli_num_rows($str);
?>
<?php
	$_SESSION['origin']=$origin;
	$_SESSION['destination']=$destination;
	$_SESSION['no_seat']=$no_seat;
?>
	
    
                         
                        	<?php
                        	if($rows==0)
							{
								echo '<h3 style= "text-align:center;"> <font color="red">No available Buses </font></h3>';
								echo "<br>";
							?>
								<button class="btn btn-xs btn-success" id="beforedate" value="<?=$date?>">Check for date before it</button> <button class="btn btn-xs btn-success" id="afterdate" value="<?=$date?>">Check for date after it</button>
							<?php

							}
							else{
								?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
											<th> Id </th>
											<th> Name of the bus</th>
											<th> Available seats </th>
											<th>bus no</th>
											<th> Fare per seat </th>
											<th> Book </th>
											</tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		while($row=mysqli_fetch_array($str))
											{
												$Bus_id = $row['Id'];
												$busno=$row['bus_no'];
												$date=$row['date'];
												$Total_fare= $row['fare'] * $no_seat;
												echo "<tr>";
												echo "<td>".$row['Id']."</td>";
												echo "<td>".$row['bus_name']."</td>";
												echo "<td>".$row['no_of_seats']."</td>";
												echo "<td>".$row['bus_no']."</td>";
												echo "<td>".$row['fare']."</td>";
												echo "<td>";
												echo '<a href="payment.php?Date='.$date.'& no_of_seat='.$no_seat.'& Total_fare='.$Total_fare.'& busno='.$busno.'& busid='.$Bus_id.'">Book Now</a>';
												echo "</td>";
												echo "</tr>";
											}
											echo "</table>";
											
											?>
                                        
                                    </tbody>
                                </table>
                                </div>
                       
                       <?php     
                        }
                        ?>
                            
                        </div>
                    </div>

                    <div id="displaydata"></div>
                    <!--End Advanced Tables -->
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

   <script>
   	$('#beforedate').click(function(){
   		date = $(this).val();
   		$.ajax({
   			type : "get",
   			url : 'beforedate.php',
   			data : {date:date},
   			success : function(res){
   				$('#displaydata').html(res);
   			}
   		})
   	})</script>
   	<script>
$('#afterdate').click(function(){
   		date = $(this).val();
   		$.ajax({
   			type : "get",
   			url : 'afterdate.php',
   			data : {date:date},
   			success : function(res){
   				$('#displaydata').html(res);
   			}
   		})
   	})

   </script> 
<?php
  include('../includes/js.php');
?>
    
