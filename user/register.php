<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<?php
		include"../includes/include.php";
	?>
</head>
</head>
<body>
	<div class="container" >
		<table >
		<?php
		session_start();
		if(isset($_SESSION['error']))
		{
			echo '<p class="message"> <font size="5" color="MediumMagenta"> <center><i>';
			echo $_SESSION['error'];
			echo "</i></center></font></p>";
			unset($_SESSION['error']);
		}
		?>

	</table>
		<h1 style="font-size: 40px;display: flex;justify-content: center;" ><strong>Register</strong></h1>
		<section class="main">
				<form action="registered.php" method ="POST" class="form-4" >
				 

	First name
<input class="form-control" name="Fname" placeholder="eg:karun" type="text">
	Last name
<input class="form-control" name="Lname" placeholder="eg:karki" type="text">
 Email
<input class="form-control" name="Email" placeholder="eg:kartabya927@gmail.com" type="text">

	Username
<input class="form-control" name="Username" placeholder="choose a username" type="text">

    Password
<input class="form-control" name="Password" placeholder="choose a password" type ="password">
  Name of your favourite movie?
<input class="form-control" name="Security" placeholder="What is your favourite movie?" type ="text">

<br>
<button type="submit" class="btn btn-primary">Register</button>
</form>
			</section>

        </div>

</body>
</html>