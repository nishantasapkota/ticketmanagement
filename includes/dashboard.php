<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index2.html">BookMyBUS</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/find_user.png" class="user-image img-responsive"/>
                    <h1 style="color: WHITE"><?=$_SESSION['Username'];?></h1>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index2.php"> Dashboard</a>
                    </li>
                     <li>
                        <a  href="scheduleregisteration.php">Schedule Registration</a>
                    </li>
                    <li>
                        <a  href="schedulelist.php">Schedule List</a>
                    </li>
                    <li>
                        <a href="bookinglist.php">BOOKING LIST</a>
                    </li>
                    <li>
                        <a href="cancelbooking.php">Cancelled Booking</a>
                    </li>
	
                      
                </ul>
               
            </div>
        </nav>