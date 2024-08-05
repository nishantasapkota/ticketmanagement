<!DOCTYPE html>
<html>
<head>
	<title>Online Bus Reservation system</title>
	<?php
		include"../includes/include.php";
	?>
</head>
<body>
	
	<section id="banner">
				<h2>Welcome to BookMyBusTicket</h2>
				<p><center><i><font  size="35"><strong>Hello<?=$_SESSION['Username']?></font></i></strong></center></p>
				<ul class="actions">
					<li>
						<a href="generic.php" class="button big">Book Now</a>
					</li>
				</ul>
			</section>

</body>
</html>