<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header('location:../index.php');
}
$date = $_GET['date'];
$beforedate = new DateTime("$date");
$beforedate->modify("-1 day");
$beforedate=$beforedate->format("Y-m-d");
// print_r($_POST);die;
	require_once('../includes/dynamicquery.php');
			$con=$query->connection();
		$origin=$_SESSION['origin'];
		$destination=$_SESSION['destination'];
		$no_seat=$_SESSION['no_seat'];
		$sel="SELECT * FROM bus_schedule INNER JOIN bus_registeration ON bus_schedule.bid=bus_registeration.bid where Origin='$origin' and Destination='$destination' and Date='$beforedate' and no_of_seats>= '$no_seat'";
		$str= mysqli_query($con,$sel);
		$rows= mysqli_num_rows($str);
// query
// result

echo '<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
    	<tr>
			<th> SN </th>
			<th> Name of the bus</th>
			<th> Available seats </th>
			<th>bus no</th>
			<th> Fare per seat </th>
			<th> Book </th>
		</tr>
    </thead>
    <tbody>';
?>    
    	<?php if($rows > 0):?> 
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
	}    ?>         
  
        <?php else: ?>
        	<tr>
        	<td colspan="6">No data found!!!!</td>
        </tr>
        <?php endif; ?>    	
<?php    echo '</tbody>
</table>
</div>';

 
