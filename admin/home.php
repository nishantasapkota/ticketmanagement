<?php
if(!isset($_SESSION['islogin'])){
    header('location:adminloginform.php');
}?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<?php
		include('includes/include.php');
	?>
</head>
<body>
		
			<section id="banner">
				<h2>Welcome to BookMyBus</h2>
				<p><center><i><font  size="35"><strong>Hello, <?= $_SESSION['Username']?></font></i></strong></center></p>
			</section>

</body>
</html>